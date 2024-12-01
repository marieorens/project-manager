@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-md mx-auto">
    <h1 class="text-2xl mb-6">Créer une Nouvelle Tâche</h1>
    <form method="POST" action="{{ route('projects.tasks.store', $project->id) }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-2">Titre</label>
            <input type="text" name="title" required class="w-full p-2 border rounded">
        </div>
        <div class="mb-4">
            <label class="block mb-2">Description</label>
            <textarea name="description" class="w-full p-2 border rounded" rows="4"></textarea>
        </div>
        <div class="mb-4">
            <label class="block mb-2">Statut</label>
            <select name="status" class="w-full p-2 border rounded">
                <option value="non commencé">Non commencé</option>
                <option value="en cours">En cours</option>
                <option value="terminé">Terminé</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-2">Priorité</label>
            <select name="priority" class="w-full p-2 border rounded">
                <option value="basse">Basse</option>
                <option value="moyenne">Moyenne</option>
                <option value="haute">Haute</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block mb-2">Assigné à</label>
            <select name="assigned_user_id" class="w-full p-2 border rounded">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">
            Créer Tâche
        </button>
    </form>
</div>
@endsection