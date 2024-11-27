<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Task; 
use App\Models\Project; 
use App\Models\User;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
         $project = Project::first(); 
         $user = User::first(); 
 
         // Créer des tâches
         Task::create([
             'title' => 'Task 1 for Project 1',
             'description' => 'Description de la tâche 1',
             'status' => 'non_commencé',
             'priority' => 'élevée',
             'project_id' => $project->id, 
             'assigned_to' => $user->id, 
         ]);
 
         Task::create([
             'title' => 'Task 2 for Project 1',
             'description' => 'Description de la tâche 2',
             'status' => 'en_cours',
             'priority' => 'moyenne',
             'project_id' => $project->id,
             'assigned_to' => $user->id,
         ]);
 
         Task::create([
             'title' => 'Task 3 for Project 1',
             'description' => 'Description de la tâche 3',
             'status' => 'terminé',
             'priority' => 'basse',
             'project_id' => $project->id,
             'assigned_to' => $user->id,
         ]);
    }
}
