<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once '/dados/php56/desenvolvimento/SGAI/model/MGrupostrab.php';
class Grupostrab extends MGrupostrab{

    public function consultarGrupostrab() {

    return $this->listarGrupostrab();
        
    }
    
    //apaga o registro de feriados
    public function apagarGrupostrab() {
        //var_dump($_POST);
        //exit;
        $dados = $_POST['arrDadosForm'];
        $resultado = $this->delete($dados);

        //var_dump($vocabulos);
        //exit;

        if ($resultado == true) {
            $this->redirect(1, "grupostrab/inicioGrupostrab");
        } else {
            $this->redirect(2, 'grupostrab/inicioGrupostrab');
        }
    }
    
    public function cadastrarGrupostrab() {
        
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
            $this->redirect(1, 'grupostrab/inicioGrupostrab');
        } else {
            $this->redirect(2, 'grupostrab/inicioGrupostrab');
        }
    }
    
    
    public function editarGrupostrab() {
 
        //echo 'oi';
        //var_dump($_POST);
        //exit;

        $id = $_POST['id_grup_trab'];

 
        $result = $this->listaDados('grupo_trab', $id, "", 'id_grup_trab');

        $dados = mssql_fetch_array($result);


        $arr = array();

        $arr = array('id_grup_trab' => $dados['id_grup_trab'], 'descricao' => $dados['descricao'], 'nr_publico' => $dados['nr_publico'], 'dt_evento' => $dados['dt_evento'], 'id_tp_evento' => $dados['id_tp_evento']);

    
        echo json_encode($arr);

    }
    
    //Método para listar unidade(ajax de editar)
    public function listEditargrupostrab() {
        //echo 'oi';
        //var_dump($_POST);
        //exit;
        $codigorecebe = $_POST["codigo"];
   
        $consulta = $this->listaDados('grupo_trab', $codigorecebe, '', 'id_grup_trab');
        $resultado = mssql_fetch_array($consulta);
        
        //var_dump($this->sql);
        ///exit;
        
        $arrInfo = Array();

        $arrInfo['codigo'] = $resultado['id_grup_trab'];
        $arrInfo['descr_gruptrab'] = utf8_encode($resultado['descricao']);
        $arrInfo['publicoalvo'] = $resultado['nr_publico'];
        $arrInfo['datadoevento'] = $resultado['dt_evento'];
        $arrInfo['tipoevento'] = $resultado['id_tp_evento'];
 
        //echo "<pre>";
        //var_dump($arrInfo);
        //exit;

        echo json_encode($arrInfo);
        

    }


    public function updateGrupostrab() {
        
        //echo 'oi';
        //var_dump($_POST);
        //exit;

        $_POST['arrDadosForm']['descricao']=  utf8_decode($_POST['arrDadosForm']['descricao']);
        $result = $this->update($_POST['arrDadosForm']);

        //var_dump($this->sql);
        //exit;
        
        if ($result == true) {
            $this->redirect(1, "grupostrab/inicioGrupostrab");
        } else {
            $this->redirect(2, 'grupostrab/inicioGrupostrab');
        }
    }
    

    

}
$oGrupostrab = new Grupostrab();
$classe = 'Grupostrab';
$oBjeto = $oGrupostrab;
@include_once '../application/request.php';

?>