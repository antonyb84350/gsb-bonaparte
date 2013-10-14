<?php
/**
 * Page d'accueil de l'application web AppliFrais
 * @package default
 * @todo  RAS
 */
$repInclude = './include/';
require($repInclude . "_init.inc.php");

// page inaccessible si membre non connecté
if (!estMembreConnecte()) {
    header("Location: cSeConnecter.php");
}
require($repInclude . "_entete.inc.html");
require($repInclude . "_sommaire.inc.php");
?>

<script>
    function ajoutLigne(pNumero) {//ajoute une ligne de produits/qté à la div "lignes"     
        //masque le bouton en cours
        document.getElementById("but" + pNumero).setAttribute("hidden", "true");
        pNumero++;					//incrémente le numéro de ligne
        var laDiv = document.getElementById("lignes");	//récupère l'objet DOM qui contient les données
        var titre = document.createElement("label");	//crée un label
        laDiv.appendChild(titre);			//l'ajoute à la DIV
        titre.setAttribute("class", "titre");		//définit les propriétés
        titre.innerHTML = "   " + pNumero + " : ";
        //zone our la date du frais
        var ladate = document.createElement("input");
        laDiv.appendChild(ladate);
        ladate.setAttribute("name", "FRA_AUT_DAT" + pNumero);
        ladate.setAttribute("size", "12");
        ladate.setAttribute("class", "zone");
        ladate.setAttribute("type", "text");
        //zone de saisie pour un nouveau libell�			
        var libelle = document.createElement("input");
        laDiv.appendChild(libelle);
        libelle.setAttribute("name", "FRA_AUT_LIB" + pNumero);
        libelle.setAttribute("size", "30");
        libelle.setAttribute("class", "zone");
        libelle.setAttribute("type", "text");
        //zone de saisie pour un nouveau montant		
        var mont = document.createElement("input");
        laDiv.appendChild(mont);
        mont.setAttribute("name", "FRA_AUT_MONT" + pNumero);
        mont.setAttribute("size", "3");
        mont.setAttribute("class", "zone");
        mont.setAttribute("type", "text");
        var bouton = document.createElement("input");
        laDiv.appendChild(bouton);
        //ajoute une gestion évenementielle en faisant évoluer le numéro de la ligne
        bouton.setAttribute("onClick", "ajoutLigne(" + pNumero + ");");
        bouton.setAttribute("type", "button");
        bouton.setAttribute("value", "+");
        bouton.setAttribute("class", "zone");
        bouton.setAttribute("id", "but" + pNumero);
                
        var mont = document.createElement("br");
        laDiv.appendChild(mont);
        
    }
</script>

<!-- Division principale -->
<div id="contenu">
    <h1>Gestion des frais de visite</h1>
    <form name="formSaisieFrais" method="post" action="enregSaisieFrais.php">
        <h1> Saisie </h1>
        <label class="titre">PERIODE D'ENGAGEMENT :</label><br/>
        <label style="float:left;">Mois (2 chiffres) : </label><input type="text" size="4" name="FRA_MOIS" class="zone"/><br/>
        <label style="float:left;">Année (4 chiffres) : </label><input type="text" size="4" name="FRA_AN" class="zone"/><br/>
        <p class="titre"/><div style="clear:left;"><h2>Frais au forfait</h2></div>
        <label class="titre">Repas midi :</label><input type="text" size="2" name="FRA_REPAS" class="zone"/>
        <label class="titre">Nuitées :</label><input type="text" size="2" name="FRA_NUIT" class="zone"/>
        <label class="titre">Etape :</label><input type="text" size="5" name="FRA_ETAP" class="zone"/>
        <label class="titre">Km :</label><input type="text" size="5" name="FRA_KM" class="zone"/>
        <p class="titre"/><div style="clear:left;"><h2>Hors Forfait</h2></div>
        <div style="clear:left;">			
            <div style="margin-left:180;float:left;width:90;text-align:center;">Date</div>
            <div style="float:left;width:220;text-align:center;">Libellé</div>
            <div style="float:left;width:30;text-align:center;">Montant</div>
        </div>
        <div style="clear:left;" id="lignes">
            <label class="titre"> 1 : </label>
            <input type="text" size="12" name="FRA_AUT_DAT1" class="zone"/>
            <input type="text" size="30" name="FRA_AUT_LIB1" class="zone"/>
            <input class="zone" size="3" name="FRA_AUT_MONT1" type="text"/>		
            <input type="button" id="but1" value="+" onclick="ajoutLigne(1);" class="zone"/><br/>		
        </div>	
        <p class="titre" /><label class="titre">&nbsp;</label><input class="zone"type="reset"/><input class="zone"type="submit" />
    </form>

</div>
<?php
require($repInclude . "_pied.inc.html");
?>