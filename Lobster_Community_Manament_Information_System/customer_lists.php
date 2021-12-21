<?php 
 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$img_prof = $_SESSION['img_prof'];
$dateModified = date('m-d-Y');
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main5.css">  
    <link rel="stylesheet" href="css/button3.css">  
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Customers List</title>
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
#views_info {
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
                    <a href="sale.php" class="nav_link"> 
                        <i class='bx bx-clipboard nav_icon' title="Sales"></i> 
                        <span class="nav_name">Sales</span> 
                    </a> 
                    <a href="profile.php?id=<?php echo $user_id;?>" class="nav_link"> 
                        <i class='bx bx-user nav_icon' title="Profile"></i> 
                        <span class="nav_name">Profile</span> 
                    </a> 
                    <a href="customer_lists.php" class="nav_link active"> 
                        <i class='fas fa-users fa-sm nav_icon' style="margin-left: 1px;" title="Customer List"> </i> 
                        <span class="nav_name">Customer</span> 
                    </a>
                    <a href="sales_record.php" class="nav_link"> 
                        <i class='bx bx-food-menu nav_icon' title="Sales Record"></i> 
                        <span class="nav_name">Sales Record</span> 
                    </a> 
                    <a href="view_pond.php" class="nav_link"> 
                        <i class='bx bx-archive nav_icon' title="Ponds"></i> 
                        <span class="nav_name">Ponds</span> 
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
.col-lg-8 {
        flex: 0 0 auto;
        width: 75%;
        max-width: 100%;
    }
tr{
    overflow-x: auto;
}
</style>

<div class="page-content page-container" id="page-content">
<div style="padding: 3rem; margin-top: 2em;">
<div class="d-flex justify-content-center">
    <div class="col-lg-8 grid-margin stretch-card">
    <div style="border: 1px solid #fff; border-radius: 8px;">
         <div class="card" style="border-radius: 8px; background: rgba(45, 98, 245, 0.2);">
            <div class="card-body" style="background: rgba(45, 98, 245, 0.8);">
            <h2 class="card-title"><i class="fas fa-th-list"></i><b> List of Customer</b></h2>
            
            <div style="overflow: hidden; margin-bottom: -1.7em; width: 70%; float: right; position: relative; z-index: 1;">
                <input type="text" class="form-control" style="float: right; width: 40%; background: transparent; color: #fff; border: 1px solid;" id="myInput" placeholder="Search..." title="Type in a name">
                <a class="btn btn-primary mr-1" title="New Customer Data" href="#" data-toggle="modal" data-target="#addData"><i class="fa fa-user-plus fa-lg"></i></a>
                <button onClick="window.location.reload();" class="btn btn-primary mr-1" title="Reload"><i class="fa fa-sync-alt fa-lg"></i></button>
            </div>
            <div class="table-responsive">

            <table class="table" id="views">
            <thead>
                <tr align='center'>
                    <th>No</th>
                    <th>Customer</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Sub-District</th>
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

                //SQL QUERY to display tasks by list selected
                $sql = "SELECT * FROM customer WHERE user_id6=$user_id";
                
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
                            $cust_id = $row['cust_id'];
                            $buyer_name = $row['buyer_name'];
                            $phoneNo = $row['phoneNo'];
                            $email = $row['email'];
                            $address = $row['address'];
                            $post_code = $row['post_code'];
                            $subdistrict = $row['subdistrict'];
                            $create_date = $row['create_date'];
                            ?>
                            <tr align='center' style="background: transparent;">
                                <td><?php echo $sno;?></td>
                                <td><?php echo $buyer_name; ?></td>
                                <td><?php echo $phoneNo; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $subdistrict; ?></td>
                                <td>
            <a href="#" class="badge badge-primary" style="padding: 7px" data-toggle="modal" data-target="#views<?php echo $row['cust_id']; ?>"><i class="fas fa-info-circle" title="View"></i></a>
            <a href="#" class="badge badge-success" style="padding: 7px" data-toggle="modal" data-target="#editData<?php echo $row['cust_id']; ?>"><i class="fas fa-pen" title="Edit"></i></a>
            <a class="badge badge-danger" style="padding: 7px" href="delete_cust.php?cust_id=<?php echo $cust_id; ?>" onclick="return confirm('Delete this customer ?')"><i class="fas fa-trash-alt" title="Delete"></i> </a>
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
    $('#views').dataTable({
    "bPaginate": true,
    "searching": false,
    "ordering": true,
    "bLengthChange": true,
    "bFilter": true,
    "bInfo": true,
    "bAutoWidth": false });
} );
</script>

