<?php
  include("../../includes/logout.php");
  $connection=mysqli_connect("localhost","root","","db2");
  $sql = mysqli_query($connection,"SELECT * FROM tbluser");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- DATATABLE -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.css"/>
    <!-- local css -->
    <link rel="stylesheet" href="../../css/style-superadmin.css" />
    
    <title>Admins</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
        <div class="container-fluid">
            <!-- ICS LOGO -->
            <a class="navbar-brand p-0 m-0" href="#" id="nav-logo">
                <img class="rounded-circle p-0" src="../../images/wmsu-seal.png" alt="WMSU SEAL" width="32" height="32" />
                <span id="department">Western Mindanao State University</span>
            </a>

            <!-- MOBILE TOGGLE -->
            <button class="navbar-toggler m-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fas fa-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <!-- Profile -->
                    <!-- <li class="nav-item">
                        <a class="nav-link active py-0" aria-current="page" href="superadmin-myprofile.php"><i id="icons" class="fas fa-user-tie"></i><span class="nav-label"> My Profile</span></a>
                    </li> -->
                    <!-- Home -->
                    <li class="nav-item">
                        <a class="nav-link active py-0" aria-current="page" href="superadmin-homepage.php"><i id="icons" class="fas fa-home"></i><span class="nav-label"> Home</span></a>
                    </li>
                    <!-- logout -->
                    <li class="nav-item">
							<a type="button" id="icons" class="nav-link active py-0" data-bs-toggle="modal" data-bs-target="#logoutmodal" aria-disabled="true"><i class="fas fa-sign-out-alt"></i><span class="nav-label"> Logout</span></a>
					</li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END OF NAVBAR -->


    <div class="container" >
        <p class="text  mt-3 text-danger fw-bold text-center fs-2">Department Admins</p>
	</div>
    
    <!-- TABLE -->
    <div class="container p-2 container-fluid mb-3" >
        <div class="container overflow-auto" >
            <table class="table table-hover table-responsive table-striped table-bordered " id="table1">
                <thead class="text-white">
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th>College Assigned</th>
                    </tr>
                </thead>
                <tbody>
                    <!--Php code for fetching data from database to view admin data-->
                    <?php
                        $getdata = mysqli_query($connection,"SELECT * FROM tblusers WHERE usertype='Admin'");
                        while($fa = mysqli_fetch_array($getdata)){

                            echo "<tr onclick='window.location='#';' class='manage-admin'/>";
                            echo "<td>".$fa['id']."</td>";
                            echo "<td>".$fa['username']."</td>";
                            echo "<td>".$fa['password']."</td>";
                            echo "<td>".$fa['usertype']."</td>";

                            $id = $fa['collegeid'];
                            $getcollege = mysqli_query($connection,"SELECT college FROM tblcollege where id='$id'");

                            while($fa = mysqli_fetch_array($getcollege))
                            {
                                echo "<td>".$fa['college']."</td>";
                            }
                            echo "</tr>" ;
                        }
                    ?>
                    <!--end php code-->
                   
                </tbody>
                <tfoot >	
                    <!-- table footer -->
                </tfoot>
            </table>
        </div>


        <!-- ADD Department Toggle-->
        <center>
            <button type="button" class="btn rounded-pill btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#addAdmin" id="add-section">
                Add New Admin
            </button>
        </center>
        
    </div>
    <!-- TABLE END -->

    
    <!-- ADD NEW ADMIN POPUP -->
    <div class="container container-fluid">
        <div class="modal fade" id="addAdmin" tabindex="-1" aria-labelledby="addAdminLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="addAdminLabel">Add New Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Inputs -->
                        <form action="manageadminsdata.php" method="POST">
							<div class="mb-3">
								<label for="input-id" class="form-label">Username</label>
								<input type="text" class="form-control" id="input-id" name="username" required>
							</div>

							<div class="mb-3">
								<label for="input-pass" class="form-label">Password</label>
								<input type="password" class="form-control" id="input-pass" name="password" required>
							</div>
							
							<div class="mb-3">
								<label for="input-pass2" class="form-label">Confirm Password</label>
								<input type="password" class="form-control" id="input-pass2" required>
							</div>

                            <!-- Usertype -->	
                            <div class="mb-3">
								<label for="usertype" class="form-label">Status</label>
								<input type="text" class="form-control" id="usertype" name="usertype" value="Admin" readonly>
							</div>	

							<!-- Deapartment -->		
							<div class="container p-0 mb-3" id="select-college">
								<label for="select-college" class="form-label" >Assigned To</label>
								<select class="custom-sel ect p-2 " id="select-college" name="collegeid" required>
									<option selected>Select College Department...</option>

                                    <!-- SELECT COLLEGES FROM DATABASE  -->
                                    <?php
                                         $sql2 = mysqli_query($connection, "SELECT * From tblcollege");  
                                         // Use select query 
          
                                       while($fa = mysqli_fetch_array($sql2))
                                        {
                                            echo "<option value='". $fa['id'] ."'>" . $fa['college'] ."</option>";  
                                            // displaying data in option menu
                                        }	
                                    ?>                        
								</select>	
							</div>		


                            <div align="right">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button  name="add" type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ADD NEW ADMIN END -->

    <!--MANAGE ADMIN ACCOUNTS -->
    <div class="modal fade" id="popup-manage-admin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manage-admin" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="manage-admin">Manage Curriculum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <!-- Inputs -->
                    <form action="manageadminsdata.php" method="POST">

                        <input type="hidden" name="id" id="id">
                        <div class="mb-3">
                            <label for="username"" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <!-- Deapartment -->		
                        <div class="container p-0 mb-3" id="select-college">
                            <label for="select-college" class="form-label" >Assigned To</label>
                            <select class="custom-sel ect p-2 " id="select-college" name="collegeid" required>
                                <option selected>Select College Department...</option>

                                <!-- SELECT COLLEGES FROM DATABASE  -->
                                <?php
                                    $sql2 = mysqli_query($connection, "SELECT * From tblcollege");  
                                    // Use select query 

                                while($fa = mysqli_fetch_array($sql2))
                                    {
                                        echo "<option value='". $fa['id'] ."'>" . $fa['college'] ."</option>";  
                                        // displaying data in option menu
                                    }	
                                ?>                            
                            </select>	
                        </div>		
                    <div align="right">
                        <button type="submit" name="delete" class="btn btn-danger"">Delete</button>
                        <button type="submit" name="update" class="btn btn-success">Update</button>
                    </div>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- MANAGE COLLEGE END -->


    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
      integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
      integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.js"></script>


    
    <script>
            $(document).ready(function()
            {
                $('.deletebtn').on('click',function()
                {
                    $('#deletemodal').modal('show');

                        $tr= $(this).closest('tr');

                        var data = $tr.children('td').map(function(){
                            return $(this).text(); 
                        }).get();

                        console.log(data);

                        $('#deleteid').val(data[0]);
                });
            });

    </script>

    <script>
            $(document).ready(function()
            {
                $('.manage-admin').on('click',function()
                {
                    $('#popup-manage-admin').modal('show');

                        $tr= $(this).closest('tr');

                        var data = $tr.children('td').map(function(){
                            return $(this).text(); 
                        }).get();

                        console.log(data);

                        $('#id').val(data[0]);
                        $('#username').val(data[1]);
                        $('#password').val(data[2]);
                });
            });

    </script>

    <script>
		$('#table1').DataTable();
	</script>

    <script>
		$('#table2').DataTable();
	</script>

</body>
</html>