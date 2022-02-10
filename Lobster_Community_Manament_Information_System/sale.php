<?php 
 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$img_prof = $_SESSION['img_prof'];
$row = 0;
?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main5.css">  
    <link rel="stylesheet" href="css/buttons.css">  
    <link rel="stylesheet" href="css/sidebar4.css">
    <link rel="stylesheet" href="css/hover.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> 
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>View</title>
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
option {
        background-color: black;
        color: #fff;
    }
label, select {
        color: #fff;
        border: none;
        text-decoration: none;
    }
#sales_info {
        color: #fff;
        border: none;
        text-decoration: none;
    }
.btn-primary{background-color: #0d46d7; float: right; padding: 10.5px;}
span {
    color: #fff;
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
            <a style="color: #ffcf47;" title="Edit Profile" href="editprofile.php?id=<?php echo $user_id;?>">
                <?php echo"<b class=hover style=font-size:18px;>". $_SESSION['username'] . "</b>";?>        
            </a>
        </div>
</header>
<div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Menu</span> </a>
                <div class="nav_list"> 
                    <a href="view.php" class="nav_link"> 
                        <i class='bx bx-grid-alt nav_icon' title="Dashboard"></i> 
                        <span class="nav_name">Dashboard</span> 
                    </a> 
                    <a href="sale.php" class="nav_link active"> 
                        <i class='bx bx-clipboard nav_icon' title="Sales"></i> 
                        <span class="nav_name">Sales</span> 
                    </a> 
                    <a href="profile.php?id=<?php echo $user_id;?>" class="nav_link"> 
                        <i class='bx bx-user nav_icon' title="Profile"></i> 
                        <span class="nav_name">Profile</span> 
                    </a>
                    <a href="customer_lists.php" class="nav_link"> 
                        <i class='fas fa-users fa-sm nav_icon' style="margin-left: 1px;" title="Customer List"> </i> 
                        <span class="nav_name">Customer</span> 
                    </a>
                    <a href="sales_record.php" class="nav_link"> 
                        <i class='bx bx-food-menu nav_icon' title="Sales Record"></i> 
                        <span class="nav_name">Sales Record</span> 
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

<div class="page-content page-container" id="page-content">
<div style="padding: 3rem; margin-top: 2em;">
<div class="d-flex justify-content-center">
    <div class="col-lg-8 grid-margin stretch-card">
    <div style="border: 1px solid #fff; border-radius: 8px;">
         <div class="card" style="border-radius: 8px; background: rgba(45, 98, 245, 0.2);">
            <div class="card-body" style="background: rgba(45, 98, 245, 0.8);">
            <h2 class="card-title"><i class="fas fa-th-list"></i><b> Lobster Sale</b></h2>
            
            <div style="overflow: hidden; margin-bottom: -1.7em; width: 65%; float: right; position: relative; z-index: 1;">
                
                <select id="filter-sizee" class="filter form-select mr-2 ml-1" style="float: right; width: 25%; background: transparent; color: #fff;">
                    <option value="0">Show All - Inch</option>
                    <option value="1">1 Inch</option>
                    <option value="2">2 Inch</option>
                    <option value="3">3 Inch</option>
                    <option value="4">4 Inch</option>
                    <option value="5">5 Inch</option>
                    <option value="6">6 Inch</option>
                    <option value="7">7 Inch</option>
                    <option value="8">8 Inch</option>
                    <option value="9">9 Inch</option>
                    <option value="10">10 Inch</option>
                    <option value="11">11 Inch</option>
                    <option value="12">12 Inch</option>
                    <option value="13">13 Inch</option>
                    <option value="14">14 Inch</option>
                    <option value="15">15 Inch</option>
                    <option value="16">16 Inch</option>
                    <option value="17">17 Inch</option>
                    <option value="18">18 Inch</option>
                    <option value="19">19 Inch</option>
                    <option value="20">20 Inch</option>
                    <option value="21">21 Inch</option>
                    <option value="22">22 Inch</option>
                    <option value="23">23 Inch</option>
                    <option value="24">24 Inch</option>
                    <option value="25">25 Inch</option>
                    <option value="26">26 Inch</option>
                    <option value="27">27 Inch</option>
                    <option value="28">28 Inch</option>
                    <option value="29">29 Inch</option>
                    <option value="30">30 Inch</option>
                </select>
                <i class="fa fa-filter fa-2x float-right" style="margin: 3px; color: #fff;"></i>
                <a class="btn btn-primary mr-1" title="View Sales Record" href="sales_record.php"><i class="fa fa-info-circle fa-lg"></i></a>
            </div>
            <div class="table-responsive">

            <table class="table" id="sales">
            <thead>
                <tr align='center'>
                    <th>No</th>
                    <th>Pond Name</th>
                    <th>Allotment</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="myTable">
        <?php
            $server = "localhost";
            $user = "root";
            $pass = "";
            $database = "database";
            $conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());

                $sql = "SELECT * FROM information WHERE user_id=$user_id ";
                //Execute Query
                $res = mysqli_query($conn, $sql);
                $sno = 0;
                $sno = $sno + 1;
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
                            $pond_name = $row['pond_name'];
                            $allotment = $row['allotment'];
                            $size = $row['size'];
                            $quantity = $row['quantity'];
                            $date = $row['date'];
                            ?>
                                <tr align='center' style="background: transparent;">
                                    <td><?php echo $sno;?></td>
                                    <td><?php echo $pond_name; ?></td>
                                    <td><?php echo $allotment; ?></td>
                                    <td class="sizee" data-sizee="<?php echo $size;?>"><?php echo $size; ?></td>
                                    <td><?php echo $quantity; ?></td>
                                    <td>
                                    <?php if ($quantity <= 0) { ?> 
    <a class="badge badge-success" style="padding: 7px" onclick="return confirm('This stock is run out !')" href="transac.php?info_id=<?php echo $info_id; ?>" title="Add Transaction Data">Add Transaction </a>
                                <?php
                                    } else { 
                                    ?>
    <a class="badge badge-success" style="padding: 7px" href="transac.php?info_id=<?php echo $info_id; ?>" title="Add Transaction Data">Add Transaction </a>
                                   <?php 
                                  } 
                                ?>
                                    </td>
                                </tr>
                            
                            <?php
                            $sno++;
                        }
                    }
                    else
                    {
                        //NO Tasks on this list
                        ?>
                        
                        <tr align='center' style="background: transparent;">
                            <td>No Data</td>
                            <td>No Data</td>
                            <td>No Data</td>
                            <td>No Data</td>
                            <td>No Data</td>
                            <td>No Action</td>
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
    $('#sales').dataTable({
    "bPaginate": true,
    "searching": false,
    "ordering": true,
    "bLengthChange": true,
    "bFilter": true,
    "bInfo": true,
    "bAutoWidth": false });
} );
</script>
</body>