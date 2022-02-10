<?php 
 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$img_prof = $_SESSION['img_prof'];

if (!$conn) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT *, SUM(price) FROM sale GROUP BY size ORDER BY size ASC";
         $result = mysqli_query($conn,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $size[]  = $row['size'];
            $price[] = $row['SUM(price)'];
        }
 }
$currentDate = date('F j, Y');
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/sidebar4.css">
    <link rel="stylesheet" href="css/hover.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> 
    <<link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Sales Graph</title>
</head>

<style type="text/css">
a:hover, a, th{text-decoration: none; color: #ccfd09;}
td {color: #fff;}
body{
background-image: url("back/blue_lobster1.jpg");
background-attachment: fixed;
background-repeat:no-repeat;
background-size:cover;
}
span{
    color: #fff;
}
.center {
    margin-top: 5%;
    margin-left: 5%;
    width: 85%;
    padding: 1em;
    border-radius: 8px;
    background: rgba(232, 245, 253, 0.9);
    box-shadow: 0px 0px 8px 8px lightgrey;
}
h2{color: #0066ff;}
.btn-primary{ 
    float: right;
    color: #007bff;
    background-color: #fff;
    border-color: #fff;
    font-weight: bold;
    margin-left: -300px;
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
                        <i class='bx bx-grid-alt nav_icon' title="Dashboard"></i> 
                        <span class="nav_name">Dashboard</span> 
                    </a> 
                        <a href="admin_listuser.php" class="nav_link"> 
                        <i class='bx bx-user nav_icon' title="Users"></i> 
                        <span class="nav_name">Users</span> 
                    </a> 
                    <a href="admin_customer_lists.php" class="nav_link"> 
                        <i class='fas fa-users fa-sm nav_icon' style="margin-left: 1px;" title="Customer List"> </i> 
                        <span class="nav_name">Customer</span> 
                    </a>
                    <a href="admin_size_detail.php" class="nav_link"> 
                        <i class='bx bx-sitemap nav_icon' title="Size Category"></i> 
                        <span class="nav_name">Inventory</span> 
                    </a>
                    <a href="sales_graph.php" class="nav_link active"> 
                        <i class='bx bx-bar-chart-alt-2 nav_icon' title="Sales Graph"></i> 
                        <span class="nav_name">Sales Graph</span> 
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
    p{ text-align: left; font-weight: bold; color: green; margin-top: -0.7em;}
</style>

<div class="center">
    <div style="text-align:center; width: 80%; margin: auto;">
        <form method="POST">
            <h2 class="page-header">Price Chart 
                <a href="sales_graph.php" class="btn btn-primary">
                    <i class="fas fa-chart-bar"></i> Quantity Chart
                </a>
            </h2>
        </form>
        <div style="float: left; margin-bottom: 1em; font-weight: bold;">Price (Rp.) </div>
        <canvas id="chartjs_bar"></canvas>
        <div style="font-weight: bold;">Size by Inch </div><hr>
        <p> <?php echo "Current Date: " .$currentDate. ""; ?> </p>
    </div>
</div>

</body>
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
var ctx = document.getElementById("chartjs_bar").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels:<?php echo json_encode($size); ?>,
            datasets: [{
                borderColor: [
                    "#007bff"
                ],
                data:<?php echo json_encode($price); ?>,
            }]
        },
        options: {
            legend: {
            display: false,
        },
        scales: {
        yAxes: [{
          ticks: {
             fontSize: 14,
             fontFamily: "'Roboto', sans-serif",
             fontColor: '#000',
             fontStyle: '500'
      }
   }],
       xAxes: [{
          ticks: {
             fontSize: 14,
             fontFamily: "'Roboto', sans-serif",
             fontColor: '#000',
             fontStyle: '500'
      }
   }]
    }
    }
});
</script>

<style type="text/css">
.modal-content {
  width: 100%;
}
.modal-dialog {
  position: absolute;
  top: 15%;
  left: 35%;
}
.modal-content{
    background: rgba(28, 84, 169, 0.8);
}
.form-control {
    background-color: rgba(9, 95, 219, 0.7); 
    color: #fff;
    border: none;
    border-bottom: 1px solid #fff;
}
h5, h3, .fa-times { color: #fff; }
</style>