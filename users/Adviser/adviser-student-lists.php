<?php
	session_start();
	include("../../includes/logout.php");
	include("../../includes/config.php");

	$user_check = $_SESSION['login_user'];
	$query1 = mysqli_query($connection, "SELECT * FROM tblusers WHERE username = '$user_check'");

	$college_check = $_SESSION['collegeid'];

	$query2 = mysqli_query($connection, "SELECT * FROM tblcollege WHERE id = ' $college_check'");
	
   // Use select query 
?>

<?php

        $getdata=mysqli_query($connection,"SELECT * FROM tblnotification");

        while($data=mysqli_fetch_assoc($getdata))
        {
            $username = $data['accountID'];
            $firstname = $data['firstname'];
            $lastname = $data['lastname'];
            $email = $data['email'];
            $course = $data['course'];
            $year = $data['year'];
        } 
        $fullname = ucfirst($firstname).' '.ucfirst($lastname);
        $courseY = ucfirst($course).' '.ucfirst($year);  
?>
<?php
	if(isset($_POST['add'])){
      // username and password sent from form 
      $myadviser = "Adviser";
      $mydepartment = mysqli_real_escape_string($connection,$_POST['department']);
      
      $sql = "SELECT * FROM tbluser WHERE usertype = '$myadviser'and department = '$mydepartment'";
      $result = mysqli_query($connection,$sql);

      if(mysqli_num_rows($result) == 0){
      	while($request = mysqli_fetch_assoc($result)){

      	}
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- BOOTSTRAP -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.css" />
    <!-- OFFLINE BOOTSTRAP -->
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css" />

    <!-- fontawesome -->
    <link
        rel="stylesheet"
        href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../../bootstrap/fontawesome.min.css" />
    <!-- local css -->
    <link rel="stylesheet" href="../../css/style-adviser.css" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.css" />
    <title>Student Lists</title>
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
            <button
                class="navbar-toggler m-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span><i class="fas fa-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <!-- Profile -->
                    <li class="nav-item">
                        <a class="nav-link active py-0" aria-current="page" href="adviser-myprofile.php"><i id="icons" class="fas fa-user-tie"></i><span class="nav-label"> My Profile</span></a>
                    </li>
                    <!-- Home -->
                    <li class="nav-item">
                        <a class="nav-link active py-0" aria-current="page" href="adviser-homepage.php"><i id="icons" class="fas fa-home"></i><span class="nav-label"> Home</span></a>
                    </li>
                    <!-- notifications -->
                    <li class="nav-item dropstart">
                        <a class="nav-link dropstart active py-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i id="icons" class="fas fa-bell"></i><span class="badge rounded-pill bg-info text-white align-text-top" id="notif-number">3</span><span class="nav-label"> Notifications</span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a data-bs-toggle="modal" data-bs-target="#manage-request" class="dropdown-item" href="#">
                                    <span class="badge bg-success">Account</span>
                                    Student requested an account
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="adviser-view-grades.php">
                                    <span class="badge bg-primary">Grade</span>
                                    <span class="text fw-bold">Brigole</span> submitted his grade
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="adviser-view-grades.php">
                                    <span class="badge bg-primary">Grade</span>
                                    <span class="text fw-bold">Colao</span> submitted her grade
                                </a>
                            </li>
                            <!-- <li><hr class="dropdown-divider" /></li> -->
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
        <p class="text  mt-3 text-danger fw-bold text-center fs-2">Student Lists</p>
	</div>

    <!-- TABLE -->
    <div class="container p-2 container-fluid mb-3" >
        <div class="container overflow-auto" >
            <table class="table table-hover table-responsive table-striped table-bordered " id="table">
                <thead class=" text-white">
                    <tr>
						<th>Student Name</th>
						<th>Student ID</th>
                        <th>Course</th>
                        <th>Year/Section</th>
					</tr>
                </thead>
                <tbody>
                    <tr onclick="window.location='#';" data-bs-toggle="modal" data-bs-target="#popup-manage-student-account" style=" cursor: pointer; "/>
						<th scope="row">Brigole Jr., Joseph Faith</th>
						<td>BG201802015</td>
                        <td>BSCS</td>
                        <td>3B</td>
                    </tr>
                    <tr onclick="window.location='#';" data-bs-toggle="modal" data-bs-target="#popup-manage-student-account" style=" cursor: pointer; "/>
						<th scope="row">Desu,Tingkoy</th>
						<td>BG201802019</td>
                        <td>BSCS</td>
                        <td>3A</td>
                    </tr>
                </tbody>
                <tfoot >	
                    <!-- table footer -->
                </tfoot>
            </table>
        </div>


        <!-- ADD CURRICULUM Toggle-->
        <center>
            <button type="button" class="btn rounded-pill btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#addStudent" id="add-student-account">
                New Student Account
            </button>
        </center>
        
    </div>
    <!-- TABLE END -->

    <!-- ADD NEW student POPUP -->
    <div class="container container-fluid">
        <div class="modal fade" id="addStudent" tabindex="-1" aria-labelledby="addStudentLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="addStudentLabel">Add New Student Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Inputs -->
						<form>
                            <div class="mb-3">
								<label for="input-name" class="form-label">Name</label>
								<input type="text" class="form-control" id="input-name" aria-describedby="input-name-help" required>
								<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
							</div>

							<div class="mb-3">
								<label for="input-id" class="form-label">Student ID</label>
								<input type="text" class="form-control" id="input-id" required>
							</div>

                            <div class="mb-3">
                                <label for="input-email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="input-email" required>
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
								<label for="select-course" class="form-label" >Course & Year</label>
								<select class="custom-select p-2 " id="select-course" required>
									<option selected>Select Course & Year...</option>
                                    <option value="1">BSCS 1</option>
                                    <option value="2">BSCS 2</option>
                                    <option value="3">BSCS 3</option>
                                    <option value="3">BSCS 4</option>
                                    <option value="1">BSIT 1</option>
                                    <option value="2">BSIT 2</option>
                                    <option value="3">BSIT 3</option>
                                    <option value="3">BSIT 4</option>
								</select>			
							</div>			

                            <div align="right">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ADD Student END -->

    <!-- MANAGE Student -->
    <div class="modal fade" id="popup-manage-student-account" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manage-subject" aria-hidden="true">
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
                        <label for="input-id" class="form-label">Student ID</label>
                        <input type="text" class="form-control" id="input-id" required>
                    </div>

                    <div class="mb-3">
                        <label for="input-email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="input-email" required>
                    </div>

                    <!-- Course -->		
                    <div class="container p-0 mb-3" id="select-course">
                        <label for="select-course" class="form-label" >Course & Year</label>
                        <select class="custom-select p-2 " id="select-course" required>
                            <option selected>Select Course & Year...</option>
                            <option value="1">BSCS 1</option>
                            <option value="2">BSCS 2</option>
                            <option value="3">BSCS 3</option>
                            <option value="3">BSCS 4</option>
                            <option value="1">BSIT 1</option>
                            <option value="2">BSIT 2</option>
                            <option value="3">BSIT 3</option>
                            <option value="3">BSIT 4</option>
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
    <!-- MANAGE student END -->

    <!-- REQUEST POPUP -->
		<div class="container container-fluid">
			<div class="modal fade" id="manage-request" tabindex="-1" aria-labelledby="manage-requestLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title fw-bold" id="manage-requestLabel">Student Account Request</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>

						<div class="modal-body">
							<!-- Inputs -->
							<form action="addstudent.php" method="POST">
								<div class="mb-3">
									<label for="input-name" class="form-label">Full Name</label>
									<input type="text" class="form-control" id="input-name" aria-describedby="input-name-help" value="<?php echo $fullname;?>" readonly />
									<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
								</div>

								<div class="mb-3">
									<label for="input-id" class="form-label">Student ID</label>
									<input type="text" class="form-control" id="input-id" value="<?php echo $username; ?>" readonly />
								</div>

								<div class="mb-3">
									<label for="input-email" class="form-label">Email</label>
									<input type="email" class="form-control" id="input-email" value="<?php echo $email; ?>" readonly />
								</div>

								<div class="mb-3">
									<label for="input-advised" class="form-label">Course and Year</label>
									<input type="text" class="form-control" id="input-advised" value="<?php echo $courseY; ?>" readonly />
								</div>

								<div align="right">
									<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Decline</button>
									<button type="submit" class="btn btn-success">Approve</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- REQUEST END -->


    <!-- Option 2: Separate Popper and Bootstrap JS -->
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
		$('#table').DataTable();
	</script>
</body>
</html>