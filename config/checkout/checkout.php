<?php
include_once (__DIR__ . "/../EnvVariables.php");

if (empty($_SESSION["user_id"])) {
    header('location:login.php');
} else {
    foreach ($_SESSION["cart_item"] as $item) {
        // print_r($item);
        $item_total += ($item["price"] * $item["quantity"]);
        $successfulOperation = false;
        if ($_POST['submit']) {

            $ch = curl_init();
            $url = "localhost:8090/api/partner/$GILBERT_KEY/stocks/reserve";
            $headers = [
                'Content-Type: application/json'
            ];
            $data = [
                "brandId" => $item["brand"],
                "description" => $item["color"],
                "quantity" => getQuantity(),
            ];

            $jsonData = json_encode($data);

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  // Get HTTP response status code

            if ($httpCode === 401) {
                // HANDLE UNAUTHORIZED
                $success = "Can't handle paint requests right now, but your order will still be processed. Sorry for the inconvenience.";

                $SQL_ORDERS = "insert into users_orders(u_id,title,quantity,price) values('" . $_SESSION["user_id"] . "','" . $item["title"] . "','" . $item["quantity"] . "','" . $item["price"] . "')";
                $a = mysqli_query($db, $SQL_ORDERS);
                $order_id = mysqli_insert_id($db);
                break;
            } else if ($httpCode === 404) {
                // HANDLE NOT FOUND
                $success = "An item requires a paint that is unavailable. Please try other colors or brands, or try again later.";
                break;
            } else if ($httpCode === 400) {
                // HANDLE BAD REQUEST
                $success = "An item requires a paint with insufficient stock. Please try other colors or brands, or try again later.";
                break;
            } else if ($httpCode === 200) {
                // HANDLE OK
                $preorder = json_decode($response, true);

                $SQL_ORDERS = "insert into users_orders(u_id,title,quantity,price,preorderId) values('" . $_SESSION["user_id"] . "','" . $item["title"] . "','" . $item["quantity"] . "','" . $item["price"] . "','" . $preorder["preOrderId"] . "')";
                $a = mysqli_query($db, $SQL_ORDERS);
                $order_id = mysqli_insert_id($db);

                $success = "Thankyou! Your Order Placed Successfully!";
                $successfulOperation = true;
            }

            curl_close($ch);
        }
    }
    if ($successfulOperation) {
        $_SESSION["cart_item"] = "";
    }
}

function getQuantity()
{
    return 5;
}