<?php
@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once '/dados/php56/desenvolvimento/SGAI/controller/controller.php';
class MLocalusuario extends controller{
                    
    public function listarLocalusuario() {
      $this->sql = " Select s.*, u.str_login from setor_usuario as s "
              . " inner join gr_usuario as U on s.id_usuario = u.id_usuario ";
    
      return $this->query();
    }

}

?>