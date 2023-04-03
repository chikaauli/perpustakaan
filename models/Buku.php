<?php
class Buku{
    //member1 variabel
    private $koneksi;
    //member2 konstruktor untuk koneksi database
    public function __construct(){
        global $dbh; //panggil instance object di koneksi.php 
        $this->koneksi = $dbh;
    }
    //member3 method2 CRUD
    public function dataBuku(){
        $sql = "SELECT b.*, pen.nama_penerbit AS penerbit, peg.nama_pengarang AS pengarang
        FROM buku b 
        INNER JOIN penerbit pen ON pen.id = b.penerbit_id
        INNER JOIN pengarang peg ON peg.id = b.pengarang_id ";
        //$data_buku = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll(); 
        return $rs;   
    }
    
    public function getBuku($id){
        $sql = "SELECT b.*, pen.nama_penerbit AS penerbit, peg.nama_pengarang AS pengarang
        FROM buku b 
        INNER JOIN penerbit pen ON pen.id = b.penerbit_id
        INNER JOIN pengarang peg ON peg.id = b.pengarang_id
        WHERE b.id =?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch(); 
        return $rs;   
    }
    public function simpan($data){
        $sql = "INSERT INTO buku (kode_buku, judul_buku, foto, penerbit_id, tahun_penerbit, pengarang_id, rak_id) VALUES (?,?,?,?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }
    public function ubah($data){
        $sql = "UPDATE buku SET kode_buku=?, judul_buku=?, foto=?, penerbit_id=?, tahun_penerbit=?, pengarang_id=?, rak_id=? WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }
    public function hapus($id){
        $sql = "DELETE FROM buku WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);  
    }
}