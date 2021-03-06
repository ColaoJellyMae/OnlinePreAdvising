<?php
    session_start();
	include("../../includes/logout.php");
    include("../../includes/config.php");

    $user_check = $_SESSION['login_user'];
	$query1 = mysqli_query($connection, "SELECT * FROM tblusers WHERE username = '$user_check'");

	$college_check = $_SESSION['collegeid'];

	$query2 = mysqli_query($connection, "SELECT * FROM tblcollege WHERE id ='$college_check'");
	
   // Use select query 
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
    <link rel="stylesheet" href="../../css/style-admin.css" />
    <title>Advisers</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
        <div class="container-fluid">
            <!-- ICS LOGO -->
            <a class="navbar-brand p-0 m-0" href="#" id="nav-logo">
                <img class="rounded-circle p-0" src="../../images/ics-seal-250.png" alt="ICS SEAL" width="32" height="32" />
                <!-- Department -->
					<span id="department">Institute of Computer Studies</span>
            </a>

            <!-- MOBILE TOGGLE -->
            <button class="navbar-toggler m-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fas fa-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <!-- Profile -->
                    <li class="nav-item">
                        <a class="nav-link active py-0" aria-current="page" href="admin-myprofile.php"><i id="icons" class="fas fa-user-tie"></i><span class="nav-label"> My Profile</span></a>
                    </li>
                    <!-- Home -->
                    <li class="nav-item">
                        <a class="nav-link active py-0" aria-current="page" href="admin-homepage.php"><i id="icons" class="fas fa-home"></i><span class="nav-label"> Home</span></a>
                    </li>
                    <!-- notifications -->
                    <li class="nav-item dropstart">
                        <a class="nav-link dropstart active py-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i id="icons" class="fas fa-bell"></i><span class="badge rounded-pill bg-info text-white align-text-top" id="notif-number">4</span><span class="nav-label"> Notifications</span> </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a data-bs-toggle="modal" data-bs-target="#manage-request" class="dropdown-item" href="#"><span class="text fw-bold">Adviser One</span> requested an account</a>
                            </li>
                            <li>
                                <a data-bs-toggle="modal" data-bs-target="#manage-request" class="dropdown-item" href="#"><span class="text fw-bold">Adviser Two</span> requested an account</a>
                            </li>
                            <li>
                                <a data-bs-toggle="modal" data-bs-target="#manage-request" class="dropdown-item" href="#"><span class="text fw-bold">Adviser Three</span> requested an account</a>
                            </li>
                            
                        </ul>
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
        <p class="text  mt-3 text-danger fw-bold text-center fs-2">Adviser Lists</p>
	</div>

    <!-- TABLE -->
    <div class="container p-2 container-fluid mb-3" >
        <div class="container overflow-auto" >
            <table class="table table-hover table-responsive table-striped table-bordered " id="table">
                <thead class=" text-white">
                    <tr>
						<th>ID</th>
						<th>Username</th>
                        <th>Password</th>
                        <th>Status</th>
						<th scope="col">Advised to</th>
					</tr>
                </thead>
                <tbody>
                    <!--Php code for fetching data from database to view admin data-->
                    <?php
                        $getdata = mysqli_query($connection,"SELECT * FROM tblusers WHERE usertype='Adviser'");
                        while($fa = mysqli_fetch_array($getdata)){

                            echo "<tr onclick='window.location='#';' class='manage-admin'/>";
                            echo "<td>".$fa['id']."</td>";
                            echo "<td>".$fa['username']."</td>";
                            echo "<td>".$fa['password']."</td>";
                            echo "<td>".$fa['usertype']."</td>";

                            $id = $fa['courseid'];
                            $getcourse = mysqli_query($connection,"SELECT courseshort FROM tblcourse where id='$id'");

                            while($fa = mysqli_fetch_array($getcourse))
                            {
                                echo "<td>".$fa['courseshort']."</td>";
                            }
                            echo "</tr>" ;
                        }
                    ?>
                    <!--end php code--
                
                </tbody>
                <tfoot >	
                    <!-- table footer -->
                </tfoot>
            </table>
        </div>


        <!-- ADD CURRICULUM Toggle-->
        <center>
            <button type="button" class="btn rounded-pill btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#addAdviser" id="add-adviser-account">
                New Adviser Account
            </button>
        </center>
        
    </div>
    <!-- TABLE END -->

  
    
    <!-- ADD NEW ADVISER POPUP -->
    <div class="container container-fluid">
        <div class="modal fade" id="addAdviser" tabindex="-1" aria-labelledby="addAdviserLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="addAdviserLabel">Add New Adviser Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Inputs -->
						<form action="manageadvisersdata.php" method="POST">
                            <div class="mb-3">
								<label for="input-name" class="form-label">Username</label>
								<input type="text" class="form-control" id="input-name" aria-describedby="input-name-help" placeholder="Enter Username" name="username" required>
								<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
							</div>

							<div class="mb-3">
								<label for="input-pass" class="form-label">Password</label>
								<input type="password" class="form-control" id="input-pass" placeholder="Enter Password" name="password"required>
							</div>
							
							<div class="mb-3">
								<label for="input-pass2" class="form-label">Confirm Password</label>
								<input type="password" class="form-control" id="input-pass2" placeholder="Confirm Password" name="conpassword" required>
							</div>

                            <div class="mb-3">
								<label for="usertype" class="form-label">Status</label>
								<input type="text" class="form-control" name="usertype" value="Adviser" readonly>
							</div>

							<!-- Course -->		
							<div class="container p-0 mb-3" id="select-course">
								<label for="select-course" class="form-label" >Advised To</label>
								<select class="custom-select p-2 " name="courseid" id="select-course" required>
									<option selected>Select..</option>
                                    <!-- FETCH COURSES FROM DATABASE -->
                                    <?php
                                        $id = $_SESSION['collegeid'];
                                        $getcollege = mysqli_query($connection,"SELECT * FROM tblcollege WHERE id='$id'");

                                        while($fa = mysqli_fetch_array($getcollege))
                                        {            
                                            $getcourse = mysqli_query($connection,"SELECT * FROM tblcourse WHERE collegeid='$id'");
                                            
                                            while($fa = mysqli_fetch_array($getcourse))
                                            {
                                                echo "<option value='". $fa['id'] ."'>" . $fa['courseshort'] ."</option>";  
                                                // displaying data in option menu
                                            }
                                        }
                                    ?>  
								</select>			
							</div>	
                            <!--
                            <div class="row mb-3">
								<p class="mb-0">Year Level - Section</p>
								<div class="col">
									<input type="number" class="form-control" placeholder="Year Level" id="yearlevel" name="yearlevel">
								</div>
								<div class="col">
									<input type="text" class="form-control" placeholder="Section" id="section" name="section" >
								</div>                              
                            </div>
                               -->

                            <div align="right">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="add"class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ADD ADVISER END -->

    <!-- MANAGE Adviser -->
    <div class="modal fade" id="popup-manage-adviser-account" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manage-subject" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="manage-curriculum">Manage Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="input-name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="input-name" aria-describedby="input-name-help" required>
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>

                    <div class="mb-3">
                        <label for="input-id" class="form-label">Employee ID</label>
                        <input type="text" class="form-control" id="input-id" required>
                    </div>

                    <div class="mb-3">
                        <label for="input-pass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="input-pass" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="input-pass2" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="input-pass2" required>
                    </div>


                    <!-- Course -->		
                    <div class="container p-0 mb-3" id="select-course">
                        <label for="select-course" class="form-label" >Advised To</label>
                        <select class="custom-select p-2 " id="select-course" required>
                            <option selected>Select Course and Year...</option>
                            <option value="1">BSCS 1A</option>
                            <option value="1">BSCS 1B</option>
                            <option value="2">BSCS 2A</option>
                            <option value="2">BSCS 2B</option>
                            <option value="3">BSCS 3A</option>
                            <option value="3">BSCS 3B</option>
                            <option value="3">BSCS 4A</option>
                            <option value="3">BSCS 4B</option>
                            <option value="1">BSIT 1A</option>
                            <option value="1">BSIT 1B</option>
                            <option value="2">BSIT 2A</option>
                            <option value="2">BSIT 2B</option>
                            <option value="3">BSIT 3A</option>
                            <option value="3">BSIT 3B</option>
                            <option value="3">BSIT 4A</option>
                            <option value="3">BSIT 4B</option>
                        </select>			
                    </div>	

                    <div align="right">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- MANAGE ADVISER END -->


    <!-- REQUEST POPUP -->
		<div class="container container-fluid">
			<div class="modal fade" id="manage-request" tabindex="-1" aria-labelledby="manage-requestLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title fw-bold" id="manage-requestLabel">Adviser Account Request</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
	
						<div class="modal-body">
							<!-- Inputs -->
							<form>
								<div class="mb-3">
									<label for="input-name" class="form-label">Name</label>
									<input type="text" class="form-control" id="input-name" aria-describedby="input-name-help" 
										value="Juan Dela Cruz"
									readonly>
									<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
								</div>
	
								<div class="mb-3">
									<label for="input-id" class="form-label">Employee ID</label>
									<input type="text" class="form-control" id="input-id" 
										value="EMP3000"
									readonly>
								</div>

								<div class="mb-3">
									<label for="input-email" class="form-label">Email</label>
									<input type="email" class="form-control" id="input-email" 
										value="emp3000@wmsu.edu.ph"
									readonly>
								</div>

								<div class="mb-3">
									<label for="input-advised" class="form-label">Advised To</label>
									<input type="text" class="form-control" id="input-advised" 
										value="BSCS1A"
									readonly>
								</div>
	
								<div align="right">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Delete</button>
									<button type="submit" class="btn btn-success">Approve</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- REQUEST END -->

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
		$('#table').DataTable({
			initComplete: function () {
				this.api().columns().every( function(){
					var column = this;
					var select = $('<select><option value=""></option></select>')
					.appendTo( $(column.head()).empty() )
					.on( 'change', function () {
						var val = $.fn.DataTable.util.escapeRegex(
							$(this).val()
						);

						column
							.search( val ? '^'+val+'$' : '', true, false)
							.draw();
					});
					column.data().unique().sort().each( function (d,j) {
						select.append( '<option value="'+d+'">'+d+'</option>')
					});
				});
			}
		});
	</script>

</body>
</html>