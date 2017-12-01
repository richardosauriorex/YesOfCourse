<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Evaluación</title>
	</head>
	<body>
		<div class="container mt-5">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<?php $counter = 1 ?>
				<?php foreach ($evaluations as $v): ?>
				<li class="nav-item">
					<a class="nav-link" id="<?= "tab-".$counter ?>" data-toggle="tab" href="<?= '#'.$counter ?>" role="tab" aria-controls="<?= $counter ?>" aria-selected="true"><?= 'Pregunta '.$counter ?></a>
				</li>
				<?php $counter++; ?>
				<?php endforeach ?>
				<li class="nav-item">
					<a class="nav-link disabled" id="tab-result" data-toggle="tab" href="#result" role="tab" aria-controls="result" aria-selected="true">Resultado</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<?php $counter = 1 ?>
				<?php foreach ($evaluations as $v): ?>
				<?php $status = ($counter == 1) ? 'show active' : 'fade'; ?>
				<div class="tab-pane <?= $status ?>" id="<?= $counter ?>" role="tabpanel" aria-labelledby="<?= 'tab-'.$counter ?>">
					<h3 class="text-center mt-5"><?= '¿'.$v->question.'?' ?></h3>
					<?php $answers = $this->answers->get(['evaluation_id' => $v->evaluation_id]); ?>
					<?php $correctAns = $this->answers->get(['evaluation_id' => $v->evaluation_id,'status_id' => 'ans00']); ?>
					<?php $incorrectAns = $this->answers->get(['evaluation_id' => $v->evaluation_id,'status_id' => 'ans01']); ?>
					<!-- open question -->
					<?php if (count($correctAns) == 1 && count($incorrectAns) == 0){ ?>
					<div class="container">
						<form action="" id="openAnswer">
							<?php foreach ($correctAns as $a): ?>
							<div class="form-group">
								<label for="">Escriba la respuesta correcta</label>
								<input type="text" class="form-control" id="<?= $a->answer ?>">
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-success" id="<?= $counter ?>">Enviar</button>
							</div>
							<?php endforeach ?>
						</form>
					</div>
					<!-- multiple options -->
					<?php }else if(count($correctAns) >= 2 && count($incorrectAns) > 0){ ?>
					<h5>Elige las respuestas correctas:</h5>
					<form id="multipleForm">
						<input type="hidden" value="<?= count($correctAns); ?>">
						<div class="row">
							<?php foreach ($answers as $a): ?>
							<div class="form-check col-6">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" name="answers[]" value="<?= $a->status_id ?>"><?= $a->answer ?>
								</label>
							</div>
							<?php endforeach ?>
						</div>
						<div class="text-center">
								<button type="submit" id="<?= $counter ?>" class="btn btn-success">Enviar</button>
						</div>
					</form>
					<!-- one answer correct -->
					<?php }else if(count($correctAns) == 1 && count($incorrectAns) > 1){ ?>
					<div class="row">
						<?php foreach ($answers as $a): ?>
						<div class="col-sm-12 col-md-6 col-lg-6">
							<button class="btn btn-outline-dark btn-block btn-lg mt-2 <?= $a->status_id ?>" id="<?= $counter ?>"><?= $a->answer ?>
							</button>
						</div>
						<?php endforeach ?>
					</div>
					<?php } ?>
				</div>
				<?php $counter++; ?>
				<?php endforeach ?>
				<div class="tab-pane <?= $status ?>" id="result" role="tabpanel" aria-labelledby="tab-result">
					<div class="card mt-2" id="cardResult">
						<div class="header">
							<h1 class="text-center"><i id="icon"></i></h1>
						</div>
						<div class="card-body">
							<div class="container">
								<h4 class="text-center"><div id="msgResult"></div></h4>
							</div>
							<div class="text-center">
								<a class="btn btn-primary btn-lg" href="<?= site_url().'/inscription/course/'.$inscription_id.'/'.$course_id ?>">Regresar al curso</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</body>
	</html>
	<script>
	
	$(document).ready(function() {
	var t = <?= count($evaluations) ?>;
	var click = 0;
	var c = 0;
	/*alertRules(t);*/
	
	$('.ans00').on('click', function(event) {
	event.preventDefault();
	/* Act on the event */
	var id = $(this).attr('id');
	c++;
	next(id);
	});
	
	$('.ans01').on('click', function(event) {
	event.preventDefault();
	/* Act on the event */
	var id = $(this).attr('id');
	next(id);
	});
	/*open answer*/
	$('#openAnswer').on('submit', function(event) {
	event.preventDefault();
	/* Act on the event */
	var input = $('#openAnswer input');
	var id = $('#openAnswer button').attr('id');
	if (input.attr('id') == input.val()){
	c++;
	}
	next(id);
	});
	/*multiple answer*/
	$('#multipleForm').on('submit', function(event) {
	event.preventDefault();
	/* Act on the event */
	var correctAns = $('#multipleForm input').val();
	var checkedAnswers = $('#multipleForm .form-check-input:checked');
	var id = $('#multipleForm').attr('id');
	corrects = 0;
	checkedAnswers.each ( function() {
	if ($(this).val() == 'ans00') {
	corrects++;
	};
	});
	console.log(correctAns);
	if(corrects == correctAns){
	console.log('correcta');
	c++;
	}
	next(id);
	});
	function next(id) {
	click++;
	alertInfo('Se guardo su respuesta');
	deleteTab(id);
	if (click == t) {
	var r = result();
	if (r >= 8) {
	url = '<?= site_url().'/inscription/result' ?>';
	data = {
	number_questions: t,
	good_answers: c,
	qualification: r,
	inscription_id: '<?= $inscription_id ?>',
	lesson_id: '<?= $lesson_id ?>',
	};
	request_ajax(url, data, function(response){
	if(response.success != undefined){
	alertSuccess(response.success);
	}else{
	alertDanger(response.danger);
	}
	});
	}
	}
	}
	function deleteTab(id = ''){
	var linkTab = $('#tab-'+id);
	var divTab = $('#'+id);
	divTab.html('');
	linkTab.addClass('disabled');
	linkTab.removeClass('active');
	}
	function result() {
	$('#tab-result').removeClass('disabled');
	$('#tab-result').addClass('active');
	$('#result').addClass('show active');
	var r = (parseFloat(c / t).toFixed(1) * 10);
	if (r >= 8 ) {
	$('#cardResult').addClass('bg-success text-white');
	$('#icon').addClass('fa fa-smile-o fa-5x');
	$('#msgResult').html('Felicidades, aprobaste la lección');
	return r;
	}else{
	$('#cardResult').addClass('bg-danger text-white');
	$('#icon').addClass('fa fa-frown-o fa-5x');
	$('#msgResult').html('No lo lograste, vuelve a intentarlo.');
	return r;
	}
	}
	});
	</script>