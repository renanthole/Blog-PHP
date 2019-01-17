<!DOCTYPE html>
<html>
<head>
	<title>Editar Categoria</title>
	<link href="css/estilo.css" rel="stylesheet" />
</head>
<body>
	<?php require('./head.php');//Cabeçalho padrão ?>
	<div id="conteudo">
		<style type="text/css">#esquerda{text-align: left;}</style>
		<?php
			$id = $_GET['id_categoria'];//recebe ID da categoria via GET

			//SQL para selecionar os dados da categoria a ser editada
			$sql = $conexao->query("SELECT * FROM Categorias WHERE ID = '$id'");

			//Apresentação dos dados a serem editados por input com os valor antigos do banco de dados no valor padrão do input
			$categoria = mysqli_fetch_array($sql);
			echo '<form method="POST" action="./editar_funcao.php">';
			echo '<input type="hidden" name="id_categoria" value="'.$id.'" />';
			echo '<input type="text" name="titulo" value="'.$categoria['Nome'].'"> <br/> <br />';
			echo '<button>Salvar</button> </form>';
		?>
	</div>
</body>
</html>

