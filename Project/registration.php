<?php
session_start();

if(isset($_SESSION["user"])){ #Eğer kullanıcı oturum açmamışsa anasayfaya yönlendiriyoruz.
    header("Location: homepage.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Kayıt ol</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
@media (max-width: 768px) {  /*768 pikselden küçük ekranlar için form tam genişliği kullanacak şekilde ayarlanmıştır*/
            .container {
                padding: 20px;
                margin: auto;
            }
            .form-group {
                margin-bottom: 20px;
            }
          }
.form-group{
    margin-bottom: 30px; /*Etiketler arası boşluğu ayarlıyoruz. */
}
.container{ /*Form özelliklerini ayarlıyoruz. */
    max-width: 800px;
    padding:50px;
    margin: auto;
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
        include 'database.php';

        if(isset($_POST["submit"])){ #Eğer kayıt ol tuşuna basılmışsa:
            $fullName=$_POST["fullname"]; #İsmi değişkende saklıyoruz.
            $email=$_POST["email"]; #Maili değişkende saklıyoruz..
            $password=$_POST["password"]; #Şifreyi değişkende saklıyoruz..
            $passwordRepeat=$_POST["repeat_password"]; #Tekrarlanan şifreyi değişkende saklıyoruz..

            $passwordHash=password_hash($password,PASSWORD_DEFAULT); #Şifreyi kapsüllüyoruz..

            $errors=array(); #Hatalar için bir array oluşturuyoruz.

            if(empty($fullName) OR empty($email) OR empty($password) OR empty($passwordRepeat)){ #Eğer boş alan var ise
                array_push($errors,"Tüm alanlar doldurulmalıdır."); #Hata mesajı gönderiyoruz.
            }
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ #Mail uygun formatta değil ise
                array_push($errors,"E mail uygun değil."); #Hata mesajı gönderiyoruz.
            }
            if(strlen($password)<8){ #Şifre 8 karakterden az ise
                array_push($errors,"Şifre en az 8 karakter olmalıdır."); #Hata mesajı gönderiyoruz.
            }
            if($password!==$passwordRepeat){ #Şifre ve tekrarlanan şifre aynı değil ise
                array_push($errors,"Şifreler uyuşmuyor."); #Hata mesajı gönderiyoruz.
            }
            require_once "database.php"; #Database'i dahil ediyoruz.
            $sql="SELECT * FROM users WHERE email='$email'"; #Girilen emaille database'de eşleşen veri var mı kontrol ediyoruz.
            $result=mysqli_query($conn,$sql); #Sorgu sonucunu değişkene atıyoruz.
            $rowCount=mysqli_num_rows($result); #Kontrol ederken kolaylık olması için değişkenin satır sayısını alıyoruz.
            if($rowCount>0){ #Eğer eşleşen veri varsa
                array_push($errors,"Bu e-mail zaten kayıtlı.Lütfen giriş yapınız."); #Hata mesajı gönderiyoruz.
            }

            if(count($errors)>0){ #Hatalar için oluşturduğumuz dizide hata varse
                foreach($errors as $error){ #Hatalarda gezinerek tek tek yazdırıyoruz.
                    echo "<div class='alert alert-danger'>$error</div>";

                }
            }
            else{ #Eğer hata yoksa ve database'de bu mail adresine kayıtlı mail yoksa:
                #Kullanıcının girmiş olduğu verilere database'e güvenli bir şekilde kaydediyoruz.
                $sql = "INSERT INTO users (full_name, email, password) VALUES ( ?, ?, ? )"; #Daha sonra verileri girmek üzere
                #sorguyu yazıyoruz.
                $stmt = mysqli_stmt_init($conn); #Sorguyu çalıştırmak için nesne oluşturuyoruz.
                $prepareStmt = mysqli_stmt_prepare($stmt,$sql);#Sorgu sonucunu bool döndürmek için fonksiyon içinde çağırıyoruz.
                if ($prepareStmt) {#Eğer düzgün çalıştıysa
                    mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash); #Parametreleri bağlıyoruz.
                    mysqli_stmt_execute($stmt); #Fonksiyonu çalıştırıyoruz.
                    echo "<div class='alert alert-success'>Başarıyla kaydoldunuz.</div>";
                }else{#Eğer sorgu düzgün çalışmazsa
                    die("Bir şeyler yanlış gitti");#Hata mesajı çağırıyoruz. 
                }
               }           
        }
        ?>

        <form action="registration.php" method="post">

            <!--Form oluşturup isim,mail,şifre değerlerini alıyoruz.-->
            <div class="form-group">
            <input type="text" name="fullname" class="form-control" placeholder="Tam isminizi giriniz:">
            </div>

            <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="E-mailinizi giriniz:">
            </div>

            <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Şifrenizi giriniz:">
            </div>

            <div class="form-group">
            <input type="password" name="repeat_password" class="form-control" placeholder="Şifreyi tekrar giriniz:">
            </div>
            <!--Kayıt ol butonu ekliyoruz-->
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Kayıt ol" name="submit">
            <!--Giriş yap butonu ekliyoruz-->
            <p class="text-center text-muted mt-4 mb-0">Hesabın var mı? <a href="login.php"
                    class="fw-bold text-body"><u>Giriş yap</u></a></p>

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