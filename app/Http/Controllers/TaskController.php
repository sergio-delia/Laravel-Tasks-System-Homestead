<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('tasks.index')->with('tasks',$tasks);
    }

    public function create(){

        return view('tasks.create');
    }

    public function store(){
        
        //dd(request()->all());
        $task = new Task();
        $task->titolo = request()->titolo;
        $task->descrizione = request()->descrizione;
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function edit($id){
      //  dd($id);

      $task = Task::findOrFail($id);
      return view('tasks.edit')->with('task',$task);
        
    }

    public function update($id){

        $task = Task::findOrFail($id);
        $task->titolo = request()->titolo;
        $task->descrizione = request()->descrizione;
        $task->save();
        return redirect()->route('tasks.index');
    }

    public function destroy($id){

        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index');
    }

    public function complete($id){

        $task = Task::findOrFail($id);
        $task->completed = 1;
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function uncomplete($id){

        $task = Task::findOrFail($id);
        $task->completed = 0;
        $task->save();

        return redirect()->route('tasks.index');
    }
}
