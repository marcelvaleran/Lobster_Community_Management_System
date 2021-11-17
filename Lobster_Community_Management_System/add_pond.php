<?php 
 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$level = $_SESSION['level'];

if (isset($_POST['submit'])) {

    $pond_name = $_POST['pond_name'];
    $allotment = $_POST['allotment'];
    $quantity = $_POST['quantity'];
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
    
        $username = $_SESSION['username'];
        $sql = "INSERT INTO ponds (user_id3, pond_name, allotment, size, quantity, create_date, username, size_id)
                VALUES ('$user_id', '$pond_name', '$allotment', '$size', '$quantity', '$create_date', '$username', '$size_id')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Succesfully input the data!')</script>";
            
    } 
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
    <title>Ponds Data Input</title>
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
                <i class="fas fa-plus-circle"></i> New Pond Data
            </p>
            <div class="input-group">
                <input type="text" placeholder="Pond Name" name="pond_name">
            </div>
            <div class="input-group">
                <select name="allotment">
                    <option value="Select Allotment" disabled>Select Allotment</option>
                    <option value="Consumption">Consumption</option>
                    <option value="Ornamental">Ornamental</option>
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
                                    $size_id = $row['size_id'];
                                    $sizes = $row['sizes'];
                                    ?>
                                    <option value="<?php echo $size_id ?>"><?php echo $sizes; ?></option>
                                <?php
                        }
                    }
                    else
                    {
                        //NO Tasks on this list
                        ?>
                        <option value="0">None</option>
                        <?php
                    }
                }
            ?>
                </select>
            </div>
            <div class="input-group">
                <input type="number" placeholder="Quantity" name="quantity">
            </div>
            <div class="input-group">
                <input type="date" name="create_date">
            </div>
            <div class="input-group">
                <button name="submit" class="btn">
                    <i class="fas fa-save"></i>  Save
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

        <form action="" method="POST" class="login-email" style="margin-top: -10px;">
            <br>
            <div class="input-group" align="center">
                <a href="logout.php" class="btn" style="background: #bb1212; width: 40%; height: 50px; font-size: 1.5rem;">
                    <i class="fas fa-sign-out-alt"></i> Sign Out
                </a>
            </div>
        </form>
    </div>
</body>
</html>