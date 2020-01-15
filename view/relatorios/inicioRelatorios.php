<!-- TÍTULO E DIRETÓRIO DE NAVEGAÇÃO -->
<h1 class="page-title">
    Relatórios de Processos
</h1>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-bar-chart"></i>
            <span>Relatório</span>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo RAIZ . "relatorios/relRenda"; ?>">Renda</a>
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
        <!--
        <div class="note note-info">
            <p> Resultados dos últimos 6 meses - UNIDADE</p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
                <div class="dashboard-stat grey-gallery" style="padding-bottom: 20px !important;">
                    <div class="visual">
                        <i class="fa fa-money fa-icon-medium"></i>
                    </div>
                    <div class="details">
                        <div class="number"> 200 </div>
                        <div class="desc"> Pessoas com renda de <font class="bold font-yellow-saffron">De 0,00 a 999,99</font></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat grey-gallery" style="padding-bottom: 20px !important;">
                    <div class="visual">
                        <i class="fa fa-money fa-icon-medium"></i>
                    </div>
                    <div class="details">
                        <div class="number"> 200 </div>
                        <div class="desc"> Pessoas com renda de <font class="bold font-yellow-saffron">De 1.000,00 a 1.499,99</font></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat grey-gallery" style="padding-bottom: 20px !important;">
                    <div class="visual">
                        <i class="fa fa-money fa-icon-medium"></i>
                    </div>
                    <div class="details">
                        <div class="number"> 200 </div>
                        <div class="desc"> Pessoas com renda de <font class="bold font-yellow-saffron">De 1.500,00 a 1.999,99</font></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 margin-bottom-10">
                <div class="dashboard-stat grey-gallery" style="padding-bottom: 20px !important;">
                    <div class="visual">
                        <i class="fa fa-money fa-icon-medium"></i>
                    </div>
                    <div class="details" >
                        <div class="number"> 200 </div>
                        <div class="desc"> Pessoas com renda de <font class="bold font-yellow-saffron">De 2.000,00 a 2.499,99</font></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="dashboard-stat grey-gallery" style="padding-bottom: 20px !important;">
                    <div class="visual">
                        <i class="fa fa-money fa-icon-medium"></i>
                    </div>
                    <div class="details">
                        <div class="number"> 200 </div>
                        <div class="desc"> Pessoas com renda de <font class="bold font-yellow-saffron">Acima de 2.500,00</font></div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <div class="portlet light ">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <span class="caption-subject bold uppercase">Utilize os filtros para adquirir novos resultados</span>
                </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">

                <div class="clearfix" id="filtro">
                    <h4 class="block">Filtros</h4>

                    <form onsubmit=" return filtrar()" >
                        <input type="hidden" name="arrDadosForm[tabela]" value="agenda">
                        <input type="hidden" name="arrDadosForm[method]" value="consultaAgenda">

                        <div class="form-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="control-label">Período <span class="required" aria-required="true">*</span></label>
                                        <div class="input-group input-large input-daterange " data-date-format="dd/mm/yyyy">
                                            <input type="date" class="form-control" placeholder="Data Inicial"  id="dt_inicio" name="arrDadosForm[dt_inicial]"  required >
                                            <span class="input-group-addon"> até </span>
                                            <input type="date" class="form-control" placeholder="Data Final" id="dt_final" name="arrDadosForm[dt_final]" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="control-label">Unidade <span class="required" aria-required="true">*</span></label>
                                            <select class="bs-select form-control" name="arrDadosForm[cod_unidade]" id="unidades" data-live-search="true" data-size="5" required="">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="control-label" style=" color:#ffffff !important;">.</label><br>
                                            <input type="submit" name="Submit"  class="btn btn-primary" value="Filtrar" id="filtro"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="clearfix" id="tabelaDados">
                    <h4 class="block">Resultados</h4>
                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_5">
                        <thead>
                            <tr style="background-color: #E5E5E5">
                                <th  class="text-center all">Renda</th>
                                <th  class="text-center all">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"></td>
                                <td class="text-center"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="outra"></div>
                <div id="chartdiv"></div>

            </div>
        </div>


    </div>
</div>
