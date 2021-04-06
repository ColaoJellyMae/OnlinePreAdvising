<?php
  session_start();
  include("../../includes/logout.php");
  include("../../includes/config.php");
  $sql = mysqli_query($connection,"SELECT * FROM tblcourse");
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
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- DATATABLE -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.css"/>
    <!-- local css -->
    <link rel="stylesheet" href="../../css/style-superadmin.css" />
    
    <title>Courses</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
        <div class="container-fluid">
            <!-- ICS LOGO -->
            <a class="navbar-brand p-0 m-0" href="#" id="nav-logo">
                <img class="rounded-circle p-0" src="../../images/wmsu-seal.png" alt="WMSU SEAL" width="32" height="32" />
            </a>

            <!-- MOBILE TOGGLE -->
            <button class="navbar-toggler m-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fas fa-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <!-- Profile -->
                    <!-- <li class="nav-item">
                        <a class="nav-link active py-0" aria-current="page" href="superadmin-myprofile.html"><i id="icons" class="fas fa-user-tie"></i><span class="nav-label"> My Profile</span></a>
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

    <!-- TAB -->
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <a href="superadmin-departments.php" id="tab" class="btn  my-4 text-danger fw-bold fs-2">College Departments</a>
            </div>
            <div class="col text-center">
                <a href="superadmin-courses.php" id="tab" class="btn btn-danger my-4 text-white fw-bold text-center fs-2">Courses</a>
            </div>
            <div class="w-100"></div>
            
        </div>
    </div>
    <!-- TAB END -->
    
    <!-- TABLE -->
    <div class="container p-2 container-fluid mb-3" >
        <div class="container overflow-auto" >
            <table class="table table-hover table-responsive table-striped table-bordered " id="table1">
                <thead class="text-white">
                    <tr>
                        <th>CourseID#</th>
                        <th>Course Code</th>
                        <th>Course</th>
                        <th>Year Levels</th>
                        <th>College</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    while($fa = mysqli_fetch_array($sql))
                    {
                        echo "<tr onclick='window.location='#';' class='manage-course'/>";

                        echo "<td>".$fa['id']."</td>";
                        echo "<td scope='row'>".$fa['courseshort']."</td>";
                        echo "<td>".$fa['course']."</td>";
                        echo "<td>".$fa['yearlevels']."</td>";
                
                        $id = $fa['collegeid'];
                        $getcollege = mysqli_query($connection,"SELECT college FROM tblcollege where id='$id'");

                        while($fa = mysqli_fetch_array($getcollege))
                        {
                            echo "<td>".$fa['college']."</td>";
                        }
                        echo "</tr>" ;
                    }
                ?>                
                </tbody>
                <tfoot >	
                    <!-- table footer -->
                </tfoot>
            </table>
        </div>


        <!-- ADD Course Toggle-->
        <center>
            <button type="button" class="btn rounded-pill btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#addcourse" id="add-course">
                Add Course
            </button>
        </center>
        
    </div>
    <!-- TABLE END -->

    
    <!-- ADD NEW COURSE POPUP -->
    <div class="container container-fluid">
        <div class="modal fade" id="addcourse" tabindex="-1" aria-labelledby="addCourseLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="addCourseLabel">Add New Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Inputs -->
                        <form action="managecoursedata.php" method="POST">

                            <input type="hidden" name="id" id="id">

                            <div class="mb-3">
                                <label for="course" class="form-label">Course</label>
                                <input type="text" class="form-control" id="course" aria-describedby="input-sectionID-help" name="course" required>
                                <div id="emailHelp" class="form-text">Ex: Bachelor of Science in Computer Science (Please use proper casing)</div>
                            </div>

                            <div class="mb-3">
                                <label for="courseshort" class="form-label">Course Code or Shortcut</label>
                                <input type="text" class="form-control" id="courseshort" aria-describedby="input-sectionID-help" name="courseshort" required>
                                <div id="emailHelp" class="form-text">Ex: BSCS (Please use proper casing)</div>
                            </div>

                            <div class="container p-0 mb-3" id="select-yearlevels">
                                <label for="select-yearlevels" class="form-label" >Year Levels</label>
                                <select class="custom-select p-2 " id="select-year" name="yearlevels" required>
                                    <option selected>Select Year Levels..</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>		
                                <div id="emailHelp" class="form-text">Select many year levels the course has </div>	
                            </div>	


                            <div class="container p-0 mb-3" id="college">
                                <label for="college" class="form-label" >College</label>
                                <select class="custom-select p-2 " id="select-college" name="collegeid" required>
                                <option selected>Select College...</option>
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
                                <div id="emailHelp" class="form-text">Select a college department where it belongs</div>
                            </div>	


                            <div align="right">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" name="addcourse">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ADD NEW COURSE END -->

    <!-- COURSE MANAGE -->
    <div class="modal fade" id="popup-manage-course" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manage-course" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title fw-bold" id="manage-course">Manage Course</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Inputs -->
                <form action="managecoursedata.php" method="POST">
                    
                     <input type="hidden" name="id" id="courseid">

                    <div class="mb-3">
                        <label for="input-college" class="form-label">Course</label>
                        <input type="text" class="form-control" id="coursename" aria-describedby="input-sectionID-help" name="course" required>
                        <div id="emailHelp" class="form-text">Ex: Bachelor of Science in Computer Science (Please use proper casing)</div>
                    </div>

                    <div class="mb-3">
                        <label for="courseshort" class="form-label">Course Code or Shortcut</label>
                        <input type="text" class="form-control" id="coursecode" aria-describedby="input-sectionID-help" name="courseshort" required>
                        <div id="emailHelp" class="form-text">Ex: BSCS (Please use proper casing)</div>
                    </div>

                    <div class="container p-0 mb-3" id="select-yearlevels">
                        <label for="#select-yearlevels" class="form-label" >Year Levels</label>
                        <select class="custom-select p-2 " id="select-year" name="yearlevels" required>
                            <option selected>Select Year Levels..</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>		
                        <div id="emailHelp" class="form-text">Select many year levels the course has </div>	
                    </div>	


                    <div class="container p-0 mb-3" >
                        <label for="collegeid" class="form-label" >College</label>
                        <select class="custom-select p-2 " id="select-college" name="collegeid" required>
                            <option selected>Select College...</option>
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
                            
                        </select>			
                        <div id="emailHelp" class="form-text">Select a college department where it belongs</div>

                    </div>	

                    <div align="right">
                        <button type="submit" name="delete" class="btn btn-danger" >Delete</button>
                        <button type="submit" name="updatecourse" class="btn btn-success">Update</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- COURSE COLLEGE END -->
    
    

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
                $('.manage-course').on('click',function()
                {
                    $('#popup-manage-course').modal('show');

                        $tr= $(this).closest('tr');

                        var data = $tr.children('td').map(function(){
                            return $(this).text(); 
                        }).get();

                        console.log(data);

                        $('#courseid').val(data[0]);
                        $('#coursecode').val(data[1]);
                        $('#coursename').val(data[2]);
                        $('#select-year').val(data[3]);
                        $('#select-college').val(data[4]);
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