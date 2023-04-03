<?php
include_once 'koneksi.php';
include_once 'models/Anggota.php';
//step 1 tangkap request form
$kode = $_POST['kode'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$foto = $_POST['foto'];
$tgl_lahir = $_POST['tgl_lahir'];
$jurusan = $_POST['jurusan'];
$alamat = $_POST['alamat'];
//step 2 simpan ke array
$data = [
    $kode, // ? 1
    $nama, // ? 2
    $jenis_kelamin, // ? 3
    $foto, // ? 4
    $tgl_lahir, // ? 5
    $jurusan, // ? 6
    $alamat // ? 7
];
//step 3 eksekusi tombol dengan mekanisme PDO
$model = new Anggota();
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
        header('Location:index.php?hal=anggota');
        break;
}
//step 4 diarahkan ke suatu halaman, jika sudah selesai prosesnya
header('Location:index.php?hal=anggota');