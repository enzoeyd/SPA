
<?php
    error_reporting(0);
?>
<?php
            session_start();
            /**#ini_set('display_errors', 'Off');
            $value=0;
            if ($_SESSION['connect']== 'oui') {
                $value=1;
            }else{
                $value=0;
                header('Location: ../connect.php?erreur=1');
            }

            if ($_SESSION['start'] >= time()){
                session_destroy();

            }*/
            $dsn = 'mysql:host=db.fr-pari1.bengt.wasmernet.com;dbname=data_t;charset=utf8';
            $username='d323f2ba7121800092e5cb212ee1';
            $password='0686d323-f2ba-72eb-8000-05b64f18c32d';
            $pdo = new PDO($dsn, $username, $password);
            // On recupère les valeurs des form au niveau chien
            $valeursauv_animal=$_POST['Sauvetage'];
            $valeurrace_animal=$_POST['race_animal'];
            $valeurnom_animal=$_POST['name_animal'];
            $valeurdate_animal=$_POST['date_animal'];
            $valeurpassif_animal=$_POST['passif_animal'];    
            $valeurgenre_animal=$_POST['genre_animal'];
            $valeurpuce_animal=$_POST['puce_animal'];
            $valeurpucesupp_animal=$_POST['pucesupp'];
            $valeurspecies_animal=$_POST['species'];
            $valeursArticleSupp=$_POST['ArticleSelect'];
            $valeuractual_state_animal=$_POST['actual_state'];
            $valeursPuceModif=$_POST['puce_modif'];
            $valeursEtat_actuel_modif=$_POST['actual_state_modif'];

            // On récupère les valeurs des form au niveau article
            $title=addslashes($_POST['title_form']);
            $message=addslashes($_POST['message_form']);

            $msg='';

            $msg_from = $pdo->prepare("SELECT DISTINCT title_db FROM article_db");
            $msg_from->execute(array()); 

            if(isset($_POST['submit'])){
                if($valeursauv_animal=='Oui'){
                    $req = $pdo->prepare("INSERT INTO animal_db (name_db ,date_db, state_db, race_db , background_db, gender_db,species_db,puce_db,etat_actuel) VALUES ('$valeurnom_animal','$valeurdate_animal','Oui','$valeurrace_animal', '$valeurpassif_animal', '$valeurgenre_animal' , '$valeurspecies_animal','$valeurpuce_animal','$valeuractual_state_animal') ");
                    $req->execute();  
                    }
                else {
                    $req = $pdo->prepare("INSERT INTO animal_db (name_db ,date_db, state_db, race_db , background_db, gender_db,species_db,puce_db,etat_actuel) VALUES ('$valeurnom_animal','$valeurdate_animal','Non','$valeurrace_animal', '$valeurpassif_animal', '$valeurgenre_animal', '$valeurspecies_animal','$valeurpuce_animal','$valeuractual_state_animal') ");
                    $req->execute(); 
                }
                }
            if(isset($_POST['submit_article'])){
                    $ma_req='INSERT INTO article_db ( title_db , message_db) VALUES ("'.$title.'"  , "'.$message.'") '  ;
                    $req = $pdo->prepare($ma_req);
                    $req->execute();
                }

            if(isset($_POST['submit_articleSupp'])){
                    $ma_req = 'DELETE FROM article_db WHERE title_db="'.$valeursArticleSupp.'"';
                    $req = $pdo->prepare($ma_req);
                    $req->execute();
                }

            if (isset($_POST['submit'])) {
    
                $filename = $_FILES["uploadfile"]["name"];
                $tempname = $_FILES["uploadfile"]["tmp_name"];
                $newfilename = trim($valeurpuce_animal).'.jpg'  ;
                $folder = "image_video/animaux/".trim($newfilename); // ne pas mettre en chemin absolue 
                if (move_uploaded_file($tempname, $folder))  {
                    $msg = "Image uploaded successfully";
                }else{
                    $msg = "Failed to upload image";
                }
                echo $msg ;
                }
            if(isset($_POST['supprimer'])){
                if($valeurpucesupp_animal!=""){
                    $req = $pdo->prepare("DELETE FROM animal_db WHERE puce_db='$valeurpucesupp_animal'");
                    $req->execute(); 
                    $chemin="image_video/animaux/".trim($valeurpucesupp_animal).".jpg";
                    unlink($chemin);
                    }
                }
            if(isset($_POST['submit_modif'])){
                if($valeursPuceModif!=""){
                    $req = $pdo->prepare("UPDATE animal_db SET etat_actuel='$valeursEtat_actuel_modif' WHERE puce_db='$valeursPuceModif'");
                    $req->execute(); 
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
            <title>Perso</title>
            <link rel="stylesheet" href="css/pageperso_style.css">
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
                                <a href="pageperso.php">
                                    <i class='bx bxs-user-account icon'></i>
                                    <span class="text nav-text"><?php echo $_SESSION['username'] ?></span>
                                    <a href='treatment/unlogin_treat.php'><i class='bx bx-log-out icon' ></i></a>
                                </a>
                            </li>
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

        <div class='content'>
            <div class='cont'>
                <form action="pageperso.php"  method="POST" enctype="multipart/form-data">
                    <h1>Ajouter Un Animal</h1>
                    <div class="inputs">
                        <input name='puce_animal' type='input' placeholder='Numéro de dossier...' required>
                        <input name='name_animal'type="input" placeholder="Nom.." required >
                        <input name='race_animal' type="input" placeholder="Race.." >
                        <input name='passif_animal' type="input" placeholder="Passif..">
                        <label for="Sauvetage">Sauvetage <input type='checkbox' id="Sauvetage" name="Sauvetage" value='Oui' ></label>
                        <input name='date_animal' type='date' placeholder='Date de Naissance..' required>
                        <select name="genre_animal" type='input'required >
                            <option values='Male' selected>Male</option>
                            <option values='Femelle'>Femelle</option>
                        </select>
                        <select name='actual_state' type ='input' required >
                            <option values='Disponible' selected>Disponible</option>
                            <option values='F.A'>F.A</option>
                            <option values='Réservé'>Réservé</option>
                         </select>
                        <select name='species' type ='input' required >
                            <option values='Chien' selected>Chien</option>
                            <option values='Chat'>Chat</option>
                            <option values='Autres'>Autres</option>
                         </select>   
                        <label  for="file">Photo de l'animal : <input type="file" name="uploadfile" value=""/> </label>
                        
                    </div>
                    <button name='submit' type="submit">Ajouter</button>
                    </div>
                </form>
                <form action="pageperso.php" method="post" class='supp' >
                    <h1>Supprimer Un Animal</h1>
                    <div class="inputs">
                        <input name='pucesupp' type="input" placeholder="Numéro de Dossier.." required >
                    </div>
                    <button name='supprimer' type="supprimer">Supprimer</button>
                    </div>
                </form>
                <form action="pageperso.php" method="post" class='Modifier' enctype="multipart/form-data" >
                    <h1>Modifier Etat</h1>
                    <div class="inputs">
                        <input name='puce_modif' type="input" placeholder="Numéro de dossier ..." required >
                        <select name='actual_state_modif' type ='input' required >
                            <option values='Disponible' selected>Disponible</option>
                            <option values='F.A'>F.A</option>
                            <option values='Réservé'>Réservé</option>
                        </select>
                    </div>
                    <button name='submit_modif' type="submit">Modifier</button>
                    </div>
                </form >
                <form action="pageperso.php" method="post" class='Article' enctype="multipart/form-data" >
                    <h1>Ajouter Un Article</h1>
                    <div class="inputs">
                        <input name='title_form' type="input" placeholder="Titre ..." required >
                        <input name='message_form' type="input" placeholder="Article ..." required>
                    </div>
                    <button name='submit_article' type="submit">Ajouter</button>
                    </div>
                </form >
                <form action="pageperso.php" method="post" class='SuppArticle' enctype="multipart/form-data">
                    <h1>Supprimer Un Article</h1>
                    <select name="ArticleSelect" class='inputs' type='input'>
                        <option values='all' selected>Choisir Un Article</option>
                        <?php while($row_from = $msg_from->fetch()) : ?>
                            <option values=<?php echo ($row_from['title_db']); ?> ><?php echo htmlspecialchars($row_from['title_db']); ?></option>
                            <?php endwhile; ?>
                    </select>
                    <button name='submit_articleSupp' type="submit">Supprimer</button>
                </form>
            </div>
        </div>
    </main>
</body>
<script src="style/app.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://unpkg.com/@barba/core"></script>
<script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.2.4/gsap.min.js"
></script>
<script src="style/main.js"></script></script>
</html>
