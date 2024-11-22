<?php
session_start();

// Function to generate a random captcha string
function generateCaptcha() {
    $length = 5;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $captcha = '';
    for ($i = 0; $i < $length; $i++) {
        $captcha .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $captcha;
}

// Function to generate a new captcha and update the session variable
function refreshCaptcha() {
    $newCaptcha = generateCaptcha();
    $_SESSION['captcha'] = $newCaptcha;
    return $newCaptcha;
}

// Check if the 'refresh' parameter is present in the URL
if (isset($_GET['refresh']) && $_GET['refresh'] === 'true') {
    // Generate and output a new captcha without updating the session variable
    $newCaptcha = refreshCaptcha();
    echo json_encode(['captcha' => $newCaptcha, 'imageUrl' => 'path/to/ajax_generateCaptcha.php']);
} else {
    // Retrieve the CAPTCHA value from the session
    $captcha = isset($_SESSION['captcha']) ? $_SESSION['captcha'] : '';

    // Create a blank image
    $image = imagecreate(100, 50);
    $background_color = imagecolorallocate($image, 255, 255, 255);
    $text_color = imagecolorallocate($image, 0, 0, 0);
    $line_color = imagecolorallocate($image,211,211,211); 
    for($i=0;$i<10;$i++) {
        imageline($image,0,rand()%70,200,rand()%50,$line_color);
    }
    // Add the CAPTCHA value to the image
    imagestring($image, 5, 20, 20, $captcha, $text_color);

    // Set the content type to image/png
    header('Content-type: image/png');

    // Output the image
    imagepng($image);

    // Free up memory
    imagedestroy($image);
}
?>
