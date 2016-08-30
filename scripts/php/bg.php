<?php
  // Must happen before any html is displayed
  session_start();

  if(!isset($_POST["login"]) && !isset($_POST["register"])) {
    $bgArray = array("bg01.jpg");
    $index = rand(0, count($bgArray)-1);
    $_SESSION["bg"] = $bgArray[$index];
  }

  function getBackground() {
    return $_SESSION["bg"];
  }
?>
