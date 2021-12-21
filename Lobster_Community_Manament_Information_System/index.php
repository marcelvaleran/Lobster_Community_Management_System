<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
/*if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    $sql =  mysqli_query("SELECT * FROM users WHERE email='$email' AND password='$password'");
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $qry = mysqli_fetch_array($sql);
        $_SESSION['id']    = $qry['id'];
        $_SESSION['username']    = $qry['username'];
        $_SESSION['email']    = $qry['email'];
            
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: berhasil_login.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}*/

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 
    $sql = "SELECT * FROM users, information WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['info_id'] = $row['info_id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['task_name'] = $row['task_name'];
        $_SESSION['img_prof'] = $row['img_location'];

        $data = mysqli_fetch_assoc($result);

        if($data['level']=="Admin"){

        $_SESSION['email'] = $email;
        $_SESSION['level'] = "Admin";
        header("Location: admin_view.php");

    }else{
        if ($data['activation']=="Deactivated") {
            echo "<script>alert('Your Account was Deactivated by Administrator!')</script>";
        }
        else{
            $_SESSION['level'] = "Member";
            header("Location: view.php");
        }

    } 
}else {
        echo "<script>alert('Email or password wrong. Please try again!')</script>";
    }
}
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <title>Login</title>
</head>

<style type="text/css">
body{
    background-image: url("back/blue_lobster1.jpg");
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
}

    .login_form_wrapper {
    padding-left: 25%;
    width: 100%;
    padding-top: 40px;
    padding-bottom: 100px;
}

.login_wrapper {
    padding-bottom: 20px;
    margin-top: 5em;
    margin-bottom: 20px;
    border-bottom: 1px solid #e4e4e4;
    width: 100%;
    background-color: rgba(175, 189, 229, 0.9);
    padding: 50px;
    box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.5);
    border-radius: 10px;
}

.login_wrapper button.btn {
    color: #fff;
    width: 100%;
    height: 50px;
    padding: 6px 25px;
    line-height: 36px;
    margin-bottom: 20px;
    text-align: left;
    border-radius: 12px;
    background: #4385f5;
    font-size: 16px;
    border: 1px solid #4385f5
}

.login_wrapper button i {
    float: right;
    margin: 0;
    line-height: 35px
}

.login_wrapper button a.google-plus {
    background: #db4c3e;
    border: 1px solid #db4c3e
}

.login_wrapper {
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 20px;
    color: #111;
    line-height: 20px;
    text-transform: uppercase;
    text-align: center;
    position: relative
}

h1 {
    font-weight: 500;
    margin-bottom: 20px;
    color: #fff;
    line-height: 20px;
    text-transform: uppercase;
    text-align: center;
    position: relative
}

.login_wrapper .formsix-pos,
.formsix-e {
    position: relative
}

.form-group {
    margin-bottom: 15px
}

.login_wrapper .form-control {
    height: 53px;
    padding: 15px 20px;
    font-size: 20px;
    line-height: 24px;
    border: 1px solid #fafafa;
    border-radius: 3px;
    box-shadow: none;
    font-family: 'Roboto';
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    background-color: rgba(255, 255, 255, 0.8);
}

.login_wrapper .form-control:focus {
    color: black;
    background-color: #fafafa;
    border: 1px solid #4285f4 !important
}

.login_remember_box {
    margin-top: 12px;
    margin-bottom: 30px;
    color: #999
}

.login_remember_box .control {
    position: relative;
    padding-left: 20px;
    cursor: pointer;
    font-size: 12px;
    font-weight: 500;
    margin: 0
}

.login_remember_box .control input {
    position: absolute;
    z-index: -1;
    opacity: 0
}

.login_remember_box .control__indicator {
    position: absolute;
    top: 0;
    left: 0;
    width: 15px;
    height: 15px;
    background: #fff;
    border: 1px solid #999
}

.login_remember_box .forget_password {
    float: right;
    color: #db4c3e;
    line-height: 12px;
    text-decoration: underline
}

.login_btn_wrapper {
    padding-bottom: 20px;
    margin-top: 40px;
    margin-bottom: 30px;
    border-bottom: 1px solid #e4e4e4
}

.login_btn_wrapper button.login_btn {
    text-align: center;
    text-transform: uppercase
}

.login_message p {
    text-align: center;
    font-size: 16px;
    margin: 0
}

p {
    color: #dc3545;
    font-size: 14px;
    line-height: 24px;
    font-weight: bold;
}

.login_wrapper button a.login_btn:hover {
    background-color: #2c6ad4;
    border-color: #2c6ad4
}

.login_wrapper button a.btn:hover {
    background-color: #2c6ad4;
    border-color: #2c6ad4
}

.login_wrapper button a.google-plus:hover {
    background: #bd4033;
    border-color: #bd4033
}
/* width */
::-webkit-scrollbar {
  width: 10px;
  height: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px grey; 
  border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #dc3545; 
  border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #b30000; 
}
img{ 
    margin-left: 3%; 
    margin-top: 3%;
    margin-bottom: -5%;
    background-color: rgba(175, 189, 229, 0.9);
    box-shadow: 0 6px 12px 0 rgba(255, 255, 255, 0.6);
    border-radius: 50%;
}
.mytitle{
    font-weight: 500;
    margin-bottom: 20px;
    color: #fff;
    line-height: 20px;
    text-transform: uppercase;
    text-align: center;
    position: relative;
}
</style>

<body>

<div class="mytitle"> <img src="back/SLC2.png"> </div>
    <div class="" role="alert">
        <?php echo $_SESSION['error']?>
    </div>
 
    <div class="login_form_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

            <!-- login_wrapper -->
            <form action="" method="POST" class="login_wrapper">
                <h1><i class="fas fa-sign-in-alt"></i> Log-In</h1><br>
                <div class="formsix-pos">
                    <div class="form-group i-email"> 
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>" required> 
                    </div>
                </div>
                <div class="formsix-e">
                    <div class="form-group i-password"> 
                        <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required> 
                    </div>
                </div>

                <div class="login_btn_wrapper"> 
                    <button  name="submit" class="btn btn-primary login_btn"> Login </button> 
                </div>
                <div class="login_message">
                    <p>Don’t have an account ? <a href="register.php"><i class="fas fa-user-plus"></i> Register </a> </p>
                </div>
            </form> <!-- /.login_wrapper-->
            </div>
        </div>
    </div>
</div>

</body>
</html>