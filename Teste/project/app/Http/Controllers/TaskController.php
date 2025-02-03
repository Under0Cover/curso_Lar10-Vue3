<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('userID', auth()->id())
            ->where('taskActive', 'S')->get();
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

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function deactivate(Request $request)
    {
        $task = Task::find($request->input('taskId'));
    
        if ($task) {
            $task->taskActive = 'N';
            $task->save();
    
            return redirect()->route('tasks.index')->with('success', 'Task successfully deactivated!');
        }
    
        return redirect()->route('tasks.index')->with('error', 'Task not found!');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }
    
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'taskName' => 'required|string|max:255',
            'taskDescription' => 'required|string',
            'taskStatus' => 'required|in:P,C',
        ]);
    
        $task->taskName = $validatedData['taskName'];
        $task->taskDescription = $validatedData['taskDescription'];
        $task->taskStatus = $validatedData['taskStatus'];
    
        if ($task->taskStatus == 'C') {
            $task->updated_at = now();
        } else {
            $task->updated_at = null;
        }
    
        $task->save();
    
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully!');
    }
    
    public function complete(Task $task)
    {
        $taskId = $request->input('taskId');
        $task = Task::findOrFail($taskId);
        $task->taskStatus = 'C';
        $task->updated_at = now();
        $task->save();
    
        return redirect()->route('tasks.index')->with('success', 'Task marked as completed!');
    }
}
