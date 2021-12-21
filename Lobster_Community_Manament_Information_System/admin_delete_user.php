<?php 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];

    //Check task_id in URL
    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "database";
        $conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());       
        
        //SQL Query to DELETE TASK
        $sql = "DELETE FROM users WHERE id=$id";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);
        
        //CHeck if the Query Executed Successfully or Not
        if($res==true)
        {
            //Query Executed Successfully and TAsk Deleted
            $_SESSION['delete'] = "User Deleted Successfully.";
            
            //redirect to Homepage
            header("Location: admin_listuser.php");
        }
        else
        {
            //FAiled to Delete Task
            $_SESSION['delete_fail'] = "Failed to Delete User";
            
            //Redirect to Home PAge
           header("Location: admin_listuser.php");
        }
        
    }
    else
    {
        //Redirect to Home
        header("Location: admin_listuser.php");
    }

?>