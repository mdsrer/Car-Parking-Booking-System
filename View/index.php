<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>Car Parking Booking Here!</title>

    <link rel="stylesheet" href="../View/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../View/assets/css/main.css">
    <link rel="stylesheet" href="../View/assets/css/green.css">
    <link rel="stylesheet" href="../View/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="../View/assets/css/owl.transitions.css">
    <link href="../View/assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="../View/assets/css/animate.min.css">
    <link rel="stylesheet" href="../View/assets/css/rateit.css">
    <link rel="stylesheet" href="../View/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../View/assets/css/config.css">
    <link rel="stylesheet" href="../View/assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
</head>

<body class="cnt-home">

    <header class="header-style-1">
        <?php include('includes/top-header.php');?>
        <?php include('includes/main-header.php');?>
        <?php include('includes/menu-bar.php');?>
    </header>
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="furniture-container homepage-container">
                <div class="row">
                </div>
                <div class="col-xs-50 col-sm-50 col-md-200 homebanner-holder">

                    <div id="hero" class="homepage-slider3">
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                            <div class="full-width-slider">
                                <div class="item"
                                    style="background-image: url(../View/assets/images/sliders/slider1.png);">
                                </div>
                            </div>

                            <div class="full-width-slider">
                                <div class="item full-width-slider"
                                    style="background-image: url(../View/assets/images/sliders/slider2.png);">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <h3>
                <p align=center style="background-color:powderblue;">Random Parking-lots</p>
            </h3>
        </div>
    </div>
    <div class="tab-content outer-top-xs">
        <div class="tab-pane in active" id="all">
            <div class="parking-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    <?php
while ($row=mysqli_fetch_array($ret)) 
{
?>
                    <div class="item item-carousel">
                        <div class="parkings">

                            <div class="parking">
                                <div class="parking-image">
                                    <div class="image">
                                        <img src="../View/parkingimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['parkingImage1']);?>"
                                            data-echo="../View/parkingimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['parkingImage1']);?>"
                                            width="180" height="300" alt=""></a>
                                    </div>
                                </div>


                                <div class="parking-info text-left">
                                    <h3 class="name"><a
                                            <?php echo htmlentities($row['id']);?>><?php echo htmlentities($row['parkingName']);?></a>
                                    </h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <?php echo htmlentities($row['parkingaddress']);?> </span>

                                    <div class="parking-price">
                                        <span class="price">
                                            Tk.<?php echo htmlentities($row['parkingPrice']);?> </span>
                                    </div>
                                </div>
                                <?php if($row['parkingAvailability']=='In Stock'){?>
                                <div class="action"><a
                                        href="../Controller/indexControl.php?page=parking&action=add&id=<?php echo $row['id']; ?>"
                                        class="lnk btn btn-primary">Choose Parking</a></div>
                                <?php } else {?>
                                <div class="action" style="color:red">Out of Stock</div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="tab-pane" id="books">
            <div class="parking-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                    <?php
while ($row=mysqli_fetch_array($ret)) 
{
?>
                    <div class="item item-carousel">
                        <div class="parkings">
                            <div class="parking">
                                <div class="parking-image">
                                    <div class="image">
                                        <?php echo htmlentities($row['id']);?>
                                        <img src="../View/parkingimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['parkingImage1']);?>"
                                            data-echo="../View/parkingimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['parkingImage1']);?>"
                                            width="180" height="300" alt=""></a>
                                    </div>
                                </div>
                                <div class="parking-info text-left">
                                    <h3 class="name">
                                        <?php echo htmlentities($row['id']);?>><?php echo htmlentities($row['parkingName']);?>
                                    </h3>
                                    <div class="rating rateit-small"></div>
                                    <div class="description"></div>

                                    <div class="parking-price">
                                        <span class="price">
                                            Tk.<?php echo htmlentities($row['parkingPrice']);?> </span>
                                    </div>
                                </div>
                                <?php if($row['parkingAvailability']=='In Stock'){?>
                                <div class="action">Choose Parking</div>
                                <?php } else {?>
                                <div class="action" style="color:red">Not Available</div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="tab-pane" id="furniture">
                <div class="parking-slider">
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                        <script src="../View/assets/js/jquery-1.11.1.min.js"></script>
                        <script src="../View/assets/js/bootstrap.min.js"></script>
                        <script src="../View/assets/js/bootstrap-hover-dropdown.min.js"></script>
                        <script src="../View/assets/js/owl.carousel.min.js"></script>
                        <script src="../View/assets/js/echo.min.js"></script>
                        <script src="../View/assets/js/jquery.easing-1.3.min.js"></script>
                        <script src="../View/assets/js/bootstrap-slider.min.js"></script>
                        <script src="../View/assets/js/jquery.rateit.min.js"></script>
                        <script type="text/javascript" src="../View/assets/js/lightbox.min.js"></script>
                        <script src="../View/assets/js/bootstrap-select.min.js"></script>
                        <script src="../View/assets/js/wow.min.js"></script>
                        <script src="../View/assets/js/scripts.js"></script>
                        <script src="switchstylesheet/switchstylesheet.js"></script>
                        <script>
                        $(document).ready(function() {
                            $(".changecolor").switchstylesheet({
                                seperator: "color"
                            });
                            $('.show-theme-options').click(function() {
                                $(this).parent().toggleClass('open');
                                return false;
                            });
                        });

                        $(window).bind("load", function() {
                            $('.show-theme-options').delay(2000).trigger('click');
                        });
                        </script>
</body>

</html>