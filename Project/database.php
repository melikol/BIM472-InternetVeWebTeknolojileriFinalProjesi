<!--Database bilgilerini girip bağlantıyı sağlayacak değişkeni oluşturuyoruz. -->
<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "login-register";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Bağlantı hatası: " . mysqli_connect_error());
}

?>