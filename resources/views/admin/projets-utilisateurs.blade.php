<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs et projets</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Gestion des utilisateurs et projets</h1>
        
        <table class="table-auto w-full bg-white shadow-lg rounded-lg">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border p-2 text-left">Nom</th>
                    <th class="border p-2 text-left">Email</th>
                    <th class="border p-2 text-left">Projets</th>
                    <th class="border p-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b">
                        <td class="border p-2">{{ $user->name }}</td>
                        <td class="border p-2">{{ $user->email }}</td>
                        <td class="border p-2">
                            @if ($user->projects->isEmpty())
                                <p>Aucun projet</p>
                            @else
                                <ul>
                                    @foreach ($user->projects as $project)
                                        <li class="mb-2">
                                            {{ $project->title }}
                                            <div class="inline-flex space-x-2 ml-2">
                                                <a href="{{ route('admin.edit_project_form', $project->id) }}" 
                                                   class="text-blue-500 hover:underline">Modifier</a>
                                                <form action="{{ route('admin.delete_project', $project->id) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:underline">Supprimer</button>
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td class="border p-2">
                            <div class="flex flex-col space-y-2">
                                <a href="{{ route('admin.create_project', $user->id) }}" 
                                   class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">
                                   Créer Projet
                                </a>
                                <a href="{{ route('admin.edit_user', $user->id) }}" 
                                   class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                                   Modifier Utilisateur
                                </a>
                                <form action="{{ route('admin.delete_user', $user->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                                        Supprimer Utilisateur
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
