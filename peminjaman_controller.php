<?php
include_once 'koneksi.php';
include_once 'models/Peminjaman.php';
//step 1 tangkap request form
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$judul = $_POST['judul'];
$foto = $_POST['foto'];
$petugas = $_POST['petugas'];
$anggota = $_POST['anggota'];
//step 2 simpan ke array
$data = [
    $tgl_pinjam, // ? 1
    $tgl_kembali, // ? 2
    $judul, // ? 3
    $foto, // ? 4
    $petugas, // ? 5
    $anggota, // ? 6

];
//step 3 eksekusi tombol dengan mekanisme PDO
$model = new Peminjaman();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':$model->simpan($data); break;

    case 'ubah':
        //tangkap hidden field idx untuk klausa where id
        // ? 10 (klausa where id = ?)
        $data[] = $_POST['idx']; $model->ubah($data); break;

    case 'hapus':
        unset($data);//hapus 6 ? di atas
        //panggil method hapus data disertai tangkap hidden filed idx untuk klausa where id
        $model->hapus($_POST['idx']); break;
    
    default:
        header('Location:index.php?hal=peminjaman');
        break;
}
//step 4 diarahkan ke suatu halaman, jika sudah selesai prosesnya
header('Location:index.php?hal=peminjaman');