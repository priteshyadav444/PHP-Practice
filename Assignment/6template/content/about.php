<?php
// about description
$description = "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,";
?>
<div id="about" class="about">
    <div class="container-fluid">
        <div class="row d_flex">
            <div class="col-md-6">
                <div class="about_img">
                    <figure><img src="images/about_img.jpg" alt="#" /></figure>
                </div>
            </div>
            <div class="col-md-6">
                <div class="titlepage">
                    <h2>About <span class="blu">us</span></h2>
                    <p><?php echo $description; ?></p>
                    <a class="read_more">Read More</a>
                </div>
            </div>
        </div>
    </div>
</div>