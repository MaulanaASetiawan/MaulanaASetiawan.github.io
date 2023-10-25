<?php
session_start();
require "./inc_connect.php";
$result = mysqli_query($conn, "SELECT * FROM db_roti");
date_default_timezone_set("Asia/Makassar");
$day = date('l');
$date = date('d');
$month = date('F');
$year = date('Y');
$time = date('H:i:s');
$timeZone = date('T');


$data_roti = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data_roti[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/crud.css">
    <title>Database</title>
</head>

<body>
    <div class="container">
    <p>Current Date: <?php echo $day . ', ' . $date . ' ' . $month . ' ' . $year; ?></p>
    <p id="clock"><?php echo sprintf("Time Zone: %s %s", $time, $timeZone); ?></p>
        <h2>Data Roti</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Roti</th>
                    <th>Harga Roti</th>
                    <th>Stok Roti</th>
                    <th>Desc Roti</th>
                    <th>Path Gambar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($data_roti as $roti) : ?>
                    <tr>
                        <td><?php echo $roti["nama"] ?></td>
                        <td><?php echo $roti["harga"] ?></td>
                        <td><?php echo $roti["stok"] ?></td>
                        <td><?php echo $roti["deskripsi"] ?></td>
                        <td><?php echo $roti["gambar"] ?></td>
                        <td>
                            <button class="edit-button" id="show-popupEdit<?php echo $roti['id'] ?>">Edit</button>
                            <button class="delete-button" id="delete-roti-<?php echo $roti['id'] ?>">Delete</button>
                        </td>
                        <div class="popup-container">
                            <div class="popup" id="popupEdit<?php echo $roti['id'] ?>">
                                <div class="popup-content">
                                    <h3>Edit Data</h3>
                                    <form action="./update.php?id=<?php echo $roti['id'] ?>" method="POST" enctype="multipart/form-data">
                                        <input type="text" id="bread-name" name="nama_roti" placeholder="Nama Roti" required>
                                        <input type="text" id="bread-price" name="harga_roti" placeholder="Harga Roti" required>
                                        <input type="number" id="bread-price" name="stok_roti" placeholder="Stok Roti" required>
                                        <input type="text" id="bread-price" name="desc_roti" placeholder="Deskripsi Roti" required>
                                        <input type="file" id="bread-price" name="gambar_roti" placeholder="Upload Gambar">
                                        <input type="submit" value="Simpan" name="update" id="simpan">
                                        <button id="close-popupEdit<?php echo $roti['id'] ?>">Tutup</button>
                                    </form>
                                </div>
                            </div>
                    </tr>
                <?php $i++;
                endforeach; ?>
            </tbody>
        </table>
        <div class="popup-container">
            <button class="add-button" id="show-popup">Tambah</button>
            <a href="./logout.php" style="text-decoration: none;"><button class="add-button" id="show-popup">Logout</button></a>
            <div class="popup" id="popup">
                <div class="popup-content">
                    <h3>Add Data</h3>
                    <form action="./create.php" method="POST" enctype="multipart/form-data">
                        <input type="text" id="bread-name" name="nama_roti" placeholder="Nama Roti" required>
                        <input type="text" id="bread-price" name="harga_roti" placeholder="Harga Roti" required>
                        <input type="number" id="bread-stok" name="stok_roti" placeholder="Stok Roti" required>
                        <input type="text" id="bread-desc" name="desc_roti" placeholder="Deskripsi Roti" required>
                        <input type="file" name="gambar_roti" placeholder="Upload Gambar" required>
                        <input type="submit" value="Simpan" name="add" id="simpan">
                        <button id="close-popup">Tutup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        <?php
        foreach ($data_roti as $roti) : ?>
            const showPopupButtonEdit_<?php echo $roti['id']; ?> = document.getElementById('show-popupEdit<?php echo $roti['id']; ?>');
            const closePopupButtonEdit_<?php echo $roti['id']; ?> = document.getElementById('close-popupEdit<?php echo $roti['id']; ?>');
            const popupEdit_<?php echo $roti['id']; ?> = document.getElementById('popupEdit<?php echo $roti['id'] ?>');
            const deleteButton_<?php echo $roti['id']; ?> = document.getElementById('delete-roti-<?php echo $roti['id']; ?>');

            showPopupButtonEdit_<?php echo $roti['id']; ?>.addEventListener('click', function() {
                event.preventDefault();
                popupEdit_<?php echo $roti['id']; ?>.style.display = 'block';
            });

            closePopupButtonEdit_<?php echo $roti['id']; ?>.addEventListener('click', function() {
                popupEdit_<?php echo $roti['id']; ?>.style.display = 'none';
            });

            deleteButton_<?php echo $roti['id']; ?>.addEventListener('click', function() {
                // Konfirmasi penghapusan, misalnya dengan prompt
                const confirmDelete = confirm("Apakah Anda yakin ingin menghapus roti ini?");

                if (confirmDelete) {
                    window.location.href = "./delete.php?id=<?php echo $roti['id']; ?>";
                }
            });
        <?php endforeach; ?>

        const showPopupButton = document.getElementById('show-popup');
        const closePopupButton = document.getElementById('close-popup');
        const popup = document.getElementById('popup');

        showPopupButton.addEventListener('click', function() {
            event.preventDefault();
            popup.style.display = 'block';
        });

        closePopupButton.addEventListener('click', function() {
            popup.style.display = 'none';
        });

        function updateClock() {
            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();

            hours = (hours < 10 ? "0" : "") + hours;
            minutes = (minutes < 10 ? "0" : "") + minutes;
            seconds = (seconds < 10 ? "0" : "") + seconds;

            var timeString = hours + ":" + minutes + ":" + seconds;
            document.getElementById("clock").textContent = "Time Zone: " + timeString + " <?php echo $timeZone; ?>";
        }
        setInterval(updateClock, 1000);
    </script>
</body>
</html>