<?php 
 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$img_prof = $_SESSION['img_prof'];

$sql = "SELECT * FROM users ORDER BY id";

//Execute Query
$res = mysqli_query($conn, $sql);
$total = mysqli_num_rows($res);

?>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="css/sidebar4.css">
    <link rel="stylesheet" href="css/userlist3.css">
    <link rel="stylesheet" href="css/hover.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	<title>Admin</title>
</head>
<style type="text/css">
    a:hover, a, th{text-decoration: none;}
    body{
    background-image: url("back/blue_lobster1.jpg");
    background-attachment: fixed;
    background-repeat:no-repeat;
    background-size:cover;
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
                    <a href="admin_view.php" class="nav_link"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Dashboard</span> 
                    </a> 
                        <a href="admin_listuser.php" class="nav_link active"> 
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
article {
  background: #f37125;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  text-align: left;
  font-family: serif;
}

h1 {
  font-size: 4vmin;
  line-height: 1.1;
}

</style>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<br>
<br>
<br>
<div class="container">
<div class="card b-1 hover-shadow mb-20" style="background: rgba(45, 98, 245, 0.9);">
        <div class="media card-body">
            <div class="media-body">
                <article>
                  <h1><i class="fas fa-users"></i> <b>List of Member</b></h1>
                </article>
            <small class="fs-16 fw-300 ls-1"> Showing <?php echo $total; ?> active members</small>
            </div>
            
            <div class="media-right text-right d-none d-md-block">
                <input type="text" class="form-control" style="float: right; margin-top: 1.7em; width: 20em; background: transparent; color: #fff;" id="myFilter" onkeyup="myFunction()" placeholder="Search...">
            </div>
        </div>
    </div>
    <hr style="border: 1px solid white;">
</div>
<div class="container">
<div class="" id="myProducts">
<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "database";
$conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());


//SQL QUERY to display tasks by list selected
$sql = "SELECT * FROM users ORDER BY id";

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
        $id = $row['id'];
        $username = $row['username'];
        $email = $row['email'];
        $address = $row['address'];
        $phone = $row['phone'];
        $status = $row['level'];
        $date = $row['create_datetime'];
        ?>

    <div class="card b-1 hover-shadow mb-20" style="background: rgba(45, 98, 245, 0.8);">
        <div class="media card-body">
            <div class="media-left pr-12">
                <img class="avatar avatar-xl no-radius" style="object-fit: cover" src="img/<?php echo $row['img_location']; ?>" alt="...">
            </div>
            <div class="media-body">
                <div class="mb-2">
                    <span class="fs-20 pr-16"><?php echo $username; ?></span>
                </div>
                <small class="fs-16 fw-300 ls-1"><?php echo $status; ?></small>
            </div>
            <div class="media-right text-right d-none d-md-block">
                <p class="fs-14 text-fade mb-12"><i class="fas fa-map-marker-alt pr-1"></i><?php echo $address; ?></p>
                <span class="text-fade"><i class="fas fa-envelope-square pr-1"></i> <?php echo $email; ?></span>
            </div>
        </div>
        <footer class="card-footer flexbox align-items-center">
            <div style="color: #fff;">
                <strong>Join on:</strong>
                <span><?php echo $date; ?></span>
            </div>
            <div class="card-hover-show">
                <a class="btn btn-xs fs-10 btn-bold btn-info" href="admin_user_detail.php?id=<?php echo $id; ?>">View Detail</a>
                <a class="btn btn-xs fs-10 btn-bold btn-primary" href="admin_editprofile.php?id=<?php echo $id; ?>">Edit</a>
                <a class="btn btn-xs fs-10 btn-bold btn-warning" href="">Delete</a>
            </div>
        </footer>
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
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
        </ul>
    </nav>
    <br>
</div>
</div>

<script type="text/javascript">
function myFunction() {
  var input, filter, cards, cardContainer, title, i;
  input = document.getElementById("myFilter");
  filter = input.value.toUpperCase();
  cardContainer = document.getElementById("myProducts");
  cards = cardContainer.getElementsByClassName("card");
  for (i = 0; i < cards.length; i++) {
    title = cards[i].querySelector(".media-body");
    if (title.innerText.toUpperCase().indexOf(filter) > -1) {
      cards[i].style.display = "";
    } else {
      cards[i].style.display = "none";
    }
  }
}
</script>

</body>
</html>
