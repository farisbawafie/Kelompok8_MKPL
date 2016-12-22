<html>
 <head>
  <title>
   Smart Soft Studio Project | Photo Web
  </title>
  <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
  <link rel="stylesheet" type="text/css" href="css/main.css"/>
  <link rel="stylesheet" type="text/css" href="css/css/bootstrap.css">
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

  <section>
    <div class="getBackground">
       <form action="" class="form-group" method="POST">
  <table class="table">
    <tr>
      <td>
        Username
      </td>
      <td>
        :
      </td>
      <td>
        <input type="text" name="username" class="form-control" size="30" maxlength="20">
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
        <input type="password" name="password" class="form-control" size="30" maxlength="20">
      </td>
    </tr>
    <tr>
      <td>
        Ulang Password
      </td>
      <td>
        :
      </td>
      <td>
        <input type="password" name="passwordtest" class="form-control" size="30" maxlength="20">
      </td>
    </tr>
    <tr>
      <td>
        <input type="submit" class="btn btn-primary" name="button" value="Register">
      </td>
    </tr>
  </table>
  </form>
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

  if (isset($_POST['button'])) {
    extract($_POST);

    $namauser = $username;
    $pass = md5($password);
    $passtest = md5($passwordtest);
  
  if (!is_null($namauser) && !is_null($pass) && !is_null($passtest)) {
    if ($passtest == $pass) {
      $query = "SELECT * FROM akun WHERE username = '$namauser' and password = '$pass'";
      $result = mysql_query($query);
      if (mysql_num_rows($result) > 0) {
        echo "<script>alert('Nama Sudah Ada')</script>";
      } else {
        $query = mysql_query("INSERT into akun VALUES('','$namauser','$pass')");
        echo "<meta http-equiv='refresh' content='0; url=login.php'>";
      }
    }
  } else {
    echo "<script>alert('Harap Isi Semua Kolom')</script>";
  }
  }
 
?>