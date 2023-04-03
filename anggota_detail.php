<?php
//tangkap request id dari klik tombol detail
$id = $_REQUEST['id'];
//ciptakan object dari class anggota
$model = new Anggota();
//panggil fungsi untuk menampilkan data anggota
$anggota = $model->getAnggota($id); 
?>
<!-- <section class="page-title bg-title overlay-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="title">
                    <h3>Anggota Details</h3>
                </div>
                <ol class="breadcrumb justify-content-center p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
                    <li class="breadcrumb-item active">Anggota Details</li>
                </ol>
            </div>
        </div>
    </div>
</section> -->

<!--====  End of Page Title  ====-->
<div class="header-bg page-area">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <div class="header-bottom">
                <div class="layer2">
                  <h1 class="title2">Pegawai Details</h1>
                </div>
                <ol class="breadcrumb justify-content-center p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
                    <li class="breadcrumb-item active">Anggota Details</li>
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
                <div class="col-lg-5 col-md-6 align-self-md-center">
                    <div class="image-block">
                        <img src="assets/img/anggota/<?= $anggota['foto'] ?>" class="img-fluid" alt="speaker">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 align-self-center">
                    <div class="content-block">
                        <div class="name">
                            <h3><?= $anggota['nama_anggota'] ?></h3>
                        </div>
                        <div class="profession">
                            <p><?= $anggota['jurusan_anggota'] ?></p>
                        </div>
                        <div class="alert alert-secondary" role="alert">
                            <ul class="mr-1">
                                <li>Jenis kelamin: <?= $anggota['jenis_kelamin'] ?></li>
                                <li>Tanggal Lahir: <?= $anggota['tgl_lahir'] ?></li>
                                <li>Alamat: <?= $anggota['alamat_anggota'] ?></li>
                            </ul>
                        </div>
                        <br />
                        <p align="right">
                            <a href="index.php?hal=anggota" class="btn btn-primary" title="back">
                                <i class="fa fa-hand-o-left" aria-hidden="true"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>