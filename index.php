
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
  <a id="login" href="login.php">
    LOGIN
  </a>
  <a id="login" href="registrasi.php">
    REGISTER
  </a>
   <nav>
     <ul>
       <li>
       <a href="index.php" class="selected">
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
  <div class="pbs-row pbs_row_uid_6aqpuz">
    <div class="pbs-col pbs_col_uid_63lijc">
      <p style="text-align: center;">Selamat datang di website foto <span style="font-weight: bold;">Smart Soft Studio</span>. Kami memberikan pelayanan untuk saling berbagi karya foto maupun design dalam mengembangkan ide dan mengeksplorasi teknik foto maupun design yang memiliki ciri khas tersendiri. <br><span style="font-weight: bold;">Just Join and Enjoy! <hr /><hr width="75%"/></span></br></p>
    </div>
  </div>
  <br></br>
   <ul id="gallery">

     <?php
      include "koneksi.php";
      $query = mysql_query("SELECT * FROM foto");

      while ($temp = mysql_fetch_array($query)) {
        echo "
          <li>
          <a>
             <img src='upload/".$temp['foto']."' width='270' height='250' alt='Gallery'>
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