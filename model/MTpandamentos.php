
<?php
    @session_start();
    //Substituir require_once por _SESSION['PATH'];
    require_once $_SESSION['PATH'] . 'controller/controller.php';
    class MTpandamentos extends controller{

    function listarTpandamentos() {
        $this->sql = " Select a.*, u.str_login from tp_andamento as a "
              . " inner join gr_usuario as U on a.id_usuario = u.id_usuario ";
        
        return $this->query();
    }

  

}

?>   