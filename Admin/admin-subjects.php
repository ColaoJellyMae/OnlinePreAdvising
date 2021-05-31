<?php
  include('content/header.php'); 
  include('content/navbar.php'); 

  $user_check = $_SESSION['login_user'];
	$query1 = mysqli_query($connection, "SELECT * FROM tbluser WHERE email = '$user_check'");
  
?>

<div class="container-fluid">

<!-- Add Admin -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <!-- <h2 class="mb-3 fw-bold text-danger font-weight-bold  text-center ">Subjects<br>
    </h2> -->
    <div class="table-responsive">
    

    <!-- <button type="button" class="btn btn-danger rounded-pill " data-toggle="modal" data-target="#addcollege">
      Add Subject
    </button> -->
 
  </div>

  <?php
    $id= $_SESSION['currid'];

    $discurr = mysqli_query($connection , "SELECT * FROM tblcurriculum WHERE id=$id");
    if(mysqli_num_rows($discurr) == 1){
      $fa_c = mysqli_fetch_array($discurr);

      $curr_code  = $fa_c['curr_code'];
      $cmo  = $fa_c['cmo'];
      $br  = $fa_c['board_reso'];
      $esy  = $fa_c['effectiveSY'];
      $od  = $fa_c['other_details'];
      

      $curr_courseid  = $fa_c['course_id_fk'];
      $getcourse = mysqli_query($connection , "SELECT * FROM tblcourse WHERE id=$curr_courseid");

      if(mysqli_num_rows( $getcourse) == 1){
         $get = mysqli_fetch_array( $getcourse);
          $course = $get['course'];
          $course = strtoupper($course);
          $coursecode = $get['coursecode'];
      }

    }
  ?>
  <div class="card-body bg-light shadow text-center ">
      <input type="text" name="curriculumcode" value="<?php echo $course;echo "($coursecode)"?>" class="bg-light font-weight-bold course mb-2 mt-1 w-100 text-center" readonly><br>
      <input type="text" name="cmo" value="<?php echo $cmo;?>" class="bg-light cmo mb-2 mt-1 text-center w-100 " readonly><br>
      <input type="text" name="br" value="<?php echo $br;?>" class="bg-light br mb-2 mt-1 text-center w-100 " readonly><br>
      <input type="text" name="esy" value="<?php echo $esy;?>"  class="bg-light esy mb-2 mt-1 text-center w-100 " readonly><br>
      <input type="text" name="od" value="<?php echo $od;?>" class="bg-light od mb-2 mt-1 text-center w-100 " readonly><br>
   </div>

   <div class="card-body">
    <button type="button" id="add_subject_btn" class="btn  rounded-pill btn-danger mb-1" data-toggle="modal" data-target="#addsubject" >
        Add Subject
    </button>
  </div>
  
  <!-- First Year Subjects -->
      <div class="card-body shadow mb-3 w-100">
        <div class="row mb-2">
          <div  class="btn btn-secondary  w-100">
            First Year
        </div>
              <!-- TABLE -->
              <div class="card-body overflow-auto">
                    <input name="semester" id="sem" class="form-control mb-3 w-25" value="1st Semester" readonly>
                      <table class="table table-hover table-responsive table-striped table-bordered " cellspacing="0" id="table">
                          <thead class="text-white bg-danger text-center justify-contenr-center">
                              <tr>
                                  <th class='hide'>Subject ID</th>
                                  <th class="">Subject Code</th>
                                  <th class="w-25">Description</th>
                                  <th>Lab Units</th>
                                  <th>Lec Units</th>
                                  <th>Total Units</th>
                                  <th>Prequisites</th>
                                  <th class="w-25">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <!--Php code for fetching data from database to view curriculum data-->
                              <?php                               
                                  $discurr = mysqli_query($connection,"SELECT * FROM tblsubject WHERE curr_id_fk='$id' AND yearlevel=1 AND semester='1st' ");

                                  if(mysqli_num_rows($discurr) > 0)
                                  {
                                      $total_lab = 0;
                                      $total_lec = 0;
                                      $total_units = 0;
                                      while($dis = mysqli_fetch_array($discurr)){
                                        echo "<td class='hide'>".$dis['id']."</td>";
                                        echo "<td>".$dis['subject_code']."</td>";
                                        echo "<td class='w-25'>".$dis['description']."</td>";
                                        echo "<td>".$dis['lab']."</td>";
                                        echo "<td>".$dis['lec']."</td>";
                                        echo "<td>".$dis['units']."</td>";
                                        echo "<td>".$dis['prerequisite']."</td>";

                                        echo "<center><td class='text-center'> <button type='button' class='fas fa-edit btn rounded-pill btn-success editbtn'>  Edit</button> ";

                                        echo "<button type='button' class='fas fa-trash-alt btn rounded-pill btn-danger deletebtn'>  Delete</button></td></center>";

                                        echo "</tr>";
                                        
                                        $lab = $dis['lab'];
                                        $lec = $dis['lec'];
                                        $t_units = $dis['units'];

                                        $total_lab = $total_lab + $lab;
                                        $total_lec = $total_lec + $lec;
                                        $total_units = $total_units + $t_units;
                                      }
                                      echo "<tr>";
                                        echo "<td></td>";
                                        echo "<td class='text-center' ><b>TOTAL</b></td>";
                                        echo "<td>".$total_lab."</td>";
                                        echo "<td>".$total_lec."</td>";
                                        echo "<td>".$total_units."</td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                      echo "</tr>";

                                  }
                                  else{
                                    echo "<tr>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                    echo "</tr>";
                                  }
                      
                              ?>
                              <!--end php code-->
                          
                          </tbody>
                          <tfoot >	
                              <!-- table footer -->
                          </tfoot>
                      </table>
                  </div>
              </div>
              <!-- TABLE END -->
              <input name="semester" id="sem" class="form-control mb-3 w-25" value="2nd Semester" readonly>
                      <table class="table table-hover table-responsive table-striped table-bordered " id="table">
                          <thead class="text-white bg-danger text-center justify-contenr-center">
                              <tr>
                                  <th class='hide'>Subject ID</th>
                                  <th class="">Subject Code</th>
                                  <th class="w-25">Description</th>
                                  <th>Lab Units</th>
                                  <th>Lec Units</th>
                                  <th>Total Units</th>
                                  <th>Prequisites</th>
                                  <th class="w-25">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <!--Php code for fetching data from database to view curriculum data-->
                              <?php                               
                                  $discurr = mysqli_query($connection,"SELECT * FROM tblsubject WHERE curr_id_fk='$id' AND yearlevel=1  AND semester='2nd' ");

                                  if(mysqli_num_rows($discurr) > 0)
                                  {
                                      $total_lab = 0;
                                      $total_lec = 0;
                                      $total_units = 0;
                                      while($dis = mysqli_fetch_array($discurr)){
                                        echo "<td class='hide'>".$dis['id']."</td>";
                                        echo "<td>".$dis['subject_code']."</td>";
                                        echo "<td class='w-25'>".$dis['description']."</td>";
                                        echo "<td>".$dis['lab']."</td>";
                                        echo "<td>".$dis['lec']."</td>";
                                        echo "<td>".$dis['units']."</td>";
                                        echo "<td>".$dis['prerequisite']."</td>";

                                        echo "<center><td class='text-center'> <button type='button' class='fas fa-edit btn rounded-pill btn-success editbtn'>  Edit</button> ";

                                        echo "<button type='button' class='fas fa-trash-alt btn rounded-pill btn-danger deletebtn'>  Delete</button></td></center>";

                                        echo "</tr>";
                                        
                                        $lab = $dis['lab'];
                                        $lec = $dis['lec'];
                                        $t_units = $dis['units'];

                                        $total_lab = $total_lab + $lab;
                                        $total_lec = $total_lec + $lec;
                                        $total_units = $total_units + $t_units;
                                      }
                                      echo "<tr>";
                                        echo "<td></td>";
                                        echo "<td class='text-center' ><b>TOTAL</b></td>";
                                        echo "<td>".$total_lab."</td>";
                                        echo "<td>".$total_lec."</td>";
                                        echo "<td>".$total_units."</td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                      echo "</tr>";

                                  }
                                  else{
                                    echo "<tr>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                    echo "</tr>";
                                  }
                      
                              ?>
                              <!--end php code-->
                          
                          </tbody>
                          <tfoot >	
                              <!-- table footer -->
                          </tfoot>
                      </table>
                  </div>
              <!-- TABLE END -->
        </div>
        
          <!-- Second Year Subjects -->
        <div class="card-body shadow mb-3">
          <div class="row mb-2">
            <div  class="btn btn-secondary  w-100">
              Second Year
          </div>
              <!-- TABLE -->
              <div class="card-body overflow-auto">
                  <form action="managesubjects.php" method="POST">
                  <input name="semester" id="sem" class="form-control mb-3 w-25" value="1st Semester" readonly>
                      <table class="table table-hover table-responsive table-striped table-bordered " id="table">
                          <thead class="text-white  text-center bg-danger">
                              <tr>
                                  <th class='hide'>Subject ID</th>
                                  <th >Subject Code</th>
                                  <th class="w-25" >Description</th>
                                  <th>Lab Units</th>
                                  <th>Lec Units</th>
                                  <th>Total Units</th>
                                  <th>Prequisites</th>
                                  <th class="w-25">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <!--Php code for fetching data from database to view curriculum data-->
                              <?php                               
                                  $discurr = mysqli_query($connection,"SELECT * FROM tblsubject WHERE curr_id_fk='$id' and yearlevel=2  AND semester='1st'");

                                  if(mysqli_num_rows($discurr) > 0)
                                  {
                                      $total_lab = 0;
                                      $total_lec = 0;
                                      $total_units = 0;
                                      while($dis = mysqli_fetch_array($discurr)){
                                        echo "<td class='hide'>".$dis['id']."</td>";
                                        echo "<td>".$dis['subject_code']."</td>";
                                        echo "<td class='w-25'>".$dis['description']."</td>";
                                        echo "<td>".$dis['lab']."</td>";
                                        echo "<td>".$dis['lec']."</td>";
                                        echo "<td>".$dis['units']."</td>";
                                        echo "<td>".$dis['prerequisite']."</td>";

                                        echo "<center><td class='text-center'> <button type='button' class='fas fa-edit btn rounded-pill btn-success editbtn'>  Edit</button> ";

                                        echo "<button type='button' class='fas fa-trash-alt btn rounded-pill btn-danger deletebtn'>  Delete</button></td></center>";

                                        echo "</tr>";
                                        
                                        $lab = $dis['lab'];
                                        $lec = $dis['lec'];
                                        $t_units = $dis['units'];

                                        $total_lab = $total_lab + $lab;
                                        $total_lec = $total_lec + $lec;
                                        $total_units = $total_units + $t_units;
                                      }
                                      echo "<tr>";
                                        echo "<td></td>";
                                        echo "<td class='text-center' ><b>TOTAL</b></td>";
                                        echo "<td>".$total_lab."</td>";
                                        echo "<td>".$total_lec."</td>";
                                        echo "<td>".$total_units."</td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                      echo "</tr>";

                                  }
                                  else{
                                    echo "<tr>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                    echo "</tr>";
                                  }
                      
                              ?>
                              <!--end php code-->
                          
                          </tbody>
                          <tfoot >	
                              <!-- table footer -->
                          </tfoot>
                      </table>
                  </div>
              </div>
              <!-- TABLE END -->

              <!-- TABLE -->
             
                  <form action="managesubjects.php" method="POST">
                  <input name="semester" id="sem" class="form-control mb-3 w-25" value=" 2nd Semester" readonly>
                      <table class="table table-hover table-responsive table-striped table-bordered " id="table">
                          <thead class="text-white  text-center bg-danger">
                              <tr>
                                  <th class='hide'>Subject ID</th>
                                  <th >Subject Code</th>
                                  <th class="w-25" >Description</th>
                                  <th>Lab Units</th>
                                  <th>Lec Units</th>
                                  <th>Total Units</th>
                                  <th>Prequisites</th>
                                  <th class="w-25">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <!--Php code for fetching data from database to view curriculum data-->
                              <?php                               
                                  $discurr = mysqli_query($connection,"SELECT * FROM tblsubject WHERE curr_id_fk='$id' and yearlevel=2  AND semester='2nd'");

                                  if(mysqli_num_rows($discurr) > 0)
                                  {
                                      $total_lab = 0;
                                      $total_lec = 0;
                                      $total_units = 0;
                                      while($dis = mysqli_fetch_array($discurr)){
                                        echo "<td class='hide'>".$dis['id']."</td>";
                                        echo "<td>".$dis['subject_code']."</td>";
                                        echo "<td class='w-25'>".$dis['description']."</td>";
                                        echo "<td>".$dis['lab']."</td>";
                                        echo "<td>".$dis['lec']."</td>";
                                        echo "<td>".$dis['units']."</td>";
                                        echo "<td>".$dis['prerequisite']."</td>";

                                        echo "<center><td class='text-center'> <button type='button' class='fas fa-edit btn rounded-pill btn-success editbtn'>  Edit</button> ";

                                        echo "<button type='button' class='fas fa-trash-alt btn rounded-pill btn-danger deletebtn'>  Delete</button></td></center>";

                                        echo "</tr>";
                                        
                                        $lab = $dis['lab'];
                                        $lec = $dis['lec'];
                                        $t_units = $dis['units'];

                                        $total_lab = $total_lab + $lab;
                                        $total_lec = $total_lec + $lec;
                                        $total_units = $total_units + $t_units;
                                      }
                                      echo "<tr>";
                                        echo "<td></td>";
                                        echo "<td class='text-center' ><b>TOTAL</b></td>";
                                        echo "<td>".$total_lab."</td>";
                                        echo "<td>".$total_lec."</td>";
                                        echo "<td>".$total_units."</td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                      echo "</tr>";

                                  }
                                  else{
                                    echo "<tr>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                    echo "</tr>";
                                  }
                      
                              ?>
                              <!--end php code-->
                          
                          </tbody>
                          <tfoot >	
                              <!-- table footer -->
                          </tfoot>
                      </table>
                  </div>
              </div>
              <!-- TABLE END -->
        </div>

        <div class="card-body shadow mb-3">
          <div class="row mb-2">
            <div  class="btn btn-secondary  w-100">
              Third Year
          </div>
              <!-- TABLE -->
              <div class="card-body overflow-auto">
                  <form action="managesubjects.php" method="POST">
                  <input name="semester" id="sem" class="form-control mb-3 w-25" value="1st Semester" readonly>
                      <table class="table table-hover table-responsive table-striped table-bordered " id="table">
                          <thead class="text-white bg-danger text-center">
                              <tr>
                                  <th class='hide'>Subject ID</th>
                                  <th class="">Subject Code</th>
                                  <th class="w-25">Description</th>
                                  <th>Lab Units</th>
                                  <th>Lec Units</th>
                                  <th>Total Units</th>
                                  <th>Prequisites</th>
                                  <th class="w-25">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <!--Php code for fetching data from database to view curriculum data-->
                              <?php                               
                                  $discurr = mysqli_query($connection,"SELECT * FROM tblsubject WHERE curr_id_fk='$id' and yearlevel=3  AND semester='1st'");

                                  if(mysqli_num_rows($discurr) > 0)
                                  {
                                      $total_lab = 0;
                                      $total_lec = 0;
                                      $total_units = 0;
                                      while($dis = mysqli_fetch_array($discurr)){
                                        echo "<td class='hide'>".$dis['id']."</td>";
                                        echo "<td>".$dis['subject_code']."</td>";
                                        echo "<td class='w-25'>".$dis['description']."</td>";
                                        echo "<td>".$dis['lab']."</td>";
                                        echo "<td>".$dis['lec']."</td>";
                                        echo "<td>".$dis['units']."</td>";
                                        echo "<td>".$dis['prerequisite']."</td>";

                                        echo "<center><td class='text-center'> <button type='button' class='fas fa-edit btn rounded-pill btn-success editbtn'>  Edit</button> ";

                                        echo "<button type='button' class='fas fa-trash-alt btn rounded-pill btn-danger deletebtn'>  Delete</button></td></center>";

                                        echo "</tr>";
                                        
                                        $lab = $dis['lab'];
                                        $lec = $dis['lec'];
                                        $t_units = $dis['units'];

                                        $total_lab = $total_lab + $lab;
                                        $total_lec = $total_lec + $lec;
                                        $total_units = $total_units + $t_units;
                                      }
                                      echo "<tr>";
                                        echo "<td></td>";
                                        echo "<td class='text-center' ><b>TOTAL</b></td>";
                                        echo "<td>".$total_lab."</td>";
                                        echo "<td>".$total_lec."</td>";
                                        echo "<td>".$total_units."</td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                      echo "</tr>";

                                  }
                                  else{
                                    echo "<tr>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                    echo "</tr>";
                                  }
                      
                              ?>
                              <!--end php code-->
                          
                          </tbody>
                          <tfoot >	
                              <!-- table footer -->
                          </tfoot>
                      </table>
                  </div>
              </div>
              <!-- TABLE END -->
              <form action="managesubjects.php" method="POST">
                  <input name="semester" id="sem" class="form-control mb-3 w-25" value="2nd Semester" readonly>
                      <table class="table table-hover table-responsive table-striped table-bordered " id="table">
                          <thead class="text-white bg-danger text-center">
                              <tr>
                                  <th class='hide'>Subject ID</th>
                                  <th class="">Subject Code</th>
                                  <th class="w-25">Description</th>
                                  <th>Lab Units</th>
                                  <th>Lec Units</th>
                                  <th>Total Units</th>
                                  <th>Prequisites</th>
                                  <th class="w-25">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <!--Php code for fetching data from database to view curriculum data-->
                              <?php                               
                                  $discurr = mysqli_query($connection,"SELECT * FROM tblsubject WHERE curr_id_fk='$id' and yearlevel=3  AND semester='2nd'");

                                  if(mysqli_num_rows($discurr) > 0)
                                  {
                                      $total_lab = 0;
                                      $total_lec = 0;
                                      $total_units = 0;
                                      while($dis = mysqli_fetch_array($discurr)){
                                        echo "<td class='hide'>".$dis['id']."</td>";
                                        echo "<td>".$dis['subject_code']."</td>";
                                        echo "<td class='w-25'>".$dis['description']."</td>";
                                        echo "<td>".$dis['lab']."</td>";
                                        echo "<td>".$dis['lec']."</td>";
                                        echo "<td>".$dis['units']."</td>";
                                        echo "<td>".$dis['prerequisite']."</td>";

                                        echo "<center><td class='text-center'> <button type='button' class='fas fa-edit btn rounded-pill btn-success editbtn'>  Edit</button> ";

                                        echo "<button type='button' class='fas fa-trash-alt btn rounded-pill btn-danger deletebtn'>  Delete</button></td></center>";

                                        echo "</tr>";
                                        
                                        $lab = $dis['lab'];
                                        $lec = $dis['lec'];
                                        $t_units = $dis['units'];

                                        $total_lab = $total_lab + $lab;
                                        $total_lec = $total_lec + $lec;
                                        $total_units = $total_units + $t_units;
                                      }
                                      echo "<tr>";
                                        echo "<td></td>";
                                        echo "<td class='text-center' ><b>TOTAL</b></td>";
                                        echo "<td>".$total_lab."</td>";
                                        echo "<td>".$total_lec."</td>";
                                        echo "<td>".$total_units."</td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                      echo "</tr>";

                                  }
                                  else{
                                    echo "<tr>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                      echo "<td></td>";
                                    echo "</tr>";
                                  }
                      
                              ?>
                              <!--end php code-->
                          
                          </tbody>
                          <tfoot >	
                              <!-- table footer -->
                          </tfoot>
                      </table>
                  </div>
    
              <!-- TABLE END -->

             <!-- Fourth Year -->
            <div class="card-body shadow mb-3">
              <div class="row mb-2">
                <div  class="btn btn-secondary  w-100">
                  Fourth Year
                </div>
                    <!-- TABLE -->
                    <div class="card-body overflow-auto">
                        <form action="managesubjects.php" method="POST">
                        <input name="semester" id="sem" class="form-control mb-3 w-25" value="1st Semester" readonly>
                            <table class="table table-hover table-responsive table-striped table-bordered " id="table">
                                <thead class="text-white bg-danger text-center">
                                    <tr>
                                        <th class="">Subject Code</th>
                                        <th class="w-25">Description</th>
                                        <th>Lab Units</th>
                                        <th>Lec Units</th>
                                        <th>Total Units</th>
                                        <th>Prequisites</th>
                                        <th class='w-25'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Php code for fetching data from database to view curriculum data-->
                                    <?php                               
                                        $discurr = mysqli_query($connection,"SELECT * FROM tblsubject WHERE curr_id_fk='$id' and yearlevel=4  AND semester='1st'");

                                        if(mysqli_num_rows($discurr) > 0)
                                        {
                                            $total_lab = 0;
                                            $total_lec = 0;
                                            $total_units = 0;
                                            while($dis = mysqli_fetch_array($discurr)){
                                              echo "<td class='hide'>".$dis['id']."</td>";
                                              echo "<td>".$dis['subject_code']."</td>";
                                              echo "<td class='w-25'>".$dis['description']."</td>";
                                              echo "<td>".$dis['lab']."</td>";
                                              echo "<td>".$dis['lec']."</td>";
                                              echo "<td>".$dis['units']."</td>";
                                              echo "<td>".$dis['prerequisite']."</td>";

                                              echo "<center><td class='text-center'> <button type='button' class='fas fa-edit btn rounded-pill btn-success editbtn'>  Edit</button> ";

                                              echo "<button type='button' class='fas fa-trash-alt btn rounded-pill btn-danger deletebtn'>  Delete</button></td></center>";

                                              echo "</tr>";
                                              
                                              $lab = $dis['lab'];
                                              $lec = $dis['lec'];
                                              $t_units = $dis['units'];

                                              $total_lab = $total_lab + $lab;
                                              $total_lec = $total_lec + $lec;
                                              $total_units = $total_units + $t_units;
                                            }
                                            echo "<tr>";
                                              echo "<td></td>";
                                              echo "<td class='text-center' ><b>TOTAL</b></td>";
                                              echo "<td>".$total_lab."</td>";
                                              echo "<td>".$total_lec."</td>";
                                              echo "<td>".$total_units."</td>";
                                              echo "<td></td>";
                                              echo "<td></td>";
                                            echo "</tr>";

                                        }
                                        else{
                                          echo "<tr>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                          echo "</tr>";
                                        }
                            
                                    ?>
                                    <!--end php code-->
                                
                                </tbody>
                                <tfoot >	
                                    <!-- table footer -->
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- TABLE END -->
                     <!-- TABLE -->
                        <form action="managesubjects.php" method="POST">
                        <input name="semester" id="sem" class="form-control mb-3 w-25" value="2nd Semester" readonly>
                            <table class="table table-hover table-responsive table-striped table-bordered " id="table">
                                <thead class="text-white bg-danger text-center">
                                    <tr>
                                        <th class="">Subject Code</th>
                                        <th class="w-25">Description</th>
                                        <th>Lab Units</th>
                                        <th>Lec Units</th>
                                        <th>Total Units</th>
                                        <th>Prequisites</th>
                                        <th class='w-25'>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Php code for fetching data from database to view curriculum data-->
                                    <?php                               
                                        $discurr = mysqli_query($connection,"SELECT * FROM tblsubject WHERE curr_id_fk='$id' and yearlevel=4  AND semester='2nd'");

                                        if(mysqli_num_rows($discurr) > 0)
                                        {
                                            $total_lab = 0;
                                            $total_lec = 0;
                                            $total_units = 0;
                                            while($dis = mysqli_fetch_array($discurr)){
                                              echo "<td class='hide'>".$dis['id']."</td>";
                                              echo "<td>".$dis['subject_code']."</td>";
                                              echo "<td class='w-25'>".$dis['description']."</td>";
                                              echo "<td>".$dis['lab']."</td>";
                                              echo "<td>".$dis['lec']."</td>";
                                              echo "<td>".$dis['units']."</td>";
                                              echo "<td>".$dis['prerequisite']."</td>";

                                              echo "<center><td class='text-center'> <button type='button' class='fas fa-edit btn rounded-pill btn-success editbtn'>  Edit</button> ";

                                              echo "<button type='button' class='fas fa-trash-alt btn rounded-pill btn-danger deletebtn'>  Delete</button></td></center>";

                                              echo "</tr>";
                                              
                                              $lab = $dis['lab'];
                                              $lec = $dis['lec'];
                                              $t_units = $dis['units'];

                                              $total_lab = $total_lab + $lab;
                                              $total_lec = $total_lec + $lec;
                                              $total_units = $total_units + $t_units;
                                            }
                                            echo "<tr>";
                                              echo "<td></td>";
                                              echo "<td class='text-center' ><b>TOTAL</b></td>";
                                              echo "<td>".$total_lab."</td>";
                                              echo "<td>".$total_lec."</td>";
                                              echo "<td>".$total_units."</td>";
                                              echo "<td></td>";
                                              echo "<td></td>";
                                            echo "</tr>";

                                        }
                                        else{
                                          echo "<tr>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                            echo "<td></td>";
                                          echo "</tr>";
                                        }
                            
                                    ?>
                                    <!--end php code-->
                                
                                </tbody>
                                <tfoot >	
                                    <!-- table footer -->
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- TABLE END -->

                </div>
              </div>
              
          </div>
        </div>


 <!-- Add Subjects -->
