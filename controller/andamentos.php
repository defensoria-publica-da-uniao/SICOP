<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once '/dados/php56/desenvolvimento/SGAI/model/MAndamentos.php';

class Andamentos extends MAndamentos {

    function inicio()
    {
        return 'Módulo andamentos criado com sucesso';
    }

    function cadastrarAndamento()
    {
        $arrDadosForm = $_POST['arrDadosForm'];
        $resultadoInsere = $this->insert($arrDadosForm);


        $dadosQtdAndamento = $this->buscaQtdPendente($arrDadosForm['nr_processo']);
        $resultQtdAndamento = mssql_fetch_array($dadosQtdAndamento);
        $qtdAndamento['pendencia'] = $resultQtdAndamento['total'];
        $qtdAndamento['campo_where'] = "nr_processo";
        $qtdAndamento['id'] = $arrDadosForm['nr_processo'];
        $qtdAndamento['tabela'] = 'processos';
        $this->updateChar($qtdAndamento);

        if ($resultadoInsere) {
            $this->redirect(1, 'andamentos/inicioAndamentos/' . $arrDadosForm['nr_processo']);
        } else {
            $this->redirect(2, 'andamentos/inicioAndamentos/' . $arrDadosForm['nr_processo']);
        }
    }

    function listEditAndamento()
    {
        $nr_andamento = $_POST['nr_andamento'];
        $listaAndamento = $this->listaDados('andamentos', $nr_andamento, null, 'id_andamento');
        $andamento = mssql_fetch_array($listaAndamento);
        $andamentoRetorno = array();

        $andamentoRetorno['id_andamento'] = $andamento['id_andamento'];
        $andamentoRetorno['pendencia'] = $andamento['pendencia'];
        $andamentoRetorno['nr_processo'] = $andamento['nr_processo'];
        $andamentoRetorno['id_tp_andamento'] = $andamento['id_tp_andamento'];
        $andamentoRetorno['dt_prz_ini'] = $andamento['dt_prz_ini'];
        $andamentoRetorno['dt_prz_fim'] = $andamento['dt_prz_fim'];
        $andamentoRetorno['observacao'] = $andamento['observacao'];

        echo json_encode($andamentoRetorno);
    }

    function editarAndamento()
    {
        $arrDadosForm = $_POST['arrDadosForm'];
        $nr_processo = $arrDadosForm['nr_processo'];
        $resultUpdate = $this->update($arrDadosForm);


        $dadosQtdAndamento = $this->buscaQtdPendente($arrDadosForm['nr_processo']);

        $resultQtdAndamento = mssql_fetch_array($dadosQtdAndamento);
        $qtdAndamento['pendencia'] = $resultQtdAndamento['total'];
        $qtdAndamento['campo_where'] = "nr_processo";
        $qtdAndamento['id'] = $arrDadosForm['nr_processo'];
        $qtdAndamento['tabela'] = 'processos';
        $this->updateChar($qtdAndamento);
        if ($resultUpdate) {
            $this->redirect(1, 'andamentos/inicioAndamentos/' . $nr_processo);
        } else {
            $this->redirect(2, 'andamentos/inicioAndamentos/' . $nr_processo);
        }
    }

    function alteraPendencia()
    {

        $arrDadosForm['tabela'] = 'andamentos';
        $arrDadosForm['campo_where'] = 'id_andamento';
        $arrDadosForm['id'] = $_POST['andamento'];
        $arrDadosForm['pendencia'] = 'n';
        $resultUpdate = $this->update($arrDadosForm);


        $dadosQtdAndamento = $this->buscaQtdPendente($_POST['nr_processo']);
        $resultQtdAndamento = mssql_fetch_array($dadosQtdAndamento);
        $qtdAndamento['pendencia'] = $resultQtdAndamento['total'];
        $qtdAndamento['campo_where'] = "nr_processo";
        $qtdAndamento['id'] = $_POST['nr_processo'];
        $qtdAndamento['tabela'] = 'processos';
        $this->updateChar($qtdAndamento);
        var_dump($this->sql);
        exit;
    }

}

$oAndamentos = new Andamentos();
$classe = 'Andamentos';
$oBjeto = $oAndamentos;
@include_once '../application/request.php';
?>


