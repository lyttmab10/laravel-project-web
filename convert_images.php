<?php

// Script to convert images to base64 data format
$imageDir = __DIR__ . '/public/images/';
$outputFile = __DIR__ . '/image_data.php';

$images = [
    'faculty1.jpg',
    'faculty2.jpg', 
    'faculty3.jpg',
    'faculty4.jpg',
    'faculty5.jpg',
    'robot-competition.jpg',
    'science-day.jpg',
    'app-development.jpg',
    'game-development.jpg',
    'contact-banner.jpg'
];

$imageData = [];

foreach ($images as $image) {
    $filePath = $imageDir . $image;
    if (file_exists($filePath)) {
        $imageContent = file_get_contents($filePath);
        $base64 = base64_encode($imageContent);
        $mimeType = mime_content_type($filePath);
        $dataUri = 'data:' . $mimeType . ';base64,' . $base64;
        
        $imageName = pathinfo($image, PATHINFO_FILENAME);
        $imageData[$imageName] = $dataUri;
        
        echo "Converted: {$image} (Size: " . strlen($base64) . " chars)\n";
    } else {
        echo "File not found: {$image}\n";
    }
}

// Generate PHP array file
$output = "<?php\n\nreturn " . var_export($imageData, true) . ";\n";
file_put_contents($outputFile, $output);

echo "\nImage data saved to: {$outputFile}\n";
echo "Total images converted: " . count($imageData) . "\n";