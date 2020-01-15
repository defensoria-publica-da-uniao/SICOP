<?php
@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once '/dados/php56/desenvolvimento/SGAI/model/MSetores.php';
class Setores extends MSetores{

    public function consultarSetores()
    {
        return $this->listarSetores();
    }
    
    public function cadastrarSetores()
    {

        //var_dump($_POST);
        //exit;

        $descricao = $_POST['arrDadosForm'];
        $descricao['descricao'] = utf8_decode($descricao['descricao']);

        //var_dump($descricao);
        //exit;

        $insert = $this->insert($descricao);

        //var_dump($this->sql);
        //exit;

        if ($insert == true) {
            $this->redirect(1, 'setores/inicioSetores');
        } else {
            $this->redirect(2, 'setores/inicioSetores');
        }
    }
    
    //apaga o registro de feriados
    public function apagarSetores()
    {
        //var_dump($_POST);
        //exit;
        $dados = $_POST['arrDadosForm'];
        $resultado = $this->delete($dados);

        //var_dump($vocabulos);
        //exit;

        if ($resultado == true) {
            $this->redirect(1, "setores/inicioSetores");
        } else {
            $this->redirect(2, 'setores/inicioSetores');
        }
    }
  
    public function editarSetores()
    {
        $id = $_POST['id_setores'];

        $result = $this->listaDados('setores', $id, "", 'id_setores');

        $dados = mssql_fetch_array($result);

        $arr = array();

        $arr = array('id_setores' => $dados['id_setores'], 'descricao' => $dados['descricao']);


        echo json_encode($arr);
    }

    
   //Método para listar unidade(ajax de editar)
    public function listEditarsetores()
    {
        //echo 'oi';
        //var_dump($_POST);
        //exit;
        $codigorecebe = $_POST["codigo"];

        $consulta = $this->listaDados('setores', $codigorecebe, '', 'id_setores');

        $resultado = mssql_fetch_array($consulta);

        //var_dump($resultado);
        //exit;

        $arrInfo = Array();

        $arrInfo['codigo'] = $resultado['id_setores'];
        $arrInfo['descricao'] = utf8_encode($resultado['descricao']);

        echo json_encode($arrInfo);
    }

    public function updateSetores()
    {

        //echo 'oi';
        //var_dump($_POST);
        //exit;

        $_POST['arrDadosForm']['descricao'] = utf8_decode($_POST['arrDadosForm']['descricao']);
        $result = $this->update($_POST['arrDadosForm']);

        //var_dump($this->sql);
        //exit;

        if ($result == true) {
            $this->redirect(1, "setores/inicioSetores");
        } else {
            $this->redirect(2, 'setores/inicioSetores');
        }
    }

}




$oSetores = new Setores();
$classe = 'Setores';
$oBjeto = $oSetores;
@include_once '../application/request.php';


?>
