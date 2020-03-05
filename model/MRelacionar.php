<?php
    @session_start();
    //Substituir require_once por _SESSION['PATH'];
    require_once $_SESSION['PATH'] . 'controller/controller.php';
    
    class MRelacionar extends controller{

    function listaProcrel($processo)
    {
        $this->sql = "Select * from proc_rel "
                        . "where nr_processo = '$processo' ";
        
        //var_dump($this->sql);
        //exit;

        return $this->query();
    }        
        
        
    }

?>
