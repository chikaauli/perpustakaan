<?php
class Pengembalian{
    //member1 variabel
    private $koneksi;
    //member2 konstruktor untuk koneksi database
    public function __construct(){
        global $dbh; //panggil instance object di koneksi.php 
        $this->koneksi = $dbh;
    }
    //member3 method2 CRUD
    public function dataPengembalian(){
        $sql = "SELECT peng.*, b.judul_buku, pe.nama_petugas AS petugas, a.nama_anggota AS anggota 
        FROM pengembalian peng
        INNER JOIN anggota a ON a.id = peng.anggota_id 
        INNER JOIN buku b ON b.id = peng.buku_id 
        INNER JOIN petugas pe ON pe.id = peng.petugas_id";
        //$data_pengembalian = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll(); 
        return $rs;   
    }
    
    public function getPengembalian($id){
        $sql = "SELECT peng.*, b.judul_buku, pe.nama_petugas AS petugas, a.nama_anggota AS anggota
        FROM pengembalian peng
        INNER JOIN anggota a ON a.id = peng.anggota_id
        INNER JOIN buku b ON b.id = peng.buku_id
        INNER JOIN petugas pe ON pe.id = peng.petugas_id
        WHERE peng.id = ?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch(); 
        return $rs;   
    }
    public function simpan($data){
        $sql = "INSERT INTO pengembalian (tgl_pengembalian, denda, buku_id, foto, petugas_id, anggota_id) VALUES (?,?,?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }
    public function ubah($data){
        $sql = "UPDATE pengembalian SET tgl_pengembalian=?, denda=?, buku_id=?, foto=?,  petugas_id=?, anggota_id=?  WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }
    public function hapus($id){
        $sql = "DELETE FROM pengembalian WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);  
    }
}