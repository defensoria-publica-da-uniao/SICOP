<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once '/dados/php56/desenvolvimento/SGAI/controller/controller.php';

class MProcesso extends controller {

    public function listaProcessoString($nr_processo)
    {
        $this->sql = "SELECT * FROM processos WHERE nr_processo = '$nr_processo' ";
        return $this->query();
    }

    public function listaProcessos($nr_processo = null)
    {
        ($nr_processo != null) ? $where = 'WHERE nr_processo = ' . "'$nr_processo'" : $where = null;
        
        $this->sql = "SELECT pro.*, uni.desc_unidade, org.organizacao FROM processos AS pro
                    INNER JOIN unidade as uni ON pro.cod_unidade = uni.cod_unidade
                    INNER JOIN organizacao AS org  ON pro.id_organizacao = org.id_organizacao $where";
        
        //var_dump($this->sql);
        //exit;
        
        return $this->query();
    }



}

?>