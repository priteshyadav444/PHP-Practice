<?php
// review main description
$description = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it";
// review array of all 
$reviews = array(
    array("client_name" => "FRONT END MULTICURRENCY", "designation" => "adviser", "review" => "t is a long established fact that a reader will be distracted by the readable content of a page
    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
    distribution of letters, as opposed to"),
    array("client_name" => "FRONT END MULTICURRENCY", "designation" => "adviser", "review" => "t is a long established fact that a reader will be distracted by the readable content of a page
    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
    distribution of letters, as opposed to"),
    array("client_name" => "FRONT END MULTICURRENCY", "designation" => "adviser", "review" => "t is a long established fact that a reader will be distracted by the readable content of a page
    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
    distribution of letters, as opposed to"),
    array("client_name" => "FRONT END MULTICURRENCY", "designation" => "adviser", "review" => "t is a long established fact that a reader will be distracted by the readable content of a page
    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
    distribution of letters, as opposed to"),
    array("client_name" => "FRONT END MULTICURRENCY", "designation" => "adviser", "review" => "t is a long established fact that a reader will be distracted by the readable content of a page
    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
    distribution of letters, as opposed to"),
)
?>
<div id="review" class="review">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Our client <span class="blu"> review</span></h2>
                    <p><?php echo $description; ?></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="myCarousel" class="carousel slide review_Carousel " data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                        // LOOPING ON ALL REVIEWS
                        for ($i = 1; $i <= count($reviews); $i++) {
                        ?>
                            <li data-target="#myCarousel" data-slide-to="<?php echo ($i - 1); ?>" class="<?php if ($i == 1) echo "active"; ?>"></li>
                        <?php
                        }
                        ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        // LOOPING ON ALL REVIEWS
                        for ($i = 1; $i <= count($reviews); $i++) {
                        ?>
                            <div class="carousel-item <?php if ($i == 1) echo "active"; ?>">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <div class="row">
                                            <div class="col-md-12 margin_boot">
                                                <div class="test_box">
                                                    <i><img src="images/te1.png" alt="#" /></i>
                                                    <h4><?php echo $reviews[$i - 1]['client_name']; ?></h4>
                                                    <span>(<?php echo $reviews[$i - 1]['designation']; ?>)</span>
                                                    <p>
                                                        <?php echo $reviews[$i - 1]['review']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>