<div class="col-md-8">
<?php if(isset($erros)):?>
    <div class="alert alert-danger" role="alert">
    <?php echo $erros; ?>
    </div>
<?php endif;?>
    
<?php if(isset($mensagens)):?>
    <div class="alert alert-info" role="alert">
    <?php echo $mensagens; ?>
    </div>
<?php endif;?>

<form action="<?= base_url(); ?>cadastro/cadastrar" method="post" >
	<p>Usuário :</p>
        <input class="form-control" type="text" name="usuario" value="" size="50" />
	<p>Senha :</p>
	<input class="form-control" type="text" name="senha" value="" size="50" />
	<p>Confirmar Senha :</p>
	<input class="form-control" type="text" name="senhaconf" value="" size="50" />
	<p>E-mail :</p>
	<input class="form-control" type="text" name="email" value="" size="50" />
	<div><input class="btn btn-active" type="submit" value="Enviar" /></div>
</form> 
</div>
