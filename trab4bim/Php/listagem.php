<?php
  include('conexaoBD.php');
  include_once('cabecalho.php');
  include_once('classes.php');
  $c = new Carro();
?>
<body>
    <header>
    <nav>
        <a href="../index.php" style=" margin-left:2%;font-size: 15px; color: white;">HOME</a>
          <a href="sobre.php" style=" margin-left:1%;font-size: 15px; color: white;">SOBRE</a>
        </nav>
    </header>
    <br><br>
    <div  class="container">
      <h1 style="text-align:center;">&mdash;Relação de Carros&mdash;</h1>
    <div class="table-responsive">
      <table class="table table-hover">
            <thead><tr>
            <th scope="col">PLACA</th><th scope="col">MODELO</th><th scope="col">COR</th><th scope="col">MARCA</th>
            </tr></thead>
            <tbody>
            <?php
              $dados = $c->buscarCarro();
              if(Count($dados) > 0){
                  for($i = 0; $i < Count($dados); $i++){
                      echo "<tr>";
                      foreach($dados[$i] as $coluna => $valor){
                          echo "<td>".$valor." </td>";    
                      }
                      echo "</tr>";
                    }
                    echo "</table></div>";
                  }
            ?><br>
    <h1 style="text-align:center;">&mdash;Relação de Estadias&mdash;</h1>
    <div class="table-responsive">
      <table class="table table-hover">
            <thead><tr>
            <th scope="col">CÓDIGO</th><th scope="col">PLACA</th><th scope="col">ENTRADA</th><th scope="col">SAÍDA</th><th scope="col">TOTAL PAGAR</th><th scope="col">TARIFA FIXA</th><th scope="col">SITUAÇÃO</th>
            </tr></thead>
            <tbody>
            <?php
              $dados = $c->buscarEstadia();
              if(Count($dados) > 0){
                  for($i = 0; $i < Count($dados); $i++){
                      echo "<tr>";
                      foreach($dados[$i] as $coluna => $valor){
                          echo "<td>".$valor." </td>";    
                      }
                      echo "</tr>";
                    }
                    echo "</table></div>";
                  }
            ?><br>
    <h1 style="text-align:center;">&mdash;Relação de Convênio&mdash;</h1>
    <div class="table-responsive">
      <table class="table table-hover">
            <thead><tr>
            <th scope="col">CÓDIGO</th><th scope="col">NOME</th><th scope="col">EMPRESA</th><th scope="col">HISTÓRICO DE PAGAMENTO</th>
            </tr></thead>
            <tbody>
            <?php
              $dados = $c->buscarConvenio();
              if(Count($dados) > 0){
                  for($i = 0; $i < Count($dados); $i++){
                      echo "<tr>";
                      foreach($dados[$i] as $coluna => $valor){
                          echo "<td>".$valor." </td>";    
                      }
                      echo "</tr>";
                    }
                    echo "</table></div>";
                  }
            ?>
</div>
</body>  
