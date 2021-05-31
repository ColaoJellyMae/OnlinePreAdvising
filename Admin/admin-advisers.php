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
      <form action="manageadvisersdata.php" method="POST">
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
                  <label>Contact No.</label>
                  <input type="text" name="contact" maxlength="11" class="form-control" placeholder="Enter Lastname">
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
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_adviser" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="manageAdviser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Manage Adviser</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="manageadvisersdata.php" method="POST">
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
                  <label>Contact No.</label>
                  <input type="text" name="contact" maxlength="11" class="form-control" placeholder="Enter Lastname">
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
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_adviser" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="container-fluid">

<!-- Add Admin -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h2 class="mb-3 fw-bold text-danger font-weight-bold  text-center ">Adviser Accounts <br>
    </h2>
    <button type="button" class="btn btn-danger rounded-pill " data-toggle="modal" data-target="#addadminprofile">
      Add Adviser Account
    </button>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="mydataTable" width="100%" cellspacing="0">
        <thead class="bg-danger text-white">
          <tr>
            <th> Firstname </th>
            <th>Lastname</th>
            <th>Email </th>
            <th>Contact</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
     
          <tr>
          <?php
              $getcollege = $_SESSION['college_id_fk'];
              $getdata = mysqli_query($connection,"SELECT * FROM tbluser WHERE usertype='Adviser' and college_id_fk='$getcollege'");
              while($fa = mysqli_fetch_array($getdata)){

                  echo "<tr>";
                  echo "<td class='hide'>".$fa['id']."</td>";
                  echo "<td>".$fa['firstname']."</td>";
                  echo "<td>".$fa['lastname']."</td>";
                  echo "<td>".$fa['email']."</td>";
                  echo "<td>".$fa['contact']."</td>";


                  echo "<center><td class='text-center'><button type='button' class='fas fa-edit btn rounded-pill btn-success editbtn'>  Edit</button> ";
                  
                  echo "<button type='button' class='fas fa-trash-alt btn rounded-pill btn-danger deletebtn'>  Delete</button></td></center>";

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

    <script>
            $(document).ready(function()
            {
                $('.editbtn').on('click',function()
                {
                    $('#manageAdviser').modal('show');
                    $tr= $(this).closest('tr');

                    var data = $tr.children('td').map(function(){
                        return $(this).text(); 
                    }).get();
                });
            });
    </script>


<script src="js/showpassword.js"></script>
<?php
include('content/scripts.php');
include('content/footer.php');
?>