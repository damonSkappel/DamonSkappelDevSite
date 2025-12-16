<?php
// Get first name from cookie
$firstName = $_COOKIE['user_first_name'] ?? 'there';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Message Sent</title>
    <style>
      body {
        font-family: Arial;
        text-align: center;
        padding-top: 100px;
        background-color: #000;
        color: #fff;
      }
      .box {
        display: inline-block;
        padding: 20px 40px;
        border: 2px solid #4caf50;
        border-radius: 8px;
        background: #1a3a1a;
      }
      .box h2 {
        color: #4caf50;
      }
      .box a {
        color: #4caf50;
        text-decoration: none;
        font-weight: bold;
      }
      .box a:hover {
        text-decoration: underline;
      }
    </style>
  </head>
  <body>
    <div class="box">
      <h2>Thank You, <?php echo htmlspecialchars($firstName); ?>!</h2>
      <p>Your message has been sent successfully.</p>
      <p>We'll get back to you soon.</p>
      <br>
      <a href="index.php">Go Back to Home</a>
    </div>
  </body>
</html>
