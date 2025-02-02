@extends('layouts.app')

@section('content')
    <h1>Create Task</h1>
    
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div>
            <label for="taskDescription">Task Description</label>
            <textarea id="taskDescription" name="taskDescription" required></textarea>
        </div>

        <div>
            <label for="taskStatus">Status</label>
            <select id="taskStatus" name="taskStatus" required>
                <option value="P">Pending</option>
                <option value="C">Completed</option>
            </select>
        </div>

        <div>
            <label for="taskActive">Active</label>
            <select id="taskActive" name="taskActive" required>
                <option value="S">Yes</option>
                <option value="N">No</option>
            </select>
        </div>

        <button type="submit">Save Task</button>
    </form>
@endsection