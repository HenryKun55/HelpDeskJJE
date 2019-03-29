<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BranchLine;
use App\Department;
use Hash;
use DB;

class UsersController extends Controller
{
	public function index(Request $request) {
    $branchLines = BranchLine::all();
		$data = User::orderBy('name','ASC')->paginate(5);
		return view('users.index',compact('data', 'branchLines'))
			->with('i', ($request->input('page', 1) - 1) * 5);
	}

	public function panel(Request $request) {
		$data = User::orderBy('id','DESC')->where('department_id', 3)->paginate(5);
		return view('users.panel',compact('data'))
			->with('i', ($request->input('page', 1) - 1) * 5);
	}

	public function status(Request $request) {

		$status = $request->input('status');
		$userid = $request->input('userid');
		$user = User::find($userid);
        $user->status = $status;

        $user->save();

        return $user;
	}

	public function create() {

    $branchLines = BranchLine::pluck('number','id');

		$departments = Department::pluck('name','id');

		return view('users.create', compact('branchLines', 'departments'));
	}


    public function store(Request $request) {

        $this->validate($request, [

            'name' => 'required',
            'department' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|same:confirm-password'
        ]);


        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        $user->branch_line_id = $input['branch-line'];

				$user->department_id = $input['department'];

        $user->save();

        return redirect()->route('users.index')
        ->with('success','Usuário criado com sucesso');
    }

    public function edit($id) {

    	$user = User::find($id);
			$branchLines = BranchLine::pluck('number','id');
			$departments = Department::pluck('name', 'id');
			$userBranchLine = $user->branch_line_id;
			$userDepartment = $user->department_id;
        return view('users.edit',compact('user', 'branchLines', 'userBranchLine', 'departments', 'userDepartment'));
    }

    public function destroy($id) {

    	User::find($id)->delete();
        return redirect()
        	->route('users.index')
            ->with('success','Usuário excluído com sucesso!');
    }

    public function update(Request $request, $id) {

        $this->validate($request, [
        	'name' => 'required',
        	'branch-line' => 'required',
        	'department' => 'required',
        	'email' => 'required|email',
        	'password' => 'same:confirm-password'
        ]);

        $input = $request->all();

        if(!empty($input['password'])) {
        	$input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $user = User::find($id);
				$user->branch_line_id = $input['branch-line'];
				$user->department_id = $input['department'];
        $user->update($input);

        return redirect()
        	->route('users.index')
            ->with('success','Usuário alterado com sucesso!');
    }

	public function search(Request $request) {
		if($request->ajax()) {
			$output="";
			$output2="";
			$value = $request->search;
			$users = User::orderBy('name', 'ASC')
						->where('name', 'LIKE', '%'.$value.'%')
						->get();
			$output.=
			'<table class="table table-bordered">'.
				'<tr>'.
					'<th>Nome</th>'.
					'<th>Email</th>'.
					'<th>Ramal</th>'.
					'<th>Setor</th>'.
					'<th width="150px">Opções</th>'.
				'</tr>';
				if($value != ""){
				foreach ($users as $key => $user ) {
				$output2.=
				'<tr>'.
					'<td>'.$user->name.'</td>'.
					'<td>'.$user->email.'</td>'.
					'<td>'.@$user->branchLine->number.'</td>'.
					'<td>'.@$user->department->name .'</td>'.
					'<td>'.
					"<a class='btn btn-primary btn-sm' href= ".$request->path."/".$user->id. "/edit >Editar</a>".
					'</td>'.
				'</tr>';
				'</table>';
				}
			}else{
				$users = User::orderBy('name','ASC')
								->paginate(5);
				foreach ($users as $key => $user)
				$output2.=  
				'<tr>'.
					'<td>'.$user->name.'</td>'.
					'<td>'.$user->email.'</td>'.
					'<td>'.@$user->branchLine->number.'</td>'.
					'<td>'.@$user->department->name.'</td>'.
					'<td>'.
					"<a class='btn btn-primary btn-sm' href= ".$request->path."/".$user->id. "/edit >Editar</a>".
					'</td>'.
				'</tr>';
				'</table>';
				}
			}
				return Response($output.$output2);
	}
}
		

