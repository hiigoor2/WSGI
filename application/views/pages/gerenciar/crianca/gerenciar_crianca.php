<div class="col-sm-9 panel panel-default" id="conteudo">
    <div class="col-md-12">
        <?php if (isset($erros)): ?>
            <div class="alert alert-danger alert-dismissable" role="alert">
                <?php echo $erros; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($info)): ?>
            <div class="alert alert-info alert-dismissable" role="info">
                <?php echo $info; ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('Grupamento/Gravar') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <fieldset>

                <!-- Form Name -->
                <h3><strong>Gerenciar grupamentos:</strong></h3>
                <br/>
                <br/>
                <input type="hidden" value="<?= isset($grupamento) ? $grupamento->getCodigo() : '' ?>" name="codigo"/>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-2 control-label" for="descricao">Descrição</label>  
                    <div class="col-md-4">
                        <input id="descricao" minlength="5" name="descricao" placeholder="Descrição" value="<?= isset($grupamento) ? $grupamento->getDescricao() : '' ?>" class="form-control input-md" required="true" type="text"> 
                    </div>
                </div>
                <br/>
                <br/>
                <!-- Button (Double) -->
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" id="submit" name="submit" class="btn btn-success">Adicionar</button>
                        <a class="btn btn-warning" href="<?= base_url('Grupamento') ?>">Cancelar </a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <div class="col-md-12">
        <h5 class="page-header"><strong><p class="text-primary"><span class="glyphicon glyphicon-list"></span> Grupamentos</strong></p></h5>
        <table class="table table-striped" id="grupamentos">
            <tr class="text-primary">
                <td>
                    <strong>Descrição</strong>
                </td>
                <td class="text-right">
                    <strong>Operações</strong>
                </td>
            </tr>
            <?php if (isset($grupamentos)) : ?>

                <?php foreach ($grupamentos as $var): ?>

                    <tr>
                        <td>
                            <p><?= $var->getDescricao(); ?></p>
                        </td>
                        <td class="text-right">
                            <a href="<?= base_url('Grupamento/Alterar/' . $var->getCodigo()) ?>" class="btn btn-default">Alterar</a>
                            <a href="<?= base_url('Grupamento/Deletar/' . $var->getCodigo()) ?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php endif; ?>
        </table>
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li>
                    <a href="<?= base_url('Grupamento/pag/' . ($pag - $max_registros)) ?>" aria-label="Anterior" style="<?= $btAnterior ?>">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <?php
                $n_pag = 1;
                for ($i = 1; $i <= $qtde_botoes; $i++) :
                    ?>
                    <li><a <?= $pag == $n_pag ? 'style="pointer-events: none; background-color: #CCC;' : '' ?> href="<?= base_url('Grupamento/pag/' . $n_pag) ?>"><?= $i ?></a></li>
                    <?php
                    $n_pag+=$max_registros;
                endfor;
                ?>
                <li>
                    <a href="<?= base_url('Grupamento/pag/' . ($pag + $max_registros)) ?>" aria-label="Próximo" style="<?= $btProximo ?>">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
