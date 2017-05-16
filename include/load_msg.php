<?php
 function load_msg($pseudo = 'everybody'){
  include ('config/bdd.php');
   if ($pseudo == 'everybody'){
       $sql = "SELECT pseudo, message, img FROM publications";
       $req = $bd->prepare($sql);
       $req->execute();
       $result = $req->fetchall();
       $req->closeCursor();
       print_r($result);
       if (count($result) == 0){
         echo "<div class='annonces'>\n
           <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
             Il n'y aucun message publié
           <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>\n
         </div>\n";
       }else{
         foreach ($result as $key => $value) {
           echo "
           <div class='answer'>\n
           		<div class='auteur'>\n
           			<img src='img/logo.png' alt='George' />\n
           			<p>{$value['pseudo']}</p>\n
           		</div>\n
           		<div class='texte'>\n
                {$value['message']}
           		</div>
           	</div>"
         }
       }
   }else{
   }
}
 ?>
