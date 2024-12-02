<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;



use Illuminate\Http\Request;

class AdminController extends Controller
{
   
    public function dashboard()
    {
        $user = Auth::user();
        
         $ongoingProjects = Project::where('user_id', $user->id)->where('status', 'en cours')->count();
         $completedTasks = Task::where('user_id', $user->id)->where('status', 'terminé')->count();
         $inProgressTasks = Task::where('user_id', $user->id)->where('status', 'en cours')->count();
         $recentProjects = Project::where('user_id', $user->id)->latest()->take(5)->get();
        return view('admin.dashboard', compact('ongoingProjects', 'completedTasks', 'inProgressTasks', 'recentProjects'));
    }

    
    public function showUsers()
    {
        $users = User::all();  
        return view('admin.users', compact('users'));
    }

    
    public function showUsersWithProjects()
    {
        

        $users = User::with('projects')->get();
        return view('admin.projets-utilisateurs', compact('users'));
    }

    
    public function createProjectForm($userId)
    {
        
        $user = User::findOrFail($userId);
        return view('admin.create_project', compact('user'));
    }

    
    public function storeProject(Request $request, $userId)
    {
       

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    $user = User::findOrFail($userId);
    $user->projects()->create([
        'title' => $request->title,
        'description' => $request->description,
        'deadline' => $request->input('deadline'),
        'status' => $request->input('status'),
    ]);

    return redirect()->route('admin.projets-utilisateurs')->with('success', 'Projet ajouté avec succès.');
    }

    
    public function editProjectForm($projectId)
    {
       
        $project = Project::findOrFail($projectId);
        return view('admin.edit_project', compact('project'));
    }
    





    public function updateUser(Request $request, $userId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
    
        $user = User::findOrFail($userId);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    
        return redirect()->route('admin.projets-utilisateurs')
                         ->with('success', 'Utilisateur mis à jour avec succès.');
    }
    






    public function updateProject(Request $request, $projectId)
    {
       

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $project = Project::findOrFail($projectId);
        $project->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    
        return redirect()->route('admin.projets-utilisateurs')->with('success', 'Projet mis à jour avec succès.');
    }

    
    public function deleteProject($projectId)
    {
      

        $project = Project::findOrFail($projectId);
        $project->delete();
    
        return redirect()->route('admin.projets-utilisateurs')->with('success', 'Projet supprimé avec succès.');
    }

    public function editUserForm($userId)
{
    $user = User::findOrFail($userId);
    return view('admin.edit_user', compact('user'));
}

public function deleteUser($userId)
{
    $user = User::findOrFail($userId);
    $user->delete();
    return redirect()->route('admin.projets-utilisateurs')->with('success', 'Utilisateur supprimé avec succès.');
}

}