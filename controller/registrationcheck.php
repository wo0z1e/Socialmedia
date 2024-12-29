<?php 
session_start();
if(isset($_REQUEST["signup"])){
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$email=$_REQUEST['email'];
$dob=$_REQUEST['dob'];
$gender=$_REQUEST['gender'];
$address=$_REQUEST['address'];
$pno=$_REQUEST['pno'];
$pass=$_REQUEST['pass'];
if(empty($fname) || empty($lname) || empty($email) || empty($dob) || empty($gender) || empty($address) || empty($pno) || empty($pass)){
    echo "Please fill all the fields";
}
else{
    $status = true;
    setcookie("status",$status,time()+86400,"/");
    $con=mysqli_connect("localhost","root","","socialmedia");
    $query="insert into user(fname,lname,email,dob,gender,address,pno,pass) values('$fname','$lname','$email','$dob','$gender','$address','$pno','$pass')";


}
}
else if(isset($_REQUEST["signin"])){
header('location:login.php');
}
else{
    header('location:login.php');
}

?>
