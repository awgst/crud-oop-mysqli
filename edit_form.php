<?php
    include('koneksi.php');
    $koneksi = new koneksi('localhost', 'root', '', 'oop_mysql_db');
    $id = $_GET['id'];
    $result = $koneksi->getById($id);
?>
<head>
    <title>Edit</title>
</head>
<body>
<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?= $result['id'] ?>">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>
                    <input type="text" placeholder="Nama" name="nama" value="<?= $result['nama'] ?>">
                </td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td>
                    <input type="text" placeholder="NIM"  name="nim" value="<?= $result['nim'] ?>">
                </td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td>:</td>
                <td>
                    <input type="text" placeholder="E-Mail"  name="email" value="<?= $result['email'] ?>">
                </td>
            </tr>
        </table>
        <input type="submit">
    </form>
</body>
</html>