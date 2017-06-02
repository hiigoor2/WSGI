<div class="row">
    <div class="col-sm-3">
        <div class="row">
            <nav class="navbar navbar-default sidebar" role="navigation">
                
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>      
                    </div>
                    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                          <!--<li class="active"><a href="#">Gerenciamento<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>-->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gerenciamento <span class="caret"></span></a>
                                <ul class="dropdown-menu forAnimate" role="menu">
                                    <li><a href="<?= base_url('usuario')?>">Usuários</a></li>
                                    <li><a href="<?= base_url('nivel')?>">Níveis</a></li>
                                    <li><a href="<?= base_url('programa')?>">Programas</a></li>
                                    <li><a href="<?= base_url('crianca')?>">Crianças</a></li>
                                    <li><a href="<?= base_url('periodo')?>">Períodos</a></li>
                                    <li><a href="<?= base_url('grupamento')?>">Grupamentos</a></li>
                                    <li><a href="<?= base_url('sala')?>">Salas</a></li>
                                    <li><a href="<?= base_url('turma')?>">Turmas</a></li>
                                    <!--
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Informes</a></li>-->
                                </ul>
                            </li>  
                            <?php if (isset($nivel) && $nivel === '1') : ?>
                                <li> <a href="">Matrícula</a></li>
                                <li> <a href="">Turmas</a></li>
                                <li> <a href="">Relatórios</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
 

            </nav>
        </div>
    </div>