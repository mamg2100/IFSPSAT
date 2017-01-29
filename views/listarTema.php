<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="paginacao">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>descricao</th>
                    <th>Status</th>                    
                    <th>Prontuario</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($temas as $tema): ?>
                    <tr>
                        <td><?php echo $tema['idTema']; ?></td>
                        <td><?php echo $tema['descricao']; ?></td>
                        <td><?php echo $tema['status']; ?></td>
                        <td><?php echo $tema['prontuario']; ?></td>
                        <td>
                            <!--<a href="?id=<?php echo $results['idTema']; ?>">  -->
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#myModal<?php echo $tema['idTema']; ?>">Detalhes
                            </button>
                            <!--</a> -->
                            
                            <?php if($nivel == "admin"): ?>
                            <a href="<?php echo BASE ?>tema/editar/<?php echo $tema['idTema']; ?>"
                                <button type="button" class="btn btn-sm btn-warning">Editar</button>
                            </a>
                            <a href="<?php echo BASE; ?>tema/excluir/<?php echo $tema['idTema']; ?>"
                               onclick="return confirm('Confirma a exclusão do tema: <?php echo $tema['descricao']; ?> ?');">
                                <button type="button" class="btn btn-sm btn-danger">Excluir</button>
                            </a>
                        <?php endif ?>

                        </td>
                    </tr>

                    <!-- Modal --> <!--- modal inicio -->
                    <div class="modal fade" id="myModal<?php echo $tema['idTema']; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center"
                                        id="myModalLabel">Tema '<?php echo $tema['descricao']; ?>'</h4>
                                </div>
                                <div class="modal-body">
                                    <p><b>ID </b><?php echo $tema['idTema']; ?></p>
                                    <p><b>Status</b><br><?php echo $tema['status']; ?></p>
                                    <p><b>Descrição</b><br><?php echo $tema['descricao']; ?></p>
                                    <p><b>Prontuário</b><br><?php echo $tema['prontuario']; ?></p>
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
