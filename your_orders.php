<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if (empty($_SESSION['user_id']))  //if usser is not login redirected back to login page
{
    header('location:login.php');
} else {
?>
    <?php include_once("config\orders\get_orders.php"); ?>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="ecommerce.png">
        <title>Your Orders</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/animsition.min.css" rel="stylesheet">
        <link href="css/animate.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <style type="text/css" rel="stylesheet">
            .indent-small {
                margin-left: 5px;
            }

            .form-group.internal {
                margin-bottom: 0;
            }

            .dialog-panel {
                margin: 10px;
            }

            .datepicker-dropdown {
                z-index: 200 !important;
            }

            .panel-body {
                background: #e5e5e5;
                /* Old browsers */
                background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                /* FF3.6+ */
                background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
                /* Chrome,Safari4+ */
                background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                /* Chrome10+,Safari5.1+ */
                background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                /* Opera 12+ */
                background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
                /* IE10+ */
                background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
                /* W3C */
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
                /* IE6-9 fallback on horizontal gradient */
                font: 600 15px "Open Sans", Arial, sans-serif;
            }

            label.control-label {
                font-weight: 600;
                color: #777;
            }


            table {
                width: 750px;
                border-collapse: collapse;
                margin: auto;

            }

            /* Zebra striping */
            tr:nth-of-type(odd) {
                background: #eee;
            }

            th {
                background: #ff3300;
                color: white;
                font-weight: bold;

            }

            td,
            th {
                padding: 10px;
                border: 1px solid #ccc;
                text-align: left;
                font-size: 14px;

            }

            /* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
            @media only screen and (max-width: 760px),
            (min-device-width: 768px) and (max-device-width: 1024px) {

                table {
                    width: 100%;
                }

                /* Force table to not be like tables anymore */
                table,
                thead,
                tbody,
                th,
                td,
                tr {
                    display: block;
                }

                /* Hide table headers (but not display: none;, for accessibility) */
                thead tr {
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }

                tr {
                    border: 1px solid #ccc;
                }

                td {
                    /* Behave  like a "row" */
                    border: none;
                    border-bottom: 1px solid #eee;
                    position: relative;
                    padding-left: 50%;
                }

                td:before {
                    /* Now like a table header */
                    position: absolute;
                    /* Top/left values mimic padding */
                    top: 6px;
                    left: 6px;
                    width: 45%;
                    padding-right: 10px;
                    white-space: nowrap;
                    /* Label the data */
                    content: attr(data-column);

                    color: #000;
                    font-weight: bold;
                }

            }
        </style>

    </head>

    <body>
        <header id="header" class="header-scroll top-header headrom">
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
        </header>
        <div class="page-wrapper">
            <div class="inner-page-hero bg-image" data-image-src="images/forcover.jpeg">
                <div class="container"> </div>
            </div>
            <div class="result-show">
                <div class="container">
                    <div class="row"></div>
                </div>
            </div>
            <section class="restaurants-page">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3"></div>
                        <div class="col-xs-12 col-sm-7 col-md-7 ">
                            <div class="bg-gray restaurant-entry">
                                <div class="row">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Paint Brand</th>
                                                <th>Colors</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query_res = mysqli_query($db, "SELECT * FROM users_orders WHERE u_id='" . $_SESSION['user_id'] . "'");
                                            if (!mysqli_num_rows($query_res) > 0) {
                                                echo '<td colspan="8"><center>You have No orders Placed yet.</center></td>';
                                            } else {
                                                while ($row = mysqli_fetch_array($query_res)) {
                                                    $order_preorderId = $row['preorderId'];

                                                    foreach ($all_preorder as $preorder) {
                                                        if ($preorder['preOrderId'] == $order_preorderId) {

                                            ?>
                                                            <tr>
                                                                <td data-column="Item"> <?php echo $row['title']; ?></td>
                                                                <td data-column="Quantity"> <?php echo $row['quantity']; ?></td>
                                                                <td data-column="Price">&#8369; <?php echo $row['price']; ?></td>
                                                                <td data-column="Paint Brand"><?php echo ($preorder['stockId']['productId']['brandId']['name']); ?></td>
                                                                <td data-column="Colors"><?php echo ($preorder['stockId']['productId']['description']); ?></td>
                                                                <td data-column="Status">
                                                                    <?php
                                                                    $status = $row['status'];
                                                                    if ($status == "" or $status == "NULL") {
                                                                    ?>
                                                                        <button type="button" class="btn btn-info" style="font-weight:bold;">Dispatch</button>
                                                                    <?php
                                                                    }
                                                                    if ($status == "in process") { ?>
                                                                        <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin" aria-hidden="true"></span>On the Way!</button>
                                                                    <?php
                                                                    }
                                                                    if ($status == "closed") {
                                                                    ?>
                                                                        <button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true">Delivered</button>
                                                                    <?php
                                                                    }
                                                                    if ($status == "rejected") {
                                                                    ?>
                                                                        <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i>Cancelled</button>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td data-column="Date"> <?php echo $row['date']; ?></td>
                                                                <td data-column="Action"> <a href="delete_orders.php?order_del=<?php echo $row['o_id']; ?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>
                                                                </td>
                                                            </tr>
                                            <?php
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <footer class="footer">
            <div class="container">
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
                <div class="bottom-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 payment-options color-gray">
                            <h5>All Major Credit Cards Accepted</h5>
                            <ul>
                                <li><a href="#"> <img src="images/paypal.png" alt="Paypal"> </a></li>
                                <li><a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a></li>
                                <li><a href="#"> <img src="images/maestro.png" alt="Maestro"> </a></li>
                                <li><a href="#"> <img src="images/stripe.png" alt="Stripe"> </a></li>
                                <li><a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a></li>
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
            </div>
        </footer>
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