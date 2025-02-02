@section('head')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection
@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 w-3/4">
    <h1 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Task Details</h1>

    <form action="{{ route('tasks.update', $task->taskId) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="taskName" class="block text-sm font-medium text-gray-700">Task Name</label>
            <input type="text" id="taskName" name="taskName" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" value="{{ $task->taskName }}" required>
        </div>

        <div class="mb-4">
            <label for="taskDescription" class="block text-sm font-medium text-gray-700">Task Description</label>
            <textarea id="taskDescription" name="taskDescription" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>{{ $task->taskDescription }}</textarea>
        </div>

        <div class="mb-4">
            <label for="taskStatus" class="block text-sm font-medium text-gray-700">Task Status</label>
            <select id="taskStatus" name="taskStatus" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                <option value="P" {{ $task->taskStatus == 'P' ? 'selected' : '' }}>Pending</option>
                <option value="C" {{ $task->taskStatus == 'C' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <!-- Campos de Data com disabled -->
        <div class="mb-4">
            <label for="created_at" class="block text-sm font-medium text-gray-700">Created At</label>
            <input type="text" id="created_at" name="created_at" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" value="{{ $task->created_at->format('Y-m-d H:i:s') }}" disabled>
        </div>

        <div class="mb-4">
            <label for="updated_at" class="block text-sm font-medium text-gray-700">Completed At</label>
            <input type="text" id="updated_at" name="updated_at" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" value="{{ $task->updated_at ? $task->updated_at->format('Y-m-d H:i:s') : '' }}" disabled>
        </div>

        <!-- Botões lado a lado -->
        <div class="flex justify-between space-x-4">
            <!-- Botão Save com a mesma ação do botão Complete -->
            <button type="submit" class="bg-gray-400 text-black py-2 px-4 rounded-md">Save</button>

            <!-- Botão Delete com ação de desativar a tarefa -->
            <form action="{{ route('tasks.deactivate', $task->taskId) }}" method="POST">
                @csrf
                @method('PATCH')
                <button 
                    type="submit" 
                    class="bg-gray-400 text-black py-2 px-4 rounded-md buttonCustomForm" 
                    {{ auth()->user()->permition !== 'S' ? 'disabled' : '' }}>
                    Delete
                </button>
            </form>
        </div>
    </form>
</div>
@endsection
