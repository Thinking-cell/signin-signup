<?php





?><!DOCTYPE html>
<html>
<!--
    main index page to get user data and log them into their accounts
-->
<head>
    <title>Login Page</title>
    
    <link rel="stylesheet" href="css/mainstyle.css">
</head>

<body>
    <header id="loginHeader">
        <h1>Tic Tac Toe  </h1>
        
        
    </header>
     <div id="login" >
        <h2> Already Have an Account? </h2>
        <form id="loginForm" method="POST" action="php/loginComplete.php">
            <fieldset>
                <legend>Login</legend>
                <div class="inputs">
                    <div>
                        <label for="userEmailLogin">Email: </label>
                        <input name="userEmailLogin" type="email" required placeholder="name@kmail.com">
                    </div>
                    <div>
                        <label for="userPassLogin">Password: </label>
                        <input name="userPassLogin" type="password" required placeholder="password">
                    </div>

                </div>
                <div class="buttons">
                    <button type="submit">Log in</button>
                </div>

            </fieldset>

        </form>
        <h2><a style="margin-right: 20px;" href="php/signup.php"> Playing First Time? </a><a href='php/highscores.php' style='color:#c1624a; background-color:#fedc01;'> High Scores</a></h2>
        
        
       
            

    </div>
        
        
        
    
</body>

</html>