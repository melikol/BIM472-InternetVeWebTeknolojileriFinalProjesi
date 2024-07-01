<?php
session_start();
$email=$_SESSION["email"]; //Oturum açmış kullanıcının mailini değişkende saklıyoruz.
if($email!="202003011061@dogus.edu.tr"){ //Admin maili olup olmadığını kontrol ediyoruz.
    header("Location:../login.php");} //Eğer admin değilse giriş sayfasına yönlendiriyoruz.
?>
<?php

$id=$_GET["id"]; #Yönlendirmeden gelen id'yi alıp değişkende saklıyoruz.
if($id){ #Eğer id false dışında bir değer ise(doğru alınıp alınmadığı kontrolü)

include("../database.php");
$sqlDelete="DELETE FROM posts where id=$id"; #database için bir sorgu oluşturup,databasede id ile eşleşen gönderiyi siliyoruz.
if(mysqli_query($conn,$sqlDelete)){ #Sorguyu çalıştırıyoruz.Eğer doğru çalışmışsa admin sayfasına geri yönlendiriyoruz.
    header("Location:index.php");
}else{ #Eğer sorgu doğru çalışmazsa hata mesajı gönderiyoruz.
    die("Bir şeyler yolunda gitmedi.Veri silinemedi.");
}

}else{ #Eğer id false değeri ise gönderi bulunamadı mesajı gönderiyoruz.
    echo "Gönderi bulunamadı.";
}

?> <!-- -->    