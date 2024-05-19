<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();
if (empty($_SESSION["user_id"])) {
    header('location:login.php');
} else {


    foreach ($_SESSION["cart_item"] as $item) {

        // print_r($item);

        $item_total += ($item["price"] * $item["quantity"]);

        if ($_POST['submit']) {
            
            

            $SQL_ORDERS = "insert into users_orders(u_id,title,quantity,price) values('" . $_SESSION["user_id"] . "','" . $item["title"] . "','" . $item["quantity"] . "','" . $item["price"] . "')";
            $a = mysqli_query($db, $SQL_ORDERS);
            $order_id = mysqli_insert_id($db);

            // $SQL_PAINTS = "insert into paint(paint_brand,paint_color,qty,o_id) values('" . $item["brand"] . "','" . $item["color"] . "','" . 0 . "','" . $order_id . "')";
            // mysqli_query($db, $SQL_PAINTS);

            $success = "Thankyou! Your Order Placed Successfully!";
            $_SESSION["cart_item"] = "";
        }
    }
?>


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="checkout.png">
        <title>Order Checkout</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <div class="site-wrapper">
            <!--header starts-->
            <header id="header" class="header-scroll top-header headrom">
                <!-- .navbar -->
                <nav class="navbar navbar-dark">
                    <div class="container">
                        <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                        <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/gilbertslogo.png" alt=""> </a>
                        <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                            <ul class="nav navbar-nav">
                                <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                                <li class="nav-item"> <a class="nav-link active" href="services.php">Services <span class="sr-only"></span></a> </li>

                                <?php
                                if (empty($_SESSION["user_id"])) {
                                    echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Sign Up</a> </li>';
                                } else {


                                    echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Your Orders</a> </li>';
                                    echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">LogOut</a> </li>';
                                }

                                ?>

                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- /.navbar -->
            </header>
            <div class="page-wrapper">
                <div class="top-links">
                    <div class="container">
                        <ul class="row links">

                            <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="services.php">Choose services</a></li>
                            <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Pick your selected item</a></li>
                            <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="checkout.php">Get delivered & Pay</a></li>
                        </ul>
                    </div>
                </div>

                <div class="container">

                    <span style="color:green;">
                        <?php echo $success; ?>
                    </span>

                </div>




                <div class="container m-t-30">
                    <form action="" method="post">
                        <div class="widget clearfix">

                            <div class="widget-body">
                                <form method="post" action="#">
                                    <div class="row">

                                        <div class="col-sm-12">
                                            <div class="cart-totals margin-b-20">
                                                <div class="cart-totals-title">
                                                    <h4>Cart Summary</h4>
                                                </div>
                                                <div class="cart-totals-fields">

                                                    <table class="table">
                                                        <tbody>



                                                            <tr>
                                                                <td>Cart Subtotal</td>
                                                                <td> ₱<?php echo $item_total; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Shipping &amp; Handling</td>
                                                                <td>FREE*</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="text-color"><strong>Total</strong></td>
                                                                <td class="text-color"><strong>₱<?php echo $item_total; ?></strong></td>
                                                            </tr>
                                                        </tbody>




                                                    </table>
                                                </div>
                                            </div>
                                            <!--cart summary-->
                                            <div class="payment-option">
                                                <ul class=" list-unstyled">
                                                    <li>
                                                        <label class="custom-control custom-radio  m-b-20">
                                                            <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Cash on delivery</span>
                                                            <br> <span>Pay digitally with SMS Pay Link. Cash may not be accepted in COVID restricted areas.</span> </label>
                                                    </li>
                                                    <li>
                                                        <label class="custom-control custom-radio  m-b-10">
                                                            <input name="mod" type="radio" value="paypal" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Credit Card<img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                                    </li>
                                                </ul>
                                                <p class="text-xs-center"> <input type="submit" onclick="return confirm('Are you sure?');" name="submit" class="btn btn-outline-success btn-block" value="Order now"> </p>
                                            </div>

                                </form>
                            </div>
                        </div>

                </div>
            </div>
            </form>
        </div>

        <!-- start: FOOTER -->
        <footer class="footer">
            <div class="container">
                <!-- top footer statrs -->
                <div class="row top-footer">
                    <div class="col-xs-12 col-sm-3 footer-logo-block color-gray">
                        <a href="#"> <img src="images/gilbertslogo.png" alt="Footer logo"> </a> <span>Choose it &amp; Enjoy our Services! </span>
                    </div>
                    <div class="col-xs-12 col-sm-2 about color-gray">
                        <h5>About Us</h5>
                        <ul>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="https://www.facebook.com/profile.php?id=100083110423923&mibextid=ZbWKwL">Social Media</a></li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-2 how-it-works-links color-gray">
                        <h5>How it Works?</h5>
                        <ul>
                            <li><a href="#">Enter your location</a></li>
                            <li><a href="#">Choose the Service</a></li>
                            <li><a href="#">Choose your Product</a></li>
                            <li><a href="#">Get delivered</a></li>
                            <li><a href="#">Pay on delivery</a></li>
                            <!--
							<li><a href="#">Enjoy your meals :)</a></li>
                             -->
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-2 pages color-gray">
                        <h5>Legal</h5>
                        <ul>
                            <li><a href="#">Terms & Conditions</a> </li>
                            <li><a href="#">Refund & Cancellation</a> </li>
                            <li><a href="#">Privacy Policy</a> </li>
                            <li><a href="#">Cookie Policy</a> </li>
                            <li><a href="#">Offer Terms</a> </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-3 popular-locations color-gray">
                        <h5>Locations We Deliver To</h5>
                        <ul>
                            <li><a href="#">Albay</a> </li>
                            <li><a href="#">Camarines Norte</a> </li>
                            <li><a href="#">Camarines Sur</a> </li>
                        </ul>
                    </div>
                </div>
                <!-- top footer ends -->
                <!-- bottom footer statrs -->
                <div class="bottom-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 payment-options color-gray">
                            <h5>All Major Credit Cards Accepted</h5>
                            <ul>
                                <li>
                                    <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 address color-gray">
                            <h5>Address:</h5>
                            <p>Gov Panotes Ave, Daet, Camarines Norte, 4600 </p>
                            <h5>Call us at: <a href="">+639 701 763 605</a></h5>
                        </div>
                        <div class="col-xs-12 col-sm-5 additional-info color-gray">
                            <h5>Who are we?</h5>
                            <p>Launched in 2023, Our platform connects customers and our store serving their furniture needs. Customers can use our platform to search and discover new products and services.</p>
                        </div>
                    </div>
                </div>
                <!-- bottom footer ends -->
            </div>
        </footer>

        <!-- end:Footer -->
        </div>
        <!-- end:page wrapper -->
        </div>

        <!-- Bootstrap core JavaScript
    ================================================== -->
        <script src="js/jquery.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/animsition.min.js"></script>
        <script src="js/bootstrap-slider.min.js"></script>
        <script src="js/jquery.isotope.min.js"></script>
        <script src="js/headroom.js"></script>
        <script src="js/foodpicky.min.js"></script>
    </body>

</html>

<?php
}
?>