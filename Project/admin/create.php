<?php
session_start();
$email=$_SESSION["email"];  //Oturum açmış kullanıcının mailini değişkende saklıyoruz.
if($email!="202003011061@dogus.edu.tr"){ //Admin maili olup olmadığını kontrol ediyoruz.
    header("Location:../login.php");} //Eğer admin değilse giriş sayfasına yönlendiriyoruz.
?>
<?php
include("templates/header.php");
?>
<!--Oluşturulacak gönderinin başlığını,özetini,ve içeriğini ve en son olarak tarihini gün/ay/yıl olarak otomatik  kaydediyoruz. -->    
   <div class="create-from w-100 mx-auto p-4" style="max-width:700px;">
            <form action="process.php" method="post">
                <div class="form-field mb-4">
                    <input type="text" name="title" id="" class="form-control" placeholder="Başlığı giriniz:">
                </div>

                <div class="form-field mb-4">
                    <textarea name="summary" id="" class="form-control" cols="30" rows="10" placeholder="Özet giriniz:"></textarea>
                </div>

                <div class="form-field mb-4">
                    <textarea name="content" id="" class="form-control" cols="30" rows="10" placeholder="Gönderiyi giriniz:"></textarea>
                </div>

                <input type="hidden" name="date" value="<?php echo date("d/m/Y"); ?>">

                <div class="form-field mx-auto p-4">
                    <input type="submit" class="btn btn-primary" value="Kaydet" name="create">
                </div>
            </form>
        </div>

<?php
include("templates/footer.php");
?>