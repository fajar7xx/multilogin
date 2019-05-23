<?php  

// register ini hanya untuk mencoba menambah user
// dalam aplikasi sebenarnya registrasi ini hanya dpt di buat oleh admin atau akuntan

require 'config/database.php';
require 'function/init.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url('node_modules/startbootstrap-sb-admin-2/vendor/fontawesome-free/css/all.min.css');?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url('node_modules/startbootstrap-sb-admin-2/css/sb-admin-2.css');?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" action="verifikasi.php" autocomplete="off">
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleInputName" placeholder="Full Name" name="nama">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="exampleInputEmail" placeholder="Email Address" name="email">
                </div>
                <div class="form-group">
                  <select class="form-control" name="type">
                    <option value="">Select Role Option</option>
                    <option value="admin">Admin</option>
                    <option value="akuntan">Akuntan</option>
                    <option value="siswa">Siswa</option>
                  </select>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password" name="pass1">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" id="exampleRepeatPassword" placeholder="Repeat Password" name="pass2">
                  </div>
                </div>
                <button type="submit" name="register" class="btn btn-primary btn-user btn-block">Register Account</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('node_modules/startbootstrap-sb-admin-2/vendor/jquery/jquery.min.js');?>"></script>
  <script src="<?=base_url('node_modules/startbootstrap-sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js');?>s"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('node_modules/startbootstrap-sb-admin-2/vendor/jquery-easing/jquery.easing.min.js');?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('node_modules/startbootstrap-sb-admin-2/vendor/bootstrap/js/sb-admin-2.min.js');?>"></script>

</body>

</html>
