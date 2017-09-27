<?php
/*
  Oressource
  Copyright (C) 2014-2017  Martin Vert and Oressource devellopers

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU Affero General Public License as
  published by the Free Software Foundation, either version 3 of the
  License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU Affero General Public License for more details.

  You should have received a copy of the GNU Affero General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

session_start();

require_once '../core/requetes.php';
require_once '../core/session.php';
require_once '../core/composants.php';

$numero = filter_input(INPUT_GET, 'numero', FILTER_VALIDATE_INT);

if (is_valid_session() && is_allowed_sortie_id($numero)) {
  if (!affichage_sortie_recyclage()) {
    header("Location:sorties.php?numero=" . $numero);
    die();
  }

  require_once 'tete.php';
  require_once '../moteur/dbconfig.php';

  $point_sortie = points_sorties_id($bdd, $numero);
  $pesee_max = (float) $point_sortie['pesee_max'];
  $filieres_sorties = filter_visibles(filieres_sorties($bdd));

  $evacs = filter_visibles(types_dechets_evac($bdd));

  $date = new Datetime('now');
  ?>

  <div class="container">

    <nav class="navbar">
      <div class="header-header">
        <h1><?= $point_sortie['nom']; ?></h1>
      </div>
      <ul class="nav nav-tabs">
        <?php if (affichage_sortie_poubelle()) { ?><li><a href="sortiesp.php?numero=<?= $numero; ?>">Poubelles</a></li><?php } ?>
        <?php if (affichage_sortie_partenaires()) { ?><li><a href="sortiesc.php?numero=<?= $numero; ?>">Sorties partenaires</a></li><?php } ?>
        <li class="active"><a href="#">Recyclage</a></li>
        <?php if (affichage_sortie_don()) { ?><li><a href="sorties.php?numero=<?= $numero; ?>">Don</a></li><?php } ?>
        <?php if (affichage_sortie_dechetterie()) { ?><li><a href="sortiesd.php?numero=<?= $numero; ?>">Déchetterie</a></li><?php } ?>
      </ul>
    </nav>
    <div class="col-md-4">
      <div id="ticket" class="panel panel-info" >
        <div class="panel-heading">
          <h3 class="panel-title">
            <label id="massetot">Masse totale: 0 Kg.</label>
          </h3>
        </div>
        <div class="panel-body">
          <form id="formulaire"> <!-- ONSUBMIT="EnableControl(true)" -->
            <?php if (is_allowed_edit_date()) { ?>
              <label for="antidate">Date de la sortie: </label>
              <input type="date" id="antidate" name="antidate" style="width:130px; height:20px;" value="<?= $date->format('Y-m-d'); ?>">
            <?php } ?>
            <ul class="list-group" id="transaction">  <!--start Ticket Caisse -->
              <!-- Remplis via JavaScript voir script de la page -->
            </ul> <!--end TicketCaisse -->
          </form>
        </div>
        <div class="panel-footer">
          <input type="text" form="formulaire" class="form-control" name="commentaire" id="commentaire" placeholder="Commentaire">
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">
            <label for="sel_filiere">Nom de l'entreprise de recyclage:</label>
          </h3>
        </div>
        <div class="panel-body">
          <select id="id_type_action" form="formulaire" name="id_type_action" class="form-control" required>
            <option value="" hidden selected disabled>Selectionez un recycleur</option>
            <?php foreach ($filieres_sorties as $filiere_sortie) { ?>
              <option value="<?= $filiere_sortie['id']; ?>"><?= $filiere_sortie['nom']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>

      <!-- Pavee de saisie numerique vcir numpad.js -->
      <div id="numpad" class="col-md-8 col-md-offset-2" style="width: 220px;"></div>
    </div>

    <div class="col-md-4" >
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">
            <label>Materiaux et déchets:</label>
          </h3>
        </div>
        <div class="panel-body">
          <div id="list_evac" class="btn-group">
            <!-- Rempli via JS -->
          </div>
        </div>
      </div>

      <div class="btn-group" role="group">
        <button id="encaissement" class="btn btn-success btn-lg">C'est pesé!</button>
        <button id="impression" class="btn btn-primary btn-lg" value="Print"><span class="glyphicon glyphicon-print"></span></button>
        <button id="reset" class="btn btn-warning btn-lg"><span class="glyphicon glyphicon-refresh"></button>
      </div>

    </div><!-- .col-md-4 -->
  </div>

  <script type="text/javascript">
    // Variables d'environnement de Oressource.
    'use scrict';
    window.OressourceEnv = {
      structure: <?= json_encode($_SESSION['structure']); ?>,
      adresse: <?= json_encode($_SESSION['adresse']); ?>,
      id_user: <?= json_encode($_SESSION['id'], JSON_NUMERIC_CHECK); ?>,
      id_point: <?= json_encode($numero, JSON_NUMERIC_CHECK); ?>,
      id_type_action: <?= json_encode($filieres_sorties, JSON_NUMERIC_CHECK); ?>,
      types_evac: <?= json_encode(filter_visibles(types_dechets_evac($bdd)), JSON_NUMERIC_CHECK); ?>,
      masse_max: <?= json_encode($point_sortie['pesee_max'], JSON_NUMERIC_CHECK); ?>,
      conteneurs: <?= json_encode(filter_visibles(types_contenants($bdd)), JSON_NUMERIC_CHECK); ?>
    };
  </script>
  <script type="text/javascript">
    'use strict';
    function make_choix_recycleur(ui, filieres) {
      return (event) => {
        if (event.target.value) {
          event.preventDefault();
          const select = event.target;

          select[0].removeAttribute('selected');
          select[select.selectedIndex].setAttribute('selected', true);

          // On desactive tout sauf ce qui viens d'etre choisi.
          select.querySelectorAll(':not([selected])').forEach((element) => {
            element.disabled = true;
          });

          const id_recycleur = parseInt(select.value, 10);
          // On recupere le bon recycleur.
          const [ recycleur ] = filieres.filter(({id}) => id === id_recycleur);

          // On selectione les boutons qui correspondent au possiblites du recyleur.
          const accepte = recycleur.accepte_type_dechet;
          const btnList = Array.from(ui.children).filter((e) => {
            return accepte.reduce((acc, id) => acc || parseInt(e.id, 10) === id, false);
          });
          btnList.forEach((button) => {
            button.setAttribute('style', 'display: block; visibility: visible');
          });
        }
      };
    }

    document.addEventListener('DOMContentLoaded', () => {
      const numpad = new NumPad(document.getElementById('numpad'),
              window.OressourceEnv.conteneurs);
      const typesItems = window.OressourceEnv.types_evac;
      const ticketsItem = new Ticket();
      const pushItems = connection_UI_ticket(numpad, ticketsItem, typesItems);

      const div_list_item = document.getElementById('list_evac');
      typesItems.forEach((item) => {
        const button = html_saisie_item(item, pushItems);
        button.setAttribute('style', 'display: none; visibility: hidden');
        div_list_item.appendChild(button);
      });

      const metadata = { classe: 'sortiesr' };
      const encaisse = make_encaissement('../api/sorties.php', {
        evacs: ticketsItem
      }, metadata);

      document.getElementById('encaissement').addEventListener('click', encaisse, false);
      document.getElementById('impression').addEventListener('click', impression_ticket, false);
      document.getElementById('reset').addEventListener('click', () => {
        tickets_clear(metadata);
      }, false);

      const recycleur_choix = make_choix_recycleur(div_list_item, window.OressourceEnv.id_type_action);

      document.getElementById('id_type_action').addEventListener('change', recycleur_choix, false);

      window.tickets = [ ticketsItem ];
    }, false);
  </script>
  <?php
  require_once 'pied.php';
} else {
  header('Location:../moteur/destroy.php');
  die();
}
