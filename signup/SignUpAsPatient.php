<?php

$conn=mysqli_connect("localhost:3306", "root", "", "hms");
if (!$conn) {
    die("Database Connect Error");
}
$name=$_POST['name'];
$dob=$_POST['dob'];
$mail=$_POST['mail'];
$phno=$_POST['phno'];
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$rpass=$_POST['repass'];
// $role=$_POST['n1'];
if(empty($name))
{
   echo"<script type='text/javascript'>window.alert('Please enter your name. This field cannot be empty ');window.location='SignUpAsPatient.html';</script>";
}
if(empty($dob))
{
   echo"<script type='text/javascript'>window.alert('Please enter you date of birth. This field cannot be empty ');window.location='SignUpAsPatient.html';</script>";
}
if(empty($mail))
{
   echo"<script type='text/javascript'>window.alert('Please enter valid email. This field cannot be empty ');window.location='SignUpAsPatient.html';</script>";
}
else
{
    
   if(!filter_var($mail,FILTER_VALIDATE_EMAIL))
   {
    echo"<script type='text/javascript'>window.alert('Invalid Email.Please enter valid email.');window.location='SignUpAsPatient.html';</script>";
  }
}
if(empty($pass))
{
    echo"<script type='text/javascript'>window.alert('Password cannot be empty. Please try again');window.location='SignUpAsPatient.html'';</script>";
}
if(empty($rpass))
{
    echo"<script type='text/javascript'>window.alert('Password cannot be empty. Please try again');window.location='SignUpAsPatient.html'';</script>";  
}
else if ($pass==$rpass) {
    $sql="INSERT INTO patient (name,dob,mail, phone_no ,uname,password) VALUES ('$name','$dob','$mail','$phno','$uname','$pass')";

    if (mysqli_query($conn, $sql)) {
        echo"<script type='text/javascript'>window.alert('Successfully Completed');window.location='/Hospital-management-System-1/login/LoginAsPatient.html';</script>";
    } else {
        echo"<script type='text/javascript'>window.alert('Something went wrong,Please try again after some time');window.location='SignUpAsPatient.html';</script>";
    }
} else {
    echo"<script type='text/javascript'>window.alert('Password Does Not Match,Please Try Again');window.location='SignUpAsPatient.html';</script>";
}
mysqli_close($conn);
?>



