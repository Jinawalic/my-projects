
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Include database connection
    include('config.php');

    // Get form data
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone'];
    $username = $_POST['username'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    $address = $_POST['address'];
    $bvn = $_POST['bvn'];
    $password = $_POST['pswd'];
    $confirm_password = $_POST['cpswd'];
    $image = $_FILES['img']['name'];
    $reg_date = date('Y-m-d H:i:s'); // Current date and time

    // Check if the email already exists
    $email_check = $con->prepare("SELECT email FROM users WHERE email = ?");
    $email_check->bind_param("s", $email);
    $email_check->execute();
    $email_check->store_result();

    if ($email_check->num_rows > 0) {
        echo "User already exists";
        $email_check->close();
        $con->close();
        exit();
    }

    $email_check->close();

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match";
        $con->close();
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Move uploaded file to the target directory
    move_uploaded_file($_FILES['img']['tmp_name'], 'userimg/' . $image);

    // Prepare SQL statement to insert data into the database
    $stmt = $con->prepare("INSERT INTO users (fname, email, phone_no, username, password, state, lga, address, bvn, reg_date, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssss", $fname, $email, $phone_no, $username, $hashed_password, $state, $lga, $address, $bvn, $reg_date, $image);

    // Execute the query
    if ($stmt->execute()) {
        echo "Registration successful";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
}
?>
