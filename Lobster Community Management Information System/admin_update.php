<?php 
 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];

if(isset($_GET['info_id'])) 
{
$info_id = $_GET['info_id'];

    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "database";
    $conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());
    
        //SQL QUERY to display tasks by list selected
        $sql = "SELECT * FROM information WHERE info_id=$info_id AND user_id=$user_id";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);
        if($res==true)
                {
                    //Query <br />Executed
                    $row = mysqli_fetch_assoc($res);
                    
                    //Get the Individual Value
                    $task_name = $row['task_name'];
                    $size_id = $row['size_id'];
                    $user_id = $row['user_id'];
                    $difficulty = $row['difficulty'];
                    $date = $row['date'];
                }
    }
    else
    {
        //Redirect to Homepage
        header("Location: admin_data.php");
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <title>Update Data</title>
</head>
<style type="text/css">
body{
    background-image: url("back/blue_lobster1.jpg");
    background-attachment: fixed;
    background-repeat:no-repeat;
    background-size:cover;
}
a, a:hover {
    text-decoration: none;
}
option {
    font-weight: bold;
}
</style>
<body>
    <div class="container-logout">

        <div class="container">
        <form action="" method="POST" class="login-email" style="margin-top: -25px; padding-bottom: 20px;">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">
                <i class="fas fa-pen-square"></i> Update Data
            </p>
            <div class="input-group">
                 <select name="task_name">
                    <option value="Select Allotment" disabled>Select Allotment</option>
                    <option <?php if($task_name=="Consumption"){echo "selected='selected'";} ?> value="Consumption">Consumption</option>
                    <option <?php if($task_name=="Ornamental"){echo "selected='selected'";} ?> value="Ornamental">Ornamental</option>
                </select>
            </div>
            <div class="input-group">
                <select name="size_id">
                    <option value="Select Size (On Inch)" disabled>Select Size (On Inch)</option>
                    <?php
                    $server = "localhost";
                    $user = "root";
                    $pass = "";
                    $database = "database";
                    $conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());

                        //SQL QUERY to display tasks by list selected
                        $sql = "SELECT * FROM listsize";
                        
                        //Execute Query
                        $res = mysqli_query($conn, $sql);

                     if($res==true)
                        {
                            //Display the tasks based on list
                            //Count the Rows
                            $count_rows = mysqli_num_rows($res);
                            
                            if($count_rows>0)
                            {
                                //We have tasks on this list
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $size_id_val = $row['size_id'];
                                    $sizes = $row['sizes'];
                                    ?>
            <option <?php if($size_id_val==$size_id){echo "selected='selected'";} ?> value="<?php echo $size_id_val; ?>"><?php echo $sizes; ?></option>
                            <?php
                        }
                    }
                    else
                    {
                        //NO Tasks on this list
                        ?>
                        <option <?php if($size_id=0){echo "selected='selected'";} ?> value="0">None</option>
                        <?php
                    }
                }
            ?>
                </select>
            </div>
            <div class="input-group">
                <input type="number" placeholder="Quantity" name="difficulty" value="<?php echo $difficulty; ?>" readonly>
            </div>
            <div class="input-group">
                <input type="number" placeholder="Add or Substract(-) Quantity" name="new_qty">
            </div>
            <div class="input-group">
                <input type="date" name="date" value="<?php echo $date; ?>">
            </div>
            <div class="input-group">
                <button name="submit" class="btn">
                    <i class="fas fa-edit"></i>  Update
                </button>
                <a href="admin_data.php" class="btn">
                    <i class="fas fa-window-close"></i>  Cancel
                </a>
            </div>
        </form>
    </div>

        <form action="" method="POST" class="login-email" style="margin-top: -10px;">
            <br>
            <div class="input-group" align="center">
            <a href="logout.php" class="btn" style="background: #bb1212; width: 40%; height: 50px; font-size: 1.5rem;">
                <i class="fas fa-sign-out-alt"></i> SignOut
            </a>
            </div>
        </form>
    </div>
</body>
</html>

<?php 

    //Check if the button is clicked
    if(isset($_POST['submit']))
    {
        //echo "Clicked";
        //Get the VAlues from Form
        $task_name = $_POST['task_name'];
        $user_id = $user_id;
        $difficulty = $_POST['difficulty'] + $_POST['new_qty'];
        $date = $_POST['date'];
        $size_id = $_POST['size_id'];

        if($size_id == "1")
        {
            $description = "2";
        }
        if($size_id == "2")
        {
            $description = "4";
        }
        if($size_id == "3")
        {
            $description = "6";
        }
        if($size_id == "4")
        {
            $description = "8";
        }
        if($size_id == "5")
        {
            $description = "10";
        }
        if($size_id == "6")
        {
            $description = "12";
        }
        if($size_id == "7")
        {
            $description = "14";
        }
        if($size_id == "8")
        {
            $description = "16";
        }
        if($size_id == "9")
        {
            $description = "18";
        }
        if($size_id == "10")
        {
            $description = "20";
        }

        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "database";
        
        //Connect Database
        $conn3 = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());
        
        //CREATE SQL QUery to Update TAsk
        $sql3 = "UPDATE information SET 
        task_name = '$task_name',
        description = '$description',
        user_id = '$user_id',
        difficulty = '$difficulty',
        date = '$date',
        size_id = '$size_id'
        WHERE 
        info_id = $info_id
        ";
        
        //Execute Query
        $res3 = mysqli_query($conn3, $sql3);
        
        //CHeck whether the Query Executed of Not
        if($res3==true)
        {
            //Query Executed and Task Updated
            $_SESSION['update'] = "Updated Successfully.";
            
            //Redirect to Home Page
            header("Location: admin_data.php");
        }
        else
        {
            //FAiled to Update Task
            $_SESSION['update_fail'] = "Failed to Update";
            
            //Redirect to this Page
            header("Location: admin_update.php");
        }
        
    }

?>