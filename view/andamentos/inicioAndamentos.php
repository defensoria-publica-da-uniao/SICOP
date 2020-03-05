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

                    <span class="caption-subject sbold uppercase">Listagem de Andamentos do Processo : </span> <span style="color:red" class="sbold"</span><?php echo $p1 . '/' . $p2; ?></span>
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
                            <th style="width: 30% !important; "class="text-left">Andamento</th>
                            <th class="text-center">Dt Inicial</th>
                            <th class="text-center">Dt Final</th>
                            <th style="width: 50% !important;" class="text-left">Observação</th>
                            <th class="text-center">Pendência</th>
                            <th>Atualização</th>
                            <th>Usuário</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $num_pro = $p1 . "/" . $p2;

                        $resultAndamentos = $oAndamentos->listaAndamentos($num_pro);
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
                                            if ($andamentos["pendencia"] == 'N') { #Desativado
                                                $classIcon = 'fa fa-remove';
                                                $msgAcao = 'Eliminar Pendencia?';
                                                $corBtn = 'btn btn-danger hidden';
                                            } else { // Ativado
                                                $classIcon = 'fa fa-remove';
                                                $msgAcao = 'Eliminar Pendencia?';
                                                $corBtn = 'btn btn-danger';
                                            }
                                            ?>
                                            <form  action="<?php echo CONTROLLER . 'andamentos.php'; ?>" method="POST">
                                                <input type="hidden"  name="arrDadosForm[method]" value="alteraPendencia">
                                                <input type="hidden"  name="arrDadosForm[id_andamento]" value="<?= $andamentos['id_andamento'] ?>">
                                                <input type="hidden" name="nr_processo" value="<?=$num_pro;?>">
                                                <button type="submit" id="mudarPend" class="<?php echo $corBtn; ?> btn-xs mod" data-toggle="confirmation" data-original-title="<?php echo $msgAcao; ?>">
                                                    <i class="<?php echo $classIcon; ?>"></i>
                                                </button>
 
                                                <!-- <button type="submit" class="btn btn-danger btn-xs" data-toggle="confirmation" data-original-title="Excluir Andamento?" aria-describedby="confirmation">
                                                    <i class="glyphicon glyphicon-remove"></i>
                                                </button>
                                                
                                                <a href="<?php echo RAIZ . "coordenador/editorTexto/" . $arAssunto['cod_unidade'] . "/" . $arAssunto['id_assunto']; ?>" class="btn btn-primary btn-xs popovers" data-container="body" data-trigger="hover" data-placement="top" data-content="" data-original-title="Editar">
                                                    <i class="glyphicon glyphicon-align-left"></i>
                                                </a>
                                                -->
                                            </form>
                                        </div>

                                    </div>
                                </td>
                                <td><?= utf8_encode($andamentos['descr_tp_andamento']) ?></td>
                                <td><?= $andamentos['dt_prz_ini'] ?></td>
                                <td><?= $andamentos['dt_prz_fim'] ?></td>
                                <td><?= utf8_encode($andamentos['observacao']) ?></td>
                                <td><?= $andamentos['pendencia'] == 'S' ? 'Sim' : 'Não'; ?></td>
                                <td><?= $andamentos['dt_atualiz']; ?></td>
                                <td><?= $andamentos['str_login']; ?></td>
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
    $(document).ready(function () {
        $('#editarAndamento').on('show.bs.modal', function (e) {
            var nr_andamento = $(e.relatedTarget).data('doc');
            $.ajax({
                type: 'POST',
                data: 'nr_andamento=' + nr_andamento + '&method=listEditAndamento&acao=ajax',
                url: '<?php echo CONTROLLER; ?>andamentos.php',
                success: function (data) {
                    var response = $.parseJSON(data);

                    $("#tpAndamentosEditar").val(response.id_tp_andamento);
                    $("#dt_inicioEditar").val(response.dt_prz_ini);
                    $("#dt_finalEditar").val(response.dt_prz_fim);
                    $("#observacaoEditar").val(response.observacao);
                    $("#idEditar").val(response.id_andamento);
                }
            });
        });
    });
</script>

<script>
    function mudarPendencia(id_andamento) {
        var andamento = id_andamento;
        $.ajax({
            type: 'POST',
            data: 'andamento=' + andamento + '&method=alteraPendencia&acao=ajax',
            url: '<?php echo CONTROLLER; ?>andamentos.php',
            success: function (dados) {
                //alert(dados);
            }
        });
        return false;
    }
</script>
<!-- 

//Troca de Pendencia via ajax
  <form onsubmit="return mudarPendencia(<?= $andamentos['id_andamento'] ?>)" action="<?php echo CONTROLLER . 'andamentos.php'; ?>" method="POST">
                                                <button type="submit" id="mudarPend" class="<?php echo $corBtn; ?> btn-xs mod" data-toggle="confirmation" data-original-title="<?php echo $msgAcao; ?>">
                                                    <i class="<?php echo $classIcon; ?>"></i>
                                                </button>
                                            </form>



-->
