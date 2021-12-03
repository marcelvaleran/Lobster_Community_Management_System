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
         $sql ="SELECT * FROM sales_size";
         $result = mysqli_query($conn,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $size[]  = $row['size'];
            $sold[] = $row['sold'];
        }
 }

$sql2 = "SELECT * FROM range_date";
$res2 = mysqli_query($conn, $sql2);
while($row2=mysqli_fetch_assoc($res2))
{
    $dateReset = $row2['reset_date_qty'];
}
$currentDate = date('F j, Y');
 /*$totalDays = (strtotime($currentDate) - strtotime($resetDate)) / (60 * 60 * 24);*/
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/sidebar4.css">
    <link rel="stylesheet" href="css/hover.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> 
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
                    <a href="admin_data.php" class="nav_link"> 
                        <i class='bx bx-file nav_icon' title="Lobster Information"></i> 
                        <span class="nav_name">Lobster Information</span> 
                    </a> 
                    <a href="admin_sale.php" class="nav_link"> 
                        <i class='bx bx-clipboard nav_icon' title="Sales"></i> 
                        <span class="nav_name">Sales</span> 
                    </a>
                    <a href="admin_customer_lists.php" class="nav_link"> 
                        <i class='fas fa-users fa-sm nav_icon' style="margin-left: 1px;" title="Customer List"> </i> 
                        <span class="nav_name">Customer</span> 
                    </a>
                    <a href="admin_sales_record.php" class="nav_link"> 
                        <i class='bx bx-food-menu nav_icon' title="Sales Record"></i> 
                        <span class="nav_name">Sales Record</span> 
                    </a>
                    <a href="admin_view_pond.php" class="nav_link"> 
                        <i class='bx bx-archive nav_icon' title="Ponds"></i> 
                        <span class="nav_name">Ponds</span> 
                    </a>
                    <a href="admin_size_detail.php" class="nav_link"> 
                        <i class='bx bx-sitemap nav_icon' title="Size Category"></i> 
                        <span class="nav_name">Size Category</span> 
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
            <h2 class="page-header">Quantity Chart 
                <a href="sales_graph_price.php" class="btn btn-primary">
                    <i class="fas fa-chart-line"></i> Price Chart
                </a>
                <a href="#" data-toggle="modal" data-target="#reset" class="btn btn-primary" style="margin-right: 9em;">
                    <i class="fas fa-sync"></i> Reset
                </a>
            </h2>
        </form>
        <div style="float: left; margin-bottom: 1em; font-weight: bold;">Quantity Sold </div>
        <canvas id="chartjs_bar"></canvas>
        <div style="font-weight: bold;">Size by Inch </div><hr>
        <p> <?php echo "Reset Date: " .$dateReset. ""; ?> </p>
        <p style="float: right; margin-top: -40px;"> <?php echo "Current Date: " .$currentDate. ""; ?> </p>
    </div>
</div>

</body>
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
var ctx = document.getElementById("chartjs_bar").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:<?php echo json_encode($size); ?>,
            datasets: [{
                backgroundColor: [
                    "#5969ff",
                    "#ff407b",
                    "#25d5f2",
                    "#ffc750",
                    "#2ec551",
                    "#7040fa",
                    "#ff004e",
                    "#ff407b",
                    "#ffc750",
                    "#7040fa"
                ],
                data:<?php echo json_encode($sold); ?>,
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

<div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgba(9, 95, 219, 1); ">
        <h3 class="modal-title"><i class="fas fa-exclamation-circle" title="View"></i> Are You Sure ?</h3>
            <button type="button" class="close btn mr-1" data-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-lg"></i>
            </button>
      </div>
      <div class="modal-body">
        <div class="container register">
    <div class="row">
        <div class="col-md-12 register-right">
            <div class="tab-content" id="myTabContent">
                    <form action="" method="POST" class="row register-form" >
                        <div class="col-md">
                        <div class="form-group">
                            <label for="lastname" style="color: #fff; font-size: 18px;"><i class="fas fa-info-circle mr-2"></i>
                                All quantity will be reset to 0 (zero) in this chart
                                <span style="white-space: pre-line">
                                    Please type "CONFIRM" to proceed for data reset !
                                </span>
                            </label>
                        </div>
                        <div class="form-group">
                            <input type="text" name="confirmation" style="border: 1px solid #fff;" placeholder="Type 'CONFIRM' " class="form-control bold" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="submit" class="btn btn-success"><i class="fas fa-sync"></i> Reset</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Cancel</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
      
    </div>
  </div>
</div>
<?php 
    //Check if the button is clicked
    if(isset($_POST['submit']))
    {
        //echo "Clicked";
        //Get the VAlues from Form
        $sold = 0;
        $resetDatee = date('F j, Y');
        $confirmation = $_POST['confirmation'];

        $server = "localhost";
        $user = "root";
        $pass = "";
        $database = "database";
        
        //Connect Database
        $conn3 = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());
        
        if ($confirmation == "CONFIRM") {
        //CREATE SQL QUery to Update TAsk
        $sql3 = "UPDATE sales_size, range_date SET 
        sales_size.sold = '$sold',
        range_date.reset_date_qty = '$resetDatee'
        WHERE id = 5
        ";
        
        //Execute Query
        $res3 = mysqli_query($conn3, $sql3);
        
        //CHeck whether the Query Executed of Not
        if($res3==true)
        {
            //Query Executed and Task Updated
            $_SESSION['update'] = "Updated Successfully.";
            
            //Redirect to Home Page
            echo "<script>window.location = 'sales_graph.php'</script>";
        }
        else
        {
            //FAiled to Update Task
            $_SESSION['update_fail'] = "Failed to Update";
            
            //Redirect to this Page
            echo "<script>window.location = 'sales_graph.php'</script>";
        }

    } else {
        echo "<script>alert('Failed to reset the data. Please try again !')</script>";
    }
    }

?>