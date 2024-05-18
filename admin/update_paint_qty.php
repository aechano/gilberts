<?php
include("../connection/connect.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $o_id = mysqli_real_escape_string($db, $_POST['o_id']);
    $qty = mysqli_real_escape_string($db, $_POST['qty']);

    $query = "UPDATE paint SET qty='$qty' WHERE o_id='$o_id'";
    if (mysqli_query($db, $query)) {
        echo "Quantity updated successfully!";
    } else {
        echo "Error updating record: " . mysqli_error($db);
    }
}
?>