<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        
        $user = Auth::user();

        
        $ongoingProjects = Project::where('user_id', $user->id)->where('status', 'en cours')->count();

       
        $completedTasks = Task::where('user_id', $user->id)->where('status', 'terminé')->count();

       
        $inProgressTasks = Task::where('user_id', $user->id)->where('status', 'en cours')->count();

        
        $recentProjects = Project::where('user_id', $user->id)->latest()->take(5)->get(); 

        return view('dashboard', [
            'ongoingProjects' => $ongoingProjects,
            'completedTasks' => $completedTasks,
            'inProgressTasks' => $inProgressTasks,
            'recentProjects' => $recentProjects,
        ]);
    }
}
