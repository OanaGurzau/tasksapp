<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
  public function __construct(){
    $this->middleware('auth', ['except' => ['index', 'show']]);
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createtask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'name'=>'required',

        ]);

        // Create  tasks
        $task = new Task;
        $task->name = $request->input('name');
        $task->description = $request->input('description', false);
        $task->user_id = auth()->user()->id;

        $task->save();

        return redirect('/home')->with('success', 'Task-ul a fost adaugat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $task = Task::find($id);

        return view('showtask')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $task = Task::find($id);

        return view('edittask')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'name'=>'required',

      ]);

      // Create  tasks
      $task = Task::find($id);
      $task->name = $request->input('name');
      $task->description = $request->input('description', false);
      $task->user_id = auth()->user()->id;

      $task->save();

      return redirect('/home')->with('success', 'Task-ul a fost editat cu success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task= Task::find($id);
        $task->delete();

      return redirect('/home')->with('success', 'Task-ul a fost eliminat cu succes!');
    }
}
