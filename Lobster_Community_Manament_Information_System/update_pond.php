<?php 
 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$level = $_SESSION['level'];

if(isset($_GET['pond_id'])) 
{
$pond_id = $_GET['pond_id'];

    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "database";
    $conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());
    
        //SQL QUERY to display tasks by list selected
        $sql = "SELECT * FROM ponds WHERE pond_id=$pond_id AND user_id3=$user_id";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);
        if($res==true)
                {
                    //Query <br />Executed
                    $row = mysqli_fetch_assoc($res);
                    
                    //Get the Individual Value
                    $pond_name = $row['pond_name'];
                    $allotment = $row['allotment'];
                    $user_id = $row['user_id3'];
                    $size = $row['size'];
                    $quantity = $row['quantity'];
                    $create_date = $row['create_date'];
                    $size_id = $row['size_id'];
                }
    }
    else
    {
        //Redirect to Homepage
        header("Location: view.php");
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
                <input type="text" placeholder="Pond Name" name="pond_name" value="<?php echo $pond_name; ?>">
            </div>
            <div class="input-group">
                 <select name="allotment">
                    <option value="Select Allotment" disabled>Select Allotment</option>
                    <option <?php if($allotment=="Consumption"){echo "selected='selected'";} ?> value="Consumption">Consumption</option>
                    <option <?php if($allotment=="Ornamental"){echo "selected='selected'";} ?> value="Ornamental">Ornamental</option>
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
                <input type="number" placeholder="Quantity" name="quantity" value="<?php echo $quantity; ?>">
            </div>
            <div class="input-group">
                <input type="number" placeholder="Add or Substract(-) Quantity" name="new_qty">
            </div>
            <div class="input-group">
                <input type="date" name="create_date" value="<?php echo $create_date; ?>">
            </div>
            <div class="input-group">
                <button name="submit" class="btn">
                    <i class="fas fa-edit"></i>  Update
                </button>
                <?php 
                    if($level == "Admin") { ?>
                        <a href="admin_view_pond.php" class="btn">
                           <i class="fas fa-window-close"></i>  Cancel
                        </a>
                    <?php 
                    } if($level == "Member") { ?>
                        <a href="view_pond.php" class="btn">
                           <i class="fas fa-window-close"></i>  Cancel
                        </a>
                    <?php
                    }
                ?>
            </div>
        </form>
    </div>

        <form action="" method="POST" class="login-email" style="margin-top: -10px;" >
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
        //Get the values from Form
        $pond_name = $_POST['pond_name'];
        $allotment = $_POST['allotment'];
        $user_id = $user_id;
        $quantity = $_POST['quantity'] + $_POST['new_qty'];
        $create_date = $_POST['create_date'];
        $size_id = $_POST['size_id'];

        if($size_id == "1")
        {
            $size = "2";
        }
        if($size_id == "2")
        {
            $size = "4";
        }
        if($size_id == "3")
        {
            $size = "6";
        }
        if($size_id == "4")
        {
            $size = "8";
        }
        if($size_id == "5")
        {
            $size = "10";
        }
        if($size_id == "6")
        {
            $size = "12";
        }
        if($size_id == "7")
        {
            $size = "14";
        }
        if($size_id == "8")
        {
            $size = "16";
        }
        if($size_id == "9")
        {
            $size = "18";
        }
        if($size_id == "10")
        {
            $size = "20";
        }

        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "database";
        
        //Connect Database
        $conn3 = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());

        //CREATE SQL QUery to Update TAsk
        $sql3 = "UPDATE ponds SET 
        pond_name = '$pond_name',
        allotment = '$allotment',
        size = '$size',
        user_id3 = '$user_id',
        quantity = '$quantity',
        create_date = '$create_date',
        size_id = '$size_id'
        WHERE 
        pond_id = $pond_id
        ";
        
        //Execute Query
        $res3 = mysqli_query($conn3, $sql3);
        
        //CHeck whether the Query Executed of Not
        if($res3==true)
        {
            //Query Executed and Task Updated
            $_SESSION['update'] = "Updated Successfully.";
            
            if($level == "Admin"){
                header("Location: admin_view_pond.php");
            }
            if($level == "Member"){
                header("Location: view_pond.php");
            }
        }
        else
        {
            //FAiled to Update Task
            $_SESSION['update_fail'] = "Failed to Update";
            
            //Redirect to this Page
            header("Location: update_pond.php");
        }
        
    }

?>