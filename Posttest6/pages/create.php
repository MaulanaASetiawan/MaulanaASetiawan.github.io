<?php
    require "./inc_connect.php";
    if(isset($_POST['add'])){
        $nama = $_POST['nama_roti'];
        $harga = $_POST['harga_roti'];
        $stok = $_POST['stok_roti'];
        $desc = $_POST['desc_roti'];
        $gambar = $_FILES['gambar_roti']['name'];
        $temp_file = $_FILES['gambar_roti']['tmp_name'];
        $extension = pathinfo($gambar, PATHINFO_EXTENSION);
        $date = date("Y-m-d");
        $nama_file = $date . " " . $nama . "." . $extension;
        
        move_uploaded_file($temp_file, "../assets/catalog/" . $nama_file); 
        
        $query_sql = "INSERT INTO db_roti VALUES ('','$nama','$harga', '$stok', '$desc', '$nama_file')";
        if(mysqli_query($conn, $query_sql)){
            echo "
            <script>
                alert('Data Berhasil Ditambahkan, Data akan ditampilkan pada halaman utama!');
                document.location.href = 'crud.php';
            </script>;";
        }
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
?>