<?php
class Peminjaman{
    //member1 variabel
    private $koneksi;
    //member2 konstruktor untuk koneksi database
    public function __construct(){
        global $dbh; //panggil instance object di koneksi.php 
        $this->koneksi = $dbh;
    }
    //member3 method2 CRUD
    public function dataPeminjaman(){
        $sql = "SELECT p.*, b.judul_buku, pe.nama_petugas AS petugas, a.nama_anggota AS anggota 
        FROM peminjaman p 
        INNER JOIN anggota a ON a.id = p.anggota_id 
        INNER JOIN buku b ON b.id = p.buku_id 
        INNER JOIN petugas pe ON pe.id = p.petugas_id";
        //$data_peminjaman = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll(); 
        return $rs;   
    }
    
    public function getpeminjaman($id){
        $sql = "SELECT p.*, b.judul_buku, pe.nama_petugas AS petugas, a.nama_anggota AS anggota
        FROM peminjaman p 
        INNER JOIN anggota a ON a.id = p.anggota_id
        INNER JOIN buku b ON b.id = p.buku_id
        INNER JOIN petugas pe ON pe.id = p.petugas_id
        WHERE p.id = ?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch(); 
        return $rs;   
    }
    public function simpan($data){
        $sql = "INSERT INTO peminjaman (tgl_pinjam, tgl_kembali, buku_id, foto, petugas_id, anggota_id) VALUES (?,?,?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }
    public function ubah($data){
        $sql = "UPDATE peminjaman SET tgl_pinjam=?, tgl_kembali=?, buku_id=?, foto=?,  petugas_id=?, anggota_id=?  WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }
    public function hapus($id){
        $sql = "DELETE FROM peminjaman WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);  
    }
}