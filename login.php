<?php
 session_start();
?>

<html>
 <head>
  <title>
   Smart Soft Studio Project | Photo Web
  </title>
  <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
  <link rel="stylesheet" type="text/css" href="css/main.css"/>
  <link rel="stylesheet" type="text/css" href="css/css/bootstrap.css"/>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/logoprojectkkn.png">
 </head>
 <body>
  <header>
  <a id="logo" href="index.php">
    <img src = 'images/projectkkn.png' width = 18% alt = "Logo">
  </a>
  <a id="login" href="login.php">
    LOGIN
  </a>
  <a id="login" href="registrasi.php">
    REGISTER
  </a>
   <nav>
     <ul>
       <li>
       <a href="index.php">
         Home
         </a>
       </li>
       <li>
       <a href="about.html">
         About
         </a>
       </li>
       <li>
       <a href="contact.html">
         Contact
         </a>
       </li>
     </ul>
   </nav>
  </header>
  <div id="wrapper">

  <section class="col-md-12">
    <div class="getBackground">
      <form action="" method="POST">
    <table class="table form-group col-md-8" align="center">
    <tr>
      <td class="col-md-3">
        Username
      </td>
      <td class="col-md-1">
        :
      </td>
      <td class="col-md-5">
        <input type="text" class="form-control" name="username" size="30" maxlength="20">
      </td>
    </tr>
    <tr>
      <td>
        Password
      </td>
      <td>
        :
      </td>
      <td>
        <input type="password" class="form-control" name="password" size="30" maxlength="20">
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" class="btn btn-primary" value="Login">
      </td>
    </tr>
  </table>
  </form>
  <a href="registrasi.php" class="btn btn-link">
        Belum Punya Akun?
  </a>
    </div>
  </section>

  <footer>
  <a href="https://www.facebook.com/GatokoWebsite/" target="_blank">
    <img src='images/facebook.png' width="30" height="30" alt="Akun Facebook">
  </a>
  <a href="https://twitter.com/gatokomegamall" target="_blank">
    <img src="images/twitter.png" width="30" height="30" alt="Akun Twitter">
  </a>
  <a href="https://plus.google.com/u/0/107605953049237471243" target="_blank">
    <img src="images/google.png" width="30" height="30" alt="Akun Email">
  </a>
   <p>&copy; Smart Soft Studio</p>
  </footer>
  </div>
 </body>
</html>

<?php
  include "koneksi.php";

  if($_POST){
    extract($_POST);

    $namauser = $username;
    $pass = md5($password);

    if (!is_null($namauser) && !is_null($pass)) {
      $query = "SELECT id_akun FROM akun WHERE username = '$namauser' and password = '$pass' LIMIT 1";
      $result = mysql_query($query);
      if(mysql_num_rows($result) or die(mysql_error()) > 0){
        $_SESSION['nama'] = $namauser;
        echo "<meta http-equiv='refresh' content='0; url=profil.php'>"; //meta refresh cari di wikipedia

        header('location:Home.php');
        // echo "berhasil";
      } else {
        echo "gagal";
      }
    }    
  }

?>