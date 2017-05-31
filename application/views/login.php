<!--Pulling Awesome Font -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="col-sm-12" id="area_login">
    <div class="col-md-offset-4 col-md-4 col-md-offset-4">
        <?php if (isset($mensagem)): ?>
            <div class="alert alert-info" role="alert">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>
        <form class="form-login" action="<?= base_url('autenticar') ?>" method="post">
            <h4>Bem vindo de volta.</h4>
            <input type="text" name="login" id="login" class="form-control input-sm chat-input" placeholder="login" />
            </br>
            <input type="password" name="senha" id="senha" class="form-control input-sm chat-input" placeholder="senha" />
            </br>
            <button type="submit" value="Logar" class="btn btn-default">

                <span>Logar <i class="fa fa-sign-in"></i></span>

            </button>

        </form>
        </div>
    
</div>
