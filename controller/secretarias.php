
<?php
@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once '/dados/php56/desenvolvimento/SGAI/model/MSecretarias.php';
class Secretarias extends MSecretarias{

    public function consultarSecretarias()
    {
        return $this->listarSecretarias();
    }
    
    public function cadastrarSecretarias()
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
            $this->redirect(1, 'secretarias/inicioSecretarias');
        } else {
            $this->redirect(2, 'secretarias/inicioSecretarias');
        }
    }
    
    //apaga o registro de feriados
    public function apagarSecretarias()
    {
        //var_dump($_POST);
        //exit;
        $dados = $_POST['arrDadosForm'];
        $resultado = $this->delete($dados);

        //var_dump($vocabulos);
        //exit;

        if ($resultado == true) {
            $this->redirect(1, "secretarias/inicioSecretarias");
        } else {
            $this->redirect(2, 'secretarias/inicioSecretarias');
        }
    }
  
    public function editarSecretarias()
    {
        $id = $_POST['id_secretaria'];

        $result = $this->listaDados('secretarias', $id, "", 'id_secretaria');

        $dados = mssql_fetch_array($result);

        $arr = array();

        $arr = array('id_secretaria' => $dados['id_secretaria'], 'descricao' => $dados['descricao']) ;


        echo json_encode($arr);
    }

    
   //Método para listar unidade(ajax de editar)
    public function listEditarsecretarias()
    {
        //echo 'oi';
        //var_dump($_POST);
        //exit;
        $codigorecebe = $_POST["codigo"];

        $consulta = $this->listaDados('secretarias', $codigorecebe, '', 'id_secretaria');

        $resultado = mssql_fetch_array($consulta);

        //var_dump($resultado);
        //exit;

        $arrInfo = Array();

        $arrInfo['codigo'] = $resultado['id_secretaria'];
        $arrInfo['descricao'] = utf8_encode($resultado['descricao']);
        $arrInfo['sigla'] = $resultado['sigla'];
  
        echo json_encode($arrInfo);
    }

    public function updateSecretarias()
    {

        //echo 'oi';
        //var_dump($_POST);
        //exit;

        $_POST['arrDadosForm']['descricao'] = utf8_decode($_POST['arrDadosForm']['descricao']);
        $result = $this->update($_POST['arrDadosForm']);

        //var_dump($this->sql);
        //exit;

        if ($result == true) {
            $this->redirect(1, "secretarias/inicioSecretarias");
        } else {
            $this->redirect(2, 'secretarias/inicioSecretarias');
        }
    }

}

$oSecretarias = new Secretarias();
$classe = 'Secretarias';
$oBjeto = $oSecretarias;
@include_once '../application/request.php';


?>
