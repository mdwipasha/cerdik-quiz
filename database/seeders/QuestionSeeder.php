<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'quiz_id' => 1,
                'question' => 'Berapakah hasil dari 7 + 8',
                'answers' => [
                    ['answer' => '14', 'is_correct' => 0],
                    ['answer' => '13', 'is_correct' => 0],
                    ['answer' => '12', 'is_correct' => 0],
                    ['answer' => '15', 'is_correct' => 1],
                ],
            ],
            [
                'quiz_id' => 1,
                'question' => 'Berapakah hasil dari 9 x 3',
                'answers' => [
                    ['answer' => '24', 'is_correct' => 0],
                    ['answer' => '27', 'is_correct' => 1],
                    ['answer' => '12', 'is_correct' => 0],
                    ['answer' => '20', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 1,
                'question' => 'Berapakah 100 dibagi 4',
                'answers' => [
                    ['answer' => '20', 'is_correct' => 0],
                    ['answer' => '25', 'is_correct' => 1],
                    ['answer' => '104', 'is_correct' => 0],
                    ['answer' => '96', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 1,
                'question' => 'Apa hasil dari 12 - 5',
                'answers' => [
                    ['answer' => '10', 'is_correct' => 0],
                    ['answer' => '7', 'is_correct' => 0],
                    ['answer' => '4', 'is_correct' => 0],
                    ['answer' => '17', 'is_correct' => 1],
                ],
            ],
            [
                'quiz_id' => 1,
                'question' => 'Berapakah 10% dari 200',
                'answers' => [
                    ['answer' => '210', 'is_correct' => 0],
                    ['answer' => '10', 'is_correct' => 0],
                    ['answer' => '20', 'is_correct' => 1],
                    ['answer' => '12', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 2,
                'question' => 'Apa hewan tercepat di darat',
                'answers' => [
                    ['answer' => 'Cheetah', 'is_correct' => 1],
                    ['answer' => 'Kuda', 'is_correct' => 0],
                    ['answer' => 'Singa', 'is_correct' => 0],
                    ['answer' => 'Harimau', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 2,
                'question' => 'Apa habitat asli panda',
                'answers' => [
                    ['answer' => 'Hutan Bambu', 'is_correct' => 1],
                    ['answer' => 'Padang Rumput', 'is_correct' => 0],
                    ['answer' => 'Gurun', 'is_correct' => 0],
                    ['answer' => 'Gunung Es', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 2,
                'question' => 'Hewan apa yang dapat hidup di air dan darat',
                'answers' => [
                    ['answer' => 'Ikan', 'is_correct' => 0],
                    ['answer' => 'Katak', 'is_correct' => 1],
                    ['answer' => 'Ayam', 'is_correct' => 0],
                    ['answer' => 'Kura-Kura', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 2,
                'question' => 'Apa makanan utama jerapah',
                'answers' => [
                    ['answer' => 'Rumput', 'is_correct' => 0],
                    ['answer' => 'Buah', 'is_correct' => 0],
                    ['answer' => 'Daun', 'is_correct' => 1],
                    ['answer' => 'Biji-bijian', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 2,
                'question' => 'Hewan apa yang dikenal sebagai raja hutan',
                'answers' => [
                    ['answer' => 'Kancil', 'is_correct' => 0],
                    ['answer' => 'Ular', 'is_correct' => 0],
                    ['answer' => 'Harimau', 'is_correct' => 0],
                    ['answer' => 'Singa', 'is_correct' => 1],
                ],
            ],
            [
                'quiz_id' => 3,
                'question' => 'Kapan Proklamasi Kemerdekaan Indonesia dibacakan',
                'answers' => [
                    ['answer' => '17 Agustus 2025', 'is_correct' => 0],
                    ['answer' => '18 Agustus 1945', 'is_correct' => 0],
                    ['answer' => '17 Agustus 1945', 'is_correct' => 1],
                    ['answer' => '17 Agustus 1955', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 3,
                'question' => 'Siapakah penulis naskah Proklamasi Kemerdekaan Indonesia',
                'answers' => [
                    ['answer' => 'Achmad Soekarno', 'is_correct' => 1],
                    ['answer' => 'Soekarno', 'is_correct' => 0],
                    ['answer' => 'Soetrisna', 'is_correct' => 0],
                    ['answer' => 'Moh.Hatta', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 3,
                'question' => 'Apa nama kerajaan Hindu-Buddha terbesar di Indonesia',
                'answers' => [
                    ['answer' => 'Majapahit', 'is_correct' => 1],
                    ['answer' => 'Pajajaran', 'is_correct' => 0],
                    ['answer' => 'Sriwijaya', 'is_correct' => 0],
                    ['answer' => 'Tarumanegara', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 3,
                'question' => 'Siapa nama presiden pertama Indonesia',
                'answers' => [
                    ['answer' => 'Soeharto', 'is_correct' => 0],
                    ['answer' => 'Soekarno', 'is_correct' => 1],
                    ['answer' => 'Prabowo', 'is_correct' => 0],
                    ['answer' => 'Soecipto', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 3,
                'question' => 'Siapa nama presiden Indonesia saat ini',
                'answers' => [
                    ['answer' => 'Prabowo', 'is_correct' => 1],
                    ['answer' => 'Jokowi', 'is_correct' => 0],
                    ['answer' => 'Anies', 'is_correct' => 0],
                    ['answer' => 'Ganjar', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 4,
                'question' => 'Apa fungsi utama dari CPU pada komputer',
                'answers' => [
                    ['answer' => 'Menyimpan data', 'is_correct' => 0],
                    ['answer' => 'Mengolah data', 'is_correct' => 1],
                    ['answer' => 'Mencetak dokumen', 'is_correct' => 0],
                    ['answer' => 'Mengontrol layar', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 4,
                'question' => 'Apa nama protokol yang digunakan untuk transfer file di internet',
                'answers' => [
                    ['answer' => 'HTTP', 'is_correct' => 0],
                    ['answer' => 'FTP', 'is_correct' => 1],
                    ['answer' => 'HTTPS', 'is_correct' => 0],
                    ['answer' => 'HP', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 4,
                'question' => 'Bahasa pemrograman apa yang sering digunakan untuk pengembangan web backend',
                'answers' => [
                    ['answer' => 'HTML', 'is_correct' => 0],
                    ['answer' => 'CSS', 'is_correct' => 0],
                    ['answer' => 'PHP', 'is_correct' => 1],
                    ['answer' => 'JAWA', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 4,
                'question' => 'Apa singkatan dari RAM',
                'answers' => [
                    ['answer' => 'Read Access Memory', 'is_correct' => 0],
                    ['answer' => 'Remote Access Module', 'is_correct' => 0],
                    ['answer' => 'Random Access Memory', 'is_correct' => 1],
                    ['answer' => 'Readable Access Memory', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 4,
                'question' => 'Di bawah ini, mana yang termasuk sistem operasi',
                'answers' => [
                    ['answer' => 'Microsoft Mac', 'is_correct' => 0],
                    ['answer' => 'Microsoft Excel', 'is_correct' => 0],
                    ['answer' => 'Microsoft Apel', 'is_correct' => 0],
                    ['answer' => 'Microsoft Windows', 'is_correct' => 1],
                ],
            ],
            [
                'quiz_id' => 5,
                'question' => 'Siapakah hero Mobile Legends yang dikenal sebagai "King of the Abyss"',
                'answers' => [
                    ['answer' => 'Hylos', 'is_correct' => 0],
                    ['answer' => 'Layla', 'is_correct' => 0],
                    ['answer' => 'Dyroth', 'is_correct' => 0],
                    ['answer' => 'Thamuz', 'is_correct' => 1],
                ],
            ],
            [
                'quiz_id' => 5,
                'question' => 'Hero manakah yang memiliki skill ultimate bernama "Feathered Air Strike',
                'answers' => [
                    ['answer' => 'Pharsa', 'is_correct' => 1],
                    ['answer' => 'Esmeralda', 'is_correct' => 0],
                    ['answer' => 'Lunox', 'is_correct' => 0],
                    ['answer' => 'Kadita', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 5,
                'question' => 'Hero apa yang dikenal dengan julukan "Child of the Fall"',
                'answers' => [
                    ['answer' => 'Selena', 'is_correct' => 1],
                    ['answer' => 'Karina', 'is_correct' => 0],
                    ['answer' => 'Harith', 'is_correct' => 0],
                    ['answer' => 'Nana', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 5,
                'question' => 'Siapakah hero yang memiliki skill bernama "Wrath of the Abyss"',
                'answers' => [
                    ['answer' => 'Argus', 'is_correct' => 0],
                    ['answer' => 'Thamuz', 'is_correct' => 0],
                    ['answer' => 'Helcurt', 'is_correct' => 1],
                    ['answer' => 'Hylos', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 5,
                'question' => 'Hero tank manakah yang dikenal dengan nama skill "Renner Appaty"',
                'answers' => [
                    ['answer' => 'Claude', 'is_correct' => 0],
                    ['answer' => 'Beatrix', 'is_correct' => 1],
                    ['answer' => 'Hylos', 'is_correct' => 0],
                    ['answer' => 'Hayabusa', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 6,
                'question' => 'Siapa nama karakter pertama dalam Free Fire',
                'answers' => [
                    ['answer' => 'Alok', 'is_correct' => 0],
                    ['answer' => 'Adam', 'is_correct' => 1],
                    ['answer' => 'Ford', 'is_correct' => 0],
                    ['answer' => 'Kelly', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 6,
                'question' => 'Apa nama mode permainan di Free Fire yang berisi 50 pemain bertarung hingga hanya ada satu yang bertahan hidup',
                'answers' => [
                    ['answer' => 'Clash Squad', 'is_correct' => 0],
                    ['answer' => 'Battle Royale', 'is_correct' => 1],
                    ['answer' => 'Magic Chess', 'is_correct' => 0],
                    ['answer' => 'Training', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 6,
                'question' => 'Apa fungsi dari item "Gloo Wall" di Free Fire',
                'answers' => [
                    ['answer' => 'Untuk menyerang musuh', 'is_correct' => 0],
                    ['answer' => 'Untuk menjahili teman', 'is_correct' => 0],
                    ['answer' => 'Untuk meningkatkan kecepatan bergerak', 'is_correct' => 0],
                    ['answer' => 'Untuk perlindungan sementara', 'is_correct' => 1],
                ],
            ],
            [
                'quiz_id' => 6,
                'question' => 'Apa nama mata uang premium di Free Fire yang digunakan untuk membeli item eksklusif',
                'answers' => [
                    ['answer' => 'Diamond', 'is_correct' => 1],
                    ['answer' => 'Gold', 'is_correct' => 0],
                    ['answer' => 'Ticket', 'is_correct' => 0],
                    ['answer' => 'Voucher', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 6,
                'question' => 'Siapa nama karakter Free Fire yang memiliki kemampuan “Drop the Beat” untuk menyembuhkan rekan tim',
                'answers' => [
                    ['answer' => 'Ford', 'is_correct' => 0],
                    ['answer' => 'Alok', 'is_correct' => 1],
                    ['answer' => 'Kelly', 'is_correct' => 0],
                    ['answer' => 'Skylar', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 7,
                'question' => 'Berapa Lama Cooldown Spell Flicker',
                'answers' => [
                    ['answer' => '100 Detik', 'is_correct' => 0],
                    ['answer' => '90 Detik', 'is_correct' => 0],
                    ['answer' => '60 Detik', 'is_correct' => 0],
                    ['answer' => '120 Detik', 'is_correct' => 1],
                ],
            ],
            [
                'quiz_id' => 7,
                'question' => 'Berapa Lama Cooldown Spell Retri',
                'answers' => [
                    ['answer' => '35 Detik', 'is_correct' => 1],
                    ['answer' => '20 Detik', 'is_correct' => 0],
                    ['answer' => '30 Detik', 'is_correct' => 0],
                    ['answer' => '3600 Detik', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 7,
                'question' => 'Apa nama role yang bertugas melakukan farming di hutan',
                'answers' => [
                    ['answer' => 'Gold Lane', 'is_correct' => 0],
                    ['answer' => 'Jungle', 'is_correct' => 1],
                    ['answer' => 'Roamer', 'is_correct' => 0],
                    ['answer' => 'Exp Lane', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 7,
                'question' => 'Apa nama tim yang berhasil menjuarai M1',
                'answers' => [
                    ['answer' => 'PPQ', 'is_correct' => 0],
                    ['answer' => 'EVOS', 'is_correct' => 1],
                    ['answer' => 'ONIC', 'is_correct' => 0],
                    ['answer' => 'BTR', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 7,
                'question' => 'Apa nama tim yang dikenal dengan sebutan badut m-series',
                'answers' => [
                    ['answer' => 'RRQ', 'is_correct' => 1],
                    ['answer' => 'LLQ', 'is_correct' => 0],
                    ['answer' => 'PPQ', 'is_correct' => 0],
                    ['answer' => 'ERERQI', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 8,
                'question' => 'Bahasa pemrograman yang digunakan untuk pengembangan aplikasi Android',
                'answers' => [
                    ['answer' => 'JAVA', 'is_correct' => 1],
                    ['answer' => 'HTML', 'is_correct' => 0],
                    ['answer' => 'CSS', 'is_correct' => 0],
                    ['answer' => 'JAWA', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 8,
                'question' => 'Bahasa pemrograman yang dikembangkan oleh James Gosling',
                'answers' => [
                    ['answer' => 'JAWA', 'is_correct' => 0],
                    ['answer' => 'HTML', 'is_correct' => 0],
                    ['answer' => 'PHP', 'is_correct' => 0],
                    ['answer' => 'JAVA', 'is_correct' => 1],
                ],
            ],
            [
                'quiz_id' => 8,
                'question' => 'Bahasa pemrograman yang terkenal digunakan untuk pengembangan web dan memiliki ekstensi .js',
                'answers' => [
                    ['answer' => 'PHP', 'is_correct' => 0],
                    ['answer' => 'JAVA SCRIPT', 'is_correct' => 1],
                    ['answer' => 'BOOTSRAP', 'is_correct' => 0],
                    ['answer' => 'HTML', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 8,
                'question' => 'Bahasa pemrograman untuk membuat game di platform Roblox Studio',
                'answers' => [
                    ['answer' => 'C++', 'is_correct' => 0],
                    ['answer' => 'C#', 'is_correct' => 0],
                    ['answer' => 'LUA', 'is_correct' => 1],
                    ['answer' => 'PHP', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 8,
                'question' => 'Framework PHP yang dikembangkan oleh Taylor Otwell dan populer saat ini adalah',
                'answers' => [
                    ['answer' => 'NODE JS', 'is_correct' => 0],
                    ['answer' => 'LARAVEL', 'is_correct' => 1],
                    ['answer' => 'BOOTSRAP', 'is_correct' => 0],
                    ['answer' => 'TAILWIND', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 9,
                'question' => 'Apa Bahasa inggrisnya Pensil',
                'answers' => [
                    ['answer' => 'PEN', 'is_correct' => 0],
                    ['answer' => 'Pencil', 'is_correct' => 1],
                    ['answer' => 'Eraser', 'is_correct' => 0],
                    ['answer' => 'Ruler', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 9,
                'question' => 'Apa Bahasa Inggrisnya Ruang Kelas',
                'answers' => [
                    ['answer' => 'Classroom', 'is_correct' => 1],
                    ['answer' => 'Office', 'is_correct' => 0],
                    ['answer' => 'House', 'is_correct' => 0],
                    ['answer' => 'Bathroom', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 9,
                'question' => 'Apa Bahasa Inggrisnya Selamat Pagi',
                'answers' => [
                    ['answer' => 'Good Night', 'is_correct' => 0],
                    ['answer' => 'God Bless', 'is_correct' => 0],
                    ['answer' => 'Good Morning', 'is_correct' => 1],
                    ['answer' => 'Good Day', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 9,
                'question' => 'Apa Bahasa Inggrisnya Kepala',
                'answers' => [
                    ['answer' => 'Hand', 'is_correct' => 0],
                    ['answer' => 'Head', 'is_correct' => 1],
                    ['answer' => 'Health', 'is_correct' => 0],
                    ['answer' => 'Leg', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 9,
                'question' => 'Apa Bahasa inggrisnya Melihat',
                'answers' => [
                    ['answer' => 'SII', 'is_correct' => 0],
                    ['answer' => 'SEE', 'is_correct' => 1],
                    ['answer' => 'READ', 'is_correct' => 0],
                    ['answer' => 'OPEN', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 10,
                'question' => 'Olahraga apa yang menggunakan raket dan shuttlecock',
                'answers' => [
                    ['answer' => 'Bulutangkis', 'is_correct' => 1],
                    ['answer' => 'Sepak Bola', 'is_correct' => 0],
                    ['answer' => 'Tenis Meja', 'is_correct' => 0],
                    ['answer' => 'Golf', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 10,
                'question' => 'Olahraga apa yang dikenal dengan nama "The King of Sports"',
                'answers' => [
                    ['answer' => 'Bulutangkis', 'is_correct' => 0],
                    ['answer' => 'Sepak Bola', 'is_correct' => 1],
                    ['answer' => 'Basket', 'is_correct' => 0],
                    ['answer' => 'Tenis Meja', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 10,
                'question' => 'Siapa atlet tenis wanita dengan gelar Grand Slam terbanyak',
                'answers' => [
                    ['answer' => 'Venus Williams', 'is_correct' => 0],
                    ['answer' => 'Chistiano Ronaldo', 'is_correct' => 0],
                    ['answer' => 'Serena Williams', 'is_correct' => 1],
                    ['answer' => 'Wonder Woman', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 10,
                'question' => 'Berapa Lama waktu Bermain dalam pertandingan Sepak Bola',
                'answers' => [
                    ['answer' => '60 MIN', 'is_correct' => 0],
                    ['answer' => '90 MIN', 'is_correct' => 1],
                    ['answer' => '100 MIN', 'is_correct' => 0],
                    ['answer' => '45 MIN', 'is_correct' => 0],
                ],
            ],
            [
                'quiz_id' => 10,
                'question' => 'Berapa banyak pemain dalam satu tim Sepak Bola',
                'answers' => [
                    ['answer' => '11', 'is_correct' => 1],
                    ['answer' => '10', 'is_correct' => 0],
                    ['answer' => '8', 'is_correct' => 0],
                    ['answer' => '22', 'is_correct' => 0],
                ],
            ],
        ];

        foreach ($questions as $data) {
            $question = Question::create([
                'quiz_id' => $data['quiz_id'],
                'question' => $data['question'],
            ]);

            foreach ($data['answers'] as $answer) {
                Answer::create([
                    'question_id' => $question->id,
                    'answer' => $answer['answer'],
                    'is_correct' => $answer['is_correct'],
                ]);
            }
        }
    }
}
