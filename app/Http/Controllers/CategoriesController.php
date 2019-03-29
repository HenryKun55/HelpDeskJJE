<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
  public function index(Request $request) {
    $data = Category::orderBy('id','DESC')->paginate(5);
    return view('category.index',compact('data'))
      ->with('i', ($request->input('page', 1) - 1) * 5);
  }

  public function create() {

    return view('category.create');
  }

  public function store(Request $request) {

    $this->validate($request, [

      'name' => 'required'
    ]);

    $input = $request->all();

    Category::create($input);

    return redirect()->route('categories.index')
    ->with('success','Categoria criada com sucesso');
  }

  public function edit($id) {
    $category = Category::find($id);

    return view('category.edit', compact('category'));
  }

  public function update(Request $request, $id) {

      $this->validate($request, [

          'name' => 'required',
      ]);

      $input = $request->all();

      $category = Category::find($id);
      $category->update($input);

      $category->save();

      return redirect()
          ->route('categories.index')
          ->with('success','Categoria alterada com sucesso!');
  }
}
