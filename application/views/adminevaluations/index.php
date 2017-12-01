<!DOCTYPE html>
<html>
	<head>
		<title>YesOfCourse</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header bg-light border">
					<div class="row">
						<div class="col-6">
							<h5>Lección</h5>
						</div>
						<div class="col-6 text-right">
							<a href="<?php echo site_url().'/adminlessons/index/'.$course_id.'/'.$lesson->lesson_id ?>" class="btn btn-success text-white" data-toggle="tooltip" title="Regresar"><i class="fa fa-chevron-left"></i></a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<h4 class="card-title">
					<?php echo $lesson->lesson_title ?>
					</h4>
				</div>
			</div>
			<div class="card mt-3 mb-5">
				<div class="card-header bg-light border">
					<div class="row">
						<div class="col-6">
							<h5>Evaluaciones</h5>
						</div>
						<div class="col-6 text-right">
							<a class="btn btn-success text-white" title="Agregar pregunta" id="addEval"><i class="fa fa-plus" aria-hidden="true"></i></a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<?php foreach ($evaluations as $value): ?>
					<div class="card">
						<div class="card-header bg-light border">
							<div class="row">
								<div class="col-lg-6 col-md-5 col-xs-12">
									<h5 class="text-truncate">
									<?php echo $value->question ?>
									</h5>
								</div>
								<div class="col-lg-6 col-md-7 col-xs-12 text-right">
									<a class="btn btn-success mt-1 text-white" onclick="createAnswer(<?= $value->evaluation_id ?>)">Nueva respuesta</a>
									<a class="btn btn-warning mt-1" onclick="editEval(<?= $value->evaluation_id ?>)">Modificar</a>
									<a class="btn btn-danger mt-1 text-white" onclick="deleteEval(<?= $value->evaluation_id ?>)">Eliminar</a>
								</div>
							</div>
						</div>
						<div class="card-body">
							<?php $answer = $this->answers->get(['evaluation_id' => $value->evaluation_id]) ?>
							<div class="row">
								<ul class="list-group col-lg-12 col-md-12 col-xs-12">
									<?php foreach ($answer as $val): ?>
									<li class="list-group-item">
										<div class="row">
											<div class="col-lg-8 col-md-7 col-xs-12">
												<h6><?php echo $val->answer ?></h6>
											</div>
											<div class="col-lg-4 col-md-5 col-xs-12 text-right">
												<?php $status = ($val->status_id == 'ans00') ? 'Correcta' : 'Incorrecta';?>
												<a class="btn btn-outline-dark"><?= $status ?></a>
												<a class="btn btn-warning text-white mt-1" onclick="editAns(<?= $val->answer_id ?>)">Modificar</a>
												<a class="btn btn-danger mt-1 text-white" onclick="deleteAns(<?= $val->answer_id ?> , <?= $value->evaluation_id ?>)">Eliminar</a>
											</div>
										</div>
									</li>
									<?php endforeach ?>
								</ul>
							</div>
						</div>
					</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</body>
</html>
<script>
	function editEval(eval_id = ''){
		var url = "<?= site_url().'/adminevaluations/evalInfo' ?>";
		var data = {
			'evaluation_id': eval_id
		};
		request_ajax(url, data, function(response){
			$('#evalId').val(response.eval.evaluation_id);
			$('#ePregunta').val(response.eval.question);
		});
		$('#evaluationModify').modal('show');
	}

	function editAns(ans_id = ''){
		var url = "<?= site_url().'/adminevaluations/ansInfo' ?>";
		var data = {
			'answer_id': ans_id
		};
		request_ajax(url, data, function(response){
			console.log(response);
			$('#ansId').val(response.ans.evaluation_id);
			$('#eRespuesta').val(response.ans.answer);
		});
		$('#answerModify').modal('show');
	}

	function deleteEval(id_eval = ''){
		var url = "<?= site_url().'/adminevaluations/deleteEvaluation/';?>";
		var data = {
			evaluation_id: id_eval,
			lesson_id: '<?= $lesson->lesson_id ?>'
		};
		request_ajax(url, data, function(response){
			if (response.success != undefined) {
				alertSuccess(response.success);
			}else{
				alertDanger(response.danger);
			}
		});
		setInterval(function(){ window.location = '<?= site_url().'/adminevaluations/index/'.$course_id.'/'.$lesson->lesson_id?>'}, 2000);
	}

	function deleteAns(id_ans = '', eval_id = ''){
		var url = "<?= site_url().'/adminevaluations/deleteAnswer/';?>";
		var data = {
			evaluation_id: eval_id,
			answer_id: id_ans
		};
		request_ajax(url, data, function(response){
			if (response.success != undefined) {
				alertSuccess(response.success);
			}else{
				alertDanger(response.danger);
			}
		});
		setInterval(function(){ window.location = '<?= site_url().'/adminevaluations/index/'.$course_id.'/'.$lesson->lesson_id?>'}, 2000);
	}
</script>