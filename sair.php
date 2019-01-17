<?php
	$login_cookie = $_COOKIE['login'];//Recebe o valor atual de cookie

    setcookie('login', '');//Apaga o valor de cookie

	header("Location: ./index.php"); //Retorna para a página inicial
?>