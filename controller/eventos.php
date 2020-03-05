<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once $_SESSION['PATH'] . 'model/MEventos.php';

class Eventos extends MEventos {

    function consultarEventos()
    {
        return $this->listarEventos();
    }
 
    function cadastrar()
    {
        //var_dump($_POST);
        //exit;
        $descricao = $_POST['arrDadosForm'];
        $descricao['descricao'] = utf8_decode($descricao['descricao']);

        //var_dump($descricao);
        //exit;

        $insert = $this->insert($descricao);

        if ($insert == true) {
            $this->redirect(1, 'eventos/inicioEventos');
        } else {
            $this->redirect(2, 'eventos/inicioEventos');
        }
    }
    
    function apagarEventos()
    {
        //var_dump($_POST);
        //exit;
        $dados = $_POST['arrDadosForm'];
        $resultado = $this->delete($dados);

        //var_dump($this->sql);
        //exit;

        if ($resultado == true) {
            $this->redirect(1, "eventos/inicioEventos");
        } else {
            $this->redirect(2, 'eventos/inicioEventos');
        }
    }
    
    public function alterarEventos()
    {
        //var_dump($_POST);
        //exit;

       
        $id = $_POST['id_tp_evento'];
        $result = $this->listaDados('tp_evento', $id, "", 'id_tp_evento');
        $dados = mssql_fetch_array($result);
        
//        var_dump($dados);
//        exit;
       
        
        $arr = array();

        $arr = array('id_tp_evento' => $dados['id_tp_evento'], 'descricao' => utf8_encode($dados['descricao']));
      
     
        echo json_encode($arr);
    }

    public function updateEventos()
    {
        //echo 'oi';
        //var_dump($_POST);
        //exit;

        $_POST['arrDadosForm']['descricao']=  utf8_decode($_POST['arrDadosForm']['descricao']);
        $result = $this->update($_POST['arrDadosForm']);
        
        if ($result == true) {
            $this->redirect(1, "eventos/inicioEventos");
        } else {
            $this->redirect(2, 'eventos/inicioEventos');
        }        
     
    }

    
}
    
$oEventos = new Eventos();
$classe = 'Eventos';
$oBjeto = $oEventos;
@include_once '../application/request.php';

?>