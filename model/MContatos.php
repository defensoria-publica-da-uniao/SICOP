
<?php
@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once $_SESSION['PATH'] . 'controller/controller.php';

class MContatos extends controller{
                
                
    function listarContatos() {
      $this->sql = " Select c.*, o.organizacao, u.str_login from contatos as c "
                 .  " inner join organizacao as o on c.id_organizacao = o.id_organizacao "
                 .  " inner join gr_usuario as U on c.id_usuario = u.id_usuario ";
        
      return $this->query();
    }


}

?>