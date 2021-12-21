<?php 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];

    //Check task_id in URL
    if(isset($_GET['info_id']))
    {
        $info_id = $_GET['info_id'];

        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "database";
        $conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());       
        
        //SQL Query to DELETE TASK
        $sql = "DELETE FROM information WHERE info_id=$info_id";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);
        
        //CHeck if the Query Executed Successfully or Not
        if($res==true)
        {
            //Query Executed Successfully and TAsk Deleted
            $_SESSION['delete'] = "Task Deleted Successfully.";
            
            //redirect to Homepage
            header("Location: admin_data.php");
        }
        else
        {
            //FAiled to Delete Task
            $_SESSION['delete_fail'] = "Failed to Delete Task";
            
            //Redirect to Home PAge
           header("Location: admin_data.php");
        }
        
    }
    else
    {
        //Redirect to Home
        header("Location: admin_data.php");
    }

?>