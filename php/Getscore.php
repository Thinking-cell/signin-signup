<?php
/**
 * Get Score from the data base

 */
session_start();
if(!(isset($_SESSION["userEmail"])&&isset($_SESSION["wins"])&&isset($_SESSION["loses"])))
        {
            echo json_encode(-1);
            die();
        }
        
include "connect.php";




// Fill an array with User objects based on the results.
$scores = [0,0];



$scores[0]=$_SESSION["wins"];
$scores[1]=$_SESSION["loses"];

    


// Write the json encoded array to the HTTP Response
echo json_encode($scores);