<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once $_SESSION['PATH'] . 'model/MAndamentos.php';

class Andamentos extends MAndamentos {

    function inicio() {
        return 'Módulo andamentos criado com sucesso';
    }

    function cadastrarAndamento() {
        $arrDadosForm = $_POST['arrDadosForm'];

        if ($arrDadosForm['dt_prz_fim'] > $arrDadosForm['dt_prz_ini']) {
            $arrDadosForm['pendencia'] = 'S';
        } else {
            $arrDadosForm['pendencia'] = 'N';
        }
        //var_dump($arrDadosForm);
        //exit;

        $resultadoInsere = $this->insert($arrDadosForm);

        //var_dump($this->sql);
        //exit;

        if ($resultadoInsere) {
            $this->redirect(1, 'andamentos/inicioAndamentos/' . $arrDadosForm['nr_processo']);
        } else {
            $this->redirect(2, 'andamentos/inicioAndamentos/' . $arrDadosForm['nr_processo']);
        }
    }

    function listEditAndamento() {
        $nr_andamento = $_POST['nr_andamento'];
        $listaAndamento = $this->listaDados('andamentos', $nr_andamento, null, 'id_andamento');
        $andamento = mssql_fetch_array($listaAndamento);
        $andamentoRetorno = array();

        $andamentoRetorno['id_andamento'] = $andamento['id_andamento'];
        $andamentoRetorno['nr_processo'] = $andamento['nr_processo'];
        $andamentoRetorno['id_tp_andamento'] = $andamento['id_tp_andamento'];
        $andamentoRetorno['dt_prz_ini'] = $andamento['dt_prz_ini'];
        $andamentoRetorno['dt_prz_fim'] = $andamento['dt_prz_fim'];
        $andamentoRetorno['observacao'] = $andamento['observacao'];

        echo json_encode($andamentoRetorno);
    }

    function editarAndamento() {
        $arrDadosForm = $_POST['arrDadosForm'];
        $nr_processo = $arrDadosForm['nr_processo'];
       
        if ($arrDadosForm['dt_prz_fim'] > $arrDadosForm['dt_prz_ini']  &&  $arrDadosForm['dt_prz_fim'] > date()){
           $arrDadosForm['pendencia'] = 'S';
        } else {
           $arrDadosForm['pendencia'] = 'N';
        }

        $resultUpdate = $this->update($arrDadosForm);
        if ($resultUpdate) {
            $this->redirect(1, 'andamentos/inicioAndamentos/' . $nr_processo);
        } else {
            $this->redirect(2, 'andamentos/inicioAndamentos/' . $nr_processo);
        }
    }

    function alteraPendencia() {
        $arrDadosForm['tabela'] = 'andamentos';
        $arrDadosForm['campo_where'] = 'id_andamento';
        $arrDadosForm['id'] = $_POST['arrDadosForm']['id_andamento'];
        $arrDadosForm['pendencia'] = 'N';
        $nr_processo = $_POST['nr_processo'];


        $resultUpdate = $this->update($arrDadosForm);

        if ($resultUpdate == true) {
            $this->redirect(1, 'andamentos/inicioAndamentos/' . $nr_processo);
        } else {
            $this->redirect(1, 'andamentos/inicioAndamentos/' . $nr_processo);
        }
        
    }

}

$oAndamentos = new Andamentos();
$classe = 'Andamentos';
$oBjeto = $oAndamentos;
@include_once '../application/request.php';
?>


