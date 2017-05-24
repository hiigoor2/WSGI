
<div>
	<div>
		<h1>Criando um CRUD com CodeIgniter</h1>
	</div>
	<?php if ($this->session->flashdata('error') == TRUE): ?>
		<p><?php echo $this->session->flashdata('error'); ?></p>
	<?php endif; ?>
	<?php if ($this->session->flashdata('success') == TRUE): ?>
		<p><?php echo $this->session->flashdata('success'); ?></p>
	<?php endif; ?>

	<form method="post" action="<?=base_url('salvar')?>" enctype="multipart/form-data">
		<div>
			<label>Descrição:</label>
			<input type="text" name="sal_descricao" value="<?=set_value('sal_descricao')?>" required/>
		</div>

		<div>
			<label>Capacidade:</label>
                        <input type="number" name="sal_capacidade" value="<?=set_value('sal_capacidade')?>" required/>
		</div>
		<div>
			<label><em>Todos os campos são obrigatórios.</em></label>
			<input type="submit" value="Salvar"/>
		</div>
	</form>
	<div>
		<table>
			<caption>Salas</caption>
			<thead>
				<tr>
					<th>Descrição</th>
					<th>Capacidade</th>
					<th>Operações</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($salas == FALSE): ?>
					<tr><td colspan="2">Nenhum contato encontrado</td></tr>
				<?php else: ?>
					<?php foreach ($salas as $row): ?>
						<tr>
							<td><?= $row['sal_descricao'] ?></td>
							<td><?= $row['sal_capacidade'] ?></td>
							<td><a href="<?= $row['editar_url'] ?>">[Editar]</a> <a href="<?= $row['excluir_url'] ?>">[Excluir]</a></td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
	</div>

</div>