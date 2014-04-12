<?php
session_start();
if($_SESSION["admin"]=="on"){
header("Location: ../");
}
else{
header("Location: login.htm");
}
?>
