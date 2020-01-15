<div class="modal fade bs-modal-lg" id="editarGrupostrab" tabindex="-2" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >
            <div class="modal-header" align="center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Editar Grupo de Trabalho</b></h4>
            </div>

            <form role="form" name="form_login" method="POST" accept-charset="utf-8" action="<?php echo CONTROLLER . 'grupostrab.php' ?>">
                <input type="hidden" name="arrDadosForm[method]" value="updateGrupostrab">
                <input type="hidden" name="arrDadosForm[tabela]" value="grupo_trab" />
                <input type="hidden" name="arrDadosForm[campo_where]" value="id_grup_trab">
                <input type="hidden" name="arrDadosForm[dt_atualiz]"  value="<?php echo date('Y-m-d H:i:s') ?>"/>
                <input type="hidden" name="arrDadosForm[id_usuario]" value="<?php echo $_SESSION ['LOGIN']['id_usuario'] ?>">
                <input type="hidden" id="codigo" name="arrDadosForm[id]" value="">
               <div class="modal-body">
                    <div class="panel panel-default">
                         <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                             <div class="form-group col-md-12">
                                 <label style="text-align:left !important;" >Descrição<span class="required" aria-required="true">*</span></label>
                                 <input class="form-control" type="text" name="arrDadosForm[descricao]" id="descr_gruptrab" required="">
                             </div>
                         </div>
                         <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                             <div class="form-group col-md-6">
                                <label style="text-align:left !important;" >Publico Alvo<class="required" aria-required="true"></label>
                                <input class="form-control" name="arrDadosForm[nr_publico]" id="publicoalvo" type="text" >
                            </div>
                            <div class="form-group col-md-4">
                                 <label style="text-align:left !important;" >Data do Evento<class="required" aria-required="false"></label>
                                 <div class="input-group  input-daterange " data-date-format="">
                                    <input type="date" class="form-control" placeholder="Data Evento" id="datadoevento" value="<?php echo date('Y-m-d'); ?>" name="arrDadosForm[dt_evento]" required="">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label style="text-align:left !important;" >Evento <class="required" aria-required="true"</label>
                                <select class="form-control" name="arrDadosForm[id_tp_evento]" id="tipoevento">
                                  <?php
                                    echo $oController->comboListar('tp_evento', 'id_tp_evento', 'descricao');
                                   ?>
                                </select>
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



