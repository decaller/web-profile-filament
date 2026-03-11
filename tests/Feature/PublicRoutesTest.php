<?php

use App\Models\Activity;
use App\Models\Page;
use App\Models\Post;
use App\Models\Publication;
use Database\Seeders\DatabaseSeeder;

beforeEach(function () {
    $this->seed(DatabaseSeeder::class);
});

it('serves all public routes', function () {
    $urls = collect([
        '/',
        '/blogs',
        '/activities',
        '/publications',
        '/testimonials',
    ]);

    $urls = $urls
        ->merge(Post::pluck('slug')->map(fn (string $slug) => "/blogs/{$slug}"))
        ->merge(Activity::pluck('slug')->map(fn (string $slug) => "/activities/{$slug}"))
        ->merge(Publication::pluck('slug')->map(fn (string $slug) => "/publications/{$slug}"))
        ->merge(Page::pluck('slug')->map(fn (string $slug) => "/{$slug}"));

    $urls->unique()->each(function (string $url) {
        $this->get($url)->assertOk();
    });
});
