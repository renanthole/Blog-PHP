<?php
	/*Pagina para escrever noticia*/
    require('./Conexao/conexao.php');//Pagina de Conexão
	//require('./head.php');
	

    $login_cookie = $_COOKIE['login'];//Recebe o login via Cookie
	$id = $_GET['ID'];
	
	if(empty($_COOKIE['login'])){
		echo "<script>alert('Para comentar, faça login.');</script>";
		$comentarioSQL = mysqli_fetch_array($conexao->query("SELECT * FROM Posts WHERE ID = '$id'"));
		$post = $comentarioSQL['ID'];


		$id = mysqli_fetch_array($conexao->query("SELECT ID FROM Posts WHERE ID = '$post'"));

		$redirecionar = 'Location:./post.php?ID='.$id['ID'];
		header($redirecionar);
	}

	elseif(empty($_POST['boxcomentario'])){

		$comentarioSQL = mysqli_fetch_array($conexao->query("SELECT * FROM Posts WHERE ID = '$id'"));
		
		$post = $comentarioSQL['ID'];



		$id = mysqli_fetch_array($conexao->query("SELECT ID FROM Posts WHERE ID = '$post'"));
		$redirecionar = 'Location:./post.php?ID='.$id['ID'];
		header($redirecionar);
		echo "<script>alert('Preencha todos os campos para mandar a noticia');</script>";
	}
	else
	{
		//recebe os valores da noticia a ser postada via POST
		$comentario = $_POST['boxcomentario'];

		//Gera a data dinamicamente
		//$data = date("Y-m-d");

		//Pegar os dados do autor da noticia
		$comentarioSQL = mysqli_fetch_array($conexao->query("SELECT * FROM Posts WHERE ID = '$id'"));
		$post = $comentarioSQL['ID'];

		$autorSQL = mysqli_fetch_array($conexao->query("SELECT * FROM Usuarios WHERE usuario = '$login_cookie'"));
		$autor = $autorSQL['ID']; 

		//SQL para a inserção dos dados da noticia do Banco de Dados
		$conexao->query("INSERT INTO Comentarios (IDPosts, IDUsuarios, Comentario) VALUES ('$post', '$autor', '$comentario')");

		//Redirecionamento para a página da noticia
		$id = mysqli_fetch_array($conexao->query("SELECT ID FROM Posts WHERE ID = '$post'"));
		$redirecionar = 'Location:./post.php?ID='.$id['ID'];
		header($redirecionar);
	}
?>