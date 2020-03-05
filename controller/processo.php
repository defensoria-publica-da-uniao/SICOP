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
        
        //var_dump($arrDadosForm);
        //exit;
        
        $result = $this->updateChar($arrDadosForm);
        
        //var_dump($this->sql);
        //exit;
        
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
            
            //var_dump($this->sql);
            //exit;
            
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

    function listarrrProcessos()
    {
        return $this->listaProcessos();
        
    }    
    function listAlteraProcesso()

    {
        $nr_processo = $_POST['nr_processo'];
          
        $resultadoEdit = $this->listaProcessoString($nr_processo);
        $resultadoProcesso = mssql_fetch_array($resultadoEdit);
   
        //var_dump($resultadoProcesso);
        //exit;

        $processo = array();
        
        $processo['nr_processo'] = $resultadoProcesso['nr_processo'];
        $processo['cod_unidade'] = $resultadoProcesso['cod_unidade'];
        $processo['objeto'] = $resultadoProcesso['objeto'];
        $processo['repasse'] = $resultadoProcesso['repasse'];
        $processo['id_organizacao'] = $resultadoProcesso['id_organizacao'];
        $processo['dt_ini_vigencia'] = $resultadoProcesso['dt_ini_vigencia'];
        $processo['dt_fim_vigencia'] = $resultadoProcesso['dt_fim_vigencia'];
        $processo['pendencia'] = $resultadoProcesso['pendencia'];
        $processo['status'] = $resultadoProcesso['status'];
        $processo['id_setor'] = $resultadoProcesso['id_setor'];
        $processo['str_login'] = $resultadoProcesso['str_login'];
        $processo['dt_atualiz'] = $resultadoProcesso['dt_atualiz'];

        echo json_encode($processo);
    }

}

$oProcesso = new Processo();
$classe = 'Processo';
$oBjeto = $oProcesso;
@include_once '../application/request.php';
?>