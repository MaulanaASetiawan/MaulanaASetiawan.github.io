<?php
    require "./inc_connect.php";
    $id = $_GET['id'];
    $get = mysqli_query($conn, "SELECT * FROM db_roti WHERE id = $id");
    $roti = [];

    while ($row = mysqli_fetch_assoc($get)) {
        $roti[] = $row;
    }
    $roti = $roti[0];

    if (isset($_POST['update'])) {
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

        $result = mysqli_query($conn, "UPDATE db_roti SET nama='$nama', harga='$harga', 
                                        stok='$stok', deskripsi='$desc', gambar='$nama_file' WHERE id = $id");

        if ($result) {
            echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = 'crud.php';
            </script>";
        } else {
            echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'crud.php';
            </script>";
        }
    }
?>
