<?php 
 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$size_id_url = (isset($_GET['size_id']) ? $_GET['size_id'] : '');

$user_id = $_SESSION['user_id'];
$img_prof = $_SESSION['img_prof'];

?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main5.css">  
    <link rel="stylesheet" href="css/button3.css">  
    <link rel="stylesheet" href="css/sidebar4.css">
    <link rel="stylesheet" href="css/hover.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>View</title>
</head>

<style type="text/css">
    body{
    background-image: url("back/blue_lobster1.jpg");
    background-attachment: fixed;
    background-repeat:no-repeat;
    background-size:cover;
}
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
                    <a href="admin_view.php" class="nav_link"> 
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
                    <a href="admin_size_detail.php" class="nav_link active"> 
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
    a:hover, a, th, p{text-decoration: none; color: #ccfd09;}
    .col-lg-8 {
        flex: 0 0 auto;
        width: 90%;
        max-width: 100%;
    }
    .alignment {
        border-radius: 6px;
        text-align: center;
    }
    .btn-primary{background-color: #0d46d7; float: right; padding: 10.5px;}
    option {
        background-color: black;
        color: #fff;
    }
    label, select {
        color: #fff;
        border: none;
        text-decoration: none;
    }
#category_info {
        color: #fff;
        border: none;
        text-decoration: none;
    }
#category_length {margin-bottom: 10px;}
.btncategory {
  border: none;
  padding: 7px 18px;
  text-align: center;
  text-decoration: none;
  transition-duration: 0.4s;
  cursor: pointer;
}
.button3 {
  background: transparent; 
  color: white; 
  border: 2px solid #f44336;
  border-radius: 5px;
}

.button3:hover {
  background-color: rgba(45, 98, 245, 0.8);
  color: white;
}
.total {
  background: transparent;
  color: #ffcf47;
  padding: 6px;
}
.total:hover {
  background: #b70000;
  color: white;
  padding: 7px;
  border-radius: 5px;
  transition: 0.3s;
}
</style>

<div class="page-content page-container" id="page-content">
<div class="padding" style="margin-top: 4em;">
<div class="d-flex justify-content-center">
    <div class="col-lg-8 grid-margin stretch-card">
        <div style="border: 1px solid #fff; border-radius: 8px;">
        <div class="card" style="border-radius: 8px; background: rgba(45, 98, 245, 0.2);">
            <div class="card-body" style="background: rgba(45, 98, 245, 0.8);">
            <h3 class="card-title" style="color: red;"><b>Size Category</b></h3>
            <div class="table-responsive">

            <table class="table">
            <thead>
            <tr align='center'>
            <?php
            $server = "localhost";
            $user = "root";
            $pass = "";
            $database = "database";
            $conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());

                //SQL QUERY to display tasks by list selected
                $sql = "SELECT * FROM listsize ";
                
                //Execute Query
                $res = mysqli_query($conn, $sql);

             if($res==true)
                {
                //Display the tasks based on list
                //Count the Rows
                $count_rows = mysqli_num_rows($res);
                
                //We have tasks on this list
                while($row=mysqli_fetch_assoc($res))
                {
                    $size_id = $row['size_id'];
                    $sizes = $row['sizes'];
                    ?>
        <th>
            <a class="btn btncategory button3" href="admin_size_category.php?size_id=<?php echo $size_id; ?>">
                <i class="fa fa-info-circle"></i> <?php echo $sizes; ?> Inch
            </a>
        </th>
            <?php
            }
        }
    ?>
        </tr>
    </thead>
    </table>
        </div>
        </div>
        </div>
    </div>
    </div>
    </div>
</div>
</div>

