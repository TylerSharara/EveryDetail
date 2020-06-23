<?php
//
// practice nav animation test
//

include_once('dbcred.php');

//some validation
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//func for requesting quote
if (isset($_POST['action']) && $_POST['value'] = 'submit'){

    $flag = true;
    $msg = "";
    $name = test_input($_POST['name']);
    $email = test_input($_POST['email']);
    $phone = test_input($_POST['phone']);

    if(empty($name) || !is_string($name)){
        $flag = false;
        $errMsg = "Please enter a valid name";
    }
    if(empty($email) || !is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
        $flag = false;
        $errMsg = "Please enter a valid email";
    }
    if(empty($phone) || !is_string($phone) || !is_numeric($phone)){
        $flag = false;
        $errMsg = "Please enter a valid phone";
    }

    if ($flag) {
        $sql = "INSERT INTO `Customer` (`customerName`, `customerEmail`, `customerPhone`) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $phone]);
        $msg = true;
    } else {
        $msg = false;
    }

}


?>


    <head>
        <!--
        Tyler Sharara

        Nav Project
        -->
        <title> Prac Nav </title>
        <meta charset="UTF-8">
        <meta name="PracNav-1" content="Home page for a mock business">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="styles/style.css">
    </head>

    <body>

        <div id="home" class="home-background">
            <div class="home-overlay"></div>
            <nav>
                <img class="logo" src="media/every-Detail-Mini-white.png">
                <ul class="nav-bar">
                    <li class="nav-item"><a href="#home" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="#contact" class="nav-link">Contact</a></li>
                </ul>
                <div class="burger">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </nav>
            <h1 class="home-name">Every Detail Cleaning</h1>
            <p class="home-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pharetra. Etiam mi leo, vulputate tincidunt turpis id, accumsan sodales nibh. Etiam mi leo, vulputate tincidunt turpis id, accumsan sodales nibh.</p>
            <input type="button" value="Request Estimate" class="home-btn" onclick="window.scrollTo(0, 1500);">
            <?php
                if($msg == true) {
                    echo '<div id="pop-confirmation">';
                    echo '<h2 class="pop-content">Thank You!</h2>';
                    echo '<p class="pop-content">Your information was successfully saved. One of our representatives will contact you as soon as possible.</p>';
                    echo '<input type="button" value="Continue" class="req-btn" onclick="popHide()">';
                    echo '</div>';
                }
                elseif(isset($msg) && $msg == false) {
                    echo '<div id="pop-confirmation">';
                    echo '<h2 class="pop-content">Sorry! :(</h2>';
                    echo '<p class="pop-content">It seems as though something went wrong. Make sure you enter valid information. Please try again later or contact us directly.</p>';
                    echo '<input type="button" value="Continue" class="req-btn" onclick="popHide()">';
                    echo '</div>';
                }
            ?>
        </div>

        <main>
            <div id="about" class="home-content">
                <div class="home-content-inner fade-in">
                    <h2>Professional Cleaning</h2>
                    <p class="home-content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pharetra faucibus.</p>
                </div>
                <div class="home-content-inner fade-in">
                    <h2>Reliable People</h2>
                    <p class="home-content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pharetra. Etiam mi leo, vulputate turpis id, sodales nibh.</p>
                </div>
                <div class="home-content-inner fade-in">
                    <h2>Friendly Service</h2>
                    <p class="home-content-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pharetra faucibus.</p>
                </div>
            </div>
            <br>
            <div class="tile-container">
                <div class="tile long-tile fade-in2">
                    <h1 class="tile-title">Residential</h1>
                    <p class="tile-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pharetra. Etiam mi leo, vulputate tincidunt turpis id, accumsan sodales nibh.</p>
                    <div class="tile-overlay"></div>
                    <img class="tile-img" src="media/nice-house.jpg">
                </div>
                <div class="tile short-tile fade-in2">
                    <h1 class="tile-title">Move In/Out</h1>
                    <p class="tile-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pharetra. Etiam mi leo.</p>
                    <div class="tile-overlay"></div>
                    <img class="tile-img" src="media/empty-room.jpg">
                </div>
                <div class="tile short-tile fade-in2">
                    <h1 class="tile-title">Apartments</h1>
                    <p class="tile-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pharetra. Etiam mi leo.</p>
                    <div class="tile-overlay"></div>
                    <img class="tile-img" src="media/apartment-door.jpg">
                </div>
                <div class="tile long-tile fade-in2">
                    <h1 class="tile-title">Commercial</h1>
                    <p class="tile-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pharetra. Etiam mi leo, vulputate tincidunt turpis id, accumsan sodales nibh.</p>
                    <div class="tile-overlay"></div>
                    <img class="tile-img" src="media/office-space.jpg">
                </div>
            </div>
            <div class="faq-container">
                <div class="faq-container-inner">
                <button id="faq1" class="faq-question">FAQ question 1</button>
                    <div class="faq-answer">
                        <p class="faq-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pharetra. Etiam mi leo, vulputate tincidunt turpis id, accumsan sodales nibh.</p>
                    </div>
                <button class="faq-question">FAQ question 2</button>
                    <div class="faq-answer">
                        <p class="faq-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pharetra. Etiam mi leo, vulputate tincidunt turpis id, accumsan sodales nibh.</p>
                    </div>
                <button class="faq-question">FAQ question 3</button>
                    <div class="faq-answer">
                        <p class="faq-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pharetra. Etiam mi leo, vulputate tincidunt turpis id, accumsan sodales nibh.</p>
                    </div>
                <button class="faq-question">FAQ question 4</button>
                    <div class="faq-answer">
                        <p class="faq-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pharetra. Etiam mi leo, vulputate tincidunt turpis id, accumsan sodales nibh.</p>
                    </div>
                <button class="faq-question">FAQ question 5</button>
                    <div class="faq-answer">
                        <p class="faq-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pharetra. Etiam mi leo, vulputate tincidunt turpis id, accumsan sodales nibh.</p>
                    </div>
                </div>
            </div>
            <br>
            <div class="request-div">
                <div id="contact" class="req-form">
                    <div class="req-overlay"></div>
                    <form method="POST" action="" id="request-form">
                        <h1 class="req-header">&#x2015; Request Estimate &#x2015;</h1>
                        <div class="form-input">
                            <input type="text" name="name"  id="name"  class="req-input" autocomplete="stop" required>
                            <label for="name" class="req-label">
                                <span class="label-content">Name</span>
                            </label>
                        </div>
                        <div class="form-input">
                            <input type="text" name="email" id="email" class="req-input" autocomplete="nofill" required>
                            <label for="email" class="req-label">
                                <span class="label-content">Email</span>
                            </label>
                        </div>
                        <div class="form-input">
                            <input type="text" name="phone" id="phone" class="req-input" autocomplete="nofill" required>
                            <label for="phone" class="req-label">
                                <span class="label-content">Phone</span>
                            </label>
                        </div>
                        <br>
                        <input type="hidden" name="action" value="submit">
                        <input type="submit" class="req-btn">
                    </form>
                </div>
                    <div class="map-container">
                        <iframe id="google-map" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=Dearborn%2C%20Mi+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=15&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/draw-radius-circle-map/">km radius map</a></iframe><br/>
                    </div>
            </div>
        </main>
        <br><br>
        <script src="scripts/test.js"></script>

    </body>

    <footer>
        <div class="req-overlay"></div>
        <div class="footer-container">
            <div class="footer-section">
                <h3 class="footer-header">Navigation</h3>
                <ul class="footer-nav">
                    <li class="footer-nav-item"><a href="#" class="footer-nav-link">Home</a></li>
                    <li class="footer-nav-item"><a href="#" class="footer-nav-link">About</a></li>
                    <li class="footer-nav-item"><a href="#" class="footer-nav-link">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3 class="footer-header">Company</h3>
                <ul class="footer-nav">
                    <li class="footer-nav-item"><a href="#" class="footer-nav-link">FAQ's</a></li>
                    <li class="footer-nav-item"><a href="#" class="footer-nav-link">Careers</a></li>
                    <li class="footer-nav-item"><a href="#" class="footer-nav-link">Feedback</a></li>
                </ul>
            </div>
        </div>
        <div class="logo-container">
            <img class="logo" src="media/every-Detail-Mini-white.png">
            <p>All rights reserved EveryDetailCleaning © 2020</p>
        </div>
        <div class="social-container">
            <p>Stay in Touch! Follow us on social media to get exclusive offers!</p>
            <ul class="social-nav">
                <li><a href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                <li><a href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                <li><a href="http://www.instagram.com"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
    </footer>