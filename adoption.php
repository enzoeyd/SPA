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
            $valeursauv=$_GET['Sauvetage'];
            $valeurrace=$_GET['races'];
            $valeurspecies=$_GET['species'];


            $race_from = $pdo->prepare("SELECT DISTINCT race_db FROM animal_db WHERE species_db='Chien' GROUP BY race_db ");
            $race_from->execute(array()); 

            $req = $pdo->prepare("SELECT * FROM animal_db");
            $req->execute(array());
            if(isset($_GET['filtrer'])){
                
                
                if($valeurspecies =='Tout..'){
                    if($valeursauv=='Oui'){
                        $req = $pdo->prepare("SELECT * FROM animal_db WHERE state_db='Oui'");
                        $req->execute();  
                        }
                }
                
                if($valeurspecies == 'Chien'){
                    if($valeursauv=='Oui'){
                        $req = $pdo->prepare("SELECT * FROM animal_db WHERE state_db='Oui'AND species_db='Chien' ");
                        $req->execute();  
                        }
                    else{
                        if($valeursauv=='Oui' and $valeurrace!='Races Chien ...'){
                            $req = $pdo->prepare("SELECT * FROM animal_db WHERE species_db='Chien' AND state_db = 'Oui'AND race_db=? ");
                            $req->execute(array($valeurrace));
                        }
                        else{
                            if($valeurrace=='Races Chien ...'){
                                $req = $pdo->prepare("SELECT * FROM animal_db WHERE species_db='Chien' ");
                                $req->execute(array());
                            }else{
                            $req = $pdo->prepare("SELECT * FROM animal_db WHERE species_db='Chien' AND race_db=? ");
                            $req->execute(array($valeurrace));}
                        }
                    }
                }
                if($valeurspecies=='Chat'){
                    $req = $pdo->prepare("SELECT * FROM animal_db WHERE species_db='Chat'");
                    $req->execute(array()); 
                    if($valeursauv=='Oui'){
                        $req = $pdo->prepare("SELECT * FROM animal_db where state_db='Oui'AND species_db='Chat'");
                        $req->execute();  
                    }
                }
                if($valeurspecies=='Autres'){
                    $req = $pdo->prepare("SELECT * FROM animal_db WHERE species_db='Autres'");
                    $req->execute(array()); 
                    if($valeursauv=='Oui'){
                        $req = $pdo->prepare("SELECT * FROM animal_db where state_db='Oui'AND species_db='Autres'");
                        $req->execute();  
                    }
                }
            }
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
            <title>Adoption-Chien</title>
            <link rel="stylesheet" href="css/adoption_style.css">
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
        <div class="content"  style='margin-left: 8%; overflow-x: hidden ; '>
            <div class='head' style='margin:4%'>
                <div class='box'>
                    <h1>Disponible à l'adoption</h1>
                    <h2>"Combattre les violences dont les animaux sont victimes, c'est faire grandir la justice des hommes."</h2>
                    <p style="max-width:90%;">De nombreux animaux vous attentent au refuge de la SPA Haute-Loire de Polignac , chacun possédant son propre trait de caractère . Ils vous attendent pour des balades dans un premier temps , pour faire connaissance puis par la suite , peut être une future adoption. </p>
                </div>
            </div>
            <div class='filtre' style='margin:4%'>
                    <form method='get'  class='formulaire_filtre'>
                        <label for="Sauvetage">Sauvetage </label><input type='checkbox' id="Sauvetage" name="Sauvetage" value='Oui'>
                        <select name="species" class='especes'>
                            <option values='all' selected>Tout..</option>
                            <option values='Chien'>Chien</option>
                            <option values='Chat'>Chat</option>
                            <option values='Autres'>Autres</option>
                        </select>
                        <select name="races" class='especes'>
                            <option values='all' selected>Races Chien ...</option>
                            <?php while($row_from = $race_from->fetch()) : ?>
                                <option values=<?php echo htmlspecialchars($row_from['race_db']); ?> ><?php echo htmlspecialchars($row_from['race_db']); ?></option>
                                <?php endwhile; ?>
                        </select>
                        <button class="filt" type='submit' name="filtrer">Filtrer</button>
                    </form>
            </div>
            <div class='resultat'style='margin:2% ;flex-wrap:wrap;' >
                <?php if($req->rowCount() == 0){?>
                    <h1 style="width:90%;">Il n'y pas d'animaux dans cette catégorie<h1>
                    <p style="width:80%; font-size:70% ;"> Revenez un autre jour ou regardez dans d'autre catégorie pour trouver votre bonheur <p>
                    <?php }else { while($row = $req->fetch()) : ?>
                    <div class='resultat-item' style='padding:20px;float:left;padding-right:40px;'>
                        <img src=<?php $name=htmlspecialchars($row['puce_db']); $link='"image_video/animaux/'.trim($name).'.jpg"'; echo $link ; ?> style="width:310px  ; height:450px"/>
                        <?php if (strcmp(htmlspecialchars($row['etat_actuel']),'Disponible')!== 0)  { ?>
                                <div name="etat" style="background-color:whitesmoke ; margin-top:-9%;z-index: 7;position:relative;font-size:110%;text-align:center;">
                                    <p><?php echo htmlspecialchars($row['etat_actuel']) ?></p>
                                </div>
                        <?php } ?>
                        <h1><?php echo htmlspecialchars($row['name_db']); ?></h1>
                        <p style='margin: inherit;'> 
                            <?php echo htmlspecialchars($row['gender_db']); ?> <br>
                            <?php echo htmlspecialchars($row['date_db']); ?><br>
                            <?php echo htmlspecialchars($row['background_db']); ?><br>
                            <?php echo htmlspecialchars($row['race_db']); ?> 
                        </p>
                    </div>
                    <?php endwhile ; } ?>
                        
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

    </main>

    

</body>
</html>