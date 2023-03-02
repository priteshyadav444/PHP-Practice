<?PHP
// all review array data
$data = array(
    array("title" => "FRONT END MULTICURRENCY", "description" => "using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model"),
    array("title" => "FRONT END MULTICURRENCY", "description" => "using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model"),
    array("title" => "FRONT END MULTICURRENCY", "description" => "using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model"),
    array("title" => "FRONT END MULTICURRENCY", "description" => "using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model"),
)
?>
<div class="classified ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>ONE OF THE BEST <span class="blu"> classified</span></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php
            for ($i = 1; $i <= count($data); $i++) {
            ?>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                            <div class="classified_box">
                                <span>0<strong class="blu2"><?php echo $i; ?></strong>.</span>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10 col-sm-12">
                            <div class="classified_box">
                                <div class="fornt">
                                    <h3> <?php echo $data[$i - 1]['title']; ?></h3>
                                    <p><?php echo $data[$i - 1]['description']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>