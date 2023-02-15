<header class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
            <a class="navbar-brand" href="index">
                <img src="images/logo.png" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
            $filename = basename($_SERVER['SCRIPT_FILENAME'], ".php");
            ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                    <ul class="navbar-nav  ">
                        <li class="nav-item <?php if ($filename == 'index') echo 'active'; ?>">
                            <a class="nav-link" href="index">
                                Home <?php if ($filename == "index") {
                                            echo '<span class="sr-only">(current)</span>';
                                        } ?>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($filename == 'about') echo 'active'; ?>">
                            <a class="nav-link" href="about">
                                About <?php if ($filename === "about") {
                                            echo '<span class="sr-only">(current)</span>';
                                        } ?>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($filename == 'service') echo 'active'; ?>">
                            <a class="nav-link" href="service">
                                Services <?php if ($filename == "service") {
                                                echo '<span class="sr-only">(current)</span>';
                                            } ?>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($filename == 'portfolio') echo 'active'; ?>">
                            <a class="nav-link" href="portfolio">
                                Portfolio <?php if ($filename == "portfolio") {
                                                echo '<span class="sr-only">(current)</span>';
                                            } ?>
                            </a>
                        </li>
                        <li class="nav-item <?php if ($filename == 'contact') echo 'active'; ?>">
                            <a class="nav-link" href="contact">Contact Us
                                <?php if ($filename == "contact") {
                                    echo '<span class="sr-only">(current)</span>';
                                } ?></a>

                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                    </form>
                </div>
            </div>
        </nav>
    </div>
</header>