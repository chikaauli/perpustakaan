<?php
//ciptakan object dari class peminjaman
$obj_anggota = new Anggota();
$obj_buku = new Buku();
$obj_petugas = new Petugas();
$obj_peminjaman = new Peminjaman();
//panggil fungsi untuk menampilkan data peminjaman
$data_anggota = $obj_anggota->dataAnggota(); 
$data_buku = $obj_buku->dataBuku();
$data_petugas = $obj_petugas->dataPetugas();

//------------proses edit data------------
//tangkap request idedit di url (setelah klik tombol edit/icon pencil)
$idedit = $_REQUEST['idedit'];
$pinjam = !empty($idedit) ? $obj_peminjaman->getPeminjaman($idedit) : array() ;
?>
<!--====  End of Page Title  ====-->
<div class="header-bg page-area">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <div class="header-bottom">
                <div class="layer2">
                  <h1 class="title2">Input peminjaman</h1>
                </div>
                <ol class="breadcrumb justify-content-center p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
                    <li class="breadcrumb-item active">Input peminjaman</li>
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
                        <h3>Input <span class="alternate">peminjaman</span></h3>
                    </div>
                </div>
            </div>
        <form action="peminjaman_controller.php" method="POST" class="row">
            <div class="col-md-6">
                <label class="form-label"><b>Tanggal Peminjaman</b></label>
                <input type="date" class="form-control main" name="tgl_pinjam" value="<?= $pinjam['tgl_pinjam'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Tanggal Pengembalian</b></label>
                <input type="date" class="form-control main" name="tgl_kembali" value="<?= $pinjam['tgl_kembali'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Judul Buku</b></label>
                <div class="form-group">
                    <select class="form-control main" name="judul">
                        <option selected>-- Pilih buku  --</option>
                        <?php
                    foreach($data_buku as $buku){
                        //edit buku
                        $sel1 = $pinjam['buku_id'] == $buku['id'] ? 'selected' : '';
                    ?>
                        <option value=" <?= $buku['id'] ?>" <?= $sel1 ?>><?= $buku['judul_buku'] ?></option>
                        <?php
                    }
                    ?>
                    </select>
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Foto</b></label>
                <input type="text" class="form-control main" name="foto" id="foto" placeholder="Foto"
                    value="<?= $pinjam['foto'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>petugas</b></label>
                <div class="form-group">
                    <select class="form-control main" name="petugas">
                        <option selected>-- Pilih petugas --</option>
                        <?php
                    foreach($data_petugas as $petu){
                        //edit petugas
                        $sel1 = $pinjam['petugas_id'] == $petu['id'] ? 'selected' : '';
                    ?>
                        <option value=" <?= $petu['id'] ?>" <?= $sel1 ?>><?= $petu['nama_petugas'] ?></option>
                        <?php
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>anggota</b></label>
                <div class="form-group">
                    <select class="form-control main" name="anggota">
                        <option selected>-- Pilih anggota --</option>
                        <?php
                    foreach($data_anggota as $angg){
                        //edit anggota
                        $sel1 = $pinjam['anggota_id'] == $angg['id'] ? 'selected' : '';
                    ?>
                        <option value=" <?= $angg['id'] ?>" <?= $sel1 ?>><?= $angg['nama_anggota'] ?></option>
                        <?php
                    }
                    ?>
                    </select>
                </div>
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