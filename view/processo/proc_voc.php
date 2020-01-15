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
            <a href="<?php echo RAIZ . "inicio/inicio"; ?>">Página Início</a>
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

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <!-- ALERTAS -->
        <?php require HELPER . "mensagem.php"; ?>
        <!-- FIM ALERTAS -->
        <div class="portlet light ">

            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list "></i>
                    <span class="caption-subject sbold uppercase">Processo: <?= $p1 . '/' . $p2; ?></span>
                </div>

                <div class="actions">

                    <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target='#indexVoc' class="btn dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user-plus"></i>Indexar
                    </button>

                </div>
            </div>
            <div class="portlet-body">

                <table class="table table-striped table-bordered table-hover dt-responsive" id="sample_5">
                    <thead>
                        <tr>
                            <th>Ação</th>
                            <th>Vocabulo</th>
                            <th>Data Inclusão</th>
                            <th>Responsável</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $processo = $p1 . "/" . $p2;
                        $listVocabulos = $oProcesso->listaProcessosVocabulos($processo);

                        while ($vocabulos = mssql_fetch_array($listVocabulos)) {
                            ?>
                            <tr>

                                <td>
                                    <div class="btn-toolbar" style="margin-left:0px !important;">

                                        <div style="float: right !important;"  > <!-- class="btn-group"  -->
                                            <?php
                                            $classIcon = 'fa fa-remove';
                                            $msgAcao = 'Remover Vocabulo?';
                                            $corBtn = 'btn btn-danger';
                                            ?>
                                            <form action="<?php echo CONTROLLER . 'processo.php'; ?>" method="POST">
                                                <button type="submit" class="<?php echo $corBtn; ?> btn-xs mod" data-toggle="confirmation" data-original-title="<?php echo $msgAcao; ?>">
                                                    <input type='hidden' name='arrDadosForm[id]' value="<?= $vocabulos['id_vocabulo'] ?>" />
                                                    <input type="hidden" name="arrDadosForm[tabela]" value="proc_vocabulos" />
                                                    <input type="hidden" name="arrDadosForm[nr_processo]" value="<?= $p1 . "/" . $p2 ?>">
                                                    <input type="hidden" name="arrDadosForm[campo_where]" value="id_vocabulo" />
                                                    <input type="hidden" name="arrDadosForm[method]" value="removerVocabulo" />
                                                    <i class="<?php echo $classIcon; ?>"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <td><?= $vocabulos['vocabulo'] ?></td>
                                <td><?= $oController->dataPt($vocabulos['dt_atualiz']) ?></td>
                                <td><?= $vocabulos['str_login'] ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include 'modal/IndexVocabulo.php';
?>



