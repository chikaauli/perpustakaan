<?php
class Petugas{
    //member1 variabel
    private $koneksi;
    //member2 konstruktor untuk koneksi database
    public function __construct(){
        global $dbh; //panggil instance object di koneksi.php 
        $this->koneksi = $dbh;
    }
    //member3 method2 CRUD
    public function dataPetugas(){
        $sql = "SELECT * FROM petugas";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll(); 
        return $rs;   
    }
    public function getPetugas($id){
        $sql = "SELECT * FROM petugas WHERE id = ?";
        //Menggunakan mekanisme prepare statement PDO//
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch(); 
        return $rs;   
    
    }
    public function simpan($data){
        $sql = "INSERT INTO petugas (nama_petugas, foto, jabatan_petugas, no_telp_petugas, alamat_petugas) VALUES (?,?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }
    public function ubah($data){
        $sql = "UPDATE petugas SET nama_petugas=?, foto=?, jabatan_petugas=?, no_telp_petugas=?, alamat_petugas=? WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }
    public function hapus($id){
        $sql = "DELETE FROM petugas WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);  
    }
}