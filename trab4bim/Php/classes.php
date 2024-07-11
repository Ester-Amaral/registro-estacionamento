<?php

class Carro{

//função para logar usuário:
    public function login($email,$senha){
        global $pdo;
   
        $sql = "SELECT * FROM tb_usuario WHERE Email= :email AND senha = :senha";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("email", $email);
        $sql->bindValue("senha", md5($senha));
        $sql->execute();

        if($sql->rowCount() >0){
            $dado = $sql->fetch();

            $_SESSION["id"] = $dado["Codigo"];
            $_SESSION["nome"] = $dado["Nome"];
            $_SESSION["email"] = $dado["Email"];

            return true;
        }else{
            return false;
        }
     }

//função para cadastrar carro:
    public function cadCarro($placa,$modelo,$cor, $marca){
        global $pdo;

        $sql = "INSERT INTO tb_carro (Placa,Modelo,Cor, Marca) VALUES (:p, :m, :c, :ma)";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":p", $placa);
        $sql->bindValue(":m", $modelo);
        $sql->bindValue(":c", $cor);
        $sql->bindValue(":ma", $marca);
        $sql->execute();
        
        function cadEstadia($placa){
            global $pdo;
        
            $sql = "INSERT INTO tb_estadia (Placas, Entrada, Total_pagar) VALUES (:p, CURRENT_TIME(), NULL)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":p", $placa);
            $sql->execute();
        
            if($sql->rowCount() > 0){
                return true;
            }else{
                return false;
            }
            }

        if($sql->rowCount() > 0 && cadEstadia($placa) == true){
            return true;
        }else{
            return false;
        }
     }
//função para cadastrar estadia de carros ja registrados no sistema:     
public function cadEstadia($placa){
        global $pdo;
    
        $sql = "INSERT INTO tb_estadia (Placas, Entrada) VALUES (:p, CURRENT_TIME())";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":p", $placa);
        $sql->execute();
    
        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
        }  
//função para cadastrar convênio:
     public function cadConvenio($codigo,$nome,$empresa){
        global $pdo;

        $sql = "INSERT INTO tb_convenio (CodConvenio, Nome, Empresa) VALUES (:c, :n, :e)";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":c", $codigo);
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":e", $empresa);
        $sql->execute();

        if($sql->rowCount() > 0){
            return true;
        }else{
            return false;
        }
       }
    
//Função para alterar tarifa:
public function alterar($tarifa, $novatarifa){
        global $pdo;
    
          $sql = "UPDATE tb_estadia SET Tarifa_fixa = :n Where Tarifa_fixa = :t AND Total_Pagar is Null";
          $sql = $pdo->prepare($sql);
          $sql->bindValue(":t", $tarifa);
          $sql->bindValue(":n", $novatarifa);
          $sql->execute();
    
         if($sql->rowCount() > 0){
             return true;
         }else{
             return false;
         }
     }
//Funções para listagem dos dados:
    public function buscarCarro(){
        global $pdo;
         $vetor = array();
         $sql = $pdo->query("SELECT * FROM tb_carro");
         $vetor = $sql->FetchAll(PDO::FETCH_ASSOC);
         return $vetor;
       }

    public function buscarEstadia(){
        global $pdo;
         $vetor = array();
         $sql = $pdo->query("SELECT * FROM tb_estadia ORDER BY Codigo");
         $vetor = $sql->FetchAll(PDO::FETCH_ASSOC);
         return $vetor;
       }
    public function buscarConvenio(){
        global $pdo;
         $vetor = array();
         $sql = $pdo->query("SELECT * FROM tb_convenio");
         $vetor = $sql->FetchAll(PDO::FETCH_ASSOC);
         return $vetor;
       }

    public function buscarDados($placa){
            global $pdo;
             $vetor = array();
             $sql = "SELECT * FROM tb_estadia where Placas = :p ";
             $sql = $pdo->prepare($sql);
             $sql->bindValue(":p", $placa);
             $sql->execute();
             $vetor = $sql->FetchAll(PDO::FETCH_ASSOC);
             return $vetor;
           }

//Função para retornar data de saida:
    public function sair($placa){
            global $pdo;

             $sql = "UPDATE tb_estadia SET Saída = CURRENT_TIME() Where Placas= :p ";
             $sql = $pdo->prepare($sql);
             $sql->bindValue(":p", $placa);
             $sql->execute();

             if($sql->rowCount() > 0){
                return true;
            }else{
                return false;
            
           }
        }

//Função para imprimir dados do convênio:
    public function Convenio($convenio){
            global $pdo;
             $sql = "SELECT * FROM tb_convenio where CodConvenio = :c";
             $sql = $pdo->prepare($sql);
             $sql->bindValue(":c", $convenio);
             $sql->execute();

             if($sql->rowCount() > 0){
                $dado = $sql->fetch();

                $_SESSION["id"] = $dado["CodConvenio"];
                $_SESSION["Nome"] = $dado["Nome"];
                $_SESSION["Empresa"] = $dado["Empresa"];
    
                return true;
            }else{
                return false;
            
           }
           }

//Função para calcular tempo de estadia:
    public function tempoEstadia($placa){
            global $pdo;
             $sql = "SELECT CEILING((TIME(Saída) - TIME(Entrada) )/10000) AS tempo FROM tb_estadia where Placas = :p ";
             $sql = $pdo->prepare($sql);
             $sql->bindValue(":p", $placa);
             $sql->execute();

             if($sql->rowCount() >0){
                $dado = $sql->fetch();
    
                $_SESSION["tempo"] = $dado["tempo"];
                
    
                return true;
            }else{
                return false;
            }
        }

//Função para retornar valor da tarifa fixa:
    public function tarifa($placa){
            global $pdo;
       
            $sql = "SELECT Tarifa_fixa FROM tb_estadia WHERE Placas = :p";
            $sql = $pdo->prepare($sql);
            $sql->bindValue(":p", $placa);
            $sql->execute();
    
            if($sql->rowCount() >0){
                $dado = $sql->fetch();
    
                $_SESSION["tarifaFixa"] = $dado["Tarifa_fixa"];
    
                return true;
            }else{
                return false;
            }
        }  
//Função para retornar valor total do pagamento:
 public function pagar($placa,$total){
            global $pdo;

             $sql = "UPDATE tb_estadia SET Total_Pagar= :t, Situação = :s Where Placas= :p And Situação = :situacao ";
             $sql = $pdo->prepare($sql);
             $sql->bindValue(":t", $total);
             $sql->bindValue(":s", 'Pago');
             $sql->bindValue(":situacao", 'Pendente');
             $sql->bindValue(":p", $placa);
             $sql->execute();

             if($sql->rowCount() > 0){
                return true;
            }else{
                return false;
            
           }
        }    
//Função para retornar ultimo valor pago pelo convênio:
    public function ultimoPagamento($convenio,$total){
            global $pdo;
        
              $sql = "UPDATE tb_convenio SET Total_pagar= :t Where CodConvenio = :c";
              $sql = $pdo->prepare($sql);
              $sql->bindValue(":t", $total);
              $sql->bindValue(":c", $convenio);
              $sql->execute();

        
             if($sql->rowCount() > 0){
                 return true;
             }else{
                 return false;
             }
        }
}
?>