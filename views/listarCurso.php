<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="paginacao">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Sigla</th>
                    <th>Nome</th>
                    <th>Ano</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($cursos as $curso): ?>
                    <tr>
                        <td><?php echo $curso['idCurso']; ?></td>
                        <td><?php echo $curso['sigla']; ?></td>
                        <td><?php echo $curso['nome_curso']; ?></td>
                        <td><?php echo $curso['ano_criacao']; ?></td>
                        <td>
                            <!--<a href="?id=<?php echo $results['idCurso']; ?>">  -->
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#myModal<?php echo $curso['idCurso']; ?>">Detalhes
                            </button>
                            <!--</a> -->
                            
                            <?php if($nivel == "admin"): ?>
                            <a href="<?php echo BASE; ?>curso/editar/<?php echo $curso['idCurso']; ?>"
                                <button type="button" class="btn btn-sm btn-warning">Editar</button>
                            </a>
                            <a href="<?php echo BASE; ?>curso/excluir/<?php echo $curso['idCurso']; ?>"
                               onclick="return confirm('Confirma a exclusão do curso: <?php echo $curso['nome_curso']; ?> ?');">
                                <button type="button" class="btn btn-sm btn-danger">Excluir</button>
                            </a>
                        <?php endif ?>

                        </td>
                    </tr>

                    <!-- Modal --> <!--- modal inicio -->
                    <div class="modal fade" id="myModal<?php echo $curso['idCurso']; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center"
                                        id="myModalLabel">Curso '<?php echo $curso['nome_curso']; ?>'</h4>
                                </div>
                                <div class="modal-body">
                                    <p><b>ID </b><?php echo $curso['idCurso']; ?></p>
                                    <p><b>Sigla </b><?php echo $curso['sigla']; ?></p>
                                    <p><b>Curso </b><br><?php echo $curso['nome_curso']; ?></p>
                                    <p><b>Ano de Início do Curso </b><br><?php echo $curso['ano_criacao']; ?></p>
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
