<?php
	require('./conexao/conexao.php');//Pagina de Conexão

	if(isset($_POST['id_noticia']))//recebe ID da categoria via POST
	{
		$id = $_POST['id_noticia'];
		
		//SQL para fazer alteração dos valor no banco de dados
		$conexao->query("DELETE FROM Posts WHERE ID = '$id' ");

		//Mensagem confirmando as alterações feitas e voltando para a página de edição de categorias
		echo "<script>alert('Post Excluido'); window.location.href = './profile.php?autor=".$_COOKIE['login']."';</script>";
	}
	elseif (isset($_GET['id_categoria'])) 
	{
		$id = $_GET['id_categoria'];

		//SQL para fazer alteração dos valor no banco de dados
		$conexao->query("DELETE FROM categorias WHERE ID = '$id' ");

		//Mensagem confirmando as alterações feitas e voltando para a página de edição de categorias
		echo "<script>alert('Categoria Excluida'); window.location.href = './categoria.php';</script>";
	}
?>