<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\User;


class TaskController extends Controller
{

    public function create(Project $project)
    {
        $users = User::all();
        
        return view('tasks.create', compact('project'));
    }

    
    public function store(Request $request, Project $project)
    {
       
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
            'priority' => 'required|string',
            'assigned_user_id' => 'nullable|exists:users,id',
        ]);

        
        $task = new Task([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
            'assigned_to' => $request->assigned_user_id,
            'project_id' => $project->id,
        ]);

       
        $task->save();

        
        return redirect()->route('projects.show', $project->id)
                         ->with('success', 'Tâche créée avec succès !');
    }
}
