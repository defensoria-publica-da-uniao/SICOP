
<?php
@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once '/dados/php56/desenvolvimento/SGAI/model/MDivisao.php';
class Divisao extends MDivisao{

    public function consultarDivisao()
    {
        return $this->listarDivisao();
    }
    
    public function cadastrarDivisao()
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
            $this->redirect(1, 'divisao/inicioDivisao');
        } else {
            $this->redirect(2, 'divisao/inicioDivisao');
        }
    }
    
    //apaga o registro de feriados
    public function apagarDivisao()
    {
        //var_dump($_POST);
        //exit;
        $dados = $_POST['arrDadosForm'];
        $resultado = $this->delete($dados);

        //var_dump($vocabulos);
        //exit;

        if ($resultado == true) {
            $this->redirect(1, "divisao/inicioDivisao");
        } else {
            $this->redirect(2, 'divisao/inicioDivisao');
        }
    }
  
    public function editarDivisao()
    {
        $id = $_POST['id_divisao'];

        $result = $this->listaDados('divisao', $id, "", 'id_divisao');

        $dados = mssql_fetch_array($result);

        $arr = array();

        $arr = array('id_divisao' => $dados['id_divisao'], 'descricao' => $dados['descricao']);


        echo json_encode($arr);
    }

    
   //Método para listar unidade(ajax de editar)
    public function listEditardivisao()
    {
        //echo 'oi';
        //var_dump($_POST);
        //exit;
        $codigorecebe = $_POST["codigo"];

        $consulta = $this->listaDados('divisao', $codigorecebe, '', 'id_divisao');

        $resultado = mssql_fetch_array($consulta);

        //var_dump($resultado);
        //exit;

        $arrInfo = Array();

        $arrInfo['codigo'] = $resultado['id_divisao'];
        $arrInfo['descricao'] = utf8_encode($resultado['descricao']);
        $arrInfo['sigla'] = $resultado['sigla'];
  
        echo json_encode($arrInfo);
    }

    public function updateDivisao()
    {

        //echo 'oi';
        //var_dump($_POST);
        //exit;

        $_POST['arrDadosForm']['descricao'] = utf8_decode($_POST['arrDadosForm']['descricao']);
        $result = $this->update($_POST['arrDadosForm']);

        //var_dump($this->sql);
        //exit;

        if ($result == true) {
            $this->redirect(1, "divisao/inicioDivisao");
        } else {
            $this->redirect(2, 'divisao/inicioDivisao');
        }
    }

}

$oDivisao = new Divisao();
$classe = 'Divisao';
$oBjeto = $oDivisao;
@include_once '../application/request.php';


?>
