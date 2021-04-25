<?php
/**
 * signup page to add account in database and give an option to them to reditrect to the login page
 * Ranvir Singh , 000819787
 */

include "connect.php";





{
    $paramsok = true;

    $command = "SELECT* FROM ttoplayerdata ORDER BY wins DESC, loses ASC";
    $stmt = $dbh->prepare($command);
    
    $success = $stmt->execute();
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
        .messageBox
        {
            min-height: 200px;
            height:fit-content;
            
        }
    </style>
</head>

<body>
<header id="loginHeader">
        <h1>Tic Tac Toe  </h1>
        
        
    </header>
    <?php
    if($success)
    {
        echo "<div class='messageBox' style='min-width:60%;width:fit-content; margin-left:auto;margin-right:auto;'>
                <ol>";
        
        while($row = $stmt->fetch())
        {
            
            
            echo "<li style='color:#1b7ac0; margin-bottom:5px; text-align:left;'> Name: ".$row["email"]."  Wins: ".$row["wins"]." </li>";
            


        }

        echo "  </ol>
            </div>";

            



        

    }else
    {
        echo "<div class='messageBox'>

            <p> Error while retrieving information.. Try again later!</p><br>
            
        </div>";
    }


    echo "<h3><a href='../index.html'> Login</a></h3>";

        
         
    
    ?>
</body>

</html>