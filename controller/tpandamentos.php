<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once $_SESSION['PATH'] . 'model/MTpandamentos.php';

class Tpandamentos extends MTpandamentos {

    function consultarTpandamentos()
    {
        return $this->listarTpandamentos();
    }

    function cadastrarTpandamento()
    {
        //var_dump($_POST);
        //exit;
        $descricao = $_POST['arrDadosForm'];
        $descricao['descr_tp_andamento'] = $descricao['descr_tp_andamento'];

        //var_dump($descricao);
        //exit;

        $insert = $this->insert($descricao);

        if ($insert == true) {
            $this->redirect(1, 'tpandamentos/inicioTpandamentos');
        } else {
            $this->redirect(2, 'tpandamentos/inicioTpandamentos');
        }
    }

    //apaga o registro de feriados
    function apagarTpandamento()
    {
        //var_dump($_POST);
        //exit;
        $dados = $_POST['arrDadosForm'];
        $resultado = $this->delete($dados);

        //var_dump($vocabulos);
        //exit;

        if ($resultado == true) {
            $this->redirect(1, "tpandamentos/inicioTpandamentos");
        } else {
            $this->redirect(2, 'tpandamentos/inicioTpandamentos');
        }
    }

    function editarTpandamento()
    {
        //var_dump($_POST);
        //exit;

        $id = $_POST['id_tp_andamento'];

        $result = $this->listaDados('tp_andamento', $id, "", 'id_tp_andamento');

        $dados = mssql_fetch_array($result);

        $arr = array();

        $arr = array('id_tp_andamento' => $dados['id_tp_andamento'], 'descr_tp_andamento' => $dados['descr_tp_andamento']);

        echo json_encode($arr);
    }

    public function updateTpandamento()
    {
        //echo 'oi';
        //var_dump($_POST);
        //exit;

        $result = $this->update($_POST['arrDadosForm']);


        if ($result == true) {
            $this->redirect(1, "tpandamentos/inicioTpandamentos");
        } else {
            $this->redirect(2, 'tpandamentos/inicioTpandamentos');
        }
    }

}

$oTpandamentos = new Tpandamentos();
$classe = 'Tpandamentos';
$oBjeto = $oTpandamentos;
@include_once '../application/request.php';
?>