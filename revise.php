<?php include"header.php";

$table=[];
if(isset($_SESSION['table'])){ // if session is define put session table to table variable
  $table = $_SESSION['table'];
} else {
  $table[0] = 3; // else put table of 3 by default
}

// REVISE
$tablesRandRevision = [];
$intsRandRevision = [];
$error = [];
$score = 5;
$_SESSION['score'] = $score;

?>

<!-- form for tables choices -->
<div class="row mt-5">
  <div class="col-lg-3 d-flex justify-content-center">

    <form method="post" action="traitement.php">
      <h3 class="mb-5">Choisissez votre table :</h3>

        <?php
        for ($i = 1; $i <= 10; $i++)
        {?>

          <input type="checkbox" id="<?= $i?>" name="table[]" value="<?= $i?>">
          <label for="<?= $i?>">Table de <?= $i?></label><br>

        <?php
        }
        ?>

      <input type="submit" name='learn' class="btn btn-info mr-4 mt-5" value="Apprendre">
      <input type='submit' name='revise' class='btn btn-info mt-5' value='Réviser'>

    </form>
  </div>

<!-- REVISE : QUESTIONS -->
<div class="col-lg-5">
  <form id="contactForm" method="POST" action="traitement.php">
    <h3 class="mb-3 font-weight-bold text-center mb-5">Réviser la table de <?= implode(' , ', $table) ?></h3>
    <h4 class="font-weight-bold mt-5 default-score" >Score : <?= $score ?></h4>
    <h4 class="font-weight-bold mt-5 score-after-verif" style="display:none;"></h4>
    <h5 class="message-score mb-5"></h5>
    <table class="table table-bordered">
      <tbody>

              <?php for($j = 1; $j <= 5; $j++){
                $rand_keys = array_rand($table);
                $random_int = random_int(0,10);
                $goodresponse[] = $table[$rand_keys] * $random_int;

                  echo"<tr>
                        <th scope='row'>
                          <p>". $table[$rand_keys] . " x " . $random_int .  " = </p>
                        </th>
                        <td>
                          <p class='response alert alert-warning'>La réponse correct était " . $goodresponse[$j - 1] . "</p>
                          <input type='number' name='responses[]' value='' min='0' required>
                        </td>
                      </tr>";

                array_push($tablesRandRevision, $table[$rand_keys]);
                array_push($intsRandRevision, $random_int);

              }
              $_SESSION['tablesRandRevision'] = $tablesRandRevision;
              $_SESSION['intsRandRevision'] = $intsRandRevision;


              ?>

      </tbody>
    </table>
    <div class="d-flex justify-content-center">
      <input type="submit" name="" class="btn btn-info mt-3" value="Envoyer mes réponses">
    </div>
  </form>
</div>
<?php include"footer.php" ?>
