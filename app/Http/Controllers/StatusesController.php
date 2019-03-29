<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class StatusesController extends Controller
{
  public function index(Request $request) {
    $data = Status::orderBy('id','DESC')->paginate(5);
    return view('statuses.index',compact('data'))
      ->with('i', ($request->input('page', 1) - 1) * 5);
  }

  public function create() {

    return view('statuses.create');
  }

  public function store(Request $request) {

    $this->validate($request, [

      'name' => 'required'
    ]);

    $input = $request->all();

    Status::create($input);

    return redirect()->route('statuses.index')
    ->with('success','Status criado com sucesso');
  }

  public function edit($id) {
    $status = Status::find($id);

    return view('statuses.edit', compact('status'));
  }

  public function update(Request $request, $id) {

      $this->validate($request, [

          'name' => 'required',
      ]);

      $input = $request->all();

      $status = Status::find($id);
      $status->update($input);

      $status->save();

      return redirect()
          ->route('statuses.index')
          ->with('success','Status alterado com sucesso!');
  }
}
