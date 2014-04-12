<?php
session_start();
$id = $_GET["id"];
include("../conexao.php");
if($_SESSION["admin"]=="on"){
$sql = "delete from news_ind where id = $id";
mysql_query($sql);
echo "<script>alert(\"Notícia deletada com sucesso\"); window.close()</script>";
}
else
{
echo "<script>location.href='../'</script>";
}
?>
