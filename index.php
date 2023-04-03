<?php
session_start(); //memulai session
// 
error_reporting((0));
//---- sertakan file koneksi db----
include_once 'koneksi.php';
//---- sertakan models----
include_once 'models/Petugas.php';
include_once 'models/Anggota.php';
include_once 'models/Buku.php';
include_once 'models/Penerbit.php';
include_once 'models/Peminjaman.php';
include_once 'models/Pengarang.php';
include_once 'models/Pengembalian.php';
include_once 'models/User.php';


//---- sertakan potongan2 file template----
include_once 'header.php';
include_once 'navigation.php';

// area main di logic
//tangkep request menu di url ( index.php?hal=....)
$hal = $_REQUEST['hal'];
//jika ada request dari menu di url tampilkan hal sesuai request 
if(!empty($hal)){
    include_once $hal.'.php';
}
else{//jika tidak ada request dari menu diurl tampilkan hal home.
    include_once $hal.'home.php';
}
include_once 'footer.php';