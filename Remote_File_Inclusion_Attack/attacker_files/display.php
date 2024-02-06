<?php
// Set the filename to "hackr.jpg"
$filename = 'hackr.jpg';

// Check if the file exists
if (file_exists($filename)) {
    // Set the content type header
    header('Content-Type: image/jpeg');

    // Output the image file
    readfile($filename);
} else {
    // If the file doesn't exist, display an error message
    echo 'Image file not found.';
}
?>