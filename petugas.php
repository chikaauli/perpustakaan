<?php
//ciptakan object dari class Pegawai
$model = new Petugas();
//panggil fungsi untuk menampilkan data pegawai
$data_petugas = $model->dataPetugas(); 


//beri session untuk hak akses halaman pegawai
$sesi = $_SESSION['USER'];
if(isset($sesi)){
?>
<!-- ======= Blog Header ======= -->
<div class="header-bg page-area">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <div class="header-bottom">
                <div class="layer2">
                  <h1 class="title2">Daftar Petugas</h1>
                </div>
                <div class="layer3">
                  <h6 class="title3 text-secondary">Walking Library</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Blog Header -->
    <div class="container">
    <div class="row py-5">
            <div class="col-12">
                <a class="btn btn-primary btn-sm" href="index.php?hal=petugas_form" role="button"
                    title="Tambah Petugas">
                    &nbsp;<i class="fa fa-plus" aria-hidden="true">Tambah</i>&nbsp;
                </a>
                <br /><br/>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Petugas</th>
                            <th scope="col">Jabatan Petugas</th>
                            <th scope="col">Nomor Telepon</th>
                            <th scope="col">Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($data_petugas as $row){
                        ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['nama_petugas'] ?></td>
                            <td><?= $row['jabatan_petugas'] ?></td>
                            <td><?= $row['no_telp_petugas'] ?></td>
                            <td><?= $row['alamat_petugas'] ?></td>
                            <td>
                            <form action="petugas_controller.php" method="POST">
                                    <a href="index.php?hal=petugas_detail&id=<?= $row['id'] ?>">
                                        <button type="button" class="btn btn-info btn-sm" title="Detail Petugas">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="index.php?hal=petugas_form&idedit=<?= $row['id'] ?>">
                                        <button type="button" class="btn btn-warning btn-sm" title="Ubah Petugas">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                    <?php
                                    if($sesi['role'] != 'guest'){
                                    ?>
                                    <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus"
                                        onclick="return confirm('Anda Yakin Data akan diHapus?')" title="Hapus Pegawai">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                    <input type="hidden" name="idx" value="<?= $row['id'] ?>">
                                    <?php } ?>
                                </form>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php 
}
else{
    echo '<script>alert("Anda Terlarang Akses Halaman Ini!!!");history.back();</script>';
}
?>