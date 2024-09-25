<?php
session_start();
include("../Assets/Connection/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Soccer &mdash; Website by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../Assets/Templates/Main/fonts/icomoon/style.css">

  <link rel="stylesheet" href="../Assets/Templates/Main/css/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="../Assets/Templates/Main/css/jquery-ui.css">
  <link rel="stylesheet" href="../Assets/Templates/Main/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../Assets/Templates/Main/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../Assets/Templates/Main/css/owl.theme.default.min.css">

  <link rel="stylesheet" href="../Assets/Templates/Main/css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="../Assets/Templates/Main/css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="../Assets/Templates/Main/fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="../Assets/Templates/Main/css/aos.css">

  <link rel="stylesheet" href="../Assets/Templates/Main/css/style.css">



</head>

<body>

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4" role="banner">

      <div class="container">
        <div class="d-flex align-items-center">
          <div class="site-logo">
            <a href="index.html">
              <!-- <img src="../Assets/Templates/Main/images/logo.png" alt="Logo"> --> <h1 class="text-white"><b><u>LeT'S PLaY</u></B></h1> 
            </a>
          </div>
          <div class="ml-auto">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li class="active"><a href="index.html" class="nav-link">Home</a></li>
                <li><a href="Myprofile.php" class="nav-link">MY profile</a></li>
                 
                <li><a href="Veiwturf.php" class="nav-link">Book Turf</a></li>
                <li><a href="Veiwturf.php" class="nav-link">My booking</a></li>
                <li><a href="../Logout.php" class="nav-link">Logout</a></li>

              </ul>
            </nav>

            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white"><span
                class="icon-menu h3 text-white"></span></a>
          </div>
        </div>
      </div>

    </header>

    <div class="hero overlay" style="background-image: url('../Assets/Templates/Main/images/bg_3.jpg');">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 ml-auto">
            <h1 class="text-white">Welcome</h1>
            <h2 class="text-white"><b><?php echo $_SESSION['uname']?></b></h2>
            <p><i>Explore And Book Sports Faciltes Near You.</i></p>
            <div id="date-countdown"></div>
            <p>
              <a href="Veiwturf.php" class="btn btn-primary py-3 px-4 mr-3">Book Turf</a>
            </p>  
          </div>
        </div>
      </div>
    </div>

  

    <div class="latest-news">
      <div class="container">
        <div class="row">
          <div class="col-12 title-section">
            <h2 class="heading">Latest News</h2>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-md-4">
            <div class="post-entry">
              <a href="#">
                <img src="../Assets/Templates/Main/images/img_1.jpg" alt="Image" class="img-fluid">
              </a>
              <div class="caption">
                <div class="caption-inner">
                  <h3 class="mb-3">Romolu to stay at Real Nadrid?</h3>
                  
                </div>
              </div> 
            </div>
          </div>
          <div class="col-md-4">
            <div class="post-entry">
              <a href="#">
                <img src="../Assets/Templates/Main/images/img_3.jpg" alt="Image" class="img-fluid">
              </a>
              <div class="caption">
                <div class="caption-inner">
                  <h3 class="mb-3">Kai Nets Double To Secure Comfortable Away Win</h3>
                  
                </div>
              </div> 
            </div>
          </div>
          <div class="col-md-4">
            <div class="post-entry">
              <a href="#">
                <img src="../Assets/Templates/Main/images/img_2.jpg" alt="Image" class="img-fluid">
              </a>
              <div class="caption">
                <div class="caption-inner">
                  <h3 class="mb-3">Dogba set for Juvendu return?</h3>
                  
                </div>
              </div> 
            </div>
          </div>
        </div>

      </div>
    </div>
    
    

    <div class="site-section">
      <div class="container">


        <div class="owl-4-slider owl-carousel">
          <div class="item">
            <div class="video-media">
              <img src="../Assets/Templates/Main/images/img_1.jpg" alt="Image" class="img-fluid">
              <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                <span class="icon mr-3">
                  <span class="icon-play"></span>
                </span>
                <div class="caption">
                  <h3 class="m-0">Dogba set for Juvendu return?</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="item">
            <div class="video-media">
              <img src="Assets/Templates/Main/images/img_2.jpg" alt="Image" class="img-fluid">
              <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                <span class="icon mr-3">
                  <span class="icon-play"></span>
                </span>
                <div class="caption">
                  <h3 class="m-0">Kai Nets Double To Secure Comfortable Away Win</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="item">
            <div class="video-media">
              <img src="../Assets/Templates/Main/images/img_3.jpg" alt="Image" class="img-fluid">
              <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                <span class="icon mr-3">
                  <span class="icon-play"></span>
                </span>
                <div class="caption">
                  <h3 class="m-0">Romolu to stay at Real Nadrid?</h3>
                </div>
              </a>
            </div>
          </div>

          <div class="item">
            <div class="video-media">
              <img src="../Assets/Templates/Main/images/img_1.jpg" alt="Image" class="img-fluid">
              <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                <span class="icon mr-3">
                  <span class="icon-play"></span>
                </span>
                <div class="caption">
                  <h3 class="m-0">Dogba set for Juvendu return?</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="item">
            <div class="video-media">
              <img src="../Assets/Templates/Main/images/img_2.jpg" alt="Image" class="img-fluid">
              <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                <span class="icon mr-3">
                  <span class="icon-play"></span>
                </span>
                <div class="caption">
                  <h3 class="m-0">Kai Nets Double To Secure Comfortable Away Win</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="item">
            <div class="video-media">
              <img src="../Assets/Templates/Main/images/img_3.jpg" alt="Image" class="img-fluid">
              <a href="https://vimeo.com/139714818" class="d-flex play-button align-items-center" data-fancybox>
                <span class="icon mr-3">
                  <span class="icon-play"></span>
                </span>
                <div class="caption">
                  <h3 class="m-0">Romolu to stay at Real Nadrid?</h3>
                </div>
              </a>
            </div>
          </div>

        </div>

      </div>
    </div>

   



    <footer class="footer-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <div class="widget mb-3">
              <h3>News</h3>
              <ul class="list-unstyled links">
                <li><a href="#">All</a></li>
                <li><a href="#">Club News</a></li>
                <li><a href="#">Media Center</a></li>
                <li><a href="#">Video</a></li>
                <li><a href="#">RSS</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="widget mb-3">
              <h3>Tickets</h3>
              <ul class="list-unstyled links">
                <li><a href="#">Online Ticket</a></li>
                <li><a href="#">Payment and Prices</a></li>
                <li><a href="#">Contact &amp; Booking</a></li>
                <li><a href="#">Tickets</a></li>
                <li><a href="#">Coupon</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="widget mb-3">
              <h3>Matches</h3>
              <ul class="list-unstyled links">
                <li><a href="#">Standings</a></li>
                <li><a href="#">World Cup</a></li>
                <li><a href="#">La Lega</a></li>
                <li><a href="#">Hyper Cup</a></li>
                <li><a href="#">World League</a></li>
              </ul>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="widget mb-3">
              <h3>Social</h3>
              <ul class="list-unstyled links">
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Youtube</a></li>
              </ul>
            </div>
          </div>

        </div>

        <div class="row text-center">
          <div class="col-md-12">
            <div class=" pt-5">
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;
                <script>
                  document.write(new Date().getFullYear());
                </script> All rights reserved | This template is made with <i class="icon-heart"
                  aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>

        </div>
      </div>
    </footer>



  </div>
  <!-- .site-wrap -->

  <script src="../Assets/Templates/Main/js/jquery-3.3.1.min.js"></script>
  <script src="../Assets/Templates/Main/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../Assets/Templates/Main/js/jquery-ui.js"></script>
  <script src="../Assets/Templates/Main/js/popper.min.js"></script>
  <script src="../Assets/Templates/Main/js/bootstrap.min.js"></script>
  <script src="../Assets/Templates/Main/js/owl.carousel.min.js"></script>
  <script src="../Assets/Templates/Main/js/jquery.stellar.min.js"></script>
  <script src="../Assets/Templates/Main/js/jquery.countdown.min.js"></script>
  <script src="../Assets/Templates/Main/js/bootstrap-datepicker.min.js"></script>
  <script src="../Assets/Templates/Main/js/jquery.easing.1.3.js"></script>
  <script src="../Assets/Templates/Main/js/aos.js"></script>
  <script src="../Assets/Templates/Main/js/jquery.fancybox.min.js"></script>
  <script src="../Assets/Templates/Main/js/jquery.sticky.js"></script>
  <script src="../Assets/Templates/Main/js/jquery.mb.YTPlayer.min.js"></script>


  <script src="../Assets/Templates/Main/js/jquery.mb.YTPlayer.min.jsjs/main.js"></script>

</body>

</html>