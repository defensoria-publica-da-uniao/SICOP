<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once $_SESSION['PATH'] . 'model/MProcesso.php';

class Processo extends MProcesso {

    function inicio()
    {
        return 'Módulo processo criado com sucesso';
    }

    function cadastrarProcesso()
    {
        $arrDadosForm = $_POST['arrDadosForm'];

        $resultBuscaSetorUsuario = $this->buscaSetorUsuario($arrDadosForm['id_usuario']);
        $dadosSetor = mssql_fetch_array($resultBuscaSetorUsuario);
        $idSetorUsuario = $dadosSetor['id_setor_usuario'];
        $arrDadosForm['id_setor_usuario'] = $idSetorUsuario;
        $insere = $this->insert($arrDadosForm);



        if ($insere == true) {
            $this->redirect(1, 'processo/inicioProcesso');
        } else {
            $this->redirect(2, 'processo/inicioProcesso');
        }
    }

    function alterarProcesso()
    {
        $arrDadosForm = $_POST['arrDadosForm'];
        $result = $this->updateChar($arrDadosForm);
        if ($result == true) {
            $this->redirect(1, 'processo/inicioProcesso');
        } else {
            $this->redirect(2, 'processo/inicioProcesso');
        }
    }

    function desativarProcesso()
    {
        $arrDadosForm = $_POST['arrDadosForm'];
        if ($arrDadosForm['status'] == 1) {
            $arrDadosForm['status'] = 2;
            $result = $this->updateChar($arrDadosForm);
            if ($result == true) {
                $this->redirect(1, 'processo/inicioProcesso');
            } else {
                $this->redirect(2, 'processo/inicioProcesso');
            }
        } else {
            $arrDadosForm['status'] = 1;
            $result = $this->updateChar($arrDadosForm);
            if ($result == true) {
                $this->redirect(1, 'processo/inicioProcesso');
            } else {
                $this->redirect(2, 'processo/inicioProcesso');
            }
        }
    }

    function listAlteraProcesso()
    {
        $nr_processo = $_POST['nr_processo'];
        $resultadoEdit = $this->listaProcessoString($nr_processo);
        $resultadoProcesso = mssql_fetch_array($resultadoEdit);

        $processo = array();

        $processo['nr_processo'] = $resultadoProcesso['nr_processo'];
        $processo['cod_unidade'] = $resultadoProcesso['cod_unidade'];
        $processo['objeto'] = $resultadoProcesso['objeto'];
        $processo['repasse'] = $resultadoProcesso['repasse'];
        $processo['id_organizacao'] = $resultadoProcesso['id_organizacao'];
        $processo['dt_ini_vigencia'] = $resultadoProcesso['dt_ini_vigencia'];
        $processo['dt_fim_vigencia'] = $resultadoProcesso['dt_fim_vigencia'];
        $processo['juntada'] = $resultadoProcesso['juntada'];
        $processo['status'] = $resultadoProcesso['status'];
        $processo['id_setor'] = $resultadoProcesso['id_setor'];

        echo json_encode($processo);
    }

    function indexarProcVoc()
    {
        $arrDadosForm = $_POST['arrDadosForm'];
        $resultInsert = $this->insert($arrDadosForm);

        if ($resultInsert == true) {
            $this->redirect(1, 'processo/proc_voc/' . $arrDadosForm[nr_processo]);
        } else {
            $this->redirect(2, 'processo/proc_voc/' . $arrDadosForm[nr_processo]);
        }
    }

    function removerVocabulo()
    {
        $arrDadosForm = $_POST['arrDadosForm'];
        $resultRemove = $this->deleteChar($arrDadosForm);

        if ($resultRemove == true) {
            $this->redirect(1, 'processo/proc_voc/' . $arrDadosForm['nr_processo']);
        } else {
            $this->redirect(1, 'processo/proc_voc/' . $arrDadosForm['nr_processo']);
        }
    }

    function listaProcess($vocabulos = null)
    {

        if ($vocabulos == null) {
            unset($_SESSION['vocabulos']);
            return $this->listaProcessos($nr_processo = null);
        } else {
            unset($_SESSION['vocabulos']);
            return $this->listaProcessoVoc($vocabulos);
        }
    }

    function guardarVocabulos()
    {
        $_SESSION['vocabulos'] = $_POST['arrDadosForm']['vocabulos'];
        $this->redirect('', "processo/inicioProcesso");
    }

}

$oProcesso = new Processo();
$classe = 'Processo';
$oBjeto = $oProcesso;
@include_once '../application/request.php';
?>