<?php
    @session_start();
    //Substituir require_once por _SESSION['PATH'];
    require_once $_SESSION['PATH'] . 'controller/controller.php';
    
    class MEventos extends controller{

    function listarEventos() {
        //$this->sql = " Select e.*, u.str_login from tp_evento as e "
        //      . " inner join gr_usuario as U on e.id_usuario = u.id_usuario ";
        $this->sql = " Select * from tp_evento ";
    
        //var_dump($this->sql);
      //exit;
        
        return $this->query();
    }

  

}

?>   