<div class="page-content page-container" id="page-content">
<div class="padding">
<div class="d-flex justify-content-center">
    <div class="col-lg-8 grid-margin stretch-card">
    <div style="border: 1px solid #fff; border-radius: 8px;">
         <div class="card" style="border-radius: 8px; background: rgba(45, 98, 245, 0.2);">
            <div class="card-body" style="background: rgba(45, 98, 245, 0.8);">
            <h2 class="card-title"><b>Detail Information</b></h2>

            
            
            <div class="table-responsive">
            <table class="table" id="category">
            <thead>
                <tr align='center'>
                    <th>S.No</th>
                    <th>Username</th>
                    <th>Allotment</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody id="myTable">
        <?php
            $server = "localhost";
            $user = "root";
            $pass = "";
            $database = "database";
            $conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());

                //SQL QUERY to display tasks by list selected
                $sql = "SELECT * FROM information WHERE size_id=$size_id_url ORDER BY info_id ASC";
                
                //Execute Query
                $res = mysqli_query($conn, $sql);
                $sno = $row + 1;
             if($res==true)
                {
                    //Display the tasks based on list
                    //Count the Rows
                    $count_rows = mysqli_num_rows($res);
                    
                    if($count_rows>0)
                    {
                        //We have data on this list
                        $qty= 0;
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $qty += $row['difficulty'];
                            $info_id = $row['info_id'];
                            $task_name = $row['task_name'];
                            $description = $row['description'];
                            $difficulty = $row['difficulty'];
                            $date = $row['date'];
                            $username = $row['nameuser'];
                            ?>
                                <tr align='center' style="background: transparent;">
                                    <td><?php echo $sno;?></td>
                                    <td><?php echo $username;?></td>
                                    <td class="sizee" data-sizee="<?php echo $task_name;?>"><?php echo $task_name;?></td>
                                    <td><?php echo $description;?> Inch</td>
                                    <td><?php echo $difficulty;?></td>
                                    <td><?php echo $date;?></td>
                                </tr>
                            <?php
                            $sno++;
                        }?>
                        <div style="width: 100%; float: left;">
                            <div class="total" style="width: 12%;">
                                <h6 class="card-text ml-2">Size: <?php echo $description;?> Inch</h6>
                                <h6 class="card-text ml-2">Total: <?php echo $qty; ?></h6>
                            </div>
                            <div style="overflow: hidden; margin-bottom: -1.7em; width: 55%; float: right; position: relative; z-index: 1;">
                                <input type="text" class="form-control" style="float: right; width: 50%; background: transparent; color: #fff;" id="myInput" placeholder="Search...">
                                <select id="filter-sizee" class="filter form-select mr-2 ml-1" style="float: right; width: 21%; background: transparent; color: #fff;">
                                    <option value="0">Display All</option>
                                    <option value="Consumption">Consumption</option>
                                    <option value="Ornamental">Ornamental</option>
                                </select>
                                <i class="fa fa-filter fa-2x float-right" style="margin: 3px; color: #fff;"></i>
                                <a class="btn btn-primary mr-1" title="New Data" href="admin_add.php"><i class="fa fa-plus fa-lg"></i></a>
                            </div>
                        </div>
                        <?php
                    }
                    else
                    {
                        $description = "None";
                        $qty= 0;
                        ?>
                         <div style="width: 100%; float: left;">
                            <div class="total" style="width: 12%;">
                                <h6 class="card-text ml-2">Size: <?php echo $description;?></h6>
                                <h6 class="card-text ml-2">Total: <?php echo $qty; ?></h6>
                            </div>
                            <div style="overflow: hidden; margin-bottom: -1.7em; width: 55%; float: right; position: relative; z-index: 1;">
                                <input type="text" class="form-control" style="float: right; width: 50%; background: transparent; color: #fff;" id="myInput" placeholder="Search...">
                                <select id="filter-sizee" class="filter form-select mr-2 ml-1" style="float: right; width: 21%; background: transparent; color: #fff;">
                                    <option value="0">Display All</option>
                                    <option value="Consumption">Consumption</option>
                                    <option value="Ornamental">Ornamental</option>
                                </select>
                                <i class="fa fa-filter fa-2x float-right" style="margin: 3px; color: #fff;"></i>
                                <a class="btn btn-primary mr-1" title="New Data" href="admin_add.php"><i class="fa fa-plus fa-lg"></i></a>
                            </div>
                        </div>
                        <tr align='center' style="background: transparent;">
                            <td>No Data</td>
                            <td>No Data</td>
                            <td>No Data</td>
                            <td>No Data</td>
                            <td>No Data</td>
                            <td>No Data</td>
                        </tr>
                        
                        <?php
                    }
                }
            ?>
            </tbody>
            </table>
            <script>
                $(document).ready(function(){
                  $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                  });
                });
            </script>
            <script type="text/javascript">
                $('.filter').change(function(){
                  filter_function();
                  //calling filter function each select box value change
                });

                $('table tbody tr').show(); //intially all rows will be shown

                function filter_function(){
                  $('table tbody tr').hide(); //hide all rows
                  
                  var contactFlag = 0;
                  var contactValue = $('#filter-sizee').val();
                  //setting intial values and flags needed
                  
                 //traversing each row one by one
                  $('table tr').each(function() {  
                    
                    if(contactValue == 0){
                        contactFlag = 1;
                    }
                    else if(contactValue == $(this).find('td.sizee').data('sizee')){
                        contactFlag = 1;
                    }
                    else{
                        contactFlag = 0;
                    }
                 
                   if(contactFlag){
                     $(this).show();  //displaying row which satisfies all conditions
                   }
                });
                }
            </script>
            </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready( function () {
    $('#category').dataTable({
    "bPaginate": true,
    "searching": false,
    "bLengthChange": true,
    "bFilter": true,
    "bInfo": true,
    "bAutoWidth": false });
} );
</script>
</body>