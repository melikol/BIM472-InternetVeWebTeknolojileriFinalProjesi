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
  <title>Document</title>
  <style>

@media only screen and (max-width: 1000px) {  /*Mobil cihazlar ve tabletler için yazı videonun altında olacaktır ve
      video ekrana sığacak şekilde güncellenecektir.*/
      .container {
  display: flex;
  flex-direction: column; 
      }
  .video-container{
    flex:0 0 100%;
    justify-content:left;

  }
    }


.container {
  display: flex;/*Yazının videonun yanında olması için*/

    }
 
    .video-container { 
      margin-top:50px;
      flex: 0 0 70%; /* Video kısmının genişliği */
      margin-right: 20px; /* Yazı ile video arasındaki boşluk */
      
    }
    .video-description {
      flex: 0 0 30% auto; /* Video yazısının kısmının genişliği */
      margin-top:50px; 
 
    }

    .footer-icons { /* Her ekran boyutunda simgelerin düzgün gözükmesini sağladık*/
      display: flex; /* Yan yana gözükmesi için*/
      justify-content: center; /* İkonların ortalanmasını sağladık */
      align-items: center; /* Yazının ortalanması */
      margin-top: 50px;
    }

    .footer-icons img { /* Simgelerin boyutu ve arasındaki boşluk */
      width: 50px;
      height:50px;
      margin-right: 20px;
    }

  </style>
</head>
<body>
<?php
include("header.php"); ?>

  <div class="container"><!--Videoyu ekliyoruz. -->
  <div class="embed-responsive embed-responsive-16by9">
      <video class="embed-responsive-item" controls>
          <source src="squat.mp4" type="video/mp4">
          Tarayıcınız video etiketini desteklemiyor.
      </video>

    </div>

    <div class="video-description bg-light" style="margin-left: 50px;"><!--Videonun sağındaki yazıyı ekliyoruz. -->
      <p>Squat  hareketi gerçekleştiren kişinin ayakta durma pozisyonundayken kalçalarını alçaltması, sonrasında ise tekrar başlangıç pozisyonuna dönmesini içeren bir egzersiz.</p>
      <p>Squat, alt vücut kaslarının gücünü ve boyutunu arttırmanın yanı sıra, core kaslarını geliştirmek için de önemli bir egzersiz olarak kabul edilir.</p>
      <p>Squat, deadlift ve bench press ile birlikte powerlifting adlı güç sporunu oluşturan üç egzersizden biridir. Ayrıca diğer birçok egzersiz programının temel bir parçası olarak kabul edilir.</p>
    </div>
  </div>

  <div class="footer-icons"> <!--Wikipedia ve youtube linklerini ekliyoruz. -->
    <p>Daha fazla bilgi için:</p>
    <a href="https://tr.wikipedia.org/wiki/Squat" target="_blank">
      <img src="wikipedia.png" alt="Wikipedia" class="img-fluid" >
       <!-- img-fluid ile görselin genişliğinin ayarlanması yüksekliğinin orantılını değişmesini sağladık-->
    </a>
    <a href="https://www.youtube.com/watch?v=er1SDXCqrt8&ab_channel=PowerliftingWorld" target="_blank">
      <img src="youtube.jpeg" alt="YouTube" class="img-fluid">
       <!-- img-fluid ile görselin genişliğinin ayarlanması yüksekliğinin orantılını değişmesini sağladık-->
    </a>
  </div>
  <?php
include("footer.php"); ?> 

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>

  </body>
  </html>
