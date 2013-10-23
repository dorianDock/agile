<?php

$_SESSION['id'] = 1;
$_SESSION['isAdmin'] = true;
/*
foreach ( $idees as $idee ) // on récupère la liste des idees
{

        echo 'proposition: '.$idee->getTitre().'<br />
        Contenu'.$idee->getMessage().'<br/>'.
        '<a href="./voteFor"> Voter pour  </a> <br/>
        <a href="./voteAgainst"> Voter contre </a>';
}
*/
echo '<br/>';
include_once 'insertPostForm.php';
foreach($idees as $idee) {
    $valeur = $idee->getValues();
    echo 'proposition: '.$valeur["titre"]. '<br/>
        détail: '.$valeur["message"];
    if(isset($_SESSION['isAdmin']) AND $_SESSION['isAdmin']){
    	echo '<br/><a href="post/moderer/supprimer/'.$valeur['id'].'">Supprimer</a>';
    }
}
?>