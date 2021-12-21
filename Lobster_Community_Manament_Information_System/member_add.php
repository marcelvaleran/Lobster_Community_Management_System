<?php 
 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
$query = mysqli_query($conn, "SELECT * FROM information WHERE user_id='$user_id'");
$peg = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {

    $task_name = $_POST['task_name'];
    $difficulty = $_POST['difficulty'];
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
    
        $username = $_SESSION['username'];
        $sql = "INSERT INTO information (user_id, task_name, description, difficulty, date, nameuser, size_id)
                VALUES ('$user_id', '$task_name', '$description', '$difficulty', '$date', '$username', '$size_id')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Succesfully input the data!')</script>";
            $task_name = "";
            $description = "";
            $difficulty = "";
            $date = "";
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
    <title>Information Collector</title>
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
                <i class="fas fa-plus-circle"></i> New Data
            </p>
            <div class="input-group">
                <select name="task_name">
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
                <input type="number" placeholder="Quantity" name="difficulty">
            </div>
            <div class="input-group">
                <input type="date" name="date">
            </div>
            <div class="input-group">
                <button name="submit" class="btn">
                    <i class="fas fa-save"></i>  Save
                </button>
                <a href="view.php" class="btn">
                   <i class="fas fa-window-close"></i>  Cancel
                </a>
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