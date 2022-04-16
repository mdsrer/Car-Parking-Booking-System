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

    <title>Payment Method</title>
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
    <link href="../View/assets/css/green.css" rel="alternate stylesheet" title="Green color">
    <link href="../View/assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
    <link href="../View/assets/css/red.css" rel="alternate stylesheet" title="Red color">
    <link href="../View/assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
    <link href="../View/assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
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
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="home.html">Home</a></li>
                    <li class='active'>Payment Method</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="checkout-box faq-page inner-bottom-sm">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Choose Payment Method</h2>
                        <div class="panel-group checkout-steps" id="accordion">

                            <div class="panel panel-default checkout-step-01">


                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                            Select Payment Method
                                        </a>
                                    </h4>
                                </div>


                                <div id="collapseOne" class="panel-collapse collapse in">


                                    <div class="panel-body">
                                        <form name="payment" method="post">
                                            <input type="radio" name="paymethod" value="CASH" checked="checked"> CASH
                                            <input type="radio" name="paymethod" value="Online Payment"> Online Payment
                                            <br /><br />
                                            <input type="submit" value="submit" name="submit" class="btn btn-primary">


                                        </form>
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