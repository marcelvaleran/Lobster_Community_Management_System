<?php
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$gets = $_GET['id_card'];
$query = mysqli_query($conn, "select * from customer where id_card='$gets'");
$customer = mysqli_fetch_array($query);
$data = array(
            'cust_name' => $customer['cust_name'],
        );
 echo json_encode($data);
?>