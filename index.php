<?php

//variable declaration
session_start();
$fname = $_POST['fname'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$instruction = $_POST['instruction'];


//database connection
$conn = new mysqli('localhost','root','','Orders');
if($conn->connect_error)
{
    die('Connection Failed : '. $conn->connect_error);
}
else
{
    $_SESSION['status'] ="Order Placed Successfully";
    $stmt = $conn->prepare("insert into Foods(fname,quantity,price,instruction) values(?,?,?,?)");
    $stmt->bind_param("siss",$fname,$quantity,$price,$instruction);
    $stmt->execute();
    header('location: index.html');
    $stmt->close();
    $conn->close();
}
?>