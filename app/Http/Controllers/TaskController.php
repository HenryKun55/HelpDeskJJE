<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\TaskAction;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $data = Task::orderBy('id','DESC')->where('user_id', \Auth::user()->id)->whereNotIn('status', ['Feito'])->paginate(5);
        return view('tasks.index',compact('data'))
          ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

		return view('tasks.create');
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
          'description'  => 'required',
          'priority' => 'required',
          'comment'  => 'required'
        ]);
    
        $input = $request->all();
        $input['user_id'] = \Auth::user()->id;

        $task = Task::create($input);  
        $task->save();
        
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $task = Task::find($id);
        return view('tasks.edit', compact('task'))->with('i');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $taskAction = TaskAction::create([
          'date' => $request->date,
          'hour' => $request->hour,
          'status' => $request->status,
          'priority' => $request->priority,
          'comment' => $request->comment,
          'task_id' => $id
        ]);

        $task = Task::find($id);
        $task->status = $request->status;
        $task->save();
    
        return redirect()->route('tasks.index', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
