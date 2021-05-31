<?php
  include('content/header.php'); 
  include('content/navbar.php'); 
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="manageadminsdata.php" method="POST">
          <div class="modal-body">
              <div class="form-group">
                  <label>Firstname</label>
                  <input type="text" name="firstname" class="form-control" placeholder="Enter Firstname">
              </div>
              <div class="form-group">
                  <label>Lastname</label>
                  <input type="text" name="lastname" class="form-control" placeholder="Enter Lastname">
              </div>  
            <div class="form-group">
                <label for="#email" class="col-form-label">Email</label>
                  <div class="row">
                      <div class="col-sm-5 ">
                          <input type="text" name="email" autocomplete="off"class="form-control" id="email" placeholder="e.g. bg201802824" required/>
                      </div>
                      <div class="col-sm-5">
                          <input type="text"placeholder="@wmsu.edu.ph" class="form-control" id="email" placeholder="Enter Email" readonly/>					
                      </div>
                  </div>
              </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" id="Password" class="form-control" placeholder="Enter Password">

                <div>
                  <input type="checkbox" onclick="myFunction()"> Show Password
                  </div>
                  <!-- <div id="emailHelp" >Note: Password must be atleast 8 or more characters!</div> -->
                </div>  
            </div>
            <!-- Department -->		
            <div class="form-group">
                <label class="ml-2 mb-3 mt-2">Assigned To</label>
                <input type="text"class="form-control" name="college" id="select-college"list="colleges" autocomplete="off" placeholder="Select..." required>
                <datalist id="colleges">
				    <option value="" selected>Select College Department...</option>
                    <!-- SELECT COLLEGES FROM DATABASE  -->
                    <?php
                          $sql2 = mysqli_query($connection, "SELECT * From tblcollege WHERE admin_exist=0");  
                          // Use select query 

                        while($fa = mysqli_fetch_array($sql2))
                        {
                            echo "<option value='".$fa['college']."'></option>";  
                            // displaying data in option menu
                        }	
                    ?>                        
				</datalist>	    
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_admin" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="container-fluid mt-5">

<!-- Add Admin -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h2 class="mb-3 fw-bold text-danger font-weight-bold  text-center ">Student Grades Approval <br>
    </h2>

  </div>

  <div class="card-body">

    <div class="table-responsive">
      
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="bg-danger text-white">
                     <tr>
                        <th>Student Name</th>
                        <th>Course</th>
                        <th>Year Level</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Brigole Jr., Joseph Faith H.</th>
                        <td>BSCS</td>
                        <td>3</td>
                        <td class="text-center"><button class="viewgradesbtn rounded-pill bg-gradient-danger text-white">View Grades</button></td>
                    </tr>
                    <tr>
                        <th scope="row">Reniel B. Tumacas</th>
                        <td>BSCS</td>
                        <td>3</td>
                        <td class="text-center"><button class="viewgradesbtn rounded-pill bg-gradient-danger text-white">View Grades</button></td>
                    </tr>
                    <tr>
                        <th scope="row">Sandy Pueblo.</th>
                        <td>BSCS</td>
                        <td>3</td>
                        <td class="text-center"><button class="viewgradesbtn rounded-pill bg-gradient-danger text-white">View Grades</button></td>
                    </tr>
                </tbody>
            <tfoot >	
                <!-- table footer -->
            </tfoot>
        </table>
    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<script src="js/showpassword.js"></script>
<?php
include('content/scripts.php');
include('content/footer.php');
?>