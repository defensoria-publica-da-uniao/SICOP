<?php
@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once '/dados/php56/desenvolvimento/SGAI/controller/controller.php';
class MGrupostrab extends controller{
    
    public function listarGrupostrab() {
      $this->sql = " Select g.*, e.descricao as descr_tipo from grupo_trab as g "
                 . " inner join tp_evento as e on g.id_tp_evento = e.id_tp_evento ";
       
    //var_dump($this->sql);
    //exit;

    return $this->query();
    }

}

?>