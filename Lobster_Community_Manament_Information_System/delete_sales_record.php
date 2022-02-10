<?php 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];

    //Check task_id in URL
    if(isset($_GET['item_id']))
    {
        $item_id = $_GET['item_id'];

        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "database";
        $conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());       
        
        //SQL Query to DELETE TASK
        $sql = "DELETE FROM sale WHERE item_id=$item_id";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);
        
        //CHeck if the Query Executed Successfully or Not
        if($res==true)
        {
            //Query Executed Successfully and TAsk Deleted
            $_SESSION['delete'] = "Data Deleted Successfully.";
            
            //redirect to Homepage
            header("Location: sales_record.php");
        }
        else
        {
            //FAiled to Delete Task
            $_SESSION['delete_fail'] = "Failed to Delete Data";
            
            //Redirect to Home PAge
           header("Location: sales_record.php");
        }
        
    }
    else
    {
        //Redirect to Home
        header("Location: view.php");
    }

?>