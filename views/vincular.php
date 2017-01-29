<input type="hidden" name="data_aluno2" id="data_aluno1">

<div class="well">TCC | Vincular Alunos</div>

<form class="myForm" method="post">
	<input type="date" id="dtMaxDefesa" name="dtMaxDefesa">
	<div class="form-group">
		<label for="">Título do Trabalho </label>
		<input type="text" class="form-control" name="tcc" id="tcc" value="<?php echo $tcc; ?>" readonly>
	</div>
	<div class="form-group">
		<label for="">Aluno 1</label>
		<select name="aluno1" id="aluno1" class="form-control">
			<option value="">Selecione o aluno</option>

			<?php foreach ($alunos as $aluno): ?>
				<option value="<?php echo $aluno['idPessoa'];?>"><?php echo $aluno['nome'];?></option>
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<label for="">Aluno 2</label>
		<select name="aluno2" id="aluno2" class="form-control">
			<option value="">Selecione o aluno</option>
			<?php foreach ($alunos as $aluno): ?>
				<option value="<?php echo $aluno['idPessoa'];?>"><?php echo $aluno['nome'];?></option>
			<?php endforeach ?>
		</select>
	</div>
	<button type="submit" class="btn btn-primary btn-md myButton">Vincular Aluno(s)</button> 
</form>
<script src="<?php echo BASE; ?>assets/js/cadastro_tcc.js"></script>