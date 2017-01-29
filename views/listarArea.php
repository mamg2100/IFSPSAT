<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover" id="paginacao">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>descricao</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($area as $areas): ?>
                    <tr>
                        <td><?php echo $areas['idarea']; ?></td>
                        <td><?php echo $areas['descricao']; ?></td>
                        
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#myModal<?php echo $areas['idarea']; ?>">Detalhes
                            </button>                     
                            
                            <?php if($nivel == "admin"): ?>
                            <a href="<?php echo BASE; ?>area/editar/<?php echo $areas['idarea']; ?>"
                                <button type="button" class="btn btn-sm btn-warning">Editar</button>
                            </a>
                            <a href="<?php echo BASE; ?>area/excluir/<?php echo $areas['idarea']; ?>"
                               onclick="return confirm('Confirma a exclusão da Área de Interesse: <?php echo $areas['descricao']; ?> ?');">
                                <button type="button" class="btn btn-sm btn-danger">Excluir</button>
                            </a>
                        <?php endif ?>

                        </td>
                    </tr>

                    <!-- Modal --> <!--- modal inicio -->
                    <div class="modal fade" id="myModal<?php echo $areas['idarea']; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center"
                                        id="myModalLabel"><?php echo $areas['descricao']; ?></h4>
                                </div>
                                <div class="modal-body">
                                    <p><b>ID: </b><?php echo $areas['idarea']; ?></p>
                                    <p><b>Descricao: </b><?php echo $areas['descricao']; ?></p>
                                    <p><b>Quantidade de Trabalhos desenvolvidos nesta Área de interesse </b><br><?php echo $areas['descricao']; ?></p>
                                    <p><b>Qualificados: </b><br><?php echo $areas['descricao']; ?></p>
                                    <p><b>Defendidos: </b><br><?php echo $areas['descricao']; ?></p>
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
