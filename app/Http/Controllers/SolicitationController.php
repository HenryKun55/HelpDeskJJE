<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SolicitationRequest;
use App\Client;
use App\Solicitation;
use App\SolicitationsFile;
use App\Action;
use App\User;
use App\Department;
use App\OccurrenceType;
use App\Category;
use App\Status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;


class SolicitationController extends Controller
{

  public function index(Request $request) {
		$data = Solicitation::orderBy('id','DESC')->whereNotIn('status', ['Resolvido', 'Cancelado'])->paginate(5);
		return view('solicitations.index',compact('data'))
			->with('i', ($request->input('page', 1) - 1) * 5);
	}

  public function create() {

    $departments = Department::pluck('name', 'id');
    $name_department = Department::pluck('name', 'id');
    $occurrenceTypes = OccurrenceType::pluck('name', 'name');
    $categories = Category::pluck('name', 'name');
    return view('solicitations.create', compact('occurrenceTypes', 'categories', 'departments', 'name_department'));
  }

  public function store(Request $request) {
    $this->validate($request, [
      'subject' => 'required',
      'solicitation_type' => 'required',
      'occurrence_type' => 'required',
      'priority' => 'required',
      'category' => 'required',
      'responsible_department_id' => 'required',
      'solicitation_description' => 'required'
    ]);

    $input = $request->all();
    $clientId = $input['cid'];

    $input['client_id'] = $clientId;

    $solicitation = Solicitation::create($input);

    $solicitation->protocol_number = $solicitation->created_at->format('my').substr('00000'.$solicitation->id, -5);

    $solicitation->save();

    $id = $solicitation->id;

    Mail::send('emails.aberturaChamado', [
      'solicitation' => $solicitation
    ], function($message) use ($solicitation){
          $addresses = [
            'suporte@jjeautomacao.com.br',
            'jjeautomacao@hotmail.com',
            $solicitation->client->email
          ];

          $message->to($addresses);
          $message->from('suporte@jesistemas.com.br', 'Service Desk');
          $message->subject($solicitation->client->fantasy_name.' Status: ABERTO #'.$solicitation->created_at->format('m-y').'-'.substr('00000'.$solicitation->id, -5));
        });

    return redirect()->route('solicitations.edit',$id);
  }

  public function edit($id) {

    $solicitation = Solicitation::find($id);
    $statuses = Status::pluck('name', 'name');
    $departments = Department::pluck('name', 'id');
    $occurrenceTypes = OccurrenceType::pluck('name', 'id');
    $categories = Category::pluck('name', 'id');
    $users = User::pluck('name','id');
    $responsibleDepartment = $solicitation->responsible_department;
    $responsible = $solicitation->responsible;

    return view('solicitations.edit', compact(
      'solicitation',
      'statuses',
      'status',
      'departments',
      'occurrenceTypes',
      'categories',
      'responsibleDepartment',
      'users',
      'responsibles'))->with('i');
  }

  public function update(SolicitationRequest $request) {

    $action = Action::create([
      'service_mode' => $request->service_mode,
      'status' => $request->status,
      'responsible_id' => $request->responsible_id,
      'description' => $request->description,
      'solicitation_id' => $request->solicitation_id
    ]);

    $solicitation = Solicitation::find($action->solicitation_id);

    $solicitation->status = $action->status;

    if ($solicitation->status == 'Resolvido' || $solicitation->status == 'Cancelado') {
      $solicitation->closing_date = Carbon::now()->format('d-m-Y H:i');
    }

    $solicitation->save();

    Mail::send('emails.statusChamado', [
      'solicitation' => $solicitation,
      'action' => $action
    ], function($message) use ($solicitation, $action){
          $addresses = [
            'suporte@jjeautomacao.com.br',
            'jjeautomacao@hotmail.com',
            $solicitation->client->email
          ];

          $message->to($addresses);
          $message->from('suporte@jesistemas.com.br', 'Service Desk');
          $message->subject($solicitation->client->fantasy_name.' Status: '.strtoupper($action->status).' #'.$solicitation->created_at->format('m-y').'-'.substr('00000'.$solicitation->id, -5));
        });

    if (isset($request->photos)) {
      foreach ($request->photos as $photo) {

          $filename = $photo->store('public');
          $filename = substr($filename, 7);

          SolicitationsFile::create([
              'action_id' => $action->id,
              'filename' => $filename
          ]);
      }
    }

    if ($solicitation->status == 'Resolvido'){
      Mail::send('emails.route',[
        'solicitation' => $solicitation
      ],
      function($message) use ($solicitation){
            $message->to($solicitation->client->email);
            $message->from('suporte@jesistemas.com.br', 'Service Desk');
            $message->subject('PESQUISA DE SATISFAÇÃO - JJE AUTOMAÇÃO COMERCIAL');
      });
    }

    return redirect()->route('solicitations.index')->with('success','Status do chamado atualizado com sucesso');

  }

  public function getClient() {

    $term = Str::lower(Input::get('term'));
    $data = Client::orderBy('id', 'ASC')->get();
    $return_array = array();

    foreach ($data as $k => $v) {
        if (strpos(Str::lower($v), $term) !== FALSE) {
            $return_array[] = array(
              'value' => $v->name . ' - ' . $v->cpf_cnpj,
              'phone' =>$v->phone,
              'email' => $v->email,
              'city' => $v->city,
              'cid' => $v->id,
              'name' => $v->name
            );
        }
    }
    return $return_array;
  }

