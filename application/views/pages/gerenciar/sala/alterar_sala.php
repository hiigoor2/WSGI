<div class="col-sm-9 panel panel-default" id="conteudo">
    <?php if(isset($erros)):?>
        <div class="alert alert-danger alert-dismissable" role="alert">
        <?php echo $erros; ?>
        </div>
    <?php endif;?>

    <?php if(isset($info)):?>
        <div class="alert alert-info alert-dismissable" role="info">
        <?php echo $info; ?>
        </div>
    <?php endif;?>
    
    <form action="<?= base_url('Sala/Gravar')?>" method="post" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>

            <!-- Form Name -->
            <h3>Gerenciar salas:</h3>
            <input type="hidden" value="<?= isset($sala)?$sala->getCodigo():''?>" name="codigo"/>
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="descricao">Descrição</label>  
                <div class="col-md-4">
                    <input id="descricao" name="descricao" placeholder="Descrição" value="<?= isset($sala)?$sala->getDescricao():''?>" class="form-control input-md" required="true" type="text"> 
                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-8">
                    <button type="submit" id="submit" name="submit" class="btn btn-success">Gravar</button>
                    <a class="btn btn-warning" href="<?= base_url('Sala')?>">Cancelar </a>
                </div>
            </div>
            
            
            
        <table class="table table-striped" id="salas">
            <tr class="text-primary">
                <td colspan="2">
                    <strong>Descrição</strong>
                </td>
                <td>
                    <strong>Operações</strong>
                </td>
            </tr>
        <?php if(isset($salas)) :?>
            
            <?php foreach($salas as $var):?>
            
            <tr>
                <td colspan="2">
                    <p><?= $var->getDescricao(); ?></p>
                </td>
                <td>
                    <a href="<?= base_url('Sala/Alterar/'.$var->getCodigo())?>" class="btn btn-default">Alterar</a>
                    <a href="<?= base_url('Sala/Deletar/'.$var->getCodigo())?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        
        <?php endif;?>
            </table>
            <nav aria-label="Page navigation">
                <ul class="pagination">
                  <li>
                    <a href="<?= base_url('Sala/pag/'.($pag-$max_registros))?>" aria-label="Anterior" style="<?=$btAnterior?>">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <?php 
                    $n_pag = 1;
                    for($i =1; $i<=$qtde_botoes;$i++) :?>
                  <li><a href="<?= base_url('Sala/pag/'.$n_pag)?>"><?=$i?></a></li>
                  <?php 
                    $n_pag+=$max_registros;
                    endfor;?>
                  <li>
                    <a href="<?= base_url('Sala/pag/'.($pag+$max_registros))?>" aria-label="Próximo" style="<?= $btProximo?>">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
        </fieldset>
    </form>
</div>
