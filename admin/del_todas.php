<?php
session_start();
include("../conexao.php");
if($_SESSION["admin"]=="on"){
$sql = "delete from news_ind";
mysql_query($sql);
echo "<script>alert(\"Todas as notícias foram apagadas.\"); window.close()</script>";
}
else
{
echo "<script>location.href='../'</script>";
}
?>
