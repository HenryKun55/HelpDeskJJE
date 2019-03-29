<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Department;
use App\User;

class ClientController extends Controller
{
	public function index(Request $request) {
		$data = Client::orderBy('name','ASC')->paginate(5);
		return view('clients.index',compact('data'))
			->with('i', ($request->input('page', 1) - 1) * 5);
	}

	public function create() {

		$departments = Department::pluck('name','id');

		$responsibles = User::pluck('name','id');

		return view('clients.create', compact('departments', 'responsibles'));
	}

	public function store(Request $request) {

        $this->validate($request, [

        	'name' 									=> 'required',
        	'email'									 => 'required|email|unique:users,email',
          'cpf_cnpj'               => 'required',
          'address'                => 'required',
          'district'               => 'required',
          'related_products'       => 'required',
          'responsible'            => 'required',
          'zip_code'               => 'required',
          'number'                 => 'required',
          'city'                   => 'required',
          'state'                  => 'required',
          'phone'                  => 'required',
          'responsible_department' => 'required',
        ]);



		$input = $request->all();

		$client = Client::create($input);

    $client->save();

    return redirect()->route('clients.index')
   	->with('success','Cliente criado com sucesso');
    }

    public function destroy($id) {

    	Client::find($id)->delete();
        return redirect()
        	->route('clients.index')
            ->with('success','Cliente excluído com sucesso!');
    }

    public function edit($id) {
    	$client = Client::find($id);
			$departments = Department::pluck('name','id');
			$responsibles = User::pluck('name','id');

			$responsible = $client->responsible;
			$responsibleDepartment = $client->responsible_department;

      return view('clients.edit', compact('client', 'departments', 'responsibles', 'responsible', 'responsibleDepartment'));
    }

    public function update(Request $request, $id) {

        $this->validate($request, [

            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'name'                   => 'required',
            'cpf_cnpj'               => 'required',
            'address'                => 'required',
            'district'               => 'required',
            'email'                  => 'required',
            'related_products'       => 'required',
            'responsible'            => 'required',
            'zip_code'               => 'required',
            'number'                 => 'required',
            'city'                   => 'required',
            'state'                  => 'required',
            'phone'                  => 'required',
            'responsible_department' => 'required'
        ]);

				$input = $request->all();

        $client = Client::find($id);
        $client->update($input);

        $client->save();

        return redirect()
            ->route('clients.index')
            ->with('success','Usuário alterado com sucesso!');
    }

    public function search(Request $request) {
		if($request->ajax()) {
		   $output="";
		   $output2="";
		   $value = $request->search;
		   $type = $request->tipo;
		   $clients = Client::orderBy('name', 'ASC')
							   ->where($type, 'LIKE', '%'.$value.'%')
							   ->get();
			$output.=
			'<table class="table table-bordered">'.
				'<tr>'.
					'<th>Razão/Nome</th>'.
					'<th>CPF/CNPJ</th>'.
					'<th>E-mail</th>'.
					'<th>Cidade</th>'.
					'<th width="180px">Opções</th>'.
				'</tr>';
			if($value != ""){
				foreach ($clients as $key => $client ) {
					$output2.=
					'<tr>'.
						'<td>'.$client->name.'</td>'.
						'<td>'.$client->cpf_cnpj.'</td>'.
						'<td>'.$client->email.'</td>'.
						'<td>'.@$client->city.'</td>'.
						'<td>'.
							"<a class='btn btn-info btn-sm' href= ".$request->path."/".$client->id. "/visualizar >Visualizar</a> ".
							"<a class='btn btn-primary btn-sm' href= ".$request->path."/".$client->id. "/edit >Editar</a>".
						'</td>'.
					'</tr>';
				'</table>';
				}
			}else{
				$clients = Client::orderBy('name', 'ASC')->paginate(5);
					foreach ($clients as $key => $client) {
						$output2.=
							'<tr>'.
								'<td>'.$client->name.'</td>'.
								'<td>'.$client->cpf_cnpj.'</td>'.
								'<td>'.$client->email.'</td>'.
								'<td>'.@$client->city.'</td>'.
								'<td>'.
									"<a class='btn btn-info btn-sm' href= ".$request->path."/".$client->id. "/visualizar >Visualizar</a> ".
									"<a class='btn btn-primary btn-sm' href= ".$request->path."/".$client->id. "/edit >Editar</a>".
								'</td>'.
							'</tr>';
						'</table>';
					}
				}
			return Response($output.$output2);
		}
	}
		public function show($id) {
			$client = Client::find($id);

			return view('clients.show',compact('client'));
		}
}
