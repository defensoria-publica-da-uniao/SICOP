<!-- TÍTULO E DIRETÓRIO DE NAVEGAÇÃO -->
<h1 class="page-title">
    Página Início <small>Subtitulo ou descrição</small>
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
            <span>Diretório de navegação</span>
        </li>
    </ul>
    <div class="page-toolbar">
        <div class="btn-group pull-right">
            <a onclick="window.history.go(-1)" class="btn btn-fit-height grey-salt dropdown-toggle"><i class="fa fa-reply"></i> Voltar </a>
        </div>
    </div>
</div>
<!-- FIM TÍTULO E DIRETÓRIO DE NAVEGAÇÃO -->
<div class="portlet-title">
    <div class="form-group col-md-10">
        <select class="form-control" multiple="multiple" >
            <?php
            echo $oController->comboListar('vocabulos', 'id_vocabulo', 'vocabulo');
            ?>
        </select>

    </div>
    <div class="form-group col-md-2">
        <button class="btn btn-primary">Filtrar</button>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

        <!-- ALERTAS -->
        <?php require HELPER . "mensagem.php"; ?>
        <!-- FIM ALERTAS -->

        <div class="portlet light ">

            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject bold uppercase">Basic</span>
                </div>
                <div class="tools"> </div>
            </div>

            <div class="portlet-body">

                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_5">
                    <thead>
                        <tr>

                            <!-- class:[ all ]-> "Coluna visivél quando for TELEFONE e DESKTOP -->
                            <!-- class:[ min-phone-l ]-> "Coluna visivél quando for TELEFONE -->
                            <!-- class:[ min-tablet ]-> "Coluna visivél quando for TABLET -->
                            <!-- class:[ desktop ]-> "Coluna visivél quando for DESKTOP -->

                            <th class="all">Nº Processo</th>
                            <th class="min-phone-l">Objeto</th>
                            <th class="min-tablet">Vigência</th>
                            <th class="none">Unidade</th>
                            <th class="none">Processo</th>
                            <th class="none">Juntada</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $resultProcessos = $oController->listaProcessos();
                        while ($processos = mssql_fetch_array($resultProcessos)) {
                            ?>

                            <tr>
                                <td <?= $processos['nr_processo'] == 2 ? "style='color:red;font-weight:bold'" : ''; ?>><?= utf8_encode($processos['nr_processo']) ?></td>
                                <td><?= $processos['objeto'] ?></td>
                                <td>Ini: <?= $oController->dataPt($processos['dt_ini_vigencia']); ?>
                                    <br/>
                                    Fim: <?= $oController->dataPt($processos['dt_fim_vigencia']); ?>
                                </td>
                                <td><?= utf8_encode($processos['cod_unidade']) ?></td>
                                <td><?= utf8_encode($processos['organizacao']) ?></td>
                                <td><?= $processos['juntada'] ?></td>
                            </tr>

                        <?php } ?>


                    </tbody>
                </table>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>
    </div>
</div>

