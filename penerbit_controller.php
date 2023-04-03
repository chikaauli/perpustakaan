<?php
include_once 'koneksi.php';
include_once 'models/Penerbit.php';
//step 1 tangkap request form
$nama = $_POST['nama'];
//step 2 simpan ke array
$data = [
    $nama // ? 1
];
//step 3 eksekusi tombol dengan mekanisme PDO
$model = new Penerbit();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':$model->simpan($data); break;

    case 'ubah':
        //tangkap hidden field idx untuk klausa where id
        // ? 10 (klausa where id = ?)
        $data[] = $_POST['idx']; $model->ubah($data); break;

    case 'hapus':
        unset($data);//hapus 1 ? di atas
        //panggil method hapus data disertai tangkap hidden filed idx untuk klausa where id
        $model->hapus($_POST['idx']); break;
    
    default:
        header('Location:index.php?hal=penerbit');
        break;
}
//step 4 diarahkan ke suatu halaman, jika sudah selesai prosesnya
header('Location:index.php?hal=penerbit');