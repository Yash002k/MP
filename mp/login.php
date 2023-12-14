<?php
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    //database connection
    $con = new mysqli("localhost","root","","drumble_2.0");
    if($con->connect_error){
        die("Failed to connect : ".$con->connect_error);
    } else {
        $stmt = $con->prepare("select * from registration where user_id = ?");
        $stmt->bind_param("s", $user_id);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
        $data = $stmt_result->fetch_assoc();
            if($data['password'] === $password){
                echo "<script> alert('Login Successfully'); window.location.href = 'index.html'; </script>";
            } else {
                echo "<h2>Invalid UserID or Password</h2>";
            }
        } else {
            echo "<h2>Invalid UserID or Password</h2>";
        }
    }
?>