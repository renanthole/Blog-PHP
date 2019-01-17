<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">

  </head>

  <body>

    <div class="container">

      <div class="row">


        <div class="col-md-8">

          <h1 class="my-4">Blog
            <small>Blog</small>
          </h1>

        <?php require('./head.php');

			
        $totalNoticias = "5";

        if(isset($_GET['pagina']))
          $pagina=$_GET['pagina'];
        else
          $pagina = "1";

        $inicial = $pagina - 1;
        $inicial = $inicial * $totalNoticias;

        $sql = "SELECT * FROM Posts";

        $limite = $conexao->query("$sql ORDER BY ID desc LIMIT $inicial, $totalNoticias");
        $todasNoticias = mysqli_num_rows($conexao->query($sql)); //numero total de noticias
		    $totalPagina = $todasNoticias / $totalNoticias;


        //Visualização de Noticia

        while ($noticias = mysqli_fetch_array($limite)){
        if($noticias > 0){

          $autorSQL = "SELECT * FROM Usuarios WHERE ID = ".$noticias['IDUsuarios'];
          $autor = mysqli_fetch_array($conexao->query($autorSQL));
          
          echo '<div class="card mb-4">';
          echo '<img class="card-img-top" src=fotos/posts/'.$noticias['Foto'].' alt="">';
          echo '<div class="card-body">';
          echo '<h2 class="card-title">'.$noticias['Titulo'].'</h2>';
          echo '<p class="card-text">'.$noticias['Texto'].'</p>';
          echo '<a href="post.php?ID='.$noticias['ID'].'" class="btn btn-primary">Leia &rarr;</a>';
          echo '</div>';
          echo '<div class="card-footer text-muted">';
          echo 'Postado por '.$autor['Nome'].' em '.$noticias['DataPublicacao'].'';
          echo '</div>';
          echo '</div>';
        }
      
      else{
        echo '<div class="card mb-4">
        <div class="card-body">
        <h2 class="card-title">Ops!</h2>
        </div>
        </div>';
      }
    }

        ?>


        <div id="paginacao">
				<?php
					//links para passar de página
					$anterior = $pagina -1;
					$proximo = $pagina +1;
          if ($pagina>1)
            //echo '<ul class="pagination justify-content-center mb-4">';
            //echo '<li class="page-item disable">';
						  echo '<a class="page-link" href="?pagina='.$anterior.'"><- Anterior</a>';
            //echo '</li>';
          

          if($pagina < $totalPagina)
            //echo '<li class="page-item disabled">';
            echo '<a class="page-link" href="?pagina='.$proximo.'">Próxima -></a> ';
            //echo '</li>';
            //echo '</ul>';
				?>
			</div>
      </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Procurar</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Procurar...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Buscar!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->

          <div class="card my-4">
            <h5 class="card-header">Categorias</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">

                <?php require('conexao/conexao.php');

                

                $resultados = $conexao->query("SELECT * FROM Categorias");

                if($resultados ->num_rows > 0)
                while ($categoria = $resultados->fetch_assoc())//Apresentação das categorias
                {	
                  //Link criado dinamicamente passando o nome da Categoria via GET para edição
                  echo '<a href="./cats_exibir.php?categoria='.$categoria['Nome'].'">'.$categoria['Nome'].'</a> <br/>';
                  /*echo '<ul class="list-unstyled mb-0">
                          <li>
                            '.$resultados.'
                          </li>
                        </ul>';*/

                  //echo $rows['Nome']."<br />";
                }
                  ?>

                </div>
              </div>
              </div>
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Blog 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
