<?
session_start();
include("../conexao.php");
$login = $_POST["login"];
$senha = $_POST["senha"];
$sql   = "select * from news_adm where login='$login' AND senha='$senha'";
$query = mysql_query($sql);
$nr    = mysql_num_rows($query);
if($nr>0){
$_SESSION["admin"] = "on";
echo "<script>
location.href='../'
</script>
";
}
else {
echo "<script>
location.href='login.htm'
</script>
";
}
?>
