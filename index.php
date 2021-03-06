<!DOCTYPE html>
<?php
session_start();
include 'php/Client/standard.php';
require 'php/database.inc';
$database=new database();
 ?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php include 'php/Client/css.php'; ?>
    <script type="text/javascript" src="js/Client/index.js">

    </script>

  </head>
  <body>
    <div class="nav_bar">
        <?php NabBar(); ?>
        <div class="nav_bar_cover_index">
          <div class="nav_bar_cover_index_img">
            <img src="img/Client/Cover/index-cover.jpeg" alt="">
          </div>
          <div class="nav_bar_from">
            <div class="nav_bar_from_titre">
              <button type="button" class="nav_bar_from_titre_choix nav_bar_from_titre_choix_active"
               id="voyage_organis_btn" onclick="change('voyage_organis')" name="button">
                Voyage Organisé
              </button>
              <button type="button" class="nav_bar_from_titre_choix" id="voyage_btn"
                  onclick="change('voyage')" name="button">Voyage On Demande</button>
            </div>
            <div class="nav_bar_div_form nav_bar_div_form_activ" id="voyage_organis_form">
              <form class="formtest" action="VoyageOrganise.php" method="GET">
                <div class="nab_bar_index_div_input">
                  <select class="nab_bar_index_input" placeholder="pays" name="pays" onchange="LoadVille(this.value)">
                    <option value="">ALL Pays</option>
                    <?php 
                    $pays =$database->query("select pays_id,nom from pays where pays_id in (select pays_id from ville where ville_id in (select ville_id from voyage where voyage_id in (select voyage_id from voyage_date where date_depart > '".date("Y-m-d")."')))") ;
                    while ($row=mysqli_fetch_assoc($pays)) {
                      echo "<option value=\"".$row["pays_id"]."\">".$row["nom"]."</option>";
                    }
                   ?>
                  </select>
                </div>
                <div class="nab_bar_index_div_input">
                  <select class="nab_bar_index_input" placeholder="ville" id="ville" name="ville">
                    <option value="">ALL Ville</option>
                  </select>
                </div>
                <div class="nab_bar_index_div_input">
                  <label class="nab_bar_index_label"> </label>
                  <input type="date" class="nab_bar_index_input" placeholder="à partir" name="date" value="<?php echo date("Y-m-d"); ?>">
                </div>
                <div class="nab_bar_index_div_input">
                  <button type="submit" class="recharche_btn" name="Recharche">Recherche</button>
                </div>
              </form>
            </div>
            <div class="nav_bar_div_form" id="voyage_form">
              Voyage On Demande
            </div>
          </div>
        </div>
    </div>
    <div class="index_offre_page">
      <div class="index_offre_top_voyage_titre">
        <label for="">
          Nos Top Déstination Voyages organisés
        </label>
      </div>
      <div class="index_offre_top_voyage_list_offre">
        <?php 
          $result=$database->query("select voyage.voyage_id,voyage.nom as voyage_nom,nbr_jour,min(prix_A_T) as prix from voyage join voyage_date on voyage.voyage_id= voyage_date.voyage_id group by voyage.voyage_id order by voyage.voyage_id DESC limit 3");
          while ($row=mysqli_fetch_assoc($result)):
        ?>
        <a href="Voyage.php?voyage_id=1">
          <div class="index_offre_top_voyage_offre">
            <img src="img/Client/photo_index/<?php echo $row["voyage_id"]; ?>.jpg" alt="">
            <div class="index_offre_top_voyage_desc">
              <div class="index_offre_top_voyage_nom_day">
                <label class="index_offre_top_voyage_nom"><?php echo $row["voyage_nom"]; ?></label>
                <label class="index_offre_top_voyage_day">
                  <?php echo $row["nbr_jour"]." Jours & ".intval($row["nbr_jour"]-1)." Nuit"; ?>
                </label>
              </div>
              <div class="index_offre_top_voyage_prix">
                <label for=""><?php echo number_format($row["prix"]*10000); ?> DZ</label>
              </div>
            </div>
          </div>
        </a>
        <?php endwhile;?>
      </div>
      <div class="index_offre_top_voyage_btn_more">
        <a href="VoyageOrganise.php">
          <div class="index_offre_top_voyage_btn_more_titre">
            <label for="">Voir toutes nos offres</label>
            <img src="img/Client/icon/suivant18px.png" alt="">
          </div>
        </a>
      </div>
    </div>
    <?php  Footer(); ?>
  </body>
</html>
