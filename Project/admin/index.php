<?php
session_start();
$email=$_SESSION["email"]; //Oturum açmış kullanıcının mailini değişkende saklıyoruz.
if($email!="202003011061@dogus.edu.tr"){ //Admin maili olup olmadığını kontrol ediyoruz.
    header("Location:../login.php");} //Eğer admin değilse giriş sayfasına yönlendiriyoruz.
?>
<?php
include("templates/header.php");
?>

<div class="posts-list w-100 p-5">
        <table class="table table-bordeded">
          <thead>
            <tr>
            <!--Admin panelimizde gözükecek tabloyu tanımlıyoruz.--> 
            <th style="width:15%;">Paylaşım Zamanı</th>
            <th style="width:15%;">Başlık</th>
            <th style="width:45%;">İçerik</th>
            <th style="width:25%;">İşlemler</th>
            </tr>
          </thead>

          <tbody>
            
            <?php
            
            include('../database.php');
            $sqlSelect="SELECT * FROM posts"; #Databaseden verileri çekecek sorguyu yazıyoruz.
            $result=mysqli_query($conn,$sqlSelect); #Sorguyu çalıştırıp değişkene atıyoruz.
            while($data=mysqli_fetch_array($result)){ #Her bir veriyi çekmesi için döngü içine alıyoruz.
              ?>
            <tr>
            <td><?php echo $data["date"]?></td> <!--Tarihi,başlığı ve içeriği görüntülüyoruz.--> 
            <td><?php echo $data["title"]?></td>
            <td><?php echo $data["summary"]?></td>
            <td>
              <a class="btn btn-info" href="view.php?id=<?php echo $data["id"]?>">Görüntüle</a> <!--Gönderileri görüntülemek,
            düzenlemek ve silmek için linkler ve yönlendirmeler hazırlıyoruz.--> 
              <a class="btn btn-warning" href="edit.php?id=<?php echo $data["id"]?>">Düzenle</a>
              <a class="btn btn-danger" href="delete.php?id=<?php echo $data["id"]?>">Sil</a>
            </td>
            </tr>
            <?php
            }
            ?>
            </tr>
          </tbody>
        </table>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

    
<?php
include("templates/footer.php");
?>