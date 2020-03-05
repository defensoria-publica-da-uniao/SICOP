<?php
@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once '/dados/php56/desenvolvimento/SGAI/controller/controller.php';
class MSetores extends controller{
                    
    public function listarSetores() {
      $this->sql = " Select * from setor ";
    
      return $this->query();
    }

}

?>
