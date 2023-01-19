<?php
session_start();
// pour effacer du serveur et donc des échanges, 
// ce qui a été sauvegardé dans $_SESSION
session_destroy();
header("Location: /S4_WEB/TraversyTuto/13_sessions.php");

?>
