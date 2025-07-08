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
        
 
?>

<!DOCTYPE html>
<html lang="fr" style="overflow-x:hidden  ">
<head>
    <link rel="icon" type="image/png" sizes="16x16"  href="image_video/favicon.ico">
    <link rel="shortcut icon" href="image_video/favicon96.png">
</head>
<body data-barba="wrapper"  onload='setTimeout(cacherDiv,10000);'>
    <div class="load-container">
            <div class="loading-screen"></div>
            
           
    </div> 
   
    
    <main data-barba="container" data-barba-namespace="home-section">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
            <title>Accueil</title>
            <meta HTTP-EQUIV="Page-Enter" CONTENT="RevealTrans(Duration=2,Transition=23)">
            <link rel="stylesheet" href="css/index_style.css">
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
                            <span class="sub-name">Haute-Loire</span>
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
                                            <span class='text nav-text'>".$_SESSION['username']."</span>
                                            <a href='../treatment/unlogin_treat.php'><i class='bx bx-log-out icon' ></i></a>
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

        <div class="content" style="overflow-x: hidden;overflow-y: hidden;" >
                <?php
        if(isset($_GET['erreur'])){
            $err = $_GET['erreur'];
                if($err==1 || $err==2)
                    echo "<div class='error' id='error'>
                            <h1><i style='color:red'class='bx bxs-comment-error'></i>Le mail n'as pas pu être envoyé</h1>
                        </div>
                    ";
                }
                ?>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" >
                    <path fill="#6a1abb" fill-opacity="1" d="M0,256L30,234.7C60,213,120,171,180,165.3C240,160,300,192,360,186.7C420,181,480,139,540,117.3C600,96,660,96,720,133.3C780,171,840,245,900,245.3C960,245,1020,171,1080,154.7C1140,139,1200,181,1260,186.7C1320,192,1380,160,1410,144L1440,128L1440,0L1410,0C1380,0,1320,0,1260,0C1200,0,1140,0,1080,0C1020,0,960,0,900,0C840,0,780,0,720,0C660,0,600,0,540,0C480,0,420,0,360,0C300,0,240,0,180,0C120,0,60,0,30,0L0,0Z"></path>
                </svg>
                <div class="article1 animate-this">
                    <h1>SPA Haute Loire</h1>
                    <p>La SPA a vu le jour en 1983 grâce à une poignée d'amoureux des animaux.Pendant près de 10 ans, ses locaux se situèrent au rez de chaussée d'une maison vétuste Rue des Farges au Puy en Velay. Lieu, peu approprié pour recevoir les chiens ou chats en errance.
                    Le travail des bénévoles y était difficile et il n'y avait alors que trés peu d'organisation. Enfin en 1994, le refuge actuel est "sortie" de terre grâce à l'acharnement de ces mêmes bénévoles et de quelques élus, convaincus de la nécessité de ce site. Aujourd'hui, la SPA de la Haute-Loire est affiliée à la Confédération Nationale Défence de l'Animale. Elle accueille toute l'année une soixantaine de chiens et une trentaine de chats et chatons venant des communes conventionnées.</p>
                </div>
                <h1 class="titre-obj animate-this"> Nos Objectifs</h1>
                <div class="objectif animate-this">
                        <div class="obj">
                            <i class='bx bx-clinic icon'></i>
                            <p> Aider les animaux dans le besoin</p>
                        </div>
                        <div class="obj">
                            <i class='bx bx-male-female icon'></i>
                            <p> Leur trouver une bonne famille</p>
                        </div>
                        <div class="obj">
                            <i class='bx bx-band-aid icon'></i>
                            <p> Les Réhabiliter </p>
                        </div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style='margin-bottom:-2%;'>
                    <path fill="#6a1abb" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                    </svg>
                <div class="article2">
                    <div class="image">
                        <img src="image_video/animaux/250268711037693.jpg" style="max-width :75%;height : auto;margin-left: 25%;" >
                    </div>
                    <div class="cont">
                        <div class="titre">
                            <h1>Adoption Sauvetage</h1>
                            <h2></h2>
                        </div>
                        <p> Nos adoptions sauvetages vous permettent d’adopter nos animaux nécessitant une attention particulière (Age, maladie, …). Venez les rencontrer au refuge.</p>
                        <a href="adoption.php" class='animate-this'><b>Plus..</b></a>
                    </div>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top:-0.5%">
                <path fill="#6a1abb" fill-opacity="1" d="M0,160L48,144C96,128,192,96,288,85.3C384,75,480,85,576,80C672,75,768,53,864,69.3C960,85,1056,139,1152,138.7C1248,139,1344,85,1392,58.7L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
                </svg>
                <div class='art3' style="margin-top:15%;">
                    <h1 class="titre-help" > Comment nous Aider ? </h1>
                    <div class="help" style="margin-top:10%;">
                        <div class="helpobj">
                            <img src="image_video/obj3.jpg">
                            <p>Venir promener des chiens</p>
                        </div>
                        <div class="helpobj">
                            <img src="image_video/obj1.jpg">
                            <p>Devenir membre ou bénévole</p>
                        </div>
                        <div class="helpobj">
                            <img src="image_video/obj2.jpg">
                            <p>Faire des dons </p>
                        </div>
                    </div>
                </div>
                <svg class="SvgArt3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style='margin-bottom:-0.75%;'>
                    <path fill="#6a1abb" fill-opacity="1" d="M0,288L48,272C96,256,192,224,288,197.3C384,171,480,149,576,165.3C672,181,768,235,864,250.7C960,267,1056,245,1152,250.7C1248,256,1344,288,1392,304L1440,320L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
                <div class="article3">
                    <table class="table-style">

                            <thead>
                                    <tr>
                                        <th>Horaires</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <tr>
                                        <td>Lundi</td>
                                        <td>13h30          à          17h30</td>
                                    </tr>
                                    <tr>
                                        <td>Mardi</td>
                                        <td>13h30          à          17h30</td>
                                    </tr>
                                    <tr>
                                        <td>Mercredi</td>
                                        <td>13h30          à          17h30</td>
                                    </tr>
                                    <tr>
                                        <td>Jeudi</td>
                                        <td>13h30          à          17h30</td>
                                    </tr>
                                    <tr>
                                        <td>Vendredi</td>
                                        <td>13h30          à          17h30</td>
                                    </tr>
                                    <tr>
                                        <td>Samedi</td>
                                        <td>13h30          à          17h30</td>
                                    </tr>
                                    <tr>
                                        <td>Dimanche</td>
                                        <td>Fermé</td>
                                    </tr>
                                </tbody>

                        </table>
                    <div class="cont">
                        <div class="titre">
                            <h1>Information Pratique</h1>
                        </div>
                        <p>Pour une adoption, il est préférable de venir au minimum 1h30 avant la fermeture. Les appels téléphoniques sont pris à partir de 14h jusqu'à 17h. Pour une balade avec nos loulous, merci de vous présenter de préférence avant 16h30 <br><br>
                        
                            Adresse : 7 Impasse du Refuge ZA Plaine de Bleu, 43000 Polignac 
                            04 71 02 65 50
                        </p>
                    </div>
                </div>
                <svg class="SvgArt3-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" style="margin-top: -0.5%;">
                    <path fill="#6a1abb" fill-opacity="1" d="M0,160L48,144C96,128,192,96,288,85.3C384,75,480,85,576,80C672,75,768,53,864,69.3C960,85,1056,139,1152,138.7C1248,139,1344,85,1392,58.7L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
                </svg>
                
                <div class='article4'>
                    <div class="image_art4">
                        <img src="image_video/photorefuge.png"/>
                    </div>
                    <div class='text_art4'>
                        <h1> Un refuge sur le site de Polignac </h1>
                        <p> <p>
                    </div>


                </div>
                
                <svg style="z-index=-1 ; margin-bottom:-10%;"id="visual" viewBox="0 0 900 600" width="900" height="600" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"><g transform="translate(15.409748998402563 623.0983514242345)"><path d="M193.9 -189.7C298.6 -143.2 463.4 -127 531.4 -48.3C599.3 30.3 570.3 171.4 476.3 219.2C382.2 267.1 223.2 221.6 111.4 228.9C-0.5 236.2 -65 296.2 -137.2 302.3C-209.4 308.4 -289.2 260.7 -390.7 179.7C-492.2 98.6 -615.4 -15.8 -597.7 -103.5C-580 -191.3 -421.5 -252.3 -298.4 -295.6C-175.3 -338.9 -87.6 -364.4 -21.5 -338.8C44.6 -313.1 89.1 -236.2 193.9 -189.7" fill="#6a1abb"></path></g></svg>
                    
                <div class="footer">
                        <div class="contact">
                            <a href='https://www.instagram.com/spa_hauteloire/'><i class='bx bxl-instagram icon'></i></a>
                        </div>
                        <div class="contact">
                            <a href='https://fr-fr.facebook.com/pages/category/Animal-Shelter/SPA-de-la-Haute-Loire-114347180282387/'><i class='bx bxl-facebook icon'></i></a>
                        </div>
                        <div class="contact">
                            <a href="#popup1"><i class='bx bxs-phone icon'></i></a>
                        </div>
                        <div id="popup1" class="overlay">
                             <div class="popup">
                                <form class="form" method="post" action="treatment/testphpmailer.php">
                                        <h2>Nous Contacter</h2>
                                        <a class="close" href="#">&times;</a>
                                        <p type="Nom:"><input name="nom" placeholder="Nom ..."></input></p>
                                        <p type="Email:"><input name="mail" placeholder="Mail ..."></input></p>
                                        <p type="Telephone"><input name="phone" placeholder="Numéro de Téléphone ..."></input></p>
                                        <p type="Message:"><input name="message" placeholder="Message ..."></input></p>
                                        <button name='submit_mail' type="submit">Envoyer</button>
                                        <div>
                                            <span class="fa fa-phone"></span>04 71 02 65 50
                                            <span class="fa fa-envelope-o"></span>spa43accueil@gmail.com
                                        </div>
                                </form>
                            </div>
                        </div>
                </div>
                
            </div>
            <script src="style/app.js"></script>
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://unpkg.com/@barba/core"></script>
            <script
                type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/gsap.min.js"
            ></script>
            <script src="style/main.js"></script>
            <script type="text/javascript"> 
            function cacherDiv() {
                 document.getElementById("error").style.visibility = "hidden";
                }
            </script>
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7305235559243533"
                crossorigin="anonymous"></script>
    </main>


</body>
</html>

