<!--
<div class="jumbotron">
  <h3>Legenda</h3>
  	<ul>
	  	<li><h5>Relação de alunos que precisam defender o TCC no período definido.</h5></li>
	  	<li><h5>Relação de alunos orientados por um professor selecionado.</h5></li>
	  	<li><h5>Andamento do trabalho de um aluno selecionado.</h5></li>
	  	<li><h5>Relação de trabalhos de uma área específica.</h5></li>
	  	<li><h5>Relação de alunos e as respectivas datas de jubilamento no curso.</h5></li>
	  	<li><h5>Relação de todos os Trabalhos com status 'disponível'.</h5></li>
	  	<li><h5>Relação de todos os alunos que concluíram o curso e não possuem trabalho qualificado.</h5></li>
	  	<li><h5>Relação de todos os alunos que concluíram o curso e não possuem trabalho defendido.</h5></li>
	  	<li><h5>Relação de todos os alunos com os períodos de defesa e data de jubilamento do curso.</h5></li>
 	</ul>
 </div>
-->

<ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="active"><a href="#pesq1" aria-controls="pesq1" role="tab" data-toggle="tab">Pesquisa 1</a>
  </li>
  <li role="presentation"><a href="#pesq2" aria-controls="pesq2" role="tab" data-toggle="tab">Pesquisa 2</a>
  </li>
  <li role="presentation"><a href="#pesq3" aria-controls="pesq3" role="tab" data-toggle="tab">Pesquisa 3</a></li>
  <li role="presentation"><a href="#pesq4" aria-controls="pesq4" role="tab" data-toggle="tab">Pesquisa 4</a></li>
  <li role="presentation"><a href="#pesq5" aria-controls="pesq5" role="tab" data-toggle="tab">Pesquisa 5</a></li>
  <li role="presentation"><a href="#pesq6" aria-controls="pesq6" role="tab" data-toggle="tab">Pesquisa 6</a></li>
  <li role="presentation"><a href="#pesq7" aria-controls="pesq7" role="tab" data-toggle="tab">Pesquisa 7</a></li>
  <li role="presentation"><a href="#pesq8" aria-controls="pesq8" role="tab" data-toggle="tab">Pesquisa 8</a></li>
  <li role="presentation"><a href="#pesq9" aria-controls="pesq9" role="tab" data-toggle="tab">Pesquisa 9</a></li>
  <li role="presentation"><a href="#pesq10" aria-controls="pesq10" role="tab" data-toggle="tab">Ajuda</a></li>
   
</ul>
<br>

