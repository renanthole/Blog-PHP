<?php
	require('./conexao/conexao.php');//Pagina de Conexão

	$id = $_POST['id_categoria'];//recebe ID da categoria via POST

	$titulo = $_POST['titulo'];//recebe o novo valor de título via POST

	//SQL para fazer alteração dos valor no banco de dados
	$conexao->query("UPDATE categorias SET Nome = '$titulo' WHERE ID = '$id' ");

	//Mensagem confirmando as alterações feitas e voltando para a página de edição de categorias
	echo "<script>alert('Edições Salvas'); window.location.href = './categoria.php';</script>";
?>