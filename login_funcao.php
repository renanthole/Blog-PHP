<?php
	require('./conexao/Conexao.php');
	$user = $_POST['usuario'];
	$pass = ($_POST['senha']);

	$verifica = $conexao->query("SELECT * FROM Usuarios
	WHERE Usuario = '$user' && Senha = '$pass'");

	$perfil = $conexao->query("SELECT * FROM Usuarios WHERE Perfil = 1
	 AND Usuario = '$user' && Senha = '$pass'");



	if(empty($_POST['usuario']) || empty($_POST['senha']))
	{
		echo '<script>alert("Preencha todos os campos para logar"); window.location.href = "./login.php";</script>';
	}
	else if(mysqli_num_rows($verifica)<=0)
	{
		echo '<script> alert("O usuario ou senha está errado"); window.location.href = "./login.php";</script>';
	}
	else if(mysqli_num_rows($perfil)>=1){
		setcookie("login", $user);
		header('Location:./usuario.php');
	}
	else
	{
		setcookie("login", $user);
		header('Location:./index.php');
	}
?>