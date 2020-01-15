<?php

@session_start();
//Substituir require_once por _SESSION['PATH'];

require_once $_SESSION['PATH'] . 'model/MTestorg.php';

class Testorg extends MTestorg {

    public function consultarTorganizacao() {
        return $this->listarTorganizacao();
    }

    public function cadastrarTestorg() {
        //var_dump($_POST);
        //exit;
        
        $descricao = $_POST['arrDadosForm'];

        $descricao['organizacao'] = utf8_decode($descricao['organizacao']);
        //$descricao['pais'] = utf8_decode(utf8_encode($descricao['pais']));
     
        //echo $descricao['organizacao'] = utf8_decode($descricao['organizacao']);
        //echo $descricao['pais'] = utf8_decode(utf8_encode($descricao['pais']));
  
        //var_dump($descricao);
        //exit;

        $insert = $this->insert($descricao);
     
        
        //=== verificar o comando sql
        //var_dump($this->sql);
        //exit;

        if ($insert == true) {
            $this->redirect(1, 'testorg/inicioTestorg');
        } else {
            $this->redirect(2, 'testorg/inicioTestorg');
        }
    }

    //Método para listar unidade(ajax de editar)
    function listEditorganiza() {
       //echo 'oi';
       //var_dump($_POST);
       //exit;
        $codigorecebe = $_POST["codigo"];
   
        $consulta = $this->listaDados('organizacao', $codigorecebe, '', 'id_organizacao');

        $resultado = mssql_fetch_array($consulta);
        
       //var_dump($resultado);
       //exit;

        $arrInfo = Array();

        $arrInfo['codigo'] = $resultado['id_organizacao'];
        $arrInfo['nome_org'] = utf8_encode($resultado['organizacao']);
        $arrInfo['email'] = $resultado['e_mail'];
        $arrInfo['site'] = $resultado['site_org'];
        $arrInfo['fones'] = $resultado['telefones'];
        $arrInfo['paises'] = $resultado['cod_pais'];

        echo json_encode($arrInfo);
    }

    
    public function editarTestorg() {

        $id = $_POST['id_organizacao'];

        //var_dump($_POST);
        //exit;

        $result = $this->listaDados('organizacao', $id, "", 'id_organizacao');

        $dados = mssql_fetch_array($result);

        $arr = array();

        $arr = array('id_organizacao' => $dados['id_organizacao'], 'organizacao' => $dados['organizacao'], 'email' => $dados['e_mail'], 'site_org' => $dados['site_org'], 'telefones' => $dados['telefones'], 'pais' => $dados['pais']);

        echo json_encode($arr);
    }

    //apaga o registro de organização
    public function apagarTestorg() {
        //var_dump($_POST);
        //exit;
        $dados = $_POST['arrDadosForm'];
        //var_dump($dados);
        //exit;

        $resultado = $this->delete($dados);

        if ($resultado == true) {
            $this->redirect(1, "testorg/inicioTestorg");
      } else {
            $this->redirect(2, 'testorg/inicioTestorg');
      }
    }

    public function updateTestorg() {
        //echo 'oi';
        //var_dump($_POST);
        //exit;
        $_POST['arrDadosForm']['organizacao']=  utf8_decode($_POST['arrDadosForm']['organizacao']);
        $_POST['arrDadosForm']['pais']=  utf8_decode($_POST['arrDadosForm']['pais']);
        $result = $this->update($_POST['arrDadosForm']);
        //var_dump($_POST);
        //exit;
    

        if ($result == true) {
            $this->redirect(1, "testorg/inicioTestorg");
        } else {
            $this->redirect(2, 'testorg/inicioTestorg');
        }
    }
    
    
}

$oTestorg = new Testorg();
$classe = 'Testorg';
$oBjeto = $oTestorg;
@include_once '../application/request.php';
?>