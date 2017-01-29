<?php if(isset($reunioes) && !empty($reunioes)): ?>
	<!--<div class="container">-->
		<?php if(!empty($tcc)):?>
			<?php foreach ($tcc as $tccs): ?>
				<div class="well titulo_fixo"><h4><?php echo 'Trabalho | '.$tccs['titulo'];?></h4>
			<?php endforeach;?>
		<?php endif;?>

		<?php foreach($reunioes as $reuniao): ?>
		<!--<div class="reuniao">-->
		<div class="jumbotron text-left">
			<h4><span class="reuniao-data"><?php echo $reuniao['data'];?></span></h4>
			<h5>Assunto(s)</h5>
			<!--<p><?php echo $reuniao['assunto'];?></p>-->
			<h5><?php echo substr($reuniao['assunto'],0,300)."...";?></h5>
			<hr>
			<h5>Meta(s)</h5>
			<!--<p><?php //echo $reuniao['metas'];?></p>-->
			<h5><?php echo substr($reuniao['metas'],0,300)."...";?></h5><br>
            <!-- tanto o professor (orientador) quanto o aluno podem editar reunião-->
			<!--<?php //if($nivel == "admin"): ?> -->
	        <a href="<?php echo BASE; ?>reuniao/editar/<?php echo $reuniao['idReuniao']; ?>"
	        <button type="button" class="btn btn-sm btn-warning">Editar</button>
	        </a>
	        <a href="<?php echo BASE; ?>reuniao/excluir/<?php echo $reuniao['idReuniao']; ?>"
	        onclick="return confirm('Confirma a exclusão desta pauta da data <?php echo $reuniao['data']; ?> ?');">
	        <button type="button" class="btn btn-sm btn-danger">Excluir</button>
	        </a>
	        <!-- --><?php //endif ?>		
		</div>
		<?php endforeach;?>

	<!--</div>	-->	
<?php else: ?>
	<?php if(isset($tcc['titulo']) && !empty($tcc['titulo']) ): ?>
		<h1 class="welcome">Não há registros de reuniões para o trabalho titulado:<br>'<?php echo $tcc['titulo']; ?>'.</h1>
	<?php else: ?>
	
		<h1 class="welcome">Não há reunião cadastrada para esse trabalho <a href="<?php echo BASE; ?>reuniao/cadastrar/">Cadastre aqui</a></h1>
	<?php endif;?>
<?php endif ?>

	

	
