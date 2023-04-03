<?php
session_start();
include_once 'koneksi.php';
include_once 'models/User.php';
//step 1 tangkap request form login
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$foto = $_POST['foto'];
$username = $_POST['username'];
$password= $_POST['password'];
$role = $_POST['role'];
//step 2 simpan ke array
$data = [
    $fullname, // ? 1
    $email, // ? 2
    $foto, // ? 3
    $username, // ? 4
    $password, //5
    $role // ? 6
];
//step 3 proses otentikasi user
$model = new User();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':$model->simpan($data); break;

    case 'ubah':
        //tangkap hidden field idx untuk klausa where id
        // ? 10 (klausa where id = ?)
        $data[] = $_POST['idx']; $model->ubah($data); break;

    case 'hapus':
        unset($data);//hapus 7 ? di atas
        //panggil method hapus data disertai tangkap hidden filed idx untuk klausa where id
        $model->hapus($_POST['idx']); break;
    
    default:
        header('Location:index.php?hal=user');
        break;
}
//step 4 diarahkan ke suatu halaman, jika sudah selesai prosesnya
header('Location:index.php?hal=user');