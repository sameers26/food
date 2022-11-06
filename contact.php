<?php

//variable declaration
session_start();
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$subject = $_POST['subject'];
$message = $_POST['message'];



//database connection
$conn = new mysqli('localhost','root','','Orders');
if($conn->connect_error)
{
    die('Connection Failed : '. $conn->connect_error);
}
else
{
    $_SESSION['status'] ="Contact us successfull";
    $stmt = $conn->prepare("insert into contact(name,email,number,subject,message) values(?,?,?,?,?)");
    $stmt->bind_param("ssiss",$name,$email,$number,$subject,$message);
    $stmt->execute();
    header('location: index.html');
    $stmt->close();
    $conn->close();
}
?>