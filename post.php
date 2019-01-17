<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Postagem</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-post.css" rel="stylesheet">

  </head>

  <body>


    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          
          <?php require('./head.php'); 

        
          
          $id = $_GET['ID'];

          $sql = $conexao->query("SELECT * FROM Posts WHERE ID = '$id'");

          
          while ($noticias = mysqli_fetch_array($sql))
          {          
          $autorSQL = "SELECT * FROM Usuarios WHERE ID = ".$noticias['IDUsuarios'];
          $autor = mysqli_fetch_array($conexao->query($autorSQL));
          $comentarioSQL = $conexao ->query("SELECT * FROM Comentarios WHERE IDPosts = ".$noticias['ID']);

			    echo '<h1 class="mt-4">'.$noticias['Titulo'].'</h1>';//Título da notica
          echo '<p class="lead">Escrito por '.$autor['Usuario'].'</p>';//Data da noticia
          echo '<hr><p>Postado em '.$noticias['DataPublicacao'].'</p>';
          echo '<hr>';
          echo '<img class="img-fluid rounded" src=fotos/posts/'.$noticias['Foto'].' alt="">';
          echo '<hr>';
          echo '<p class="lead">'.$noticias['Texto'].'</p>';
          echo '<hr>';
            
          while($comentario = mysqli_fetch_array($comentarioSQL)){
            $nomeSQL = "SELECT * FROM Usuarios WHERE ID = ".$comentario['IDUsuarios'];
            $nome = mysqli_fetch_array($conexao->query($nomeSQL));
          echo '<div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src=fotos/perfil/'.$nome['Foto'].' alt="">
          <div class="media-body">
            <h5 class="mt-0">'.$nome['Nome'].'</h5>
            '.$comentario['Comentario'].'
          </div>
        </div>';
      }

        echo '<div class="card my-4">
            <h5 class="card-header">Escreva um Comentario:</h5>
              <div class="card-body">
                    <form method="POST" action="./comentar.php?ID='.$noticias['ID'].'">
                      <div class="form-group">
                        <textarea class="form-control" rows="3" name="boxcomentario"></textarea>
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Enviar</button>
                      
                    </form>

            </div>
          </div>
        </div>';

    }



  ?>
        

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
