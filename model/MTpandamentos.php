
<?php
    @session_start();
    //Substituir require_once por _SESSION['PATH'];
    require_once $_SESSION['PATH'] . 'controller/controller.php';
    class MTpandamentos extends controller{

    function listarTpandamentos() {
        $this->sql = " Select a.* from tp_andamento as a ";
                 
        return $this->query();
    }

  

}

?>   