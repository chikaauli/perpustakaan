<?php
//ciptakan object dari class anggota 
$obj_anggota = new Anggota();
//panggil fungsi untuk menampilkan data anggota
$data_anggota = $obj_anggota->dataAnggota(); 

//------------proses edit data------------
//tangkap request idedit di url (setelah klik tombol edit/icon pencil)
$idedit = $_REQUEST['idedit'];
$angg = !empty($idedit) ? $obj_anggota->getAnggota($idedit) : array() ;
?>
<!--====  End of Page Title  ====-->
<div class="header-bg page-area">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <div class="header-bottom">
                <div class="layer2">
                  <h1 class="title2">Input Anggota </h1>
                </div>
                <ol class="breadcrumb justify-content-center p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
                    <li class="breadcrumb-item active">Input Anggota</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
        <div class="block">
            <div class="row py-5">
                <div class="col-12">
                    <div class="section-title">
                        <h3>Input <span class="alternate">Anggota</span></h3>
                    </div>
                </div>
            </div>
        <form action="anggota_controller.php" method="POST" class="row">
            <div class="col-md-6">
                <label class="form-label"><b>Kode Anggota</b></label>
                <input type="text" class="form-control main" name="kode" id="kode" placeholder="Kode"
                    value="<?= $angg['kode_anggota'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Nama</b></label>
                <input type="text" class="form-control main" name="nama" id="nama" placeholder="Nama"
                    value="<?= $angg['nama_anggota'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Jenis Kelamin</b></label>
                <?php
                $ar_gender = ['L'=>'Laki-Laki', 'P'=>'Perempuan'];
                foreach($ar_gender as $k => $jk){
                    //proses edit gender
                    $cek = $angg['jenis_kelamin'] == $k ? 'checked' : '';
                ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="<?= $k ?>" <?= $cek ?>>
                    <label class="form-check-label"><?= $jk ?></label>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Foto</b></label>
                <input type="text" class="form-control main" name="foto" id="foto" placeholder="Foto"
                    value="<?= $angg['foto'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Jurusan</b></label>
                <input type="text" class="form-control main" name="jurusan" id="jurusan" placeholder="Jurusan"
                    value="<?= $angg['jurusan_anggota'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Tanggal lahir</b></label>
                <input type="date" class="form-control main" name="tgl_lahir" value="<?= $angg['tgl_lahir'] ?>">
            </div>
            
            <div class="col-md-12">
                <label class="form-label"><b>Alamat</b></label>
                <textarea name="alamat" id="alamat" class="form-control main" rows="10"
                    placeholder="Alamat"><?= $angg['alamat_anggota'] ?></textarea>
            </div>
            <div class="col-12 text-center">
                <?php
                //----------modus entri data baru, form dlm keadaan kosong-------------
                if(empty($idedit)){
                ?>
                <button type="submit" name="proses" value="simpan" class="btn btn-success btn-lg">Simpan</button>
                <?php
                }
                //----------modus edit data lama, form terisi data lama -------------
                else{
                ?>
                <button type="submit" name="proses" value="ubah" class="btn btn-warning btn-lg">Ubah</button>
                <!-- hidden field untuk klausa where id=? -->
                <input type="hidden" name="idx" value="<?= $idedit ?>">
                <?php } ?> <button type=" submit" name="proses" value="batal" class="btn btn-info btn-lg">
                    Batal</button>


            </div>
        </form>
    </div>
</section>
</form>
</div>
</section>