<?php
    include('koneksi.php');
    $koneksi = new koneksi('localhost', 'root', '', 'oop_mysql_db');
    $id = $_GET['id'];
    $koneksi->delete($id);
?>