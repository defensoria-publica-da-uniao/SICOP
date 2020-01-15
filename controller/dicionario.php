<?php

@session_start();

//Substituir require_once por _SESSION['PATH'];

require_once $_SESSION['PATH'] . 'model/MDicionario.php';

//require_once '/dados/php56/desenvolvimento/SGAI/model/MDicionario.php';

class Dicionario extends MDicionario{

    function consultarVocabulos() {
        return $this->listarVocabulos();
    }

    function cadastrarVocabulos() {
        
       //var_dump($_POST);
       //exit;
        $vocabulo = $_POST['arrDadosForm'];
        
        $vocabulo['vocabulo'] = $vocabulo['vocabulo'];
 
        //var_dump($vocabulo);
        //exit;

        $insert = $this->insert($vocabulo);

        if ($insert == true) {
            $this->redirect(1, 'dicionario/inicioDicionario');
        } else {
            $this->redirect(2, 'dicionario/inicioDicionario');
        }
    }
    
    //apaga o registro de feriados
    function apagarVocabulo() {
        //var_dump($_POST);
        //exit;
        $vocabulos = $_POST['arrDadosForm'];
        $resultado = $this->delete($vocabulos);
        
        //var_dump($vocabulos);
        //exit;
        
        if ($resultado == true) {
            $this->redirect(1, "dicionario/inicioDicionario");
        } else {
            $this->redirect(2, 'dicionario/inicioDicionario');
        }
    }

    function editarVocabulo() {
        $id = $_POST['id_vocabulo'];
        
        $result = $this->listaDados('vocabulos',$id,"",'id_vocabulo');
        
        $dados = mssql_fetch_array($result);
        
        $arr=array();
        
        $arr=array('id_vocabulo'=>$dados['id_vocabulo'],'vocabulo'=>$dados['vocabulo']);
        
        echo json_encode($arr);
        
    }
    
    public function updateVocabulo(){
        //echo 'oi';
        //exit;
        
        $result = $this->update($_POST['arrDadosForm']);
        
         if ($result == true) {
            $this->redirect(1, "dicionario/inicioDicionario");
        } else {
            $this->redirect(2, 'dicionario/inicioDicionario');
        }
        
    }


}

   

$oDicionario = new Dicionario();
$classe = 'Dicionario';
$oBjeto = $oDicionario;
@include_once '../application/request.php';



?>