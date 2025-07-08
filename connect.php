
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
            <title>Connexion</title>
            <link rel="stylesheet" href="css/connect_style.css">
            <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        </head>
        <nav class="sidebar close">
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
                            <li class="nav-link">
                                <a href="connect.php">
                                    <i class='bx bx-id-card icon'></i>
                                    <span class="text nav-text">Connexion</span>
                                </a>
                            </li>
                    <!--<div class="bottom-content">
                        <li class="mode">
                            <div class="sun-moon">
                                <i class='bx bx-moon icon moon'></i>
                                <i class='bx bx-sun icon sun'></i>
                            </div>
                            <span class="mode-text text">Sombre</span>

                            <div class="toggle-switch">
                                <span class="switch"></span>
                            </div>-->
                        </li>
                    </div>
                </div>

            </nav>

        <div class='content animate-this'>
                <div class='mid'>
                    <form action="treatment/traitement.php" method="post">
                        <h1>Se connecter</h1>
                        <div class="inputs">
                            <input name='id'type="id" placeholder="Identifiant" required >
                            <input name='psw' type="password"  placeholder="Mot de passe" required >
                        </div>
                        <button class='animate-this' name='submit' type="submit">Se connecter</button>
                        </div>
                        <?php
                        if(isset($_GET['erreur'])){
                            $err = $_GET['erreur'];
                            if($err==1 || $err==2)
                                echo "<p style='color:red; margin-left:40%; margin-top:5%;margin-bottom:-7%'>Utilisateur ou mot de passe incorrect</p>";
                        }
                    ?>
                    </form>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style=" position:fixed;bottom:0;">
                <path fill="#6a1abb" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
            </div>
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

 