<div class="tab-content"> 
	<div role="tabpanel" class="tab-pane active" id="pesq1">
			<div class="well"><h4><strong></strong></h4>
			<ul>
				<li><h4>Relação de alunos que precisam defender o TCC no período definido.</h4></li>
			</ul>
			</div>
			<form method="POST" action="javascript:void(0)" id="form1" class="form-inline">
				<div class="form-group">
					<input type="date" name="dataInicio" id="dataInicio" class="form-control">
				</div>
				<div class="form-group">
					<input type="date" name="dataFim" id="dataFim" class="form-control">
				</div>
				<input type="submit" name="sub1" id="sub1" value="Buscar" class="btn btn-md btn-primary">
				<input type="submit" name="grafico" id="graf1" value="Grafico" class="btn btn-md btn-info">
			</form>
			<table class="table">
				<tr>
					<th>Aluno 1</th>
					<th>Aluno 2</th>
					<th>Título</th>
				</tr>
				<tr class="p1">	
					
				</tr>
			</table>
	</div>




	<div role="tabpanel" class="tab-pane" id="pesq2">

			<div class="well"><h4><strong></strong></h4>
			<ul>
				<li><h4>Relação de alunos orientados por um professor selecionado.</h4></li>
			</ul>
			</div>
			<form method="POST" action="javascript:void(0)" id="form2" class="form-inline">
				<div class="form-group">
					<select name="professor" id="professor" class="form-control">
					<?php foreach($professores as $professor): ?>
						<option value="<?php echo $professor['idPessoa'];?>"><?php echo $professor['nome'];?></option>
					<?php endforeach; ?>
					</select>
				</div>
				<div class="form-group">

					<select name="ano" id="ano" class="form-control">
					<?php for($i=2009; $i<=2100; $i++): ?>
			
						<option value="<?php echo $i;?>" <?php echo ($i == date('Y'))?'selected':'';?>><?php echo $i;?></option>
					<?php endfor; ?>
				</select>
				</div>
				<input type="submit" name="sub2" id="sub2" value="Buscar" class="btn btn-md btn-primary">
				<input type="submit" name="grafico" id="graf2" value="Grafico" class="btn btn-md btn-info">

			</form>
			<table class="table">
				<tr>
					<th>Aluno 1</th>
					<th>Aluno 2</th>
					<th>Orientador</th>
				</tr>
				<tr class="p2">
					
				</tr>
			</table>
	</div>	

	<div role="tabpanel" class="tab-pane" id="pesq3">
		<div class="well"><h4><strong></strong></h4>
			<ul>
				<li><h4>Andamento do trabalho de um aluno selecionado.</h4></li>
			</ul>
		</div>
		<form method="POST" action="javascript:void(0)" id="form3" class="form-inline">
			<div class="form-group">
				<select name="aluno" id="aluno" class="form-control">
					<?php foreach($alunos as $aluno): ?>
						<option value="<?php echo $aluno['idPessoa'];?>"><?php echo $aluno['nome'];?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<input type="hidden" name="dataInicio3" id="dataInicio3" class="form-control">
			</div>
			<div class="form-group">
				<input type="hidden" name="dataFim3" id="dataFim3" class="form-control">
			</div>
			<input type="submit" name="sub3" id="sub3" value="Buscar" class="btn btn-md btn-primary">
			<input type="submit" name="grafico" id="graf3" value="Grafico" class="btn btn-md btn-info">

		</form>
		<table class="table">
			<tr>
				<th>Nome Aluno</th>
				<th>Titulo</th>	
				<th>Status</th>
				
			</tr>
	
			<tr class="p3">				
			</tr>
		</table>
	</div>

	<div role="tabpanel" class="tab-pane" id="pesq4">
		<div class="well"><h4><strong></strong></h4>
			<ul>
				<li><h4>Relação de trabalhos em uma área específica.</li>
			</ul>
		</div>
		<form method="POST" action="javascript:void(0)" id="form4" class="form-inline">
			<div class="form-group">
				<select name="area" id="area" class="form-control">
				<?php foreach($areas as $area): ?>
					<option value="<?php echo $area['idarea'];?>"><?php echo $area['descricao'];?></option>
				<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<input type="hidden" name="dataInicio4" id="dataInicio4" class="form-control">
			</div>
			<div class="form-group">
				<input type="hidden" name="dataFim4" id="dataFim4" class="form-control">
			</div>
			<input type="submit" name="sub4" id="sub4" value="Buscar" class="btn btn-md btn-primary">
			<input type="submit" name="grafico" id="graf4" value="Grafico" class="btn btn-md btn-info">

		</form>
		<table class="table">
			<tr>
				<th>Área</th>
				<th>Título</th>
			</tr>
			<tr class="p4">
				
			</tr>
		</table>
	</div>
	<div role="tabpanel" class="tab-pane" id="pesq5">
		<div class="well"><h4><strong></strong></h4>
			<ul>
				<li><h4>Relação de alunos e as respectivas datas de jubilamento no curso.</h4></li>
			</ul>
		</div>
		<form method="POST" action="javascript:void(0)" id="form5" class="form-inline">
			<div class="form-group">
				<select name="interval" id="interval" class="form-control">
					<option value="90">90 dias</option>
					<option value="180">180 dias</option>
					<option value="270">9 meses</option>
					<option value="360">1 ano</option>
					<option value="720">2 anos</option>
					<option value="1080">3 anos</option>	
					</select>
			</div>
			<input type="submit" name="sub5" id="sub5" value="Buscar" class="btn btn-md btn-primary">
			<input type="submit" name="grafico" id="graf5" value="Grafico" class="btn btn-md btn-info">
		</form>
		<table class="table">
			<tr>
				<th>Aluno </th>
				<th>Data Jubilamento</th>
			</tr>
			<tr class="p5">
				
			</tr>
		</table>
	</div>

	<div role="tabpanel" class="tab-pane" id="pesq6">
		<div class="well"><h4><strong></strong></h4>
			<ul>
				<li><h4>Relação de todos os Trabalhos com status 'disponível'.</h4></li>
			</ul>
		</div>
	</div>

	<div role="tabpanel" class="tab-pane" id="pesq7">
		<div class="well"><h4><strong></strong></h4>
			<ul>
				<li><h4>Relação de todos os alunos que concluíram o curso e não possuem trabalho qualificado.</h4></li>
			</ul>
		</div>
	</div>
	
	<div role="tabpanel" class="tab-pane" id="pesq8">
		<div class="well"><h4><strong></strong></h4>
			<ul>
				<li><h4>Relação de todos os alunos que concluíram o curso e não possuem trabalho defendido.</h4></li>
			</ul>
		</div>
	</div>
	
	<div role="tabpanel" class="tab-pane" id="pesq9">	
		<div class="well"><h4><strong></strong></h4>
			<ul>
				<li><h4>Relação por aluno selecionado dos períodos de defesa e data de jubilamento do curso.</h4></li>
			</ul>
		</div>
	</div>
	<div role="tabpanel" class="tab-pane" id="pesq10">	
		<div class="well"><h4><strong>Legenda</strong></h4>
			<ul>
				<li><h4>Pesquisa 1 - Relação de alunos que precisam defender o TCC no período definido.</h4></li>
				<li><h4>Pesquisa 2 - Relação de alunos orientados por um professor selecionado.</h4></li>
				<li><h4>Pesquisa 3 - Andamento do trabalho de um aluno selecionado.</h4></li>
				<li><h4>Pesquisa 4 - Relação de trabalhos de uma área específica.</h4></li>
				<li><h4>Pesquisa 5 - Relação de alunos e as respectivas datas de jubilamento no curso.</h4></li>
				<li><h4>Pesquisa 6 - Relação de todos os Trabalhos com status 'disponível'.</h4></li>
				<li><h4>Pesquisa 7 - Relação de todos os alunos que concluíram o curso e não possuem trabalho qualificado.</h4></li>
				<li><h4>Pesquisa 8 - Relação de todos os alunos que concluíram o curso e não possuem trabalho defendido.</h4></li>
				<li><h4>Pesquisa 9 - Relação - por aluno selecionado dos períodos de defesa e data de jubilamento do curso.</h4></li>
			</ul>
		</div>
	</div>

</div> <!-- fim div content -->
<script src="<?php echo BASE ;?>assets/js/relatorio.js"></script>