<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'Gestion de Tâches' }}</title>
    <!-- Tailwind CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @yield('styles')
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-xl font-bold">Gestion de Tâches</a>
            <div>
                @auth
                    <a href="{{ route('projects.index') }}" class="mr-4">Projets</a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.users') }}" class="mr-4">Gestion Utilisateurs</a>
                    @endif
                    <a href="{{ route('logout') }}" class="bg-red-500 px-3 py-1 rounded">Déconnexion</a>
                @else
                    <a href="{{ route('login') }}" class="mr-4">Connexion</a>
                    <a href="{{ route('register') }}" class="bg-green-500 px-3 py-1 rounded">S'inscrire</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-6 p-4">
        @yield('content')
    </main>

    @yield('scripts')
</body>
</html>