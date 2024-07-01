<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a class="navbar-brand" href="homepage.php">
        <img src="sbd.png" width="30" height="30" alt="">
    </a><!--Logo ile beraber logo yönlendirmesini tasarlıyoruz. -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav" style="display:flex;width:100%;">
            <a class="nav-link" href="homepage.php" style="color: white;">Anasayfa <span class="sr-only">(current)</span></a>
            <a class="nav-link" href="aboutme.php" style="color: white;">Hakkımda</a>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" style="color: white;" role="button" data-toggle="dropdown" aria-expanded="false">
                    SBD
                </a>
                <div class="dropdown-menu bg-dark" style="color:white;">
                <!--Navbara açılır menü ekleyiyoruz. -->
                    <a class="dropdown-item" href="squat.php" style="color:white;">Squat</a>
                    <a class="dropdown-item" href="benchpress.php" style="color:white;">Bench Press</a>
                    <a class="dropdown-item" href="deadlift.php" style="color:white;">Deadlift</a>
                </div>
            </div>
            <a class="nav-link" href="contactform.php" style="color: white;">İletişim</a>
              <!-- Sağa yaslı çıkış yap butonunu oluşturuyoruz-->
            <a class="nav-link" href="logout.php" style="margin-left: auto;color: white;">Çıkış yap</a>
        </div>
    </div>
</nav>
