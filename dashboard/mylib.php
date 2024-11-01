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
        <link rel="stylesheet" href="reader.css">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        <a href="mylib.php" class="active">
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
                        <h3>My Library</h3>
                    </div>
                    <div class="slider_container">  
                        <button class="prev_btn"><i class="fa-solid fa-angle-left"></i></button>
                        <div class="slider">
                            <div class="slides">
                                <div class="book3">
                                    <a href="Harry.html"><img src="book_img/image1.svg"></a>
                                </div>
                                <div class="book3">
                                    <a href="walk.html"><img src="book_img/walk.png"></a>
                                </div>
                                <div class="book3">
                                    <a href="grindel.html"><img src="book_img/grindelwald.png"></a>
                                </div>
                                <div class="book3">
                                    <a href="water.html"><img src="book_img/water.png"></a>
                                </div>
                                <div class="book3">
                                    <a href="darkside.html"><img src="book_img/darkside.png"></a>
                                </div>
                                <div class="book3">
                                    <a href="follow.html"><img src="book_img/follow.png"></a>
                                </div>
                                <div class="book3">
                                    <a href="follow.html"><img src="book_img/space.png"></a>
                                </div>
                                <div class="book3">
                                    <a href="follow.html"><img src="book_img/space.png"></a>
                                </div>
                            </div>
                        </div>
                        <button class="next_btn"><i class="fa-solid fa-angle-right"></i></button>
                    </div>
                    <div class="suggestion_container">
                        <div class="suggestion">
                            <h4>Suggestions</h4>
                        </div>            
                        <div class="book_wrapper">
                            <div class="book_container">
                                <div class="book">
                                    <a href="#">
                                        <img src="book_img/image1.svg">
                                        <p>Read Now!</p>
                                    </a>
                                </div>
                                <div class="book">
                                    <a href="#">
                                        <img src="book_img/image1.svg">
                                        <p>Read Now!</p>
                                    </a>
                                </div>
                                <div class="book">
                                    <a href="#">
                                        <img src="book_img/image1.svg">
                                        <p>Read Now!</p>
                                    </a>
                                </div>
                                <div class="book">
                                    <a href="#">
                                        <img src="book_img/image1.svg">
                                        <p>Read Now!</p>
                                    </a>
                                </div>
                                <div class="book">
                                    <a href="#">
                                        <img src="book_img/image1.svg">
                                        <p>Read Now!</p>
                                    </a>
                                </div>
                                <div class="book">
                                    <a href="#">
                                        <img src="book_img/image1.svg">
                                        <p>Read Now!</p>
                                    </a>
                                </div>
                                <div class="book">
                                    <a href="home.html">
                                        <p>See More</p>
                                    </a>
                                </div>                       
                            </div>
                        </div>                                        
                    </div>
                </div>
                <button class="button-36" role="button">Return</button>
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
        </div>

        <script>
            const slides = document.querySelector('.slides');
            const prevButton = document.querySelector('.prev_btn');
            const nextButton = document.querySelector('.next_btn');
            let currentIndex = 0;
            const slideWidth = document.querySelector('.book3').clientWidth; // Including gap

            nextButton.addEventListener('click', () => {
                currentIndex++;
                if (currentIndex >= slides.children.length) {
                    currentIndex = 0;
                }
                slides.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
            });

            prevButton.addEventListener('click', () => {
                currentIndex--;
                if (currentIndex < 0) {
                    currentIndex = slides.children.length - 1;
                }
                slides.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
            });
        </script>
    </body>

</html>
