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

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <?php echo include 'shared/header.php';
    ?>

    <!-- end header section -->
    <!-- slider section -->

    <section class="slider_section">
      <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
              01
            </li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1">
              02
            </li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2">
              03
            </li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6 px-0">
                    <div class="img-box">
                      <img src="images/slider-img.jpg" alt="" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="detail-box">
                      <h1>
                        Design
                        <br />
                        Agency
                      </h1>
                      <p>
                        There are many variations of passages of Lorem Ipsum available, but the
                      </p>
                      <a href="">
                        Contact Us
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6 px-0">
                    <div class="img-box">
                      <img src="images/slider-img.jpg" alt="" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="detail-box">
                      <h1>
                        Design
                        <br />
                        Agency
                      </h1>
                      <p>
                        There are many variations of passages of Lorem Ipsum available, but the
                      </p>
                      <a href="">
                        Contact Us
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6 px-0">
                    <div class="img-box">
                      <img src="images/slider-img.jpg" alt="" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="detail-box">
                      <h1>
                        Design
                        <br />
                        Agency
                      </h1>
                      <p>
                        There are many variations of passages of Lorem Ipsum available, but the
                      </p>
                      <a href="">
                        Contact Us
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel_btn-box">
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="sr-only">Previous</span>
            </a>
            <img src="images/line.png" alt="" />
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- service section -->

  <section class="service_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Ser<span>vi</span>ces
        </h2>
        <p>
          adipiscingelit,sed do eiusmod tempor incididunt ut labore et dolore magn
        </p>
      </div>
      <div class="row">
        <div class="col-lg-6 ">
          <div class="img-container tab-content">
            <div class="img-box tab-pane fade show active" id="img1" role="tabpanel">
              <img src="images/service-img.jpg" alt="" />
            </div>
            <div class="img-box tab-pane fade  " id="img2" role="tabpanel">
              <img src="images/service-img.jpg" alt="" />
            </div>
            <div class="img-box tab-pane fade  " id="img3" role="tabpanel">
              <img src="images/service-img.jpg" alt="" />
            </div>
            <div class="img-box tab-pane fade  " id="img4" role="tabpanel">
              <img src="images/service-img.jpg" alt="" />
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="detail-container nav nav-tabs" id="myTab" role="tablist">
            <div class="detail-box active" id="img1-tab" data-toggle="tab" href="#img1" role="tab" aria-selected="true">
              <h4>
                Website <br />
                design
              </h4>
            </div>
            <div class="detail-box" id="img2-tab" data-toggle="tab" href="#img2" role="tab" aria-selected="false">
              <h4>
                Logo <br />
                design
              </h4>
            </div>
            <div class="detail-box" id="img2-tab" data-toggle="tab" href="#img3" role="tab" aria-selected="false">
              <h4>
                brochure <br />
                design
              </h4>
            </div>
            <div class="detail-box" id="img2-tab" data-toggle="tab" href="#img4" role="tab" aria-selected="false">
              <h4>
                visiting card <br />
                design
              </h4>
            </div>
          </div>
        </div>
      </div>
      <div class="btn-box">
        <a href="">
          Read More
        </a>
      </div>
    </div>
  </section>

  <!-- end service section -->

  <!-- portfolio section -->

  <section class="portfolio_section">
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

  <!-- logo section -->

  <section class="logo_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          A N<span>EW</span> Logo <br>
          FOR YOUR COMPANY
        </h2>
        <p>
          adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn
        </p>
      </div>
    </div>
    <div class="logo_container layout_padding">
      <div class="carousel-wrap">
        <div class="owl-carousel">
          <div class="item">
            <div class="box  b1">
              <div class="img-box">
                <img src="images/l1.jpg" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Logo
                </h4>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box b2">
              <div class="img-box">
                <img src="images/l2.jpg" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Logo
                </h4>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box  b1">
              <div class="img-box">
                <img src="images/l3.jpg" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Logo
                </h4>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box b2">
              <div class="img-box">
                <img src="images/l4.jpg" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Logo
                </h4>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box  b1">
              <div class="img-box">
                <img src="images/l5.jpg" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Logo
                </h4>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box b2">
              <div class="img-box">
                <img src="images/l6.jpg" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Logo
                </h4>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box  b1">
              <div class="img-box">
                <img src="images/l3.jpg" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Logo
                </h4>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box b2">
              <div class="img-box">
                <img src="images/l4.jpg" alt="">
              </div>
              <div class="detail-box">
                <h4>
                  Logo
                </h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end logo section -->


  <!-- started section -->

  <section class="started_section layout_padding-bottom">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Lets <span>Get</span> Started <br>
                Your Project
              </h2>
              <p>
                adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magn
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-4 offset-md-1">
          <div class="btn-box">
            <a href="">
              Let’s talk
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end started section -->

  <!-- agency section -->

  <section class="agency_section layout_padding-bottom">
    <div class="agency_container ">
      <div class="box ">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              About <span>Design</span> Agency
            </h2>
          </div>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
          </p>
          <a href="">
            Read More
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end agency section -->


  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container px-0">
      <div class="heading_container">
        <h2 class="">
          Con<span>ta</span>ct Us
        </h2>
      </div>

    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-8 col-md-7 px-0">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-md-5 col-lg-4 px-0">
          <form action="">
            <div>
              <input type="text" placeholder="Name" />
            </div>
            <div>
              <input type="email" placeholder="Email" />
            </div>
            <div>
              <input type="text" placeholder="Phone" />
            </div>
            <div>
              <input type="text" class="message-box" placeholder="Message" />
            </div>
            <div class="d-flex ">
              <button>
                SEND
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- end contact section -->

  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container">
        <h2>
          What <span>says</span> our clients
        </h2>
      </div>
      <div class="box">
        <div class="client_id">
          <div class="name">
            <h4>
              Sandy <br>
              Nor
            </h4>
          </div>
          <div class="img-box">
            <img src="images/client.jpg" alt="">
          </div>
        </div>
        <div class="detail-box">
          <p>
            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem
          </p>
          <img src="images/quote.png" alt="">
        </div>
      </div>
    </div>
  </section>

  <!-- end client section -->


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