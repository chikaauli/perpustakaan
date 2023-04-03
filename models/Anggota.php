<?php
class Anggota{
    //member1 variabel 
    private $konekasi;
    //member2 konstruktor unruk koneksi database
    public function __construct(){
        global $dbh; //panggil intance object di koneksi.php
        $this->koneksi = $dbh;
    }
    //members3 method2 CRUD
    public function dataAnggota(){
        $sql = "SELECT * FROM anggota";
        //Menggunakan mekanisme prepare statement PDO//
        //data_pegawai =$this->$koneksi->query($sql);\
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll(); 
        return $rs;   
    }

    public function getAnggota($id){
        $sql = "SELECT * FROM anggota WHERE id = ?";
        //Menggunakan mekanisme prepare statement PDO//
        //$sql = "SELECT a.kode_anggota, a.nama_anggota, a.jenis_kelamin, a.tgl_lahir, j.nama AS jurusan, a.alamat_anggota FROM anggota a INNER JOIN jurusan j ON j.id = a.jurusan_id WHERE a.id = ?";
        //menggunakan mekanisme prepare statement PDO
        //$data_pegawai =$this->$koneksi->query($sql);
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch(); 
        return $rs;   
    
    }
    public function simpan($data){
        $sql = "INSERT INTO anggota (kode_anggota, nama_anggota, jenis_kelamin, foto, tgl_lahir, jurusan_anggota, alamat_anggota) VALUES (?,?,?,?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }
    public function ubah($data){
        $sql = "UPDATE anggota SET kode_anggota=?, nama_anggota=?, jenis_kelamin=?, foto=?, tgl_lahir=?, jurusan_anggota=?, alamat_anggota=? WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }
    public function hapus($id){
        $sql = "DELETE FROM anggota WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);  
    }
}