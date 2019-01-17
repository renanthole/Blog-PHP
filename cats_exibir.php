<!DOCTYPE html>
<html>
<head>
	<title>Seus Posts</title>

	<link href="css/estilo.css" rel="stylesheet" /><!--Estilo CSS padrão todas as páginas-->
</head>
<body>
		<h3>Suas Postagens</h3>

		<?php //require('../conexao/conexao.php');
		require('./head.php');
			$cat = $_GET['categoria'];

			$sql = $conexao->query("SELECT ID, Nome FROM Categorias WHERE Nome = '$cat'");//SQL de seleção de categorias
			$id = mysqli_fetch_array($sql);
			$catID = $id['ID'];
			$resultados = $conexao->query("SELECT * FROM Posts WHERE IDCategorias = '$catID' ORDER BY ID DESC");

			if($resultados ->num_rows > 0)
				while ($posts = mysqli_fetch_array($resultados))//Apresentação das categorias
				{	
					//Link criado dinamicamente passando o ID da Categoria via GET para edição
					echo '<strong><a href="./leitura.php?id_noticia='.$posts['ID'].'">'.$posts['Titulo'].'</a></strong> ';
					echo $posts['Titulo'].'<br/>';
				}
		?>

	</div>

</body>
</html>