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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.css" />
    <!-- OFFLINE BOOTSTRAP -->
    <link rel="stylesheet" href="../../bootstrap/bootstrap.min.css" />

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../bootstrap/fontawesome.min.css">
    <!-- local css -->
    <link rel="stylesheet" href="../../css/style-adviser.css" />

    <title>Student Grade Submission</title>
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
                        <a class="nav-link active py-0" aria-current="page" href="adviser-myprofile.php"><i id="icons" class="fas fa-user-tie"></i><span class="nav-label"> My Profile</span></a>
                    </li>
                    <!-- Home -->
                    <li class="nav-item">
                        <a class="nav-link active py-0" aria-current="page" href="adviser-homepage.php"><i id="icons" class="fas fa-home"></i><span class="nav-label"> Home</span></a>
                    </li>
                    <!-- notifications -->
                    <li class="nav-item dropstart">
                        <a class="nav-link dropstart active py-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i id="icons" class="fas fa-bell"></i><span class="badge rounded-pill bg-info text-white align-text-top" id="notif-number">3</span><span class="nav-label"> Notifications</span> </a>
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
    
    <!-- CONTENT  -->
    <div class="container mt-3 mb-3 container-fluid">
        <!-- left side -->
        <form action="adviser-submissions.php">
            <div class="row ">
                <div class="col">
                    <div class="container">
                        <p class="text text-danger text-center fw-bold fs-2"> Student's Name <span class="text fw-normal">Grade</span></p>
                    </div>
                    <table class="table table-responsive table-bordered table-striped table-hover text-white mt-4 mb-3" id="tableStudentGrade">
                        <thead>
                            <th>Subject</th>
                            <th>Grades</th>
                        </thead>
                        <tbody class="table-light">
                            <tr>
                                <td>Information Management</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Calculus</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Physical Education</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Human and Computer Interaction</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Information Management</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Discrete Structures</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Euthenics</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Subject</td>
                                <td>2</td>
                            </tr>
                            <tr>
                                <td>Subject</td>
                                <td>2</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!--   right side   -->
                <div class="col-sm-3">
                    <div class="contaier mt-3">
                        <center>
                            <a href="../../grades-sample.pdf">
                                <img src="../../images/grades.png" class="img-thumbnail img-fluid rounded-3 w-50 mt-5 mb-1" id="proof" alt="grades" />
                            </a>
                            <br>
                            <label class=" mt-0 pt-0 mb-3 text-danger " for="proof">Click picture to view</label>
                            <br>

                            <!-- section -->
                            <label for="section" class="form-label">Desired Section:</label>
                            <div class="input-group mb-3 w-75 small">
                                <label class="input-group-text" for="inputGroupSelect01">A</label>
                                <select class="form-select" id="inputGroupSelect01">
                                    <option selected>Change...</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                </select>
                            </div>

                            <!-- comment -->
                            <div class="mb-1 w-75">
                                <label for="comment" class="form-label">Comment</label>
                                <textarea class="form-control form-control-sm" " id="comment" rows="2" required></textarea>
                            </div>
                            <br />

                            <!-- buttons -->
                            <div class="container" id="buttons">
                                
                                <a href="adviser-submissions.php" class="btn btn-success border-0 text-white mb-2 p-1 mx-0 w-75 text-white">Approve</a>
                                <input type="submit" class="btn btn-danger  border-0 mb-2 p-1 mx-0 w-75 text-white" value="Disapprove" />
                                <a  onclick="history.back()" class="btn w-75 bg-secondary border-0 text-white mb-2 p-1 mx-0">Cancel</a>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- CONTENT END -->

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
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
</body>
</html>