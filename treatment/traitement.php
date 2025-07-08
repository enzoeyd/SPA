<?php
 
if(isset($_POST['submit']))
{
    #connexion à la base de données sql du serveur local laragon avec la méthode pdo
    $dsn = 'mysql:host=localhost;dbname=u953351322_spahauteloire;charset=utf8';
    $username='u953351322_spa43';
    $password='Animaux43.';
    $db = new PDO($dsn, $username, $password);
    
    $uname = $_POST['id']; #on récupère la valeur de l'identifiant 
    $psswrd = $_POST['psw'];#on récupère la valeur du mot de passe
    if($uname != "" && $psswrd != "") # si le mot de passe et l'identifiant n'est pas vide 
    {	
		$req = $db->query("SELECT count(*) FROM user where username_db = '".$uname."' and password_db = '".$psswrd."'");
		$count = $req->fetchColumn(); 
        if($count!=0) #si $count est strictement différent de 0 
        {
            session_start();  #ouverture d'une session
           $_SESSION['username'] = $uname;#le nom de la session prend le nom entrer
           $_SESSION['connect'] = "oui";
           $_SESSION['start'] = time(); 


           header('Location: ../pageperso.php'); #et renvoie vers la page pageperso.php
        }
        else
        {
           header('Location: ../connect.php?erreur=1'); # si count= 0 alors on renvoie sur le formulaire avec une erreur 1 qui veut dire que le mot de passe ou l'identifiant est invalide 
        }
    }
    else
    {
       header('Location: ../connect.php?erreur=2'); # si le mot de passe ou l'identifiant est vide on renvoie au formulaire avec une erreur 2 c.a.d    
    }
}
else{
    header('Location: ../connect.php'); #si les valeurs ne sont pas récupéré alors on renvoie au formulaire 
}
?>
