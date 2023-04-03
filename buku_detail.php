<?php
//tangkap request id dari klik tombol detail
$id = $_REQUEST['id'];
//ciptakan object dari class buku
$model = new Buku();
//panggil fungsi untuk menampilkan data buku
$buku = $model->getBuku($id); 
?>

<!--====  End of Page Title  ====-->
<div class="header-bg page-area">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <div class="header-bottom">
                <div class="layer2">
                  <h1 class="title2">Buku Details</h1>
                </div>
                <ol class="breadcrumb justify-content-center p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
                    <li class="breadcrumb-item active">buku Details</li>
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
                        <img src="assets/img/buku/<?= $buku['foto'] ?>" width="50%"  class="img-fluid" alt="speaker">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6 align-self-center">
                    <div class="content-block">
                        <div class="name">
                            <h3><?= $buku['judul_buku'] ?></h3>
                        </div>
                        <div class="profession">
                            <p><?= $buku['penerbit'] ?></p>
                        </div>
                        <div class="alert alert-secondary" role="alert">
                            <ul class="mr-1">
                                <li>Tahun Penerbit: <?= $buku['tahun_penerbit'] ?></li>
                                <li>Pengarang Buku: <?= $buku['pengarang'] ?></li>
                                <li>Nama rak :<?= $buku['rak_id'] ?></li>
                            </ul>
                        </div>
                        <br />
                        <p align="right">
                            <a href="index.php?hal=buku" class="btn btn-primary" title="back">
                                <i class="fa fa-hand-o-left" aria-hidden="true"></i>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>