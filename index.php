<?php
    include('connection.php');
?>

<!doctype HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LitSphere</title>
        <link rel="icon" href="/favicon/favicon.ico">
        <link rel="stylesheet" href="myStyle.css">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div class="parent">
            <div class="user_auth_container">
                <div id="logo">
                    <img src="Logo and Name.svg" alt="LitSphere Logo" style="height: 120px; width: 400px;">
                </div>
                <div class="user_auth">
                    <div class="login">
                        <p>Log in</p>
                    </div>
                    <div class="sign_up">
                        <p>Sign up</p>
                    </div>
                </div>             
            </div>
            <div class="slogan_container">
                <div id="slogan">
                    <h3>Literary Sphere:<br> Your Gateway to<br> Endless Reads</h3>
                </div>
                <div id="frontImg_container">
                    <img src="frontPage.png" alt="Book" style="height: 420px; width: 430px;">
                </div>                
            </div> 
        </div>
        <div class="login_wrapper">
            <div class="login_container">
                <form method="post" action="login.php">
                    <i class="fa-solid fa-xmark"></i>
                    <h2 id="login">Log in</h2>
                    <label for="email">Email</label>    
                    <input type="text" id="email" required name="email">
                    <label for="password">Password</label>
                    <div class="password_container">
                        <input type="password" id="password" required name="password">
                        <i class="fa-regular fa-eye-slash"></i>
                    </div>      
                    <button type="submit" id="loginBtn" value="Log In" name="logIn">Log in</button>
                    <a href="#">Forgot password?</a>
                </form>                      
                <div id="bookimg">
                    <img src="Book Image.png" alt="Book Image">
                </div>   
            </div>
            <div class="signup_container">            
                <form method="post" action="signup.php">
                    <i class="fa-solid fa-xmark"></i>
                    <h2 id="signup">Sign up</h2>
                    <label for="firstname">First Name</label>
                    <input type="text" id="first_name" name="firstname">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="last_name" name="lastname">
                    <label for="email">Email</label>    
                    <input type="text" id="email" required name="email">
                    <label for="password">Password</label>
                    <input type="password" id="pass" required name="password">
                    <label for="confirm_password">Re-enter Password</label>
                    <input type="password" id="conf_pass" required>                    
                    <button type="submit" id="signupBtn" value="Sign Up" name="signUp">Sign up</button>
                </form>                      
                <div id="bookimg">
                    <img src="Book Image.png" alt="Book Image">
                </div>   
            </div>    
        </div>    
        <footer>
            <hr>
            <p>Copyrights &#169; 2024 Litsphere. All Rights Reserved.</p>
            <div class="iContainer">
                <a href="#"><img src="/footer_icon/Facebook Logo.png" alt="Facebook Logo"></a>
                <a href="#"><img src="/footer_icon/Twitter Logo.png" alt="Twitter Logo"></a>
                <a href="#"><img src="/footer_icon/Instagram Logo.png" alt="Instagram Logo"></a>
            </div>        
        </footer>
        <script>
            const loginBtn = document.querySelector('.login');

            loginBtn.addEventListener('click', function() {
                document.querySelector('.login_container').style.display = 'flex';
            });

            const signupBtn = document.querySelector('.sign_up')

            signupBtn.addEventListener('click', function() {
                document.querySelector('.signup_container').style.display = 'flex';
            });

            const closeButtons = document.querySelectorAll('.fa-xmark');

            closeButtons.forEach(function(closeButton) {
                closeButton.addEventListener('click', function() {
                    document.querySelector('.login_container').style.display = 'none';
                    document.querySelector('.signup_container').style.display = 'none';
                });
            });

            // Toggle password visibility
            const eyeIcon = document.querySelector('.fa-eye-slash');
            const passwordInput = document.getElementById('password');
            
            eyeIcon.addEventListener('click', function() {  
                if (passwordInput.getAttribute('type') === 'password') {
                    passwordInput.setAttribute('type', 'text');
                    eyeIcon.classList.replace("fa-eye-slash", "fa-eye");
                } else {
                    passwordInput.setAttribute('type', 'password');
                    eyeIcon.classList.replace("fa-eye", "fa-eye-slash");
                }
            });
        </script>
    </body>
</html>