<?php
	require('./conexao/conexao.php');

	$login_cookie = $_COOKIE['login'];

	if(empty($_POST['titulo']) || empty($_POST['texto']) || empty($_POST['categorias']))
	{
		echo "<script>alert('Preencha todos os campos para mandar a noticia'); window.location.href = 'novopost.php';</script>";
	}
	else
	{

		$titulo = $_POST['titulo'];
		$texto = $_POST['texto'];
		$categorias = $_POST['categorias'];
		$foto = $_FILES['foto'];

		$autorSQL = mysqli_fetch_array($conexao->query("SELECT ID FROM Usuarios WHERE usuario = '$login_cookie'"));
		$autor = $autorSQL['ID']; 

		if (!empty($foto['name'])) {
			$largura = 100000000;
			// Altura máxima em pixels
			$altura = 100000000;
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
				$caminho_imagem = 'fotos/posts/' . $nome_imagem;
	 
				// Faz o upload da imagem para seu respectivo caminho
				move_uploaded_file($foto['tmp_name'], $caminho_imagem);
			

		$conexao->query("INSERT INTO Posts (IDUsuarios, IDCategorias, Titulo, Texto, DataPublicacao, Foto) VALUES ( '$autor', '$categorias', '$titulo', '$texto', NOW(), '$nome_imagem')");

			}
		/*$id = mysqli_fetch_array($conexao->query("SELECT * FROM Posts WHERE Titulo = '$titulo'"));
		$redirecionar = 'Location:./leitura.php?ID='.$id['ID'];
		header($redirecionar);*/
		$redirecionar = 'Location:./index.php';
		header($redirecionar);
	}
}
?>