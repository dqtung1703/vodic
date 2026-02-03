<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Mark first 3 published posts as important
$posts = \App\Models\Post::where('status', 'published')
    ->whereNotNull('published_at')
    ->orderBy('published_at', 'desc')
    ->take(3)
    ->get();

foreach ($posts as $post) {
    $post->is_important = true;
    $post->save();
    echo "✅ Marked as important: {$post->title}\n";
}

echo "\n✅ Total: {$posts->count()} posts marked as important\n";
