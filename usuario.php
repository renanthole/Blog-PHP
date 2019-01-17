<!DOCTYPE html>
<html>
<head>
	<title>Pagina de Usuario</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<?php require('./head.php');//Cabeçalho padrão ?>
	<div id="conteudo">
	<style type="text/css">a:hover{color: red;}</style>

	<?php

	$autor = $_COOKIE['login'];

	$verifica = $conexao->query("SELECT * FROM Usuarios WHERE Perfil = 1 AND Usuario = '$autor'");

	if(mysqli_num_rows($verifica)>=1){
		echo '<a href="./novopost.php">Escrever Post</a> | 
		<a href="./profile.php?autor='.$autor.'">Ver Postagens</a> |
		<a href="./categoria.php">Categorias</a> | ';
	}
	else{
		echo '<a href="./profile.php?autor='.$autor.'">Ver Postagens</a>';
	}

	?>
	</div>
</body>
</html>