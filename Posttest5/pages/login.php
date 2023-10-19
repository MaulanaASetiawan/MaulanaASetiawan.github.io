<?php
    session_start();
    require "inc_connect.php";
    if(isset($_POST['login'])){
        $username = $_POST['username_user'];
        $password = $_POST['password_user'];
    
        $query_sql = "SELECT * FROM data_user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query_sql);
    
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $akses = $row["akses"];
            $_SESSION['akses'] = $akses;
            if($akses == "admin"){
                $_SESSION['username'] = $username;
                header('location: ./crud.php');
            }else{
                $_SESSION['username'] = $username;
                header("location: ../index.php");
            }
        }
        else {
            echo "<script>
                    alert('Username atau Password salah!');
                    document.location.href='dashboard_login.php';
                 </script>";
        }   
    }
?>