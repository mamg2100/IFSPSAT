
<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="paginacao">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($pessoas as $pessoa): ?>
                    <tr>
                        <td><?php echo $pessoa['idPessoa']; ?></td>
                        <td><?php echo $pessoa['nome']; ?></td>
                        <td><?php echo $pessoa['email']; ?></td>
                        <td><?php echo $pessoa['nivelacesso']; ?></td>
                        <td>
                            <!--<a href="?id=<?php echo $results['idPessoa']; ?>">  -->
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#myModal<?php echo $pessoa['idPessoa']; ?>">Detalhes
                            </button>
                            <!--</a> -->                            
                            <?php if($nivel == "admin"): ?>
                            <a href="<?php echo BASE; ?>user/editar/<?php echo $pessoa['idPessoa']; ?>"
                                <button type="button" class="btn btn-sm btn-warning">Editar</button>
                            </a>
                            <a href="<?php echo BASE; ?>user/excluir/<?php echo $pessoa['idPessoa']; ?>"
                               onclick="return confirm('Confirma a exclusão do usuário: <?php echo $pessoa['nome']; ?> ?');">
                                <button type="button" class="btn btn-sm btn-danger">Excluir</button>
                            </a>
                        <?php endif ?>
                        </td>
                    </tr>

                    <!-- Modal --> <!--- modal inicio -->
                    <div class="modal fade" id="myModal<?php echo $pessoa['idPessoa']; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center"
                                        id="myModalLabel">Detalhes do Usuário '<?php echo $pessoa['nome']; ?>'</h4>
                                </div>
                                <div class="modal-body">
                                    <p><b>#id </b><?php echo $pessoa['idPessoa']; ?></p>
                                    <p><b>Nome: </b><?php echo $pessoa['nome']; ?></p>
                                    <p><b>Nascimento: </b><?php echo $pessoa['dtnasc']; ?></p>
                                    <p><b>Sexo: </b><?php echo $pessoa['sexo']; ?></p>
                                    <p><b>Endereço: </b><?php echo $pessoa['endereco']; ?></p>
                                    <p><b>Complemento: </b><?php echo $pessoa['complemento']; ?></p>
                                    <p><b>Bairro: </b><?php echo $pessoa['bairro']; ?></p>
                                    <p><b>Cidade </b><?php echo $pessoa['cidade']; ?></p>
                                    <p><b>Estado </b><?php echo utf8_encode($pessoa['estado']); ?></p>
                                    <p><b>Pais </b><?php echo $pessoa['pais']; ?></p>
                                    <p><b>Email </b><?php echo $pessoa['email']; ?></p>
                                    <!--<p><b>Curriculo Lattes </b><?php echo $pessoa['lattes']; ?></p>  -->
                                    <p><b>Telefone </b><?php echo $pessoa['telefone']; ?></p>
                                    <p><b>Celular </b><?php echo $pessoa['celular']; ?></p>
                                    <p><b>Prontuario </b><?php echo $pessoa['prontuario']; ?></p>   
                                    <hr>
                                                                                                       
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                    <!--<button type="button" class="btn btn-primary">Salvar mudanças</button>-->
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
