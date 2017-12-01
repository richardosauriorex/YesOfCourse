<!DOCTYPE html>
<html>
	<head>
		<title>YesOfCourse</title>
	</head>
	<body>
		<!-- Modal Crear Pregunta -->
		<div class="modal fade" id="answerCreate" role="dialog">
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
							<h2 class="text-center">Nueva respuesta</h2>
							<?= form_open('adminevaluations/proAnswer', ['id' => 'createA', 'class' => 'container was-validated']); ?>
							<input type="hidden" id="eval_id">
							<div class="form-group">
								<div class="row">
									<div class="col">
										<i class="fa fa-comment" aria-hidden="true"></i>
										<label for="nRespuesta">Respuesta</label>
										<input type="text" class="form-control" id="nAns" placeholder="Respuesta" required>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="form-group">
											<i class="fa fa-check" aria-hidden="true"></i>
											<label for="nTipoRespuesta" class="">Tipo de respuesta</label>
											<select class="form-control" id="nTipoRespuesta" required>
												<option selected disabled>Elige una opción</option>
												<option value="ans00">Correcto</option>
												<option value="ans01">Incorrecto</option>
											</select>
										</div>
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
<script >
	$(document).ready(function(){
		$('#createA').on('submit', function(event) {
			event.preventDefault();
			/* Act on the event */
			$('#answerCreate').modal('hide');
			var url = $(this).attr('action');
			var data = {
				'answer': $('#nAns').val(),
				'status_id': $('#nTipoRespuesta option:selected').val(),
				'evaluation_id': $('#eval_id').val()
			};
			$('#nRespuesta').val('');
			request_ajax(url, data, function(response)
			{
				if (response.success != undefined)
				{
					alertSuccess(response.success);
				}else
				{
					alertDanger(response.danger);
				}
			});
			setInterval(function(){ window.location = '<?= site_url().'/adminevaluations/index/'.$course_id.'/'.$lesson->lesson_id?>'}, 2000);
		});
	});

	function createAnswer(eval_id = ''){
		$('#eval_id').val(eval_id);
		$('#answerCreate').modal('show');
	}
</script>