
<?php
  include('conexaoBD.php');
  include_once('cabecalho.php');
?>
<body>
    <header>
    <nav>
        <a href="../index.php" style=" margin-left:2%;font-size: 15px; color: white;">HOME</a>
          <a href="sobre.php" style=" margin-left:1%;font-size: 15px; color: white;">SOBRE</a>
        </nav>
    </header>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
            <div class="card-body">
            <div class="brand-wrapper">
            <h1 style=" margin-left:27%; font-size: 30px;">Selecione uma das opções abaixo:</h1><br>
            <div class="btn btn-block login-btn mb-4"><a class="botao"  href="nova_estadia.php">INICIAR ESTADIA</a></div><BR>
    <div class="btn btn-block login-btn mb-4"><a class="botao"  href="registrar.php">REGISTRAR</a></div><br>
    <div class="btn btn-block login-btn mb-4"><a class="botao"  href="alteraTarifa.php">ALTERAR TARIFA</a></div><br>
    <div class="btn btn-block login-btn mb-4"><a class="botao" href="listagem.php">LISTAGEM</a></div><br>
    <div class="btn btn-block login-btn mb-4"><a class="botao"  href="finalizar.php">FINALIZAR ESTADIA</a></div>
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
</body>   