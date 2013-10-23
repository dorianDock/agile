<?php
echo '<br/>';
include_once 'insertPostForm.php';
$_SESSION['id'] = 1;
foreach($idees as $idee) {
    $valeur = $idee->getValues();
    echo 'proposition: '.$valeur["titre"]. '<br/>
        détail: '.$valeur["message"];
    if(isset($_SESSION['id'])){
    	echo '<br/><a href="/post/voter/'.$valeur['id'].'/1">J\'aime</a><a href="/post/voter/'.$valeur['id'].'/-1">Je n\'aime pas</a>';
    }
    if(isset($_SESSION['isAdmin']) AND $_SESSION['isAdmin']){
    	echo '<br/><a href="/post/moderer/supprimer/'.$valeur['id'].'">Supprimer</a>';
    }
}
?>