@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-semibold mb-6 text-center">Create Task</h1>
            
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <!-- Task Name -->
                <div class="mb-4">
                    <label for="taskName" class="block text-sm font-medium text-gray-700">Task Name</label>
                    <input type="text" id="taskName" name="taskName" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" />
                </div>

                <!-- Task Description -->
                <div class="mb-4">
                    <label for="taskDescription" class="block text-sm font-medium text-gray-700">Task Description</label>
                    <textarea id="taskDescription" name="taskDescription" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                </div>

                <!-- Task Status -->
                <div class="mb-4">
                    <label for="taskStatus" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="taskStatus" name="taskStatus" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="P">Pending</option>
                        <option value="C">Completed</option>
                    </select>
                </div>

                <!-- Task Active -->
                <div class="mb-4">
                    <label for="taskActive" class="block text-sm font-medium text-gray-700">Active</label>
                    <select id="taskActive" name="taskActive" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="S">Yes</option>
                        <option value="N">No</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-gray-600 text-black py-2 px-4 rounded-md hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gary-200 focus:ring-opacity-50">
                    Save Task
                </button>                
            </form>
        </div>
    </div>
@endsection
