<?php
session_start();



if (isset($_POST['submit'])) {
    
    include "db_connection.php";

    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $phone = $_POST['phone'];
    $age = $_POST['age'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $street = $_POST['street'];

    //check if email in database or not
    $stm = "SELECT email FROM users WHERE email = '$email'";
    $que = $conn->prepare($stm);
    $que->execute();
    $data = $que->fetch();
    if($data){
        echo "Email is already existed <br>";
    }

    //hashing password for security
    $npassword = password_hash($password,PASSWORD_DEFAULT);

    // Insert the data into the database
    $query = "INSERT INTO users(name,email,password,phone,age,country,city,street)";
    $query .= " VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssss", $name, $email, $npassword, $phone,$age,$country,$city,$street);

    $result = $stmt->execute();
    
    if ($result) {
        echo "Registration successful!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    $_SESSION['user'] = [
        "name" => $name,
        "email" => $email,
        "password" =>$password,
        "phone" => $phone,
    ];
    header('location:update.php');
}

?>