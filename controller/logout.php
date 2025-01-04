<?php 
session_start();

setcookie("status","",time()-86400,"/");
session_destroy();
?>