<div class="col-md-2 menu-lateral">
    <ul class="nav nav-pills nav-stacked">
        <li> <a href="#cadastros" data-toggle="collapse" aria-controls="cadastros">Cadastros</a></li>
        <li>
            <div id="cadastros" class="collapse">
                <ul class="nav nav-pills nav-stacked">
                    <li class="nav nav-pills nav-divider"></li>
                    <li> <a href="<?= base_url('Usuario')?>">Usuários</a></li>
                    <li> <a href="">Cad2</a></li>
                    <li> <a href="">Cad3</a></li>
                    <li> <a href="">Cad4</a></li>
                    <li class="nav nav-pills nav-divider"></li>
                </ul>
            </div>
        </li>
        <?php if(isset($dados['nivel']) && $dados['nivel']==='1') : ?>
            <li> <a href="">Matrícula</a></li>
            <li> <a href="">Turmas</a></li>
            <li> <a href="">Relatórios</a></li>
        <?php endif;?>
    </ul>
</div>