<?php
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Faculty;
use App\Models\Program;
use App\Models\News;

echo "Faculty count: " . Faculty::count() . "\n";
echo "Programs count: " . Program::count() . "\n";
echo "News count: " . News::count() . "\n";

echo "\nRecent faculty:\n";
foreach(Faculty::take(3)->get() as $faculty) {
    echo "- {$faculty->name}: {$faculty->position}\n";
}

echo "\nRecent programs:\n";
foreach(Program::take(2)->get() as $program) {
    echo "- {$program->title} ({$program->duration})\n";
}

echo "\nRecent news:\n";
foreach(News::take(2)->get() as $news) {
    echo "- {$news->title} ({$news->date})\n";
}