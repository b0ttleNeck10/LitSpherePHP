<?php
    session_start();
    include('../connection.php');
    if (!isset($_SESSION['username'])) {
        header("Location: login.php"); // Redirect to login if not logged in
        exit();
    }

    $booksQuery = $conn->prepare("SELECT * FROM Books WHERE Status = 'Available'");
    $booksQuery->execute();
    $booksResult = $booksQuery->get_result();
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
        <link href='https://fonts.googleapis.com/css?family=Schibsted Grotesk' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    </head>
    <body>        
        <div class="parent">
            <nav class="nav_container">
                <ul>
                    <img src="/nav_icon/Logo and Name.svg" alt="Logo & Name" style="width: 200px; height: 90px; margin-bottom: 25px; margin-top: 25px;">
                    <li>
                        <a href="bookprev.php" class="active">
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
                    <div class="search_cat_wrapper">
                        <div class="search_container">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <input type="text" id="search_bar" placeholder="Search books">
                        </div>
                        <div class="cat_container">
                            <button class="dropBtn">
                                <p>Category</p>
                                <i class="fa-solid fa-chevron-down"></i>
                            </button>
                        </div>
                    </div>
                    <div class="categories">
                        <a href="#"><p>Action</p></a>
                        <a href="#"><p>Adventure</p></a>
                        <a href="#"><p>Comedy</p></a>
                        <a href="#"><p>Crime</p></a>
                        <a href="#"><p>Drama</p></a>
                        <a href="#"><p>Fantasy</p></a>
                        <a href="#"><p>Historical</p></a>
                        <a href="#"><p>Horror</p></a>
                        <a href="#"><p>Romance</p></a>
                        <a href="#"><p>Science Fiction</p></a>
                        <a href="#"><p>Thriller</p></a>
                    </div>
                    <div class="book_wrapper">
                        <div class="book_container">
                            <?php while ($book = $booksResult->fetch_assoc()): ?>
                                <div class="book" onclick="openBookDetails('<?php echo htmlspecialchars($book['CoverImageURL']); ?>', '<?php echo htmlspecialchars($book['Title']); ?>', '<?php echo htmlspecialchars($book['AuthorName']); ?>', '<?php echo htmlspecialchars($book['Description']); ?>', '<?php echo htmlspecialchars($book['Genre']); ?>')">
                                    <img src="<?php echo htmlspecialchars($book['CoverImageURL']); ?>" alt="Book Cover">
                                    <p id="button1">Read Now!</p>
                                </div>
                            <?php endwhile; ?>                     
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
            </div>
            <div class="popupbook" style="display: none;">
                <div class="popupbook-content">
                    <i class="fa-solid fa-xmark" id="close"></i>
                    <div class="imagecont">
                        <img src="" class="modal-image" alt="Book Cover"> <!-- Placeholder for dynamic content -->
                        <div class="textcontpopup">
                            <h1 class="BookTitle modal-title"></h1> <!-- Placeholder for dynamic content -->
                            <div class="bookinfo">
                                <h2 class="bookinf">Author</h2>
                                <h3 class="bookinf modal-author"></h3> <!-- Placeholder for dynamic content -->
                                <h2 class="bookinf">Genre</h2>
                                <h3 class="bookinf modal-genre"></h3>
                                <h2 class="bookinf">Description</h2>
                                <h3 class="bookinf modal-description"></h3> <!-- Placeholder for dynamic content -->
                                <a href="#" class="seemore">See more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
        </div>

        
            <!-- paras Popup
            <div class="popupbook">                    
                <div class="popupbook-content">
                    <i class="fa-solid fa-xmark" id="close"></i> -->
                    <!--Paras image-->
                    <!-- <div class="imagecont">
                        <img src="book_img/image1.svg"> -->
                        <!--Paras Text-->
                    <!-- <div class="textcontpopup"> -->
                        <!--title-->
                        <!-- <h1 class="BookTitle">IT ENDS WITH US</h1>
                        <div class="bookinfo"> -->
                            <!--author-->
                            <!-- <h2 class="bookinf">Author</h2>
                            <h3 class="bookinf">Isaac Nelson</h3> -->
                            <!--genre-->
                            <!-- <h2 class="bookinf">Genre</h2>
                            <h3 class="bookinf">Romance Fiction</h3> -->
                            <!--description-->
                            <!-- <h2 class="bookinf">Description</h2>
                            <h3 class="bookinf">
                                Lily hasn’t always had it easy, but that’s never stopped her from working hard for the life she wants. She’s come a long way from the small town in Maine where she grew up — she graduated from college, moved to Boston, and started her own business. So when she feels a spark with a gorgeous neurosurgeon named Ryle Kincaid, everything in Lily’s life suddenly seems almost too good to be true. <br> <br>
                                Ryle is assertive, stubborn, maybe even a little arrogant. He’s also sensitive, brilliant, and has a total soft spot for Lily.
                            </h3>
                            <a href="#" class="seemore">See more</a>  
                        </div>
                    </div>                              
                </div>
            </div> -->
        <script>
            const dropdownBtn = document.querySelector('.dropBtn');
            const categories = document.querySelector('.categories');

            dropdownBtn.addEventListener('click', function() {
                const isVisible = categories.style.visibility === 'visible';
                categories.style.visibility = isVisible ? 'hidden' : 'visible';
            });

            window.addEventListener('click', function(event) {
                const target = event.target;
                if (!dropdownBtn.contains(target)) {
                    categories.style.visibility = 'hidden';
                }
            });

            function openBookDetails(imageURL, title, author, description, genre) {
                console.log("Opening book details:", title); // Debug line
                document.querySelector('.modal-image').src = imageURL; // Assuming you have this element
                document.querySelector('.modal-title').textContent = title;
                document.querySelector('.modal-author').textContent = author;
                document.querySelector('.modal-description').textContent = description;
                document.querySelector('.modal-genre').textContent = genre; // Genre
                document.querySelector('.popupbook').style.display = 'flex';
            }

            // Close modal function
            document.querySelector('#close').onclick = function() {
                document.querySelector('.popupbook').style.display = 'none';
            };

            // // pop up click
            // document.querySelector(".book").addEventListener("click", function() {
            //     document.querySelector(".popupbook").style.visibility = "visible";
            // });

            // // pop close button
            // document.querySelector('.fa-xmark').addEventListener("click", function() {
            //     document.querySelector(".popupbook").style.visibility = "hidden";
            // });
        </script>  
    </body>
</html>