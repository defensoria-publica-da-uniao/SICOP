<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];
require_once $_SESSION['PATH'] . 'model/MContatos.php';

class Contatos extends MContatos {

    public function consultarContatos() {
        return $this->listarContatos();
    }

    
    public function cadastrarContatos() {
        
        //var_dump($_POST);
        //exit;
        
        $descricao = $_POST['arrDadosForm'];
        $descricao['descr_contato'] = utf8_decode($descricao['descr_contato']);

        //var_dump($descricao);
        //exit;

        $insert = $this->insert($descricao);
        
        //var_dump($this->sql);
        //exit;

        if ($insert == true) {
            $this->redirect(1, 'contatos/inicioContatos');
        } else {
            $this->redirect(2, 'contatos/inicioContatos');
        }
    }
    //apaga o registro de feriados
    public function apagarContatos() {
        //var_dump($_POST);
        //exit;
        $dados = $_POST['arrDadosForm'];
        $resultado = $this->delete($dados);

        //var_dump($vocabulos);
        //exit;

        if ($resultado == true) {
            $this->redirect(1, "contatos/inicioContatos");
        } else {
            $this->redirect(2, 'contatos/inicioContatos');
        }
    }
    public function editarContatos() {
 
        $id = $_POST['id_contato'];

        $result = $this->listaDados('contatos', $id, "", 'id_contato');

        $dados = mssql_fetch_array($result);

        $arr = array();

        $arr = array('id_contato' => $dados['id_contato'], 'descr_contato' => $dados['descr_contato'], 'cargo' => $dados['cargo'], 'email' => $dados['e_mail'], 'telfones' => $dados['telefones'], 'cod_organizacao' => $dados['id_organizacao']);

    
        echo json_encode($arr);

    }
    
    //Método para listar unidade(ajax de editar)
    public function listEditcontato() {
        //echo 'oi';
        //var_dump($_POST);
        //exit;
        $codigorecebe = $_POST["codigo"];
   
        $consulta = $this->listaDados('contatos', $codigorecebe, '', 'id_contato');

        $resultado = mssql_fetch_array($consulta);
        
       //var_dump($resultado);
       //exit;

        $arrInfo = Array();

        $arrInfo['codigo'] = $resultado['id_contato'];
        $arrInfo['nome_contato'] = utf8_encode($resultado['descr_contato']);
        $arrInfo['email'] = $resultado['e_mail'];
        $arrInfo['cargo'] = $resultado['cargo'];
        $arrInfo['fones'] = $resultado['telefones'];
        $arrInfo['cod_organizacao'] = $resultado['id_organizacao'];

        echo json_encode($arrInfo);
    }


    public function updateContatos() {
        
        //echo 'oi';
        //var_dump($_POST);
        //exit;

        $_POST['arrDadosForm']['descr_contato']=  utf8_decode($_POST['arrDadosForm']['descr_contato']);
        $result = $this->update($_POST['arrDadosForm']);

        //var_dump($this->sql);
        //exit;
        
        if ($result == true) {
            $this->redirect(1, "contatos/inicioContatos");
        } else {
            $this->redirect(2, 'contatos/inicioContatos');
        }
    }
    

    
    }
    $oContatos = new Contatos();
    $classe = 'Contatos';
    $oBjeto = $oContatos;
    @include_once '../application/request.php';

?>