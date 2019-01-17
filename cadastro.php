<html>
  <head>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="css/login.css" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">
<div class="container">
<h1 class="form-heading">Cadastro</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Cadastro</h2>
   <p>Crie um novo usuário!</p>
   </div>
   <?php require('./head.php');?>
    <form method="POST" id="" action="./cadastro_funcao.php" enctype="multipart/form-data">
        <div class="form-group">
            <input type="text" class="form-control" name="nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="usuario" placeholder="Usuário">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="senha" placeholder="Senha">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="confirmasenha" placeholder="Confirme sua Senha">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="foto" placeholder="Foto">
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
    </div>
</div></div></div>


</body>
</html>
