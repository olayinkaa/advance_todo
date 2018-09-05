<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;

class TodoController extends Controller
{
    //
    public function index()
    {
        $tasks = Task::all();
        return view('todos.index',compact('tasks'));
    }
    //
    public function store()
    {
        if($request->input('task'))
        {
            $task = new Task;
            $task->content = $request->task;
            Auth::user()->tasks()->save($task);
        }
        return redirect()->back();
    }

    //
    
    public function edit($id)

    {
        $task = Task::find($id);
        return view('todos.edit')->with('task',$task);
    }

    public function update($id)
    {
        return view('todos.edit');
    }

    //
}
