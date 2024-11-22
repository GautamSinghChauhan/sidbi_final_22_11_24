<?php
session_start();

// Generate a random uppercase letter using ASCII codes (A=65, Z=90)
$randomLetter = chr(rand(65, 90));

// Generate a random number between 1000 and 9999
$randomNumber = rand(1000, 9999);

// Combine the random number and letter to create a CAPTCHA value
$captcha = $randomNumber . $randomLetter;

// Store the CAPTCHA value in a session variable for validation later
$_SESSION['captcha'] = $captcha;

// Create a blank image for the CAPTCHA
$image = imagecreate(100, 50);
$background_color = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);
$line_color = imagecolorallocate($image, 211, 211, 211);

// Add lines to the CAPTCHA image for better security
for ($i = 0; $i < 10; $i++) {
    imageline($image, 0, rand() % 70, 200, rand() % 50, $line_color);
}

// Add the CAPTCHA value to the image
imagestring($image, 5, 20, 20, $captcha, $text_color);

// Set the content type to image/png
header('Content-type: image/png');
header('Content-Disposition: inline; filename="captcha.png"');
header('Content-Description: PHP Generated Image');

// Output the CAPTCHA image
imagepng($image);

// Free up memory
imagedestroy($image);
