<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="paginacao">
                <thead>
                <tr>
                    <th>Id</th>
                    <th class="col-md-2">Título</th>
                    <!--<th>Descrição</th>-->
                    <th>Orientador</th>
                    <!--<th>Coorientador</th>-->
                    <th>Aluno</th>
                    <th>Status</th>
                    <th>Ações</th>                    
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tccs as $tcc): ?>
                    <tr>
                        <td><?php echo $tcc['idTcc']; ?></td>
                        <td><?php echo $tcc['titulo']; ?></td>
                        <td><?php echo $tcc['orientador']; ?></td>
                        <!--<td><?php echo $tcc['coorientador'];?></td>-->
                        <td><?php echo $tcc['aluno1']; ?></td>
                        <td>
                        <?php 
                        switch($tcc['status']){
                            case 0:
                            echo "Disponível";
                            break;
                            case 1:
                            echo "Formalizado";
                            break;
                            case 2:
                            echo "Qualificado";
                            break;
                            case 3:
                            echo "Aprovado";
                            break;
                            case 4:
                            echo "Reprovado";
                            break;
                            case 5:
                            echo "Jubilado";
                            break;
                            default:
                            echo "Status não disponível";
                            break;
                        }
                        ?>
                        </td>
                        
                        <td>
                            <?php if($nivel == 'admin' || ($nivel == 'usuario' && $ident == 'cg')):?>
                            <!--<a href="?id=<?php echo $tcc['idTcc']; ?>">  -->
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#myModal<?php echo $tcc['idTcc']; ?>">Detalhes
                            </button><!--</a> -->                            
                            <!--?php if($nivel == "usuario" && $ident=="a"): ?-->
                                <?php if($tcc['status'] != 0): ?>
                                <a href="<?php echo BASE; ?>tcc/editar/<?php echo $tcc['idTcc']; ?>">
                                    <button type="button" class="btn btn-sm btn-warning">Editar</button>
                                </a>
                            <?php elseif($tcc['status'] == 0): ?>
                                <a href="<?php echo BASE; ?>tcc/vincular/<?php echo $tcc['idTcc']; ?>">
                                    <button type="button" class="btn btn-sm btn-success">+ Aluno</button>
                                </a>
                            <?php endif;?>
                                <a href="<?php echo BASE; ?>tcc/excluir/<?php echo $tcc['idTcc']; ?>"
                                   onclick="return confirm('Confirma a exclusão do Trabalho: <?php echo $tcc['titulo']; ?> ?');">
                                    <button type="button" class="btn btn-sm btn-danger">Excluir</button>
                                </a>  
                                                         
                                    <div class="btn-group">
                                      <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Reunião <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu">
                                        <li><a href="<?php echo BASE; ?>reuniao/cadastrar/<?php echo $tcc['idTcc'] ?>">Cadastrar</a></li>
                                        <li><a href="<?php echo BASE;?>reuniao/consultar/<?php echo $tcc['idTcc'] ?>">Consultar</a></li>                 
                                      </ul>
                                    </div>  
                            <?php else: ?>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#myModal<?php echo $tcc['idTcc']; ?>">Detalhes
                            </button>   
                              <div class="btn-group">
                                      <button type="button" class="btn btn-sm btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Reunião <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu">
                                        <li><a href="<?php echo BASE; ?>reuniao/cadastrar/<?php echo $tcc['idTcc'] ?>">Cadastrar</a></li>
                                        <li><a href="<?php echo BASE;?>reuniao/consultar/<?php echo $tcc['idTcc'] ?>">Consultar</a></li>                 
                                      </ul>
                             </div> 
                            <?php endif;?>                 
                        <!--?php endif ?-->
                        </td>
                    </tr>                    
                    <!-- Modal --> <!--- modal inicio -->
                    <div class="modal fade" id="myModal<?php echo $tcc['idTcc']; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center"
                                        id="myModalLabel">Trabalho '<?php echo $tcc['titulo']; ?>'</h4>
                                </div>
                                <div class="modal-body">
                                    <p><b>ID: </b><?php echo $tcc['idTcc'];?></p>
                                    <p><b>Titulo:  </b></br><?php echo $tcc['titulo'];?></p>
                                    <p><b>Orientador:  </b></br><?php echo $tcc['orientador'];?></p>
                                    <p><b>Coorientador:  </b></br><?php echo $tcc['coorientador'];?></p>
                                    <p><b>Aluno 1:  </b></br><?php echo $tcc['aluno1'];?></p>
                                    <p><b>Aluno 2:  </b></br><?php echo $tcc['aluno2'];?></p>                                    
                                    
                                    <p><b>Status TCC:  </b></br>
                                        <!--
                                        ?php if ($tcc['status'] == 0) ?>
                                        ?php echo "Disponível";?>
                                        ?php elseif ($tcc['status'] == 1)?>
                                        ?php echo "Formalizado";?>
                                         -->
                                         <?php 
                                            switch($tcc['status']){
                                                case 0:
                                                echo "Disponível";
                                                break;
                                                case 1:
                                                echo "Formalizado";
                                                break;
                                                case 2:
                                                echo "Qualificado";
                                                break;
                                                case 3:
                                                echo "Aprovado";
                                                break;
                                                case 4:
                                                echo "Reprovado";
                                                break;
                                                case 5:
                                                echo "Jubilado";
                                                break;
                                                default:
                                                echo "Status não disponível";
                                                break;
                                            }
                                        ?>
                                    </p>
                                    <p><b>Status Qualificação: </b><?php echo $tcc['sitQualif'];?></p>
                                    <p><b>Data Qualificação:  </b><?php echo $tcc['dtQualif'];?></p>
                                    <p><b>Status Defesa:  </b><?php echo $tcc['sitDefesa'];?></p>
                                    <p><b>Data Defesa:  </b><?php echo $tcc['dtDefesa'];?></p>
                                    <p><b>Data Limite Defesa:  </b><?php echo $tcc['dtMaxDefesa'];?></p>
                                    <p><b>Nota Trabalho:  </b><?php echo $tcc['nota'];?></p>
                                    <p><b>Comentarios:  </b></br><?php echo $tcc['observacao'];?></p>
                                    <p><b>Anexo I - Formalização de Orientação de T.C.C | Data do Protocolo:  </b></br><?php echo $tcc['data_formal_orientacao'];?></p>
                                    <p><b>Anexo II - Proposta de T.C.C | Data do Protocolo:  </b></br><?php echo $tcc['data_prop_tcc'];?></p>
                                    <p><b>Anexo III - Nomeação de Banca de Qualificação | Data do Protocolo:  </b></br><?php echo $tcc['data_nomeacao_banca_qualif'];?></p>
                                    <p><b>Anexo V - Ata da Banca de Qualificação | Data do Protocolo:  </b></br><?php echo $tcc['data_ata_banca_qualif'];?></p>
                                    <p><b>Anexo III - Nomeação de Banca de Defesa | Data do Protocolo:  </b></br><?php echo $tcc['data_nomeacao_banca_defesa'];?></p>
                                    <p><b>Anexo V - Ata da Banca de Defesa| Data do Protocolo:  </b></br><?php echo $tcc['data_ata_banca_defesa'];?></p>
                                    <p><b>Anexo VI - Recibo de Entrega do TCC à Biblioteca | Data do Protocolo:  </b></br><?php echo $tcc['data_entrega_recibo_biblioteca'];?></p>
                                    <p><b>Anexo VII - Autorização de Depósito de TCC | Data do Protocolo:  </b></br><?php echo $tcc['data_autorizacao_dep_tcc'];?></p>
                                    <p><b>Anexo VIII - Autorização de Reprodução do T.C.C | Data do Protocolo:  </b></br><?php echo $tcc['data_autorizacao_reproducao_tcc'];?></p>                          
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                   <!-- <button type="button" class="btn btn-primary">Salvar mudanças</button>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- modal fim -->

                <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
    <a href="index.php">Voltar</a>

</div> <!-- /container -->
