<?php
    session_start();
	include("../../includes/logout.php");
    include("../../includes/config.php");
    $user_check = $_SESSION['login_user'];
	$query1 = mysqli_query($connection, "SELECT * FROM tbluser WHERE username = '$user_check'");

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
    <title>Subjects</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
        <div class="container-fluid">
            <!-- COLLEGE LOGO -->
            <a class="navbar-brand p-0 m-0" href="#" id="nav-logo">
                
                <!-- Department -->
					<span id="department">
                    <?php 
						while($getseal = mysqli_fetch_array($query2))
						{
							$college_check = $getseal['id'];

							$getdata = mysqli_query($connection, "SELECT seal FROM tblcollege WHERE id ='$college_check'");

							while($fa = mysqli_fetch_array($getdata))
							{
								echo '<img class="rounded-circle p-0"  src="../../upload/'.$fa['seal'].'" alt="COLLEGE SEAL" width="32" height="32">';
							}
						}

						while($getcollege = mysqli_fetch_array($query1))
						{ 
							$college_check = $getcollege['collegeid'];

							$getdata = mysqli_query($connection,"SELECT college FROM tblcollege WHERE id='$college_check'");

							while($fa = mysqli_fetch_array($getdata))
							{
								echo "<span id='department'>  ".$fa['college']."</span>";
							}
						}							
					?> 
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
                    <li class="nav-item dropstart" id="desktop-notif">
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
                    <a id="icons" class="nav-link active py-0"  data-bs-toggle="modal" data-bs-target="#logoutmodal" aria-disabled="true"><i class="fas fa-sign-out-alt"></i><span class="nav-label"> Logout</span></a>
					</li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END OF NAVBAR -->

    <!-- MOBILE NOTIFICATION -->
    <div class="fixed-bottom m-3" id="mobile-notif">
        <button type="button" class="btn  btn-danger rounded-circle position-relative" data-bs-toggle="dropdown">
            <!-- BELL ICON -->
            <i id="icons" class="fas fa-bell"></i>
            <!-- NEW NOTIFICATION BADGE -->
            <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-info p-2"><span class="visually-hidden">unread messages</span></span>

        </button>
        
        <!-- NOTIFICATION CONTENT -->
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
    </div>
    <!-- MOBILE NOTIFICATION END -->


    <!-- TAB -->
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <a href="admin-curriculum.php" id="tab" class="btn my-4 text-danger fw-bold fs-2">Curriculum</a>
            </div>
            <div class="col text-center">
                <a href="admin-subjects.php" id="tab" class="btn btn-danger my-4 text-white fw-bold text-center fs-2">Subjects</a>
            </div>
            <div class="w-100"></div>
        </div>
    </div>
    <!-- TAB END -->

    <!-- YEAR AND SEMESTER -->
    <div class="container">
        <div class="row mb-3">
            <!-- Curriculum ID -->
            <div class="col-sm-3 mb-2 w-50" id="select-curriculum">
                <div class="container p-0 mb-3">
                    <label for="curriculumid" class="fs-20">Curriculum ID</label><br>
                    <select class="w-50" id="select-curriculum" name="curriculumid"  required>
                    <option selected>Select...</option>
                    <?php
                        $getcur = mysqli_query($connection,"SELECT * FROM tblcurriculum");
 
                        while($fa=mysqli_fetch_array($getcur))
                        {
                            echo "<option value='". $fa['id'] ."'>" . $fa['id'] ."</option>";  
                            // displaying data in option menu
                        }                 	
                    ?>
                    </select>			
                </div>
            </div>
        </div>
    </div>
    <!-- YEAR AND SEMESTER END -->

    <!-- Instructions 
    <center>
        <div class="container container-fluid" >
            <p class="text bg-light w-100 p-3" id="feedback">Click a subject to UPDATE or DELETE it.</p>
        </div>
    </center>
     Instructions End -->

    <div class="container text-center">
        <div class="row mb-3 ml-3">
            <div class="col-sm-3">
                <div class="form-check form-check-inline mb-2 ml-3">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1st Semester" checked>
                    <label class="form-check-label" for="inlineRadio1">1st Semester</label>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-check form-check-inline mb-2 ml-3">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="1st Semester"">
                    <label class="form-check-label" for="inlineRadio2">2nd Semester</label>
                </div>
            </div>
        </div>   
    </div>
    <!-- TABLE -->
    <div class="container p-2 container-fluid mb-3" >
        <div class="container overflow-auto" >
            <table class="table table-hover table-responsive table-striped table-bordered " id="table">
                <thead class="text-white">
                    <tr>
						<th >Subject Code</th>
						<th>Title</th>
						<th scope="col">Lec Hrs</th>
						<th scope="col">Lab Hrs</th>
						<th scope="col">Units</th>
						<th scope="col">Prerequisite</th>
					</tr>
                </thead>
                <tbody>
                    <tr onclick="window.location='#';" data-bs-toggle="modal" data-bs-target="#popup-manage-subject" style=" cursor: pointer; "/>
                                 
                    </tr>
                </tbody>
                <tfoot >	
                    <!-- table footer -->
                </tfoot>
            </table>
        </div>


        <!-- ADD CURRICULUM Toggle-->
        <center>
            <button type="button" class="btn rounded btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#addSubjects" id="add-subject">
                Add Subject
            </button>
        </center>
        
    </div>
    <!-- TABLE END -->

    <!-- ADD NEW SUBJECT POPUP -->
    <div class="container container-fluid">
        <div class="modal fade" id="addSubjects" tabindex="-1" aria-labelledby="addSubjectsLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="addSubjectsLabel">Create New Subject</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Inputs -->
						<form>
                            <div class="container p-0 mb-3" id="select-curriculumid">
								<label for="select-curriculumid" class="form-label">Curriculum ID</label>
								<select class="custom-select p-2 " required id="select-curriculumid">
									<option selected>Select...</option>
                                    <?php
                                        $getcur = mysqli_query($connection,"SELECT * FROM tblcurriculum");

                                        while($fa=mysqli_fetch_array($getcur))
                                        {
                                            echo "<option value='". $fa['id'] ."'>" . $fa['id'] ."</option>";  
                                            // displaying data in option menu
                                        }                 	
                                    ?>   
								</select>			
							</div>	

							<div class="mb-3">
								<label for="inputCode" class="form-label">Subject Code</label> 
								<input type="text" class="form-control" required id="inputCode" aria-describedby="emailHelp"> 
								<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
							</div>

							<div class="mb-3">
								<label for="inputTitle" class="form-label">Title</label>
								<input type="text" class="form-control" required id="inputTitle" >
							</div>

							<div class="mb-3">
								<label for="inputUnits" class="form-label">Units</label>
								<input type="number" class="form-control" required id="inputUnits" >
							</div>

                            <div class="container p-0 mb-3" id="select-prereq">
								<label for="select-prereq" class="form-label" >Prerequisite</label>
								<select class="custom-select p-2 " required id="select-prereq">
									<option selected>NONE</option>
									<option value="1">CC 100</option>
									<option value="2">CC 101</option>
								</select>			
							</div>		

							<!-- Course -->		
							<div class="container p-0 mb-3" id="select-course">
								<label for="select-course" class="form-label" >Course and Year</label>
								<select class="custom-select p-2 " required id="select-course">
									<option selected>Select Course...</option>
									<!-- FETCH COURSES FROM DATABASE -->
                                    <?php
                                        $id = $_SESSION['collegeid'];
                                        $getcollege = mysqli_query($connection,"SELECT * FROM tblcollege WHERE id='$id'");

                                        while($fa = mysqli_fetch_array($getcollege))
                                        {            
                                            $getcourse = mysqli_query($connection,"SELECT * FROM tblcourse WHERE collegeid='$id'");
                                            
                                            while($fa = mysqli_fetch_array($getcourse))
                                            {
                                                echo "<option value='". $fa['id'] ."'>" .$fa['course']." - ".$fa['yearlevels'] ."
                                                
                                                
                                                </option>";  
                                                // displaying data in option menu
                                            }
                                        }
                                    ?>
								</select>			
							</div>		

                            <div align="right">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-danger">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ADD SUBJECT END -->

    <!-- MANAGE SUBJECTS -->
    <div class="modal fade" id="popup-manage-subject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manage-subject" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="manage-curriculum">Manage Subject</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="container p-0 mb-3" id="select-curriculumID">
                        <label for="select-curriculumID" class="form-label">Curriculum ID</label>
                        <select class="custom-select p-2 " required id="select-curriculumID"> required
                            <option selected>Select...</option>
                            <option value="1">Curriculum1</option>
                            <option value="2">Curriculum2</option>
                        </select>			
                    </div>	

                    <div class="mb-3">
                        <label for="inputCode" class="form-label">Subject Code</label>
                        <input type="text" class="form-control" id="inputCode" aria-describedby="emailHelp">
                        <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                    </div>

                    <div class="mb-3">
                        <label for="inputTitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="inputTitle" >
                    </div>

                    <div class="mb-3">
                        <label for="inputUnits" class="form-label">Units</label>
                        <input type="number" class="form-control" id="inputUnits" >
                    </div>

                    <div class="container p-0 mb-3" id="select-prereq">
                        <label for="select-prereq" class="form-label" >Prerequisite</label>
                        <select class="custom-select p-2 " required id="select-prereq">
                            <option selected>NONE</option>
                            <option value="1">CC 100</option>
                            <option value="2">CC 101</option>
                        </select>			
                    </div>

                    <!-- Course -->		
                    <div class="container p-0 mb-3" id="select-course">
                        <label for="select-course" class="form-label" >Course and Year</label>
                        <select class="custom-select p-2 " id="select-course">
                            <option selected>Select Course...</option>
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
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- MANAGE SUBJECTS END -->

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