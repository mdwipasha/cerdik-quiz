<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quizzes = [
            [
                'title'=>'Matematika Dasar',
                'slug'=>'matematika-dasar',
                'user_id'=> 3,
                'image'=>'quiz/mtk.jpeg',
                'is_private'=> 0,
                'user_emails' => ["mdwipasha13@gmail.com","alfan@gmail.com"],
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title'=>'Binatang dan Lingkungan',
                'slug'=>'binatang-dan-lingkungan',
                'user_id'=> 3,
                'image'=>'quiz/binatang-dan-lingkungan.jpg',
                'is_private'=> 1,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'title' => 'Sejarah Indonesia',
                'slug' => Str::slug('Sejarah Indonesia'),
                'user_id' => 3,
                'image' => 'quiz/sejarah-indonesia.jpg',
                'is_private' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Teknologi Dan Komputer',
                'slug' => Str::slug('Teknologi Dan Komputer'),
                'user_id' => 3,
                'image' => 'quiz/ilkom.jpeg',
                'is_private' => 0,
                'user_emails' => ["alfan@gmail.com"],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mobile Legend Hero Kuis',
                'slug' => Str::slug('Mobile Legend Hero Kuis'),
                'user_id' => 3,
                'image' => 'quiz/mlbb.jpeg',
                'is_private' => 0,
                'user_emails' => ["mdwipasha13@gmail.com","alfan@gmail.com"],
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kamus Free Fire',
                'slug' => Str::slug('Kamus Free Fire'),
                'user_id' => 4,
                'image' => 'quiz/ff.jpg',
                'is_private' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Kamus Mobile Legends',
                'slug' => Str::slug('Kamus Mobile Legends'),
                'user_id' => 4,
                'image' => 'quiz/kamus-ml.jpeg',
                'is_private' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tebak Bahasa Pemrograman',
                'slug' => Str::slug('Tebak Bahasa Pemrograman'),
                'user_id' => 4,
                'image' => 'quiz/tebak-bahasa-pemrograman.jpg',
                'is_private' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Bahasa Inggris Dasar',
                'slug' => Str::slug('Bahasa Inggris Dasar'),
                'user_id' => 4,
                'image' => 'quiz/bahasa-inggris-dasar.jpg',
                'is_private' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Olahraga',
                'slug' => Str::slug('Olahraga'),
                'user_id' => 4,
                'image' => 'quiz/olahraga.png',
                'is_private' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($quizzes as $quiz) {
            Quiz::create($quiz);
        }
    }
}
