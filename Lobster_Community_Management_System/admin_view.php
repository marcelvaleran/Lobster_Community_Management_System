<?php 
 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$img_prof = $_SESSION['img_prof'];

$sql = "SELECT * FROM information";

//Execute Query
$res = mysqli_query($conn, $sql);
$total = mysqli_num_rows($res);
$qty= 0;
while($row=mysqli_fetch_assoc($res))
{
    $qty += $row['difficulty'];
}
$sql2 = "SELECT * FROM users";

//Execute Query
$res2 = mysqli_query($conn, $sql2);
$tusers = mysqli_num_rows($res2);

$sql3 = "SELECT * FROM sale";

//Execute Query
$res3 = mysqli_query($conn, $sql3);
$tsale = mysqli_num_rows($res3);
?>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="css/sidebar4.css">
    <link rel="stylesheet" href="css/cardlist.css">
    <link rel="stylesheet" href="css/hover.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css" integrity="sha256-3sPp8BkKUE7QyPSl6VfBByBroQbKxKG7tsusY2mhbVY=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	<title>Admin</title>
</head>
<style type="text/css">
    body{
    background-image: url("back/blue_lobster1.jpg");
    background-attachment: fixed;
    background-repeat:no-repeat;
    background-size:cover;
}
    a:hover, a, th{text-decoration: none;}
    span{
    color: #fff;
}
</style>
<body id="body-pd">

<header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="space">
            <div class="header_img mr-2"> <img src="img/<?php echo $img_prof ?>" alt=""> </div>
            <a style="color: #ffcf47;" title="Edit Profile" href="admin_editprofile.php?id=<?php echo $user_id;?>">
                <?php echo"<b class=hover style=font-size:18px;>". $_SESSION['username'] . "</b>";?>        
            </a>
        </div>
</header>
<div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Menu</span> </a>
                <div class="nav_list"> 
                    <a href="admin_view.php" class="nav_link active"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Dashboard</span> 
                    </a> 
                        <a href="admin_listuser.php" class="nav_link"> 
                        <i class='bx bx-user nav_icon'></i> 
                        <span class="nav_name">Users</span> 
                    </a> 
                    <a href="admin_data.php" class="nav_link"> 
                        <i class='bx bx-file nav_icon'></i> 
                        <span class="nav_name">Information List</span> 
                    </a> 
                    <a href="admin_sale.php" class="nav_link"> 
                        <i class='bx bx-clipboard nav_icon'></i> 
                        <span class="nav_name">Sales</span> 
                    </a> 
                    <a href="admin_view_pond.php" class="nav_link"> 
                        <i class='bx bx-archive nav_icon'></i> 
                        <span class="nav_name">Ponds</span> 
                    </a>
                    <a href="admin_size_detail.php" class="nav_link"> 
                        <i class='bx bx-sitemap nav_icon'></i> 
                        <span class="nav_name">Size Category</span> 
                    </a>
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                        <span class="nav_name">Stats</span> 
                    </a>
                </div>
            </div> 
        <a href="logout.php" class="nav_link"> 
            <i class='bx bx-log-out nav_icon'></i> 
            <span class="nav_name">SignOut</span> 
        </a>
    </nav>
</div>

<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function(event) {

const showNavbar = (toggleId, navId, bodyId, headerId) =>{
const toggle = document.getElementById(toggleId),
nav = document.getElementById(navId),
bodypd = document.getElementById(bodyId),
headerpd = document.getElementById(headerId)

// Validate that all variables exist
if(toggle && nav && bodypd && headerpd){
toggle.addEventListener('click', ()=>{
// show navbar
nav.classList.toggle('show')
// change icon
toggle.classList.toggle('bx-x')
// add padding to body
bodypd.classList.toggle('body-pd')
// add padding to header
headerpd.classList.toggle('body-pd')
})
}
}
showNavbar('header-toggle','nav-bar','body-pd','header')
/*===== LINK ACTIVE =====*/
const linkColor = document.querySelectorAll('.nav_link')

function colorLink(){
if(linkColor){
linkColor.forEach(l=> l.classList.remove('active'))
this.classList.add('active')
}
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

// Your code to run since DOM is loaded and ready
});
</script>

<style type="text/css">
    .boxx {
        background-color: rgba(217, 217, 255, 0.7); 
        width: 98%; 
        border-radius: 8px; 
        box-shadow: 0 0 35px 0 rgba(130, 130, 130, 1);
        margin-bottom: 3em;
    }
.container { max-width: 100%; }
.job-box { width: 100%; }
.spaces{ margin-bottom: -1px; }
.right { float: right; }
.btn-custom { height: 100%; }
.btn{ color: blue; font-weight: bold;}
</style>

