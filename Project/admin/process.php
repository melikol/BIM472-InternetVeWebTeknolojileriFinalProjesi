<?php
session_start();
$email=$_SESSION["email"]; //Oturum açmış kullanıcının mailini değişkende saklıyoruz.
if($email!="202003011061@dogus.edu.tr"){ //Admin maili olup olmadığını kontrol ediyoruz.
    header("Location:../login.php");} //Eğer admin değilse giriş sayfasına yönlendiriyoruz.
?>
<?php

if(isset($_POST["create"])){ #Form ile yönlendirme kontrolü.Eğer yönlendirme yapılmışsa database'de yeni gönderi oluşturulacak.

    include("../database.php");

    $title=mysqli_real_escape_string($conn, $_POST["title"]); #Özel karakterleri atıp değişkende saklıyoruz.Ayrıca sql injection
    #saldırılarına karşı koruma sağlıyoruz.
    $summary=mysqli_real_escape_string($conn, $_POST["summary"]);
    $content=mysqli_real_escape_string($conn, $_POST["content"]);
    $date=mysqli_real_escape_string($conn, $_POST["date"]);

    $sqlInsert="INSERT INTO posts(date,title,summary,content) VALUES('$date','$title','$summary','$content')"; 
    #Sakladığımız değişkenleri database'e ekleyecek sorguyu yazıyoruz.
    if(mysqli_query($conn,$sqlInsert)){ #Eğer sorgu düzgün çalışırsa admin sayfasına yönlendirme yapıyoruz.
        header("Location:index.php");

    }else{ #Eğer sorgu düzgün çalışmazsa hata mesajı gönderiyoruz.
        die("Veri eklenemedi!");
    }
}
?>
<?php

if(isset($_POST["update"])){#Form ile yönlendirme kontrolü.Eğer yönlendirme yapılmışsa database'deki gönderi güncellenecek.


    include("../database.php");

    $title=mysqli_real_escape_string($conn, $_POST["title"]);#Özel karakterleri atıp değişkende saklıyoruz.Ayrıca sql injection
    #saldırılarına karşı koruma sağlıyoruz.
    $summary=mysqli_real_escape_string($conn, $_POST["summary"]);
    $content=mysqli_real_escape_string($conn, $_POST["content"]);
    $date=mysqli_real_escape_string($conn, $_POST["date"]);
    $id=mysqli_real_escape_string($conn, $_POST["id"]);

    $sqlUpdate="UPDATE posts SET title='$title',summary='$summary',content='$content',date='$date' WHERE id=$id";
    #Sakladığımız değişkenleri database'deki değişkenlerin üzerine güncelleyecek sorguyu yazıyoruz.
    if(mysqli_query($conn,$sqlUpdate)){ #Eğer sorgu düzgün çalışırsa admin sayfasına yönlendirme yapıyoruz.
        header("Location:index.php");

    }else{ #Eğer sorgu düzgün çalışmazsa hata mesajı gönderiyoruz.
        die("Veri güncellenemedi!");
    }


}
?>