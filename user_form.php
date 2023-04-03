<?php
//ciptakan object dari class user 
$obj_user = new User();
//puseril fungsi untuk menampilkan data user
$data_user = $obj_user->dataUser(); 

//------------proses edit data------------
//tangkap request idedit di url (setelah klik tombol edit/icon pencil)
$idedit = $_REQUEST['idedit'];
$user = !empty($idedit) ? $obj_user->getUser($idedit) : array() ;
?>
<!--====  End of Page Title  ====-->
<div class="header-bg page-area">
      <div class="container position-relative">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-content text-center">
              <div class="header-bottom">
                <div class="layer2">
                  <h1 class="title2">Input user </h1>
                </div>
                <ol class="breadcrumb justify-content-center p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
                    <li class="breadcrumb-item active">Input user</li>
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
                        <h3>Input <span class="alternate">user</span></h3>
                    </div>
                </div>
            </div>
        <form action="register_controller.php" method="POST" class="row">
            <div class="col-md-6">
                <label class="form-label"><b>Fullname</b></label>
                <input type="text" class="form-control main" name="fullname" id="fullname" placeholder="Fullname"
                    value="<?= $user['fullname'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Email</b></label>
                <input type="email" class="form-control main" name="email" id="email" placeholder="Email"
                    value="<?= $user['email'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Foto</b></label>
                <input type="text" class="form-control main" name="foto" id="foto" placeholder="Foto"
                    value="<?= $user['foto'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Username</b></label>
                <input type="text" class="form-control main" name="username" id="username" placeholder="Username"
                    value="<?= $user['username'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Password</b></label>
                <input type="password" class="form-control main" name="password" id="password" placeholder="Password"
                    value="<?= $user['password'] ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label"><b>Role</b></label>
                <input type="text" class="form-control main" name="role" value="<?= $user['role'] ?>">
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