<?php if(isset($mensagens)) echo $mensagens; ?>
<html>
<head>
<title>Ola Mundo!</title>
</head>
<body>
<div>
<form action="<?= base_url(); ?>cadastro/cadastrar"  method="post">
	<p>Usuário :</p>
	<input type="text" name="usuario" value="" size="50" />
	<p>Senha :</p>
	<input type="text" name="senha" value="" size="50" />
	<p>Confirmar Senha :</p>
	<input type="text" name="senhaconf" value="" size="50" />
	<p>E-mail :</p>
	<input type="text" name="email" value="" size="50" />
	<div><input type="submit" value="Enviar" /></div>
</form> 
<div>
</body>
</html>