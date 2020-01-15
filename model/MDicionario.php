<?php
    @session_start();
    //Substituir require_once por _SESSION['PATH'];
    require_once $_SESSION['PATH'] . 'controller/controller.php';
    class MDicionario extends controller{

    function listarVocabulos() {
        $this->sql = " Select v.*, u.str_login from vocabulos as v "
              . " inner join gr_usuario as U on v.id_usuario = u.id_usuario ";
        
        return $this->query();
    }

  

}

?>       