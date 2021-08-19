<?php
    class koneksi{
        public function __construct($host, $user, $password, $database){
            $GLOBALS['mysqli'] = new mysqli($host, $user, $password) or die(mysqli_error);
            $select = mysqli_select_db($GLOBALS['mysqli'], $database);
            if(!$select){
                $sql = "CREATE DATABASE ".$database;
                $result = $GLOBALS['mysqli']->query($sql);
                if ($result) {
                   echo "Database berhasil dibuat!";
                }
                else{
                    echo "Database gagal dibuat!";
                }
            }
        }
        public function insert($nama, $nim, $email){
            $sql = "INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`) VALUES (NULL, '$nama', '$nim', '$email')";
            try {
                $query = $GLOBALS['mysqli']->query($sql);
                if($query!==""){
                    header("location: index.php?message=inserted");
                }
                else{
                    throw new Exception($GLOBALS['mysqli']-> error);
                }
                
            } catch (Exception $e) {
                echo $e;
            }
        }
        public function getByID($id){
            $sql = "SELECT * FROM mahasiswa WHERE id = '$id'";
            try {
                $query = $GLOBALS['mysqli']->query($sql);
                if($query){
                    $result = $query->fetch_assoc();
                    return $result;
                }
                else{
                    throw new Exception($GLOBALS['mysqli']-> error);
                }
            } catch (Exception $e) {
                echo $e;
            }
        }
        public function createTable(){
            $sql = "CREATE TABLE IF NOT EXISTS mahasiswa (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, nama VARCHAR(30) NOT NULL, nim VARCHAR(30) NOT NULL, email VARCHAR(50))";
            $result = $GLOBALS['mysqli']->query($sql) or die($GLOBALS['mysqli']-> error);
            if($result){
                echo "Tabel berhasil dibuat";
            }
        }
        public function cekTable(){
            $sql = "SELECT * FROM mahasiswa";
            try {
                $query = $GLOBALS['mysqli']->query($sql);
                if($query){
                    return true;
                }
                else{
                    throw new Exception('');
                }
            } catch (Exception $e) {
                return false;
            }

        }
        public function read(){
            $sql = "SELECT * FROM mahasiswa";
            try {
                $query = $GLOBALS['mysqli']->query($sql);
                if($query){
                    return $query;
                }
                else{
                    throw new Exception($GLOBALS['mysqli']-> error);
                }
            } catch (Exception $e) {
                echo $e;
            }
        }
        public function edit($id, $nama, $nim, $email){
            $sql = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', email = '$email' WHERE id = '$id'";
            try {
                $query = $GLOBALS['mysqli']->query($sql);
                if($query!==""){
                    header("location: index.php?message=edited");
                }
                else{
                    throw new Exception($GLOBALS['mysqli']-> error);
                }
                
            } catch (Exception $e) {
                echo $e;
            }
        }
        public function delete($id){
            $sql = "DELETE FROM mahasiswa WHERE id = '$id'";
            try {
                $query = $GLOBALS['mysqli']->query($sql);
                if($query!==""){
                    header("location: index.php?message=deleted");
                }
                else{
                    throw new Exception($GLOBALS['mysqli']-> error);
                }
                
            } catch (Exception $e) {
                echo $e;
            }
        }
    }
?>