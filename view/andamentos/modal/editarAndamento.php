<?php
$nr_pro = $p1 . '/' . $p2;
?>
<div class="modal fade bs-modal-lg" id="editarAndamento" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >

            <div class="modal-header" align="center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Editar Andamentos do Processo : </b><span style="color:red" class="sbold"</span><?php echo $p1.'/'.$p2;?></span></h4>
            </div>

            <form role="form" name="form_login" method="POST" accept-charset="utf-8" action="<?php echo CONTROLLER . 'andamentos.php' ?>" >
                <input type="hidden" name="arrDadosForm[method]" value="editarAndamento">
                <input type="hidden" name="arrDadosForm[campo_where]" value="id_andamento">
                <input type="hidden" name="arrDadosForm[tabela]" value="andamentos">
                <input type="hidden" name="arrDadosForm[id]" value="" id="idEditar">
                <input type="hidden" name="arrDadosForm[nr_processo]" value="<?= $nr_pro ?>">
                <input type="hidden" name="arrDadosForm[dt_atualiz]"  value="<?php echo date('Y-m-d H:i:s'); ?>"/>
                <input type="hidden" name="arrDadosForm[str_login]" value="<?php echo $_SESSION ['LOGIN']['str_login'] ?>"/>
                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">

                                <div class="form-group col-md-6">
                                    <label style="text-align:left !important;" >TP Andamento<span class="required" aria-required="true">*</span></label>
                                    <select class="form-control" id="tpAndamentosEditar" name="arrDadosForm[id_tp_andamento]">
                                        <?php
                                        echo $oController->comboListar('tp_andamento', 'id_tp_andamento', 'descr_tp_andamento');
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Dt Inicial &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; Data Final <span class="required" aria-required="false">*</span></label>
                                    <div class="input-group  input-daterange " data-date-format="">
                                        <input type="date"  class="form-control" placeholder="Data Inicial" id="dt_inicioEditar" value="<?php echo date('Y-m-d'); ?>" name="arrDadosForm[dt_prz_ini]" required="">
                                        <span class="input-group-addon"> até </span>
                                        <input type="date" class="form-control" placeholder="Data Final" id="dt_finalEditar" name="arrDadosForm[dt_prz_fim]">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-12">
                                    <label style="text-align:left !important;" >Observação:<class="required" aria-required="false"></label>
                                    <textarea class="form-control" name="arrDadosForm[observacao]" id="observacaoEditar" type="text" ></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer form-actions" style="background:#F5F5F5; border-radius: 0 0 10px 10px;">
                        <button type="button" class="btn btn-default btn-circle" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success btn-circle">Atualizar</button>
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
