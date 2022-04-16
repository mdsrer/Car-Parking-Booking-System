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
    <link rel="stylesheet" href="../View/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../View/assets/css/main.css">
    <link rel="stylesheet" href="../View/assets/css/green.css">
    <link rel="stylesheet" href="../View/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="../View/assets/css/owl.transitions.css">
    <link href="../View/assets/css/lightbox.css" rel="stylesheet">
    <link rel="stylesheet" href="../View/assets/css/animate.min.css">
    <link rel="stylesheet" href="../View/assets/css/rateit.css">
    <link rel="stylesheet" href="../View/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../View/assets/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" href="../View/assets/images/favicon.ico">
</head>

<body class="cnt-home">

    <header class="header-style-1">
        <?php include('includes/top-header.php');?>
        <?php include('includes/main-header.php');?>
        <?php include('includes/menu-bar.php');?>
    </header>
    </li>
    </ul>
    </nav>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="search-result-container">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active " id="grid-container">
                <div class="category-parking  inner-top-vs">
                    <div class="row">
                        <?php

if($num>0)
{
while ($row=mysqli_fetch_array($ret)) 
{?>
                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                            <div class="parkings">
                                <div class="parking">
                                    <div class="parking-image">
                                        <div class="image">
                                            <img src="../View/assets/images/blank.gif"
                                                data-echo="../View/parkingimages/<?php echo htmlentities($row['id']);?>/<?php echo htmlentities($row['parkingImage1']);?>"
                                                alt="" width="200" height="300">
                                        </div>
                                    </div>


                                    <div class="parking-info text-left">
                                        <h3 class="name"><?php echo htmlentities($row['parkingName']);?></h3>
                                        <?php echo htmlentities($row['parkingaddress']);?></br>
                                        <div class="rating rateit-small"></div>
                                        <div class="description"></div>

                                        <div class="parking-price">
                                            <span class="price">
                                                Tk. <?php echo htmlentities($row['parkingPrice']);?> </span>
                                        </div>
                                    </div>
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <?php if($row['parkingAvailability']=='In Stock'){?>
                                                    <a
                                                        href="../Controller/searchControl.php?page=parking&action=add&id=<?php echo $row['id']; ?>">
                                                        <button class="btn btn-primary"
                                                            type="button">Select</button></a>
                                                    <?php } else {?>
                                                    <div class="action" style="color:red">Not Available</div>
                                                    <?php } ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } } else {?>

                        <div class="col-sm-6 col-md-4 wow fadeInUp">
                            <h3>No Parking Found</h3>
                        </div>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
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