<!-- TÍTULO E DIRETÓRIO DE NAVEGAÇÃO -->
<h1 class="page-title">
    Andamentos <small>Controle de Andamentos</small>
</h1>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <span>Home</span>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo RAIZ . "inicio/inicio"; ?>">Página Início</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Controle de Andamentos</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <a onclick="window.history.go(-1)" class="btn btn-fit-height grey-salt dropdown-toggle"><i class="fa fa-reply"></i> Voltar </a>
        </div>
    </div>
</div>
<!-- FIM TÍTULO E DIRETÓRIO DE NAVEGAÇÃO -->

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <!-- ALERTAS -->
        <?php require HELPER . "mensagem.php"; ?>
        <!-- FIM ALERTAS -->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list "></i>
                    <span class="caption-subject sbold uppercase">Andamentos do Processo: <?= $p1 . '/' . $p2 ?> </span>
                </div>
                <div class="actions">
                    <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target='#cadastroAndamento' class="btn dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user-plus"></i>Novo Andamento
                    </button>

                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="sample_5">
                    <thead>
                        <tr>
                            <th class="text-center">Ação</th>
                            <th class="text-center">id_tp_andamento</th>
                            <th class="text-center">dt_prz_ini</th>
                            <th class="text-center">dt_prz_fim</th>
                            <th style="width: 50% !important;" class="text-center">Observação</th>
                            <th class="text-center">Pendencia</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $num_pro = $p1 . "/" . $p2;


                        $resultAndamentos = $oAndamentos->listaAndamntos($num_pro);
                        while ($andamentos = mssql_fetch_array($resultAndamentos)) {
                            ?>
                            <tr>
                                <td>
                                    <div class="btn-toolbar" style="margin-left:0px !important;">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-xs btn-default blue-madison mod popovers" data-toggle="modal" data-doc="<?php echo $andamentos['id_andamento']; ?>" data-target='#editarAndamento' data-container="body" data-trigger="hover" data-placement="top" data-content="" data-original-title="Editar">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>

                                        <div style="float: right !important;" > <!-- class="btn-group"  -->
                                            <?php
                                            if ($andamentos["pendencia"] == 'n') { #Desativado
                                                $classIcon = 'fa fa-remove';
                                                $msgAcao = 'Eliminar Pendencia?';
                                                $corBtn = 'btn btn-danger hidden';
                                            } else { // Ativado
                                                $classIcon = 'fa fa-remove';
                                                $msgAcao = 'Eliminar Pendencia?';
                                                $corBtn = 'btn btn-danger';
                                            }
                                            ?>
                                            <form onsubmit="return mudarPendencia(<?= $andamentos['id_andamento'] ?>, <?= "'$num_pro'" ?>)" action="<?php echo CONTROLLER . 'andamentos.php'; ?>" method="POST">
                                                <button type="submit" id="mudarPend<?= $andamentos['id_andamento'] ?>" class="<?php echo $corBtn; ?> btn-xs mod" data-toggle="confirmation" data-original-title="<?php echo $msgAcao; ?>">
                                                    <i class="<?php echo $classIcon; ?>"></i>
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </td>
                                <td><?= $andamentos['id_tp_andamento'] ?></td>
                                <td><?= $andamentos['dt_prz_ini'] ?></td>
                                <td><?= $andamentos['dt_prz_fim'] ?></td>
                                <td><?= $andamentos['observacao'] ?></td>
                                <td id="pend<?= $andamentos['id_andamento'] ?>"><?= $andamentos['pendencia'] == 's' ? "<span style='color:red;font-weight:bold;'>Sim</span>" : "<span style='color:green;font-weight:bold;'>Não</span>"; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php
include 'modal/cadastroAndamento.php';
include 'modal/editarAndamento.php';
?>

<script>
    $(document).ready(function() {
        $('#editarAndamento').on('show.bs.modal', function(e) {
            var nr_andamento = $(e.relatedTarget).data('doc');
            $.ajax({
                type: 'POST',
                data: 'nr_andamento=' + nr_andamento + '&method=listEditAndamento&acao=ajax',
                url: '<?php echo CONTROLLER; ?>andamentos.php',
                success: function(data) {
                    var response = $.parseJSON(data);

                    $("#tpAndamentosEditar").val(response.id_tp_andamento);
                    $("#dt_inicioEditar").val(response.dt_prz_fim);
                    $("#pendencia").val(response.pendencia);
                    $("#dt_finalEditar").val(response.dt_prz_ini);
                    $("#observacaoEditar").val(response.observacao);
                    $("#idEditar").val(response.id_andamento);
                }
            });
        });
    });
</script>

<script>
    function mudarPendencia(id_andamento, nr_pro) {
        var processo = nr_pro;
        var andamento = id_andamento;
        var pendencia = '#pend' + id_andamento;
        var botaoPend = '#mudarPend' + id_andamento;
        $.ajax({
            type: 'POST',
            data: 'andamento=' + andamento + '&nr_processo=' + processo + '&method=alteraPendencia&acao=ajax',
            url: '<?php echo CONTROLLER; ?>andamentos.php',

            success: function() {
                $(pendencia).html('Não');

                $(botaoPend).addClass('hidden');
            }
        });
        return false;
    }
</script>
