<!-- TÍTULO E DIRETÓRIO DE NAVEGAÇÃO -->
<h1 class="page-title">
    Vocábulos <small>Cadastrados</small>
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
                    <span class="caption-subject bold uppercase">Lista de vocábulos</span>
                </div>
                <div class="tools"> 
                    <button type="button" class="btn btn-success btn-circle" data-toggle="modal" data-target="#cadastrarVocabulos" class="btn dropdown-toggle" data-toggle="dropdown">
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
                                <th>Descrição</th>
                                <th>Dt_Atualiz</th>
                                <th>Usuário</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $resultVocabulos = $oDicionario->listarVocabulos();
                            while ($arVocabulos = mssql_fetch_array($resultVocabulos)) {
                                ?>
                                <tr>
                                    <td>
                                    <form action="<?php echo CONTROLLER . 'dicionario.php' ?>" method="POST">
                                    <input type="hidden" name="arrDadosForm[tabela]" value="vocabulos">
                                    <input type="hidden" name="arrDadosForm[campo_where]" value="id_vocabulo">
                                    <input type="hidden" name="arrDadosForm[method]" value="apagarVocabulo">
                                    <input type="hidden" name="arrDadosForm[id]" value="<?php echo $arVocabulos['id_vocabulo'] ?>">
                      
                                    <div class="btn-group">
                                       <button type="button" class="btn btn-xs btn-default blue-madison mod popovers" data-toggle="modal" data-doc="<?php echo $arVocabulos['id_vocabulo']; ?>" data-target='#editarVocabulos' data-container="body" data-trigger="hover" data-placement="top" data-content="" data-original-title="Editar">
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

                                    <td><?php echo $arVocabulos['id_vocabulo']; ?></td>
                                    <td><?php echo $arVocabulos['vocabulo']; ?></td>
                                    <td><?php echo $arVocabulos['dt_atualiz']; ?></td>
                                    <td><?php echo $arVocabulos['str_login']; ?></td>

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
include 'cadastrarVocabulos.php';
include 'modal/editarVocabulos.php';

?>

<script>
    $(document).ready(function () {
        $('#editarVocabulos').on('show.bs.modal', function (e) {
            var id_vocabulo = $(e.relatedTarget).data('doc');
            $.ajax({
                type: 'POST',
                data: 'id_vocabulo=' + id_vocabulo + '&method=editarVocabulo&acao=ajax',
                url: '<?php echo CONTROLLER; ?>dicionario.php',
                success: function (data) {
                    console.log(data);
                    var response = $.parseJSON(data);
                    $("#id_vocabulo").val(response.id_vocabulo);
                    $("#vocabulo").val(response.vocabulo);
                }
            });
        });
    });
</script>