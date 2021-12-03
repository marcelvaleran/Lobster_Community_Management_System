<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $subdistrict = $_POST['subdistrict'];
    $phone = $_POST['phone'];
    $post_code = $_POST['post_code'];
    $level = "Member";
    $currentDateTime = date('Y-m-d');
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, email, password, full_name, address, subdistrict, phone, level, post_code, create_datetime)
                    VALUES ('$username', '$email', '$password', '$full_name', '$address', '$subdistrict', '$phone', '$level', '$post_code', '$currentDateTime')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Congrats, Registration Successful!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
                $address = "";
                $phone = "";
                $post_code = "";
            } else {
                echo "<script>alert('Woops! There is an error!.')</script>";
            }
        } else {
            echo "<script>alert('Woops! This Email is Already Registered.')</script>";
        }
         
    } else {
        echo "<script>alert('Password is Not Correct')</script>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Register</title>
</head>

<style type="text/css">
    body {
    background-image: url("back/blue_lobster1.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
}

.card {
    padding: 30px 40px;
    margin-top: 30px;
    margin-bottom: 60px;
    border: none !important;
    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.5);
    background-color: rgba(175, 189, 229, 0.9);
}

.blue-text {
    color: #00BCD4
}

.form-control-label {
    margin-bottom: 0
}

input,
textarea,
button {
    padding: 8px 15px;
    border-radius: 12px !important;
    margin: 5px 0px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    font-size: 18px !important;
    font-weight: 300
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #00BCD4;
    outline-width: 0;
    font-weight: 400
}

.btn-block {
    text-transform: uppercase;
    font-size: 15px !important;
    font-weight: 400;
    height: 43px;
    cursor: pointer
}

.btn-block:hover {
    color: #fff !important
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}
h3 {
    color: #fff;
}
p {
    color: #dc3545;
    font-weight: bold;
}
.card {
    border-radius: 10px;
}
label {
    font-weight: bold;
}
</style>

<body>
    
<div class="container-fluid py-2 mx-auto">
    <div class="row d-flex justify-content-center">
        <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
            <div class="card">
                <h3 class="text-center mb-4"><i class="fas fa-user-plus"></i> Create New Account</h3>

                <form class="form-card" action="" method="POST">
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Full Name<span class="text-danger"> *</span></label> 
                            <input type="text" id="fname" placeholder="Your Full Name" name="full_name" value="<?php echo $full_name; ?>" onblur="validate(1)" required> 
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Username<span class="text-danger"> *</span></label> 
                            <input type="text" id="lname"  placeholder="Username" name="username" value="<?php echo $username; ?>" onblur="validate(1)" required> 
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Email<span class="text-danger"> *</span></label> 
                            <input type="text" id="email" placeholder="Email" name="email" value="<?php echo $email; ?>" onblur="validate(2)" required> 
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Password<span class="text-danger"> *</span></label> 
                            <input type="password" id="mob" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" onblur="validate(3)"> 
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Confirm Password<span class="text-danger"> *</span></label> 
                            <input type="password" id="job" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" onblur="validate(4)"> 
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Phone/WA Number<span class="text-danger"> *</span></label> 
                            <input type="phone" id="job" placeholder="Phone/WA" name="phone" value="<?php echo $_POST['phone']; ?>" onblur="validate(5)"> 
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Sub-district<span class="text-danger"> *</span></label> 
                            <input type="text" id="job" placeholder="Zip" name="subdistrict" value="<?php echo $_POST['subdistrict']; ?>" onblur="validate(5)"> 
                        </div>
                        <div class="form-group col-sm-6 flex-column d-flex"> 
                            <label class="form-control-label px-3">Postal Code<span class="text-danger"> *</span></label> 
                            <input type="text" id="job" placeholder="Zip" name="post_code" value="<?php echo $_POST['post_code']; ?>" onblur="validate(5)"> 
                        </div>
                    </div>
                    <div class="row justify-content-between text-left">
                        <div class="form-group col-12 flex-column d-flex"> 
                            <label class="form-control-label px-3">Address<span class="text-danger"> *</span></label> 
                            <input type="address" id="ans" placeholder="Address" name="address" value="<?php echo $_POST['address']; ?>" onblur="validate(6)"> </div>
                        </div>
                    <div class="row justify-content-end">
                        <div class="form-group col-sm-6"> 
                            <button type="submit" name="submit" class="btn-block btn-primary">Register</button> 
                        </div>
                    </div>
                    <p style="font-size: 18px;" class="login-register-text">
                        DO YOU HAVE AN ACCOUNT? <a href="index.php"><i class="fas fa-sign-in-alt"></i> LOGIN </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>

</body>

<script type="text/javascript">
    function validate(val) {
v1 = document.getElementById("fname");
v2 = document.getElementById("lname");
v3 = document.getElementById("email");
v4 = document.getElementById("mob");
v5 = document.getElementById("job");
v6 = document.getElementById("ans");

flag1 = true;
flag2 = true;
flag3 = true;
flag4 = true;
flag5 = true;
flag6 = true;

if(val>=1 || val==0) {
if(v1.value == "") {
v1.style.borderColor = "red";
flag1 = false;
}
else {
v1.style.borderColor = "green";
flag1 = true;
}
}

if(val>=2 || val==0) {
if(v2.value == "") {
v2.style.borderColor = "red";
flag2 = false;
}
else {
v2.style.borderColor = "green";
flag2 = true;
}
}
if(val>=3 || val==0) {
if(v3.value == "") {
v3.style.borderColor = "red";
flag3 = false;
}
else {
v3.style.borderColor = "green";
flag3 = true;
}
}
if(val>=4 || val==0) {
if(v4.value == "") {
v4.style.borderColor = "red";
flag4 = false;
}
else {
v4.style.borderColor = "green";
flag4 = true;
}
}
if(val>=5 || val==0) {
if(v5.value == "") {
v5.style.borderColor = "red";
flag5 = false;
}
else {
v5.style.borderColor = "green";
flag5 = true;
}
}
if(val>=6 || val==0) {
if(v6.value == "") {
v6.style.borderColor = "red";
flag6 = false;
}
else {
v6.style.borderColor = "green";
flag6 = true;
}
}

flag = flag1 && flag2 && flag3 && flag4 && flag5 && flag6;

return flag;
}
</script>

</html>