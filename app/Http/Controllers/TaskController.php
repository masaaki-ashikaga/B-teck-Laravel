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

    public function delete(Request $request)
    {
        Task::find($request->id)->delete();
        return redirect()->back();
    }

}
