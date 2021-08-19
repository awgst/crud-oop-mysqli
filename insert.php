<?php
    include('koneksi.php');
    $koneksi = new koneksi('localhost', 'root', '', 'oop_mysql_db');
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];

    $koneksi->insert($nama, $nim, $email);

?>