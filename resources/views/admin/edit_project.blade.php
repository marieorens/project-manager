@extends('layouts.app')

@section('content')
    <h1>Modifier le projet : {{ $project->title }}</h1>

    <form action="{{ route('admin.update_project', $project->id) }}" method="POST">
        @csrf
        <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
        <input type="text" id="title" class="w-full p-2 border border-gray-300 rounded mt-2" name="title" required>
        
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea id="description" class="w-full p-2 border border-gray-300 rounded mt-2" name="description"></textarea>
        
        <label for="status" class="block text-sm font-medium text-gray-700">Statut du projet</label>
            <select name="status" id="status" class="w-full p-2 border border-gray-300 rounded mt-2">
       
                <option value="en cours">En cours</option>
                <option value="terminé">Terminé</option>
            </select>
       
            <label for="deadline" class="block text-sm font-medium text-gray-700" >Date limite</label>
        <input type="date" id="deadline" name="deadline" class="w-full p-2 border border-gray-300 rounded mt-2"  required><br><br>
        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded mt-6">Créer le projet</button>
    </form>
@endsection
