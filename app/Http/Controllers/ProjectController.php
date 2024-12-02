<?php

namespace App\Http\Controllers;


use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProjectController extends Controller
{
    public function index()
    {
        
        $user = Auth::user();
        $projects = Project::where('user_id', auth()->id())->get(); 
        return view('projects.index', compact('projects'));
    }

    public function nouveau_projet()
    {
        $users = User::all();
        return view('projects.newproject', compact('users'));
    }


    public function sauvegarder_nouveau_projet(Request $request)
    {
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date',
            'status' => 'required|string',
            'collaborators' => 'array|exists:users,id',
        ]);
    
        
        $project = Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'deadline' => $validated['deadline'],
            'status' => $validated['status'],
            'user_id' => auth()->id(), 
        ]);
    
       
        if (isset($validated['collaborators'])) {
            $project->collaborators()->attach($validated['collaborators']);
        }
    
       
        return redirect()->route('projects.index');
    }

    
    public function show($id)
    {
        $project = Project::with(['tasks.assignedUser'])->findOrFail($id);
        return view('projects.show', compact('project'));
    }


    public function create($projectId)
{
    $project = Project::with('collaborators')->findOrFail($projectId);

    return view('tasks.create', [
        'project' => $project,
    ]);
    
}

public function store(Request $request, $projectId)
{
    $project = Project::findOrFail($projectId);

    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'required|string|in:non commencé,en cours,terminé',
        'priority' => 'required|string|in:basse,moyenne,haute',
        'assigned_user_id' => 'required|exists:users,id',
    ]);

    $project->tasks()->create($validated);

    return redirect()->route('projects.show', $projectId)
        ->with('success', 'Tâche créée avec succès.');
}


    
}
