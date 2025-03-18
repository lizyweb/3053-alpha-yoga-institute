<?php
session_start();

// Check if the user is logged in, redirect to login page if not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: index.html");
    exit;
}

// Logout logic
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to login page after logout
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Welcome to Alpha Yoga Institute, your destination for yoga, meditation, and wellness. Join us to find balance and harmony in body and mind.">
    <meta name="keywords" content="Alpha Yoga Institute, Yoga, Meditation, Wellness">
    
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@YourTwitterHandle">
    <meta name="twitter:title" content="Alpha Yoga Institute">
    <meta name="twitter:description" content="Alpha Yoga Institute: Elevating minds and bodies through holistic practice, fostering inner peace, strength, and well-being for all seekers.">
    <meta name="twitter:image" content="URL_TO_IMAGE">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Alpha Yoga Institute">
    <meta property="og:description" content="Alpha Yoga Institute: Elevating minds and bodies through holistic practice, fostering inner peace, strength, and well-being for all seekers.">
    <meta property="og:image" content="URL_TO_IMAGE">
    <meta property="og:url" content="URL_TO_YOUR_WEBSITE">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Alpha Yoga Institute">


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="img/favicon.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia|Lato">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css'>

    <!-- Assets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/animate/animate.min.css">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/slick/slick.css">
    <link rel="stylesheet" href="assets/slick/slick-theme.css">
    <link rel="stylesheet" href="assets/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" href="assets/aos/aos.css">
    <!-- <link rel="stylesheet" href="fonts/font-awesome.css"> -->

    <!-- Main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Dashboard</title>
    <style>
        .breadcrumbs {
            padding: 15px 0;
            background: #ecf6fe;
        }
        .breadcrumbs ol {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            padding: 0 0 10px 0;
            margin: 0;
            font-size: 14px;
        }
        .breadcrumbs ol li+li {
            padding-left: 10px;
        }
        .breadcrumbs ol li+li::before {
            display: inline-block;
            padding-right: 10px;
            color: #f8c255;
            content: "/";
        }

        .get-quote{
            margin-right:50px;
            margin-top:50px
        }
        @media (max-width: 767px) {
            .get-quote{
                margin-right:10px;
            }
        }
    </style>
    <style>
        .banner-area {
            background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url(img/image/yoga1.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        /* Video Gallery */
        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            margin-bottom: 20px;
        }
        .custom-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .video-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: none;
            border: none;
            font-size: 3rem;
            color: var(--brand);
            cursor: pointer;
        }
    </style>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">

<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li><a href="#">Dashboard</a></li>
        </ol>

        <div class="ms-auto" style="margin-top: 20px;">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="submit" name="logout" value="Logout"  class="btn btn-brand get-quote position-absolute end-0 top-0 mt-2 x-5">
          </form>
        </div>

      </div>
    </section>

    <div id="banner-area" class="banner-area">
        <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                    <h3 class="banner-title">Welcome, <?php echo $_SESSION['username']; ?></h3>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <section id="video-gallery">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="video-container">
                        <video class="custom-video">
                            <source src="img/video-1.mp4" type="video/mp4">
                        </video>
                        <button class="play-button"><i class='bx bx-play-circle'></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="video-container">
                        <video class="custom-video">
                            <source src="img/video-1.mp4" type="video/mp4">
                        </video>
                        <button class="play-button"><i class='bx bx-play-circle'></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Main JS File -->
    <script src="js/main.js"></script>
    <script src="js/index.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="assets/wow/wow.min.js"></script>
    <script src="assets/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/slick/slick.min.js"></script>
    <script src="assets/slick/slick-animation.min.js"></script>
    <script src="assets/fancybox/jquery.fancybox.min.js"></script>
    <script src="assets/aos/aos.js"></script>
    <script src="js/roberto.bundle.js"></script>
    <script>
        (function ($) {
            "use strict";
            
            // Initiate the wowjs
            new WOW().init();
            
        })(jQuery);
    </script>
    <script>
        // Back to top button
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.back-to-top').fadeIn('slow');
            } else {
                $('.back-to-top').fadeOut('slow');
            }
            });
            $('.back-to-top').click(function () {
            $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
            return false;
        });
    </script>
    <script>
        // Animation on scroll
        window.addEventListener('load', () => {
            AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
            })
        });
    </script>
    <script>
        // Gallery
        const customVideos = document.querySelectorAll('.custom-video');
        const playButtons = document.querySelectorAll('.play-button');

        playButtons.forEach((playButton, index) => {
             playButton.addEventListener('click', () => {
                customVideos[index].play();
                customVideos[index].controls = true;
                playButton.style.display = 'none';
            });
        });
    </script>
</body>
</html>