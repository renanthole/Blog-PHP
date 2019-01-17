<?php
	require('./conexao/conexao.php');//Pagina de Conexão

	if(empty($_POST['titulo']))
	{
		//Verificação se estão todos os campos preenchidos
		echo "<script>alert('Preencha todos os campos para fazer o cadastro da categoria'); 
				window.location.href = './addcategoria.php';</script>";
	}

	$titulo = $_POST['titulo'];//recebe o novo valor de título via POST

	$verifica = $conexao->query("SELECT * FROM categorias WHERE nome ='$titulo'");

	if (mysqli_num_rows($verifica)<=0)
	{
		//Criação do nova categoria

		$conexao->query("INSERT INTO categorias (Nome) VALUES ('$titulo')");
		//Aviso de sucesso e redirecionamento para a página de categoria
		echo "<script>alert('Sucesso'); window.location.href = './categoria.php';</script>";
	}
	else
	{	
		//Aviso caso a categoria já exista e redirecionamento para a página de categoria
		echo "<script>alert('Usuário ou e-mail já cadastrado'); window.location.href = './categoria.php';</script>";
	}
?>