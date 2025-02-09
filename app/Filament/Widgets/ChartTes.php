<?php

namespace App\Filament\Widgets;

use App\Models\Quiz;
use App\Models\User;
use Filament\Widgets\ChartWidget;

class ChartTes extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected static ?string $maxHeight = '300px';

    protected static bool $isLazy = false;

    protected function getData(): array
    {

        $siswaCount = User::where('role_id', 1)->count();
        $guruCount = User::where('role_id', 2)->count();
        $quizCount = Quiz::count();

        return [
          'datasets' => [
                [
                    'label' => 'Jumlah Data',
                    'data' => [$siswaCount, $guruCount, $quizCount],
                    'backgroundColor' => ['#4CAF50', '#2196F3', '#FF9800'], // Warna Siswa, Guru, Quiz
                ],
            ],
            'labels' => ['Siswa', 'Guru', 'Quiz'],
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
