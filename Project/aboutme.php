<?php
session_start();

if(!isset($_SESSION["user"])){  #Eğer kullanıcı oturum açmamışsa giriş sayfasına yönlendiriyoruz.
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
  <title>Hakkımda</title>
  <style>

.section {
  padding: 50px;  /* Konseptin yukarıdaki kısma uzaklığı*/
  position: relative;
}
.gray-bg {
  background-color: #f5f5f5; /* Hakkımda yazıları arka plan rengi*/
}
img {
    max-width: 100%; /* Görsel Büyüklüğü*/
}

.about-text h3 { /*Hakkımda kısmı */
  font-size: 45px;
  font-weight: 700;
  margin: 0 0 6px;
}

.about-text h6 { /* Veri bilimcisi ve kişisel antrenör kısmı */
  font-weight: 600;
  margin-bottom: 15px;
}

.about-text p {  /*Kendimi tanıttığım bilgiler kısmı*/
  font-size: 18px;
  max-width: 450px;
}

.about-list {  /* Kişisel Bilgiler(genel) kısım*/
  padding-top: 8px;
}
.about-list .media {  /*Kişisel Bilgiler(tekli) kısım */
  padding: 5px 0px;
}
.about-list label {  /* Kişisel bilgiler(etiket)*/
  color: #20247b;
  font-weight: 600;
  width: 88px;
  margin: 0;
  position: relative;
}
.about-list label:after {  /*Kişisel bilgiler(etiket) sonrası "/" */
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  right: 11px;
  width: 1px;
  height: 12px;
  background: #20247b;
  -moz-transform: rotate(15deg);
  -o-transform: rotate(15deg);
  -ms-transform: rotate(15deg);
  -webkit-transform: rotate(15deg);
  transform: rotate(15deg);
  margin: auto;
  opacity: 0.5;
}
.about-list p {  /*Kişisel bilgi değerlerim*/
  margin: 2px;
  font-size: 15px;
}

.about-section .counter { 
  padding: 22px 20px;  /*En alt kısım*/
  background: #f5f5f5;
  border-radius:0px;
  box-shadow: 0 0 30px rgba(31, 45, 61, 0.125); /*Gölge efekti*/
}
.about-section .counter .count-data { /*En alt tablo sayı özellikleri*/
  margin-top: 10px;
  margin-bottom: 15px;
}
.about-section .counter .count { /*En alt tablo sayı özellikleri */
  font-weight: 700;
  color: #20247b;
  margin: 0 0 5px;
}
.about-section .counter p { /*En alt tablo yazı özellikleri */
  font-weight: 600;
  margin: 0;
}

.theme-color { /* Veri bilimcisi ve kişisel antrenör rengi*/
    color: #fc5356;
}
.dark-color { /* hakkımda rengi */
    color: #20247b;
}

  </style>
</head>
<body>
<?php
include("header.php"); ?>

  <section class="section about-section gray-bg" id="about">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-lg-6">
                <div class="about-text go-to">
                    <h3 class="dark-color">Hakkımda</h3> <!--Hakkımda başlığını oluşturuyoruz -->
                    <h6 class="theme-color lead">Veri bilimcisi ve Kişisel Antrenör</h6><!--İkinci başlığımızı oluşturuyoruz. -->
                    <p>Doğuş üniversitesinde yazılım mühendisliği 4.sınıf öğrencisiyim.Aktif olarak spor yapıyorum.Öğrencilerimle birebir olarak antrenman gerçekleştirip gün içi besin planlanmasını yapıyorum.</p>
                    <!--Paragrafı ekliyoruz. -->
                    <div class="row about-list"> <!--Kişisel bilgi etiketlerini ve bilgilerimizi giriyoruz. -->
                        <div class="col-md-6">
                            <div class="media">
                                <label>Doğum tarihi</label>
                                <p>26 Temmuz 2001</p>
                            </div>
                            <div class="media">
                                <label>Yaş</label>
                                <p>22 Yaş</p>
                            </div>
                            <div class="media">
                                <label>İkamet</label>
                                <p>İstanbul</p>
                            </div>
                            <div class="media">
                                <label>Adres</label>
                                <p>Şişli</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="media">
                                <label>E-mail</label>
                                <p>merhaba-813@hotmail.com</p>
                            </div>
                            <div class="media">
                                <label>Telefon</label>
                                <p>05439404584</p>
                            </div>
                            <div class="media">
                                <label>Skype</label>
                                <p>melikol</p>
                            </div>
                            <div class="media">
                                <label>İş durumu</label>
                                <p>Öğrenci</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-avatar">
                    <img src="vesikalık.png" title="Umut Bozlar" alt="Umut Bozlar" width="400" height="400">
                    <!--Fotoğrafımızı ekliyoruz. -->
                </div>
            </div>
        </div>
        <div class="counter">
            <div class="row">
                <div class="col-6 col-lg-3"> <!--En alt kısmı oluşturuyoruz. -->
                    <div class="count-data text-center">
                        <h6 class="count h2" >720</h6>
                        <p class="m-0px font-w-600">Sporde geçirilen gün</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" >9</h6>
                        <p class="m-0px font-w-600">Yağ oranı</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" >1155</h6>
                        <p class="m-0px font-w-600">SBD lbs</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="count-data text-center">
                        <h6 class="count h2" >0</h6>
                        <p class="m-0px font-w-600">Öğrenci sayısı</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include("footer.php"); ?> 

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
