<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once $_SESSION['PATH'] . 'controller/controller.php';

class MAndamentos extends controller {

    function listaAndamentos($processo)
    {
        $this->sql = "Select anda.*, tp.descr_tp_andamento from andamentos as anda "
                        . "INNER JOIN tp_andamento as tp ON anda.id_tp_andamento = tp.id_tp_andamento "
                        . "where nr_processo = '$processo' ";
        
        //var_dump($this->sql);
        //exit;

        return $this->query();
    }

}

?>