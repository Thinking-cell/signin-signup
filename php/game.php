<?php
/**
 *game page which includes a simple table as a board
 *let user play tic tac toe with computer
 *(this page can be any page like any game to any website hence is not limited to TIC TAC TOE )
 * Ranvir Singh , 000819787
 */
session_start();


?><!DOCTYPE html>

<html>

<head>
    <title>TIC TAC TOE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mainstyle.css">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  

    <script src="../js/script.js">  </script>
    <style>
        body
        {
            background-image: linear-gradient(to bottom, rgba(255,255,0,0.3), rgba(0,0,255,0.3)), url(../images/bodyDisplay4.jpg);
        }
    </style>
</head>

<body>
    <header id="loginHeader">
        <h1>Tic Tac Toe  </h1>
        
        
    </header>

    <?php
        if(!(isset($_SESSION["userEmail"])&&isset($_SESSION["wins"])&&isset($_SESSION["loses"])))
        {
            die(" <div class='messageBox'>
            <p> Session not active, Try logging in again </p>
            <br><a href='../index.php'> Go Back to Login...</a>
            </div>");
        }
    ?>


    <div class="messageBox" style="color:purple; font-size:1.1em; height:100px; min-height:100px;">

        <?php

        echo "
        <div id='userTarget'>
        
            User:  ".$_SESSION["userEmail"]."
        </div>
        <div id='winsTarget'>
        
            Your Wins:  ".$_SESSION["wins"]."
        </div>
        <div id='losesTarget'>
        
        Your Losses:  ".$_SESSION["loses"]."
        </div>
        ";

        ?>
        
    </div>

    <div id="gameBox" style="display: flex;justify-content:center; min-height:620px; ">
    <div class="messageBox" id="resultTarget" style="color: #c1624a; font-weight:bolder; height:100px;min-height:100px;margin-top:250px; display:none; "> </div>
        <table>
            <tr id="row1">
                <td id="0" class="box"></td>
                <td id="1" class="box"></td>
                <td id="2" class="box"></td>
            </tr>
            <tr id="row2">
                <td id="3" class="box"></td>
                <td id="4" class="box"></td>
                <td id="5" class="box"></td>
            </tr>
            <tr id="row3">
                <td id="6" class="box"></td>
                <td id="7" class="box"></td>
                <td id="8" class="box"></td>
            </tr>


        </table>

    </div>
    <div class="messageBox" >
        <div class="buttons" id="PlayAgain" style="display: none;">
            <button style="padding: 15px; font-size:1.3em;" id="playButton"   >Play Again</button>
        </div>
        <h3> <a href="logout.php"> Log Out</a></h3>
        
    </div>



</body>

</html>