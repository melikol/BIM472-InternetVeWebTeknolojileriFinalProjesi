<?php
session_start();
$email=$_SESSION["email"]; //Oturum açmış kullanıcının mailini değişkende saklıyoruz.
if($email!="202003011061@dogus.edu.tr"){ //Admin maili olup olmadığını kontrol ediyoruz.
    header("Location:../login.php");} //Eğer admin değilse giriş sayfasına yönlendiriyoruz.
?>
<?php
include("templates/header.php");
?>

<?php

$id=$_GET["id"]; #Yönlendirmeden gelen id'yi değişkende saklıyoruz.
if($id){ #İd'nin düzgün alınıp alınmadığının kontrolünü yapıyoruz.
    include("../database.php");
    $sqlEdit="SELECT * FROM posts where id=$id"; #Database'de id ile eşleşen gönderinin değerlerini saklayacağımız sorguyu yazıyoruz.
    $result=mysqli_query($conn,$sqlEdit); #Sorguyu çalıştırıp result değişkeninde saklıyoruz.


}else{ #İd düzgün alınamamışsa hata mesajı gönderiyoruz.
    echo "Gönderi bulunamadi";
}


?>

   <div class="create-from w-100 mx-auto p-4" style="max-width:700px;">
            <form action="process.php" method="post">

                <?php
                
                while($data=mysqli_fetch_array($result)){ #Veri tabanından çekilen değerleri fonksiyon ile alıp data değişkeninde saklıyoruz.
                ?>
                 <!-- Gönderi oluşturma sayfasını ve düzenlenecek olan gönderinin verilerini giriyoruz.--> 
                <div class="form-field mb-4">
                    <input type="text" name="title" id="" class="form-control" placeholder="Başlığı giriniz:" value="<?php echo $data['title']; ?>">
                </div>

                <div class="form-field mb-4">
                    <textarea name="summary" id="" class="form-control" cols="30" rows="10" placeholder="Özet giriniz:"><?php echo $data['summary']; ?></textarea>
                </div>

                <div class="form-field mb-4">
                    <textarea name="content" id="" class="form-control" cols="30" rows="10" placeholder="Gönderiyi giriniz:"><?php echo $data['content']; ?></textarea>
                </div>

                <input type="hidden" name="date" value="<?php echo date("d/m/Y"); ?>">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class="form-field">
                    <input type="submit" class="btn btn-primary" value="Kaydet" name="update">
                </div>

                <?php
                }
                ?>
            </form>
        </div>

<?php
include("templates/footer.php");
?>