<?php include"header.php";

$table=[];
if (isset($_GET['table'])) {
  $table = $_GET['table'];
}else {
  $table[0] = 3;
}
$table_lenght = count($table);
$_SESSION['table'] = $table;
 ?>

<div class="row mt-5">
  <div class="col-lg-3 d-flex justify-content-center">

    <form method="get"action="apprendre.php">
      <h3 class="mb-5">Choisissez votre table :</h3>

<?php
for ($i = 1; $i <= 10; $i++)
{?>
  <input type="checkbox" id="<?= $i?>" name="table[]" value="<?= $i?>">
  <label for="<?= $i?>">Table de <?= $i?></label><br>

<?php
}
?>

      <input type="submit" name="" class="btn btn-info mr-4 mt-5" value="Apprendre">
      <input type='submit' name='' class='btn btn-info mt-5' value='Réviser' onclick="javascript:window.open('revision.php');">

    </form>
  </div>
  <div class="col-lg-9">
    <div class="row">
      <?php
      foreach ($table as $tablevaleur){?>
      <div class="col-lg-2">
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
        </div>
      <?php
      }?>
    </div>
</div>
<?php include"footer.php" ?>
