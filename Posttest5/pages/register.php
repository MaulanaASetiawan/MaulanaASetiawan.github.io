<?php
    require "inc_connect.php";
    $fullname = $_POST['name_new'];
    $username = $_POST['username_new'];
    $password = $_POST['password_new'];
    $email = $_POST['email_new'];
    $akses = "user";

    $query_sql = "INSERT INTO data_user VALUES ('', '$fullname', '$username', '$password', '$email', '$akses')";

    if(mysqli_query($conn, $query_sql)){
        header("location: dashboard_login.php");
    }
    else {
        echo "Error: " . $query_sql . "<br>" . mysqli_error($conn);
    }
?>