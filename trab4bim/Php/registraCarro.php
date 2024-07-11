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
            <div style="margin-left:30%;margin-right:25%;">
            <h1>Registro de novo carro:</h1> 
            <form action="" method="POST">
            <div class="form-group">
                <label for="placa" class="sr-only">Placa</label>
                <input type="text" name="placa"  placeholder="Placa" class="form-control">
            </div>
            <div class="form-group">
                <label for="modelo" class="sr-only">Modelo</label>
                <input type="text" name="modelo"  placeholder="Modelo" class="form-control">
            </div>
            <div class="form-group">
                <label for="cor" class="sr-only">Cor</label>
                <input type="text" name="cor"  placeholder="Cor" class="form-control">
            </div>
            <div class="form-group">
                <label for="marca" class="sr-only">Marca</label>
                <input type="text" name="marca"  placeholder="Marca" class="form-control">
            </div>
            <input id="login" class="btn btn-block login-btn mb-4" type="submit" value="Registrar">
            </form>
 <?php
   if(isset($_POST['placa']) && !empty($_POST['placa']) &&
   isset($_POST['modelo']) && !empty($_POST['modelo']) &&
   isset($_POST['cor']) && !empty($_POST['cor']) &&
   isset($_POST['marca']) && !empty($_POST['marca'])){
      
      $c = New Carro();
      
      $placa = $_POST['placa'];
      $modelo = $_POST['modelo'];
      $cor = $_POST['cor'];
      $marca = $_POST['marca'];
      if($c->cadCarro($placa,$modelo,$cor, $marca) == true){
         echo '<p style="font-size: 20px; color:green;">Veículo registrado com Sucesso!</p>';
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