<?php
	session_start();
    include("../includes/config.php");
     
    $user_check = $_SESSION['login_user'];
	$query1 = mysqli_query($connection, "SELECT * FROM tbluser WHERE email = '$user_check'");

    while($fa = mysqli_fetch_array($query1))
    {
        $detected = $fa['college_id_fk'];
    }
	$query2 = mysqli_query($connection, "SELECT * FROM tblcourse WHERE college_id_fk = '$detected'");

    while($fa = mysqli_fetch_array($query2))
    {
        $detectedcourse = $fa['id'];
        $coursename = $fa['course'];
    }
   // Use select query 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.css" />
    

    <!-- fontawesome -->
    <link
        rel="stylesheet"
        href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../bootstrap/fontawesome.min.css" />
    <!-- local css -->
    <link rel="stylesheet" href="../css/style-student.css" />

    <title>Submit Grade</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
        <div class="container-fluid">
            <!-- COLLEGE LOGO/SEAL -->
				<a class="navbar-brand p-0 m-0" href="#" id="nav-logo">
					<?php 
                        $getdata = mysqli_query($connection,"SELECT * FROM tblcollege WHERE id='$detected'");

                        if(mysqli_num_rows($getdata) > 0 )
                        {
                            $fa = mysqli_fetch_array($getdata);
                            $boom = $fa['seal'];
                            echo "<span id='department'>  "."<img style='width: 2rem; height: 2rem; margin-right: 10px;' src='../upload/$boom'>".$fa['college']."</span>";
                        }
											
					?> 
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
                    <!-- logout -->
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Logout">
                        <a id="icons" class="nav-link active py-0" href="../../signin/universal-signin.php" aria-disabled="true"><i class="fas fa-sign-out-alt"></i><span class="nav-label"> Logout</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END OF NAVBAR -->

    <!-- CONTENT -->
    <div class="container container-fluid overflow-auto" id="desktop-view">
    <form action="managegradesubmissions.php" method="POST" enctype="multipart/form-data">
         <h2 class="text fw-bold text-center mt-4 text-danger">Grades Submission</h2>
        <!-- <h4 class="text-center fw-light">via Manual Input</h4> -->

        <!-- Choices -->
        <div class="container container-fluid p-3 mt-5">
            <div class="row">
                <!-- Manual Input -->
                <div class="col-sm-6 ">
                    <div class="choice container container-fluid p-3 rounded " style="height: 100%;" >
                       <h4 class="text fw-bold text-center mt-4 mb-3">Submit your grades</h4>

                       <input type="hidden" name="studentid"> 
                       <input type="file" name="grades_file" class="bg-light form-control mb-3" required/>
                       
                    </div>
                </div>

                <div class="col-sm-1 mt-5">
                </div>
    
                <!-- MANUAL INPUT -->
                <div class="col-sm-5">
                    <div class="choice container container-fluid p-3 rounded "  style="height: 100%; margin-bottom: 50px;">
                       
                        <!-- POPUP HELP -->
                        <button type="button" class="btn  btn-secondary w-100 mb-2" data-bs-toggle="modal" data-bs-target="#help">
                            <span class="float-start"><i class="fas fa-question"></i></span> Help
                        </button>

                        <a onclick="history.back()" class="btn bg-secondary text-white w-100 mb-2">
                            <span class="float-start"><i class="fas fa-arrow-left"></i></span>Back
                        </a>
                        <button type="submit" name="submit-grade" class="btn w-100 btn-danger" >
                            <span class="float-start"><i class="fas fa-check"></i></span> Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container of Choices END-->


        <!-- HELP POPUP -->
        <div class="modal fade" id="help" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Help <p class="badge  bg-info rounded-circle">?</p></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        
                        <p>Download your grades from WMSU portal .<br> <br>
                            Not downloaded yet?<br>
                            <a href="http://wmsu.edu.ph/">Check your grades from the WMSU Portal</a></p>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- HELP POPUP END -->
    </form>
    </div>
    <!-- CONTENT END -->


    <!-- To Read QR Code -->
    <script type="text/javascript" src="../../bootstrap/qrReader.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    
    <script>
        function myCreateFunction() {
            var table = document.getElementById("myTable");
            var row = table.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            cell1.innerHTML = "NEW CELL1";
            cell2.innerHTML = "NEW CELL2";
        }

        function myDeleteFunction() {
            document.getElementById("myTable").deleteRow(0);
        }
    </script>
</body>
</html>