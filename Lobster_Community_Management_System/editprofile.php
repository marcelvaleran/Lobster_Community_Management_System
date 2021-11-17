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
            }
    }
    else
    {
        //Redirect to Homepage
        header("view.php");
    }
    $currentDateTime = date('m-d-Y');
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</head>

<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box
}

body {
    font-family: 'Poppins', sans-serif;
    background-image: url("back/blue_lobster1.jpg");
    background-attachment: fixed;
    background-repeat:no-repeat;
    background-size:cover;
}

.wrapper {
    padding: 30px 50px;
    border: 1px solid #ddd;
    border-radius: 15px;
    margin: 10px auto;
    max-width: 600px;
    background: rgba(217, 217, 255, 0.9);
    box-shadow: 0px 0px 5px 5px #b9bcbf;
}

h4 {
    letter-spacing: -1px;
    font-weight: 400;
    margin-bottom: -8px;
}

.img {
    width: 70px;
    height: 85px;
    border-radius: 6px;
    object-fit: cover
}

#img-section p,
#deactivate p {
    font-size: 12px;
    color: #777;
    margin-bottom: 10px;
    text-align: justify
}

#img-section b,
#img-section button,
#deactivate b {
    font-size: 14px
}

label {
    margin-bottom: 0;
    font-size: 14px;
    font-weight: 500;
    color: #777;
    padding-left: 3px
}

.form-control {
    border-radius: 10px
}

input[placeholder] {
    font-weight: 500
}

.form-control:focus {
    box-shadow: none;
    border: 1.5px solid #0779e4
}

select {
    display: block;
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 10px;
    height: 40px;
    padding: 5px 10px
}

select:focus {
    outline: none
}

.button {
    background-color: #fff;
    color: #0779e4
}

.button:hover {
    background-color: #0779e4;
    color: #fff
}

.btn-primary {
    background-color: #0779e4
}

.danger {
    background-color: #fff;
    color: #e20404;
    border: 1px solid #ddd
}

.danger:hover {
    background-color: #e20404;
    color: #fff
}

@media(max-width:576px) {
    .wrapper {
        padding: 25px 20px
    }

    #deactivate {
        line-height: 18px
    }
}
.rightset {
    background: transparent;
    border: none;
    float: right;
    width: 20%;
    color: #c72434;
    font-size: 16px;
    margin-right: -6px;
    margin-top: -5px;
    font-weight: bold;
}
.rightset:focus{
    outline: none;
}
</style>

<body>
<form class="wrapper mt-sm-5" method="POST" enctype="multipart/form-data">
    <div class="pb-4 border-bottom">
        <h4>Account settings</h4>
        <input type="text" name="update_on" class="rightset" value=" <?php echo $currentDateTime; ?>"readonly>
        <label class="rightset">Update On:</label>
    </div>
    <div class="d-flex align-items-start py-3 border-bottom"> 
        <img src="img/<?php echo $profile_img; ?>" class="img" alt="">
        <div class="pl-sm-4 pl-2" id="img-section"> <b>Profile Photo</b>
            <p>Accepted file type .jpg. Less than 5MB</p>
            <div class="custom-file mb-3">
              <input type="file" name="image" class="custom-file-input" id="customFile" />
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="row py-2">
            <div class="col-md-6"> 
                <label for="firstname">Full Name</label>
                <input type="text" name="full_name" class="bg-light form-control" value="<?php echo $full_name; ?>">
            </div>
            <div class="col-md-6"> 
                <label for="firstname">Username</label>
                <input type="text" name="username" class="bg-light form-control" value="<?php echo $username; ?>">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="email">Email Address</label>
                <input type="text" name="email" class="bg-light form-control" value="<?php echo $email; ?>">
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="lastname">Address</label>
                <input type="text" name="address" class="bg-light form-control" value="<?php echo $address; ?>">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6 pt-md-0 pt-3"> 
                <label for="phone">Phone Number</label> 
                <input type="tel" name="phone" class="bg-light form-control" value="<?php echo $phone; ?>">
            </div>
            <div class="col-md-6 pt-md-0 pt-3"> 
                <label for="phone">Sub-district</label> 
                <input type="text" name="subdistrict" class="bg-light form-control" value="<?php echo $subdistrict; ?>">
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6 pt-md-0 pt-3" id="lang"> <label for="language">Postal Code</label>
                <div class="arrow"> 
                    <input type="number" name="post_code" class="bg-light form-control" value="<?php echo $post_code; ?>">
                </div>
            </div>
        </div>
        <div class="py-3 pb-4 border-bottom">
            <input class="btn btn-primary mr-3" type="submit" name="submit" value="Save Changes" />
            <a href="javascript:history.back()" class="btn border button">Back</a>
        </div>
        <div class="d-sm-flex align-items-center pt-3" id="deactivate">
            <div> 
                <b>Details about your company account and password</b>
            </div>
        </div>
    </div>
</form>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
</body>
<?php
    //Check if the button is clicked
    if(isset($_POST['submit']))
    {
        //echo "Clicked";
        
        //Get the CAlues from Form
        $username = $_POST['username'];
        $address = $_POST['address'];
        $full_name = $_POST['full_name'];
        $subdistrict = $_POST['subdistrict'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $post_code = $_POST['post_code'];
        $update_on = $_POST['update_on'];
        move_uploaded_file($_FILES["image"]["tmp_name"],"img/" . $_FILES["image"]["name"]);         
        $location1=$_FILES["image"]["name"];

        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "database";
        
        //Connect Database
        $conn3 = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());

        if ($location1 != "") {
            move_uploaded_file($_FILES["image"]["tmp_name"],"img/" . $_FILES["image"]["name"]);
            $location1=$_FILES["image"]["name"];
            $sql3 = "UPDATE users SET 
            username = '$username',
            address = '$address',
            full_name = '$full_name',
            subdistrict = '$subdistrict',
            email = '$email',
            phone = '$phone',
            post_code = '$post_code',
            update_on = '$update_on',
            img_location = '$location1'
            WHERE 
            id = $id
            ";
        } else{
             //CREATE SQL QUery to Update TAsk
            $sql3 = "UPDATE users SET 
            username = '$username',
            address = '$address',
            full_name = '$full_name',
            subdistrict = '$subdistrict',
            email = '$email',
            phone = '$phone',
            post_code = '$post_code',
            update_on = '$update_on'
            WHERE 
            id = $id
            ";
        }
 
        //Execute Query
        $res3 = mysqli_query($conn3, $sql3);
        
        //CHeck whether the Query Executed or Not
        if($res3==true)
        {
            //Query Executed and Task Updated
            $_SESSION['update'] = "Updated Successfully.";
            
            echo "<script>alert('Successfully Updated')</script>";
            echo "<script>window.history.back();</script>";
        }
        else
        {
            //FAiled to Update Task
            $_SESSION['update_fail'] = "Failed to Update";
            
            //Redirect to this Page
            header("Location: editprofile.php");
        }
        
    }
?>