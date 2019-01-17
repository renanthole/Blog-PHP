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

    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="./index.php">Blog</a>
        <?php require('./conexao/conexao.php');
        if(empty($_COOKIE['login']))
			{
				echo '<a class="navbar-brand" href="./login.php">Login</a><br />
						<a class="navbar-brand" href="./cadastro.php">Cadastro</a>';
      }
      else
			{
				$login_cookie = $_COOKIE['login'];//Recebe os dados de login via Cookie
				//Pegar os dados do autor da noticia
				$autorSQL = mysqli_fetch_array($conexao->query("SELECT usuario FROM Usuarios
        WHERE Usuario = '$login_cookie'"));
				echo '<a class="navbar-brand" href="#">Seja Bem Vindo '.$autorSQL['usuario'].'</a>
						<br /> <a class="navbar-brand" href="./usuario.php">Configurações</a>
						<br /> <a class="navbar-brand" href="./sair.php">Sair</a>';
			}
      
      ?>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <br />

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="./index.php">Inicio
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Categorias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Videos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contatos</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <!--<script src="vendor/jquery/jquery.min.js"></script>-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
