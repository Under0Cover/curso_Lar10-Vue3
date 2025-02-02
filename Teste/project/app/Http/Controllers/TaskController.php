<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('tasks.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'taskDescription' => 'required|max:255',
            'taskStatus' => 'required|in:P,C',
            'taskActive' => 'required|in:S,N',
        ]);

        Task::create([
            'taskDescription' => $validated['taskDescription'],
            'taskStatus' => $validated['taskStatus'],
            'taskActive' => $validated['taskActive'],
            'user_id' => auth()->user()->id,
        ]);
    }

    public function create()
    {
        return view('tasks.create');
    }
}
