<?php 
session_start();

if (!isset($_SESSION["lastname"])) {
    header ("Location: index.php");
    exit();
}
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>Registration Information</title>
 </head>
 <body>
    <h2>Registration Information</h2>

    <div class="container">
        <p><strong>Last Name:</strong> <?php echo htmlspecialchars($_SESSION["lastname"]); ?> </p>
        <p><strong>First Name:</strong> <?php echo htmlspecialchars($_SESSION["firstname"]); ?> </p>
        <p><strong>Middle Initial:</strong> <?php echo htmlspecialchars($_SESSION["middleInitial"]); ?> </p>
        <p><strong>Age:</strong> <?php echo htmlspecialchars($_SESSION["age"]); ?> </p>
        <p><strong>Contact No.:</strong> <?php echo htmlspecialchars($_SESSION["contactnum"]); ?> </p>
        <p><strong>E-mail:</strong> <?php echo htmlspecialchars($_SESSION["email"]); ?> </p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($_SESSION["address"]); ?> </p>
    </div>
    
    <a href="index.php">Back to form</a>

    <?php
    session_unset();
    session_destroy();
     ?>
 </body>
 </html>