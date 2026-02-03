<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Check posts with featured images
$posts = \App\Models\Post::where('status', 'published')
    ->whereNotNull('featured_image')
    ->get();

echo "Checking featured images:\n\n";

foreach ($posts as $post) {
    $imagePath = storage_path('app/public/' . $post->featured_image);
    $exists = file_exists($imagePath);
    
    echo "Post: {$post->title}\n";
    echo "  DB Path: {$post->featured_image}\n";
    echo "  Full Path: {$imagePath}\n";
    echo "  Exists: " . ($exists ? "YES ✅" : "NO ❌") . "\n\n";
}
