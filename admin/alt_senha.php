<?php
session_start();
include("../conexao.php");
$alt = $_GET["alt"];
$login = $_POST["login"];
$senha = $_POST["senha"];
if($_SESSION["admin"]=="on"){
if($alt==""){
$sql = "select * from news_adm";
$arr = mysql_fetch_array(mysql_query($sql));
$login = $arr["login"];
$senha = $arr["senha"];
?>
<form method="POST" action="?alt=ok" name="nova">
  <table border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td align="left">
        <p align="center"><font face="Arial">Novo login:</font></td>
      <td align="left">
        <p align="center"><font face="Arial">&nbsp;<input type="text" name="login" size="20" value="<?=$login?>"></font></td>
    </tr>
    <tr>
      <td align="left">
        <p align="left"><font face="Arial">Nova senha:</font></td>
      <td align="left">
        <font face="Arial">&nbsp;<input type="text" name="senha" size="20" value="<?=$senha?>"></font></td>
    </tr>
    <tr>
      <td align="left">
        <p align="right"><input type="submit" value="Alterar"></td>
      <td align="left">
      </td>
    </tr>
  </table>
</form>
<?php
}
else
{
$sql = "UPDATE news_adm SET login='$login', senha = '$senha'";
mysql_query($sql);
echo "<script>alert(\"Dados alterados!\"); window.close()</script>";
}
}
else
{
echo "<script>location.href='../'</script>";
}
?>
