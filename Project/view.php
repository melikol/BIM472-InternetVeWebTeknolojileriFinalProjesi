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
  .container { /* container'ı tüm alana yayarak farklı ekran boyutlarında düzgün gözükmesini sağlıyoruz*/
      max-width: 100%;
      padding: 0 15px;
    }
    .post {
      margin-top: 20px;
    }
 
    .navbar-nav {
      margin-top: 0.5rem;
    }

    </style>

</head>
<body>
<?php
include("header.php"); ?> 

  <header class="p-4 bg-dark text-center">
    <!-- Başlığı oluşturuyoruz.-->
    <h1><a href="homepage.php" class="text-light text-decoration-none">İbrahim Umut Bozlar Paylaşımları</a></h1>
  </header>

  <div class="post-list mt-5">
    <div class="container">
      <?php
        $id=$_GET["id"]; #Yönlendirmeden gelen id'yi değişkende saklıyoruz.
        if($id){
            include("database.php");#Database'i dahil ediyoruz.
            $sqlSelect="SELECT * FROM posts WHERE id=$id"; #İd ile eşleşen gönderiyi databaseden çekecek sorguyu yazıyoruz.
            $result=mysqli_query($conn,$sqlSelect);#Sorguyu çalıştırıp değişkende tutuyoruz.
            while($data=mysqli_fetch_array($result)){#Liste olarak döngü içinde gönderiyi tutacak döngüyü açıyoruz.
              ?> 
              <div class="post bg-light p-4 mt-5">
                <h1><?php echo $data["title"];?></h1> <!--Başlığı gösteriyoruz. -->
                <p><?php echo $data["date"];?></p> <!--Tarihi gösteriyoruz. -->
                <p><?php echo $data["content"];?></p> <!--İçeriği gösteriyoruz.-->
              </div>
    
              <?php
              }

        }else{ #Eğer gönderi alınamazsa 
            echo "Gönderi bulunamadı"; #Hata mesajı gösteriyoruz.
        }
       
      ?>
  </div>
  </div>
  <?php
include("footer.php"); ?> 
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>
