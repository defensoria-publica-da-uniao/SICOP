<!-- TÍTULO E DIRETÓRIO DE NAVEGAÇÃO -->
<h1 class="page-title">
    Grupos de Trabalho <small>Cadastrados</small>
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
                        <span class="caption-subject bold uppercase">Lista de Grupos de Trabalho</span>
                    </div>
                    <div class="tools">
                        <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#cadastrarGrupostrab" class="btn dropdown-toggle" data-toggle="dropdown">
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
                            <th>Evento</th>
                            <th>Público Alvo</th>
                            <th>Dt_Evento</th>
                            <th>Dt_Atualiz</th>
                            <th>Usuário</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $resultGrupostrab = $oGrupostrab->consultarGrupostrab();
                            while ($arGrupostrab = mssql_fetch_array($resultGrupostrab)) {
                                //var_dump($arGrupostrab);
                                ?>
                                <tr>
                                    <td>
                                        <form action="<?php echo CONTROLLER . 'grupostrab.php' ?>" method="POST">
                                            <input type="hidden" name="arrDadosForm[tabela]" value="grupo_trab">
                                            <input type="hidden" name="arrDadosForm[campo_where]" value="id_grup_trab">
                                            <input type="hidden" name="arrDadosForm[method]" value="apagarGrupostrab">
                                            <input type="hidden" name="arrDadosForm[id]" value="<?php echo $arGrupostrab['id_grup_trab'] ?>">

                                            <div class="btn-group">
                                                <button type="button" class="btn btn-xs btn-default blue-madison mod popovers" data-toggle="modal" data-doc="<?php echo $arGrupostrab['id_grup_trab']; ?>" data-target='#editarGrupostrab' data-container="body" data-trigger="hover" data-placement="top" data-content="" data-original-title="Editar">
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

                                    <td><?php echo $arGrupostrab['id_grup_trab']; ?></td>
                                    <td><?php echo utf8_encode(($arGrupostrab['descricao'])); ?></td>
                                    <td><?php echo $arGrupostrab['descr_tipo']; ?></td>
                                    <td><?php echo $arGrupostrab['nr_publico']; ?></td>
                                    <td><?php echo $arGrupostrab['dt_evento']; ?></td>
                                    <td><?php echo $arGrupostrab['dt_atualiz']; ?></td>
                                    <td><?php echo $arGrupostrab['str_login']; ?></td>

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

include 'cadastrarGrupostrab.php';
include 'editarGrupostrab.php';

?>


<script>
                $(document).ready(function() {
                    $('#editarGrupostrab').on('show.bs.modal', function(e) {
                        var id_grup_trab = $(e.relatedTarget).data('doc');
                      $.ajax({
                            type: 'POST',
                            data: 'codigo=' + id_grup_trab + '&method=listEditargrupostrab&acao=ajax',
                            url: '<?php echo CONTROLLER; ?>grupostrab.php',
                            success: function(data) {
                                //console.log(data);
                                //exit;
                                var response = $.parseJSON(data);
                                console.log(response);
                                $("#codigo").val(response.codigo);
                                $("#descr_gruptrab").val(response.descr_gruptrab);
                                $("#publicoalvo").val(response.publicoalvo);
                                $("#datadoevento").val(response.datadoevento);
                                $("#tipoevento").val(response.tipoevento);
                              
                            }
                        });
                       
                    });
                });
</script>

 <!---->
