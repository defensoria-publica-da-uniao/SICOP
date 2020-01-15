<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once '/dados/php56/desenvolvimento/SGAI/controller/controller.php';

class MProcesso extends controller {

    function listaProcessoString($nr_processo)
    {
        $this->sql = "SELECT * FROM processos WHERE nr_processo = '$nr_processo'";
        return $this->query();
    }

    function listaProcessos($nr_processo = null)
    {
        ($nr_processo != null) ? $where = 'WHERE nr_processo = ' . "'$nr_processo'" : $where = null;
        $this->sql = "SELECT pro.*, uni.desc_unidade, org.organizacao FROM processos AS pro
                    INNER JOIN unidade as uni ON pro.cod_unidade = uni.cod_unidade
                    INNER JOIN organizacao AS org  ON pro.id_organizacao = org.id_organizacao $where";
        return $this->query();
    }

    function listaProcessoVoc($vocabulos)
    {
        $where = " where ";
        for ($i = 0; $i < count($vocabulos); $i ++) {
            if ($i > 0) {
                $where .= " or ";
            }
            $where .= "voc.id_vocabulo = " . $vocabulos[$i];
        }

        $this->sql = "SELECT distinct(voc.nr_processo), pro.*, org.organizacao
                    FROM proc_vocabulos as voc
                    INNER JOIN processos as pro
                    INNER JOIN organizacao as org ON pro.id_organizacao = org.id_organizacao
                    ON pro.nr_processo = voc.nr_processo $where";

        return $this->query();
    }

    function buscaSetorUsuario($id_usuario)
    {
        $this->sql = "SELECT * FROM setor_usuario WHERE id_usuario = $id_usuario AND ativo = 'S'";
        return $this->query();
    }

    function listaProcessosVocabulos($nr_processo)
    {
        $this->sql = "SELECT pv.*, usu.str_login, voc.vocabulo FROM proc_vocabulos AS pv
                    INNER JOIN  gr_usuario as usu ON pv.id_usuario = usu.id_usuario
                    INNER JOIN  vocabulos as voc ON pv.id_vocabulo = voc.id_vocabulo WHERE nr_processo = '$nr_processo'";
        return $this->query();
    }

    function listaAndamentosProcesso($nr_processo)
    {
        $this->sql = "SELECT an.*, tp_an.descr_tp_andamento FROM andamentos AS an "
                . "INNER JOIN tp_andamento AS  tp_an ON an.id_tp_andamento = tp_an.id_tp_andamento"
                . " WHERE  nr_processo = '$nr_processo'";
        return $this->query();
    }

    function listaVocabulosProcesso($nr_processo)
    {
        $this->sql = "SELECT pv.*, voc.vocabulo from proc_vocabulos AS pv
                    INNER JOIN vocabulos AS voc ON pv.id_vocabulo = voc.id_vocabulo
                    WHERE nr_processo = '$nr_processo'";
        return $this->query();
    }

}

?>