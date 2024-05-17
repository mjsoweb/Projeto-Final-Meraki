//função dentro do PedidoDAO
class PedidoDAO{
    
}
public function novoPedido($idUsu)
  {
      //echo "{$usuarioDTO->getDtNascimentoUsu()}";
     
      try {
          

          $usuario_idUsu = $idUsu;
          $dtHoraPed = //usar a função do PHP que retorna data hora;
          $valorTotalPed = '0.00';
          $situacaoPed = 'Aberto';
          $formaPagamentoPed = 'NÃO DEFINIDO';
          
          
          $sql = "INSERT INTO `pedido` (`dtHoraPed`, `valorTotalPed`, `situacaoPed`, `formaPagamentoPed`, `usuario_idUsu`) 
          VALUES ('{$dtHoraPed}', '{$valorTotalPed}', '{$situacaoPed}', '{$formaPagamentoPed}', '{$usuario_idUsu}');;
          $stmt = $this->pdo->prepare($sql);

          $retorno = $stmt->execute();
          return $retorno;
      } catch (PDOException $exc) {
          echo $exc->getMessage();
      }
  }
public function contarItensCarrinho($idPed) {
  //echo "{$emailUsu}";
  //echo "{$senhaUsu}";
  try {
      $sql = "SELECT COUNT(*) as TotalItens FROM `pedido_item_produto` 
      WHERE `pedido_idPed` = '{$idPed}'; ";
      $stmt = $this->pdo->prepare($sql);
      
      $stmt->execute();
        $retorno = $stmt->fetch(PDO::FETCH_ASSOC); 
      return $retorno;
   } catch (PDOException $exc) {
      echo $exc->getMessage();  
   }
}