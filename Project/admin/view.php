<?php
include("templates/header.php");
?>

<div class="post w-100 bg-light p-5">
    <?php
    $id=$_GET["id"]; #Yönlendirmeden gelen id'yi saklıyoruz.
    if($id){ #İd düzgün alınmış mı kontrol ediyoruz.

        include("../database.php");
        $sqlSelectPost="SELECT * FROM posts WHERE id=$id"; #İd ile database'de eşleşen gönderi bulacak sorguyu yazıyoruz.
        $result=mysqli_query($conn,$sqlSelectPost); #Sorguyu çalıştırıp değişkende saklıyoruz.
        while($data=mysqli_fetch_array($result)){ #Her bir veriyi çekecek döngüyü açıyoruz.
        ?>
        <!--Gönderinin başlığını,tarihini ve içeriğini görüntülüyoruz.--> 
        <h1><?php echo $data['title'];   ?></h1> 
        <p><?php echo $data['date'];   ?></p>
        <p><?php echo $data['content'];   ?></p>
        <?php
        }
    }else{ #İd düzgün bir şekilde alınmamışsa hata mesajı yazdırıyoruz.
        echo "Gönderi bulunamadi";
    }
    ?>
</div>
<?php
include("templates/footer.php");
?>