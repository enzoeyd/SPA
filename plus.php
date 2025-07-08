<?php  

    session_start();
    ini_set('display_errors', 'Off');
    $value=0;
    if ($_SESSION['connect']== 'oui') {
        $value=1;
    }else{
        $value=0;
    }

    if ($_SESSION['start'] >= time()){
        session_destroy();

    }
        $dsn = 'mysql:host=localhost;dbname=u953351322_spahauteloire;charset=utf8';
        $username='u953351322_spa43';
        $password='Animaux43.';
        $pdo = new PDO($dsn, $username, $password);
        $req = $pdo->prepare("SELECT * FROM article_db ");
        $req->execute(array());
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="icon" type="image/png" sizes="16x16"  href="image_video/favicon.ico">
</head>
<body data-barba="wrapper">
    <div class="load-container">
            <div class="loading-screen"></div>           
    </div>
    <main data-barba="container" data-barba-namespace="home-section">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Plus</title>
            <link rel="stylesheet" href="css/plus_style.css">
            <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
           
        </head>
        <nav class="navbar close">
            <header>
                <div class="image-text">
                    <div class='image'>
                            <img src='image_video/logo.PNG'>
                        </div>
                    <div class="text logo-text">
                        <span class="name">SPA </span>
                        <span class="profession">Haute-Loire</span>
                    </div>
                </div>

                <i class='bx bx-chevron-right toggle'></i>
            </header>

            <div class="menu-bar">
                <div class="menu">

                    <li class="search-box">
                        <i class='bx bx-search icon'></i>
                        <input type="text" placeholder="Chercher">
                    </li>

                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="index.php">
                                <i class='bx bx-home-alt icon' ></i>
                                <span class="text nav-text">Accueil</span>
                            </a>
                        </li>

                        <li class="nav-link">
                            <a href="adoption.php">
                                <i class='bx bxs-dog icon'></i>
                                <span class="text nav-text">Animaux</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="equipe.php">
                                <i class='bx bx-group icon'></i>
                                <span class="text nav-text">Equipe</span>
                            </a>
                        </li>
                        <li class="nav-link">
                        <a href="modalite.php">
                            <i class='bx bxs-book-open icon'></i>
                            <span class="text nav-text">Modalités</span>
                        </a>
                        </li>

                        <li class="nav-link">
                            <a href="plus.php">
                                <i class='bx bx-plus-medical icon'></i>
                                <span class="text nav-text">Autre</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="https://www.ledonenligne.fr/associations/spahauteloire">
                                <i class='bx bxs-gift icon'></i>
                                <span class="text nav-text">Faire Un Don</span>
                            </a>
                        </li>
                        <?php 
                        if($value==1){
                            echo"<li class='nav-link'>
                                    <a href='pageperso.php'>
                                        <i class='bx bxs-user-account icon'></i>
                                        <span class='text nav-text' style='color:black'>".$_SESSION['username']."</span>
                                        <a href='treatment/unlogin_treat.php'><i class='bx bx-log-out icon' ></i></a>
                                    </a>
                                </li>";
                        }else{
                            echo"<li class='nav-link'>
                                    <a href='connect.php'>
                                        <i class='bx bx-id-card icon'></i>
                                        <span class='text nav-text'>Connexion</span>
                                    </a>
                                </li>";
                        }
                        ?>
                <!--div class="bottom-content">
                        <li class="mode">
                            <div class="sun-moon">
                                <i class='bx bx-moon icon moon'></i>
                                <i class='bx bx-sun icon sun'></i>
                            </div>
                            <span class="mode-text text"!>Sombre<!/span!> 

                            <div class="toggle-switch">
                                <!span class="switch"></span>
                            </div>
                        <!/li>
                    </div-->
            </div>
        </nav>
        <div class='content animate-this'>
            <div class="partenaire">
                <h1>Nos Partenaires</h1>
                <div class="wrapper">
                    <i id="left" class="fa-solid fa-angle-left"><</i>
                    <div class="carousel">
                        <img src="image_video/partenaire/argil.png" alt="img" draggable="false">
                        <img src="image_video/partenaire/cliniqueveto.jpg" alt="img" draggable="false">
                        <img src="image_video/partenaire/cnda.jpg" alt="img" draggable="false">
                        <img src="image_video/partenaire/département.jpg" alt="img" draggable="false">
                        <img src="image_video/partenaire/eveil.jpg" alt="img" draggable="false">
                        <img src="image_video/partenaire/geant-casino.png" alt="img" draggable="false">
                        <img src="image_video/partenaire/progrès.jpg" alt="img" draggable="false">
                    </div>
                    <i id="right" class="fa-solid fa-angle-right">></i>
                </div>
            </div>
            <?php while($row = $req->fetch()) : ?>
                <div class='art'>
                    <h1><?php echo htmlspecialchars($row['title_db']); ?></h1>
                    <p> <?php echo htmlspecialchars($row['message_db']); ?></p>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
        <script src="style/carouss.js"></script>
        <script src="style/app.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://unpkg.com/@barba/core"></script>
        <script
                    type="text/javascript"
                    src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/gsap.min.js"
            ></script>
        <script src="style/main.js"></script></script>
    </main>
</body>


</html>
