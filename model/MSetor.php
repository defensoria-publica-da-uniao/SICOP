<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once $_SESSION['PATH'] . 'controller/controller.php';
          
class MSetor extends controller{
    
                    
    public function listarSetores() {
      $this->sql = " Select s.*, u.str_login from setor as s "
              . "inner join gr_usuario as U on s.id_usuario = u.id_usuario ";
    
      return $this->query();
    }


}

?>

