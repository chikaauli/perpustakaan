<?php
//ciptakan object dari class buku, penerbit & pengarang
$obj_penerbit = new Penerbit();
$obj_pengarang= new Pengarang();
$obj_buku = new Buku();
//pbukuil fungsi untuk menampilkan data penerbit & pengarang
$data_penerbit = $obj_penerbit->dataPenerbit();
$data_pengarang = $obj_pengarang->dataPengarang(); 

//------------proses edit data------------
//tangkap request idedit di url (setelah klik tombol edit/icon pencil)
$idedit = $_REQUEST['idedit'];
$buku = !empty($idedit) ? $obj_buku->getbuku($idedit) : array() ;
?>
<!--====  End of Page Title  ====-->
<div class="header-bg page-area">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <div class="header-bottom">
                <div class="layer2">
                  <h1 class="title2">Input buku </h1>
                </div>
                <ol class="breadcrumb justify-content-center p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
                    <li class="breadcrumb-item active">Input buku</li>
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
                        <h3>Input <span class="alternate">Buku</span></h3>
                    </div>
                </div>
            </div>
        <form action="buku_controller.php" method="POST" class="row">
            <div class="col-md-6">
                <label class="form-label"><b>Kode buku</b></label>
                <input type="text" class="form-control main" name="kode" id="kode" placeholder="Kode"
                    value="<?= $buku['kode_buku'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Judul Buku</b></label>
                <input type="text" class="form-control main" name="judul" id="judul" placeholder="Judul"
                    value="<?= $buku['judul_buku'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Foto</b></label>
                <input type="text" class="form-control main" name="foto" id="foto" placeholder="Foto"
                    value="<?= $buku['foto'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Penerbit</b></label>
                <div class="form-group">
                    <select class="form-control main" name="penerbit">
                        <option selected>-- Pilih penerbit --</option>
                        <?php
                    foreach($data_penerbit as $pen){
                        //edit penerbit
                        $sel1 = $buku['penerbit_id'] == $pen['id'] ? 'selected' : '';
                    ?>
                        <option value=" <?= $pen['id'] ?>" <?= $sel1 ?>><?= $pen['nama_penerbit'] ?></option>
                        <?php
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Tahun Buku</b></label>
                <input type="number" min="1900" max="<?=date('Y')?>" step="1" class="form-control main" name="tahun" id="tahun" placeholder="Tahun"
                    value="<?= $buku['tahun_penerbit'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Pengarang</b></label>
                <div class="form-group">
                    <select class="form-control main" name="pengarang">
                        <option selected>-- Pilih pengarang --</option>
                        <?php
                    foreach($data_pengarang as $peng){
                        //edit pengarang
                        $sel2 = $buku['pengarang_id'] == $peng['id'] ? 'selected' : '';
                    ?>
                        <option value="<?= $peng['id'] ?>" <?= $sel2 ?>><?= $peng['nama_pengarang'] ?></option>
                        <?php
                    }
                    ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Rak Buku</b></label>
                <div class="form-group">
                    <select class="form-control main" name="rak_id">
                        <option selected>-- Pilih rak --</option>
                        <?php
                        $no = 1;
                        $ar_rak = [
                            'Rack001' => 'Rack001',  'Rack011' => 'Rack011'
                        ];
                    foreach($ar_rak as $inisial => $rak) {
                        //edit pengarang
                        $sel3 = $buku['rak_id'] == $inisial ? 'selected' : '';
                    ?>
                        <option value="<?= $inisial ?>" <?= $sel3 ?>><?= $rak ?></option>
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