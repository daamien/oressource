<?php session_start();

require_once '../moteur/dbconfig.php';

//Vérification des autorisations de l'utilisateur et des variables de session requises pour l'affichage de cette page:
if (isset($_SESSION['id']) AND $_SESSION['systeme'] = "oressource" AND (strpos($_SESSION['niveau'], 'bi') !== false)) {
  include "tete.php";?>
  <head>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="all" href="../css/daterangepicker-bs3.css" />
    <script type="text/javascript" src="../js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script src="../js/raphael.js"></script>
    <script src="../js/morris/morris.js"></script>
    <script type="text/javascript" src="../js/moment.js"></script>
    <script type="text/javascript" src="../js/daterangepicker.js"></script>
  </head>

  <div class="container">
    <div class="row">
      <div class="col-md-11" >
        <h1>Bilan global</h1>
        <div class="col-md-4 col-md-offset-8" >
          <label for="reportrange">Choisissez la période à inspecter:</label><br>
          <div id="reportrange" class="pull-left" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
            <i class="fa fa-calendar"></i>
            <span></span> <b class="caret"></b>
          </div>
          <script type="text/javascript">
"use strict";
function $_GET(param) {
  var vars = {};
  window.location.href.replace( 
    /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
    function( m, key, value ) { // callback
      vars[key] = value !== undefined ? value : '';
    }
  );

  if ( param ) {
    return vars[param] ? vars[param] : null;  
  }
  return vars;
}
                   $(document).ready(function() {

                  var cb = function(start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                    $('#reportrange span').html(start.format('DD, MMMM, YYYY') + ' - ' + end.format('DD, MMMM, YYYY'));
                   // alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
                  }
var dateuno = $_GET('date1');
var moisuno = dateuno.substring(0,2);
var jouruno = dateuno.substring(3,5);
var anneeuno = dateuno.substring(6,10);
var dateunogf = moisuno+'/'+jouruno+"/"+anneeuno;


var datedos = $_GET('date2');
var moisdos = datedos.substring(0,2);
var jourdos = datedos.substring(3,5);
var anneedos = datedos.substring(6,10);
var datedosgf = moisdos+'/'+jourdos+"/"+anneedos;

                  var optionSet1 = {
                     startDate: dateunogf,
                    endDate: datedosgf,
                    minDate: '01/01/2010',
                    maxDate: '12/31/2020',
                    dateLimit: { days: 800 },
                    showDropdowns: true,
                    showWeekNumbers: true,
                    timePicker: false,
                    timePickerIncrement: 1,
                    timePicker12Hour: true,
                    ranges: {
                       "Aujoud'hui": [moment(), moment()],
                       'hier': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                       '7 derniers jours': [moment().subtract(6, 'days'), moment()],
                       '30 derniers jours': [moment().subtract(29, 'days'), moment()],
                       'Ce mois': [moment().startOf('month'), moment().endOf('month')],
                       'Le mois deriner': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    opens: 'left',
                    buttonClasses: ['btn btn-default'],
                    applyClass: 'btn-small btn-primary',
                    cancelClass: 'btn-small',
                    format: 'DD/MM/YYYY',
                    separator: ' to ',
                    locale: {
                        applyLabel: 'Appliquer',
                        cancelLabel: 'Anuler',
                        fromLabel: 'Du',
                        toLabel: 'Au',
                        customRangeLabel: 'Période libre',
                        daysOfWeek: ['Di','Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
                        monthNames: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
                        firstDay: 1
                    }
                  };
                  $('#reportrange').daterangepicker(optionSet1, cb);
                 $('#reportrange span').html($_GET('date1') + ' - ' + $_GET('date2'));
                  $('#reportrange').on('show.daterangepicker', function() { console.log("show event fired"); });
                  $('#reportrange').on('hide.daterangepicker', function() { console.log("hide event fired"); });
                  $('#reportrange').on('apply.daterangepicker', function(ev, picker) { 
                    console.log("apply event fired, start/end dates are " 
                      + picker.startDate.format('DD MM, YYYY') 
                      + " to " 
                      + picker.endDate.format('DD MM, YYYY')                      
                    ); 
                    window.location.href = "bilanv.php?date1="+picker.startDate.format('DD-MM-YYYY')+"&date2="+picker.endDate.format('DD-MM-YYYY')+"&numero=<?php echo $_GET['numero'] ?>";
                  });
                  $('#reportrange').on('cancel.daterangepicker', function(ev, picker) { console.log("cancel event fired"); });

                  $('#options1').click(function() {
                    $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
                  });

                  $('#options2').click(function() {
                    $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
                  });

                  $('#destroy').click(function() {
                    $('#reportrange').data('daterangepicker').remove();
                  });
               });
               </script>
        </div>
        
        <?php
        $date1  = $_GET['date1'];
        $date2  = $_GET['date2'];
        ?>
        
        <ul class="nav nav-tabs">
          <li><a href="bilanc.php?date1=<?=$date1?>&date2=<?=$date2?>&numero=0">Collectes</a></li>
          <li><a href="bilanhb.php?date1=<?=$date1?>&date2=<?=$date2?>&numero=0">Sorties hors-boutique</a></li>
          <li class="active"><a>Ventes</a></li>
        </ul>
      </div>
    </div> <!-- row -->
  </div> <!-- container -->
  <hr/>
  <div class="row">
    <div class="col-md-8 col-md-offset-1" >
    <h2>Bilan des ventes de la structure</h2>
    <ul class="nav nav-tabs">
    <?php //on affiche un onglet par point de vente
    // On recupère tout le contenu des visibles de la table points_vente
    $reponse = $bdd->query('SELECT * FROM points_vente');

    // On affiche chaque entree une à une
    while ($donnees = $reponse->fetch()) {
      // Si le Point de Vente n'est pas visible, on passe directement au prochain
      if ($donnees['visible'] != "oui") continue;
    ?> 
      <li<?php if ($_GET['numero'] == $donnees['id']){ echo ' class="active"';}?>><a href="<?php echo  "bilanv.php?numero=" . $donnees['id']."&date1=".$date1."&date2=" . $date2?>"><?=$donnees['nom']?></a></li>
      <?php }
    $reponse->closeCursor(); // Termine le traitement de la requête
    // sortis de la boucle on affiche un onglet special "touts les points"
      ?>

      <li<?php if ($_GET['numero'] == 0){ echo ' class="active"';}?>><a href="<?php echo  "bilanv.php?numero=0" ."&date1=" . $date1."&date2=" . $date2?>">Tous les points</a></li>
    </ul>
    <br>

    <div class="row">
      <h2>
      <?php
      // on affiche la période visée
      if($date1 == $date2)
        echo 'Le '.$date1." :";
      else
        echo 'Du '.$date1." au ".$date2." :";
      ?>
      </h2>

      <?php
      //on convertit les deux dates en un format compatible avec la bdd
      $date1ft = date_create_from_format('d-m-Y', $date1);
      $time_debut = $date1ft->format('Y-m-d');
      $time_debut = $time_debut." 00:00:00";
      $date2ft = date_create_from_format('d-m-Y', $date2);
      $time_fin = $date2ft->format('Y-m-d');
      $time_fin = $time_fin." 23:59:59";

      if ($_GET['numero'] == 0) { // Pour tous les points de vente car numero == 0  ******************************************************

        // On on verifie le chiffre total degagé
        $req = $bdd->prepare("SELECT SUM(vendus.prix*vendus.quantite) AS total FROM vendus 
          WHERE DATE(vendus.timestamp) BETWEEN :du AND :au AND vendus.prix > 0");
        $req->execute(array('du' => $time_debut,'au' => $time_fin));
        $donnees = $req->fetch();
        $req->closeCursor(); // Libère la connexion au serveur
        $mtotcolo = $donnees['total'];
        if ($mtotcolo == 0 ) {
      ?>
	  <img src="../images/nodata.jpg" class="img-responsive" alt="Responsive image">
        <?php
        } else {
        ?>
          <div class="row">
            <div class="col-md-6">
              <table class='table table-hover'>
                <tbody>
                  <tr>
                    <td>- Nombre de points de vente :</td>
                    <?php // on determine le nombre de points de vente à cet instant
                    $req = $bdd->query("SELECT COUNT(id) FROM points_vente");
                    $donnees = $req->fetch();
                    $req->closeCursor();
                    $nbPointV = $donnees[0]; 
                    ?>
                    <td><?=$nbPointV?></td>
                  </tr>
                  <tr>
                    <td>- Chiffre total dégagé  :</td>
                    <td><?=$mtotcolo?> €</td>
                  </tr>
                  <tr>
                    <td>- Nombre d'objets vendus :</td>
                    <?php // on determine le nombre d'objets vendus
                    $req = $bdd->prepare("SELECT SUM(vendus.quantite) FROM vendus WHERE prix > 0 AND DATE(vendus.timestamp) BETWEEN :du AND :au ");
                    $req->execute(array('du' => $time_debut,'au' => $time_fin ));
                    $donnees = $req->fetch();
                    $req->closeCursor();
                    $nbObjV = $donnees[0];
                    ?>
                    <td><?=$nbObjV?></td>
                  </tr>
                  <tr>
                    <td>- Nombre de ventes :</td>
                    <?php // on determine le nombre de ventes
                    $req = $bdd->prepare("SELECT COUNT(DISTINCT(ventes.id)) FROM ventes ,vendus
                      WHERE vendus.id_vente = ventes.id AND DATE(vendus.timestamp) BETWEEN :du AND :au  AND vendus.prix > 0 ");
                    $req->execute(array('du' => $time_debut,'au' => $time_fin ));
                    $donnees = $req->fetch();
                    $req->closeCursor();
                    $nbVentes = $donnees[0];
                    ?>
                    <td><?=$nbVentes?></td>
                  </tr>
                  <tr>
                    <td>- Panier moyen :</td>
                    <td><?=$mtotcolo/$nbVentes?> €</td>
                  </tr>
                  <tr>
                    <td>- Nombre d'objets remboursés :</td>
                    <td>
                      <?php // on determine le nombre d'objets remboursés
                      $req = $bdd->prepare("SELECT SUM(vendus.quantite) FROM vendus
                        WHERE remboursement > 0 AND DATE(vendus.timestamp) BETWEEN :du AND :au ");
                      $req->execute(array('du' => $time_debut,'au' => $time_fin ));
                      $donnees = $req->fetch();
                      $req->closeCursor();
                      $nbObjR = $donnees[0];
                      if($nbObjR == 0)
                        echo '-';
                      else
                        echo $nbObjR;
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td>- Nombre de remboursemments :</td>
                    <td>
                      <?php // on determine le nombre de remboursement
                      $req = $bdd->prepare("SELECT COUNT(DISTINCT(ventes.id)) FROM ventes ,vendus
                        WHERE vendus.id_vente = ventes.id AND DATE(vendus.timestamp) BETWEEN :du AND :au   AND vendus.remboursement > 0 ");
                      $req->execute(array('du' => $time_debut,'au' => $time_fin ));
                      $donnees = $req->fetch();
                      $req->closeCursor();
                      $nbR = $donnees[0];
                      if($nbR == 0)
                        echo '-';
                      else
                        echo $nbR;
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td>- Somme remboursée :</td>
                    <td>
                      <?php // On recupère tout le contenu de la table point de vente
                      $req = $bdd->prepare("SELECT  SUM(vendus.remboursement) AS total FROM vendus
                        WHERE  DATE(vendus.timestamp) BETWEEN :du AND :au  ");
                      $req->execute(array('du' => $time_debut,'au' => $time_fin ));
                      $totR = $req->fetch();
                      $req->closeCursor();
                      $mtotcolo2 = $totR['total'];
                      if($mtotcolo2 == 0)
                        echo '-';
                      else
                        echo $mtotcolo2.'€';
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td>- Masse pesée en caisse :</td>
                    <td>
                      <?php
                      $req = $bdd->prepare("SELECT SUM(pesees_vendus.masse) FROM pesees_vendus , vendus 
                        WHERE pesees_vendus.id_vendu = vendus.id AND DATE(vendus.timestamp) BETWEEN :du AND :au ");
                      $req->execute(array('du' => $time_debut,'au' => $time_fin ));
                      $donnees = $req->fetch();
                      $req->closeCursor();
                      $Mtpe = $donnees[0];
                      if(intval($Mtpe) == 0)
                        echo '-';
                      else
                        echo $Mtpe. 'Kgs';
                      ?>
                    </td>
                  </tr>
                </tbody>
                <tfoot>
                  <tr>
                    <td align=center colspan=3>
                      <a href="../moteur/export_bilanv.php?numero=<?=$_GET['numero']?>&date1=<?=$date1?>&date2=<?=$date2?>">
                        <button type="button" class="btn btn-default btn-xs">Exporter les ventes de cette période (.csv)</button>
                      </a>
                    </td>
                  </tr>
                </tfoot>
              </table>
              <br><br>
              <?php
// Tableau de recap du Chiffre d'Affaire par mode de paiement
// Utile pour vérifier le fond de caisse en fin de vente
// Equivalent de la touche 'Z' sur une caisse enregistreuse

$sql =  file_get_contents('../mysql/recap_CA_par_mode_paiement_tout_les points.sql');
$req = $bdd->prepare($sql);
$ok = $req->execute(array('du' => $time_debut,'au' => $time_fin ));


//Affichage du tableau
print "<h3>Récapitulatif par mode de paiement</h3>";
print "<table class='table table-hover'>";
print "<thead>";
print "<tr>";
print "<th>Moyen de Paiement</th>";
print "<th>Nombre de Ventes</th>";
print "<th>Chiffre Dégagé</th>";
print "<th>Somme remboursée</th>";
print "</tr>";
print "</tr>";
print "</thead>";
print "<tbody>";

while ($ligne = $req->fetch())
{
print "<tr>";
print "<td>".$ligne['moyen']."</td>";
print "<td>".$ligne['quantite_vendue']."</td>";
print "<td>".$ligne['total']." €</td>";
print "<td>".$ligne['remboursement']." €</td>";
print "</tr>";

}
print "</tbody>";
print "</table>";
?>


<br>
<h4>
 Chiffre dégagé par type d'objet:
</h4>


  
          <div  id="graphPV" style="height: 180px;"></div>
          <br>
          <script>       Morris.Donut({
    element: 'graphPV',
    data: [
<?php 
            // On recupère tout le contenu de la table affectations





            $reponse = $bdd->prepare('SELECT type_dechets.couleur,type_dechets.nom, sum(vendus.prix ) somme FROM type_dechets,vendus WHERE type_dechets.id = vendus.id_type_dechet AND DATE(vendus.timestamp) BETWEEN :du AND :au AND vendus.prix > 0
GROUP BY nom');
 $reponse->execute(array('du' => $time_debut,'au' => $time_fin ));
           // On affiche chaque entree une à une
           while ($donnees = $reponse->fetch())
           {

            echo "{value:".$donnees['somme'].", label:'".$donnees['nom']."'},";


             }
              $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
],
    backgroundColor: '#ccc',
    labelColor: '#060',
    colors: [
<?php 
 
            // On recupère tout le contenu de la table affectations
            $reponse = $bdd->prepare('SELECT type_dechets.couleur,type_dechets.nom, sum(vendus.prix ) somme FROM type_dechets,vendus WHERE type_dechets.id = vendus.id_type_dechet AND DATE(vendus.timestamp) BETWEEN :du AND :au AND vendus.prix > 0
GROUP BY nom');
            $reponse->execute(array('du' => $time_debut,'au' => $time_fin ));
 
           // On affiche chaque entree une à une
           while ($donnees = $reponse->fetch())
           {

            echo "'".$donnees['couleur']."'".",";


             }
              $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
    ],
    formatter: function (x) { return x + " €."}
    });
</script>
          
       <br>
</div>



<div class="col-md-6 ">
  <h3 style="text-align:center;">
    chiffre de caisse : <?php echo  $mtotcolo- $mtotcolo2." €";?>
  </h3>
  <br>
<h3>
Récapitulatif par type d'objet
</h3>
<table class="table table-hover">

      <thead>
       
        <tr>
          <th>type d'objet</th>
          <th>chiffre dégagé</th>
          <th>quantité vendue</th>
          <th>somme remboursée</th>
          <th>quantité rembour.</th>
          <th>masse pésee</th>
          
          
        </tr>
      </thead>
      <tbody>
<?php
            // On recupère tout le contenu de la table affectations
            $reponse2 = $bdd->prepare('SELECT type_dechets.id id,
   type_dechets.nom ,SUM(vendus.prix*vendus.quantite) total 

 FROM type_dechets , vendus, ventes

WHERE vendus.id_vente = ventes.id 
AND type_dechets.id = vendus.id_type_dechet 
AND DATE(vendus.timestamp) BETWEEN :du AND :au 
GROUP BY type_dechets.nom
');
  $reponse2->execute(array('du' => $time_debut,'au' => $time_fin));
           // On affiche chaque entree une à une
           while ($donnees2 = $reponse2->fetch())
           {        
            ?>

            <tr>
              <th scope="row"> <a href=" jours.php?date1=<?php echo $_GET['date1']?>&date2=<?php echo $_GET['date2']?>&type=<?php echo  $donnees2['id'] ?>" > <?php echo $donnees2['nom'] ?> </a></th>
            <td  >
              <?php echo $donnees2['total']." €" ?>
            </td >
            <td >
              <?php
                // on determine le nombre d'objets vendus
            /*

            */
 $req = $bdd->prepare("SELECT SUM(vendus.quantite) FROM vendus WHERE prix > 0 
  AND vendus.id_type_dechet = :id AND DATE(vendus.timestamp) BETWEEN :du AND :au ");
 $req->execute(array('du' => $time_debut,'au' => $time_fin ,'id' => $donnees2['id'] ));
 $donnees = $req->fetch();
echo $donnees['SUM(vendus.quantite)'];
$Nt = $donnees['SUM(vendus.quantite)'];

$req->closeCursor(); // Termine le traitement de la requête ?>
            </td>
            <td>
              <?php 
  // On determinela somme totale remboursée pour ce type d'objet
  $req3 = $bdd->prepare("SELECT  SUM(vendus.remboursement) AS total   FROM vendus 
   WHERE  DATE(vendus.timestamp) BETWEEN :du AND :au AND vendus.id_type_dechet = :id  ");
  $req3->execute(array('du' => $time_debut,'au' => $time_fin ,'id' => $donnees2['id'] ));
  $donnees3 = $req3->fetch();
if($donnees3['total'] == 0){
echo "-"."<br>";
}else{
echo $donnees3['total']." €";  
}
  $req3->closeCursor(); // Termine le traitement de la requête ?>
            </td>  
            
            <td >
              <?php
                // on determine le nombre d'objets remboursés pour ce type d'objet
            /*

            */
 $req = $bdd->prepare("SELECT SUM(vendus.quantite) FROM vendus WHERE remboursement > 0 
  AND vendus.id_type_dechet = :id AND DATE(vendus.timestamp) BETWEEN :du AND :au ");
 $req->execute(array('du' => $time_debut,'au' => $time_fin ,'id' => $donnees2['id'] ));
 $donnees = $req->fetch();
if($donnees3['total'] == 0){
echo "-";
}else{
echo intval($donnees['SUM(vendus.quantite)']);
}
$req->closeCursor(); // Termine le traitement de la requête ?>
            </td>
            <td> <?php
                // on determine la masse d'objets pesés
            /*

            */
 $req = $bdd->prepare("SELECT SUM(pesees_vendus.masse) 
  FROM pesees_vendus , vendus 
  WHERE pesees_vendus.id_vendu = vendus.id
  AND vendus.id_type_dechet = :id 
  AND DATE(vendus.timestamp) BETWEEN :du AND :au ");
 $req->execute(array('du' => $time_debut,'au' => $time_fin ,'id' => $donnees2['id'] ));
 $donnees = $req->fetch();
echo round($donnees['SUM(pesees_vendus.masse)'],2)." Kgs.";
$Mtpe = $donnees['SUM(pesees_vendus.masse)'];
$req->closeCursor(); // Termine le traitement de la requête ?></td>
           
            
        </tr>
        
 <?php
             }
              $reponse2->closeCursor(); // Termine le traitement de la requête
                ?>




        
          
         
        
        </tbody>
        <tfoot>
    <tr>
      <td></td>
        <td></td>
       <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tfoot>

    </table>
<h3>
Récapitulatif des masses pesées à la caisse 
</h3>
<table class="table table-hover">

      <thead>
       
        <tr>
          <th>type d'objet</th>
          <th>chiffre dégagé</th>
          <th>masse pésee</th>
          <th>nombre de pesées</th>
          <th>nombre d'objets pesés</th>
          <th>nombre d'objets vendus</th>
          <th>masse sortie totale estimée</th>
          <th>prix à la tonne estimé</th>
          <th>certitude de l'estimation</th>
        </tr>
      </thead>
           <tbody>
<?php
            // On recupère le nom du type d'objet et son C.A. lié
            $reponse2 = $bdd->prepare('SELECT type_dechets.id id,
   type_dechets.nom ,SUM(vendus.prix*vendus.quantite) total 

 FROM type_dechets , vendus, ventes

WHERE vendus.id_vente = ventes.id 
AND type_dechets.id = vendus.id_type_dechet 
AND DATE(vendus.timestamp) BETWEEN :du AND :au 
GROUP BY type_dechets.nom
');
  $reponse2->execute(array('du' => $time_debut,'au' => $time_fin));
           // On affiche chaque entree une à une
           while ($donnees2 = $reponse2->fetch())
           {        
            ?>

            <tr>
              <th scope="row"> <a href=" jours.php?date1=<?php echo $_GET['date1']?>&date2=<?php echo $_GET['date2']?>&type=<?php echo  $donnees2['id'] ?>" > <?php echo $donnees2['nom'] ?> </a></th>
            <td  >
              <?php echo $donnees2['total']." €";
              $cd = $donnees2['total'];
               ?>
            </td >
            <td> <?php
                // on determine la masse d'objets pesés
            /*

            */
 $req = $bdd->prepare("SELECT SUM(pesees_vendus.masse) 
  FROM pesees_vendus , vendus 
  WHERE pesees_vendus.id_vendu = vendus.id
  AND vendus.id_type_dechet = :id 
  AND DATE(vendus.timestamp) BETWEEN :du AND :au ");
 $req->execute(array('du' => $time_debut,'au' => $time_fin ,'id' => $donnees2['id'] ));
 $donnees = $req->fetch();
echo round($donnees['SUM(pesees_vendus.masse)'],2)." Kgs.";
$Mtpe = $donnees['SUM(pesees_vendus.masse)'];
$req->closeCursor(); // Termine le traitement de la requête ?></td>
           
            

               <td> <?php
                // on determine le nombre de pesés
            /*

            */
 $req = $bdd->prepare("SELECT COUNT(DISTINCT(pesees_vendus.id)) 
  FROM pesees_vendus , vendus 
  WHERE pesees_vendus.id_vendu = vendus.id
  AND vendus.id_type_dechet = :id 
  AND DATE(vendus.timestamp) BETWEEN :du AND :au ");
 $req->execute(array('du' => $time_debut,'au' => $time_fin ,'id' => $donnees2['id'] ));
 $donnees = $req->fetch();
echo round($donnees['COUNT(DISTINCT(pesees_vendus.id))'],2);
$Ntpe = $donnees['COUNT(DISTINCT(pesees_vendus.id))'];
$req->closeCursor(); // Termine le traitement de la requête ?></td>
          
           <td> <?php
            // on determine le nombre d'objets pesés

 $req = $bdd->prepare("SELECT SUM(pesees_vendus.quantite) 
  FROM pesees_vendus , vendus 
  WHERE pesees_vendus.id_vendu = vendus.id
  AND vendus.id_type_dechet = :id 
  AND DATE(vendus.timestamp) BETWEEN :du AND :au ");
 $req->execute(array('du' => $time_debut,'au' => $time_fin ,'id' => $donnees2['id'] ));
 $donnees = $req->fetch();
$Notpe = $donnees['SUM(pesees_vendus.quantite)'];
echo $Notpe ;
$req->closeCursor(); // Termine le traitement de la requête

            ?></td>

           <td><?php
                // on determine le nombre d'objets vendus
            /*

            */
 $req = $bdd->prepare("SELECT SUM(vendus.quantite) FROM vendus,ventes WHERE prix > 0 
  AND vendus.id_type_dechet = :id AND DATE(vendus.timestamp) BETWEEN :du AND :au  AND ventes.id = vendus.id_vente ");
 $req->execute(array('du' => $time_debut,'au' => $time_fin ,'id' => $donnees2['id']));
 $donnees = $req->fetch();
$ov = $donnees['SUM(vendus.quantite)'];
echo $ov;
$req->closeCursor(); // Termine le traitement de la requête ?></td>
            <td>

              

<?php
// on determine la masse moyenne d'un objet dans toute la base (pour le type d'objet en cours) = $Mm

               
 $req = $bdd->prepare("SELECT AVG(pesees_vendus.masse) 
  FROM pesees_vendus , vendus 
  WHERE pesees_vendus.id_vendu = vendus.id
  AND pesees_vendus.masse > 0
  AND vendus.id_type_dechet = :id ");
 $req->execute(array('id' => $donnees2['id'] ));
 $donnees = $req->fetch();
$Mm = $donnees['AVG(pesees_vendus.masse)'];
//echo $Mm;
$req->closeCursor(); // Termine le traitement de la requête 

/*
estimation de la masse totale vendue sur la periode pour tout les points de vente

masse moyenne d'un objet dans toute la base (pour le type d'objet en cours) = $Mm
nombre d'objets vendus (tout types confondus) = $Nt
nombre d'objets pesées sur la periode = $Np
masse totale d'objets peses sur cette periode = $Mtpe
nombre de pesées sur la periode pour le type d'objet = $Ntpe
nombre d'objets pesés sur la periode pour le type d'objet = $Notpe
nombre d'objets vendus sur la periode pour le type d'objet = $ov



if($ov == $Notpe)
{
$mtee = $Mtpe;
$certitude = 100;
}
else
{
$mtee = (($Mm*$ov)-($Mm*$Np))+$Mtpe;
$certitude = 0;
}
*/



//$mtee = round((($Mm*$Nt)-($Mm*$Mp))+$Mtpe, 2);
if($ov == $Notpe)
{
$mtee = $Mtpe;
$certitude = 100;
}
else
{
$mtee = (($Mm*$ov)-($Mm*$Np))+$Mtpe;
$certitude = round(($Notpe/$ov)*100,2);
}
echo round($mtee,2)." Kgs.";
?>


            </td>   
            <td>
<?php
echo round(($cd/$mtee)*1000,2)." €";

 ?>

            </td>    
            <td>
              <?php 



//on traduit le pourcentage en valeur de vert 100% = tout vert    
$Gvalue = round($certitude * 2.55,0);      

//on traduit le pourcentage en valeur de rouge 0% = tout rouge
$Rvalue = round(255 - $Gvalue,0);

               ?>


 <span class='badge' id='Bcertitude' style='background-color: RGB(<?php echo $Rvalue ?>,<?php echo $Gvalue ?>,0);'>
<?php echo $certitude."%"; ?>
 </span>
              

            </td>
        </tr>
        
 <?php
             }
              $reponse2->closeCursor(); // Termine le traitement de la requête
                ?>




        
          
         
        
        </tbody>
        <tfoot>
    <tr>
      <td></td>
        <td></td>
       <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      
    </tr>
  </tfoot>
    </table>
<br>

<h4>
 Masses pesées en caisse par type d'objet:
</h4>
  
          <div  id="graphMV" style="height: 180px;"></div>
          <br>
          <script>       Morris.Donut({
    element: 'graphMV',
    data: [
<?php 
            // On recupère tout le contenu de la table affectations





            $reponse = $bdd->prepare('SELECT type_dechets.couleur,type_dechets.nom, sum(pesees_vendus.masse ) somme FROM type_dechets,vendus,pesees_vendus WHERE type_dechets.id = vendus.id_type_dechet AND vendus.id = pesees_vendus.id_vendu  AND DATE(vendus.timestamp) BETWEEN :du AND :au AND vendus.prix > 0
GROUP BY nom');
 $reponse->execute(array('du' => $time_debut,'au' => $time_fin ));
           // On affiche chaque entree une à une
           while ($donnees = $reponse->fetch())
           {

            echo "{value:".$donnees['somme'].", label:'".$donnees['nom']."'},";


             }
              $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
],
    backgroundColor: '#ccc',
    labelColor: '#060',
    colors: [
<?php 
 
            // On recupère tout le contenu de la table affectations
            $reponse = $bdd->prepare('SELECT type_dechets.couleur,type_dechets.nom, sum(pesees_vendus.masse) somme FROM type_dechets,vendus,pesees_vendus WHERE type_dechets.id = vendus.id_type_dechet AND vendus.id = pesees_vendus.id_vendu AND DATE(vendus.timestamp) BETWEEN :du AND :au AND vendus.prix > 0
GROUP BY nom');
            $reponse->execute(array('du' => $time_debut,'au' => $time_fin ));
 
           // On affiche chaque entree une à une
           while ($donnees = $reponse->fetch())
           {

            echo "'".$donnees['couleur']."'".",";


             }
              $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
    ],
    formatter: function (x) { return x + " Kgs."}
    });
</script>
          
       <br>



</div>
</div>
<?php
}



}
else // si numero ==! 0*********************************************************************************************************************************************************
{


// On on verifie le chiffre total degagé
  $req = $bdd->prepare("SELECT  SUM(vendus.prix*vendus.quantite) AS total   FROM vendus 
   WHERE  DATE(vendus.timestamp) BETWEEN :du AND :au AND vendus.prix > 0  ");
  $req->execute(array('du' => $time_debut,'au' => $time_fin ));
  $donnees = $req->fetch();
  $mtotcolo = $donnees['total'];
  $req->closeCursor(); // Termine le traitement de la requête
if ($mtotcolo == 0 )
{
?>
<img src="../images/nodata.jpg" class="img-responsive" alt="Responsive image">
<?php
}else{


  

?>
  <div class="row">
  <div class="col-md-6">
    <table class='table table-hover'>
    <tbody><tr>
  <?php
echo '<tr><td>-chiffre total dégagé  : </td>';
            // On recupère tout le contenu de la table point de vente


$req = $bdd->prepare("SELECT SUM(vendus.prix*vendus.quantite) AS total  
FROM vendus ,ventes
WHERE DATE(ventes.timestamp) BETWEEN :du AND :au AND ventes.id_point_vente  = :numero 
AND ventes.id = vendus.id_vente AND vendus.prix > 0");
$req->execute(array('du' => $time_debut,'au' => $time_fin,'numero' => $_GET['numero'] ));
$donnees = $req->fetch();
$mtotcolo = $donnees['total'];
echo "<td>".$donnees['total']." €"."</td></tr>";
$req->closeCursor(); // Termine le traitement de la requête
echo "<tr><td>-nombre d'objets vendus : </td>";
// on determine le nombre d'objets vendus
            /*

            */
 $req = $bdd->prepare("SELECT SUM(vendus.quantite) FROM vendus, ventes WHERE vendus.prix > 0 AND DATE(vendus.timestamp) BETWEEN :du AND :au AND ventes.id_point_vente  = :numero AND ventes.id = vendus.id_vente");
 $req->execute(array('du' => $time_debut,'au' => $time_fin,'numero' => $_GET['numero'] ));
 $donnees = $req->fetch();
 echo "<td>".$donnees['SUM(vendus.quantite)']."</td></tr>"; 
 echo '<tr><td>-nombre de ventes : </td>';
 // on determine le nombre de ventes
            /*

            */
 $req = $bdd->prepare("SELECT COUNT(DISTINCT(ventes.id)) FROM ventes ,vendus WHERE vendus.id_vente = ventes.id AND DATE(vendus.timestamp) BETWEEN :du AND :au  AND vendus.prix > 0 AND ventes.id_point_vente  = :numero");
 $req->execute(array('du' => $time_debut,'au' => $time_fin,'numero' => $_GET['numero'] ));
 $donnees = $req->fetch();
 echo "<td>".$donnees['COUNT(DISTINCT(ventes.id))']."</td></tr>";

echo '<tr><td>-nombre de ventes : </td>';
// on determine le nombre de ventes
            /*

            */
 $req = $bdd->prepare("SELECT COUNT(DISTINCT(ventes.id)) FROM ventes ,vendus WHERE vendus.id_vente = ventes.id AND DATE(vendus.timestamp) BETWEEN :du AND :au  AND vendus.prix > 0 AND ventes.id_point_vente  = :numero ");
 $req->execute(array('du' => $time_debut,'au' => $time_fin,'numero' => $_GET['numero'] ));
 $donnees = $req->fetch();
 $nventes = $donnees['COUNT(DISTINCT(ventes.id))'];
echo "<td>".$donnees['COUNT(DISTINCT(ventes.id))']."</td></tr>";
echo '<tr><td>-panier moyen : </td> <td>'.$mtotcolo/$nventes.' € </td></tr>';
echo "<tr><td>-nombre d'objets remboursés :  </td> ";
// on determine le nombre d'objets remboursés
            /*

            */
 $req = $bdd->prepare("SELECT SUM(vendus.quantite) FROM vendus,ventes WHERE vendus.remboursement > 0 AND DATE(vendus.timestamp) BETWEEN :du AND :au AND ventes.id_point_vente  = :numero AND ventes.id = vendus.id_vente");
 $req->execute(array('du' => $time_debut,'au' => $time_fin,'numero' => $_GET['numero'] ));
 $donnees = $req->fetch();
 if($donnees['SUM(vendus.quantite)'] == 0){
echo "<td>"."-"."</td></tr>";
}else{
echo "<td>".intval($donnees['SUM(vendus.quantite)'])."</td></tr>";}
echo '<tr> <td>-nombre de remboursemments : </td>';
// on determine le nombre de remboursements
            /*

            */
 $req = $bdd->prepare("SELECT COUNT(DISTINCT(ventes.id)) FROM ventes ,vendus WHERE vendus.id_vente = ventes.id AND DATE(vendus.timestamp) BETWEEN :du AND :au   AND vendus.remboursement > 0 AND ventes.id_point_vente  = :numero ");
 $req->execute(array('du' => $time_debut,'au' => $time_fin,'numero' => $_GET['numero'] ));
 $donnees = $req->fetch();
  if($donnees['COUNT(DISTINCT(ventes.id))'] == 0){
echo "<td>"."-"."</td></tr>";
}else{
echo "<td>".$donnees['COUNT(DISTINCT(ventes.id))']."</td></tr>";}
echo '<tr><td>-somme remboursée : </td> ';

  // On recupère tout le contenu de la table point de vente
  $req = $bdd->prepare("SELECT  SUM(vendus.remboursement) AS total   FROM vendus,ventes  WHERE  DATE(vendus.timestamp) BETWEEN :du AND :au  AND ventes.id_point_vente  = :numero 
    AND ventes.id = vendus.id_vente ");
  $req->execute(array('du' => $time_debut,'au' => $time_fin,'numero' => $_GET['numero'] ));
  $donnees = $req->fetch();
  $mtotcolo2 = $donnees['total'];
  if($donnees['total'] == 0){
echo "<td>"."-"."</td></tr>";
}else{
  echo "<td>".$donnees['total']." €" ."</td></tr>";}
  $req->closeCursor(); // Termine le traitement de la requête


?>
<tr><td>-masse pesée en caisse : </td><td>
  <?php
  $req = $bdd->prepare("SELECT SUM(pesees_vendus.masse) 
  FROM pesees_vendus , vendus ,ventes 
  WHERE pesees_vendus.id_vendu = vendus.id AND vendus.id_vente = ventes.id
  AND DATE(vendus.timestamp) BETWEEN :du AND :au AND ventes.id_point_vente  = :numero ");
 $req->execute(array('du' => $time_debut,'au' => $time_fin ,'numero' => $_GET['numero'] ));
 $donnees = $req->fetch();
  if(intval($donnees['SUM(pesees_vendus.masse)']) == 0){
echo "<td>"."- ";
}else{
echo $donnees['SUM(pesees_vendus.masse)'];}
$Mtpe = $donnees['SUM(pesees_vendus.masse)'];

$req->closeCursor(); // Termine le traitement de la requête

?> Kgs.</td></tr>
</tr>
</tbody></table>
<br>
<br>
<?php
// Tableau de recap du Chiffre d'Affaire par mode de paiement
// Utile pour vérifier le fond de caisse en fin de vente
// Equivalent de la touche 'Z' sur une caisse enregistreuse

$sql =  file_get_contents('../mysql/recap_CA_par_mode_paiement.sql');
$req = $bdd->prepare($sql);
$ok = $req->execute(array('du' => $time_debut,'au' => $time_fin ,'numero' => $_GET['numero'] ));


//Affichage du tableau
print "<h3>Récapitulatif par mode de paiement</h3>";
print "<table class='table table-hover'>";
print "<thead>";
print "<tr>";
print "<th>Moyen de Paiement</th>";
print "<th>Nombre de Ventes</th>";
print "<th>Chiffre Dégagé</th>";
print "<th>Somme remboursée</th>";
print "</tr>";
print "</tr>";
print "</thead>";
print "<tbody>";

while ($ligne = $req->fetch())
{
print "<tr>";
print "<td>".$ligne['moyen']."</td>";
print "<td>".$ligne['quantite_vendue']."</td>";
print "<td>".$ligne['total']." €</td>";
print "<td>".$ligne['remboursement']." €</td>";
print "</tr>";

}
print "</tbody>";
print "</table>";
?>
<br>
<h4>
 Chiffre dégagé par type d'objet:
</h4>


  
          <div  id="graphPV" style="height: 180px;"></div>
          <br>
          <script>       Morris.Donut({
    element: 'graphPV',
    data: [
<?php 
            // On recupère tout le contenu de la table affectations





            $reponse = $bdd->prepare('SELECT type_dechets.couleur,type_dechets.nom, sum(vendus.prix ) somme FROM type_dechets,vendus,ventes WHERE type_dechets.id = vendus.id_type_dechet AND vendus.id_vente = ventes.id AND DATE(vendus.timestamp) BETWEEN :du AND :au AND vendus.prix > 0 AND ventes.id_point_vente  = :numero
GROUP BY nom');
 $reponse->execute(array('du' => $time_debut,'au' => $time_fin ,'numero' => $_GET['numero']));
           // On affiche chaque entree une à une
           while ($donnees = $reponse->fetch())
           {

            echo "{value:".$donnees['somme'].", label:'".$donnees['nom']."'},";


             }
              $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
],
    backgroundColor: '#ccc',
    labelColor: '#060',
    colors: [
<?php 
 
            // On recupère tout le contenu de la table affectations
            $reponse = $bdd->prepare('SELECT type_dechets.couleur,type_dechets.nom, sum(vendus.prix ) somme FROM type_dechets,vendus,ventes WHERE type_dechets.id = vendus.id_type_dechet AND vendus.id_vente = ventes.id AND DATE(vendus.timestamp) BETWEEN :du AND :au AND vendus.prix > 0 AND ventes.id_point_vente  = :numero
GROUP BY nom');
            $reponse->execute(array('du' => $time_debut,'au' => $time_fin ,'numero' => $_GET['numero']));
 
           // On affiche chaque entree une à une
           while ($donnees = $reponse->fetch())
           {

            echo "'".$donnees['couleur']."'".",";


             }
              $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
    ],
    formatter: function (x) { return x + " €."}
    });
</script>
          
       <br>
</div>
<div class="col-md-5 col-md-offset-1">
  <h2>
    chiffre de caisse : <?php echo  $mtotcolo- $mtotcolo2." €";?>
  </h2>
  <br>
<h3>
Récapitulatif par type d'objet
</h3>
<table class="table table-hover">
      <thead>
        
        <tr>
          <th>type d'objet</th>
          <th>chiffre dégagé</th>
          <th>quantité vendue</th>
          <th>somme remboursée</th>
          <th>quantité rembour.</th>
          <th>masse pésee</th>
          
        </tr>
      </thead>
      <tbody>
<?php
            // type d'objet.. et chiffre
            $reponse2 = $bdd->prepare('SELECT type_dechets.id id,
   type_dechets.nom ,SUM(vendus.prix*vendus.quantite) total 

 FROM type_dechets , vendus, ventes

WHERE vendus.id_vente = ventes.id  AND ventes.id_point_vente  = :numero
AND type_dechets.id = vendus.id_type_dechet 
AND DATE(vendus.timestamp) BETWEEN :du AND :au 
GROUP BY type_dechets.nom
');
  $reponse2->execute(array('du' => $time_debut,'au' => $time_fin,'numero' => $_GET['numero'] ));
           // On affiche chaque entree une à une
           while ($donnees2 = $reponse2->fetch())
           {        
            ?>

            <tr>
              <th scope="row"> <a href=" jours.php?date1=<?php echo $_GET['date1']?>&date2=<?php echo $_GET['date2']?>&type=<?php echo  $donnees2['id'] ?>" > <?php echo $donnees2['nom'] ?> </a></th>
            <td  >
              <?php echo $donnees2['total']." €" ?>
            </td >
            <td >
              <?php
                // on determine le nombre d'objets vendus
            /*

            */
 $req = $bdd->prepare("SELECT SUM(vendus.quantite) FROM vendus,ventes WHERE prix > 0 
  AND vendus.id_type_dechet = :id AND DATE(vendus.timestamp) BETWEEN :du AND :au  AND ventes.id = vendus.id_vente AND ventes.id_point_vente  = :numero");
 $req->execute(array('du' => $time_debut,'au' => $time_fin ,'id' => $donnees2['id'],'numero' => $_GET['numero'] ));
 $donnees = $req->fetch();
echo $donnees['SUM(vendus.quantite)'];
$Nt = $donnees['SUM(vendus.quantite)'];
$req->closeCursor(); // Termine le traitement de la requête ?>
            </td>
            <td>
              <?php 
  // On recupère tout le contenu de la table point de vente
  $req3 = $bdd->prepare("SELECT  SUM(vendus.remboursement) AS total   FROM vendus,ventes 
   WHERE  DATE(vendus.timestamp) BETWEEN :du AND :au AND vendus.id_type_dechet = :id  AND ventes.id = vendus.id_vente AND ventes.id_point_vente  = :numero");
  $req3->execute(array('du' => $time_debut,'au' => $time_fin ,'id' => $donnees2['id'] ,'numero' => $_GET['numero'] ));
  $donnees3 = $req3->fetch();
if($donnees3['total'] == 0){
echo "-"."<br>";
}else{
  echo $donnees3['total']." €";}
  $req3->closeCursor(); // Termine le traitement de la requête ?>
            </td>  
            
            <td >
              <?php
                // on determine le nombre d'objets remboursés
            /*

            */
 $req = $bdd->prepare("SELECT SUM(vendus.quantite) FROM vendus WHERE remboursement > 0 
  AND vendus.id_type_dechet = :id AND DATE(vendus.timestamp) BETWEEN :du AND :au AND ventes.id_point_vente  = :numero AND ventes.id = vendus.id_vente  ");
 $req->execute(array('du' => $time_debut,'au' => $time_fin ,'id' => $donnees2['id'] ,'numero' => $_GET['numero'] ));
 $donnees = $req->fetch();
 if($donnees3['total'] == 0){
echo "-";
}else{
echo intval ($donnees['SUM(vendus.quantite)']);}
$req->closeCursor(); // Termine le traitement de la requête ?>
            </td>




<td> <?php
                // on determine la masse d'objets pesés
            /*

            */
 $req = $bdd->prepare("SELECT SUM(pesees_vendus.masse) 
  FROM pesees_vendus , vendus ,ventes
  WHERE pesees_vendus.id_vendu = vendus.id
  AND vendus.id_type_dechet = :id 
  AND DATE(vendus.timestamp) BETWEEN :du AND :au AND ventes.id_point_vente  = :numero AND ventes.id = vendus.id_vente  ");
 $req->execute(array('du' => $time_debut,'au' => $time_fin ,'id' => $donnees2['id'] ,'numero' => $_GET['numero'] ));
 $donnees = $req->fetch();
echo round($donnees['SUM(pesees_vendus.masse)'],2)." Kgs.";
$Mtpe = $donnees['SUM(pesees_vendus.masse)'];
$req->closeCursor(); // Termine le traitement de la requête ?></td>







        </tr>
        
 <?php
             }
              $reponse2->closeCursor(); // Termine le traitement de la requête
                ?>

<h3>
Récapitulatif des masses pesées à la caisse 
</h3>
<table class="table table-hover">

      <thead>
       
        <tr>
          <th>type d'objet</th>
          <th>chiffre dégagé</th>
          <th>masse pésee</th>
          <th>nombre de pesées</th>
          <th>nombre d'objets pesés</th>
          <th>nombre d'objets vendus</th>
          <th>masse sortie totale estimée</th>
          <th>prix à la tonne estimé</th>
          <th>certitude de l'estimation</th>
        </tr>
      </thead>
           <tbody>
<?php
            // On recupère le nom du type d'objet et son C.A. lié
            $reponse2 = $bdd->prepare('SELECT type_dechets.id id,
   type_dechets.nom ,SUM(vendus.prix*vendus.quantite) total 

 FROM type_dechets , vendus, ventes

WHERE vendus.id_vente = ventes.id 
AND type_dechets.id = vendus.id_type_dechet 
AND DATE(vendus.timestamp) BETWEEN :du AND :au AND ventes.id_point_vente  = :numero
GROUP BY type_dechets.nom
');
  $reponse2->execute(array('du' => $time_debut,'au' => $time_fin ,'numero' => $_GET['numero']));
           // On affiche chaque entree une à une
           while ($donnees2 = $reponse2->fetch())
           {        
            ?>

            <tr>
              <th scope="row"> <a href=" jours.php?date1=<?php echo $_GET['date1']?>&date2=<?php echo $_GET['date2']?>&type=<?php echo  $donnees2['id'] ?>" > <?php echo $donnees2['nom'] ?> </a></th>
            <td  >
              <?php echo $donnees2['total']." €";
              $cd = $donnees2['total'];
               ?>
            </td >
            <td> <?php
                // on determine la masse d'objets pesés
            /*

            */
 $req = $bdd->prepare("SELECT SUM(pesees_vendus.masse) 
  FROM pesees_vendus , vendus ,ventes
  WHERE pesees_vendus.id_vendu = vendus.id
  AND vendus.id_type_dechet = :id 
  AND DATE(vendus.timestamp) BETWEEN :du AND :au AND vendus.id_vente = ventes.id AND ventes.id_point_vente  = :numero " );
 $req->execute(array('du' => $time_debut,'au' => $time_fin ,'id' => $donnees2['id'] ,'numero' => $_GET['numero'] ));
 $donnees = $req->fetch();
echo round($donnees['SUM(pesees_vendus.masse)'],2)." Kgs.";
$Mtpe = $donnees['SUM(pesees_vendus.masse)'];
$req->closeCursor(); // Termine le traitement de la requête ?></td>
           
            

               <td> <?php
                // on determine le nombre de pesés
            /*

            */
 $req = $bdd->prepare("SELECT COUNT(DISTINCT(pesees_vendus.id)) 
  FROM pesees_vendus , vendus ,ventes
  WHERE pesees_vendus.id_vendu = vendus.id
  AND vendus.id_type_dechet = :id 
  AND DATE(vendus.timestamp) BETWEEN :du AND :au AND vendus.id_vente = ventes.id AND ventes.id_point_vente  = :numero ");
 $req->execute(array('du' => $time_debut,'au' => $time_fin ,'id' => $donnees2['id'],'numero' => $_GET['numero'] ));
 $donnees = $req->fetch();
echo round($donnees['COUNT(DISTINCT(pesees_vendus.id))'],2);
$Ntpe = $donnees['COUNT(DISTINCT(pesees_vendus.id))'];
$req->closeCursor(); // Termine le traitement de la requête ?></td>
          
           <td> <?php
            // on determine le nombre d'objets pesés

 $req = $bdd->prepare("SELECT SUM(pesees_vendus.quantite) 
  FROM pesees_vendus , vendus ,ventes
  WHERE pesees_vendus.id_vendu = vendus.id
  AND vendus.id_type_dechet = :id 
  AND DATE(vendus.timestamp) BETWEEN :du AND :au AND vendus.id_vente = ventes.id AND ventes.id_point_vente  = :numero ");
 $req->execute(array('du' => $time_debut,'au' => $time_fin ,'id' => $donnees2['id'] ,'numero' => $_GET['numero'] ));
 $donnees = $req->fetch();
$Notpe = $donnees['SUM(pesees_vendus.quantite)'];
echo $Notpe ;
$req->closeCursor(); // Termine le traitement de la requête

            ?></td>

           <td><?php
                // on determine le nombre d'objets vendus
            /*

            */
 $req = $bdd->prepare("SELECT SUM(vendus.quantite) FROM vendus,ventes WHERE prix > 0 
  AND vendus.id_type_dechet = :id AND DATE(vendus.timestamp) BETWEEN :du AND :au  AND ventes.id = vendus.id_vente  AND ventes.id_point_vente  = :numero ");
 $req->execute(array('du' => $time_debut,'au' => $time_fin ,'id' => $donnees2['id'],'numero' => $_GET['numero']));
 $donnees = $req->fetch();
$ov = $donnees['SUM(vendus.quantite)'];
echo $ov;
$req->closeCursor(); // Termine le traitement de la requête ?></td>
            <td>

              

<?php
// on determine la masse moyenne d'un objet dans toute la base (pour le type d'objet en cours) = $Mm

               
 $req = $bdd->prepare("SELECT AVG(pesees_vendus.masse) 
  FROM pesees_vendus , vendus 
  WHERE pesees_vendus.id_vendu = vendus.id
  AND pesees_vendus.masse > 0
  AND vendus.id_type_dechet = :id ");
 $req->execute(array('id' => $donnees2['id'] ));
 $donnees = $req->fetch();
$Mm = $donnees['AVG(pesees_vendus.masse)'];
//echo $Mm;
$req->closeCursor(); // Termine le traitement de la requête 

/*
estimation de la masse totale vendue sur la periode pour tout les points de vente

masse moyenne d'un objet dans toute la base (pour le type d'objet en cours) = $Mm
nombre d'objets vendus (tout types confondus) = $Nt
nombre d'objets pesées sur la periode = $Np
masse totale d'objets peses sur cette periode = $Mtpe
nombre de pesées sur la periode pour le type d'objet = $Ntpe
nombre d'objets pesés sur la periode pour le type d'objet = $Notpe
nombre d'objets vendus sur la periode pour le type d'objet = $ov



if($ov == $Notpe)
{
$mtee = $Mtpe;
$certitude = 100;
}
else
{
$mtee = (($Mm*$ov)-($Mm*$Np))+$Mtpe;
$certitude = 0;
}
*/



//$mtee = round((($Mm*$Nt)-($Mm*$Mp))+$Mtpe, 2);
if($ov == $Notpe)
{
$mtee = $Mtpe;
$certitude = 100;
}
else
{
$mtee = (($Mm*$ov)-($Mm*$Np))+$Mtpe;
$certitude = round(($Notpe/$ov)*100,2);
}
echo round($mtee,2)." Kgs.";
?>


            </td>   
            <td>
<?php
echo round(($cd/$mtee)*1000,2)." €";

 ?>

            </td>    
            <td>
              <?php echo $certitude."%"; ?>
            </td>
        </tr>
        
 <?php
             }
              $reponse2->closeCursor(); // Termine le traitement de la requête
                ?>




        
          
         
        
        </tbody>
        <tfoot>
    <tr>
      <td></td>
        <td></td>
       <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      
    </tr>
  </tfoot>
    </table>
<br>


       
          
      
        
        </tbody>
    </table>
    <h4>
 Masses pesées en caisse par type d'objet:
</h4>
  
          <div  id="graphMV" style="height: 180px;"></div>
          <br>
          <script>       Morris.Donut({
    element: 'graphMV',
    data: [
<?php 
            // On recupère tout le contenu de la table affectations





            $reponse = $bdd->prepare('SELECT type_dechets.couleur,type_dechets.nom, sum(pesees_vendus.masse ) somme FROM type_dechets,vendus,pesees_vendus ,ventes WHERE type_dechets.id = vendus.id_type_dechet AND vendus.id = pesees_vendus.id_vendu  AND DATE(vendus.timestamp) BETWEEN :du AND :au AND vendus.prix > 0 AND vendus.id_vente = ventes.id AND ventes.id_point_vente  = :numero
GROUP BY nom');
 $reponse->execute(array('du' => $time_debut,'au' => $time_fin,'numero' => $_GET['numero'] ));
           // On affiche chaque entree une à une
           while ($donnees = $reponse->fetch())
           {

            echo "{value:".$donnees['somme'].", label:'".$donnees['nom']."'},";


             }
              $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
],
    backgroundColor: '#ccc',
    labelColor: '#060',
    colors: [
<?php 
 
            // On recupère tout le contenu de la table affectations
            $reponse = $bdd->prepare('SELECT type_dechets.couleur,type_dechets.nom, sum(pesees_vendus.masse) somme FROM type_dechets,vendus,pesees_vendus ,ventes WHERE type_dechets.id = vendus.id_type_dechet AND vendus.id = pesees_vendus.id_vendu AND DATE(vendus.timestamp) BETWEEN :du AND :au AND vendus.prix > 0 AND vendus.id_vente = ventes.id AND ventes.id_point_vente  = :numero
GROUP BY nom');
            $reponse->execute(array('du' => $time_debut,'au' => $time_fin,'numero' => $_GET['numero'] ));
 
           // On affiche chaque entree une à une
           while ($donnees = $reponse->fetch())
           {

            echo "'".$donnees['couleur']."'".",";


             }
              $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
    ],
    formatter: function (x) { return x + " Kgs."}
    });
</script>
          
       <br>

</div>
</div>
<?php
}
}
?>
</div>
  </div>
   </div>
    </div>
    <br>
     </div>
      </div>
<?php include "pied_bilan.php";
}
    else
    {header('Location: ../moteur/destroy.php') ;}
?>
