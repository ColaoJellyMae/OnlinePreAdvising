<?php
  session_start();
  include("../../includes/logout.php");
  include("../../includes/config.php");
  $sql = mysqli_query($connection,"SELECT * FROM  tblcollege");
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.css" />
    <!-- local css -->
    <link rel="stylesheet" href="../../css/style-superadmin.css" />

    <title>Departments</title>
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
                <a href="superadmin-departments.php" id="tab" class="btn btn-danger my-4 text-white fw-bold fs-2">College Departments</a>
            </div>
            <div class="col text-center">
                <a href="superadmin-courses.php" id="tab" class="btn my-4 text-danger fw-bold text-center fs-2">Courses</a>
            </div>
            <div class="w-100"></div>

        </div>
    </div>
    <!-- TAB END -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- ALERT MESSAGE-->
    <?php
            if(isset($_SESSION['status']) && $_SESSION['status'] != '' )
            {
                ?>
                <script>
                    swal({
                        title: "<?php echo $_SESSION['status'];?>",
                        //text: "You clicked the button!",
                        icon: ""<?php echo $_SESSION['status_code'];?>"",
                        button: "OK",
                    });
                </script>
                <?php
                unset($_SESSION['status']);
            }
        ?>
    <!-- ALERT MESSAGE-->

    <!-- TABLE -->
    <div class="container p-2 container-fluid mb-3">
        <div class="container overflow-auto">
            <table class="table table-hover table-responsive table-striped table-bordered " id="table1">
                <thead class="text-white">
                    <tr>
                        <th>ID #</th>
                        <th>College Code</th>
                        <th>College</th>
                        <th>Seal</th>
                    </tr>
                </thead>
                <tbody>
                     <!--Php code for fetching data from database to  view college Department-->
                        <!--Php code for fetching data from database to  view college Department-->
                    <?php
                        while($fa = mysqli_fetch_array($sql)){

                            echo "<tr onclick='window.location='#';' class='manage-department'/>";
                            echo "<td>".$fa['id']."</td>";
                            echo "<td scope='row'>".$fa['collegeshort']."</td>";
                            echo "<td>".$fa['college']."</td>";
                            echo '<td><img class="rounded-circle p-0" src="../../upload/'.$fa['seal'].'" alt="COLLEGE SEAL" width="32" height="32"></td>';

                             echo "</tr>";
                        }
                    ?>
                </tbody>
                <tfoot>
                    <!-- table footer -->
                </tfoot>
            </table>
        </div>


        <!-- ADD Department Toggle-->
        <center>
            <button type="button" class="btn  rounded-pill btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#addDep" id="add-college">
                Add Department
            </button>
        </center>

    </div>
    <!-- TABLE END -->


    <!-- ADD NEW DEPARTMENT POPUP -->
    <div class="container container-fluid">
        <div class="modal fade" id="addDep" tabindex="-1" aria-labelledby="addDepLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="addDepLabel">Add New Department</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- Inputs -->
                        <form action="managecollegedata.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id">
                            <div class="mb-3">
                                <label for="collegename" class="form-label">College</label>
                                <input type="text" class="form-control" id="college" aria-describedby="collegeID-help" name="collegename" required>
                                <div id="emailHelp" class="form-text">Ex: College of Liberal Arts (Please use proper casing)</div>
                            </div>

                            <div class="mb-3">
                                <label for="collegeshort" class="form-label">College Code or Shortcut</label>
                                <input type="text" class="form-control" id="collegeID" aria-describedby="collegeID-help" name="collegeshort" required>
                                <div id="emailHelp" class="form-text">Ex: CLA (Please use proper casing)</div>
                            </div>

                            <div class="mb-3">
                                <label for="seal" class="form-label">College Seal</label>
                                <input type="file" class="form-control" id="seal" aria-describedby="collegeID-help" name="seal" required>
                            </div>

                            <div align="right">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary" name="add">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- EDIT OR DELETE DEPARTMENT END -->

   <!-- COLLEGE MANAGE(update or delete) -->
   <div class="modal fade" id="popup-manage-department" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="manage-department" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content ">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="manage-department">Manage College</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Edit Inputs -->
                        <form action="managecollegedata.php" method="POST">

                            <input type="hidden" name="id" id="collegeid">

                            <div class="mb-3">
                                <label for=collegename" class="form-label">College</label>
                                <input type="text" class="form-control" aria-describedby="input-sectionID-help" name="collegename" id="collegename" required>
                                <div id="emailHelp" class="form-text">Ex: College of Liberal Arts (Please use proper casing)</div>
                            </div>

                            <div class="mb-3">
                                <label for="collegeshort" class="form-label">College Code or Shortcut</label>
                                <input type="text" class="form-control" aria-describedby="input-sectionID-help" name="collegeshort" id="collegeshort" required>
                                <div id="emailHelp" class="form-text">Ex: CLA (Please use proper casing)</div>
                            </div>

                            <div class="mb-3">
                                <label for="collegeseal" class="form-label">College Seal</label>
                                <input type="file" class="form-control" aria-describedby="input-sectionID-help" name="collegeseal" id="collegeseal">
                            </div>

                            <div align="right">
                                <button type="submit" class="btn btn-danger" name="delete" >Delete</button>
                                <button type="submit" class="btn btn-success" name="update">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- MANAGE COLLEGE END -->
        
        <!-- DELETE MODAL-->
		<div class="container container-fluid">
        <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="deletemodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="managecollegedata.php" method="POST">
                        <center>
                            <input type="hidden" name="id" id="deleteid">

                            <div class="modal-body">
                            Are you sure you want to delete this College Department?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="submit" name="delete" class="btn btn-danger">Yes</button>
                            </div>                     
                        </center>
                    </form>
                </div>
            </div>
        </div>
	<!--END OF DELETE MODAL-->


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
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
                $('.manage-department').on('click',function()
                {
                    $('#popup-manage-department').modal('show');

                        $tr= $(this).closest('tr');

                        var data = $tr.children('td').map(function(){
                            return $(this).text(); 
                        }).get();

                        console.log(data);

                        $('#collegeid').val(data[0]);
                        $('#collegeshort').val(data[1]);
                        $('#collegename').val(data[2]);
                        $('#collegeseal').val(data[3]);
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