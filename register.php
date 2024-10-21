<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include database connection
    include('config.php');

    // Get form data
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    $address = $_POST['address'];
    $bvn = $_POST['bvn'];
    $password = password_hash($_POST['pswd'], PASSWORD_BCRYPT);
    $image = $_FILES['img']['name'];
    
    // Move uploaded file to the target directory
    move_uploaded_file($_FILES['img']['tmp_name'], 'uploads/' . $image);

    // Prepare SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO users (fname, email, phone_no, username, password, state, lga,address,bvn, reg_date	image	) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $fname, $email, $phone, $username, $password, $state, $lga, $address, $bvn, $image);

    // Execute the query
    if ($stmt->execute()) {
        echo "Registration successful";
        header("Location: /login.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}

    // Initialize cURL session
    $curl = curl_init();

    // Set cURL options
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://nga-states-lga.onrender.com/fetch",
        CURLOPT_RETURNTRANSFER => true,  // Return the response as a string
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json', // Set the request header if needed
        ],
    ]);
    
    // Execute cURL request
    $response = curl_exec($curl);

    // Check for cURL errors
    if (curl_errno($curl)) {
        echo "cURL Error: " . curl_error($curl);
    } else {
        // Decode the JSON response
        $data = json_decode($response, true);
     
    }
    
    // Close cURL session
    curl_close($curl);
    

?>



<!DOCTYPE html><html lang="en">
<!-- Mirrored from mannatthemes.com/zoter/vertical/pages-login by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 06 Aug 2024 10:51:14 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
<title>LMS | Register</title>
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
</head>
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
                <form id="registrationForm" class="form-horizontal m-t-20" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="text" name="fname" required="" placeholder="Full name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="text" name="email" required="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="text" name="phone" required="" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="text" name="username" required="" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                        <label for="state" class="form-label">Choose State</label>
                        <select class="form-select w-100 p-2" id="stateList" name="state" data-toggle="select2">
                            <option>Select</option>
                            <?php
                            foreach($data as $state){
                                ?>
  <option value="<?php echo $state;?>"><?php echo $state;?></option>
                                <?php
                            
                            }
                            ?>
                          
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="text" name="lga" required="" placeholder="Local Govt">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="text" name="address" required="" placeholder="Residential Address">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="number" name="bvn" required="" placeholder="BVN">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" name="img" type="file" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" name="pswd" type="password" required="" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" name="cpswd" type="password" required="" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button id="submitForm" class="btn btn-success btn-block waves-effect waves-light" type="submit">Register</button>
                        </div>
                    </div>
                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-sm-5 m-t-20">
                            <a class='text-muted' href='login.php'>
                                <i class="mdi mdi-account-circle"></i> 
                                <small>Have an account?</small>
                            </a>
                        </div>
                    </div>
                </form>

                </div>
            </div>
        </div>
    </div>
    <script>
   $(document).ready(function() {
    $('#registrationForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        var formData = new FormData(this); // Create a FormData object with the form data

        $.ajax({
            url: 'process_registration.php', // The server script to process the form
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               window.location.href="login.php";
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle error response
                alert('Registration failed: ' + errorThrown);
            }
        });
    });
});

    </script>
    
    <!-- jQuery  -->
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