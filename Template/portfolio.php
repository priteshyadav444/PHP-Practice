<!DOCTYPE html>
<html>
<?php
require 'manifest.php';
?>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>
    <?php echo $projectname; ?>
  </title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700&display=swap" rel="stylesheet" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <?php include 'shared/header.php'; ?>

    <!-- end header section -->
  </div>
  <!-- end hero area -->

  <!-- portfolio section -->

  <section class="portfolio_section layout_padding2-top">
    <div class="heading_container">
      <h2>
        Por<span>tf</span>olio
      </h2>
      <p>
        adipiscingelit,sed do eiusmod tempor incididunt ut labore et dolore magn
      </p>
    </div>
    <div class="portfolio_container layout_padding">
      <div class="box-1">
        <div class="img-box b-1">
          <img src="images/p1.jpg" alt="">
          <div class="btn-box">
            <a href="" class="btn-1">

            </a>
            <a href="" class="btn-2">

            </a>
          </div>
        </div>
        <div class="img-box b-2">
          <img src="images/p2.jpg" alt="">
          <div class="btn-box">
            <a href="" class="btn-1">

            </a>
            <a href="" class="btn-2">

            </a>
          </div>
        </div>
      </div>
      <div class="box-2">
        <div class="img-box b-3">
          <img src="images/p3.jpg" alt="">
          <div class="btn-box">
            <a href="" class="btn-1">

            </a>
            <a href="" class="btn-2">

            </a>
          </div>
        </div>
        <div class="img-box b-4">
          <img src="images/p4.jpg" alt="">
          <div class="btn-box">
            <a href="" class="btn-1">

            </a>
            <a href="" class="btn-2">

            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end portfolio section -->


  <!-- info section -->

  <?php include "shared/footer.php";  ?>


  <!-- end info section -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script type="text/javascript" src="js/custom.js"></script>
</body>

</html>