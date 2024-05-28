<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'notes_pplg1');

// Membuat koneksi ke database
$dbconnect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Memeriksa koneksi
if (!$dbconnect) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Fungsi untuk menjalankan kueri SELECT
function kuery($kueri)
{
    global $dbconnect;
    $result = mysqli_query($dbconnect, $kueri);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Fungsi untuk menjalankan kueri INSERT, UPDATE, DELETE
function jalankan_kueri($kueri)
{
    global $dbconnect;
    $result = mysqli_query($dbconnect, $kueri);
    return $result;
}

// Fungsi untuk mengambil data berdasarkan ID
function ambil_data_by_id($table, $id)
{
    global $dbconnect;
    $result = mysqli_query($dbconnect, "SELECT * FROM $table WHERE id='$id'");
    $row = mysqli_fetch_assoc($result);
    return $row;
}

// Fungsi untuk mengupdate data
function update_data($table, $data, $id)
{
    global $dbconnect;
    $sql = "UPDATE $table SET notes='$data' WHERE id='$id'";
    $result = mysqli_query($dbconnect, $sql);
    return $result;
}

// Fungsi untuk menghapus data
function hapus_data($table, $id)
{
    global $dbconnect;
    $result = mysqli_query($dbconnect, "DELETE FROM $table WHERE id='$id'");
    return $result;
}

// Fungsi untuk memeriksa login
function cek_login($username, $password)
{
    global $dbconnect;
    $uname = mysqli_real_escape_string($dbconnect, $username);
    $upass = mysqli_real_escape_string($dbconnect, $password);

    $hasil = mysqli_query($dbconnect, "SELECT * FROM user WHERE username='$uname' AND password=md5('$upass')");
    $cek = mysqli_num_rows($hasil);

    if ($cek > 0) {
        return true;
    } else {
        return false;
    }
}
?>
