<?php
@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once $_SESSION['PATH'] . 'controller/controller.php';

class MTestorg extends controller{
                
                
    function listarTorganizacao() {
      $this->sql = " Select o.*, p.descricao, u.str_login from organizacao as o"
              . " inner join paises as p on p.id_paises = o.cod_pais "
              . " inner join gr_usuario as U on o.id_usuario = u.id_usuario ";

      return $this->query();
    }
   
    function buscaNomepais() {
      $this->sql = "SELECT * FROM paises where id_paises = '$codpais'";
      return $this->query();
    }



}

?>
