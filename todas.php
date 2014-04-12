<?php
session_start();
include("conexao.php");
?>
<html>
<head>
<title>Notícias</title>
</head>

<body>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
    <td width="100%"><b><font face="Arial" size="5">Notícias</font></b></td>
  </tr><?php
if($_SESSION["admin"]=="on"){ ?>
  <tr>
    <td width="100%" bgcolor="#FFCC99">
      <p align="left"><font face="Arial" size="2"><b>Administrador:</b> <a href="admin/nova.php" target="_blank"><font color="#000000">Nova</font></a>
      - <a href="admin/del_todas.php" target="_blank"><font color="#000000">Apagar
      todas</font></a><font color="#000000"> - </font><a href="admin/alt_senha.php" target="_blank"><font color="#000000">Alterar
      senha</font></a><font color="#000000"> - </font><a href="admin/logout.php"><font color="#000000">Log
      Out</font></a></font></td>
  </tr>

<?php } ?>
  <tr>
    <td width="100%">
      <hr color="#000000">
    </td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" width="100%" height="61">
<?php
$pagina = $_GET["pagina"];
$busca = "SELECT * FROM news_ind order by -id";
$total_reg = $config_paginacao; // n?ero de registros por p?ina
if ($pagina=="") {
    $pagina = "1";
    $pc = "1";
} else {
    $pc = $pagina;
}
$inicio = $pc - 1;
$inicio = $inicio * $total_reg;
$limite = mysql_query("$busca LIMIT $inicio,$total_reg");
$todos = mysql_query("$busca");

$tr = mysql_num_rows($todos);
if($tr>0){
 // verifica o n?ero total de registros
$tp = $tr / $total_reg; // verifica o n?ero total de p?inas

// vamos criar a visualiza?o
while($anu = mysql_fetch_array($limite)){
$id    = $anu["id"];
$titulo = $anu["titulo"];
$texto = $anu["noticia"];
$texto = nl2br($texto);
$texto  = str_replace("[img]","<img src=\"",$texto);
$texto  = str_replace("[/img]","\"",$texto);
$texto  = str_replace("[b]","<b>",$texto);
$texto  = str_replace("[i]","<i>",$texto);
$texto  = str_replace("[u]","<u>",$texto);
$texto  = str_replace("[/b]","</b>",$texto);
$texto  = str_replace("[/i]","</i>",$texto);
$texto  = str_replace("[/u]","</u>",$texto);
$texto  = str_replace("[br]","<br>",$texto);
$texto  = str_replace("]",">",$texto);
$data  = $anu["data"];
$hora  = $anu["hora"];
?>
  <tr>
    <td width="100%" height="20"><b><font face="Arial" size="2"><?=$data?> - <?=$hora?> <a href="visualiza.php?id=<?=$id?>">
	<?=$titulo?></a></font></b></td>
  </tr>
<?php
}
// agora vamos criar os bot?s "Anterior e pr?imo"
$anterior = $pc -1;
$proximo = $pc +1;
if ($pagina>1) {
    echo "
    <tr>
    <td width=\"100%\" height=\"19\">
      <p align=\"left\"><a href='?pagina=$anterior'><font face=arial size=2>Anteriores</a>
 ";
}
else{
echo "<tr>
    <td width=\"100%\" height=\"19\">
      <font face=arial size=2><p align=\"left\"><font face=arial size=2>Anteriores</font>";
}
echo "<font face=arial size=2> | <b>Página $pagina</b> |";
if ($pagina<$tp) {
    echo "
<font face=arial size=2><a href='?pagina=$proximo'> Próximas</a>
   ";
}
else
{
echo "
    <font face=arial size=2>Próximas
";
}
}
?>

</table>

</body>

</html>
