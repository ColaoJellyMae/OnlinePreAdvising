<?php
  include('content/header.php'); 
  include('content/navbar.php'); 
  
  if (isset($_POST['update']))
  {
      $firstname=$_POST['firstname'];
      $lastname=$_POST['lastname'];
      $email=$_POST['email'];
      $contact=$_POST['contact'];
      $password=$_POST['password'];

      $query="UPDATE tbluser SET firstname='$firstname',lastname='$lastname',contact='$contact' WHERE email='$email'";

  if(mysqli_query($connection, $query)){
     
  }else{
      echo "an error occured".$connection->error;
  }
}

  $email = $_SESSION['login_user'];
  $getprofile = mysqli_query($connection,"SELECT * FROM tbluser WHERE email = '$email'");

  while($fa = mysqli_fetch_array($getprofile))
  {
    $getid = $fa['id'];
    $getemail = $fa['email'];
    $getfirstname = $fa['firstname'];
    $getlastname = $fa['lastname'];
    $getpassword = $fa['password'];
    $getcontact = $fa['contact'];
  }

?>

<div class="modal fade" id="changemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="changepass.php" method="POST">
          <div class="modal-body">
            <div class="form-group">
                <div class="col-md-6">
                
                    <input type="text" name="email" value="<?php echo $getemail ?>" class="form-control" id="email" hidden>
                </div>
                
                <label>Password</label>
                <input type="password" name="password" value="<?php echo $getpassword ?>" id="Password" class="form-control" placeholder="Enter Password">

                <div>
                  <input type="checkbox" onclick="myFunction()"> Show Password
                  </div>
                  <!-- <div id="emailHelp" >Note: Password must be atleast 8 or more characters!</div> -->
                </div>  
            </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="container-fluid">

<!-- Add Admin -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h2 class="mb-3 fw-bold text-danger font-weight-bold  text-center ">My Profile<br>
    </h2>
  </div>

  <div class="card-body">
  <div class="row">
            <!-- LEFT SIDE -->
            <div class="col-sm-4 ">
                <form action="../Admin/add-profile.php" method="POST" enctype="multipart/form-data">
                <center>
                    <img src="../images/avatar.svg" class="img w-50  mb-3 rounded-circle"  alt="Profile Picture" id="profilepicture">
                    <br>
                    <label class="mb-3" for="upload">Adviser Profile</label>
                    <br>
                </center>
                </form>
            </div>
            
            <!-- RIGHT SIDE -->
            <div class="col-sm-8">
                <div class="container">
                    <form class="row g-2" method="POST">
                        <!-- first line -->
                        <div class="col-md-6">
                            <label for="first" class="form-label">First name</label>
                            <input type="text" name="firstname" value="<?php echo $getfirstname ?>" class="form-control" id="first">
                        </div>
                        <div class="col-md-6">
                            <label for="last" class="form-label">Last name</label>
                            <input type="text" name="lastname" value="<?php echo $getlastname ?>" class="form-control" id="last">
                        </div>
                        <!-- second line -->
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" value="<?php echo $getemail ?>" class="form-control" id="email" readonly>
                        </div>

                        <div class="col-md-6">
                            <label for="contact" class="form-label">Contact No.</label>
                            <input type="text" name="contact" maxlength="11" value="<?php echo $getcontact ?>" class="form-control" id="contact">
                        </div>
                       
                        <!-- fourth line -->
                        <!-- <div class="col-md-12">
                            <label for="Contact" class="form-label">Contact</label>
                            <input type="text" name="contact" class="form-control" id="Contact" value="<?php echo $contact?>" readonly>
                        </div> -->

                        <div class="col-md-12">
                            <input type="hidden" name="password" class="form-control" id="Password" ">
                        </div>
                       
                        <span class="input-group-sm mt-3">
                            <input type="submit" class="btn bg-success text-white m-3 rounded-pill" name="update" data-bs-toggle="modal" data-bs-target="#popup-save" value="Update" class="btn btn-danger">
                            <a href="#" type="button" class="btn btn-sm bg-secondary text-white m-3" data-toggle="modal" data-target="#changemodal" aria-disabled="true">Change Password</a>
                        </span>
                    </form>
                </div>
            </div>
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