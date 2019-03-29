<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Jobs\SendScheduleEmail;
use App\CRM;
use App\CRMAction;
use App\User;
use App\Client;


class CRMController extends Controller
{

  public function index(Request $request) {
    $data = CRM::orderBy('id','DESC')->whereNotIn('status', ['Vendido', 'Não Vendido'])->paginate(5);
    return view('crm.index',compact('data'))
      ->with('i', ($request->input('page', 1) - 1) * 10);
  }


  public function create() {

		$users = User::pluck('name', 'id');

		return view('crm.create', compact('users'));
	}

  public function store(Request $request) {

    $this->validate($request, [
      'client'  => 'required',
      'seller_id'  => 'required',
    ]);

    $input = $request->all();

    $crm = CRM::create($input);

    $crm->save();

    Mail::send('emails.aberturaCRM', [
      'crm' => $crm
    ], function($message) use ($crm){
          $addresses = [
            $crm->seller->email,
            'comercial@jesistemas.com.br',
            'jjeautomacao@hotmail.com'
          ];

          $message->to($addresses);
          $message->from('comercial@jesistemas.com.br', 'CRM');
          $message->subject($crm->client.' Status: ABERTO #'.$crm->created_at->format('m-y').'-'.substr('00000'.$crm->id, -5));
        });

    return redirect()->route('crm.edit', $crm->id);
    }

    public function edit($id) {
      $crm = CRM::find($id);
      $users = User::pluck('name','id');
      return view('crm.edit', compact('crm', 'users'))->with('i');
    }

    public function update(Request $request, $id) {

      $crmaction = CRMAction::create([
        'date' => $request->date,
        'hour' => $request->hour,
        'responsible_id' => $request->responsible_id,
        'product' => $request->product,
        'status' => $request->status,
        'contact_date' => $request->contact_date,
        'contact_hour' => $request->contact_hour,
        'description' => $request->description,
        'c_r_m_id' => $id
      ]);

      $crmaction->save();

      $crm = CRM::find($id);

      if (isset($request->contact_date)) {

        $currentDate = $crmaction->created_at;

        $sendDate = Carbon::createFromFormat('Y-m-d H:i', $crmaction->contact_date .' '.$crmaction->contact_hour);

        $timeToSend = $sendDate->diffInSeconds($currentDate);

        $recipients = [
          $crmaction->c_r_m->seller->email
        ];

        $this->dispatch((new SendScheduleEmail($recipients, $crmaction, $crm))->delay($timeToSend));
      }

      $crm = CRM::find($id);

      $crm->status = $crmaction->status;

      $crm->save();

      Mail::send('emails.statusCRM', [
        'crm' => $crm,
        'crmaction' => $crmaction
      ], function($message) use ($crm, $crmaction){
            $addresses = [
	            $crmaction->c_r_m->seller->email
            ];

            $message->to($addresses);

            $message->from('comercial@jesistemas.com.br', 'CRM');

            $message->subject($crm->client.' Status: '.$crm->status.' #'.$crm->created_at->format('m-y').'-'.substr('00000'.$crm->id, -5));

          });

      if ($crm->status == 'Vendido' || $crm->status == 'Não Vendido') {
        return redirect()->route('crm.index');
      }

      return redirect()->route('crm.edit', $request->id);
    }

    public function search(Request $request) {
      if($request->ajax()) {
         $output="";
         $output2="";
         $value = $request->search;
         $crms = CRM::orderBy('id', 'DESC')
                   ->where('client', 'LIKE', '%'.$value.'%')
                   ->whereNotIn('status', ['Vendido', 'Não Vendido'])
                   ->get();
        $output.=
        '<table class="table table-bordered">'.
          '<tr>'.
            '<th>Cliente</th>'.
            '<th>Indicador</th>'.
            '<th>Vendedor</th>'.
            '<th>Status</th>'.
            '<th width="150px">Opções</th>'.
          '</tr>';
        if($value != ""){
          foreach ($crms as $key => $crm ) {
            if(@$crm->indicator != null)
              continue;
              $name = "Nenhum";
            $output2.=
            '<tr>'.
              '<td>'.$crm->client.'</td>'.
              '<td>'.$name.'</td>'.
              '<td>'.$crm->seller->name.'</td>'.
              '<td>'.@$crm->status.'</td>'.
              '<td>'.
                "<a class='btn btn-primary btn-sm' href= ".$request->path."/".$crm->id. "/edit >Editar</a>".
              '</td>'.
            '</tr>';
          '</table>';
          }
          foreach ($crms as $key => $crm ) {
            if(@$crm->indicator == null)
              continue;
              $name = "Nenhum";
            $output2.=
            '<tr>'.
              '<td>'.$crm->client.'</td>'.
              '<td>'.$name.'</td>'.
              '<td>'.$crm->seller->name.'</td>'.
              '<td>'.@$crm->status.'</td>'.
              '<td>'.
                "<a class='btn btn-primary btn-sm' href= ".$request->path."/".$crm->id. "/edit >Editar</a>".
              '</td>'.
            '</tr>';
          '</table>';
          }
        }else{
          $crms = CRM::orderBy('id', 'DESC')
                    ->whereNotIn('status', ['Vendido', 'Não Vendido'])
                    ->paginate(5);
          foreach ($crms as $key => $crm ) {
            if(@$crm->indicator != null)
              continue;
              $name = "Nenhum";
            $output2.=
            '<tr>'.
              '<td>'.$crm->client.'</td>'.
              '<td>'.$name.'</td>'.
              '<td>'.$crm->seller->name.'</td>'.
              '<td>'.@$crm->status.'</td>'.
              '<td>'.
                "<a class='btn btn-primary btn-sm' href= ".$request->path."/".$crm->id. "/edit >Editar</a>".
              '</td>'.
            '</tr>';
          '</table>';
          }
          foreach ($crms as $key => $crm ) {
            if(@$crm->indicator == null)
              continue;
              $name = "Nenhum";
            $output2.=
            '<tr>'.
              '<td>'.$crm->client.'</td>'.
              '<td>'.$name.'</td>'.
              '<td>'.$crm->seller->name.'</td>'.
              '<td>'.@$crm->status.'</td>'.
              '<td>'.
                "<a class='btn btn-primary btn-sm' href= ".$request->path."/".$crm->id. "/edit >Editar</a>".
              '</td>'.
            '</tr>';
          '</table>';
          }
        }
        return Response($output.$output2);
      }
    }
}
