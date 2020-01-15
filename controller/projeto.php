<?php
                @session_start();
                //Substituir require_once por _SESSION['PATH'];
                require_once '/dados/php56/desenvolvimento/frame_menu_vertical/model/MProjeto.php';
                class Projeto extends MProjeto{

                    function inicio(){ return 'Módulo projeto criado com sucesso'; }

                }
                $oProjeto = new Projeto();
                $classe = 'Projeto';
                $oProjeto = $oProjeto;
                @include_once '../application/request.php';

            ?>