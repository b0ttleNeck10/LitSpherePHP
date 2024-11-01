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
        <div class="background">
            <div class="parent">
                <nav class="nav_container">
                    <ul>
                        <img src="nav_icon/Logo and Name.svg" alt="Logo & Name" style="width: 200px; height: 90px; margin-bottom: 25px; margin-top: 25px;">
                        <li>
                            <a href="bookprev.php">
                                <img src="nav_icon/Home Icon.svg" alt="Home">
                                <span class="nav_item">Home</span> 
                            </a>                        
                        </li>
                        <li>
                            <a href="mylibrary.html">
                                <img src="nav_icon/Library Icon.svg" alt="Library">
                                <span class="nav_item">My Library</span>
                            </a>
                        </li>
                        <li>
                            <a href="history.html">
                                <img src="nav_icon/History Icon.svg" alt="History">
                                <span class="nav_item">History</span>
                            </a>
                        </li>
                        <li>
                            <a href="profile.html">
                                <img src="nav_icon/Profile Icon.svg" alt="Profile">
                                <span class="nav_item">Profile</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="content_wrapper">
                    <div class="content_container">         
                        <div class="current_page">
                            <i class="fa-solid fa-chevron-left fa-2x"></i>
                            <h3>Home/It Ends With Us</h3>
                        </div>           
                        <div class="book_page">
                            <div class="req_book">
                                <img src="book_img/image2.svg" alt="">      
                                <button><a href="bookreq.html">Request Book</a></button> 
                            </div>       
                            <div class="book_deets">
                                <h6 class="header">Title</h6>
                                <p>It Ends With Us</p>
                                <h6 class="header">Author</h6>
                                <p>Isaac Nelson</p>
                                <h6 class="header">Genre</h6>
                                <p>Romance Fiction</p>
                                <h6 class="header">Description</h6>
                                <p>
                                    Lily hasn’t always had it easy, but that’s never stopped her from working hard for the life she wants. She’s come a long way from the small town in Maine where she grew up — she graduated from college, moved to Boston, and started her own business. So when she feels a spark with a gorgeous neurosurgeon named Ryle Kincaid, everything in Lily’s life suddenly seems almost too good to be true. <br> <br>
                                    Ryle is assertive, stubborn, maybe even a little arrogant. He’s also sensitive, brilliant, and has a total soft spot for Lily. 
                                </p>
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
            </div>
        </div>
        <div class="req_wrapper">
            <i class="fa-solid fa-xmark"></i>
            <div class="verif_container">
                <h4>Request Sent!</h4>
                <img src="verif_icon/success.svg" alt="Successful">
                <p>Your book request was sent successfully!</p>
            </div>
            <div class="req_container">
                <h4>Request Book</h4>
                <form action="">
                    <label for="day">Return Date:</label><br>
                    <select name="day" id="day_selection" required>
                        <option value="" disabled selected>Day</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select><br>
                    <label for="purpose">Purpose:</label><br>
                    <input type="checkbox" class="choice" name="referencing" value=0>
                    <label for="referencing">Referencing</label><br>
                    <input type="checkbox" class="choice" name="in_house" value=0>
                    <label for="in_house">In House Reading</label><br>
                    <button id="submit_req" type="submit">Request Book</button>
                </form>
            </div>
        </div>
        <script>
            const closeButton = document.querySelector('.fa-xmark');

            closeButton.addEventListener('click', function() {
                document.querySelector('.req_wrapper').style.display = 'none';
                document.querySelector('.background').style.filter = 'none';
                document.querySelector('.background').style.backgroundColor = 'none';
                document.querySelector('body').style.overflow = 'visible';
            });

            const reqButton = document.getElementById('submit_req');

            reqButton.addEventListener('click', function(event) {
                event.preventDefault();  // Prevent default form submission
                
                const form = document.querySelector('form');
                const daySelected = document.getElementById('day_selection').value;
                const checkboxes = document.querySelectorAll('.choice');
                let isChecked = false;
                
                // Check if any checkbox is selected
                checkboxes.forEach(function(checkbox) {
                    if (checkbox.checked) {
                        isChecked = true;
                    }
                });

                if (daySelected && isChecked) {
                    // Hide the form and show the verification message
                    document.querySelector('.req_container').style.visibility = 'hidden';
                    document.querySelector('.verif_container').style.visibility = 'visible';
                } else {
                    // Show an alert if form is not filled
                    alert('Please select a return day and purpose.');
                }
            });
        </script>     
    </body>
</html>