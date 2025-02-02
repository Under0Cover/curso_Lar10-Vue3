<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
{
    $task = [];//@TODO - Task::create($request->all());
    return redirect()->route('tasks.index');
}
}
