@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-3xl mx-auto">
    <h1 class="text-3xl mb-6">Créer un Nouveau Projet</h1>

    <form method="POST" action="{{ route('projects.sauvegarder_nouveau_projet') }}">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Titre du projet</label>
            <input type="text" name="title" id="title" required class="w-full p-2 border border-gray-300 rounded mt-2" placeholder="Entrez le titre du projet">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="4" class="w-full p-2 border border-gray-300 rounded mt-2" placeholder="Décrivez brièvement votre projet"></textarea>
        </div>

        <div class="mb-4">
            <label for="deadline" class="block text-sm font-medium text-gray-700">Date limite</label>
            <input type="date" name="deadline" id="deadline" required class="w-full p-2 border border-gray-300 rounded mt-2">
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-700">Statut du projet</label>
            <select name="status" id="status" class="w-full p-2 border border-gray-300 rounded mt-2">
       
                <option value="en cours">En cours</option>
                <option value="terminé">Terminé</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="collaborators" class="block text-sm font-medium text-gray-700">Collaborateurs</label>
            <select name="collaborators[]" id="collaborators" multiple class="w-full p-2 border border-gray-300 rounded mt-2">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded mt-6">
            Créer le projet
        </button>
    </form>
</div>
@endsection
