<!DOCTYPE html>
<html>
<head>
	<title>Editar categoria	</title>

	<link href="css/estilo.css" rel="stylesheet" /><!--Estilo CSS padrão todas as páginas-->
</head>
<body>
	<?php require('./head.php');//Cabeçalho padrão ?>
	<style type="text/css">a:hover{color: red;}</style>
	<div id="conteudo">
		<h3><a href="./addcategoria.php">Adicionar Categoria</a></h3>
		
		<?php
			/*Pagina de edição categoria*/

			$resultados = $conexao->query("SELECT * FROM categorias");//SQL de seleção de categorias

			if($resultados ->num_rows > 0)
				while ($categorias = $resultados->fetch_object())//Apresentação das categorias
				{	
					//Link criado dinamicamente passando o ID da Categoria via GET para edição
					echo $categorias->Nome.'<a href="./editar.php?id_categoria='.$categorias->ID.'"> Editar</a>';
					echo '<a href="./excluir.php?id_categoria='.$categorias->ID.'"> Excluir</a> <br/>';
				}
		?>
	</div>
</body>
</html>
