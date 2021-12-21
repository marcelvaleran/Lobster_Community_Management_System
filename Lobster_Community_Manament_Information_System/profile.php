<?php 
 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];

if(isset($_GET['id'])) 
{
$id = $_GET['id'];

    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "database";
    $conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());
    
        //SQL QUERY to display tasks by list selected
        $sql = "SELECT * FROM users WHERE id=$id";
        
        //Execute Query
        $res = mysqli_query($conn, $sql);
        if($res==true)
            {
                //Query <br />Executed
                $row = mysqli_fetch_assoc($res);
                
                //Get the Individual Value
                $username = $row['username'];
                $full_name = $row['full_name'];
                $email = $row['email'];
                $id = $row['id'];
                $address = $row['address'];
                $subdistrict = $row['subdistrict'];
                $phone = $row['phone'];
                $post_code = $row['post_code'];
                $create_date = $row['create_datetime'];
                $profile_img = $row['img_location'];
                $status = $row['level'];
                $created_on = $row['create_datetime'];
                $update_on = $row['update_on'];
            }
    }
    else
    {
        //Redirect to Homepage
        header("Location: admin_listuser.php");
    }

$sql = "SELECT * FROM information WHERE user_id=$user_id";
//Execute Query
$res = mysqli_query($conn, $sql);
$tLobster= 0;
while($row=mysqli_fetch_assoc($res))
{
    $tLobster += $row['difficulty'];
}

$sql2 = "SELECT * FROM ponds WHERE user_id3=$user_id";
//Execute Query
$res2 = mysqli_query($conn, $sql2);
$tPond = mysqli_num_rows($res2);

$sql3 = "SELECT * FROM sale WHERE user_id2=$user_id";
//Execute Query
$res3 = mysqli_query($conn, $sql3);
$sale = mysqli_num_rows($res3);
$tSale= 0;
while($row2=mysqli_fetch_assoc($res3))
{
    $tSale += $row2['price'];
}
$sql4 = "SELECT * FROM customer WHERE user_id6=$user_id";
//Execute Query
$res4 = mysqli_query($conn, $sql4);
$tCust = mysqli_num_rows($res4);
?>
<head>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/profile.css">
<!------ Include the above in your HEAD tag ---------->
</head>

<style type="text/css">
body{
    background-image: url("back/blue_lobster1.jpg");
    background-attachment: fixed;
    background-repeat:no-repeat;
    background-size:cover;
}
a:hover{
        color: blue;
    }
.eprofile {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
</style>

<body>
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="img/<?php echo $profile_img ?>" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Profile Photo
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $username; ?>
                                    </h5>
                                    <h6>
                                        <?php echo $status; ?>
                                    </h6>
                                    <p class="proile-rating">JOIN ON : <span><?php echo $created_on; ?></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#about" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item hover">
                                    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#records" role="tab" aria-controls="profile" aria-selected="false">Records</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="editprofile.php?id=<?php echo $user_id;?>" class="profile-edit-btn" style="background: #fff; padding: 6px; text-decoration: none; font-weight: bold;">
                            Edit Profile
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="view.php">Dashboard</a><br/>
                            <a href="customer_lists.php">Customer List</a><br/>
                            <a href="sale.php">Sales</a><br/>
                            <a href="sales_record.php">Sales Record</a><br/>
                            <a href="view.php">Lobster List</a><br/>
                            <a href="view_pond.php">Pond List</a><br/>
                            <a href="member_add.php">Add Lobster Data</a><br/>
                            <a href="add_pond.php">Add Pond Data</a><br/><br/>
                            <hr style="border: 0.5px solid #fff;">
                            <a href="logout.php">Sign Out <i class="fas fa-sign-out-alt"></i></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>User Id</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $id; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $full_name; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $email; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $phone; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Status</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $status; ?></p>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                        <label>Sub-District</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $subdistrict; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $address; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="records" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Total Lobster</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $tLobster; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Pond Data</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $tPond; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Sales Data</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $sale; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Total Sales</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $tSale; ?>,00</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Customer Data</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $tCust; ?></p>
                                    </div>
                                </div>
                            </div>
                            <hr style="border: 0.5px solid white;">
                            <a href="javascript:history.back()" style="float: right; margin-right: 6em;" class="btn btn-primary mt-4">
                                <i class="fas fa-arrow-circle-left"></i>  Previous
                            </a>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
    </body>