<div class="boxx">
<div class="container" style="margin-left: -20px;">
    <div class="row" style="margin-top: 5em;">
         <div class="col-lg-11 mx-auto mb-4 mt-4">
            <div class="section-title text-center d-flex justify-content-between">
                <h2 class="text-left text-white"><i class="fas fa-tachometer-alt"></i> Dashboard</h2>
                <div class="job-right flex-shrink-0">
                    <a href="admin_size_detail.php" class="btn d-block w-100 d-sm-inline-block btn-light"> 
                       <i class="fas fa-list-ul"></i> View Detail
                    </a>
                </div>
            </div>
            <hr style="border: 1px solid #fff;">
        </div>
    </div>
    <div class="row">
    <div class="col-lg-11 mx-auto">
        <div class="career-search mb-60">

            <form action="#" class="career-form mb-60" style="width: 100%;">
                <div class="row">
                    <div class="col-md-6 col-lg-3 my-3">
                        <div class="form-control">
                            <h5 class="spaces">Lobster Data </h5>
                            <p class="spaces" style="font-size: 36px;"><?php echo $total; ?><i class="fas fa-database right"></i></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 my-3">
                        <div class="form-control">
                            <h5 class="spaces">Users </h5>
                            <p class="spaces" style="font-size: 36px;"><?php echo $tusers; ?><i class="fas fa-users right"></i></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 my-3">
                        <div class="form-control">
                            <h5 class="spaces">Total Lobster </h5>
                            <p class="spaces" style="font-size: 36px;"><?php echo $qty; ?><i class="fas fa-folder right"></i></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 my-3">
                        <div class="form-control">
                            <h5 class="spaces">Sales Data </h5>
                            <p class="spaces" style="font-size: 36px;"><?php echo $tsale; ?><i class="fas fa-search-dollar right"></i></p>
                        </div>
                    </div>
                </div>
            </form>

        <div class="filter-result">
         <?php
            $server = "localhost";
            $user = "root";
            $pass = "";
            $database = "database";
            $conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());

                //SQL QUERY to display tasks by list selected
                $sql = "SELECT * FROM information ORDER BY date desc LIMIT 5";
                
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
                            $info_id = $row['info_id'];
                            $nameuser = $row['nameuser'];
                            $task_name = $row['task_name'];
                            $description = $row['description'];
                            $difficulty = $row['difficulty'];
                            $date = $row['date'];
                            $users_id = $row['user_id'];
                            ?>
                            <div class="job-box d-md-flex align-items-center justify-content-between mb-30">
                                <div class="job-left my-4 d-md-flex align-items-center flex-wrap">
                                    <div class="img-holder mr-md-4 mb-md-0 mb-4 mx-auto mx-md-0 d-md-none d-lg-flex">
                                        <?php echo $info_id; ?>
                                    </div>
                                    <div class="job-content">
                                        <h5 class="text-center text-md-left"><?php echo $nameuser; ?> (ID: <?php echo $users_id; ?>)</h5>
                                        <ul class="d-md-flex flex-wrap text-capitalize ff-open-sans">
                                            <li class="mr-md-4">
                                                <i class="fas fa-marker mr-2"></i> Allotment: <?php echo $task_name; ?>
                                            </li>
                                            <li class="mr-md-4">
                                                <i class="fas fa-sort-numeric-up mr-2"></i> Size: <?php echo $description; ?> Inch
                                            </li>
                                            <li class="mr-md-4">
                                                <i class="fas fa-boxes mr-2"></i> Quantity: <?php echo $difficulty; ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="job-right my-4 flex-shrink-0">
                                    <p class="btn d-block w-100 d-sm-inline-block btn-light">
                                       <i class="fas fa-calendar-alt"></i> <?php echo $date; ?>
                                    </p>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    else
                    {
                        //NO Tasks on this list
                        ?>
                        <tr>
                            <td colspan="5">No Information added on this list.</td>
                        </tr>
                        <?php
                    }
                }
            ?>
            </div>
        </div>
    </div>
</div>
<?php 
$sql4 = "SELECT * FROM information LIMIT 5";

//Execute Query
$res4 = mysqli_query($conn, $sql4);
$Ctotal = mysqli_num_rows($res4);
?>
<div class="row">
         <div class="col-lg-11 mx-auto mb-4 mt-4">
            <hr style="border: 1px solid #fff;">
            <div class="section-title text-center d-flex justify-content-between">
                <div class="job-right flex-shrink-0">
                    <a href="admin_size_detail.php" class="btn d-block w-100 d-sm-inline-block btn-light"> 
                       <i class="fas fa-list-ul"></i> View Detail
                    </a>
                </div>
                <div class="job-right flex-shrink-0">
                    <h5 class=" btn d-block w-100 d-sm-inline-block btn-light">
                        <i class="fas fa-info-circle"></i> Showing the latest <b><?php echo $Ctotal; ?></b> lobster data
                    </h5>
                </div>
            </div>
            
        </div>
    </div>
</div>
</div>
</body>
</html>