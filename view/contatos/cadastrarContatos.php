<div class="modal fade bs-modal-lg" id="cadastrarContatos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >

            <div class="modal-header" align="center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Cadastrar Contatos</b></h4>
            </div>

            <form role="form" name="form_login" method="POST" accept-charset="utf-8" action="<?php echo CONTROLLER . 'contatos.php' ?>" >
                <input type="hidden" name="arrDadosForm[method]" value="cadastrarContatos">
                <input type="hidden" name="arrDadosForm[tabela]" value="contatos">
                <input type="hidden" name="arrDadosForm[dt_atualiz]"  value="<?php echo date('Y-m-d H:i:s') ?>"/>
                <input type="hidden" name="arrDadosForm[str_login]" value="<?php echo $_SESSION ['LOGIN']['str_login'] ?>">

                <div class="modal-body">
                    <div class="panel panel-default">
                       <div class="panel-body">
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-12">
                                    <label style="text-align:left !important;" >Nome
                                        <span class="required" aria-required="true">*</span></label>
                                    <input class="form-control" name="arrDadosForm[descr_contato]" id="descr_contato" type="text" required="">
                                </div>
                            </div>
                           
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >Cargo<class="required" aria-required="false"></label>
                                    <input class="form-control" name="arrDadosForm[cargo]" id="cargo" type="text" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >E_Mail<class="required" aria-required="false"></label>
                                    <input class="form-control" name="arrDadosForm[e_mail]" id="e_mail" type="text" >
                                </div>
                            </div>    
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >Telefones <class="required" aria-required="false"></label>
                                    <input class="form-control" name="arrDadosForm[telefones]" id="telefones" type="text" >
                                </div>        
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >Organização <span class="required" aria-required="false">*</span></label>
                                    <select class="form-control" id="organiza" name="arrDadosForm[id_organizacao]">
                                      <?php
                                        echo $oController->comboListar('organizacao', 'id_organizacao', 'organizacao');
                                       ?>
                                    </select>
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

