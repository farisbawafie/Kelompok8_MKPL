<?php
  session_start();
  if ($_SESSION['nama']==null) {
    header('location:login.php');
  }

  include "koneksi.php";
  $nama = $_SESSION['nama'];
?>
<html>
 <head>
  <title>
   Smart Soft Studio Project | Photo Web
  </title>
  <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
  <link rel="stylesheet" type="text/css" href="css/main.css"/>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/logoprojectkkn.png">
 </head>
 <body>
  <header class="top">
  <a id="logo" href="index.php">
    <img src = 'images/projectkkn.png' width = 18% alt = "Logo">
  </a>
   <a id="login" href="logout.php">
    LOGOUT
  </a>
   <nav>
     <ul>
     <li>
       <a href="home.php" class="selected">
         Home
         </a>
       </li>
        <li>
        <a href="profil.php">
         <?php
          echo $nama;
         ?>
       </a>
       </li>
     </ul>
   </nav>
  </header>
  <div id="wrapper">
  <section>
  <div class="pbs-row pbs_row_uid_6aqpuz">
    <div class="pbs-col pbs_col_uid_63lijc">
      <h1 style="text-align: center;">Selamat datang  <hr /><hr width="75%"/></span></br></h1>
    </div>
   <ul id="gallery">
   <br><br/>
   

     <?php
      include "koneksi.php";
      $query = mysql_query("SELECT * FROM foto");

      while ($temp = mysql_fetch_array($query)) {
        echo "
          <li>
            <a href='upload/".$temp['foto']."' target='_blank'>
             <img src='upload/" .$temp['foto']."' width='270' height='250' alt='Gallery'>
             <p>".$temp['judul']."</p>
             <p>".$temp['username']."</p>
            </a>
          </li>
        ";
      }
     ?>

   </ul>
   <br><br/>
   <hr width="75%"/><hr />
   <center><a href="#top">- Go Top -</a></center>
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