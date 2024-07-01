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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

  <title>Anasayfa</title>
</head>
<body>
<?php
include("header.php"); ?>


  <header class="p-4 bg-dark text-center"><!--Sayfanın ortasına başlığımızı ekliyoruz.-->
    <h1><a href="homepage.php" class="text-light text-decoration-none">İbrahim Umut Bozlar Paylaşımları</a></h1>
  </header>

  <div class="post-list mt-5">
    <div class="container">
      <?php 
      
        include("database.php");#Database'e bağlanıyoruz.
        $sqlSelect="SELECT * FROM posts";#Databaseden gönderileri çekecek sorguyu yazıyoruz.
        $result=mysqli_query($conn,$sqlSelect); #Sorguyu çalıştırıyoruz.
        while($data=mysqli_fetch_array($result)){#Gönderileri fonksiyon kullanarak döngü içinde çekiyoruz.
          ?> 
          <div class="row mb-4 p-5 bg-light">
            <div class="col-sm-2"> 
              <?php echo $data["date"];?> <!--İlk olarak tarihi en sol kısma ekliyoruz.. -->
            </div>
            <div class="col-sm-3">
              <h3><?php echo $data["title"];?></h3> <!--Başlık şeklinde konuyu yazıyoruz. -->
            </div>
            <div class="col-sm-5">
              <?php echo $data["content"];?><!--Son olarak gönderiyi yazıyoruz.-->
            </div>
            <div class="col-sm-2">
              <a href="view.php?id=<?php echo $data["id"];?>" class="btn btn-primary">Devamını gör</a>  <!--Devamını gör
            butonunu ekliyoruz. -->
            </div>
          </div>
          <?php
          }
      ?>
  </div>
  </div>
  <?php
include("footer.php"); ?> 
<?php
#Eğer giriş yapan kişi admin ise yani "202003011061@dogus.edu.tr" isimli mail ile giriş yapmışsa en altta admin paneli girişi 
#gözükmesini sağlıyoruz.
session_start();
$email=$_SESSION["email"];
if($email=="202003011061@dogus.edu.tr"){
?>
    <div class="footer bg-dark p-4 mt-4">
          <a href="admin/index.php" class="text-light">Admin Paneli</a>
    </div><?php
  }
  ?>
  <?php
?>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
