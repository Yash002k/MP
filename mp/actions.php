<?php
    $user_id = $_POST['user_id'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //database connection
    $conn = new mysqli('localhost','root','','drumble_2.0');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }
    else{
        $stmt = $conn->prepare("insert into registration(user_id,email,password) values(?,?,?)");
        $stmt->bind_param("sss",$user_id,$email,$password);
        $stmt->execute();
        echo "Registration Successfully!";
        $stmt->close();
        $conn->close();
    }

    
?>