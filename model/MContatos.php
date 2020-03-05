
<?php
@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once $_SESSION['PATH'] . 'controller/controller.php';

class MContatos extends controller{
                
                
    function listarContatos() {
      $this->sql = " Select c.*, o.organizacao from contatos as c "
                 .  " inner join organizacao as o on c.id_organizacao = o.id_organizacao ";

        
      return $this->query();
    }


}

?>