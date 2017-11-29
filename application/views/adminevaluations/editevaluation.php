<!DOCTYPE html>
<html>
	<head>
		<title>YesOfCourse</title>
	</head>
	<body>
		<!-- Modal Crear Pregunta -->
		<div class="modal fade" id="evaluationModify" role="dialog">
			<div class="modal-dialog modal-lg" >
				<div class="modal-content bg-dark text-white">
					<!-- Cuerpo del modal -->
					<div class="modal-body">
						<div class="container">
							<div class="row align-items-end text-right">
								<div class="col">
									<button type="button" class="btn btn-danger text-white" data-dismiss="modal"><i class="fa fa-close"></i></button>
								</div>
							</div>
							<h2 class="text-center">Editar pregunta</h2>
							<?= form_open('adminevaluations/proEdit', ['id' => 'editEvaluation', 'class' => 'container was-validated']); ?>
							<input type="hidden" id="evalId">
							<div class="form-group">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
								<label for="ePregunta" class="">Pregunta</label>
								<input type="text" class="form-control" id="ePregunta" placeholder="Pregunta" required>
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
		$('#editEvaluation').on('submit', function(event) {
			event.preventDefault();
			/* Act on the event */
			var url = $(this).attr('action');
			var data = {
				'evaluation_id': $('#evalId').val(),
				'question': $('#ePregunta').val()
			};
			request_ajax(url, data, function(response){
				if (response.info != undefined) {
					alertInfo(response.info);
				}else{
					alertDanger(response.danger);
				}
			});

		});
	});
</script>