<?php
$sesi = $_SESSION['USER'];
?>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center ">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1><a href="index.html"><span>walking</span>Library</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
      <nav id="navbar" class="navbar d-block">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php?hal=home">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php?hal=about">About us</a></li>
          <li><a class="nav-link scrollto" href="index.php?hal=contact">Contact</a></li>
              <?php
                if(!isset($sesi)){ //---------jika belum/gagal login-----------
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="login_form.php">Login</a>
                </li>
                <?php
                }
                else{ //---------jika berhasil login-----------
                ?>
          <li class="dropdown"><a href="#"><span>Category buku</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="index.php?hal=anggota">Anggota</a></li>
                <li><a href="index.php?hal=buku">Buku</a></li>
                <li><a href="index.php?hal=peminjaman">Peminjaman</a></li>
                <li><a href="index.php?hal=penerbit">Penerbit</a></li>
                <li><a href="index.php?hal=pengarang">Pengarang</a></li>
                <li><a href="index.php?hal=pengembalian">Pengembalian</a></li>
                <li><a href="index.php?hal=petugas">Petugas</a></li>
              </ul>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link" href="#!" data-toggle="dropdown"><?= $sesi['fullname'] ?> <i
                      class="fa fa-angle-down"></i></a>
              <!-- Dropdown list -->
              <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="index.php?hal=user_profile&id=<?= $sesi['id'] ?>">Profile</a></li>
                  <?php
                  if($sesi['role'] == 'admin'){ //---------hanya untuk admin----------
                  ?>
                  <li><a class="dropdown-item" href="index.php?hal=user">Kelola User</a></li>
                  <?php } ?>

                  <li><a class="dropdown-item" href="logout.php">Logout</a>
                  </li>
              </ul>
          </li>
          <?php } ?>
        </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
  </div>
</header><!-- End Header -->

