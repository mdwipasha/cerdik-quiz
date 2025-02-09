<?php

namespace App\Filament\Widgets;

use App\Models\Quiz;
use App\Models\User;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsWidget extends BaseWidget
{
    protected static ?int $sort = -2;

    protected static bool $isLazy = false;

    protected function getStats(): array
    {
        return [
            Stat::make('Total Siswa', User::where('role_id', 1)->count())
                ->icon('heroicon-o-user-group')
                ->description('Total siswa terdaftar')
                ->color('success'),

            Stat::make('Total Guru', User::where('role_id', 2)->count())
                ->icon('heroicon-o-academic-cap')
                ->description('Total guru terdaftar')
                ->color('primary'),

            Stat::make('Total Quiz', Quiz::count())
                ->icon('heroicon-o-document-text')
                ->description('Total quiz yang tersedia')
                ->color('info'),
        ];
    }
}
