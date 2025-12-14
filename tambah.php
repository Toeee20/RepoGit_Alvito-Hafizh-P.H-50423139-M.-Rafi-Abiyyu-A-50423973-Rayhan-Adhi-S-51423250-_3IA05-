<?php
header('Content-Type: application/json');
include 'config.php';

$action = $_GET['action'] ?? '';

if ($action == 'read') {
    $query = "SELECT * FROM mahasiswa ORDER BY id DESC";
    $result = mysqli_query($conn, $query);
    $data = [];
    
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    echo json_encode($data);
    exit;
}

if ($action == 'create' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $nim = mysqli_real_escape_string($conn, $_POST['nim']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    
    $query = "INSERT INTO mahasiswa (nim, nama, jurusan) VALUES ('$nim', '$nama', '$jurusan')";
    $success = mysqli_query($conn, $query);
    echo json_encode(['success' => $success]);
    exit;
}

if ($action == 'update' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $nim = mysqli_real_escape_string($conn, $_POST['nim']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    
    $query = "UPDATE mahasiswa SET nim='$nim', nama='$nama', jurusan='$jurusan' WHERE id=$id";
    $success = mysqli_query($conn, $query);
    echo json_encode(['success' => $success]);
    exit;
}

if ($action == 'delete' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $query = "DELETE FROM mahasiswa WHERE id=$id";
    $success = mysqli_query($conn, $query);
    echo json_encode(['success' => $success]);
    exit;
}
?>
