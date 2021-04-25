<?php
/**
 * Login page to verify user login data and give an option to them to reditrect to the game
 * Ranvir Singh , 000819787
 */
session_start();
include "connect.php";

$email = filter_input(INPUT_POST, "userEmailLogin", FILTER_SANITIZE_SPECIAL_CHARS);
$pass = md5(filter_input(INPUT_POST, "userPassLogin", FILTER_SANITIZE_SPECIAL_CHARS));
$email=strtolower($email);




$paramsok = false;
if (
    $email !== null && $email !== "" &&
    $pass !== null && $pass !== "" && $pass !== null
) {
    $paramsok = true;

    $command = "SELECT* FROM ttoplayerdata WHERE email=? AND  pass=?";
    $stmt = $dbh->prepare($command);
    $params = [$email,$pass];
    $success = $stmt->execute($params);
}





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
            background-image: linear-gradient(to bottom, rgba(255,255,0,0.3), rgba(0,0,255,0.3)), url(../images/bodyDisplay2.gif);
        }
    </style>
</head>

<body>
<header id="loginHeader">
        <h1>Tic Tac Toe  </h1>
        
        
    </header>
    <?php
    if ($paramsok)
     {
        if ($success) 
        {
            if(!($stmt->rowCount()==0)){
                // if by error there are more than one account then get the first one 
                $row = $stmt->fetch();
                $_SESSION["userEmail"]=$row["email"];
                $_SESSION["wins"]=$row["wins"];
                $_SESSION["loses"]=$row["loses"];
                
            

                $_SESSION["userEmail"]=$email;
                // wins high scores, play game, logout options
                //if due to some reasons redirection doesnot work
                echo 
                    "<div class='messageBox'>
                        <div style='text-align :center; color:#0454cd; '>
                            <p>Welcome: ".$_SESSION["userEmail"]."</p><br> <p>Your Wins: ".$_SESSION["wins"]."</p><br><p><a href='../php/game.php' style='color:#457fa2; background-color:#fedc01; font-size:1.5em;'> Lets Play!</a></p>
                        </div>
                    </div>
                    <div class='messageBox' style='margin-top:100px ; border-bottom:none;'>
                    
                        <h3>
                            
                             <a href='../php/logout.php'>Log Out</a>
                            
                        </h3>
                    </div>";
                    

                    header('Location: game.php');

            }else
            {
                session_unset();
                session_destroy();
                echo "<div class='messageBox'>
                <p>Credetials doesn't met or Account Doesn't Exists! </p>
                <br><a href='../index.html'> Go Back to Login...</a>
            </div>";
            }

            
        } else {
            session_unset();
            session_destroy();
            echo "<div class='messageBox'>
                <p> ERROR while Reading db </p>
                <br><a href='../index.html'> Go Back to Login...</a>
            </div>";
        }

    } else {

        session_unset();
        session_destroy();
        echo "<div class='messageBox'>

            <p> Bad Login Attempt!</p><br>
            <a href='../index.html'> Go Back...</a>
        </div>";
    }
    ?>
</body>

</html>