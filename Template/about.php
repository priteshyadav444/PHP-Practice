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
    <?php
    echo $projectname; ?>
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
    <?php
    include 'shared/header.php';
    ?>
    <!-- end header section -->
  </div>
  <!-- end hero area -->

  <!-- agency section -->

  <section class="agency_section layout_padding2-top">
    <div class="agency_container ">
      <div class="box ">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              About <span>Design</span> Agency
            </h2>
          </div>
          <p>
            <?php echo $description; ?>
          </p>
          <a href="">
            Read More
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end agency section -->



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