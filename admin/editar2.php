<?php
session_start();
include("../conexao.php");
if($_SESSION["admin"]=="on"){
$id     = $_POST["id"];
$titulo = $_POST["titulo"];
$noticia= $_POST["noticia"];
$data   = date("d/m/y");
$hora   = strftime("%H:%I:%S");
$sql = "UPDATE news_ind SET titulo='$titulo', noticia = '$noticia' WHERE id=$id";
mysql_query($sql);
echo "<script>alert(\"Notícia editada com sucesso!\"); window.close()</script>";
}
else
{
echo "<script>location.href='../'</script>";
}
?>
