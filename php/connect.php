<?php
/**
 * Include this to connect. Change the dbname to match your database,
 * and make sure your login information is correct after you upload 
 * to csunix or your app will stop working.
 * 
 * 
 */
try {
    $dbh = new PDO(
        "mysql:host=us-cdbr-east-03.cleardb.com;dbname=heroku_7c49932fd7d504a",
        "b4f3309158425f",
        "04e3d13f"// for unix root= 000819787, password=dob
    );
    // $message = "Database Connection Established";
    // echo "<script type='text/javascript'>alert('$message');</script>";
} catch (Exception $e)  {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
    
}
