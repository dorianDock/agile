<?php


/*
foreach ( $idees as $idee ) // on récupère la liste des idees
{

        echo 'proposition: '.$idee->getTitre().'<br />
        Contenu'.$idee->getMessage().'<br/>'.
        '<a href="./voteFor"> Voter pour  </a> <br/>
        <a href="./voteAgainst"> Voter contre </a>';
}
*/

foreach($idees as $idee) {
    $valeur = $idee->getValues();
            
    echo 'proposition: '.$valeur["titre"]. '<br/>
        détail: '.$valeur["message"];
}
?>