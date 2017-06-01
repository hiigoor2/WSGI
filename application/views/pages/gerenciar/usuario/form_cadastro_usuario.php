<div class="col-sm-9 panel panel-default" id="conteudo">
    <form action="Usuario/Gravar" method="post" enctype="multipart/form-data">
        <h3 class="header">Cadastro de Usuários</h3>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group col-sm-8">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-8">
                    <label for="email">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="telefone" name="telefone">
                </div>
                
                <div class="form-group col-sm-6">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular">
                </div>
            </div>
            <div class="col-sm-12">
                <hr style="clear:both"/>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-4">

                    <label for="nivel">Nível</label>
                    <select class="form-control" id="nivel" name="nivel">
                        <option id="0" value="0">Administrador</option>
                        <option id="1" value="0">Orientador Pedagógico</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label for="login">Login</label>
                    <input type="text" class="form-control" id="login" name="login">
                </div>
            </div>
            
            <div class="col-sm-12">
                <div class="form-group col-sm-6">
                    <label for="senha">Senha</label>
                    <input type="text" class="form-control" id="senha" name="senha">
                </div>
                <div class="form-group col-sm-6">
                    <label for="confSenha">Confirmar senha</label>
                    <input type="text" class="form-control" id="confSenha" name="confSenha">
                </div>
            </div>
            
            <div class="col-sm-12">
                <div class="form-group col-sm-8">
                    <label for="foto">Foto</label>
                    <input type="file" class="" id="foto" name="foto" max="1024000">
                </div>
            </div>
            
            <div id="actions" class="col-sm-12">
                <hr />
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="<?= base_url('usuario/gerenciar_usuario') ?>.html" class="btn btn-default">Cancelar</a>
                </div>
            </div>
            <div class="col-sm-12">
                <br>
                <br>
            </div>
        </div>
    </form>
</div>
</div>