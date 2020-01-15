<!-- TÍTULO E DIRETÓRIO DE NAVEGAÇÃO -->

<h1 class="page-title">
    Processos <small>Controle de Processos</small>
</h1>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <span>Home</span>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Controle de Processos</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <a onclick="window.history.go(-1)" class="btn btn-fit-height grey-salt dropdown-toggle"><i class="fa fa-reply"></i> Voltar </a>
        </div>
    </div>
</div>
<!-- FIM TÍTULO E DIRETÓRIO DE NAVEGAÇÃO -->
<div class="portlet light ">

    <div class="portlet-title">
        <form action="<?php echo CONTROLLER . 'processo.php'; ?>" method="POST">
            <div class="form-group col-md-11">

                <input type="hidden" name="arrDadosForm[method]" value="guardarVocabulos">
                <select class="form-control" id="select2" multiple="multiple" name="arrDadosForm[vocabulos][]"  >
                    <?php
                    echo $oController->comboListarArray('vocabulos', 'id_vocabulo', 'vocabulo', @$_SESSION['vocabulos']);
                    ?>
                </select>
            </div>
            <div class=" col-md-1">
                <button class="btn btn-primary">Filtrar</button>
            </div>
        </form>

    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <!-- ALERTAS -->
        <?php require HELPER . "mensagem.php"; ?>
        <!-- FIM ALERTAS -->
        <div class="portlet light ">

            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list "></i>
                    <span class="caption-subject sbold uppercase">Controle de Processos</span>
                </div>

                <div class="actions">

                    <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target='#cadastroProcesso' class="btn dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user-plus"></i>Novo Pocesso
                    </button>

                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_5">
                    <thead>
                        <tr>
                            <th class="text-center">Ação</th>
                            <th style="width: 20% !important; ">Nº Processo</th>
                            <th style="width: 80% !important;">Objeto</th>
                            <th>Vigencia</th>
                            <th>Unidade</th>
                            <th>Repasse</th>
                            <th>Organização</th>
                            <th>Juntada</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $resultProcessos = $oProcesso->listaProcess(@$_SESSION['vocabulos']);

                        while ($processos = mssql_fetch_array($resultProcessos)) {
                            ?>

                            <tr>
                                <td >
                                    <div class="btn-toolbar" style="margin-left:0px !important;">
                                        <div class="btn-group">
                                            <button id="btnGroupVerticalDrop5" type="button" class="btn btn-xs btn-default blue-madison mod popovers dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="btnGroupVerticalDrop5">
                                                <li>
                                                    <a  data-toggle="modal" data-doc="<?php echo $processos['nr_processo']; ?>" data-target='#editarProcesso' data-container="body" data-trigger="hover" data-placement="top" data-content="" data-original-title="Editar"> Editar </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo RAIZ . "andamentos/inicioAndamentos/" . $processos['nr_processo']; ?>"> Andamentos </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo RAIZ . "processo/proc_voc/" . $processos['nr_processo']; ?>"> Indexar Vocábulos </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo RAIZ . "processo/acompanhamento/" . $processos['nr_processo']; ?>"> Acompanhamento </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div style="float: right !important;"  > <!-- class="btn-group"  -->
                                            <?php
                                            if ($processos["status"] == '2') { #Desativado
                                                $classIcon = 'fa fa-remove';
                                                $msgAcao = 'Ativar Prcesso?';
                                                $corBtn = 'btn btn-danger';
                                            } else { // Ativado
                                                $classIcon = 'fa fa-check-square';
                                                $msgAcao = 'Desativar Processo?';
                                                $corBtn = 'btn btn-success';
                                            }
                                            ?>
                                            <form action="<?php echo CONTROLLER . 'processo.php'; ?>" method="POST">
                                                <button type="submit" class="<?php echo $corBtn; ?> btn-xs mod" data-toggle="confirmation" data-original-title="<?php echo $msgAcao; ?>">
                                                    <input type='hidden' name='arrDadosForm[status]' value="<?php echo $processos["status"]; ?>" />
                                                    <input type='hidden' name='arrDadosForm[id]' value="<?php echo $processos['nr_processo']; ?>" />
                                                    <input type="hidden" name="arrDadosForm[tabela]" value="processos" />
                                                    <input type="hidden" name="arrDadosForm[campo_where]" value="nr_processo" />
                                                    <input type="hidden" name="arrDadosForm[method]" value="desativarProcesso" />
                                                    <i class="<?php echo $classIcon; ?>"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td <?= $processos['status'] == 2 ? "style='color:red;font-weight:bold'" : ''; ?>><?= utf8_encode($processos['nr_processo']) ?></td>
                                <td><?= $processos['objeto'] ?></td>
                                <td> <?= $oController->dataPt($processos['dt_ini_vigencia']); ?> á
                                    <br/>
                                    <?= $oController->dataPt($processos['dt_fim_vigencia']); ?>
                                </td>
                                <td><?= utf8_encode($processos['cod_unidade']) ?></td>
                                <td><?= $processos['repasse'] == 1 ? "Sim" : "Não"; ?></td>
                                <td><?= utf8_encode($processos['organizacao']) ?></td>
                                <td><?= $processos['juntada'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php
include 'modal/cadastroProcesso.php';
include 'modal/editarProcesso.php';
?>

<script>
    $(document).ready(function() {
        $('#editarProcesso').on('show.bs.modal', function(e) {
            var nr_processo = $(e.relatedTarget).data('doc');
            console.log(nr_processo);
            $.ajax({
                type: 'POST',
                data: 'nr_processo=' + nr_processo + '&method=listAlteraProcesso&acao=ajax',
                url: '<?php echo CONTROLLER; ?>processo.php',
                success: function(data) {
                    var response = $.parseJSON(data);

                    $("#nr_processoEdit").val(response.nr_processo);

                    $("#processoEditar").val(response.nr_processo);
                    $("#unidadeEditar").val(response.cod_unidade);
                    $("#objetoEditar").val(response.objeto);
                    $("#repasseEditar").val(response.repasse);
                    $("#organizacaoEditar").val(response.id_organizacao);
                    $("#dt_inicioEditar").val(response.dt_fim_vigencia);
                    $("#dt_finalEditar").val(response.dt_ini_vigencia);
                    $("#juntadaEditar").val(response.juntada);
                    $("#repasseEditar").val(response.repasse);
                    $("#setorEditar").val(response.id_setor);
                }
            });
        });
    });
</script>



