<?php
    session_start();
    include('../connection.php');
    if (!isset($_SESSION['username'])) {
        header("Location: login.php"); // Redirect to login if not logged in
        exit();
    }
?>

<!doctype HTML>

<html>  
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LitSphere</title>
        <link rel="icon" href="favicon/favicon.ico">
        <link rel="stylesheet" href="reader.css ">        
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="script.js"></script>
    </head>
    <body>        
        <div class="parent">
            <nav class="nav_container">
                <ul>
                    <img src="/nav_icon/Logo and Name.svg" alt="Logo & Name" style="width: 200px; height: 90px; margin-bottom: 25px; margin-top: 25px;">
                    <li>
                        <a href="bookprev.php">
                            <img src="/nav_icon/Home Icon.svg" alt="Home">
                            <span class="nav_item">Home</span> 
                        </a>                        
                    </li>
                    <li>
                        <a href="mylib.php">
                            <img src="/nav_icon/Library Icon.svg" alt="Library">
                            <span class="nav_item">My Library</span>
                        </a>
                    </li>
                    <li>
                        <a href="history.php">
                            <img src="/nav_icon/History Icon.svg" alt="History">
                            <span class="nav_item">History</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php" class="active">
                            <img src="/nav_icon/Profile Icon.svg" alt="Profile">
                            <span class="nav_item">
                                <?php 
                                    echo htmlspecialchars($_SESSION['username']); 
                                ?>
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="content_wrapper">
                <div class="content_container">
                    <div class="current_page">
                        <h3>Manage Account</h3>
                    </div>                     
                    <!-- diri and butanganan-->                        
                    <div class="main-cont">
                        <div class="pass-holder">
                            <button class="showBtn">
                                <i class="fa-solid fa-chevron-right" style="font-size: .9rem; margin-right: .8rem;"></i>
                                <p>Change password</p>
                            </button>                            
                        </div>
                        <div class="dropdown-content">
                            <p>Your password must be at least 6 characters and should include a combination of numbers, letters, and special characters (!$@%).</p>
                            <form action="">
                                <input type="password" id="enterpassword" name="enterpassword" placeholder=" Enter Password" class="inputbox"><br>
                                <input type="password" id="enternewpassword" name="enternewpassword" placeholder=" Enter New Password" class="inputbox"><br>
                                <input type="password" id="reenternewpassword" name="reenternewpassword" placeholder=" Re-Enter New Password" class="inputbox"><br>
                            </form>                            
                        </div>
                        <div class="perso-holder">
                            <button class="showBtn">
                                <i class="fa-solid fa-chevron-right" style="font-size: .9rem; margin-right: .8rem;"></i>
                                <p>Personal Details</p>
                            </button>                            
                        </div>  
                        <div class="dropdown-content">
                            <p>Your password must be at least 6 characters and should include a combination of numbers, letters, and special characters (!$@%).</p>
                            <form action="">
                                <input type="text" id="enter_firstname" name="enterpassword" placeholder="Enter Name" class="inputbox"><br>
                                <input type="text" id="enter_lastname" name="enternewpassword" placeholder=" Enter New Password" class="inputbox"><br>
                                <input type="text" id="enter_email" name="reenternewpassword" placeholder=" Re-Enter New Password" class="inputbox"><br>
                            </form>                            
                        </div>
                    </div>
                    <div class="saveChangesBtn">
                        <button id="multiBtn" type="submit">Save Changes</button>
                    </div>                    
                    <!-- diri end -->                    
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
            </div>            
        </div>
        <script>
            const dropdownBtns = document.querySelectorAll('.showBtn');
            const contents = document.querySelectorAll('.dropdown-content');

            dropdownBtns.forEach((btn, index) => {
                btn.addEventListener('click', function() {
                    const content = contents[index];
                    const icon = btn.querySelector('i'); // Select the icon inside the button
                    const isVisible = content.style.display === 'block';
                    
                    // Toggle content visibility
                    content.style.display = isVisible ? 'none' : 'block';
                    
                    // Toggle the icon class
                    if (isVisible) {
                        icon.classList.remove('fa-chevron-down');
                        icon.classList.add('fa-chevron-right');
                    } else {
                        icon.classList.remove('fa-chevron-right');
                        icon.classList.add('fa-chevron-down');
                    }
                });
            });
        </script>
    </body>
</html>