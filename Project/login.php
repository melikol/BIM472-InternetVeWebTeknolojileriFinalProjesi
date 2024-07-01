<?php
session_start();

if(isset($_SESSION["user"])){ #Eğer kullanıcı oturum açmışsa anasayfaya yönlendiriyoruz.
    header("Location: homepage.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Giriş</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>

    .form-group{
    margin-bottom: 30px; /*Etiketler arası boşluğu ayarlıyoruz.*/
}
.container{ /*Form özelliklerini ayarlıyoruz. */
    max-width: 800px;
    padding:50px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; /*Gölge ekliyoruz.*/
}
    </style>
</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="homepage.php">
        <img src="sbd.png" width="30" height="30" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav w-100 flex-column flex-md-row"> <!-- Navbar'ı alt alta veya yan yana düzenlemek için flex sınıflarını kullanıyoruz -->
            <div class="d-flex flex-column flex-md-row"> <!-- Sol tarafa yasladığımız kısmı içeren bölümü oluşturuyoruz. -->
                <a class="nav-link" href="homepage.php" style="color: white;">Anasayfa</a>
                <a class="nav-link" href="aboutme.php" style="color: white;">Hakkımda</a> 
                <div class="nav-item dropdown"> <!-- Dropdown menü oluşturuyoruz.-->
                    <a class="nav-link dropdown-toggle" style="color: white;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        SBD 
                    </a>
                    <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" style="color: white;" href="squat.php">Squat</a> 
                        <a class="dropdown-item" style="color: white;" href="benchpress.php">Bench Press</a> 
                        <a class="dropdown-item" style="color: white;" href="deadlift.php">Deadlift</a> 
                    </div>
                </div>
                <a class="nav-link" href="contactform.php" style="color: white;">İletişim</a> 
            </div>
            <div class="d-flex flex-column flex-md-row ml-md-auto mt-3 mt-md-0"> 
                <!-- Sağ tarafa yasladığımız kısmı içeren bölümü oluşturuyoruz.(dflex-yatay ve dikey hizalanma)
            (ml-md-auto:sağa yaslı olmasını sağlar masaüstü için)
        (mt-3 mt-md-0 boşluk bırakıyoruz.) -->
                <a class="nav-link" href="login.php" style="color: white;">Giriş yap</a> 
                <a class="nav-link" href="registration.php" style="color: white;">Kayıt ol</a> 
            </div>
        </div>
    </div>
</nav>

    <div class="container">
        <?php
            if (isset($_POST["login"])) {#Eğer giriş yap butonuna basıldıysa
              $email = $_POST["email"];#Girilen maili değişkende saklıyoruz.
              $password = $_POST["password"];#Girilen şifre değişkende saklıyoruz.
               require_once "database.php";#Database'e bağlanıyoruz.
               $sql = "SELECT * FROM users WHERE email = '$email'";#Database'de maille eşleştirecek sorguyu oluşturuyoruz..
               $result = mysqli_query($conn, $sql);#Sorguyu çalıştırıyoruz.
               $user = mysqli_fetch_array($result, MYSQLI_ASSOC);#Satırları dizi olarak döndürüyoruz.
               if ($user) { #Eğer mail kayıtlı ise
                   if (password_verify($password, $user["password"])) { #Mail ve şifre eşleşiyor mu kontrol ediyoruz.
                       session_start();#Session'ı başlatıyoruz.
                       $_SESSION["user"] = "yes";#Kullanıcının giriş yaptığını sessionda saklıyoruz.
                       $_SESSION["email"] = $email; #Kullanıcının admin olup olmadığı kontrolu için emaili saklıyoruz.
                       header("Location: homepage.php");#Anasayfaya yönlendiriyoruz.
                       die();
                   }else{#Eğer mail ve şifre eşleşmiyor ise 
                       echo "<div class='alert alert-danger'>Email ve parola eşleşmiyor.</div>";#Hata mesajı gönderiyoruz.
                   }
               }else{#Mail kayıtlı değil ise
                   echo "<div class='alert alert-danger'>E mail kayıtlı değil.Lütfen kayıt olun.</div>";#Hata mesajı gönderiyoruz.
               }
           }
        ?>

        <!--Form oluşturup içinde maili ve şifreyi alıyoruz. -->
        <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="E-mailinizi giriniz:" name="email" class="form-control">
        </div>

        <div class="form-group">
            <input type="password" placeholder="Şifrenizi giriniz:" name="password" class="form-control">
        </div>
        <!-- Giriş yap butonunu oluşturuyoruz.-->
        <div class="form-btn">
            <input type="submit" value="Giriş yap" name="login" class="btn btn-primary">
        </div>
        <!--Kayıt ol butonunu oluşturuyoruz.-->
        <p class="text-center text-muted mt-4 mb-0">Hesabın yok mu? <a href="registration.php"
                    class="fw-bold text-body"><u>Kayıt ol</u></a></p>


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