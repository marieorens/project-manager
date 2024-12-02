<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Notification; 
use App\Models\Task; 
use App\Models\User;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        $task = Task::first(); 
        $user = User::first(); 

       
        Notification::create([
            'message' => 'La tâche "'.$task->title.'" a été mise à jour.',
            'user_id' => $user->id, 
            'task_id' => $task->id, 
           
        ]);

        Notification::create([
            'message' => 'Nouvelle tâche assignée : "'.$task->title.'".',
            'user_id' => $user->id,
            'task_id' => $task->id,
            
        ]);

        
        for ($i = 1; $i <= 5; $i++) {
            Notification::create([
                'message' => 'Notification '.$i.' pour la tâche "'.$task->title.'".',
                'user_id' => $user->id,
                'task_id' => $task->id,
            
            ]);
        }
    }
}
