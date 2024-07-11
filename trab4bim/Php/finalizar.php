<?php
  include('conexaoBD.php');
  include_once('classes.php');
  include_once('cabecalho.php');
  $c = New Carro();
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
            <h1 style="margin-left:10%;">Finalizar estadia</h1><br> 
            <form action=" " method="POST"> 
            <div class="form-group">
                <label for="placa" class="sr-only">Placa do Carro</label>
                <input type="text" name="placa"  placeholder="Placa do carro" class="form-control">
            </div> 
            <div class="form-group">
            <h4>Possui ticket?</h4>
                  <input type="text" name="codConvênio"  placeholder="Código do convênio" class="form-control" VALUE='0'>
            </div>
            <input type="submit" value="Finalizar" class="btn btn-block login-btn mb-4">
            </form></div><br>
            <?php
   if(isset($_POST['placa']) && !empty($_POST['placa'])){

      $placa = $_POST['placa'];

      if($c->buscarDados($placa) == true){
          ?>
        <div class="table-responsive">
      <table class="table table-hover">
            <thead><tr>
            <th scope="col">CÓDIGO</th><th scope="col">PLACA</th><th scope="col">ENTRADA</th><th scope="col">SAÍDA</th><th scope="col">TOTAL PAGAR</th><th scope="col">TARIFA FIXA</th><th scope="col">SITUAÇÃO</th>
            </tr></thead>
            <tbody>
            <?php
              $c->sair($placa);
              $dados = $c->buscarDados($placa);
              if(Count($dados) > 0){
                  for($i = 0; $i < Count($dados); $i++){
                      echo "<tr>";
                      foreach($dados[$i] as $coluna => $valor){
                          echo "<td>".$valor." </td>";
                    }
                    echo "</table></div>";
                  }}
                
                if(isset($_POST['codConvênio']) && !empty($_POST['codConvênio']) && $_POST['codConvênio'] != '0'){
                  $convenio = $_POST['codConvênio'];
                  if($c->Convenio($convenio) == true)
                    $c->tempoEstadia($placa);
                    $c->tarifa($placa);
                    $tempototal = $_SESSION['tempo'];
                    $tarifaFixa = $_SESSION['tarifaFixa'];
                    if($tempototal > 1){
                    $total = ($tarifaFixa)/2 + ($tempototal * ($tarifaFixa/2));
                  }else{
                    $total = ($tarifaFixa)/2;
                  }
                    $c->pagar($placa,$total);
                    $c->ultimoPagamento($convenio,$total);
                    echo "<br><h2>Informações do Ticket:</h2>";
                   echo"<h4>Código do Convenio: ".$_SESSION["id"]."</h4><br>";
                   echo"<h4>Empresa emissora: ".$_SESSION["Empresa"]."</h4><br>";
                    
              
                  }else{
                    $c->tempoEstadia($placa);
                    $c->tarifa($placa);
                    $tempototal = $_SESSION['tempo'];
                    $tarifaFixa = $_SESSION['tarifaFixa'];
                    
                    if($tempototal > 1){
                      $total = $tarifaFixa + ($tempototal * ($tarifaFixa/2));
                    }else{
                      $total = $tarifaFixa;
                    }
                    $c->pagar($placa,$total);
                }
              ?>
    <?php
      }else{
         echo "Ops, ocorreu um erro!";
      }
   }
?>

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