<style type="text/css">
.modal-content {
  width: 155%;
}
.modal-dialog {
  position: absolute;
  top: 5%;
  left: 27%;
}
.modal-content{
    background: rgba(28, 84, 169, 0.8);
    border-radius: 10px;
}
.form-control[readonly] {
    background-color: rgba(9, 95, 219, 0.7); 
    color: #fff;
    border: none;
    border-bottom: 1px solid #fff;
}
.form-control {
    background-color: rgba(9, 95, 219, 0.7); 
    color: #fff;
    border: none;
    border-bottom: 1px solid #fff;
    font-weight: bold;
}
h5, h3, .fa-times { color: #fff; }
.btn-success:hover {background: green;}
</style>

<?php
$conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());

    //SQL QUERY to display tasks by list selected
    $sql = "SELECT * FROM customer WHERE user_id6=$user_id ";
    
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
                $cust_id = $row['cust_id'];
                $buyer_name = $row['buyer_name'];
                $phoneNo = $row['phoneNo'];
                $email = $row['email'];
                $address = $row['address'];
                $post_code = $row['post_code'];
                $subdistrict = $row['subdistrict'];
                $create_date = $row['create_date'];
                ?>
<div class="modal fade" id="views<?php echo $row['cust_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgba(9, 95, 219, 1); ">
        <h3 class="modal-title"><i class="fas fa-id-card" title="View"></i> Detail Customer Information</h3>
            <button type="button" class="close btn mr-1" data-dismiss="modal" aria-label="Close">
              <i class="fas fa-times fa-lg"></i>
            </button>
      </div>
      <div class="modal-body">
        <div class="container register">
    <div class="row">
        <div class="col-md-12 register-right">
            <div class="tab-content" id="myTabContent">
                    <form class="row register-form" >
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-users mr-2"></i> Customer</label>
                            <input type="text" class="form-control bold" value="<?php echo $buyer_name; ?>"readonly/>
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-phone mr-2"></i> Phone</label>
                            <input type="text" class="form-control bold" value="<?php echo $phoneNo; ?>"readonly/>
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-envelope mr-2"></i> Email</label>
                            <input type="text" class="form-control bold" value="<?php echo $email; ?>"readonly/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-map-marker-alt"></i> Sub-District</label>
                            <input type="text" class="form-control" value="<?php echo $subdistrict; ?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-paper-plane"></i> Zip Code</label>
                            <input type="text" class="form-control" value="<?php echo $post_code; ?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-calendar-alt"></i> Date Modified</label>
                            <input type="text" class="form-control" value="<?php echo $create_date; ?>" readonly/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group" style="width: 100%;">
                            <label for="lastname"><i class="fas fa-map-marked-alt"></i> Address</label>
                            <input type="text" class="form-control" value="<?php echo $address; ?>" readonly/>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
      </div>
    </div>
  </div>
</div>
<?php
                
        }
    }
}
?>

