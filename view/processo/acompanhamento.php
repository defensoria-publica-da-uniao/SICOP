<?php
$processo = $p1 . "/" . $p2;
$resultConsulta = $oProcesso->listaProcessos($processo);
$dadosProcesso = mssql_fetch_array($resultConsulta);
?>

<!-- TÍTULO E DIRETÓRIO DE NAVEGAÇÃO -->
<h1 class="page-title">
    Exibição do processo
</h1>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <span>Home</span>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo RAIZ . "inicio/home"; ?>">Página Início</a>
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
    <div class="col-lg-12 col-xs-12 col-sm-12">
        <div class="portlet light ">
            <div class="portlet-body">
                <div class="table-responsive">
                    <div class="form-group col-md-3">
                        <label>Precesso: </label>
                        <input type="text" class="form-control" disabled="" value="<?= $dadosProcesso['nr_processo'] ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Unidade: </label>
                        <input type="text" class="form-control" disabled="" value="<?= utf8_encode($dadosProcesso['desc_unidade']) ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Remessa: </label>
                        <input type="text" class="form-control" disabled="" value="<?= utf8_encode($dadosProcesso['repasse']) == 1 ? "SIM" : "NÃO"; ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Organização: </label>
                        <input type="text" class="form-control" disabled="" value="<?= utf8_encode($dadosProcesso['organizacao']) ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Vigencia inicial: </label>
                        <input type="text" class="form-control" disabled="" value="<?= $oController->dataPt($dadosProcesso['dt_ini_vigencia']) ?>">
                    </div>
                    <div class="form-group col-md-3">
                        <label>Vigencia Fim: </label>
                        <input type="text" class="form-control" disabled="" value="<?= $oController->dataPt($dadosProcesso['dt_fim_vigencia']) ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>
<div class="portlet light ">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject font-green-sharp bold uppercase ">Acompanhamento do Processo</span>
        </div>
        <div class="actions">
            <div class="btn-group">
                <a class="btn green-haze btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="javascript:;"> Option 1</a>
                    </li>
                    <li class="divider"> </li>
                    <li>
                        <a href="javascript:;">Option 2</a>
                    </li>
                    <li>
                        <a href="javascript:;">Option 3</a>
                    </li>
                    <li>
                        <a href="javascript:;">Option 4</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="portlet-body">
        <ul class="nav nav-pills">
            <li class="active">
                <a href="#tab_2_1" data-toggle="tab" aria-expanded="true" >Andamentos</a>
            </li>
            <li class="">
                <a href="#tab_2_2" data-toggle="tab" aria-expanded="false" > Vocábulos</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="tab_2_1">
                <table class="table table-hover" id="sample_5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tipo Andamento</th>
                            <th scope="col">Observação</th>
                            <th scope="col">Pendente</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $resultAndamento = $oProcesso->listaAndamentosProcesso($processo);
                        while ($andamento = mssql_fetch_array($resultAndamento)) {
                            ?>
                            <tr>
                                <td><?= "<span style='font-weight:bold'>" . $andamento['id_andamento'] . "</span>" ?></td>
                                <td><?= $andamento['descr_tp_andamento'] ?></td>
                                <td><?= $andamento['observacao'] ?></td>
                                <td><?= $andamento['pendencia'] == 's' ? "<span style='color:red; font-weight:bold'>Pendente</span>" : "<span style='color:green; font-weight:bold'>Concluído</span>"; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="tab_2_2">
                <table class="table table-hover" id="sample_5">
                    <thead>
                        <tr>
                            <th scope="col">Processo</th>
                            <th scope="col">Vocabulo</th>
                            <th scope="col">Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $resultVocProcesso = $oProcesso->listaVocabulosProcesso($processo);
                        while ($dadosVocProcesso = mssql_fetch_array($resultVocProcesso)) {
                            ?>

                            <tr>
                                <td><?= $dadosVocProcesso['nr_processo'] ?></td>
                                <td><?= $dadosVocProcesso['vocabulo'] ?></td>
                                <td><?= $oController->dataPt($dadosVocProcesso['dt_atualiz']) ?></td>
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