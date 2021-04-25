<?php


include "connect.php";


?><!DOCTYPE html>
<html>

<head>
    <title>SignUp Page</title>
    
    <link rel="stylesheet" href="../css/mainstyle.css">
</head>

<body>
    <header id="loginHeader">
        <h1>Tic Tac Toe  </h1>
        
        
    </header>
    <div id="login" >
        <h2> Register Your Account </h2>
        <form id="signupForm" method="POST" action="../php/signupComplete.php">
            <fieldset>
                <legend>SignUp</legend>

                <div class="inputs">
                    <!-- Form for sign up-->
                    <div>
                        <label for="userEmailSign">Email: </label>
                        <input name="userEmailSign" type="email" required placeholder="name@kmail.com">
                    </div>
                    <div>
                        <label for="userPassSign">Password: </label>
                        <input id="signPass" name="userPassSign" type="password" required placeholder="password">
                    </div>
                    <div>
                        <label for="userPassSignConfirm">Confirm Pass: </label>
                        <input id="signPassConfirm" name="userPassSignConfirm" type="password" required placeholder="password">

                        <script>
                            window.addEventListener("load", function() {
                                // Confirm password script
                                // and button hiding code for UI
                                let submitButton= document.getElementById("signupButton");
                                let passconfirm= document.getElementById("signPassConfirm");
                                let pass=document.getElementById("signPass");
                                submitButton.style.display="none";
                                passconfirm.addEventListener("input" , function()
                                {
                                    
                                    console.log(pass.textContent);
                                    if(passconfirm.value!==""){
                                        if(pass.value===passconfirm.value)
                                        {
                                            document.getElementById("signupTarget").innerHTML="Password Matched!";
                                            submitButton.style.display="block";
                                        
                                        }else
                                        {
                                            document.getElementById("signupTarget").innerHTML="Password Doesn't Match!";
                                            submitButton.style.display="none";
                                        }
                                    }else{document.getElementById("signupTarget").innerHTML="Type Something";}
                                });

                                document.getElementById("signPass").addEventListener("input" , function()
                                {
                                    document.getElementById("signupTarget").innerHTML="";
                                    submitButton.style.display="none";
                                    
                                });
                            });
                        </script>
                        <div id="signupTarget" style="color: red; font-size: large;"></div>
                    </div>
                    
                </div>
                <div class="buttons" id="signupButton" style="display: none;">
                    <button  type="submit">SignUp</button>
                </div>
                

            </fieldset>
        </form>
        <h3><a href="../index.php"> Go Back to Login.. </a></h3>
            

    </div>
        
        
        
    
</body>

</html>