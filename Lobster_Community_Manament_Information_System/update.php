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
                    $pond_name = $row['pond_name'];
                    $allotment = $row['allotment'];
                    $user_id = $row['user_id'];
                    $size = $row['size'];
                    $quantity = $row['quantity'];
                    $date = $row['date'];
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
                    <option value="" disabled>Select Allotment</option>
                    <option <?php if($allotment=="Consumption"){echo "selected='selected'";} ?> value="Consumption">Consumption</option>
                    <option <?php if($allotment=="Ornamental"){echo "selected='selected'";} ?> value="Ornamental">Ornamental</option>
                </select>
            </div>
            <div class="input-group">
                <input type="number" placeholder="Quantity" name="size" value="<?php echo $size; ?>" style="width: 75%;">
                <input type="text" value="Inch" style="width: 23%;" readonly>
            </div>
            <div class="input-group">
                <input type="number" placeholder="Quantity" name="quantity" value="<?php echo $quantity; ?>">
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
                <a href="view.php" class="btn">
                    <i class="fas fa-window-close"></i>  Cancel
                </a>
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
        //Get the CAlues from Form
        $pond_name = $_POST['pond_name'];
        $allotment = $_POST['allotment'];
        $user_id = $user_id;
        $size = $_POST['size'];
        $quantity = $_POST['quantity'] + $_POST['new_qty'];
        $date = $_POST['date'];

        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "database";
        
        //Connect Database
        $conn3 = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());

        //CREATE SQL QUery to Update TAsk
        $sql3 = "UPDATE information SET 
        pond_name = '$pond_name',
        allotment = '$allotment',
        size = '$size',
        user_id = '$user_id',
        quantity = '$quantity',
        date = '$date'
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
            header("Location: view.php");
        }
        else
        {
            //FAiled to Update Task
            $_SESSION['update_fail'] = "Failed to Update";
            
            //Redirect to this Page
            header("Location: update.php");
        }
        
    }

?>