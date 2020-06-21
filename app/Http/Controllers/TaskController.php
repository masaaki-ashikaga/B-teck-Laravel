<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $items = Task::all();
        return view('tasks.index', compact('items'));
    }

    public function create(TaskRequest $request)
    {
        // $this->validate($request, Task::$rules);
        // $form = $request->all();
        // unset($form['_token']);
        // $task->fill($form)->save();
        $task = new Task;
        $task->comment = $request->comment;
        $task->status = 0;
        $task->save();
        return redirect()->back();
    }

    public function change(Request $request, Task $task)
    {
        if($request->input('changeStatus'))
        {
            $submit_task = Task::find($request->id);

            $task->changeStatus($submit_task);
            return redirect()->back();
        }
        elseif($request->input('del'))
        {
            Task::find($request->id)->delete();
            return redirect()->back();
        }
    }
}
