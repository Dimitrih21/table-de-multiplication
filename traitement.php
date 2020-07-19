<?php
session_start();
header("Content-type:application/json;charset=utf-8");

// if submit button name is learn, put tables selected to a new session and redirect to learn.php
if(isset($_POST['learn'])){
  $table=[];
  $table = $_POST['table'];
  $_SESSION['table'] = $table;
  header('Location: learn.php');
} else if(isset($_POST['revise'])){ // But if submit button name is revise, put tables selected to a new session and redirect to revise.php
  $table=[];
  $table = $_POST['table'];
  $_SESSION['table'] = $table;
  header('Location: revise.php');
}
$result=[];
$score = $_SESSION['score'];

if(isset($_POST['responses'])){
  $responses = $_POST['responses'];
  $tablesResponseRevision = $_SESSION['tablesRandRevision'];
  $intsResponseRevision = $_SESSION['intsRandRevision'];
  $responses_lenght = count($responses);
  for($i=0; $i < $responses_lenght; $i++){
    if(($tablesResponseRevision[$i] * $intsResponseRevision[$i]) == $responses[$i]){
      $result[] = 'true';
    }
    else{
      $score--;
      $result[] = 'false';
    }
  }

  if ($score <= 2){
    $data['message'] = "Désolé le test n'a pas été réussit !";
  } else if ($score >= 2){
    $data['message'] = "Bravo le test à été réussit !";
  }


  $data['results'] = $result;
  $data['response'] = "success";
  $data['score'] = $score;

}
echo json_encode($data);
