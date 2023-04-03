<?php
//ciptakan object dari class Pegawai
$model = new anggota();
//panggil fungsi untuk menampilkan data pegawai
$data_anggota = $model->dataAnggota(); 
?>

<!-- ======= Blog Header ======= -->
<div class="header-bg page-area">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <div class="header-bottom">
                <div class="layer2">
                  <h1 class="title2">Daftar Anggota </h1>
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
                <a class="btn btn-primary btn-sm" href="index.php?hal=anggota_form" role="button"
                    title="Tambah Anggota">
                    &nbsp;<i class="fa fa-plus" aria-hidden="true">Tambah</i>&nbsp;
                </a>
                <br /><br/>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Anggota</th>
                            <th scope="col">Nama Anggota</th>
                            <th scope="col">Jenis kelamin</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Jurusan Anggota</th>
                            <th scope="col">Alamat Anggota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($data_anggota as $row){
                        ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['kode_anggota'] ?></td>
                            <td><?= $row['nama_anggota'] ?></td>
                            <td><?= $row['jenis_kelamin'] ?></td>
                            <td><?= $row['tgl_lahir'] ?></td>
                            <td><?= $row['jurusan_anggota'] ?></td>
                            <td><?= $row['alamat_anggota'] ?></td>
                            <td>
                            <form action="anggota_controller.php" method="POST">
                                <a href="index.php?hal=anggota_detail&id=<?= $row['id'] ?>">
                                    <button type="button" class="btn btn-info btn-sm" title="Detail Anggota">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </a>
                                <a href="index.php?hal=anggota_form&idedit=<?= $row['id'] ?>">
                                    <button type="button" class="btn btn-warning btn-sm" title="Ubah Anggota">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                    <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus"
                                        onclick="return confirm('Anda Yakin Data akan diHapus?')" title="Hapus Anggota">
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
