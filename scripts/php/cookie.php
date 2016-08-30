<?php
  setcookie("username", $_SESSION["username"], time()*60*60*24);

  // Remove cookie (hour in the past)
  setcookie("username", "", time()-3600);

  echo $_COOKIE["username"];
?>
