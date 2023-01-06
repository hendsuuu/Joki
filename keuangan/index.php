<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tutty Fruitty</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<style>
  body{
    background-color: #E38B29;
  }
  h3{
    color:#FFF ;
  }
  h4{
    color: #E38B29;
  }
  .login-box-body{
    height: 400px;
    text-align: center;
    scale: 1.3;
    margin-top: 50px;
    border-radius: 3px;
  }
  .btn{
    background-color: #E38B29;
    border-radius: 3px;
    border-color: #E38B29;
    color: #FFF;
  }
  .btn:hover{
    background-color: #FFD8A9;
    border: 2px solid #E38B29;
    color: black;
  }
  .btn:active{
    background-color: #E38B29;
  }
  input[type="text"]{
    border-radius: 3px;
  }
  input[type="text"]:focus{
    border: 1px solid #E38B29;
    border-radius: 3px;
  }
  input[type="password"]{
    border-radius: 3px;
  }
  input[type="password"]:focus{
    border: 1px solid #E38B29;
  }

</style>

<body >
  <div class="container">
    <div class="login-box">

      <center>

        <h3><b>TUTTY FRUITTY</b></h3>


        <br />

        <?php
        if (isset($_GET['alert'])) {
          if ($_GET['alert'] == "gagal") {
            echo "<div class='alert alert-danger'>LOGIN GAGAL! USERNAME DAN PASSWORD SALAH!</div>";
          } else if ($_GET['alert'] == "logout") {
            echo "<div class='alert alert-success'>ANDA TELAH BERHASIL LOGOUT</div>";
          } else if ($_GET['alert'] == "belum_login") {
            echo "<div class='alert alert-warning'>ANDA HARUS LOGIN UNTUK MENGAKSES DASHBOARD</div>";
          }
        }
        ?>
      </center>

      <div class="login-box-body">

        <div class="text-center"> <img class="logo" src="assets/img/logo.jpeg" style="max-width:30%;">
          <br>

          <span style="color: Black;">
            <center>
              <h4><B>TUTTY FRUITTY</B></h4>
            </center>
          </span></p>
          <span style="color: black;">
            <center>
              <h5>Masukkan User & Password Anda</h5>
            </center>
          </span></p>

          <form action="periksa_login.php" method="POST">
            <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Username" name="username" required="required" autocomplete="off">
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password" name="password" required="required" autocomplete="off">
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-offset-4 col-xs-4">
                <button type="submit" class="btn">Sign In</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>

    <span style="color: white;">
      <center>
        <h5>copyright 2020 @nblwarehouse</h5>
      </center>
    </span></p>

    <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

</html>