<?php
    include('koneksi.php');
    $koneksi = new koneksi('localhost', 'root', '', 'oop_mysql_db');
    if($koneksi->cekTable()===FALSE){
        $koneksi->createTable();
    }
    $read = $koneksi->read();
?>
<html>
<head>
    <title>Document</title>
</head>
<body>
    <form action="insert.php" method="post">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                    <input type="text" placeholder="Nama" name="nama">
                </td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td>
                    <input type="text" placeholder="NIM"  name="nim">
                </td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td>:</td>
                <td>
                    <input type="text" placeholder="E-Mail"  name="email">
                </td>
            </tr>
        </table>
        <input type="submit">
    </form>
    <?php 
        if (isset($_GET['message'])) {
            if ($_GET['message']=="inserted") {
                echo "<p>Data berhasil ditambahkan</p>";
            }
            if ($_GET['message']=="edited") {
                echo "<p>Data berhasil diedit</p>";
            }
            if ($_GET['message']=="deleted") {
                echo "<p>Data berhasil dihapus</p>";
            }
        }
    ?>
    <table>
        <tr>
            <td>Id</td>
            <td>Nama</td>
            <td>NIM</td>
            <td>Email</td>
            <td>Aksi</td>
        </tr>
        <tbody>
        <?php
        while ($row = mysqli_fetch_array($read)) {?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['nim']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><a href="edit_form.php?id=<?= $row['id']; ?>">Edit</a> | <a href="delete.php?id=<?= $row['id']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>
</html>