<?php 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$level = $_SESSION['level'];

    //Check task_id in URL
    if(isset($_GET['pond_id']))
    {
        $pond_id = $_GET['pond_id'];

        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "database";
        $conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());       
        
        //SQL Query to DELETE TASK
        $sql = "DELETE FROM ponds WHERE pond_id=$pond_id";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);
        
        //CHeck if the Query Executed Successfully or Not
        if($res==true)
        {
            //Query Executed Successfully and TAsk Deleted
            $_SESSION['delete'] = "Data Deleted Successfully.";
            
            if($level == "Admin"){
                header("Location: admin_view_pond.php");
            }
            if($level == "Member"){
                header("Location: view_pond.php");
            }
        }
        else
        {
            //FAiled to Delete Task
            $_SESSION['delete_fail'] = "Failed to Delete Data";
            
            if($level == "Admin"){
                header("Location: admin_view_pond.php");
            }
            if($level == "Member"){
                header("Location: view_pond.php");
            }
        }
        
    }
    else
    {
        //Redirect to Home
        header("Location: view_pond.php");
    }

?>