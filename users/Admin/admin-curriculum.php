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
    
    <title>Curriculum</title>
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
                        <a id="icons" class="nav-link active py-0" data-bs-toggle="modal" data-bs-target="#logoutmodal" aria-disabled="true"><i class="fas fa-sign-out-alt"></i><span class="nav-label"> Logout</span></a>
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
                <a href="admin-curriculum.php" id="tab" class="btn btn-danger my-4 text-white fw-bold fs-2">Curriculum</a>
            </div>
            <div class="col text-center">
                <a href="admin-subjects.php" id="tab" class="btn my-4 text-danger fw-bold text-center fs-2">Subjects</a>
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
                        <th>Curriculum ID</th>
                        <th>CMO</th>
                        <th>Board Resolution</th>
                        <th>School Year</th>
                        <th>Course</th>
                    </tr>
                </thead>
                <tbody>
                    <!--Php code for fetching data from database to view curriculum data-->
                    <?php
                            $id = $_SESSION['collegeid'];

                            $getcur = mysqli_query($connection,"SELECT * FROM tblcurriculum WHERE collegeid='$id'");

                            while($fa = mysqli_fetch_array($getcur))
                            {
                                echo "<tr onclick='window.location='#';' class='manage-curriculum'/>";
                                echo "<td>".$fa['id']."</td>";
                                echo "<td>".$fa['CMO']."</td>";
                                echo "<td>".$fa['BoardResolution']."</td>";
                                echo "<td>".$fa['effectiveSYfrom']."-".$fa['effectiveSYto']."</td>";

                                $id = $fa['courseid'];
                                $getcourse = mysqli_query($connection,"SELECT course FROM tblcourse where id='$id'");

                                while($dis = mysqli_fetch_array($getcourse))
                                {
                                    echo "<td>".$dis['course']."</td>";
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


        <!-- ADD CURRICULUM Toggle-->
        <center>
            <button type="button" class="btn rounded-pill btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#addCurriculum" id="add-curriculum">
                Add Curriculum
            </button>
        </center>
        
    </div>
    <!-- TABLE END -->

  
    
    <!-- ADD NEW CURRICULUM POPUP -->
    <div class="container container-fluid">
        <div class="modal fade" id="addCurriculum" tabindex="-1" aria-labelledby="addCurriculumLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="addCurriculumLabel">Create New Curriculum</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Inputs -->

                        <form action="managecurriculumdata.php" method="POST">
                            <div class="mb-3">
                                <label for="cmo" class="form-label">CMO</label>
                                <span id="emailHelp" class="form-text">(CHED Memorandum Order)</span>
                                <input type="text" class="form-control" id="cmo" name="CMO" required>                            
                            </div>

                            <div class="mb-3">
                                <label for="board" class="form-label">Board Resolution</label>
                                <input type="text" class="form-control" id="board" name="BoardResolution" required>
                            </div>

                            <div class="row mb-3">
								<p class="mb-0">School Year</p>
								<div class="col">
									<input type="text" class="form-control" placeholder="From" id="SYfrom" name="SYfrom">
								</div>
								<div class="col">
									<input type="text" class="form-control" placeholder="To" id="SYto" name="SYto" >
								</div>
                                
                            </div>

                            <!-- Course -->		
                            <div class="container p-0 mb-3" id="select-course">
                                <label for="#select-course" class="form-label" >Course</label>
                                <select class="custom-select p-2 " id="select-course" name="courseid" required>
                                <option selected>Select Course for this Curriculum...</option>

                                <!-- FETCH COURSES FROM DATABASE -->
                                    <?php
                                        $id = $_SESSION['collegeid'];
                                        $getcollege = mysqli_query($connection,"SELECT * FROM tblcollege WHERE id='$id'");

                                        while($fa = mysqli_fetch_array($getcollege))
                                        {            
                                            $getcourse = mysqli_query($connection,"SELECT * FROM tblcourse WHERE collegeid='$id'");
                                            
                                            while($fa = mysqli_fetch_array($getcourse))
                                            {
                                                echo "<option value='". $fa['id'] ."'>" . $fa['course'] ."</option>";  
                                                // displaying data in option menu
                                            }
                                        }
                                    ?>  
                                </select>			
                            </div>		

                            <div align="right">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="add" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ADD CURRICULUM END -->

    <!-- MANAGE CURRICULUM (edit or delete) -->
    <div class="modal fade" id="popup-manage-curriculum" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manage-curriculum" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="manage-curriculum">Manage Curriculum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Inputs -->

                <form action="managecurriculumdata.php" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="id" id="id">

                        <label for="cmo" class="form-label">CMO</label>
                        <span id="emailHelp" class="form-text">(CHED Memorandum Order)</span>
                        <input type="text" class="form-control" id="cmo" name="CMO" required>
                        
                    </div>

                    <div class="mb-3">
                        <label for="#br" class="form-label">Board Resolution</label>
                        <input type="text" class="form-control" id="br" name="BoardResolution" required>
                    </div>

                    <div class="row mb-3">
                        <p class="mb-0">School Year</p>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="From" id="SYfrom" name="SYfrom">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="To" id="SYto" name="SYto" >
                        </div>
                        
                    </div>

                    <!-- Course -->		
                    <div class="container p-0 mb-3" id="select-course">
                        <label for="#select-course" class="form-label" >Course</label>
                        <select class="custom-select p-2 " id="select-course" name="course" required>
                        <option selected>Select Course for this Curriculum...</option>

                        <!-- FETCH COURSES FROM DATABASE -->
                            <?php
                                $college_check = $_SESSION['collegeid'];
                                $query3 = mysqli_query($connection, "SELECT * From tblcourse WHERE collegeid='$college_check'");  
                                // Use select query 

                                while($fa = mysqli_fetch_array($query3))
                                {
                                    echo "<option value='". $fa['course'] ."'>" . $fa['course'] ."</option>";  
                                    // displaying data in option menu
                                }	
                            ?>  
                        </select>			
                    </div>		

                    <div align="right">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="add" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- MANAGE CURRICULUM (edit or delete) END -->

    <!-- REQUEST POPUP -->
		<div class="container container-fluid">
			<div class="modal fade" id="manage-request" tabindex="-1" aria-labelledby="manage-requestLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title fw-bold" id="manage-requestLabel">MANAGE CURRICULUM (edit or delete) Request</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
	
						<div class="modal-body">
							<!-- Inputs -->
							<form>
								<div class="mb-3">
									<label for="name" class="form-label">Name</label>
									<input type="text" class="form-control" id="name" aria-describedby="name-help" 
										value="Juan Dela Cruz"
									readonly>
									<!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
								</div>
	
								<div class="mb-3">
									<label for="id" class="form-label">Employee ID</label>
									<input type="text" class="form-control" id="id" 
										value="EMP3000"
									readonly>
								</div>

								<div class="mb-3">
									<label for="email" class="form-label">Email</label>
									<input type="email" class="form-control" id="email" 
										value="emp3000@wmsu.edu.ph"
									readonly>
								</div>

								<div class="mb-3">
									<label for="advised" class="form-label">Advised To</label>
									<input type="text" class="form-control" id="advised" 
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
            $(document).ready(function()
            {
                $('.manage-curriculum').on('click',function()
                {
                    $('#popup-manage-curriculum').modal('show');

                        $tr= $(this).closest('tr');

                        var data = $tr.children('td').map(function(){
                            return $(this).text(); 
                        }).get();

                        console.log(data);

                        $('#curriculumID').val(data[0]);
                        $('#cmo').val(data[1]);
                        $('#br').val(data[2]);
                        $('#effectiveSY').val(data[3]); 
                        $('#select-course').val(data[4]);

                });
            });

    </script>

    <script>
		$('#table').DataTable();
	</script>

</body>
</html>