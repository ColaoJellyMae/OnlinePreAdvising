<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- local css -->
    <link rel="stylesheet" href="../css/signin.css" />

    <title>Sign in</title>
</head>

<body>
    <!-- SIGN IN -->
    <div class="containr">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- INPUT -->
                <form autocomplete="off" action="../signin/loginData.php" method="POST">
                    <div class="sign-in-form" id="form">
                        <h2 class="title">Sign in</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="Email" id="email" name="email" autocomplete="false" required/>
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Password" id="Password" name="password" autocomplete="off" required />  
                        </div>
                        <div>
                            <input type="checkbox" onclick="myFunction()"> Show Password
                        </div>
                        <button type="submit" name="login" id="login" class="btn solid">Login</button>

                        <p class="request-text">Don't have an account?<br />Request a student or staff account</p>
                        <!-- REQUEST ICONS -->
                        <div class="requests">
                            <a href="student-request.php" class="request-icon">
                                <i class="fas fa-user-graduate"></i>
                            </a>
                            <a href="staff-request.php" class="request-icon">
                                <i class="fas fa-user-tie"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- LEFT  -->
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3><span><a class="text-white" href="../index.html"><i class="fas fa-chevron-circle-left"></i> BACK TO HOMEPAGE</a> </span> </h3>
                </div>

                <img src="../images/signin.svg" class="image" alt="signin" />
            </div>
        </div>
    </div>

    <!--LOGIN MESSAGE-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <?php
        if(isset($_SESSION['login_message']) && $_SESSION['login_message']  != '' &&  $_SESSION['login_message']=="error" )
        {
            ?>
                <script>
                    swal({
                        title: "Incorrect Email or Password!",
                        text: "Please Check!",
                        icon: "error",
                    });
                </script>
            <?php
            unset($_SESSION['login_message'] );
        }
    ?>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <script>
        function myFunction() {
            var x = document.getElementById("Password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>