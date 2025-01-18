<?php
if (isset($_POST["submit"])) {

    $conn = new mysqli('localhost', 'root', '', 'socialmedia');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $dob = trim($_POST['dob']);
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : "";
    $address = trim($_POST['address']);
    $pno = trim($_POST['pno']);
    $pass = trim($_POST['pass']);
    $cpass = trim($_POST['cpass']);

    
    $errors = [];

    
    if (empty($fname) ||  !ctype_alpha($fname[0])) {
        $errors[] = "First name must contain at least two words and start with a letter.";
    }

    if (empty($lname) || !ctype_alpha($lname[0])) {
        $errors[] = "Last name must contain letters.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($dob)) {
        $errors[] = "Date of birth is required.";
    }

    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }

    if (empty($address) || strlen($address) < 5) {
        $errors[] = "Address must be at least 5 characters long.";
    }

    if (!ctype_digit($pno) || strlen($pno) < 11) {
        $errors[] = "Phone number must be at least 11 digits.";
    }

    if (strlen($pass) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    if ($pass !== $cpass) {
        $errors[] = "Password and confirm password do not match.";
    }

    
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        exit;
    }

    
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, dob, gender, address, phone_number, password) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $fname, $lname, $email, $dob, $gender, $address, $pno, $hashed_pass);

    if ($stmt->execute()) {
        echo "Records added successfully.";
        delay(2);
        header('Location: ../view/login.php');
        exit;
    } else {
        echo "ERROR: Could not execute query. " . $stmt->error;
    }

    
    $stmt->close();
    $conn->close();
}

?>
