<div class="modal fade bs-modal-lg" id="indexVoc" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" >

            <div class="modal-header" align="center">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title"><b>Indexar Vocabulo</b></h4>
            </div>

            <form role="form" name="form_login" method="POST" accept-charset="utf-8" action="<?php echo CONTROLLER . 'processo.php' ?>" >
                <input type="hidden" name="arrDadosForm[method]" value="indexarProcVoc">
                <input type="hidden" name="arrDadosForm[tabela]" value="proc_vocabulos">

                <input type="hidden" name="arrDadosForm[nr_processo]" value="<?= $p1 . "/" . $p2 ?>">
                <input type="hidden" name="arrDadosForm[dt_atualiz]"  value="<?php echo date('Y-m-d H:i:s'); ?>"/>
                <input type="hidden" name="arrDadosForm[id_usuario]" value="<?php echo $_SESSION ['LOGIN']['id_usuario'] ?>"/>
                <div class="modal-body">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row" style="margin-left: -0px !important; margin-right: -0px !important;">
                                <div class="form-group col-md-12">
                                    <label style="text-align:left !important;" >Vocabulo<class="required" aria-required="false"></label>
                                    <select class="form-control" id="paises" name="arrDadosForm[id_vocabulo]">
                                        <?php
                                        echo $oController->comboListar('vocabulos', 'id_vocabulo', 'vocabulo');
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
