
<?php
@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once '/dados/php56/desenvolvimento/SGAI/model/MLocalusuario.php';
class Localusuario extends MLocalusuario{

    public function consultarLocalusuario()
    {
        return $this->listarLocalusuario();
    }
    
    public function cadastrarLocalusuario()
    {

        var_dump($_POST);
        exit;

        $descricao = $_POST['arrDadosForm'];
        $descricao['descricao'] = utf8_decode($descricao['descricao']);

        //var_dump($descricao);
        //exit;

        $insert = $this->insert($descricao);

        //var_dump($this->sql);
        //exit;

        if ($insert == true) {
            $this->redirect(1, 'localusuario/inicioLocalusuario');
        } else {
            $this->redirect(2, 'localusuario/inicioLocalusuario');
        }
    }
    
    //apaga o registro de feriados
    public function apagarLocalusuario()
    {
        //var_dump($_POST);
        //exit;
        $dados = $_POST['arrDadosForm'];
        $resultado = $this->delete($dados);

        //var_dump($vocabulos);
        //exit;

        if ($resultado == true) {
            $this->redirect(1, "localusuario/inicioLocalusuario");
        } else {
            $this->redirect(2, 'localusuario/inicioLocalusuario');
        }
    }
    
     public function editarLocalusuario()
    {
        $id = $_POST['id_setor_usuario'];

        $result = $this->listaDados('setor_usuario', $id, "", 'id_setor_usuario');

        $dados = mssql_fetch_array($result);

        $arr = array();

        $arr = array('id_setor_usuario' => $dados['id_setor_usuario']);


        echo json_encode($arr);
    }


}
  
   

$oLocalusuario = new Localusuario();
$classe = 'Localusuario';
$oBjeto = $oLocalusuario;
@include_once '../application/request.php';


?>

                
            