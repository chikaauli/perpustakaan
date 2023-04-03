<?php
include_once 'koneksi.php';
include_once 'models/Buku.php';
//step 1 tangkap request form
$kode = $_POST['kode'];
$judul = $_POST['judul'];
$foto = $_POST['foto'];
$penerbit = $_POST['penerbit'];
$tahun = $_POST['tahun'];
$pengarang = $_POST['pengarang'];
$rak_id= $_POST['rak_id'];
//step 2 simpan ke array
$data = [
    $kode, // ? 1
    $judul, // ? 2
    $foto, // ? 3
    $penerbit, // ? 4
    $tahun, // ? 5
    $pengarang, // ? 6
    $rak_id // ? 7
];
//step 3 eksekusi tombol dengan mekanisme PDO
$model = new Buku();
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
        header('Location:index.php?hal=buku');
        break;
}
//step 4 diarahkan ke suatu halaman, jika sudah selesai prosesnya
header('Location:index.php?hal=buku');