<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function getAll() {

        // $tasks=['Compra', 'ATM', 'Yamaha Service'];
        
        $tasks = \App\Task::all();
        
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    public function create() {

        $task = new \App\Task();
        $task->title = request('title');
        $task->completed = false;
        $task->save();

        return redirect('/tasks');
    }

    public function toggleComplete($id) {

        $task = \App\Task::findOrFail($id);
        $task->completed = !$task->completed;
        $task->save();

        return redirect('/tasks');
    }
    
    public function edit($id) {
        $task = \App\Task::findOrFail($id);
        
        return view('tasks-edit', [
            't' => $task
            ]);
        }
        
    public function update($id) {
        $task = \App\Task::findOrFail($id);
        $task->title = request('title');
        
        $task->save();
    
        return redirect('/tasks');
    }

    public function delete($id) {
        
        \App\Task::findOrFail($id)->delete();
    
        return redirect('/tasks');
    }
}
