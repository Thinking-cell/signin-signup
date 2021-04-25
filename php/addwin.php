<?php
/**
 *Add items to List

 */
session_start();
if(!(isset($_SESSION["userEmail"])&&isset($_SESSION["wins"])&&isset($_SESSION["loses"])))
        {
            echo json_encode(-1);
            die();
        }
        
include "connect.php";


// Prepare and execute the DB query
$command = "UPDATE ttoplayerdata SET wins=wins+1 WHERE email=?";
$params = [$_SESSION["userEmail"]];
$stmt = $dbh->prepare($command);
$success = $stmt->execute($params);

$_SESSION["wins"]++;
if($stmt->rowCount()===0)
{
    echo json_encode(-1);
}


echo json_encode(1);