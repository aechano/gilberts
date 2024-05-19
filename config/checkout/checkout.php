<?php
include_once("../EnvVariables.php");

if (empty($_SESSION["user_id"])) {
    header('location:login.php');
} else {
    foreach ($_SESSION["cart_item"] as $item) {
        // print_r($item);
        $item_total += ($item["price"] * $item["quantity"]);
        if ($_POST['submit']) {

            $ch = curl_init();
            $url = "localhost:8090/api/partner/$GILBERT_KEY/stocks/reserve";
            $headers = [
                'Content-Type: application/json'
            ];
            $data = [
                'productId' => [
                    "name" => $p_name,
                    "description" => $p_desc,
                    "unitPrice" => $p_sale,
                    "brandId" => [
                        "brandId" => $p_cat
                    ]
                ],
                'quantity' => $p_qty,
                'status' => $p_status
            ];

            $jsonData = json_encode($data);

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);  // Get HTTP response status code

            curl_close($ch);

            $SQL_ORDERS = "insert into users_orders(u_id,title,quantity,price) values('" . $_SESSION["user_id"] . "','" . $item["title"] . "','" . $item["quantity"] . "','" . $item["price"] . "')";
            $a = mysqli_query($db, $SQL_ORDERS);
            $order_id = mysqli_insert_id($db);

            // $SQL_PAINTS = "insert into paint(paint_brand,paint_color,qty,o_id) values('" . $item["brand"] . "','" . $item["color"] . "','" . 0 . "','" . $order_id . "')";
            // mysqli_query($db, $SQL_PAINTS);

            $success = "Thankyou! Your Order Placed Successfully!";
            $_SESSION["cart_item"] = "";
        }
    }
}
