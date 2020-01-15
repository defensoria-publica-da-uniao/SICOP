<div class="modal fade bs-modal-lg" id="cadastrarLocalusuario" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >

            <div class="modal-header" align="center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Cadastrar o usuário na sua Lotação</b></h4>
            </div>

            <form role="form" name="form_login" method="POST" accept-charset="utf-8" action="<?php echo CONTROLLER . 'cadastrarLocalusuari.php' ?>" >
                <input type="hidden" name="arrDadosForm[method]" value="cadastrarLocalusuario">
                <input type="hidden" name="arrDadosForm[tabela]" value="setor_usuario">
                <input type="hidden" name="arrDadosForm[dt_atualiz]" value="<?php echo date('Y-m-d H:i:s') ?>"/>
                <input type="hidden" name="arrDadosForm[id_usuario]" value="<?php echo $_SESSION ['LOGIN']['id_usuario'] ?>">

                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div id="resultModal" class="fetched-data">
                                <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                    <div class="form-group col-md-6">
                                       <label style="text-align:left !important;" >Unidade <span class="required" aria-required="false">*</span></label>
                                       <select class="form-control" id="unid" name="arrDadosForm[cod_unidade]">
                                         <?php
                                           echo $oController->comboListar('unidade', 'cod_unidade', 'desc_unidade');
                                         ?>
                                       </select>
                                    </div>        
                                </div>
                            </div>
                        </div>
 
                    </div>
                    <div class="modal-footer form-actions" style="background:#F5F5F5; border-radius: 0 0 10px 10px;">
                        <button type="button" class="btn btn-default btn-circle" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success btn-circle">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

