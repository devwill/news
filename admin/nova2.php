<?php
session_start();
include("../conexao.php");
if($_SESSION["admin"]=="on"){
$titulo = $_POST["titulo"];
$noticia= $_POST["noticia"];
$data   = date("d/m/y");
$hora   = date("H:i:s");
$sql = "INSERT INTO news_ind (id, titulo, noticia, data, hora) VALUES
('','$titulo','$noticia','$data','$hora')
";
mysql_query($sql);
echo "<script>alert(\"Notícia inserida com sucesso!\"); window.close()</script>";
}
else
{
echo "<script>location.href='../'</script>";
}
?>