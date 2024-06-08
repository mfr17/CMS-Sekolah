<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class PostChart extends ChartWidget
{

    protected static ?string $heading = "Post Chart";

    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';
    protected function getData(): array
    {
        $data = $this->getPostsPerMonth();
        return [
            'datasets' => [
                [
                    'label' => 'Post Created',
                    'data' => $data['postsPerMonth']
                ]
            ],
            'labels' => $data['months']
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    private function getPostsPerMonth(): array
    {
        $now = Carbon::now();
        $posts = Post::whereYear('publish_at', $now->year)->get();
        $postsPerMonth = array_fill(0, 12, 0);
        foreach ($posts as $post) {
            $month = Carbon::parse($post->publish_at)->month;
            $postsPerMonth[$month - 1]++;
        }
        $months = collect(range(1, 12))->map(function ($month) use ($now) {
            return $now->month($month)->format('M-Y');
        })->toArray();
        return [
            'postsPerMonth' => $postsPerMonth,
            'months' => $months,
        ];
    }
}
