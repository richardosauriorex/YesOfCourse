<!DOCTYPE html>
<html>
	<head>
		<title>YesOfCourse</title>
	</head>
	<body>
		<!-- Modal Crear Pregunta -->
		<div class="modal fade" id="evaluationCreate" role="dialog">
			<div class="modal-dialog modal-lg" >
				<div class="modal-content bg-light">
					<!-- Cuerpo del modal -->
					<div class="modal-body">
						<div class="container">
							<div class="row align-items-end text-right">
								<div class="col">
									<button type="button" class="btn btn-danger text-white" data-dismiss="modal"><i class="fa fa-close"></i></button>
								</div>
							</div>
							<h2 class="text-center">Nueva evaluación</h2>
							<?= form_open('adminevaluations/proCreate', ['id' => 'createE', 'class' => 'container was-validated']); ?>
							<div class="form-group">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
								<label for="nPregunta">Pregunta</label>
								<input type="text" class="form-control" id="nPregunta" placeholder="Pregunta" required>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col">
										<i class="fa fa-comment" aria-hidden="true"></i>
										<label for="nRespuesta">Respuesta (Correcta)</label>
										<input type="text" class="form-control" id="nRespuesta" placeholder="Respuesta" required>
									</div>
								</div>
							</div>
							<div class="form-group text-center">
								<button type="submit" class="btn btn-info btn-lg">
								Guardar
								</button>
							</div>
							<?= form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Termina modal -->
	</body>
</html>
<script>
	$(document).ready(function() {
		$('#addEval').on('click',function(event){
			event.preventDefault();
			console.log('entro');
			$('#evaluationCreate').modal('show');
		});

		$('#createE').on('submit',function(event){
			event.preventDefault();
			$('#evaluationCreate').modal('hide');
			var url = $(this).attr('action');
			var data = {
				'question': $('#nPregunta').val(),
				'answer': $('#nRespuesta').val(),
				'lesson_id': '<?php echo $lesson->lesson_id ?>'
			};
			$('#nPregunta').val('');
			$('#nRespuesta').val('');
			request_ajax(url, data, function(response){
				if (response.success != undefined) {
					alertSuccess(response.success);
				}else{
					alertDanger(response.danger);
				}
			});
			setInterval(function(){ window.location = '<?= site_url().'/adminevaluations/index/'.$course_id?>'+'/'+data.lesson_id }, 2000);
		});
	});
</script>