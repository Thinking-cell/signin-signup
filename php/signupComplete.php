<?php
/**
 * signup page to add account in database and give an option to them to reditrect to the login page
 * Ranvir Singh , 000819787
 */

include "connect.php";

$email = filter_input(INPUT_POST, "userEmailSign", FILTER_SANITIZE_SPECIAL_CHARS);
$pass = md5(filter_input(INPUT_POST, "userPassSign", FILTER_SANITIZE_SPECIAL_CHARS));
$email=strtolower($email);
date_default_timezone_set("America/New_York");



$paramsok = false;
if (
    $email !== null && $email !== "" &&
    $pass !== null && $pass !== "" && $pass !== null
) {
    $paramsok = true;

    $command = "SELECT* FROM ttoplayerdata WHERE email=? ";
    $stmt = $dbh->prepare($command);
    $params = [$email];
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
        // if the record is not in database
        if ($stmt->rowCount()==0) 
        {
            
            $insertCommand = "INSERT INTO ttoplayerdata (email,pass,lastplayed) VALUES (?,?,?)";
            $insertStmt = $dbh->prepare($insertCommand);
            $insertParams = [$email,$pass,date("y-m-d")];
            $insertSuccess = $insertStmt->execute($insertParams);
            if($insertSuccess)
            {
                
            echo "<div class='messageBox'>
                <p> Account Succesfully created </p>
                <br><a href='../index.html'> Go Back to Login...</a>
            </div>";
            }else
            {   
                echo "<div class='messageBox'>
                <p> There was a problem while creating your account, Please try again. </p>
                <br><a href='../html/signup.html'> Go Back to SignUp...</a>
            </div>";
            }
            

           



            
        } else {
            
            echo "<div class='messageBox'>
                <p> Account Already Exists </p>
                <br><a href='../index.html'> Go Back to Login...</a>
            </div>";
        }

    } else {

        
        echo "<div class='messageBox'>

            <p> Bad Signup Attempt!</p><br>
            <a href='../index.html'> Go Back...</a>
        </div>";
    }
    ?>
</body>

</html>