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
					<?php $answers = $this->answers->get(['evaluation_id' => $v->evaluation_id ]); ?>
					<div class="row">
						<?php foreach ($answers as $value): ?>
						<div class="col-sm-12 col-md-6 col-lg-6">
							<button class="btn btn-outline-dark btn-block btn-lg mt-2 <?= $value->status_id ?>" id="<?= $counter ?>"><?= $value->answer ?></button>
						</div>
						<?php endforeach ?>
					</div>
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
			<?= form_open('inscription/result',['id' => 'resultEval']); ?>
			<?= form_close(); ?>
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
	function next(id) {
	click++;
	alertInfo('Se guardo su respuesta');
	deleteTab(id);
	if (click == t) {
	var r = result();
	if (r >= 8) {
	url = $('#resultEval').attr('action');;
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