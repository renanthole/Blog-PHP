<!DOCTYPE html>
<html>
<head>
	<title>Seus Posts</title>

	<link href="css/estilo.css" rel="stylesheet" /><!--Estilo CSS padrão todas as páginas-->
</head>
<body>
	<?php require('./head.php');//Cabeçalho padrão ?>

	<div id="conteudo">
	<style type="text/css">a:hover{color: red;} #conteudo{text-align: left;} #conteudo h3, h2{text-align: center;} </style>
		
		<?php
			$user = $_GET['autor'];
			echo '<h3>Postagens de '.$user.'</h3>';

			$sql = $conexao->query("SELECT * FROM Usuarios WHERE usuario = '$user'");//SQL de seleção de categorias
			$id = mysqli_fetch_array($sql);
			$userID = $id['ID'];
			$resultados = $conexao->query("SELECT * FROM Posts WHERE IDUsuarios = '$userID' ORDER BY ID DESC");

			if($resultados ->num_rows > 0)
				while ($posts = mysqli_fetch_array($resultados))//Apresentação das categorias
				{	
					//Link criado dinamicamente passando o ID da Categoria via GET para edição
					echo '<strong><a href="./leitura.php?id_noticia='.$posts['ID'].'">'.$posts['Titulo'].'</a></strong> ';
					echo $posts['Titulo'];
					if(isset($_COOKIE['login']))
					{
						if($_COOKIE['login'] == $id['Usuario'])
						{	
							echo '<form method="POST" action="./posts.php">';
							echo '<input type="hidden" name="id_noticia" value="'.$posts['ID'].'" />';
							echo '<button> Editar </button> </form>';

							echo '<form method="POST" action="./excluir.php">';
							echo '<input type="hidden" name="id_noticia" value="'.$posts['ID'].'" />';
							echo '<button> Exluir </button> </form>';
						}
					}

					echo '<br/>';

				}
		?>

	</div>

</body>
</html>