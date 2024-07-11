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
            <h1 style="margin-left:10%;">Alterar valor de tarifa</h1><br> 
            <form action=" " method="POST"> 
            <div class="form-group">
                <label for="valor-atual" class="sr-only">Valor Atual</label>
               <input type="number" name="tarifa"  placeholder="Valor atual" class="form-control">
            </div> 
            <div class="form-group">
               <input type="number" name="novatarifa"  placeholder="Valor do reajuste" class="form-control">
            </div>
               <input type="submit" value="Atualizar"   class="btn btn-block login-btn mb-4">
            </form>
            <?php
   if(isset($_POST['tarifa']) && !empty($_POST['tarifa']) &&
   isset($_POST['novatarifa']) && !empty($_POST['novatarifa'])){
      
      $c = New Carro();
      
      $tarifa = $_POST['tarifa'];
      $novatarifa = $_POST['novatarifa'];

      if($c->alterar($tarifa,$novatarifa) == true){
         echo '<p style="font-size: 20px; color:green;">Tarifa atualizada com Sucesso!</p>';
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
