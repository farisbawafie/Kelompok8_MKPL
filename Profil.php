<?php
  session_start();
  if ($_SESSION['nama']==null) {
    header('location:login.php');
  }

  include "koneksi.php";
  $nama = $_SESSION['nama'];
?>

<?php
  if (isset($_POST['button'])) {
    $judul = $_POST['judul'];
    $judulNoSpace = str_replace(' ', '', $judul);
    $tmp_file = $_FILES['foto']['tmp_name'];
    $filename = $_FILES['foto']['name'];
    $filetype = $_FILES['foto']['type'];
    $filesize = $_FILES['foto']['size'];

    $filename="FP_".$judulNoSpace."_".date("Y-m-d").".jpg";

    $destination = "upload/".$filename;

    if ($filetype=="image/jpeg" || $filetype=="image/jpg" || $filetype=="image/png") {
      if (move_uploaded_file($tmp_file, $destination)) {
        $query = mysql_query("INSERT into foto VALUES('$nama','','$filename','$judul')");
        if (!$query) {
          echo "<script>alert('Gagal Mengupload')</script>";
        }
      }
    } else{
      echo "<script>alert('File bukan gambar!')</script>";
    }
  } else if (isset($_POST['submitSave'])) {
    $title = $_POST['title'];
    $nameSave = $_POST['nameSave'];
    $query = mysql_query("UPDATE foto SET judul= '$title' WHERE foto = '$nameSave'");
    if (!$query) {
      echo "<script>alert('Gagal Mengedit')</script>";
    }
  }

?>

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
       <a href="home.php">
         Home
         </a>
       </li>
       <li>
       	<a href="profil.php" class="selected">
         <?php
         	echo $nama;
         ?>
       </a>
       </li>
     </ul>
   </nav>
  </header>
  <div id="wrapper">
  <section class="col-md-12">
    <div class="getBackground">
      <form action="" method="POST" enctype="multipart/form-data">
      <table class="table form-group">
        <tr>
        <td>
          Judul 
        </td>
          <td>
            <input type="text" class="form-control" name="judul">
          </td>
        </tr>
        <tr>
        <td>
          Foto 
        </td>
          <td>
            <input type="file" class="btn btn-default btn-file" name="foto">
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" class="btn btn-primary" value="upload" name="button">
          </td>
        </tr>
      </table>
    </form>
    <br><br><br>


  <table class="table table-hover">
    <thead>
      <tr>
        <th class="col-md-3">
          JUDUL
        </th>
        <th class="col-md-5">
          Foto
        </th>
        <th class="col-md-2">
          Edit
        </th>
        <th class="col-md-2">
          Delete
        </th>
      </tr>
    </thead>
    <tbody>
      <?php
        $query = mysql_query("SELECT * FROM foto WHERE username='$nama'");
        while ($temp = mysql_fetch_array($query)) {
          echo "<tr>";

            echo "<td align='center'>";
              echo $temp['judul'];
            echo "</td>";

            echo "<td align='center'>";
              echo "<center><img witdh = 100 height = 100 src='upload/".$temp['foto']."'></center>";
            echo "</td>";

            echo "<td align='center'>";
              echo "<form action='edit.php' method='post'>";
                echo "<input type='hidden' name='nameEdit' value=".$temp['foto'].">";
                echo "<input class='btn btn-warning' type='submit' name='submitEdit' value='Edit'>";
              echo "</form>";
            echo "</td>";

            echo "<td align='center'>";
              echo "<form action='delete.php' method='post'>";
                echo "<input type='hidden' name='name' value=".$temp['foto'].">";
                echo "<input type='submit' class='btn btn-danger' name='submit' value='Delete'>";
              echo "</form>";
            echo "</td>";

          echo "</tr>";
        }
      ?>
    </tbody>   
  </table>

   <center><a href="#top" class="btn btn-link">- Go Top -</a></center>
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

