<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="dashboard d-flex justify-content-between">
        <div class="sidebar bg-dark vh-100">
            <h1 class="bg-primary p-4"><a href="index.php" class="text-light text-decoration-none">Gösterge Paneli</a></h1>
            <div class="menues p-4 mt-5">
                <div class="menu">
                <!-- Admin sayfalarında kullanılacak olan menünün sol tarafını tasarlıyoruz.-->
                    <a href="../homepage.php" class="text-light text-decoration-none"><strong>Anasayfa</strong></a><br><br>
                    <a href="create.php" class="text-light text-decoration-none"><strong>Yeni gönderi ekle</strong></a><br><br>
                    <a href="contacts.php" class="text-light text-decoration-none"><strong>İletişim başvuruları</strong></a>
                <!-- Admin sayfasından anasayfaya yönlendirmek için bir link ve yeni gönderi eklemek için bir link oluşturuyoruz.-->    
                </div>
            </div>

        </div>