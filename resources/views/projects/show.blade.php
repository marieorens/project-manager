@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="mb-6">
        <h1 class="text-3xl">{{ $project->title }}</h1>
        <p class="text-gray-600">{{ $project->description }}</p>
    </div>

    <div class="mb-6">
        <h2 class="text-2xl mb-4">Tâches du Projet</h2>
        @foreach($project->tasks as $task)
            <div class="bg-gray-50 p-4 mb-3 rounded flex justify-between items-center">
                <div>
                    <h3 class="font-bold">{{ $task->title }}</h3>
                    <p>{{ $task->description }}</p>
                </div>
                <div class="flex items-center">
                    <span class="mr-4 badge 
                        {{ $task->status == 'non commencé' ? 'bg-red-200' : 
                           ($task->status == 'en cours' ? 'bg-yellow-200' : 'bg-green-200') }}">
                        {{ $task->status }}
                    </span>
                    <span class="mr-4">Priorité: {{ $task->priority }}</span>
                    <span>Assigné à: {{ $task->assignedUser->name }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection