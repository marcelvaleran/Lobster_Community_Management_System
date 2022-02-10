<?php 
 
include 'config.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['user_id'];
$img_prof = $_SESSION['img_prof'];
$level = $_SESSION['level'];
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
                    <a href="admin_customer_lists.php" class="nav_link active"> 
                        <i class='fas fa-users fa-sm nav_icon' style="margin-left: 1px;" title="Customer List"> </i> 
                        <span class="nav_name">Customer</span> 
                    </a>
                    <a href="admin_size_detail.php" class="nav_link"> 
                        <i class='bx bx-sitemap nav_icon' title="Size Category"></i> 
                        <span class="nav_name">Inventory</span> 
                    </a>
                    <a href="sales_graph.php" class="nav_link"> 
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
            <h2 class="card-title"><i class="fas fa-tasks"></i><b> Customer Information Request</b></h2>
            
            <div style="overflow: hidden; margin-bottom: -1.7em; width: 70%; float: right; position: relative; z-index: 1;">
                <input type="text" class="form-control" style="float: right; width: 40%; background: transparent; color: #fff; border: 1px solid;" id="myInput" placeholder="Search..." title="Type in a name">
                <button onClick="window.location.reload();" class="btn btn-primary mr-1" title="Reload"><i class="fa fa-sync-alt fa-lg"></i></button>
            </div>
            <div class="table-responsive">

            <table class="table" id="views">
            <thead>
                <tr align='center'>
                    <th>No</th>
                    <th>Customer</th>
                    <th>ID Card</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Sub-District</th>
                    <th>Status</th>
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
                $sql = "SELECT * FROM customer WHERE request = 'Pending' OR request = 'Rejected' ";
                
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
                            $buyer_name = $row['cust_name'];
                            $id_card = $row['id_card'];
                            $phoneNo = $row['phoneNo'];
                            $email = $row['email'];
                            $address = $row['address'];
                            $post_code = $row['post_code'];
                            $subdistrict = $row['subdistrict'];
                            $create_date = $row['create_date'];
                            $request = $row['request'];
                            ?>
                            <tr align='center' style="background: transparent;">
                                <td><?php echo $sno;?></td>
                                <td><?php echo $buyer_name; ?></td>
                                <td><?php echo $id_card; ?></td>
                                <td><?php echo $phoneNo; ?></td>
                                <td><?php echo $email; ?></td>
                                <td><?php echo $subdistrict; ?></td>
                                <td style="color: orange;"><b><?php echo $request; ?></b></td>
                                <td>
            <a href="#" class="badge badge-primary" style="padding: 7px" data-toggle="modal" data-target="#editData<?php echo $row['cust_id']; ?>"><i class="fas fa-info-circle" title="Request Approval"></i></a>
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
$dateModified = date('m-d-Y');
$conn = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());

    //SQL QUERY to display tasks by list selected
    $sql = "SELECT * FROM customer";
    
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
                $buyer_name = $row['cust_name'];
                $id_card = $row['id_card'];
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
        <h3 class="modal-title"><i class="fas fa-id-card" title="View"></i> Customer Information Approval</h3>
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
                            <label for="lastname"><i class="fas fa-users mr-2"></i> Customer<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control bold" name="buyer_name2" value="<?php echo $buyer_name; ?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-id-card-alt mr-2"></i> ID Card<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control bold" name="id_card" value="<?php echo $id_card; ?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-phone mr-2"></i> Phone<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control bold" name="phoneNo2" value="<?php echo $phoneNo; ?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-envelope mr-2"></i> Email<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control bold" name="email2" value="<?php echo $email; ?>" readonly/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-map-marker-alt"></i> Sub-District<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" name="subdistrict2" value="<?php echo $subdistrict; ?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-paper-plane"></i> Zip Code<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" name="post_code2" value="<?php echo $post_code; ?>" readonly/>
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="fas fa-calendar-alt"></i> Date Modified</label>
                            <input type="text" class="form-control" name="create_date2" value="<?php echo $dateModified; ?>" readonly/>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-group" style="width: 100%;">
                            <label for="lastname"><i class="fas fa-map-marked-alt"></i> Address<span class="text-danger"> *</span></label>
                            <input type="text" class="form-control" name="address2" value="<?php echo $address; ?>" readonly/>
                        </div>
                    </div>
                     <div class="modal-footer">
                        <button name="approve" class="btn btn-success"><i class="fas fa-check"></i> Approve</button>
                        <button name="reject" class="btn btn-danger"><i class="fas fa-times"></i> Reject</button>
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
    if(isset($_POST['approve']))
    {
        include 'config.php';

        $cust_id2 = $_POST['cust_id'];
        $id_card = $_POST['id_card'];
        $request = "Approved";

        $duplicate = mysqli_query($conn,"SELECT * FROM customer WHERE id_card = $id_card AND request = 'Approved'");

        if (mysqli_num_rows($duplicate)>0) {
            echo "<script>alert('This customer data already exist!')</script>";
            echo "<script>
                    if ( window.history.replaceState ) {
                      window.history.replaceState( null, null, window.location.href );
                    }
                </script>";
        } 

        else {
        //Connect Database
        $conn3 = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());

        //CREATE SQL QUery to Update TAsk
        $sql3 = "UPDATE customer SET 
        request = '$request'
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
        
    }

    if(isset($_POST['reject']))
    {
        include 'config.php';

        $cust_id2 = $_POST['cust_id'];
        $request = "Rejected";
        
        //Connect Database
        $conn3 = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error());

        //CREATE SQL QUery to Update TAsk
        $sql3 = "UPDATE customer SET 
        request = '$request'
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