<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgba(9, 95, 219, 1); ">
        <h3 class="modal-title"><i class="fas fa-users" title="View"></i> New Customer Information</h3>
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
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-users mr-2"></i> Customer</label>
                            <input type="text" name="buyer_name" class="form-control bold" required />
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-phone mr-2"></i> Phone</label>
                            <input type="text" class="form-control bold" name="phoneNo" required />
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-envelope mr-2"></i> Email</label>
                            <input type="text" class="form-control bold" name="email" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-map-marker-alt"></i> Sub-District</label>
                            <input type="text" class="form-control" name="subdistrict" required />
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-paper-plane"></i> Zip Code</label>
                            <input type="text" class="form-control" name="post_code" required />
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-calendar-alt"></i> Date Modified</label>
                            <input type="text" name="create_date" class="form-control" value="<?php echo $dateModified; ?>" readonly />
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group" style="width: 100%;">
                            <label for="lastname"><i class="fas fa-map-marked-alt"></i> Address</label>
                            <input type="text" class="form-control" name="address" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button name="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
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
</body>
<?php 
if (isset($_POST['submit'])) {
    include 'config.php';

    $buyer_name = $_POST['buyer_name'];
    $phoneNo = $_POST['phoneNo'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $post_code = $_POST['post_code'];
    $subdistrict = $_POST['subdistrict'];
    $create_date = $_POST['create_date'];

    $sql2 = "INSERT INTO customer (user_id6, buyer_name, phoneNo, email, address, post_code, subdistrict, create_date)
            VALUES ('$user_id', '$buyer_name', '$phoneNo', '$email', '$address', '$post_code', '$subdistrict', '$create_date')";
    $result = mysqli_query($conn, $sql2);
    if ($result) { 
        echo "<script>window.location = 'customer_lists.php';</script>";
    } else {echo "<script>alert('Failed to add the data.')</script>";}
}
?>
<?php
$dateModified = date('m-d-Y');
$conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());

    //SQL QUERY to display tasks by list selected
    $sql = "SELECT * FROM customer WHERE user_id6=$user_id ";
    
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
                $cust_id = $row['cust_id'];
                $buyer_name = $row['buyer_name'];
                $phoneNo = $row['phoneNo'];
                $email = $row['email'];
                $address = $row['address'];
                $post_code = $row['post_code'];
                $subdistrict = $row['subdistrict'];
                $create_date = $row['create_date'];
                ?>
<div class="modal fade" id="editData<?php echo $row['cust_id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: rgba(9, 95, 219, 1); ">
        <h3 class="modal-title"><i class="fas fa-user-edit" title="View"></i> Edit Customer Information</h3>
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
                        <div class="col-md-6">
                        <input type="hidden" class="form-control bold" name="cust_id" value="<?php echo $cust_id; ?>"/>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-users mr-2"></i> Customer</label>
                            <input type="text" class="form-control bold" name="buyer_name2" value="<?php echo $buyer_name; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-phone mr-2"></i> Phone</label>
                            <input type="text" class="form-control bold" name="phoneNo2" value="<?php echo $phoneNo; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-envelope mr-2"></i> Email</label>
                            <input type="text" class="form-control bold" name="email2" value="<?php echo $email; ?>" required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-map-marker-alt"></i> Sub-District</label>
                            <input type="text" class="form-control" name="subdistrict2" value="<?php echo $subdistrict; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-paper-plane"></i> Zip Code</label>
                            <input type="text" class="form-control" name="post_code2" value="<?php echo $post_code; ?>" required/>
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-calendar-alt"></i> Date Modified</label>
                            <input type="text" class="form-control" name="create_date2" value="<?php echo $dateModified; ?>" readonly/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group" style="width: 100%;">
                            <label for="lastname"><i class="fas fa-map-marked-alt"></i> Address</label>
                            <input type="text" class="form-control" name="address2" value="<?php echo $address; ?>" required/>
                        </div>
                    </div>
                     <div class="modal-footer">
                        <button name="submitedit" class="btn btn-success"><i class="fas fa-edit"></i> Edit</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i> Close</button>
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
                
        }
    }
}
?>
<?php 
    if(isset($_POST['submitedit']))
    {
        include 'config.php';

        $cust_id2 = $_POST['cust_id'];
        $buyer_name2 = $_POST['buyer_name2'];
        $phoneNo2 = $_POST['phoneNo2'];
        $email2 = $_POST['email2'];
        $address2 = $_POST['address2'];
        $post_code2 = $_POST['post_code2'];
        $subdistrict2 = $_POST['subdistrict2'];
        $create_date2 = $_POST['create_date2'];
        
        //Connect Database
        $conn3 = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());

        //CREATE SQL QUery to Update TAsk
        $sql3 = "UPDATE customer SET 
        buyer_name = '$buyer_name2',
        phoneNo = '$phoneNo2',
        email = '$email2',
        address = '$address2',
        post_code = '$post_code2',
        subdistrict = '$subdistrict2',
        create_date = '$create_date2'
        WHERE 
        cust_id = $cust_id2
        ";
        
        //Execute Query
        $res3 = mysqli_query($conn3, $sql3);

        if($res3==true)
        {
            $_SESSION['update'] = "Updated Successfully.";
            echo "<script>window.history.back();</script>";
        }
        else {echo "<script>alert('Failed to add the data.')</script>";}
    }

?>