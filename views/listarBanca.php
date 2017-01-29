<div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover"  id="paginacao">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Presidente</th>
                    <th>Orientador</th>
                    <th>Coorientador</th>
                    <!--<th>Membro Externo</th>-->
                    <th>Tipo Banca</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($bancas as $banca): ?>
                    <tr>
                        <td><?php echo $banca['idbanca']; ?></td>
                        <td><?php echo $banca['presidente']; ?></td>
                        <td><?php echo $banca['orientador']; ?></td>
                        <td><?php echo $banca['coorientador']; ?></td>
                        <!--<td><?php echo $banca['membroex']; ?></td>-->
                        <td><?php echo $banca['tipobanca']; ?></td>
                        <td>
                            <!--<a href="?id=<?php echo $banca['idbanca']; ?>">  -->
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                    data-target="#myModal<?php echo $banca['idbanca']; ?>">Detalhes
                            </button>                            <!--</a> -->
                            
                            <?php if($nivel == "admin"): ?>
                            <a href="<?php echo BASE; ?>banca/editar/<?php echo $banca['idbanca']; ?>">
                                <button type="button" class="btn btn-sm btn-warning">Editar</button>
                            </a>
                            <a href="<?php echo BASE; ?>banca/excluir/<?php echo $banca['idbanca']; ?>"
                               onclick="return confirm('Confirma a exclusão da banca <?php echo $banca['idbanca']; ?> ?');">
                                <button type="button" class="btn btn-sm btn-danger">Excluir</button>
                            </a>
                        <?php endif ?>
                        </td>
                    </tr>

                    <!-- Modal --> <!--- modal inicio -->
                    <div class="modal fade" id="myModal<?php echo $banca['idbanca']; ?>" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center"
                                        id="myModalLabel">Banca de <?php echo $banca['tipobanca']; ?></h4>
                                </div>
                                <div class="modal-body">
                                    <p><b>ID: </b></br><?php echo $banca['idbanca']; ?></p>
                                    <p><b>Presidente: </b></br><?php echo $banca['presidente']; ?></p>
                                    <p><b>Orientador: </b></br><?php echo $banca['orientador']; ?></p>
                                    <p><b>Coorientador: </b></br><?php echo $banca['coorientador']; ?></p>
                                    <!--<p><b>Membro Externo: </b></br><?php echo $banca['membroex']; ?></p>-->
                                    <p><b>Substituto: </b></br><?php echo $banca['substituto']; ?></p>
                                    <p><b>Tipo de Banca: </b></br><?php echo $banca['tipobanca']; ?></p>
                                    <!--<p><b>ID Membro: </b><?php echo $banca['idMembro']; ?></p>-->
                                    <p><b>TCC Vinculado: </b></br><?php echo $banca['idtcc']; ?></p>
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
