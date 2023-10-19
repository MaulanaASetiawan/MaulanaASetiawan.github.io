<?php
    require "./inc_connect.php";
    if(isset($_POST['add'])){
        $nama = $_POST['nama_roti'];
        $harga = $_POST['harga_roti'];
        $stok = $_POST['stok_roti'];
        $desc = $_POST['desc_roti'];  
    
        $query_sql = "INSERT INTO db_roti VALUES ('','$nama','$harga', '$stok', '$desc')";
        if(mysqli_query($conn, $query_sql)){
            header("location: crud.php");
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>