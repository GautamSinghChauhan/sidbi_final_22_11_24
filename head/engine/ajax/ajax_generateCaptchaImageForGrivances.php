<?php
session_start();

// Function to generate a random captcha string
function generateCaptcha()
{
    $length = 5;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $captcha = '';
    for ($i = 0; $i < $length; $i++) {
        $captcha .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $captcha;
}

// Function to generate a new captcha and update the session variable
function refreshCaptcha()
{
    $newCaptcha = generateCaptcha();
    $_SESSION['grivances_captcha'] = $newCaptcha;
    return $newCaptcha;
}

// Check if the 'refresh' parameter is present in the URL
if (isset($_GET['refresh']) && $_GET['refresh'] === 'true') :
    // Generate and output a new captcha without updating the session variable
    $newCaptcha = refreshCaptcha();
    echo json_encode(['grivances_captcha' => $newCaptcha, 'imageUrl' => 'path/to/ajax_generateCaptcha.php']);
else :

    // Generate a random uppercase letter using ASCII codes (A=65, Z=90)
    $randomLetter = chr(rand(65, 90));

    // Generate a random number between 1000 and 9999
    $randomNumber = rand(1000, 9999);

    // Combine the random number and letter to create a CAPTCHA value
    $captcha = $randomNumber . $randomLetter;

    // Store the CAPTCHA value in a session variable for validation later
    $_SESSION['grivances_captcha'] = $captcha;

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
endif;

