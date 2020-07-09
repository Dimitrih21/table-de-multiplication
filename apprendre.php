<?php include"header.php";

$table=[];
if (isset($_GET['table'])) {
  $table = $_GET['table'];
  $table_lenght = count($table);
var_dump($table);
}
 $_SESSION['table'] = $table;
 ?>




<div class="row mt-5">
  <div class="col-lg-3 d-flex justify-content-center">

    <form method="get"action="apprendre.php">
      <h3>Choisissez votre table :</h3>

<?php
for ($i = 1; $i <= 10; $i++)
{?>
  <input type="checkbox" id="table" name="table[]" value="<?= $i?>" >
    <label for="table">Table de <?= $i?></label><br>

<?php
}
?>

      <input type="submit" name="" class="btn btn-info" value="envoyer">

    </form>
  </div>
  <div class="col-lg-9">
    <div class="row">
      <?php
      foreach ($table as $tablevaleur)
      for ($i = 1; $i <= $table_lenght; $i++)
      {?>
      <div class="col-lg-3">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Table de <?= $tablevaleur ?></th>
            </tr>
          </thead>
          <tbody>
            <?php for($j = 1; $j <= 10; $j++){
              echo "<tr><th scope='row'>" . $j . " x " . $tablevaleur ."</th><td>".$j * $tablevaleur . "</td></tr>";
            }?>
          </tbody>
        </table>
        <div class="d-flex flex-column align-items-center justify-content-center">
          <p>Réviser la table <?= $tablevaleur ?><p>
          <input type='submit' name='' class='btn btn-info mb-5' value='reviser'>
        </div>
        </div>
      <?php
      }?>
    </div>
</div>
<?php include"footer.php" ?>
