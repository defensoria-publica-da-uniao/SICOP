<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];

require_once $_SESSION['PATH'] . 'model/MSetor.php';

class Setor extends MSetor {

    public function consultarSetores()
    {
        return $this->listarSetores();
    }

    public function cadastrarSetor()
    {

        //var_dump($_POST);
        //exit;

        $descricao = $_POST['arrDadosForm'];
        $descricao['descr_setor'] = utf8_decode($descricao['descr_setor']);

        //var_dump($descricao);
        //exit;

        $insert = $this->insert($descricao);

        //var_dump($this->sql);
        //exit;

        if ($insert == true) {
            $this->redirect(1, 'setor/inicioSetor');
        } else {
            $this->redirect(2, 'setor/inicioSetor');
        }
    }

    //apaga o registro de feriados
    public function apagarSetor()
    {
        //var_dump($_POST);
        //exit;
        $dados = $_POST['arrDadosForm'];
        $resultado = $this->delete($dados);

        //var_dump($vocabulos);
        //exit;

        if ($resultado == true) {
            $this->redirect(1, "setor/inicioSetor");
        } else {
            $this->redirect(2, 'setor/inicioSetor');
        }
    }

    public function editarSetor()
    {
        $id = $_POST['id_setor'];

        $result = $this->listaDados('setor', $id, "", 'id_setor');

        $dados = mssql_fetch_array($result);

        $arr = array();

        $arr = array('id_setor' => $dados['id_setor'], 'descr_setor' => $dados['descr_setor'], 'cod_unidade' => $dados['cod_unidade']);


        echo json_encode($arr);
    }

    //Método para listar unidade(ajax de editar)
    public function listEditsetor()
    {
        //echo 'oi';
        //var_dump($_POST);
        //exit;
        $codigorecebe = $_POST["codigo"];

        $consulta = $this->listaDados('setor', $codigorecebe, '', 'id_setor');

        $resultado = mssql_fetch_array($consulta);

        //var_dump($resultado);
        //exit;

        $arrInfo = Array();

        $arrInfo['codigo'] = $resultado['id_setor'];
        $arrInfo['descricao'] = utf8_encode($resultado['descr_setor']);
        $arrInfo['cod_uni'] = $resultado['cod_unidade'];

        echo json_encode($arrInfo);
    }

    public function updateSetor()
    {

        //echo 'oi';
        //var_dump($_POST);
        //exit;

        $_POST['arrDadosForm']['descr_setor'] = utf8_decode($_POST['arrDadosForm']['descr_setor']);
        $result = $this->update($_POST['arrDadosForm']);

        //var_dump($this->sql);
        //exit;

        if ($result == true) {
            $this->redirect(1, "setor/inicioSetor");
        } else {
            $this->redirect(2, 'setor/inicioSetor');
        }
    }

}

$oSetor = new Setor();
$classe = 'Setor';
$oBjeto = $oSetor;
@include_once '../application/request.php';
?>