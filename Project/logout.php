<!--Sessiona açılmış olan oturumu kapatıyoruz. -->
<?php
session_start();
session_destroy();
header("Location: login.php");

?>