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
    <title>Subject Approval</title>
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
        
     <!-- TAB -->
     <div class="container">
        <div class="row">
            <div class="col text-center">
                <a href="adviser-submissions.php" id="tab" class="btn my-4 text-danger fw-bold fs-2">Grades Submissions</a>
            </div>
            <div class="col text-center">
                <a href="adviser-subject-approval.php" id="tab" class="btn btn-danger my-4 text-white fw-bold text-center fs-2">Subject Approval</a>
            </div>
            <div class="w-100"></div>
        </div>
    </div>
    <!-- TAB END -->


    <!-- TABLE -->
    <div class="container p-2 container-fluid mb-3" >
        <div class="container overflow-auto" >
            <table class="table table-hover table-responsive table-striped table-bordered " id="table">
                <thead class="text-white">
                    <tr>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Status</th> 
                    </tr>
                </thead>
                <tbody>
                    <tr onclick="window.location='adviser-view-subjects.php';" style=" cursor: pointer; "/>
                        <th scope="row">Brigole Jr., Joseph Faith H.</th>
                        <td>BSCS</td>
                        <td class="text text-primary">Pending</td>
                    </tr>
                    <tr onclick="window.location='adviser-view-subjects.php';" style=" cursor: pointer; "/>
                        <th scope="row">Desu, Tingkoy</th>
                        <td>BSCS</td>
                        <td class="text text-primary">Pending</td>
                    </tr>
                    <tr onclick="window.location='adviser-view-subjects.php';" style=" cursor: pointer; "/>
                        <th scope="row">Pueblo, Sandy</th>
                        <td>BSCS</td>
                        <td class="text text-success" >Subjects Loaded</td>
                    </tr>
                    <tr onclick="window.location='adviser-view-subjects.php';" style=" cursor: pointer; "/>
                        <th scope="row">Penduko, Pedro</th>
                        <td>BSCS</td>
                        <td class="text text-danger" >Declined</td>
                    </tr>
                </tbody>
                <tfoot >	
                    <!-- table footer -->
                </tfoot>
            </table>
        </div>

    </div>
    <!-- TABLE END -->

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