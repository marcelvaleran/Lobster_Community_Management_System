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

    $pond_name = $_POST['pond_name'];
    $allotment = $_POST['allotment'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];
    $size = $_POST['size'];
    
        $username = $_SESSION['username'];
        $sql = "INSERT INTO information (user_id, pond_name, allotment, size, quantity, date, nameuser)
                VALUES ('$user_id', '$pond_name', '$allotment', '$size', '$quantity', '$date', '$username')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('Succesfully input the data!')</script>";
            $allotment = "";
            $size = "";
            $quantity = "";
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
                <input type="number" placeholder="Size" name="size" style="width: 75%;">
                <input type="text" value="Inch" style="width: 23%;" readonly>
            </div>
            <div class="input-group">
                <input type="number" placeholder="Quantity" name="quantity">
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