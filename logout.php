<?php

// logout, langsung ke index.php

 session_start();
 session_destroy();
 header('location:index.php');
?>