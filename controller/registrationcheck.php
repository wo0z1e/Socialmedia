<?php
if (isset($_REQUEST["signin"])) {
    
    $conn = new mysqli('localhost', 'root', '', 'socialmedia'); // Update with your DB credentials
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $email = $_REQUEST['email'];
    $dob = $_REQUEST['dob'];

    if (isset($_REQUEST['gender'])) {
        $gender = $_REQUEST['gender'];
    } else {
        $gender = " ";
    }
    $address = $_REQUEST['address'];
    $pno = $_REQUEST['pno'];
    $pass = $_REQUEST['pass'];
    $cpass = $_REQUEST['cpass'];



    for ($i = 0; $i < strlen($fname); $i++) {
        $char = $fname[$i];
        $fisvalid = false;
        if (ctype_alpha($char) || $char == "." || $char == "-" || $char == " ") {
            $fisvalid = true;
        }
    }
    for ($i = 0; $i < strlen($lname); $i++) {
        $char = $lname[$i];
        $lisvalid = false;
        if (ctype_alpha($char) || $char == "." || $char == "-" || $char == " ") {
            $lisvalid = true;
        }
    }
    for ($i = 0; $i < strlen($pno); $i++) {
        $char = $pno[$i];
        $pisvalid = false;
        if (ctype_digit($pno) || $char == "-" || $char == " ") {
            $pisvalid = true;
        }
    }
    for ($i = 0; $i < strlen($address); $i++) {
        $char = $address[$i];
        $aisvalid = false;
        if (ctype_alpha($char) || $char == "." || $char == "-" || $char == "/" ||$char == "," || $char == " ") {
            $aisvalid = true;
        }
    }
    if (empty($fname) || empty($lname) || empty($email) || empty($dob) || empty($gender) || empty($address) || empty($pno) || empty($pass)) {
        echo "Please fill all the fields";
        sleep(1);
        header('location:registration.php');
    } elseif (str_word_count($fname) < 2 || str_word_count($lname) < 2) {
        echo "Name should at least be 2 words !!";
        sleep(1);
        header('location:registration.php');
    } elseif (!ctype_alpha($fname[0] )||!ctype_alpha($lname[0] )) {
        echo "Your Name must start with Upper or lower class Alphabet !!";
        sleep(1);
        header('location:registration.php');
    }

    else if($fisvalid===false || $lisvalid===false){
        echo "Name must be alphabets";
        sleep(1);
        header('location:registration.php');
    }
    
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Invalid Email Format";
        sleep(1);
        header('location:registration.php');
    }

    else if($aisvalid===false){
        echo "Invalid Address";
        sleep(1);
        header('location:registration.php');
    }

    else if(strlen($pno) < 11 || $pisvalid===false){
        echo "Invalid Phone Number";
        sleep(1);
        header('location:registration.php');
    }
    else if(strlen($pass) < 8){
        echo "Password must be at least 8 characters";
        sleep(1);
        header('location:registration.php');
    }
    else if($pass != $cpass){
        echo "Password and Confirm Password must be same";
        sleep(1);
        header('location:registration.php');
    }
    else{

        
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();

        header('location:login.php');

    }
   
} else if (isset($_REQUEST["signup"])) {
    header('location:login.php');
}
