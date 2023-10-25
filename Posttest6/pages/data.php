<?php 
    session_start();
    require "inc_connect.php";

    if (!isset($_SESSION['username_user'])) {
        header("location: dashboard_login.php");
        exit();
    }

    $username = $_SESSION['username_user'];
    $query_sql = "SELECT * FROM data_user WHERE username = '$username'";
    $result = mysqli_query($connect, $query_sql);

    if (mysqli_num_rows($result) == 1) {
        $user_data = mysqli_fetch_assoc($result);

        echo "<h2>Full Name  : " . $user_data['full_name'] . "</h2>";
        echo "<h2>Username   : " . $user_data['username'] . "</h2>";
        echo "<h2>Password   : " . $user_data['password'] . "</h2>";
        echo "<h2>Email      : " . $user_data['email'] . "</h2>";
    } else {
        echo "Error: " . $query_sql . "<br>" . mysqli_error($connect);
    }
?>