<?php

namespace Database\Seeders;
use App\Models\Project;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
  
    public function run(): void
    {
        Project::create([
            'title' => 'Project 1',
            'description' => 'Description du projet 1',
            'deadline' => now()->addDays(7), 
            'status' => 'en_cours',
            'user_id' => 1, 
        ]);

        Project::create([
            'title' => 'Project 2',
            'description' => 'Description du projet 2',
            'deadline' => now()->addDays(14),
            'status' => 'terminé',
            'user_id' => 2,
        ]);
    }
}
