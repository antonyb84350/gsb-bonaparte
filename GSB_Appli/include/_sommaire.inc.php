<?php
/** 
 * Contient la division pour le sommaire, sujet à des variations suivant la 
 * connexion ou non d'un utilisateur, et dans l'avenir, suivant le type de cet utilisateur 
 * @todo  RAS
 */

?>
    <!-- Division pour le sommaire -->
    <div id="menuGauche">
     <div id="infosUtil">
    <?php      
    
      if (estMembreConnecte() ) {
          $idUser = obtenirIdUserConnecte() ;
          $lgUser = $pdo->getInfosMembre($idUser);
          $nom = $lgUser['nom'];
          $prenom = $lgUser['prenom']; 
           
          if($lgUser['idrole'] == 1)
          { $role = 'Visiteur'; }
          elseif($lgUser['idrole'] == 2)
          { $role = 'Comptable'; }
          
    ?>
        <h2>
    <?php  
            echo $nom . " " . $prenom ;
    ?>
        </h2>
         
         
         <h3> Type: <?php echo $role; ?></h3>        
    <?php
       }
    ?>  
      </div>  
<?php      
  if (estMembreConnecte() ) {
?>
        <ul id="menuList">
           <li class="smenu">
              <a href="cAccueil.php" title="Page d'accueil">Accueil</a>
           </li>
           <li class="smenu">
              <a href="cSaisieFicheFrais.php" title="Saisie fiche de frais du mois courant">Saisie fiche de frais</a>
           </li>
           <li class="smenu">
              <a href="cConsultFichesFrais.php" title="Consultation de mes fiches de frais">Mes fiches de frais</a>
           </li>
           <?php      
           if ($lgUser['idrole'] == 2) {
           ?>
           <li class="smenu">
              <a href="ValidFrais.php" title="Valider les frais" style="color:green;">Valider les frais</a>
           </li>
           <li class="smenu">
              <a href="SaisieFrais.php" title="Saisie de frais" style="color:green;">Saisie de frais</a>
           </li>
           <?php      
           }
           ?>
           <?php      
           if ($lgUser['idrole'] == 1) {
           ?>
           <li class="smenu">
              <a href="formSaisieFrais.htm" title="Gérer les frais" style="color:green;">Gérer les frais</a>
           </li>
           <?php      
           }
           ?>
           <li class="smenu">
              <a href="cSeDeconnecter.php" title="Se déconnecter" style="color:red;">Se déconnecter</a>
           </li>
           
         </ul>
        <?php
          // affichage des éventuelles erreurs déjà détectées
          if ( nbErreurs($tabErreurs) > 0 ) {
              echo toStringErreurs($tabErreurs) ;
          }
  }
        ?>
    </div>
    