<!DOCTYPE html>
<html>
	<head>
		<title>YesOfCourse</title>
	</head>
	<body>
		<!-- Modal Crear Pregunta -->
		<div class="modal fade" id="answerModify" role="dialog">
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
							<h2 class="text-center">Editar respuesta</h2>
							<?= form_open('adminevaluations/proEditAnswer', ['id' => 'editAnswer', 'class' => 'container was-validated']); ?>
							<input type="hidden" id="ansId">
							<div class="form-group">
								<div class="row">
									<div class="col">
										<i class="fa fa-comment" aria-hidden="true"></i>
										<label for="eRespuesta">Respuesta</label>
										<input type="text" class="form-control" id="eRespuesta" placeholder="Respuesta" required>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="form-group">
											<i class="fa fa-check" aria-hidden="true"></i>
											<label for="eTipoRespuesta" class="">Tipo de respuesta</label>
											<select class="form-control" id="eTipoRespuesta" required>
												<option disabled>Elige una opción</option>
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
<script>
	$(document).ready(function() {
		$('#editAnswer').on('submit', function(event) {
			event.preventDefault();
			/* Act on the event */
			var url = $(this).attr('action');
			var data = {
				'answer_id':$('#ansId').val(),
				'answer':$('#eRespuesta').val(),
				'status_id': $('#eTipoRespuesta option:selected').val(),
			};
			request_ajax(url, data, function(response){
				if (response.info != undefined) {
					alertInfo(response.info);
				}else{
					alertDanger(response.danger);
				}
			});
			$('#answerModify').modal('hide');
			setInterval(function(){ window.location = '<?= site_url().'/adminevaluations/index/'.$course_id.'/'.$lesson->lesson_id?>'}, 2000);
		});
	});
</script>