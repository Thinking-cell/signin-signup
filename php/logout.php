<?php
/**
 * slog out page to end session
 * Ranvir Singh , 000819787
 */
session_start();
session_unset();
session_destroy();





?><!DOCTYPE html>

<html>

<head>
    <title>TIC TAC TOE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mainstyle.css">
    <style>
        body
        {
            background-image: linear-gradient(to bottom, rgba(255,255,0,0.3), rgba(0,0,255,0.3)), url(../images/bodyDisplay3.gif);
        }
        
    </style>
</head>

<body>
<header id="loginHeader">
        <h1>Tic Tac Toe  </h1>
        
        
    </header>
    <?php
        echo "<div class='messageBox'>

        <p> You are now Logged Out!</p><br>
        <a href='../index.html'>To Login</a>
    </div>";
    ?>
</body>

</html>