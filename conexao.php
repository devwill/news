<?php
/* Arquivo de configuração do sistema */

//Dados do MySQL
$host  = "localhost";   // servidor.
$user  = "definir";    // nome do usuário.
$pass  = "definir";    // senha do usuário.
$banco = "definir";    // nome do banco de dados.

//Paginação de resultados
$config_paginacao = "10"; //número de notícias por página.


mysql_connect($host, $user, $pass);
mysql_select_db($banco);
?>