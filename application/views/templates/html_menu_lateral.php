<div class="row">
<div class="col-md-2 menu-lateral">
    <h4>Menu</h4>
    <ul class="nav navbar">
        <li><a href="#cadastros" data-toggle="collapse" aria-controls="cadastros">Gerenciamento</a></li>
        <li>
            <div id="cadastros" class="collapse">
                <ul class="nav nav-stacked">
                    <li class="nav nav-divider"></li>
                    <li> <a href="<?= base_url('Usuario')?>">Usuários</a></li>
                    <li> <a href="">Níveis</a></li>
                    <li> <a href="">Criança</a></li>
                    <li> <a href="">Período</a></li>
                    <li> <a href="">Programas</a></li>
                    <li> <a href="">Sala</a></li>
                    <li> <a href="">Turma</a></li>
                    <li class="nav nav-divider"></li>
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