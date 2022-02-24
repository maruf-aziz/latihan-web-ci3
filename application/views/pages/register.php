<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url('assets/auth/') ?>fonts/icomoon/style.css">

  <link rel="stylesheet" href="<?= base_url('assets/auth/') ?>css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/auth/') ?>css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="<?= base_url('assets/auth/') ?>css/style.css">

  <title>Login</title>
</head>

<body>



  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?= base_url('assets/auth/') ?>images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <h3>Register</h3>
                <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
              </div>

              <?php if ($this->session->flashdata('auth')) : ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                  <strong><?= $this->session->flashdata('auth') ?></strong>
                </div>
              <?php endif ?>

              <form action="<?= base_url('auth/registerAction') ?>" method="post">
                <div class="form-group first">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" id="username" autocomplete="off">

                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" id="password" autocomplete="off">
                </div>
                <div class="form-group last mb-4">
                  <label for="fullname">Fullname</label>
                  <input type="text" name="fullname" class="form-control" id="fullname" autocomplete="off">
                </div>

                <input type="submit" value="Register" class="btn btn-block btn-primary">

                <center class="mt-3">
                  <a href="<?= base_url('auth') ?>">Login</a>
                </center>
              </form>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>


  <script src="<?= base_url('assets/auth/') ?>js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url('assets/auth/') ?>js/popper.min.js"></script>
  <script src="<?= base_url('assets/auth/') ?>js/bootstrap.min.js"></script>
  <script src="<?= base_url('assets/auth/') ?>js/main.js"></script>
</body>

</html>