<?php
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$seller = $_SESSION['username'];
$img_prof = $_SESSION['img_prof'];

if(isset($_GET['info_id'])) 
{
$info_id = $_GET['info_id'];
$size_id = $_GET['size_id'];

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
            $description = $row['description'];
            $user_id = $row['user_id'];
            $difficulty = $row['difficulty'];
            $date = $row['date'];
        }
    }else
    {
        header("Location: view.php");
    }
?>
<head><meta charset="UTF-8">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" type="text/css" href="css/forms6.css">
    <title>Transaction Record</title>
</head>
<style type="text/css">
body {
    background-image: url("back/blue_lobster1.jpg");
    background-attachment: fixed;
    background-repeat:no-repeat;
    background-size:cover;
}
</style>
<body>
<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="img/transac.png" class="animate"/>
            <?php echo"<h3>" . $_SESSION['username'] . "</h3>";?>
            <p>You are 30 seconds away from earning your own profit!</p>
            <img style="width: 70%; height: 27%; border-radius: 100%; object-fit: cover;" src="img/<?php echo $img_prof ?>" alt=""/>
        </div>
        <div class="col-md-9 register-right">
            <div class="tab-content" id="myTabContent">
                <form action="" method="POST" class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading border-bottom" style="width: 85%;">
                        <i class="fas fa-funnel-dollar"> </i> Enter Customer Transaction
                    </h3>
                    <div class="row register-form" >
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname">Allotment</label>
                            <input type="text" name="task_name" class="form-control bold" value="<?php echo $task_name; ?>"readonly/>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Size</label>
                            <input type="text" name="description" class="form-control bold" value="<?php echo $description; ?>"readonly/>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Quantity</label>
                            <input type="text" class="form-control bold" name="difficulty" value="<?php echo $difficulty; ?>"readonly/>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Buyer</label>
                            <input type="text" class="form-control" name="buyer" placeholder="Buyer" required/>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Buyer Contact</label>
                            <input type="text" class="form-control" name="contact" placeholder="Telp/WA Number" required>
                        </div>
                    </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Item Quantity</label>
                                <input type="number" class="form-control" placeholder="Item Quantity" name="item_sum" required/>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Price</label>
                                <input type="number" name="price" class="form-control" placeholder="Price" required/>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Order Date</label>
                                <input type="date" class="form-control" name="dates"/>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Shipment Method</label>
                                <input type="text" class="form-control" name="shipment" placeholder="Shipment"/>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Payment Method</label>
                                <select name="pay_method" class="form-control">
                                    <option class="hidden" value="" selected disabled>Payment Method</option>
                                    <option>Transfer</option>
                                    <option>Cash</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="form-group" style="width: 100%;">
                                <label for="lastname">Buyer Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Address" required/>
                            </div>
                            <input class="btn btn-primary mt-2 size" type="submit" name="submit" value="Confirm"/>
                            <a class="btn btn-primary mt-2 size" style="text-align: center; margin-left: 10px;" href="admin_sale.php">View Product</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<?php
if(isset($_POST['submit']))
    {
        $description = $_POST['description'];
        $user_id = $user_id;
        $sums = $_POST['item_sum'];
        $tdiff = $_POST['difficulty'] - $_POST['item_sum'];
        $tprice = $_POST['price'];

        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "database";
        
        //Connect Database
        $conn3 = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());

        //CREATE SQL QUery to Update TAsk
        $sql3 = "UPDATE information, sales_size SET 
        information.task_name = '$task_name',
        information.description = '$description',
        information.user_id = '$user_id',
        information.difficulty = '$tdiff',
        sales_size.sold = sales_size.sold + '$sums',
        sales_size.price = sales_size.price + '$tprice'
        WHERE 
        information.info_id = $info_id AND sales_size.id = $size_id
        ";
        
        $res3 = mysqli_query($conn3, $sql3);
        
        if($res3==true)
        {
            //Query Executed and Task Updated
            $_SESSION['update'] = "Updated Successfully.";
            $item = $_POST['task_name'];
            $size = $_POST['description'];
            $seller = $seller;
            $buyer = $_POST['buyer'];
            $address = $_POST['address'];
            $contact = $_POST['contact'];
            $item_sum = $_POST['item_sum'];
            $price = $_POST['price'];
            $dates = $_POST['dates'];
            $shipment = $_POST['shipment'];
            $pay_method = $_POST['pay_method'];
    
            $sql = "INSERT INTO sale (user_id2, item, size, seller, buyer, contact, address, item_sum, price, dates, shipment, payMethod)
                    VALUES ('$user_id', '$item', '$size', '$seller', '$buyer', '$contact', '$address', '$item_sum', '$price', '$dates', '$shipment', '$pay_method')";
            $result = mysqli_query($conn, $sql);
            echo "<script>window.location = 'admin_sale.php'</script>";
        }
        else
        {
            $_SESSION['update_fail'] = "Failed to Update";
            echo "<script>alert('Input Data Successful!');</script>";
            header("Location: admin_transac.php");
        }
    }
?>