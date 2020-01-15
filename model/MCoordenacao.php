<?php
@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once '/dados/php56/desenvolvimento/SGAI/controller/controller.php';
class MCoordenacao extends controller{
                    
    public function listarCoordenacao() {
      $this->sql = " Select c.*, u.str_login from coordenacao as c "
              . " inner join gr_usuario as U on c.id_usuario = u.id_usuario ";
      return $this->query();
    }

}

?>