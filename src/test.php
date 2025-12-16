<?php
echo "PHP is working!<br>";
echo "Current directory: " . getcwd() . "<br>";
echo "File exists check:<br>";
echo "- styles.css: " . (file_exists('styles.css') ? 'YES' : 'NO') . "<br>";
echo "- script.js: " . (file_exists('script.js') ? 'YES' : 'NO') . "<br>";
echo "- includes/header.php: " . (file_exists('includes/header.php') ? 'YES' : 'NO') . "<br>";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css" />
</head>
<body style="padding: 20px; font-family: Arial;">
    <h1>CSS Test</h1>
    <nav class="slide-in-up">
        <p>If you see this text with dark background and styled properly, CSS is loading.</p>
    </nav>
</body>
</html>
