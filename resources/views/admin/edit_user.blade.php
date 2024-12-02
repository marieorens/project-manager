<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Modifier Utilisateur</h1>
        
        <form action="{{ route('admin.update_user', $user->id) }}" method="POST" class="bg-white p-4 shadow-md rounded">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block font-bold mb-2">Nom</label>
                <input type="text" id="name" name="name" value="{{ $user->name }}" 
                       class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block font-bold mb-2">Email</label>
                <input type="email" id="email" name="email" value="{{ $user->email }}" 
                       class="w-full p-2 border rounded" required>
            </div>

            <div class="flex space-x-2">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Enregistrer
                </button>
                <a href="{{ route('admin.projets-utilisateurs') }}" 
                   class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Annuler
                </a>
            </div>
        </form>
    </div>
</body>
</html>
