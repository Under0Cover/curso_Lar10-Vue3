<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('userId', auth()->id())->get();
        return view('tasks.index', compact('tasks'));    
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'taskName' => 'required|string|max:255',
            'taskDescription' => 'required|max:255',
            'taskStatus' => 'required|in:P,C',
            'taskActive' => 'required|in:S,N',
        ]);

        Task::create([
            'taskName' => $request->taskName,
            'taskDescription' => $request->taskDescription,
            'taskStatus' => $request->taskStatus,
            'taskActive' => $request->taskActive,
            'userID' => auth()->id(),
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function deactivateTask($id)
    {
        $task = Task::findOrFail($id);

        $task->taskActive = 'N';

        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task deactivated successfully.');
    }
}
