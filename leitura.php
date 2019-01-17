<!DOCTYPE html>
<html>
<head>
	<title>Página de Leitura</title>
	<link href="css/estilo.css" rel="stylesheet" />
</head>
<body>
	<?php require('./head.php');//Cabeçalho padrão ?>
	<div id="conteudo">
		<?php

			$id = $_GET['id_noticia'];//Recebe o ID da noticia clicada via GET

			//Seleção da noticia clicada
			$noticias = mysqli_fetch_array($conexao->query("SELECT * FROM Posts WHERE ID = '$id'"));
			echo '<div id="leitura"><h1>'.$noticias['Titulo'].'</h1>';//Título da notica
			echo '<div id="data">'.$noticias['DataPublicacao'].'</div>';//Data da noticia
			
			//Seleção e exibição de dados do autor
			$autorSQL = "SELECT * FROM Usuarios WHERE ID = ".$noticias['IDUsuarios'];
			$autor = mysqli_fetch_array($conexao->query($autorSQL));
			echo '<div id="autor">Autor: '.$autor['Nome'].'<br />'.$autor['Usuario'].'</div>';
			
			echo '<p>'.$noticias['Texto'].'</p></div>';//Exibir o conteúdo do texto
		?>
	</div>

</body>
</html>