<?php 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contactNumber = $_POST['contactNumber'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // DB Connection

    $conn = new mysqli('localhost','root','','data');
    if($conn->connect_error){
        die('Connection failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(name, email, contactNumber, subject , message) values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss",$name, $email, $contactNumber, $subject, $message);
        $stmt->execute();
        echo "message saved!";
        $stmt->close();
        $conn->close();
    }
?>