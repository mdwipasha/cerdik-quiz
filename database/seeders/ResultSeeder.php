<?php

namespace Database\Seeders;

use App\Models\UserQuiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserQuiz::create([
            'quiz_id' => 1,
            'user_id' => 1,
            'correct' => 5,
            'score' => 100,
            'status' => 'passed',
        ]);
        UserQuiz::create([
            'quiz_id' => 2,
            'user_id' => 1,
            'correct' => 4,
            'score' => 80,
            'status' => 'passed',
        ]);
        UserQuiz::create([
            'quiz_id' => 1,
            'user_id' => 2,
            'correct' => 3,
            'score' => 60,
            'status' => 'failed',
        ]);
    }
}
