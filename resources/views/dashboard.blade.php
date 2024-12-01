@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h1 class="text-3xl mb-6">Tableau de Bord</h1>
    
    <div class="grid grid-cols-3 gap-4">
        <div class="bg-blue-100 p-4 rounded">
            <h2 class="text-xl">Projets en cours</h2>
            <p class="text-4xl font-bold">{{ $ongoingProjects }}</p>
        </div>
        <div class="bg-green-100 p-4 rounded">
            <h2 class="text-xl">Tâches terminées</h2>
            <p class="text-4xl font-bold">{{ $completedTasks }}</p>
        </div>
        <div class="bg-yellow-100 p-4 rounded">
            <h2 class="text-xl">Tâches en cours</h2>
            <p class="text-4xl font-bold">{{ $inProgressTasks }}</p>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-2xl mb-4">Mes Projets Récents</h2>
        @foreach($recentProjects as $project)
            <div class="bg-gray-50 p-4 mb-4 rounded flex justify-between items-center">
                <div>
                    <h3 class="text-lg font-bold">{{ $project->title }}</h3>
                    <p>{{ $project->description }}</p>
                </div>
                <div>
                    <span class="badge {{ $project->status == 'en cours' ? 'bg-yellow-200' : 'bg-green-200' }}">
                        {{ $project->status }}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
