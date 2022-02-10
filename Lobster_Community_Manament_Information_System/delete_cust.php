<?php 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$level = $_SESSION['level'];

    //Check task_id in URL
    if(isset($_GET['cust_id']))
    {
        $cust_id = $_GET['cust_id'];

        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "database";
        $conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());       
        
        //SQL Query to DELETE TASK
        $sql = "DELETE FROM customer WHERE cust_id=$cust_id";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);
        
        if($res==true)
        {
            $_SESSION['delete'] = "Task Deleted Successfully.";
            if($level == "Admin"){
                header("Location: admin_customer_lists.php");
            }
            if($level == "Member"){
                header("Location: customer_lists.php");
            }
        }
        else
        {
            echo "<script>alert('Failed to delete the data.')</script>";
            $_SESSION['delete_fail'] = "Failed to Delete Task";
            if($level == "Admin"){
                header("Location: admin_customer_lists.php");
            }
            if($level == "Member"){
                header("Location: customer_lists.php");
            }
        }
        
    }
    else
    {
        if($level == "Admin"){
            header("Location: admin_customer_lists.php");
        }
        if($level == "Member"){
            header("Location: customer_lists.php");
        }
    }

?>