<div class="modal fade" id="addsubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Subject to Curriculum</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body mt-3">
          <form action="managesubjects.php" method="POST">
              <div class="form-group">
                  <label>Curriculum</label>
                  <input type="text" name="curr_code" value="<?php echo $curr_code?>" class="form-control"  readonly>
              </div>
              
              <div class="form-group">
                  <label>Year Level</label>
                  <select  name="yearlevel" class="form-control" required>
                        <option value="">Select...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                  </select>
              </div> 

              <div class="form-group">
                  <label>Semester</label>
                  <select  name="semester" class="form-control" required>
                        <option value="">Select...</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                  </select>
              </div> 

              <div class="form-group">
                  <label>Subject Code</label>
                  <input type="text" name="subjectcode" class="form-control" placeholder="Enter Subject Code"required>
              </div>  
              <div class="form-group">
                  <label>Description</label>
                  <textarea columns="2" type="text" name="description" class="form-control" placeholder="Enter Subject Description"required></textarea>
              </div>  
              <div class="form-group">
                  <label>Units</label>
                  <div class="row">
                    <div class="col">
                      <input  type="text" name="lec" class="form-control" placeholder="Enter Lec Units" required>
                    </div>
                    <div class="col">
                      <input  type="text" name="lab" class="form-control" placeholder="Enter Lab Units" required>
                    </div>
                  </div>
              </div>  

              <div class="form-group">
                  <label>Prerequisites</label>
                  <select name="prereq[]" class="form-control" multiple>
                    <?php
                        $getsub = mysqli_query($connection,"SELECT * FROM tblsubject WHERE curr_id_fk=$id");

                        if(mysqli_num_rows($getsub) > 0){
                          echo '<option value="">Select...</option>';
                          while($fa_s = mysqli_fetch_array($getsub))
                          {
                              echo "<option value='".$fa_s['id']."'>".$fa_s['subject_code']."</td>";
                          }
                        }
                        else{
                          echo '<option value="">No Subject Available</option>';
                        }
                    ?>           
                  </select>
              </div> 
              <div>Hold <span class="text-danger">CTRL</span> to multiple selection</div> 
          </div>
            
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" name="add_subject" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>


<?php
 include('content/scripts.php');
 include('content/footer.php');
?>