<?php if(isset($mensagens)) echo $mensagens; ?>

<div class="container">
<div class="row">
<div class="col-md-offset-2 col-md-8 col-md-offset-2">
<form action="<?= base_url(); ?>cadastro/cadastrar"  method="post" >
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
</div>
</div>
