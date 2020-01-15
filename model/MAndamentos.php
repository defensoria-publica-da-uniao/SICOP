<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once '/dados/php56/desenvolvimento/SGAI/controller/controller.php';

class MAndamentos extends controller {

    function listaAndamntos($processo)
    {
        $this->sql = "select * from andamentos where nr_processo = '$processo' ";
        return $this->query();
    }

    function buscaQtdPendente($nr_processo)
    {
        $this->sql = "select  count(nr_processo) as total from andamentos
                     where nr_processo = '$nr_processo' and pendencia = 'S'";
        return $this->query();
    }

}

?>