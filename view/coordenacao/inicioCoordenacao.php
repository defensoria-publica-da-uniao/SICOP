<!-- TÍTULO E DIRETÓRIO DE NAVEGAÇÃO -->
<h1 class="page-title">
    Coordenações <small>Cadastradas</small>
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
    <!-- FIM TÍTULO E DIRETÓRIO DE NAVEGAÇÃO -->


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <!-- ALERTAS -->
            <?php require HELPER . "mensagem.php"; ?>
            <!-- FIM ALERTAS -->

            <div class="portlet light ">

                <div class="portlet-title">
                    <div class="caption font-dark">
                        <span class="caption-subject bold uppercase">Lista de Coordenações</span>
                    </div>
                    <div class="tools">
                        <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#cadastrarCoordenacao" class="btn dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-plus"></i> Novo registro
                        </button>
                    </div>
                </div>

                <div class="portlet-body">
                    <script type="text/javascript" src="https://kryogenix.org/code/browser/sorttable/sorttable.js"></script>
                    <table class="table table-striped table-bordered table-hover dt-responsive sortable" width="100%" id="sample_5">
                        <thead>
                        <td class="text-center" >

                        <tr style="background-color: #D8D8D8">

                            <th>Ação</th>
                            <th>Codigo</th>
                            <th>Descricao</th>
                            <th>Sigla</th>
                            <th>Dt_Atualiz</th>
                            <th>Usuário</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $resultCoordenacao = $oCoordenacao->consultarCoordenacao();
                            while ($arCoordenacao = mssql_fetch_array($resultCoordenacao)) {
                                //var_dump($arContatos);
                                ?>
                                <tr>
                                    <td>

                                        <form action="<?php echo CONTROLLER . 'coordenacao.php' ?>" method="POST">
                                            <input type="hidden" name="arrDadosForm[tabela]" value="coordenacao">
                                            <input type="hidden" name="arrDadosForm[campo_where]" value="id_coordenacao">
                                            <input type="hidden" name="arrDadosForm[method]" value="apagarCoordenacao">
                                            <input type="hidden" name="arrDadosForm[id]" value="<?php echo $arCoordenacao['id_coordenacao'] ?>">
                                            <div class="btn-toolbar" style="margin-left:0px !important;">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-xs btn-default blue-madison mod popovers" data-toggle="modal" data-doc="<?php echo $arCoordenacao['id_coordenacao']; ?>" data-target='#editarCoordenacao' data-container="body" data-trigger="hover" data-placement="top" data-content="" data-original-title="Editar">
                                                        <i class="fa fa-edit"></i>
                                                    </button>

                                                </div>
                                                <div style="float: right !important;"  >
                                                    <?php echo "<button type='submit'
                                                  class='btn btn-danger  btn-xs'
                                                  data-toggle='confirmation'
                                                  data-original-title='Deseja Excluir?'
                                                  aria-describedby=''>
                                                  <i class='fa fa-trash'></i>
                                                  </button>";
                                                    ?>
                                                </div>
                                            </div>
                                    </td>

                                    <td><?php echo $arCoordenacao['id_coordenacao']; ?></td>
                                    <td><?php echo utf8_encode(($arCoordenacao['descricao'])); ?></td>
                                    <td><?php echo $arCoordenacao['sigla']; ?></td>
                                    <td><?php echo $arCoordenacao['dt_atualiz']; ?></td>
                                    <td><?php echo $arCoordenacao['str_login']; ?></td>

                                    </form>

                                </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>


<?php
include 'cadastrarCoordenacao.php';
include 'editarCoordenacao.php';
?>

<script>
                $(document).ready(function() {
                    $('#editarCoordenacao').on('show.bs.modal', function(e) {
                        var id_coordenacao = $(e.relatedTarget).data('doc');
                        $.ajax({
                            type: 'POST',
                            data: 'codigo=' + id_coordenacao + '&method=listEditarcoordenacao&acao=ajax',
                            url: '<?php echo CONTROLLER; ?>coordenacao.php',
                            success: function(data) {
                                //console.log(data);
                                //exit;
                                var response = $.parseJSON(data);
                                //console.log(response);
                                $("#codigoEditar").val(response.codigo);
                                $("#descricaoEditar").val(response.descricao);
                                $("#siglaEditar").val(response.sigla);
                            }
                        });
                    });
                });
</script>


