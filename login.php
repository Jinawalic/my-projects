<?php
session_start();
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Assuming you have a connection to your database
        $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $rowCount = $result->num_rows;

        if ($rowCount == 1) {
            $row = $result->fetch_assoc();
            // Verify the hashed password
            if (password_verify($password, $row['password'])) {
                // Store user details in session
                $_SESSION['userdetail'] = $row;
                echo '<script>
                window.setTimeout(function(){
                    window.location.href="../lms/user/index.php";
                },4000);
                </script>';
                // display success sweetalert message
                echo '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "You login successfully!",
                    showConfirmButton: false,
                    timer: 4000
                  });
              </script>';
              exit();
            } else {
                  // display incorrect username sweetalert message
                echo '<script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "Incorrect username!",
                    showConfirmButton: false,
                    timer: 4000
                  });
                      </script>';
            }
        } else {
              // display incorrect password sweetalert message
            echo '<script>
            Swal.fire({
                position: "top-end",
                icon: "error",
                title: "Incorrect Password!",
                showConfirmButton: false,
                timer: 4000
              });
                  </script>';
        }
    }
}
//                 // Set success message
//                 $_SESSION['login_success'] = true;

//                 // Redirect the user to the dashboard or another page
//                 header("Location: ../lms/user/index.php");
//                 exit(); // Make sure to exit after a redirect
//             } else {
//                 // Set error message for incorrect password
//                 $_SESSION['login_error'] = 'Incorrect password. Please try again.';
//             }
//         } else {
//             // Set error message for username not found
//             $_SESSION['login_error'] = 'Incorrect details.';
//         }
//         $stmt->close();
//     }
// }
?>



<!DOCTYPE html><html lang="en">
<!-- Mirrored from mannatthemes.com/zoter/vertical/pages-login by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Aug 2024 10:51:14 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
<title>LMS | Login</title>
<meta content="Admin Dashboard" name="description">
<meta content="Mannatthemes" name="author"><meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="assets/images/favicon.ico">
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/icons.css" rel="stylesheet" type="text/css">
<link href="assets/css/style.css" rel="stylesheet" type="text/css">
<!-- Include SweetAlert2 CSS and JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="assets/js/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<!-- sweetalert link -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<body><!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <a class='logo logo-admin' href='#'>
                        <img src="assets/images/lmslogo.png" height="20" width="130" alt="logo">
                    </a>
                </div>
                <div class="px-3 pb-3">
                <form id="registrationForm" class="form-horizontal m-t-20" method="POST">
                    
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="text" name="username" required="" placeholder="Username">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" name="password" type="password" required="" placeholder="Password">
                        </div>
                    </div>
                    
                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button id="submitForm" name="login" class="btn btn-primary btn-block waves-effect waves-light" type="submit">Login</button>
                        </div>
                    </div>
                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-sm-5 m-t-20">
                            <a class='text-muted' href='register.php'>
                                <i class="mdi mdi-account-circle"></i> 
                                <small>Dont have an account?</small>
                            </a>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
    
    
    <!-- jQuery  -->
     <!-- <script>
        document.addEventListener('DOMContentLoaded', function() {
        <?php
        // if (isset($_SESSION['login_success'])) {
        //     echo "Swal.fire({
        //         title: 'Success!',
        //         text: 'You have logged in successfully.',
        //         icon: 'success',
        //         confirmButtonText: 'OK'
        //     });";
        //     unset($_SESSION['login_success']);
        // }
        // if (isset($_SESSION['login_error'])) {
        //     echo "Swal.fire({
        //         title: 'Error!',
        //         text: '" . addslashes($_SESSION['login_error']) . "',
        //         icon: 'error',
        //         confirmButtonText: 'OK'
        //     });";
        //     unset($_SESSION['login_error']);
        // }
        ?>
    });
     </script> -->
     <script src="assets/js/jquery.min.js">

     </script><script src="assets/js/popper.min.js">

     </script><script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/modernizr.min.js"></script>
     <script src="assets/js/detect.js"></script>
     <script src="assets/js/fastclick.js"></script>
     <script src="assets/js/jquery.blockUI.js"></script>
     <script src="assets/js/waves.js">

    </script><script src="assets/js/jquery.nicescroll.js">

    </script><!-- App js --><script src="assets/js/app.js"></script>
</body>
<!-- Mirrored from mannatthemes.com/zoter/vertical/pages-login by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Aug 2024 10:51:15 GMT -->
</html>