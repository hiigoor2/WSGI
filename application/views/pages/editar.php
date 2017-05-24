<div>
	<h1>Criando um CRUD com CodeIgniter</h1>
</div>
<?php if ($this->session->flashdata('error') == TRUE): ?>
	<p><?php echo $this->session->flashdata('error'); ?></p>
<?php endif; ?>
<?php if ($this->session->flashdata('success') == TRUE): ?>
	<p><?php echo $this->session->flashdata('success'); ?></p>
<?php endif; ?>

<form method="post" action="<?=base_url('atualizar')?>" enctype="multipart/form-data">
		<div>
			<label>Descrição:</label>
			<input type="text" name="sal_descricao" value="<?=$sala['sal_descricao']?>" required/>
		</div>
		<div>
			<label>Capacidade:</label>
                        <input type="number" name="sal_capacidade" value="<?=$sala['sal_capacidade']?>" required/>
		</div>
	<div>
		<label><em>Todos os campos são obrigatórios.</em></label>
		<input type="hidden" name="id" value="<?=$sala['id']?>"/>
		<input type="submit" value="Salvar" />
	</div>
</form>