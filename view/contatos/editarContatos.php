<div class="modal fade bs-modal-lg" id="editarContatos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-header" align="center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Editar Contatos</b></h4>
            </div>

            <form role="form" name="form_login" method="POST" accept-charset="utf-8" action="<?php echo CONTROLLER . 'contatos.php' ?>">
                <input type="hidden" name="arrDadosForm[method]" value="updateContatos">
                <input type="hidden" name="arrDadosForm[tabela]" value="contatos" />
                <input type="hidden" name="arrDadosForm[campo_where]" value="id_contato">
                <input type="hidden" name="arrDadosForm[dt_atualiz]"  value="<?php echo date('Y-m-d H:i:s') ?>"/>
                <input type="hidden" name="arrDadosForm[id_usuario]" value="<?php echo $_SESSION ['LOGIN']['id_usuario'] ?>">
                <input type="hidden" id="codigo" name="arrDadosForm[id]" value="">

                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-12">
                                    <label style="text-align:left !important;" >Descrição<span class="required" aria-required="true">*</span></label>
                                    <input class="form-control" type="text" name="arrDadosForm[descr_contato]" id="contato" required="">
                                </div>
                            </div>
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >Cargo<class="required" aria-required="true"></label>
                                    <input class="form-control" name="arrDadosForm[cargo]" id="cargo2" type="text" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >E_Mail<class="required" aria-required="true"></label>
                                    <input class="form-control" name="arrDadosForm[e_mail]" id="email" type="text">
                                </div>
                            </div>
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >Telefones <class="required" aria-required="true"></label>
                                    <input class="form-control" name="arrDadosForm[telefones]" id="telfones" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >Organização <class="required" aria-required="true"</label>
                                    <select class="form-control" name="arrDadosForm[id_organizacao]" id="alterarorganizacao">
                                      <?php
                                        echo $oController->comboListar('organizacao', 'id_organizacao', 'organizacao');
                                       ?>
                                    </select>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="background:#F5F5F5; border-radius: 0 0 10px 10px;">
                    <button type="button" class="btn btn-default btn-circle" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success btn-circle">Alterar cadastro</button>
                </div>
            </form>

        </div>
    </div>
</div>

