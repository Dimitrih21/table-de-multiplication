<?php include"header.php" ?>

<?php

if(isset($_GET['table-select'])){
  $table = $_GET['table-select'];

}
var_dump ($_GET['table-select']);
 ?>

<form method="get"action="apprendre.php">

  <label for="table-select">Choisissez une table :</label>
   <select name="table" id="table-select">
    <option value="1">Table 1</option>
    <option value="2">Table 2</option>
    <option value="3" selected="selected">Table 3</option>
    <option value="4">Table 4</option>
    <option value="5">Table 5</option>
    <option value="6">Table 6</option>
    <option value="7">Table 7</option>
    <option value="8">Table 8</option>
    <option value="9">Table 9</option>
    <option value="10">Table 10</option>
  </select>
  <input type="submit" name="" class="btn btn-info" value="envoyer">

</form>

<?php include"footer.php" ?>
