<?php
//ciptakan object dari class petugas
$obj_petugas = new Petugas();
//panggil fungsi untuk menampilkan data petugas
$data_petugas = $obj_petugas->dataPetugas(); 

//------------proses edit data------------
//tangkap request idedit di url (setelah klik tombol edit/icon pencil)
$idedit = $_REQUEST['idedit'];
$petu = !empty($idedit) ? $obj_petugas->getPetugas($idedit) : array() ;
?>
<!--====  End of Page Title  ====-->
<div class="header-bg page-area">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <div class="header-bottom">
                <div class="layer2">
                  <h1 class="title2">Input Petugas</h1>
                </div>
                <ol class="breadcrumb justify-content-center p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
                    <li class="breadcrumb-item active">Input Petugas</li>
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
                        <h3>Input <span class="alternate">Petugas</span></h3>
                    </div>
                </div>
            </div>
        <form action="petugas_controller.php" method="POST" class="row">
            <div class="col-md-6">
                <label class="form-label"><b>Nama</b></label>
                <input type="text" class="form-control main" name="nama" id="nama" placeholder="Nama"
                    value="<?= $petu['nama_petugas'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Foto</b></label>
                <input type="text" class="form-control main" name="foto" id="foto" placeholder="Foto"
                    value="<?= $petu['foto'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Jabatan</b></label>
                <input type="text" class="form-control main" name="jabatan_petugas" id="jabatan" placeholder="Jabatan"
                    value="<?= $petu['jabatan_petugas'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Nomor Telepon</b></label>
                <input type="tel" class="form-control main" name="no_telp" value="<?= $petu['no_telp_petugas'] ?>">
            </div>
            
            <div class="col-md-12">
                <label class="form-label"><b>Alamat</b></label>
                <textarea name="alamat" id="alamat" class="form-control main" rows="10"
                    placeholder="Alamat"><?= $petu['alamat_petugas'] ?></textarea>
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