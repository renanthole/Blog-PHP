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
<h1 class="form-heading">login Form</h1>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Login</h2>
   <p>Digite seu usuário e senha!</p>
   </div>
   <?php require('./head.php');?>
	<form method="POST" id="" action="./login_funcao.php">
        <div class="form-group">
            <input type="text" class="form-control" name="usuario" placeholder="Usuário">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="senha" placeholder="Senha">
        </div>
        <div class="forgot">
        <a href="reset.html">Esqueceu sua senha?</a>
		</div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    </div>
<p class="botto-text"> Designed by Thole's Enterprise</p>
</div></div></div>


</body>
</html>
