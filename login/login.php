<?php
require '../functions/fungsi_login.php';
if (isset($_POST["login"])) {

   $email = $_POST["email"];
   $passwords = $_POST["password"];

   $result = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
   $result1 = mysqli_query($conn, "SELECT * FROM admin WHERE email='$email'");
   //cek email
   if (mysqli_num_rows($result) === 1) {
      // cek password
      $row = mysqli_fetch_assoc($result);
      if (password_verify($passwords, $row["password"])) {
         header("Location: ../user/awal.php");
         exit;
      }
   } elseif (mysqli_num_rows($result1) === 1) {
      $row = mysqli_fetch_assoc($result1);
      if (password_verify($passwords, $row["password"])) {
         header("Location: ../admin/awal.php");
         exit;
      }
   }

   $error = true;
}

if (isset($_POST["daftar"])) {
   if (user($_POST) > 0) {
      echo "
            <script>
               alert('user baru berhasil di tambahkan');
            </script>";
      header("Location: ../user/awal.php");
   } else {
      echo mysqli_errno($conn);
   }
}
?>

<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

   <!-- My CSS -->
   <link rel="stylesheet" href="../css/awalstyle.css">
   <link rel="stylesheet" href="../css/loginstyle.css">


   <title>Login</title>
</head>

<body>
   <!-- Awal Navbar -->
   <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
         <a class="navbar-brand" href="#">Navbar</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
               <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
               <a class="nav-link" href="#">Menu</a>
               <a class="nav-link" href="#">About</a>
               <a class="btn btn-primary" href="#">Login</a>
            </div>
         </div>
      </div>
   </nav>
   <!-- Akhir Navbar -->

   <!-- Form Login -->
   <div class="card-login">
      <h2 class="judul">Login</h2>
      <form action="" method="post">
         <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" autocomplete="on" required />
         </div>
         <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" autocomplete="on" required />
         </div>
         <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Ingat Saya</label>
         </div>
         <?php if (isset($error)) : ?>
            <p class="error">email / password anda salah</p>
         <?php endif ?>
         <div class="tengah">
            <button type="submit" class="btn btn-primary tombol" name="login">Submit</button>
         </div>
      </form>
      <hr>
      <div class="tengah">
         <a href="daftar_akun.php" class="btn btn-success">Buat Akun Baru</a>
      </div>
      <!-- Akhir Login -->






















      <!-- Optional JavaScript; choose one of the two! -->

      <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

      <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>