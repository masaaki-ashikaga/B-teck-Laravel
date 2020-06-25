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
        $task = new Task;
        $task->comment = $request->comment;
        $task->status = 0;
        $task->save();
        return redirect()->back();
    }

    public function delete(Request $request, Task $task)
    {
        Task::find($request->id)->delete();
        return redirect()->back();
    }

    public function statusUpdate(Request $request, Task $task)
    {
        $submit_task = Task::find($request->id);
        $task->changeStatus($submit_task);
        return redirect()->back();

    }
}
