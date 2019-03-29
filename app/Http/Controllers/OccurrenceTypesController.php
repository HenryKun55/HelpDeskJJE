<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OccurrenceType;

class OccurrenceTypesController extends Controller
{
  public function index(Request $request) {
		$data = OccurrenceType::orderBy('id','DESC')->paginate(5);
		return view('occurrence-types.index',compact('data'))
			->with('i', ($request->input('page', 1) - 1) * 5);
	}

  public function create() {

		return view('occurrence-types.create');
	}

  public function store(Request $request) {

    $this->validate($request, [

    	'name' => 'required'
    ]);

    $input = $request->all();

    OccurrenceType::create($input);

    return redirect()->route('occurrence-types.index')
   	->with('success','Tipo de ocorrência criado com sucesso');
  }

  public function edit($id) {
    $occurrenceType = OccurrenceType::find($id);

    return view('occurrence-types.edit', compact('occurrenceType'));
  }

  public function update(Request $request, $id) {

      $this->validate($request, [

          'name' => 'required',
      ]);

      $input = $request->all();

      $occurrenceType = OccurrenceType::find($id);
      $occurrenceType->update($input);

      $occurrenceType->save();

      return redirect()
          ->route('occurrence-types.index')
          ->with('success','Tipo de ocorrência alterado com sucesso!');
  }
}
