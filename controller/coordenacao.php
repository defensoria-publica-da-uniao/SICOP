
<?php
@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once '/dados/php56/desenvolvimento/SGAI/model/MCoordenacao.php';
class Coordenacao extends MCoordenacao{

    public function consultarCoordenacao()
    {
        return $this->listarCoordenacao();
    }
    
    public function cadastrarCoordenacao()
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
            $this->redirect(1, 'coordenacao/inicioCoordenacao');
        } else {
            $this->redirect(2, 'coordenacao/inicioCoordenacao');
        }
    }
    
    //apaga o registro de feriados
    public function apagarCoordenacao()
    {
        //var_dump($_POST);
        //exit;
        $dados = $_POST['arrDadosForm'];
        $resultado = $this->delete($dados);

        //var_dump($vocabulos);
        //exit;

        if ($resultado == true) {
            $this->redirect(1, "coordenacao/inicioCoordenacao");
        } else {
            $this->redirect(2, 'coordenacao/inicioCoordenacao');
        }
    }
  
    public function editarCoordenacao()
    {
        $id = $_POST['id_coordenacao'];

        $result = $this->listaDados('coordenacao', $id, "", 'id_coordenacao');

        $dados = mssql_fetch_array($result);

        $arr = array();

        $arr = array('id_coordenacao' => $dados['id_coordenacao'], 'descricao' => $dados['descricao']) ;


        echo json_encode($arr);
    }

    
   //Método para listar unidade(ajax de editar)
    public function listEditarcoordenacao()
    {
        //echo 'oi';
        //var_dump($_POST);
        //exit;
        $codigorecebe = $_POST["codigo"];

        $consulta = $this->listaDados('coordenacao', $codigorecebe, '', 'id_coordenacao');

        $resultado = mssql_fetch_array($consulta);

        //var_dump($resultado);
        //exit;

        $arrInfo = Array();

        $arrInfo['codigo'] = $resultado['id_coordenacao'];
        $arrInfo['descricao'] = utf8_encode($resultado['descricao']);
        $arrInfo['sigla'] = $resultado['sigla'];
  
        echo json_encode($arrInfo);
    }

    public function updateCoordenacao()
    {

        //echo 'oi';
        //var_dump($_POST);
        //exit;

        $_POST['arrDadosForm']['descricao'] = utf8_decode($_POST['arrDadosForm']['descricao']);
        $result = $this->update($_POST['arrDadosForm']);

        //var_dump($this->sql);
        //exit;

        if ($result == true) {
            $this->redirect(1, "coordenacao/inicioCoordenacao");
        } else {
            $this->redirect(2, 'coordenacao/inicioCoordenacao');
        }
    }

}

$oCoordenacao = new Coordenacao();
$classe = 'Coordenacao';
$oBjeto = $oCoordenacao;
@include_once '../application/request.php';


?>
