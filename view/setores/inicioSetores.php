<!-- TÍTULO E DIRETÓRIO DE NAVEGAÇÃO -->
<h1 class="page-title">
    Setores <small>Cadastrados</small>
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
                        <span class="caption-subject bold uppercase">Lista de Setores</span>
                    </div>
                    <div class="tools">
                        <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#cadastrarSetores" class="btn dropdown-toggle" data-toggle="dropdown">
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
                            <th>Dt_Atualiz</th>
                            <th>Usuário</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $resultSetores = $oSetores->consultarSetores();
                            while ($arSetores = mssql_fetch_array($resultSetores)) {
                                //var_dump($arContatos);
                                ?>
                                <tr>
                                    <td>
                                        <form action="<?php echo CONTROLLER . 'setores.php' ?>" method="POST">
                                            <input type="hidden" name="arrDadosForm[tabela]" value="setores">
                                            <input type="hidden" name="arrDadosForm[campo_where]" value="id_setores">
                                            <input type="hidden" name="arrDadosForm[method]" value="apagarSetores">
                                            <input type="hidden" name="arrDadosForm[id]" value="<?php echo $arSetores['id_setores'] ?>">

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-xs btn-default blue-madison mod popovers" data-toggle="modal" data-doc="<?php echo $arSetores['id_setores']; ?>" data-target='#editarSetores' data-container="body" data-trigger="hover" data-placement="top" data-content="" data-original-title="Editar">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <?php echo "<button type='submit'
                                                  class='btn btn-danger  btn-xs'
                                                  data-toggle='confirmation'
                                                  data-original-title='Deseja Excluir?'
                                                  aria-describedby=''>
                                                  <i class='fa fa-trash'></i>
                                                  </button>";
                                                ?>
                                            </div>
                                    </td>

                                    <td><?php echo $arSetores['id_setores']; ?></td>
                                    <td><?php echo utf8_encode(($arSetores['descricao'])); ?></td>
                                    <td><?php echo $arSetores['dt_atualiz']; ?></td>
                                    <td><?php echo $arSetores['id_usuario']; ?></td>

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
include 'cadastrarSetores.php';
include 'editarSetores.php';
?>

<script>
                $(document).ready(function() {
                    $('#editarSetores').on('show.bs.modal', function(e) {
                        var id_setores = $(e.relatedTarget).data('doc');
                        $.ajax({
                            type: 'POST',
                            data: 'codigo=' + id_setores + '&method=listEditarsetores&acao=ajax',
                            url: '<?php echo CONTROLLER; ?>setores.php',
                            success: function(data) {
                                //console.log(data);
                                //exit;
                                var response = $.parseJSON(data);
                                //console.log(response);
                                $("#codigoEditar").val(response.codigo);
                                $("#descricaoEditar").val(response.descricao);
                            }
                        });
                    });
                });
</script>


