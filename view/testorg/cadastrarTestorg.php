<div class="modal fade bs-modal-lg" id="cadastrarTestorg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >

            <div class="modal-header" align="center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Cadastrar Organizações</b></h4>
            </div>

            <form role="form" name="form_login" method="POST" accept-charset="utf-8" action="<?php echo CONTROLLER . 'testorg.php' ?>" >
                <input type="hidden" name="arrDadosForm[method]" value="cadastrarTestorg">
                <input type="hidden" name="arrDadosForm[tabela]" value="organizacao">

                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >Organização<span class="required" aria-required="true">*</span></label>
                                    <input class="form-control" name="arrDadosForm[organizacao]" id="organizacao" type="text" required="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Paises<span class="required" aria-required="true">*</span></label>
                                    <select class="form-control" id="paises" name="arrDadosForm[cod_pais]">

                                        <?php
                                        echo $oController->comboListar('paises', 'id_paises', 'descricao');
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >EMail<class="required" aria-required="true"></label>
                                    <input class="form-control" name="arrDadosForm[e_mail]" id="e_mail" type="text" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >Site<class="required" aria-required="true"></label>
                                    <input class="form-control" name="arrDadosForm[site_org]" id="site_org" type="text" >
                                </div>
                            </div>
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >Telefones <class="required" aria-required="true"></label>
                                    <input class="form-control" name="arrDadosForm[telefones]" id="telefones" type="text" >
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

<script type="text/javascript">
    $("#telefone, #celular").mask("(00) 0000-0000");
</script>


