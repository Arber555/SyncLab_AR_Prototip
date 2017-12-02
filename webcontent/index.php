<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SyncLab</title>
        <link rel="stylesheet" href="css/style.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">    
        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body background="img/background.png">
        <header>

            <div id="wrapper">
                <div class="main-logo">
                    <img src="images/logo.png" alt="Logo">
                </div>   

            </div>
        </header>

        <section>

            <div id="wrapper">
                <div class="logo-img">

                    <img src="images/Icon.svg">

                </div>
            </div>

            <div id="wrapper">
                <div class="info">
                    <h1>Create Augmented Reality</h1>

                    <h2>Synclab is the easiest way to create augmented reality experiences</h2>

                    <input type="button" id="login-style" value="Login"/>
                    <input type="button" id="register-style" value="Register"/>
                </div>
            </div>
        </section>

        <div id="log-in" class="log-in">
            <div class="login-content">
                <span class="close-login">
                    <i class="fa fa-close"></i>
                </span>
                <i class="fa fa-sign-in"></i>
                <h1>Log in</h1>
                <form action="login.php" method="post">
                    <i class="fa fa-user"></i><input type="text" id="login-username" placeholder="Username" name="username">
                    <i class="fa fa-key"></i><input type="password" id="login-password" placeholder="********" name="password">
                    <div id="login-error"></div>
                    <input type="submit" id="login-button" name="login-button" value="Log in">
                    <span class="register-now"><p>Don't have an account?</p><a href="">Register now!</a></span>
                </form>
            </div> 
        </div>

        <script>
            var login = document.getElementById("log-in");
            var btn = document.getElementById("login-style");
            var exit = document.getElementsByClassName("close-login")[0];

            btn.onclick = function(){
                login.style.display = "block";
            }
            exit.onclick = function(){
                login.style.display = "none";   
            }
        </script>

        <script>

            function LogIn(){

                var user = document.getElementById("login-username").value;
                var pass = document.getElementById("login-password").value;

                var users = [
                    {
                        username: "Marisa Ayala",
                        password: "marisa123"
                    },
                    {
                        username: "Elvis Maddox",
                        password: "elvis123"
                    },
                    {
                        username: "Kasey Morton",
                        password: "kasey123"
                    },
                    {
                        username: "admin",
                        password: "admin"
                    },
                ];

                for(var i = 0; i < users.length; i++)
                {
                    if(user == users[i].username  && pass == users[i].password){

                        alert("Successfully logged in");
                        localStorage.setItem("username",user);
                        window.location = "logged-in.html";
                        break;


                    }
                    else
                        if(user != users[i].username && pass != users[i].password)
                        {
                            document.getElementById("login-error").innerHTML = "*Please enter your details correctly";                           
                        }
                }
            }
        </script>

    </body>
</html>