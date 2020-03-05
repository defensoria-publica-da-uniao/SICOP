<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once $_SESSION['PATH'] . 'model/MRelacionar.php';

class Relacionar extends MRelacionar {

    function inicio() {
        return 'Módulo relacionar criado com sucesso';
    }

    public function listarRelacionados($processo) {

        return $this->listaProcrel($processo);
    }

    public function cadastrarProcrel() {

        $arrDadosForm = $_POST['arrDadosForm'];
        $arnr_relacionado = $arrDadosForm['nr_relacionado'];

        //var_dump($arrDadosForm);
        //exit;

        $resultadoInsere = $this->insert($arrDadosForm);

        //var_dump($this->sql);
        //exit;


        if ($resultadoInsere) {
            $this->redirect(1, 'relacionar/inicioRelacionar/' . $arrDadosForm['nr_processo']);
        } else {
            $this->redirect(2, 'relacionar/inicioRelacionar/' . $arrDadosForm['nr_processo']);
        }
    }
    
    public function apagarProcrel()    {
        
        //echo '<pre>';
        //print_r($_POST);
        //echo '</pre>';
        //exit;
        
         //$this->sql = "Delete from proc_rel "
         //               . "where nr_processo = '" . $_POST['arrDadosForm']['processo'] . "'  and nr_relacionado = '" . $_POST['arrDadosForm']['relacionado'] . "'";
        
        //$query = "Delete from proc_rel "
        //                . "where nr_processo = '" . $_POST['arrDadosForm']['processo'] . "'  and nr_relacionado = '" . $_POST['arrDadosForm']['relacionado'] . "'";
        
    //var_dump($this->sql);
        //exit;

         //return $this->query();
               
        //var_dump($_POST);
        //exit;
        
        $dados = $_POST['arrDadosForm'];
        $resultado = $this->deleteChar2($dados);
        
        //var_dump($dados);
        //exit;

        if ($resultado == true) {
            $this->redirect(1, 'relacionar/inicioRelacionar/' . $dados['id']);
        } else {
            $this->redirect(2, 'relacionar/inicioRelacionar/' . $dados['id']);
        }
    }

}

$oRelacionar = new Relacionar();
$classe = 'Relacionar';
$oBjeto = $oRelacionar;
@include_once '../application/request.php';
?>