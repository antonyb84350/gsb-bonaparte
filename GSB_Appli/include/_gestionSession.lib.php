<?php
/** 
 * Regroupe les fonctions de gestion d'une session utilisateur.
 * @package default
 * @todo  RAS
 */

/** 
 * Démarre ou poursuit une session.                     
 *
 * @return void
 */
function initSession() {
    session_start();
}

/** 
 * Fournit l'id du membre connecté.                     
 *
 * Retourne l'id du membre connecté, une chaîne vide si pas de membre connecté.
 * @return string id du membre connecté
 */
function obtenirIdUserConnecte() {
    $ident="";
    if ( isset($_SESSION["loginUser"]) ) {
        $ident = (isset($_SESSION["idUser"])) ? $_SESSION["idUser"] : '';   
    }  
    return $ident ;
}

/**
 * Conserve en variables session les informations du membre connecté
 * 
 * Conserve en variables session l'id $id et le login $login du membre connecté
 * @param string id du membre
 * @param string login du membre
 * @return void    
 */
function affecterInfosConnecte($id, $login, $idrole) {
    $_SESSION["idUser"] = $id;
    $_SESSION["loginUser"] = $login;   
  
}

/** 
 * Déconnecte le membre qui s'est identifié sur le site.                     
 *
 * @return void
 */
function deconnectermembre() {
    session_destroy();
}

/** 
 * Vérifie si un membre s'est connecté sur le site.                     
 *
 * Retourne true si un membre s'est identifié sur le site, false sinon. 
 * @return boolean échec ou succès
 */
function estMembreConnecte() {
    // actuellement il n'y a que les membres qui se connectent
    return isset($_SESSION["loginUser"]);
}
?>