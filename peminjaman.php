<?php
//ciptakan object dari class Pegawai
$model = new Peminjaman();
//panggil fungsi untuk menampilkan data pegawai
$data_peminjaman = $model->dataPeminjaman(); 
?>

<!-- ======= Blog Header ======= -->
<div class="header-bg page-area">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <div class="header-bottom">
                <div class="layer2">
                  <h1 class="title2">Daftar peminjaman </h1>
                </div>
                <div class="layer3">
                  <h6 class="title3 text-white">Walking Library</h6>
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
                <a class="btn btn-primary btn-sm" href="index.php?hal=peminjaman_form" role="button"
                    title="Tambah peminjaman">
                    &nbsp;<i class="fa fa-plus" aria-hidden="true">Tambah</i>&nbsp;
                </a>
                <br /><br/>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tgl Peminjaman</th>
                            <th scope="col">Tgl Pengembalian</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Nama Petugas</th>
                            <th scope="col">Nama Anggota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($data_peminjaman as $row){
                        ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['tgl_pinjam'] ?></td>
                            <td><?= $row['tgl_kembali'] ?></td>
                            <td><?= $row['judul_buku'] ?></td>
                            <td><?= $row['petugas'] ?></td>
                            <td><?= $row['anggota'] ?></td>
                            <td>
                            <form action="peminjaman_controller.php" method="POST">
                                <a href="index.php?hal=peminjaman_detail&id=<?= $row['id'] ?>">
                                    <button type="button" class="btn btn-info btn-sm" title="Detail peminjaman">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </a>
                                <a href="index.php?hal=peminjaman_form&idedit=<?= $row['id'] ?>">
                                    <button type="button" class="btn btn-warning btn-sm" title="Ubah peminjaman">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                    <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus"
                                        onclick="return confirm('Anda Yakin Data akan diHapus?')" title="Hapus peminjaman">
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
