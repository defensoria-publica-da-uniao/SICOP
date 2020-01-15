<?php
                @session_start();
                //Substituir require_once por _SESSION['PATH'];
                require_once '/dados/php56/desenvolvimento/SGAI/model/MRelatorios.php';
                class Relatorios extends MRelatorios{

                    function inicio(){ return 'Módulo relatorios criado com sucesso'; }

                }
                $oRelatorios = new Relatorios();
                $classe = 'Relatorios';
                $oRelatorios = $oRelatorios;
                @include_once '../application/request.php';

            ?>