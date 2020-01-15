<div class="modal fade bs-modal-lg" id="cadastrarGrupostrab" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >

            <div class="modal-header" align="center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Cadastrar Grupos de Trabalho</b></h4>
            </div>

            <form role="form" name="form_login" method="POST" accept-charset="utf-8" action="<?php echo CONTROLLER . 'grupostrab.php' ?>" >
                <input type="hidden" name="arrDadosForm[method]" value="cadastrarGrupostrab">
                <input type="hidden" name="arrDadosForm[tabela]" value="grupo_trab">
                <input type="hidden" name="arrDadosForm[dt_atualiz]"  value="<?php echo date('Y-m-d H:i:s') ?>"/>
                <input type="hidden" name="arrDadosForm[id_usuario]" value="<?php echo $_SESSION ['LOGIN']['id_usuario'] ?>">


                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-12">
                                    <label style="text-align:left !important;" >Descrição Grupo de Trabalho<span class="required" aria-required="true">*</span></label>
                                    <input class="form-control" name="arrDadosForm[descricao]" id="descricao" type="text" required="">
                                </div>
                            </div>
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-12">
                                    <label style="text-align:left !important;" >Tipo do Evento <span class="required" aria-required="false">*</span></label>
                                    <select class="form-control" id="organiza" name="arrDadosForm[id_tp_evento]">
                                        <?php
                                        echo $oController->comboListar('tp_evento', 'id_tp_evento', 'descricao');
                                     ?>
                                   </select>
                                </div> 
                            </div>   
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-4">
                                    <label style="text-align:left !important;" >Público Alvo<class="required" aria-required="false"></label>
                                    <input class="form-control" name="arrDadosForm[nr_publico]" id="nr_publico" type="text" >
                                </div>
                                <div class="form-group col-md-4">
                                    <label style="text-align:left !important;" >Data do Evento<class="required" aria-required="false"></label>
                                    <div class="input-group  input-daterange " data-date-format="">
                                    <input type="date" class="form-control" placeholder="Data Evento" id="dt_evento" value="<?php echo date('Y-m-d'); ?>" name="arrDadosForm[dt_evento]" required="">
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
</div>
