<?php
if(isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['senha']) && !empty($_POST['senha'])){
      require 'conexaoBD.php';
      require 'classes.php';
      
      $u = new Carro();
      
      $email = $_POST['email'];
      $senha = $_POST['senha'];

      if($u->login($email, $senha) == true){
          if(isset($_SESSION["nome"])){
            header("location: telaprincipal.php");
          }else{
            $message = "Por favor, verifique seus dados!";
            echo "<script type='text/javascript'>alert('$message');</script>";
              header("location: ../index.php");}
      }else{header("location: ../index.php");}

    }else{
  $message = "Por favor, preencha todos os campos!";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
?>