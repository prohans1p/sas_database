<?php

// Sisipkan file koneksi database
require_once("database.php");

// Cek apakah formulir telah dikirim
if(isset($_POST['submit'])) {
    // Ambil data dari formulir
    $username = $_POST['username'];
    $tanggal = $_POST['tanggal'];
    $pesan = $_POST['pesan'];

    // Simpan data ke database
    $query = "INSERT INTO notes (username, tanggal, pesan) VALUES ('$username', '$tanggal', '$pesan')";
    $result = mysqli_query($dbconnect, $query);

    // Periksa apakah data berhasil disimpan
    if($result) {
        header("Location: index.php ");
    } else {
        header("location:index.php?msg=gagal");
    }
}



// if (isset($_POST['submit']))
//     require_once("database.php");
//     if(isset($_POST['pesan'])) {
//         include 'index.php';
//         $username = $_POST['username'];
//         $pesan = $_POST['pesan'];
//         $sql = "INSERT INTO inpudata (username, pesan) values ('$username', '$pesan')";

//     }


// require_once 'database.php'; // Tambahkan titik koma

// if(empty($_POST)){
//     header("Location: index.php ");
//     exit;
// }

// if(!isset($_POST['username']) || empty($_POST['username'])){
//     header("Location: index.php ");
//     exit;
// }


// $sql = "INSERT INTO notes (pesan, tanggal, username)
// VALUES (:notes, now(), :username)"; // Perbaiki placeholder :tanggal

// $query = $tampil->prepare($sql);
// $query->execute(array(
//     'notes' => $_POST['notes'], // Perbaiki tanda panah dan tambahkan 'notes' dari $_POST
//     'username' => $_POST['username'] // Tambahkan 'username' dari $_POST
// ));
?>
