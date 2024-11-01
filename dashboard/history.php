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
        <script defer src="script.js"></script>
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
                        <a href="mylib.php" >
                            <img src="/nav_icon/Library Icon.svg" alt="Library">
                            <span class="nav_item">My Library</span>
                        </a>
                    </li>
                    <li>
                        <a href="history.php" class="active">
                            <img src="/nav_icon/History Icon.svg" alt="History">
                            <span class="nav_item">History</span>
                        </a>
                    </li>
                    <li>
                        <a href="profile.php">
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
                        <h3>History</h3>
                    </div>
                    <div class="history_container">
                        <div class="history">
                            <p>You added the book 'Don't Look Back' in your Library.</p>
                        </div>
                        <div class="history">
                            <p>You added the book 'Don't Look Back' in your Library.</p>
                        </div>
                        <div class="history">
                            <p>You added the book 'Don't Look Back' in your Library.</p>
                        </div>     
                        <div class="history">
                            <p>You added the book 'Don't Look Back' in your Library.</p>
                        </div>  
                        <div class="history">
                            <p>You added the book 'Don't Look Back' in your Library.</p>
                        </div>
                        <div class="history">
                            <p>You added the book 'Don't Look Back' in your Library.</p>
                        </div>
                        <div class="history">
                            <p>You added the book 'Don't Look Back' in your Library.</p>
                        </div>
                    </div>
                    <div class="clearBtn">
                        <button id="multiBtn" type="submit" style="padding-left: 25px; padding-right: 25px; margin-bottom: 0;">Clear</button>
                    </div>
                </div>
                <footer>
                    <p>Copyrights &#169; 2024 Litsphere. All Rights Reserved.</p>
                    <div class="iContainer">
                        <a href="#"><img src="/footer_icon/Facebook Logo.png" alt="Facebook Logo"></a>
                        <a href="#"><img src="/footer_icon/Twitter Logo.png" alt="Twitter Logo"></a>
                        <a href="#"><img src="/footer_icon/Instagram Logo.png" alt="Instagram Logo"></a>
                    </div>        
                </footer> 
            </div>            
        </div>
    </body>
</html>