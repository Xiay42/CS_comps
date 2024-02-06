<?php
// Replace 'https://example.com/path/to/your/image.jpg' with the actual URL of your image
$imageUrl = 'https://ibb.co/hmMbXRL';

// Set the content type based on the image type (adjust if needed)
header('Content-Type: image/jpeg');

// Read and output the image content
readfile($imageUrl);
?>