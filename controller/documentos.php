<?php
                @session_start();
                //Substituir require_once por _SESSION['PATH'];
                require_once '/dados/php56/desenvolvimento/SGAI/model/MDocumentos.php';
                class Documentos extends MDocumentos{

                    function inicio(){ return 'Módulo documentos criado com sucesso'; }

                }
                $oDocumentos = new Documentos();
                $classe = 'Documentos';
                $oDocumentos = $oDocumentos;
                @include_once '../application/request.php';

            ?>