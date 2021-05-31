<?php
include('content/header.php'); 
include('content/navbar.php'); 
include("../includes/config.php");
$sql = mysqli_query($connection,"SELECT * FROM tbluser");
?>
<!--Add Admin-->
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
                  <label>Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
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
            <!-- College -->		
            <div class="form-group">
				<label class="ml-3 mb-3 mt-1">Assigned To</label>
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

<!--Edit admin-->
<div class="modal fade" id="editadminmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="manageadminsdata.php" method="POST">
          <div class="modal-body">
              <div class="form-group">
                  <label>Firstname</label>
                  <input type="text" name="firstname" id="fname" class="form-control" placeholder="Enter Firstname">
              </div>
              <div class="form-group">
                  <label>Lastname</label>
                  <input type="text" name="lastname" id="lname" class="form-control" placeholder="Enter Lastname">
              </div>  
              <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" id="emailadd" class="form-control" placeholder="Enter Email">
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

<div class="container-fluid">

<!-- Admin Table -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h2 class="mb-3 fw-bold text-danger font-weight-bold  text-center ">Admin Accounts <br>
    </h2>
    <button type="button" class="btn btn-danger rounded-pill " data-toggle="modal" data-target="#addadminprofile">
      Add Admin Account
    </button>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead class="bg-danger  text-white">
          <tr>
            <th> Firstname </th>
            <th>Lastname</th>
            <th>Email </th>
             <th>College</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
     
          <tr>
          <?php
              $getdata = mysqli_query($connection,"SELECT * FROM tbluser WHERE usertype='Admin'");
              while($fa = mysqli_fetch_array($getdata)){

                  echo "<tr>";
                  echo "<td class='hide'>".$fa['id']."</td>";
                  echo "<td>".$fa['firstname']."</td>";
                  echo "<td>".$fa['lastname']."</td>";
                  echo "<td>".$fa['email']."</td>";

                  $id = $fa['college_id_fk'];
                  $getcollege = mysqli_query($connection,"SELECT college FROM tblcollege where id='$id'");

                  while($fa = mysqli_fetch_array($getcollege))
                  {
                      echo "<td>".$fa['college']."</td>";
                  }
                  echo "<center><td class='text-center'> <button type='button' data-toggle='modal' data-target='#editadminmodal' class='fas fa-edit btn rounded-pill btn-success editadminbtn'>  Edit</button> ";

                 echo "<button type='button' data-toggle='modal' data-target='#deleteadminmodal' class='fas fa-trash-alt btn rounded-pill btn-danger deleteadminbtn'>  Delete</button></td></center>";

                  echo "</tr>"; 
              }
          ?>
          <!--end php code-->
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

 <!-- DELETE MODAL-->
    <div class="container container-fluid">
        <div class="modal fade" id="deleteadminmodal" tabindex="-1" aria-labelledby="deletemodalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="manageadminsdata.php" method="POST">
                        <center>
                            <input type="text" name="id" id="deleteadminid">

                            <div class="modal-body">
                            Are you sure you want to delete this Admin Profile?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                <button type="submit" name="delete_admin" class="btn btn-danger">Yes</button>
                            </div>                     
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<!--END OF DELETE MODAL-->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    
    <script src="js/delete.js"></script>
    <script src="js/edit.js"></script>

<script src="js/showpassword.js"></script>
<?php
include('content/scripts.php');
include('content/footer.php');
?>