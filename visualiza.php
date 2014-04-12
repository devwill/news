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
$busca = mysql_query("SELECT * FROM news_ind WHERE id='".$_GET["id"]."'");
$anu = mysql_fetch_array($busca);
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
    <td width="100%" height="20"><b><font face="Arial" size="4"><?=$titulo?></font></b></td>
  </tr>
  <tr>
    <td width="100%" height="20"><font face="Arial" size="2"><?=$texto?></font></td>
  </tr>
  <tr>
    <td width="100%" height="21"><font face="Arial" size="2"><i><?="$data - $hora"?></i>
<?php
if($_SESSION["admin"]=="on"){ ?>
      | <a href="admin/editar.php?id=<?=$id?>" target="_blank"><b>Edita</a> - <a href="admin/apaga.php?id=<?=$id?>" target="_blank">Apaga</b></a></font></td>
<?php }  ?></tr>
</table>

</body>
</html>
