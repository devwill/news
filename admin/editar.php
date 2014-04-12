<?php
session_start();
$id = $_GET["id"];
include("../conexao.php");
if($_SESSION["admin"]=="on"){
$sql = "select * from news_ind where id = $id";
$arr = mysql_fetch_array(mysql_query($sql));
$titulo = $arr["titulo"];
$noticia = $arr["noticia"];
?>
<html>
<head>
<title>Editar</title>
</head>
<script>
function format(valor){
document.nova.noticia.value += ' '+valor+' '
}
</script>
<form method="POST" action="editar2.php" name="nova">
  <table border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td><font face="Arial">Título:</font></td>
      <td><font face="Arial">&nbsp;<input type="text" name="titulo" size="45" value="<?=$titulo?>"></font></td>
    </tr>
    <tr>
      <td colspan="2">
        <p align="center"><font face="Arial">Notícia:</font></td>
    </tr>
    <tr>
      <td colspan="2">
        <p align="center"><font face="Arial" size="2"><b><a href="javascript:format(&quot;[b]Texto em negrito[/b]&quot;)" style="text-decoration:none"><font color="#000000">N</font></a><font color="#000000"><a style="text-decoration: none">&nbsp;
        </a></font></b><a style="text-decoration: none" href="javascript:format(&quot;[i]Texto em itálico[/i]&quot;)"><i><font color="#000000">I</font></i></a><font color="#000000"><i><a style="text-decoration: none">&nbsp;
        </a></i></font><a style="text-decoration: none" href="javascript:format(&quot;[u]Texto sublinhado[/u]&quot;)"><u><font color="#000000">S</font></u></a><font color="#000000">
        </font><u><a style="text-decoration: none" href="javascript:format(&quot;[br]&quot;)"><font color="#000000">&lt;BR&gt;</font></a><a style="text-decoration: none"></a></u><font color="#000000">
        </font><font color="#0000FF"><a style="text-decoration:none" href="javascript:format(&quot;[img]URL DA IMAGEM[/img]&quot;)">IMG</a></font></font></p>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <p align="center"><font face="Arial"><textarea rows="15" name="noticia" cols="48"><?=$noticia?>
</textarea></font></td>
    </tr>
    <tr>
      <td colspan="2">
        <p align="center"><input type="submit" value="Editar"></td>
    </tr>
  </table>
<input type="hidden" name="id" value="<?=$id?>">
</form>
<?php
}
else
{
echo "<script>location.href='../'</script>";
}
?>
