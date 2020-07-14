<?php include"header.php" ?>

<?php
$table = $_SESSION['table'];
$tablesRandRevision = [];
$intsRandRevision = [];
$score = 5;

if(isset($_POST['responses'])){
  $responses = $_POST['responses'];
  $tablesResponseRevision = $_SESSION['tablesRandomRevision'];
  $intsResponseRevision = $_SESSION['intsRandRevision'];
  $responses_lenght = count($responses);
  for($i=0; $i < $responses_lenght; $i++){
    if(($tablesResponseRevision[$i] * $intsResponseRevision[$i]) != $responses[$i]){
      $score--;
    }
  }

}
?>


<div class="container">
  <div class="row mt-5 d-flex justify-content-center">
    <div class="col-lg-5">
      <form method="POST" action="revision.php">
        <h3 class="mb-3 font-weight-bold text-center mb-5">Réviser la table de <?= implode(' , ', $table) ?> :</h3>
        <table class="table table-bordered">
          <tbody>

                  <?php for($j = 1; $j <= 5; $j++){
                    $rand_keys = array_rand($table);
                    $random_int = random_int(0,10);

                      echo"<tr>
                            <th scope='row'>
                              <p>". $table[$rand_keys] . " x " . $random_int .  " = </p>
                            </th>
                            <td>
                              <input type='number' name='responses[]' value='' min='0' required>
                            </td>
                          </tr>";

                    array_push($tablesRandRevision, $table[$rand_keys]);
                    array_push($intsRandRevision, $random_int);

                  }
                  $_SESSION['tablesRandomRevision'] = $tablesRandRevision;
                  $_SESSION['intsRandRevision'] = $intsRandRevision;

                  ?>


          </tbody>
        </table>
        <div class="d-flex justify-content-center">
          <input type="submit" name="" class="btn btn-info mt-3" value="Envoyer mes réponses">
        </div>
      </form>

      <h4 class="font-weight-bold mt-5" >Score : <?= $score ?></h4>
      <h5><?php
          if(isset($_POST['responses'])){
            if ($score <= 2){
              echo "Désolé le test n'a pas été réussit !";
            } else if ($score >= 2){
              echo "Bravo le test à été réussit !";
            }}?>
      </h5>
    </div>
  </div>
</div>

<?php include"footer.php" ?>
