<?php
include("conexao.php");
$instalar = "
CREATE TABLE `news_adm` (
  `id` int(5) NOT NULL auto_increment,
  `login` varchar(10) NOT NULL default '',
  `senha` varchar(10) NOT NULL default '',
  PRIMARY KEY (`id`)
)";
$inst2 = "INSERT INTO `news_adm` VALUES (1, 'admin', 'admin')";
$inst3 = "CREATE TABLE `news_ind` (
  `id` int(5) NOT NULL auto_increment,
  `titulo` varchar(90) NOT NULL default '',
  `noticia` text NOT NULL,
  `data` varchar(20) NOT NULL default '',
  `hora` varchar(20) NOT NULL default '',
  PRIMARY KEY (`id`)
)";
mysql_query($instalar) or die(mysql_error());
mysql_query($inst2) or die(mysql_error());
mysql_query($inst3) or die(mysql_error());
echo "<br><font size=2 face=arial>Sistema instalado com sucesso!<br>
<a href=\"admin\">Clique aqui</a> e entre em sua área administrativa com LOGIN e SENHA = admin.<br>
Obrigado por escolher o SN News!
</font>";
?>
