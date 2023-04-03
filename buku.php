<?php
//ciptakan object dari class buku
$model = new Buku();
//panggil fungsi untuk menampilkan data pegawai
$data_buku = $model->dataBuku(); 
?>
<!-- ======= Blog Header ======= -->
<div class="header-bg page-area">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <div class="header-bottom">
                <div class="layer2">
                  <h1 class="title2">Daftar Buku </h1>
                </div>
                <div class="layer3">
                  <h6 class="title3">Walking Library</h6>
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
                <a class="btn btn-primary btn-sm" href="index.php?hal=buku_form" role="button"
                    title="Tambah Buku">
                    &nbsp;<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;
                </a>
                <br /><br />
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Penerbit Buku</th>
                            <th scope="col">Tahun Penerbit</th>
                            <th scope="col">Pengarang Buku</th>
                            <th scope="col">Nama rak</th>
                            <th scope="col">Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($data_buku as $row){
                        ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['kode_buku'] ?></td>
                            <td><?= $row['judul_buku'] ?></td>
                            <td><?= $row['penerbit'] ?></td>
                            <td><?= $row['tahun_penerbit'] ?></td>
                            <td><?= $row['pengarang'] ?></td>
                            <td><?= $row['rak_id'] ?></td>
                            <td><?= $row['foto'] ?></td>
                            <td>
                            <form action="buku_controller.php" method="POST">
                                <a href="index.php?hal=buku_detail&id=<?= $row['id'] ?>">
                                    <button type="button" class="btn btn-info btn-sm" title="Detail buku">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </a>
                                <a href="index.php?hal=buku_form&idedit=<?= $row['id'] ?>">
                                    <button type="button" class="btn btn-warning btn-sm" title="Ubah buku">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                    <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus"
                                        onclick="return confirm('Anda Yakin Data akan diHapus?')" title="Hapus buku">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                    <input type="hidden" name="idx" value="<?= $row['id'] ?>">
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
    </div>
</section>