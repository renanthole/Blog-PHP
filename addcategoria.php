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
		<h3>Adicionar Categoria</h3>
		
		<form method="POST" id="" action="./addcategoria_funcao.php">
			Nome: <input type="text" name="titulo"> <br />
			<button>Enviar</button>
		</form>
	</div>
</body>
</html>