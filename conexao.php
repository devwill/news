<?php
/* Arquivo de configura��o do sistema */

//Dados do MySQL
$host  = "localhost";   // servidor.
$user  = "definir";    // nome do usu�rio.
$pass  = "definir";    // senha do usu�rio.
$banco = "definir";    // nome do banco de dados.

//Pagina��o de resultados
$config_paginacao = "10"; //n�mero de not�cias por p�gina.


mysql_connect($host, $user, $pass);
mysql_select_db($banco);
?>