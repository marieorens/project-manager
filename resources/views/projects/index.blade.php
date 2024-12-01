@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl">Mes Projets</h1>
        <a href="{{ route('projects.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
            Créer un nouveau projet
        </a>
    </div>

    @foreach($projects as $project)
        <div class="bg-gray-50 p-4 mb-4 rounded flex justify-between items-center">
            <div>
                <h2 class="text-xl font-bold">{{ $project->title }}</h2>
                <p>{{ Str::limit($project->description, 100) }}</p>
            </div>
            <div class="flex items-center">
                <span class="mr-4">Date limite: {{ $project->deadline }}</span>
                <a href="{{ route('projects.show', $project->id) }}" class="bg-green-500 text-white px-3 py-1 rounded mr-2">
                    Détails
                </a>
                <a href="{{ route('projects.tasks.create', $project->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded">
                    Ajouter Tâche
                </a>
            </div>
        </div>
    @endforeach
</div>
@endsection