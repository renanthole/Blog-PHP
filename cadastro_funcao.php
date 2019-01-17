<?php
	require('./conexao/conexao.php');//Pagina de Conexão

	if(empty($_POST['nome']) || empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['confirmasenha'])|| empty($_POST['email']))
	{
		//Verificação se estão todos os campos preenchidos
		echo "<script>alert('Preencha todos os campos para fazer o cadastro'); window.location.href = './cadastro.php';</script>";
	}

	if(($_POST['senha']) == ($_POST['confirmasenha'])){
	$nome = $_POST['nome'];
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	$email = $_POST['email'];
	$foto = $_FILES['foto'];
	$verifica = $conexao->query("SELECT usuario, email FROM Usuarios WHERE usuario ='$usuario' || email = '$email'");
	}
	else{
		echo "<script>alert('As senhas não são iguais'); window.location.href = './cadastro.php';</script>";
	}
	if (mysqli_num_rows($verifica)<=0)
	{
		if (!empty($foto['name'])) {
		$largura = 150;
		// Altura máxima em pixels
		$altura = 180;
		// Tamanho máximo do arquivo em bytes
		$tamanho = 100000;
 
		$error = array();
 
    	// Verifica se o arquivo é uma imagem
    	if(!preg_match("/^image\/(pjpeg|jpeg|png|jpg|gif|bmp)$/", $foto['type'])){
     	   $error[1] = 'Isso não é uma imagem.';
   	 	} 
	
		// Pega as dimensões da imagem
		$dimensoes = getimagesize($foto['tmp_name']);
	
		// Verifica se a largura da imagem é maior que a largura permitida
		if($dimensoes[0] > $largura) {
			$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
		}
 
		// Verifica se a altura da imagem é maior que a altura permitida
		if($dimensoes[1] > $altura) {
			$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
		}
		
		// Verifica se o tamanho da imagem é maior que o tamanho permitido
		if($foto["size"] > $tamanho) {
   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
		}
 
		// Se não houver nenhum erro
		if (count($error) == 0) {
		
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto['name'], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = 'fotos/perfil/' . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto['tmp_name'], $caminho_imagem);
		
			// Insere os dados no banco
			
		
		//Criação do novo usuário
		$conexao->query("INSERT INTO Usuarios (nome, usuario, senha, email, Foto) VALUES ('$nome', '$usuario', '$senha', '$email', '$nome_imagem')");
		setcookie("login",$usuario);
		//Aviso de sucesso e redirecionamento para a página de usuário
		echo "<script>alert('Sucesso'); window.location.href = './index.php';</script>";
	}
	}
}
	else
	{	
		//Aviso caso o usuário ou e-mail já está cadastrado e redirecionamento para a página de cadastro
		echo "<script>alert('Usuário ou e-mail já cadastrado'); window.location.href = './cadastro.php';</script>";
	}
?>