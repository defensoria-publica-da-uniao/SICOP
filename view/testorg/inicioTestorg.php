<!-- TÍTULO E DIRETÓRIO DE NAVEGAÇÃO -->
<h1 class="page-title">
    Organizações/Parcerias <small>Cadastradas</small>
</h1>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <span>Home</span>
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
                        <span class="caption-subject bold uppercase">Lista de Organizações/Parcerias</span>
                    </div>
                    <div class="tools">
                        <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#cadastrarTestorg" class="btn dropdown-toggle" data-toggle="dropdown">
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
                            <th>Organização</th>
                            <th>e_mail</th>
                            <th>Site</th>
                            <th>Pais</th>
                            <th>Telefones</th>
                            <th>Dt_Atualiz</th>
                            <th>Usuário</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $resultTorganizacao = $oTestorg->consultarTorganizacao();
                            while ($arTorganizacao = mssql_fetch_array($resultTorganizacao)) {
                                //var_dump($arTorganizacao);
                                ?>
                                <tr>
                                    <td>
                                        <form action="<?php echo CONTROLLER . 'testorg.php' ?>" method="POST">
                                            <input type="hidden" name="arrDadosForm[tabela]" value="organizacao">
                                            <input type="hidden" name="arrDadosForm[campo_where]" value="id_organizacao">
                                            <input type="hidden" name="arrDadosForm[method]" value="apagarTestorg">
                                            <input type="hidden" name="arrDadosForm[id]" value="<?php echo $arTorganizacao['id_organizacao'] ?>">

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-xs btn-default blue-madison mod popovers" data-toggle="modal" data-doc="<?php echo $arTorganizacao['id_organizacao']; ?>" data-target='#editarTestorg' data-container="body" data-trigger="hover" data-placement="top" data-content="" data-original-title="Editar">
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

                                    <td><?php echo $arTorganizacao['id_organizacao']; ?></td>
                                    <td><?php echo utf8_encode(($arTorganizacao['organizacao'])); ?></td>
                                    <td><?php echo ($arTorganizacao['e_mail']); ?></td>
                                    <td><?php echo ($arTorganizacao['site_org']); ?></td>
                                    <td><?php echo utf8_encode($arTorganizacao['descricao']); ?></td>
                                    <td><?php echo $arTorganizacao['telefones']; ?></td>
                                    <td><?php echo $arTorganizacao['dt_atualiz']; ?></td>
                                    <td><?php echo $arTorganizacao['str_login']; ?></td>

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
include 'cadastrarTestorg.php';
include 'editarTestorg.php';
?>

<script>
                $(document).ready(function() {
                    $('#editarTestorg').on('show.bs.modal', function(e) {
                        var id_organizacao = $(e.relatedTarget).data('doc');

                        //console.log(id_organizacao);

                        $.ajax({
                            type: 'POST',
                            data: 'codigo=' + id_organizacao + '&method=listEditorganiza&acao=ajax',
                            url: '<?php echo CONTROLLER; ?>testorg.php',
                            success: function(data) {
                                //console.log(data);
                                var response = $.parseJSON(data);
                                //console.log(response);
                                $("#codigo").val(response.codigo);
                                $("#nome_org").val(response.nome_org);
                                $("#email").val(response.email);
                                $("#site").val(response.site);
                                $("#telfones").val(response.fones);
                                $("#paisesalterar").val(response.paises);
                                $("#codpais").val(response.cod_pais);

                            }
                        });
                    });
                });
</script>

