<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle ?? 'Gestion de Tâches' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @yield('styles')
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-xl font-bold">Gestion de Tâches</a>
            <div>
                @auth
                    <a href="{{ route('projects.index') }}" class="mr-4">Projets</a><br><br>
                    <a href="{{ route('admin.projets-utilisateurs') }}" class="mr-4">Gestion Utilisateurs</a><br><br>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button type="submit" class="bg-red-500 px-3 py-1 rounded">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="mr-4">Connexion</a>
                    <a href="{{ route('register') }}" class="bg-green-500 px-3 py-1 rounded">S'inscrire</a>
                @endauth
            </div>
        </div>
    </nav><br>

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

    

        

    <main class="container mx-auto mt-6 p-4">
        @yield('content')
    </main>
   
    @yield('scripts')
</body>
</html>
