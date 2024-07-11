<?php
  include('conexaoBD.php');
  include_once('classes.php');
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
            <div style="margin-left:30%; margin-right:25%;">
            <h1>Registro Novo Convênio:</h1> 
            <form action="" method="POST">
            <div class="form-group">
                <label for="modelo" class="sr-only">Código</label>
                <input type="text" name="codigo"  placeholder="Código do Convênio: Ex;XYZ" class="form-control">
            </div>
            <div class="form-group">
                <label for="cor" class="sr-only">Nome</label>
                <input type="text" name="nome"  placeholder="Nome"class="form-control">
            </div>
            <div class="form-group">
                <label for="marca" class="sr-only">Empresa</label>
                <input type="text" name="empresa"  placeholder="Empresa fornecedora" class="form-control">
            </div>
            <input type="submit" value="Registrar"   class="btn btn-block login-btn mb-4">
            </form>
            <?php
   if(isset($_POST['codigo']) && !empty($_POST['codigo']) &&
   isset($_POST['nome']) && !empty($_POST['nome']) &&
   isset($_POST['empresa']) && !empty($_POST['empresa'])){
      
      $c = New Carro();
      
      $codigo = $_POST['codigo'];
      $nome = $_POST['nome'];
      $empresa = $_POST['empresa'];

      if($c->cadConvenio($codigo,$nome,$empresa) == true){
         echo '<p style="font-size: 20px; color:green;">Convênio registrado com Sucesso!</p>';
      }else{
         echo '<p style="font-size: 20px; color:red;">Ops, ocorreu um erro!</p>';
      }
   }
?>
</div>
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