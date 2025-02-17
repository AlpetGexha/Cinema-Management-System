<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Movie;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Stats extends BaseWidget
{
    protected function getStats(): array
    {
        $movieCount = Movie::count();
        $categoryCount = Category::count();

        return [
            Stat::make('Movies', $movieCount),
            Stat::make('Categories', $categoryCount),
        ];
    }
}
