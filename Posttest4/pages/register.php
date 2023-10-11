<?php
    require "inc_connect.php";
    $fullname = $_POST['name_new'];
    $username = $_POST['username_new'];
    $password = $_POST['password_new'];
    $email = $_POST['email_new'];

    $query_sql = "INSERT INTO registration (full_name, username, password, email) 
                    VALUES ('$fullname', '$username', '$password', '$email')";

    if(mysqli_query($connect, $query_sql)){
        header("location: dashboard_login.php");
    }
    else {
        echo "Error: " . $query_sql . "<br>" . mysqli_error($connect);
    }
?>