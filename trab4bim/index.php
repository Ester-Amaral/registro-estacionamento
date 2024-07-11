<?php
  include('php/conexaoBD.php');
  require('php/classes.php');
  require('php/cabecalho.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="Img/login1.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <?php 
              echo '<h3 class="login-heading mb-4"> Olá, '.$_SESSION['nome'].'!</h3>';?>
              </div>
              <p class="login-card-description">Faça o login para continuar</p>
              <form action="php/logar.php" method="POST">
                  <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Senha</label>
                    <input type="password" name="senha" id="password" class="form-control" placeholder="Senha">
                  </div>
                  <input id="login" class="btn btn-block login-btn mb-4" type="submit" value="Logar">
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
