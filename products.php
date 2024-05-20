<!DOCTYPE html>
<html lang="en">
<?php
include ("connection/connect.php"); // connection to db
error_reporting(0);
session_start();

include_once 'product-action.php'; //including controller
include_once 'config/products/getBrands.php';
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="gilbertslogo.png">
    <title>Products</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!--header starts-->
    <header id="header" class="header-scroll top-header headrom">
        <!-- .navbar -->
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse"
                    data-target="#mainNavbarCollapse">&#9776;</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/gilbertslogo.png" alt="">
                </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span
                                    class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="services.php">Services <span
                                    class="sr-only"></span></a> </li>

                        <?php
                        if (empty($_SESSION["user_id"])) {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Sign Up</a> </li>';
                        } else {
                            echo '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Your Orders</a> </li>';
                            echo '<li class="nav-item"><a href="logout.php" class="nav-link active">LogOut</a> </li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->
    </header>
    <div class="page-wrapper">
        <!-- top Links -->
        <div class="top-links">
            <div class="container">
                <ul class="row links">
                    <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="Services.php">Choose Services</a>
                    </li>
                    <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a
                            href="products.php?res_id=<?php echo $_GET['res_id']; ?>">Pick your selected product</a>
                    </li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Get delivered & Pay</a></li>
                </ul>
            </div>
        </div>
        <!-- end:Top links -->
        <!-- start: Inner page hero -->
        <?php $ress = mysqli_query($db, "select * from services where rs_id='$_GET[res_id]'");
        $rows = mysqli_fetch_array($ress);
        ?>
        <section class="inner-page-hero bg-image" data-image-src="images/img/header2.jpg">
            <div class="profile">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                            <div class="image-wrap">
                                <figure>
                                    <?php echo '<img src="admin/Res_img/' . $rows['image'] . '" alt="Service logo">'; ?>
                                </figure>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                            <div class="pull-left right-text white-txt">
                                <h6><a href="#"><?php echo $rows['title']; ?></a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end:Inner page hero -->
        <div class="breadcrumb">
            <div class="container">
            </div>
        </div>
        <div class="container m-t-30">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
                    <div class="widget widget-cart">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">Your Shopping Cart</h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="order-row bg-white">
                            <div class="widget-body">
                                <?php
                                $item_total = 0;
                                if (isset($_SESSION["cart_item"]) && !empty($_SESSION["cart_item"])) {
                                    foreach ($_SESSION["cart_item"] as $item) {
                                        ?>
                                        <div class="title-row">
                                            <?php echo $item["title"]; ?><a
                                                href="products.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>">
                                                <i class="fa fa-trash pull-right"></i></a>
                                        </div>
                                        <div class="form-group row no-gutter">
                                            <div class="col-xs-8">
                                                <input type="text" class="form-control b-r-0" value=<?php echo $item["price"]; ?> readonly id="exampleSelect1">
                                            </div>
                                            <div class="col-xs-4">
                                                <input class="form-control" type="text" readonly
                                                    value='<?php echo $item["quantity"]; ?>' id="example-number-input">
                                            </div>
                                        </div>
                                        <?php
                                        $item_total += ($item["price"] * $item["quantity"]);
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <!-- end:Order row -->
                        <div class="widget-body">
                            <div class="price-wrap text-xs-center">
                                <p>Total Amount</p>
                                <h3 class="value"><strong>&#8369;<?php echo $item_total; ?></strong></h3>
                                <p>Free Shipping</p>
                                <a href="checkout.php?res_id=<?php echo $_GET['res_id']; ?>&action=check"
                                    class="btn theme-btn btn-lg">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">
                    <!-- end:Widget menu -->
                    <div class="menu-widget" id="2">
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">Products <a class="btn btn-link pull-right"
                                    data-toggle="collapse" href="#popular2" aria-expanded="true">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    <i class="fa fa-angle-down pull-right"></i>
                                </a></h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="collapse in" id="popular2">
                            <?php
                            $stmt = $db->prepare("select * from products where rs_id='$_GET[res_id]'");
                            $stmt->execute();
                            $products = $stmt->get_result();
                            if (!empty($products)) {
                                foreach ($products as $product) {
                                    ?>
                                    <div class="food-item">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-lg-8">
                                                <div class="rest-logo pull-left">
                                                    <a class="restaurant-logo pull-left"
                                                        href="#"><?php echo '<img src="admin/Res_img/dishes/' . $product['img'] . '" alt="Food logo">'; ?></a>
                                                </div>
                                                <!-- end:Logo -->
                                                <div class="rest-descr">
                                                    <h6><a href="#"><?php echo $product['title']; ?></a></h6>
                                                    <p><?php echo $product['slogan']; ?></p>
                                                </div>
                                                <!-- end:Description -->
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info">
                                                <span class="price pull-left">&#8369;<?php echo $product['price']; ?></span>
                                                <button class="btn theme-btn btn-sm add-to-cart-btn"
                                                    data-id="<?php echo $product['d_id']; ?>"
                                                    data-resid="<?php echo $_GET['res_id']; ?>"
                                                    data-title="<?php echo $product['title']; ?>"
                                                    data-price="<?php echo $product['price']; ?>">Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                            } ?>
                        </div>
                        <!-- end:Collapse -->
                    </div>
                    <!-- end:Widget menu -->
                </div>
                <!-- end:Right Sidebar -->
            </div>
        </div>
        <!-- end:row -->
    </div>
    <!-- end:Container -->
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Confirm Quantity</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form id="modalForm" action="" method="post">
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1">
                        </div>
                        <div class="form-group">
                            <label for="brand" class="control-label">Paint Brand:</label>
                            <select class="form-control" id="brand" name="brand">
                                <option value="" hidden>Choose Brand</option>
                                <?php foreach ($all_brands as $brand): ?>
                                    <option value="<?php echo $brand["brandId"] ?>"><?php echo $brand["name"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="color" class="control-label">Color:</label>
                            <select class="form-control" id="color" name="color" disabled>
                                <option value="" hidden>Choose Color</option>
                                <option value="color1">Color 1</option>
                                <option value="color2">Color 2</option>
                                <option value="color3">Color 3</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to dynamically set the action attribute of the form -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var brandSelect = document.getElementById('brand');
            var colorSelect = document.getElementById('color');

            brandSelect.addEventListener('change', async function () {
                if (brandSelect.value !== "") {
                    colorSelect.disabled = false;
                    var brandId = brandSelect.value;

                    // Clear current options
                    colorSelect.innerHTML = '<option value="" hidden>Select a Color</option>';

                    // Fetch data from the API
                    fetch('http://localhost:8090/api/partner/<?php echo $GILBERT_KEY; ?>/brand/' + brandId + '/colors')
                        .then(response => response.json())
                        .then(data => {
                            data.forEach(color => {
                                var option = document.createElement('option');
                                option.value = color;
                                option.textContent = color;
                                colorSelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching colors:', error);
                        });
                } else {
                    colorSelect.disabled = true;
                    // Clear current options
                    colorSelect.innerHTML = '<option value="" hidden>Select a Color</option>';
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modalForm = document.getElementById('modalForm');
            const modal = document.getElementById('myModal');

            document.querySelectorAll('.add-to-cart-btn').forEach(button => {
                button.addEventListener('click', function () {
                    const productId = this.getAttribute('data-id');
                    const resId = this.getAttribute('data-resid');
                    const actionUrl = `products.php?res_id=${resId}&action=add&id=${productId}`;
                    modalForm.setAttribute('action', actionUrl);
                    $(modal).modal('show');
                });
            });
        });
    </script>

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