  public function sendEmailSatisfaction(Request $request){

    $id = $request->solicitation_id;
    $solicitation = Solicitation::find($id);

    Mail::send('emails.relatorioEmail', [
      'solicitation' => $solicitation
    ],
    function($message) use ($solicitation){
      $message->to('jjeautomacao@hotmail.com');
      $message->from('suporte@jesistemas.com.br', 'Service Desk');
      $message->subject('RELATÓRIO DE PESQUISA - JJE AUTOMAÇÃO COMERCIAL '.$solicitation->client->fantasy_name. ' #'.$solicitation->created_at->format('my').substr('00000'.$solicitation->id, -5));
    }
    );
  }

  public function sendSatisfaction(){
    $solicitation = Solicitation::orderBy('created_at', 'desc')
                                  ->where('status', '=', 'Resolvido')
                                  ->first()
                                  ;
    return view('emails.pesquisaDeSatisfacao',compact(
      'solicitation'
    ))->with('i');
  }

  public function getResponsibles($id) {

    $user = User::get()->where('department_id', $id);
    return $user;
  }

  // Solicitation::where([['name', 'LIKE', '%'.$request->search."%"]])
  //                             ->with('solicitations')->get();

  public function search(Request $request) {
    if($request->ajax()) {
       $output="";
       $output2="";
       $value = $request->search;
       $type = $request->tipo;
       $solicitations = Solicitation::Join('clients', 'solicitations.client_id', '=', 'clients.id')
                              ->where([
                                ['clients.'.$type, 'LIKE', '%'.$value.'%'],
                                ['status' , 'Aberto']
                                ])
                              ->whereNotIn('status', ['Resolvido', 'Cancelado'])
                              ->orderBy('id', 'DESC')
                              ->get(['solicitations.*']);
               $output.=
               '<table class="table table-bordered">'.
                 '<tr>'.
                   '<th>Código</th>'.
                   '<th>Cliente</th>'.
                   '<th>Prioridade</th>'.
                   '<th>Data/Hora</th>'.
                   '<th>Técnico</th>'.
                   '<th width="150px">Opções</th>'.
                 '</tr>';
                 if($value != ""){
                  foreach ($solicitations as $key => $solicitation) {
                    if(@$solicitation->responsible->name != null)
                      continue;
                      $name = "Nenhum";
                      $output2.=
                    '<tr>'.
                    '<td>'.$solicitation->id.'</td>'.
                    '<td>'.$solicitation->client->name.'</td>'.
                    '<td>'.$solicitation->priority.'</td>'.
                    '<td>'.$solicitation->created_at->format('d/m/Y H:i').'</td>'.
                    "<td>".$name."</td>".
                     '<td>'.
                     "<a class='btn btn-primary btn-sm' href= ".$request->path."/".$solicitation->id. "/editar >Editar</a>".
                     '</td>'.
                   '</tr>';
                 '</table>';
                  }
                  foreach ($solicitations as $key => $solicitation) {
                    if(@$solicitation->responsible->name == null)
                      continue;
                      $name = $solicitation->responsible->name;
                      $output2.=
                    '<tr>'.
                    '<td>'.$solicitation->id.'</td>'.
                    '<td>'.$solicitation->client->name.'</td>'.
                    '<td>'.$solicitation->priority.'</td>'.
                    '<td>'.$solicitation->created_at->format('d/m/Y H:i').'</td>'.
                    "<td>".$name."</td>".
                     '<td>'.
                     "<a class='btn btn-primary btn-sm' href= ".$request->path."/".$solicitation->id. "/editar >Editar</a>".
                     '</td>'.
                   '</tr>';
                 '</table>';
                  }
                }else{
                   $solicitations = Solicitation::orderBy('id','DESC')
                                                ->whereNotIn('status', ['Resolvido', 'Cancelado'])
                                                ->paginate(5);
                   foreach ($solicitations as $key => $solicitation) {
                    if(@$solicitation->responsible->name != null)
                      continue;
                      $name = "Nenhum";
                      $output2.=
                    '<tr>'.
                    '<td>'.$solicitation->id.'</td>'.
                    '<td>'.$solicitation->client->name.'</td>'.
                    '<td>'.$solicitation->priority.'</td>'.
                    '<td>'.$solicitation->created_at->format('d/m/Y H:i').'</td>'.
                    "<td>".$name."</td>".
                     '<td>'.
                     "<a class='btn btn-primary btn-sm' href= ".$request->path."/".$solicitation->id. "/editar >Editar</a>".
                     '</td>'.
                   '</tr>';
                 '</table>';
                  }
                  foreach ($solicitations as $key => $solicitation) {
                    if(@$solicitation->responsible->name == null)
                      continue;
                      $name = $solicitation->responsible->name;
                      $output2.=
                    '<tr>'.
                    '<td>'.$solicitation->id.'</td>'.
                    '<td>'.$solicitation->client->name.'</td>'.
                    '<td>'.$solicitation->priority.'</td>'.
                    '<td>'.$solicitation->created_at->format('d/m/Y H:i').'</td>'.
                    "<td>".$name."</td>".
                     '<td>'.
                     "<a class='btn btn-primary btn-sm' href= ".$request->path."/".$solicitation->id. "/editar >Editar</a>".
                     '</td>'.
                   '</tr>';
                 '</table>';
                  }
                }
              return Response($output.$output2);
    }
  }
}
