@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center max-h-[50vh] border-2 border-gray-300">
    <div class="container mt-4 w-3/4">
        
        <h1 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Task List</h1>

        <div class="overflow-x-auto">
            <table class="table table-bordered table-striped w-full border-2 border-black">
                
                <thead class="thead-light border-b border-gray-300">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300">Task Name</th>
                        <th class="px-4 py-2 border border-gray-300">Status</th>
                        <th class="px-4 py-2 border border-gray-300">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="px-4 py-2 border border-gray-300">{{ $task->taskName }}</td>

                            <td class="px-4 py-2 border border-gray-300 text-center">{{ $task->taskStatus }}</td>

                            <td class="px-4 py-2 border border-gray-300 text-center">
                                <!-- Edit button with correct taskId -->
                                <button 
                                    class="btn btn-secondary btn-sm px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-300 transition"
                                    onclick="window.location.href='{{ route('tasks.show', ['task' => $task->taskId, 'action' => 'edit']) }}'">
                                    Edit
                                </button>
                                
                                <!-- Delete button with correct taskId -->
                                <button 
                                    class="btn btn-danger btn-sm px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-300 transition ml-2"
                                    onclick="window.location.href='{{ route('tasks.show', ['task' => $task->taskId, 'action' => 'delete']) }}'">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
