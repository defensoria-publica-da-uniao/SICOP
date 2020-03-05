<div class="modal fade bs-modal-lg" id="editarProcesso" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >

            <div class="modal-header" align="center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Editar Processo</b></h4>
            </div>

            <form role="form" name="form_login" method="POST" accept-charset="utf-8" action="<?php echo CONTROLLER . 'processo.php' ?>" >
                <input type="hidden" name="arrDadosForm[method]" value="alterarProcesso">
                <input type="hidden" name="arrDadosForm[tabela]" value="processos">
                <input type="hidden" name="arrDadosForm[campo_where]" value="nr_processo">
                <input type="hidden" name="arrDadosForm[id]" value="" id='nr_processoEdit'>

                <input type="hidden" name="arrDadosForm[dt_atualiz]"  value="<?php echo date('Y-m-d H:i:s'); ?>"/>
                <input type="hidden" name="arrDadosForm[str_login]" value="<?php echo $_SESSION ['LOGIN']['str_login'] ?>"/>


                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >Nº Processo<class="required" aria-required="false"></label>
                                    <input class="form-control" name="arrDadosForm[nr_processo]" id="processoEditar" type="text" maxlength="20">
                                </div>
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >Unidade<span class="required" aria-required="true">*</span></label>
                                    <select class="form-control" id="unidadeEditar" name="arrDadosForm[cod_unidade]">
                                        <?php
                                        echo $oController->comboListar('unidade', 'cod_unidade', 'desc_unidade');
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >Objeto<class="required" aria-required="false"></label>
                                    <input class="form-control" name="arrDadosForm[objeto]" id="objetoEditar" type="text" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >Repasse<class="required" aria-required="false"></label>
                                    <select class="form-control" id="repasseEditar" name="arrDadosForm[repasse]">
                                        <option></option>
                                        <option value="1">Sim </option>
                                        <option value="2">Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >Organização<class="required" aria-required="false"></label>
                                    <select class="form-control" id="organizacaoEditar" name="arrDadosForm[id_organizacao]">
                                        <?php
                                        echo $oController->comboListar('organizacao', 'id_organizacao', 'organizacao');
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Data da Vigência: <span class="required" aria-required="true">*</span></label>
                                    <div class="input-group  input-daterange " data-date-format="">
                                        <input type="date" class="form-control" placeholder="Data Inicial" id="dt_inicioEditar" value="<?php echo date('Y-m-d'); ?>" name="arrDadosForm[dt_ini_vigencia]" required="">
                                        <span class="input-group-addon"> até </span>
                                        <input type="date" class="form-control" placeholder="Data Final" id="dt_finalEditar" name="arrDadosForm[dt_fim_vigencia]" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
              
                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >Setor:<class="required" aria-required="false"></label>
                                    <select class="form-control" id="setorEditar" name="arrDadosForm[id_setor]">
                                        <?php
                                        echo $oController->comboListar('setor', 'id_setor', 'descricao');
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
<script type="text/javascript">
    $("#juntada, #processo").mask("00000.000000/0000-00");
</script>
