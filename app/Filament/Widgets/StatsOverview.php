<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Major;
use App\Models\Media;
use App\Models\Post;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total User', User::count()),
            Stat::make('Total Jurusan', Major::count()),
            Stat::make('Total Post', Post::count()),
            Stat::make('Total Kategori', Category::count()),
            Stat::make('Total Gambar', Media::where('type', 'image')->count()),
            Stat::make('Total Video', Media::where('type', 'video')->count()),
        ];
    }
}
