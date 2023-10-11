<?php
    session_start();
    require "inc_connect.php";
    $username = $_POST['username_user'];
    $password = $_POST['password_user'];

    $query_sql = "SELECT * FROM registration WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connect, $query_sql);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['username_user'] = $username;
        header("location: ../index.php");
    }
    else {
        echo "Error: " . $query_sql . "<br>" . mysqli_error($connect);
    }
?>