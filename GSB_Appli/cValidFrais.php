<?php
/** 
 * Page d'accueil de l'application web AppliFrais
 * @package default
 * @todo  RAS
 */
  $repInclude = './include/';
  require($repInclude . "_init.inc.php");

  // page inaccessible si membre non connecté
  if ( !estMembreConnecte() ) 
  {
        header("Location: cSeConnecter.php");
  }
  require($repInclude . "_entete.inc.html");
  require($repInclude . "_sommaire.inc.php");
?>
  <!-- Division principale -->
  <div id="contenu">
  <h1>Validation des Frais</h1>
	<form name="formValidFrais" method="post" action="enregValidFrais.php">
            
            
            
            <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Language" content="fr" />
<title>Exemple d'une liste liée en AJAX</title>
<meta name="Description" content="Exemple d'une liste liée en AJAX." />
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="fonctions.js"></script>
</head>
 
<body>
 
<div id="centre">
 
<h1>Exemple d'une liste liée en AJAX</h1>
 
<form method="post" name="liste">
<label>Régions : </label>
<select name="region" id="region" onchange="Departements(this.value);">
<option value="vide">- - - Choisissez une région - - -</option>

</select><br/>
 <?php

$coucou = obtenirMembre();
print_r($coucou);
 
?>
<!-- Dans ce bloc sera affiché la liste des départements -->
<div id="blocDepartements">
<?php
/*Pour garder la sélection de la seconde liste, on l'inclue directement dans la page lors de la validation du formulaire*/
if(isset($_POST['region'])){
//on créer une variable utilisé dans la page "traitement.php"
$include = 1;
//on inclue la page
include('traitement.php');
}
?>
</div>
<input type="submit" name="Valider" value="Valider"/>
</form>
            
            
            
            
		<label class="titre">Choisir le visiteur :</label>
			<select name="lstVisiteur" class="zone"><option value="a131">Villechalane</option></select><br/>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
			<label class="titre">Mois :</label> <input class="zone" type="text" name="dateValid" size="12" />
		<p class="titre" />
		<div style="clear:left;"><h2>Frais au forfait </h2></div>
		<table style="color:white;" border="1">
			<tr><th>Repas midi</th><th>Nuitée </th><th>Etape</th><th>Km </th><th>Situation</th></tr>
			<tr align="center"><td width="80" ><input type="text" size="3" name="repas"/></td>
				<td width="80"><input type="text" size="3" name="nuitee"/></td> 
				<td width="80"> <input type="text" size="3" name="etape"/></td>
				<td width="80"> <input type="text" size="3" name="km" /></td>
				<td width="80"> 
					<select size="3" name="situ">
						<option value="E">Enregistré</option>
						<option value="V">Validé</option>
						<option value="R">Remboursé</option>
					</select></td>
				</tr>
		</table>
		
		<p class="titre" /><div style="clear:left;"><h2>Hors Forfait</h2></div>
		<table style="color:white;" border="1">
			<tr><th>Date</th><th>Libellé </th><th>Montant</th><th>Situation</th></tr>
			<tr align="center"><td width="100" ><input type="text" size="12" name="hfDate1"/></td>
				<td width="220"><input type="text" size="30" name="hfLib1"/></td> 
				<td width="90"> <input type="text" size="10" name="hfMont1"/></td>
				<td width="80"> 
					<select size="3" name="hfSitu1">
						<option value="E">Enregistré</option>
						<option value="V">Validé</option>
						<option value="R">Remboursé</option>
					</select></td>
				</tr>
		</table>		
		<p class="titre"></p>
		<div class="titre">Nb Justificatifs</div><input type="text" class="zone" size="4" name="hcMontant"/>		
		<p class="titre" /><label class="titre">&nbsp;</label><input class="zone"type="reset" /><input class="zone"type="submit" />
	</form>
	
</div>
<?php        
  require($repInclude . "_pied.inc.html");
?>
