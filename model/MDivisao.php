<?php
@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once '/dados/php56/desenvolvimento/SGAI/controller/controller.php';
class MDivisao extends controller{
                    
    public function listarDivisao() {
      $this->sql = " Select d.*, u.str_login from divisao as d "
              . " inner join gr_usuario as U on d.id_usuario = u.id_usuario ";
    
      return $this->query();
    }

}

?>