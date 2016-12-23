
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
  <link rel="stylesheet" type="text/css" href="css/css/bootstrap.css"/>
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
        <a href="admin.php">
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
    <div class="getBackground">
      

    <?php
      if (isset($_POST['submitEdit'])) {
        $edit = $_POST['nameEdit'];
        $query = mysql_query("SELECT * FROM foto WHERE foto='$edit'");
        $temp = mysql_fetch_array($query);

        echo "<table class='table form-group' border=0>";
          echo "<form action='profil.php' method='post'>";
            echo "<tr>";
              echo "<td>";
                echo "<center><img witdh = 300 height = 300 src='upload/".$temp['foto']."'></center>";
              echo "</td>";
            echo "</tr>";
            echo "<tr align='center'>";
            echo "<td class='col-md-6'>
                    <input type='text' name='title' class='form-control' size='30' maxlength='140' placeholder='".$temp['judul']."'>
                  </td>";
            echo "</tr>";
            echo "<tr align='center'>";
              echo "<td>";
                  echo "<input type='hidden' name='nameSave' value=".$temp['foto'].">";
                  echo "<input type='submit' class='btn btn-primary' name='submitSave' value='Save'>";  
              echo "</td>";      
            echo "</tr>";
          echo "</form>";
          echo "<tr align='center'>";
            echo "<td>";
              echo "<a href='profil.php' class='btn btn-link'>";
                echo "Cancel";
              echo "</a>";  
            echo "</td>";
          echo "</tr>";          
        echo "</table>";
      } 
    ?>
    

  </table>
   
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


