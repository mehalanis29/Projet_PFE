<?php
require '../php/Admin/standard.php';
 require "../php/database.inc";
 require "../php/Voyage.inc";
 require '../php/Admin/Control.php';
 include "../php/Admin/VoyageFunction.php";
 if(isset($_POST["ville_id"])){
   $voyage=new voyage($_POST["voyage_id"],$_POST["ville_id"]
                     ,$_POST["nbr_jour"],$_POST["hotel_id"],$_POST["description"]
                     ,$_POST["prix"],$_POST["capacite"],$_POST["img"]);

   if(isset($_POST["controlAjoutebtn"]))
   {
    $voyage->Insertvoyage();
    header("location: Voyage.php");

   }else{
     $voyage->Updatevoyage();
     header("location: Voyage.php");
   }

 }
 if(isset($_GET["voyage_id"]))
 {
 $etat="Modifie";
 $voyage = Loadvoyage($_GET["voyage_id"]);
 }else
 {
   $etat="Ajoute";
   $voyage = Loadvoyage(-1);
 }
 ?>


<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php CSS();?>
    <script src="../js/Admin/Controle.js"></script>
    <script src="../js/Admin/Voyage.js"></script>
  </head>
  <body  onload="">
    <?php NavBar();?>
    <div class="page">
      <?php SideBar(); ?>
      <div class="detail">
        <div class="titre_bar">
          <label for="" class="titre_bar_label">
            <a href="Voyage.php"><img src="../img/Admin/icon/back_bleu_40px.png" alt=""></a>
            <?php echo $etat; ?> Voyage
          </label>
        </div>
        <div class="table">
          <form class="" action="VoyageControl.php" method="post" onsubmit="return VerifieNom()">
            <div class="left_tab">
            <fieldset class="fields">
              <legend class="legends">Information Du Voyage</legend>
              <div class="control_table">
                <div class="control_table_item">
                  <label for="" class="controllabel" >Nom </label>
                  <input type="text" name="Nom" class="controlinput" required value="<?php if(isset($voyage))echo $voyage->nom; ?>">
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Pays</label>
                  <select class="controlinput" name="pays" required onchange="LoadVille(this.value)">
                    <?php
                      if(isset($_POST["pays"])){ $pays=$_POST["pays"];  }
                      else{ $pays=VilletoPays($voyage->ville_id); }
                      LoadPays($pays);

                    ?>
                  </select>
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel" >Ville</label>
                  <select class="controlinput" name="ville_id" id="ville" required onchange="LoadHotel(this.value)">
                    <?php if(isset($voyage))LoadVille($voyage->ville_id,$pays) ?>
                  </select>
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel" >Hotel</label>
                  <select class="controlinput" name="hotel_id" id="hotel" required >
                    <?php if(isset($voyage))LoadHotel($voyage->hotel_id,$voyage->ville_id) ?>
                  </select>
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel" >Description</label>
                  <textarea name="description" class="controlinput" rows="3" cols="80" required><?php
                   if(isset($voyage))echo $voyage->description;
                   ?></textarea>
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Nombre de jours</label>
                  <input type="number" name="nbr_jour" class="controlinput" required
                         value="<?php if(isset($voyage)) echo $voyage->nbr_jour;?>">
                </div>
                <div class="control_table_item">
                  <label for="" class="controllabel">Image</label>
                  <input type="file" name="img" class="controlinput">
                </div>
              </div>
            </fieldset>

           </div>
           <div class="left_tab">
           <fieldset class="fields">
             <legend class="legends">Les Date Du Voyage</legend>
             <div class="control_table">
               <div class="control_table_4item">
                 <label for="" class="controllabel" >Date Depart </label>
                 <label for="" class="controllabel" >Date Arrive </label>
                 <label for="" class="controllabel" >Capacite </label>
                 <label for="" class="controllabel" >Prix </label>
               </div>
               <div class="control_table_4item">
                 <input type="date" name="date_naissance" class="controlinput">
                 <input type="date" name="date_naissance" class="controlinput">
                 <input type="number" name="date_naissance" class="controlinput">
                 <input type="number" name="date_naissance" class="controlinput" onkeyup="Calcul(this.value)">
                 <label for="" class="controllabel"  id="prix">000 DA  </label>
               </div>
             </div>
           </fieldset>
          </div>
           <hr>
           <div class="control_div_btn">
             <input type="hidden" name="voyage_id" value="<?php if(isset($voyage)) {echo $voyage->voyage_id;}else{ echo "-1";} ?>">
             <button type="submit" class="control_btn" name="control<?php echo $etat; ?>btn"><?php echo $etat; ?></button>
           </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
