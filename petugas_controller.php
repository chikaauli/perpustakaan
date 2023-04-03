<?php
include_once 'koneksi.php';
include_once 'models/Petugas.php';
//step 1 tangkap request form
$nama = $_POST['nama'];
$foto = $_POST['foto'];
$jabatan_petugas = $_POST['jabatan_petugas'];
$no_telp = $_POST['no_telp'];
$alamat = $_POST['alamat'];
//step 2 simpan ke array
$data = [
    $nama, // ? 1
    $foto, // ? 2
    $jabatan_petugas, // ? 3
    $no_telp, // ? 4
    $alamat // ? 5
];
//step 3 eksekusi tombol dengan mekanisme PDO
$model = new Petugas();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':$model->simpan($data); break;

    case 'ubah':
        //tangkap hidden field idx untuk klausa where id
        // ? 10 (klausa where id = ?)
        $data[] = $_POST['idx']; $model->ubah($data); break;

    case 'hapus':
        unset($data);//hapus 5 ? di atas
        //panggil method hapus data disertai tangkap hidden filed idx untuk klausa where id
        $model->hapus($_POST['idx']); break;
    
    default:
        header('Location:index.php?hal=petugas');
        break;
}
//step 4 diarahkan ke suatu halaman, jika sudah selesai prosesnya
header('Location:index.php?hal=petugas');