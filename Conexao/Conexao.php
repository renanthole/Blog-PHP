<?php

$conexao = mysqli_connect('localhost', 'root', '') or die("Erro de Conexão");
$banco = mysqli_select_db($conexao, 'blogprod');

?>