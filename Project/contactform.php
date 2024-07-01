<?php
session_start();

if(!isset($_SESSION["user"])){ #Eğer kullanıcı oturum açmamışsa giriş sayfasına yönlendiriyoruz.
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <title>Anasayfa</title>
  <style>
    .form-group{
    margin-bottom: 30px; /*Etiketler arası boşluğu ayarlıyoruz. */
}
.container{ /*Form özelliklerini ayarlıyoruz. */
    max-width: 800px;
    padding:50px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; /*Gölge ekliyoruz.*/
}
.form-btn{
  margin-left:39%;
}
  </style>

</head>
<body>
<?php
include("header.php"); ?>

<div class="container">

<?php
include 'database.php'; #Database'i dahil ediyoruz.

if(isset($_POST["contact"])){ #Eğer iletişime geç tuşuna basılmışsa:
    #Özel karakterleri atıp değişkende saklıyoruz.Ayrıca sql injectionsaldırılarına karşı koruma sağlıyoruz.
    $date=mysqli_real_escape_string($conn, $_POST["date"]); 
    $fullname=mysqli_real_escape_string($conn, $_POST["fullname"]);
    $phone=mysqli_real_escape_string($conn, $_POST["phone"]);
    $extra=mysqli_real_escape_string($conn, $_POST["extra"]);

    $sql = "INSERT INTO contacts (date, fullname, phone,extra) VALUES ( ?, ?, ?,?)"; #Daha sonra verileri girmek üzere
    #sorguyu yazıyoruz.
    $stmt = mysqli_stmt_init($conn); #Sorguyu çalıştırmak için nesne oluşturuyoruz.
    $prepareStmt = mysqli_stmt_prepare($stmt,$sql);#Sorgu sonucunu bool döndürmek için fonksiyon içinde çağırıyoruz.
    if ($prepareStmt) {#Eğer düzgün çalıştıysa
        mysqli_stmt_bind_param($stmt,"ssss",$date,$fullname,$phone,$extra); #Parametreleri bağlıyoruz.
        mysqli_stmt_execute($stmt); #Fonksiyonu çalıştırıyoruz.
        echo "<div class='alert alert-success'>Başarıyla kaydedildi.</div>";
    }else{#Eğer sorgu düzgün çalışmazsa
          die("Bir şeyler yanlış gitti");#Hata mesajı çağırıyoruz. 
    }
       }           

?>

<form action="contactform.php" method="post">

    <!--Form oluşturup isim,telefon ve ekstra bilgi değerlerini alıyoruz.-->
    <div class="form-group">
    <input type="text" name="fullname" class="form-control" placeholder="Tam isminizi giriniz:">
    </div>

    <div class="form-group">
    <input type="number" name="phone" class="form-control" placeholder="Başında 0 olmadan telefon numaranızı giriniz:">
    </div>

    <div class="form-group">
    <textarea name="extra" class="form-control" placeholder="Kendinizi tanıtınız:" rows=4></textarea>
    </div>
    <input type="hidden" name="date" value="<?php echo date("d/m/Y"); ?>">

    <!--İletişime geç butonu ekliyoruz.-->
    <div class="form-btn">
        <input type="submit" class="btn btn-primary" value="İletişime geç" name="contact">
    </div>
</form>
</div>
<?php
include("footer.php"); ?> 

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
 
</body>
</html>