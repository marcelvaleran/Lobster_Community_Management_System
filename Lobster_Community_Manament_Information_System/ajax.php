<?php
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$gets = $_GET['cust_name'];
$query = mysqli_query($conn, "select * from customer where cust_name='$gets'");
$customer = mysqli_fetch_array($query);
$data = array(
            'phoneNo'      =>  $customer['phoneNo'],
            'address'    =>  $customer['address'],);
 echo json_encode($data);
?>