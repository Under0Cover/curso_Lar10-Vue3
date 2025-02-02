@extends('layouts.app')

@section('content')
    <h1>Task List</h1>

    @foreach($tasks as $task)
        <div>
            <p>{{ $task->description }}</p>
            <p>Status: {{ $task->status }}</p>
            <p>Created at: {{ $task->created_at }}</p>
        </div>
    @endforeach
@endsection
