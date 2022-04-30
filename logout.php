<?php

session_start();
// HIER MAAK DE JE SESSION VERWIJDERD EN WORDT JE DOORGESTUURD NAAR DE INDEX.PHP
session_destroy();

header("Location: index.php");
exit;

?>