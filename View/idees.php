<?php

while( $idee = $idees->fetch() ) // on r�cup�re la liste des idees
{
        echo 'proposition: '.$idee->titre.'<br />
        Contenu'.$idee->message .'<br/>'.
        '<a href="./voteFor"> Voter pour  </a> <br/>
            <a href="./voteAgainst"> Voter contre </a>';
       
                // 
        
}
$resultats->closeCursor(); // on ferme le curseur des r�sultats
?>