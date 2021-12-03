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
                $email = $row['email'];
                $id = $row['id'];
                $full_name = $row['full_name'];
                $address = $row['address'];
                $subdistrict = $row['subdistrict'];
                $phone = $row['phone'];
                $post_code = $row['post_code'];
                $create_date = $row['create_datetime'];
                $profile_img = $row['img_location'];
                $status = $row['level'];
                $created_on = $row['create_datetime'];
                $update_on = $row['update_on'];
                $activation = $row['activation'];
            }
    }
    else
    {
        //Redirect to Homepage
        header("Location: admin_listuser.php");
    }

?>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/userdetail3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"> 
    <title>Users</title>
</head>
<style type="text/css">
body {
    background-image: url("back/blue_lobster1.jpg");
    background-attachment: fixed;
    background-repeat:no-repeat;
    background-size:cover;
}
h6, p{
    color: #4c4c4c;
}
.setright {
    float: right;
    color: #c72434;
    width: 20.5%;
    margin-top: -25px;
    font-size: 18px;
}
span{ color: #fff; }
.active-status {
    margin: auto;
    color: green; 
    background-color: #fff; 
    width: 52%; 
    margin-bottom: 25px;
    border-radius: 50px; 
    font-weight: bold;
    font-size: 16px;
}
</style>
<body>
<div class="page-content page-container mt-4" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full" style="background: rgba(210, 210, 255, 0.8);">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white ml-3">
                                <div class="m-b-15"> 
                                    <img src="img/<?php echo $profile_img; ?>" class="img-radius" alt="User-Profile-Image"> 
                                </div>
                                <h5 class="f-w-600"><?php echo $full_name; ?></h5>
                                <?php 
                                if ($activation == "Deactivated") { ?>
                                    <p class="active-status text-danger"><?php echo $activation; ?></p>
                                <?php }

                                if ($activation == "Active") { ?>
                                    <p class="active-status text-success"><?php echo $activation; ?></p>
                                <?php } ?>
                                <a type="button" class="btn btn-danger" href="admin_editprofile.php?id=<?php echo $id; ?>"><i class="fas fa-edit"></i> Edit Profile</a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <div class="m-b-20 p-b-5 b-b-default f-w-600">
                                    <h5><i class="fas fa-id-card"></i> Profile Card</h5>
                                    <h7 class="f-w-400 setright"><i class="fas fa-calendar-day" title="Updated On"> <?php echo $update_on; ?></i></h7>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Username</p>
                                        <h6 class="f-w-400"><i class="fas fa-user"></i> <?php echo $username; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="f-w-400"><i class="fas fa-envelope"></i> <?php echo $email; ?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Address</p>
                                        <h6 class="f-w-400"><i class="fas fa-map-marked"></i> <?php echo $address; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone/WA Number</p>
                                        <h6 class="f-w-400"><i class="fas fa-phone"></i> <?php echo $phone; ?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Sub-district</p>
                                        <h6 class="f-w-400"><i class="fas fa-map-marker-alt"> <?php echo $subdistrict; ?></i></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Postal Code</p>
                                        <h6 class="f-w-400"><i class="fas fa-paper-plane"></i> <?php echo $post_code; ?></h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Status</p>
                                        <h6 class="f-w-400"><i class="fas fa-users"> <?php echo $status; ?></i></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Created on</p>
                                        <h6 class="f-w-400"><i class="fas fa-calendar-plus"> <?php echo $created_on; ?></i></h6>
                                    </div>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                    <li>
                                        <a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true">
                                            <i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true">
                                            <i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true">
                                            <i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    <a href="admin_listuser.php" class="btn btn-danger float-right mr-2"><i class="fas fa-arrow-circle-left"></i> Back</a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>