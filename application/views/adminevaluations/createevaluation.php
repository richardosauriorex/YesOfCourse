<!DOCTYPE html>
<html>
	<head>
		<title>YesOfCourse</title>
	</head>
	<body>
		<!-- Modal Crear Pregunta -->
		<div class="modal fade" id="evaluationCreate" role="dialog">
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
							<h2 class="text-center">Nueva evaluación</h2>
							<?= form_open('adminevaluations/createevaluation', ['id' => 'createEvaluation', 'class' => 'container was-validated']); ?>
							<div class="form-group">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
								<label for="nPregunta">Pregunta</label>
								<input type="text" class="form-control" id="nPregunta" placeholder="Pregunta" required>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col">
										<i class="fa fa-comment" aria-hidden="true"></i>
										<label for="nRespuesta">Respuesta</label>
										<input type="text" class="form-control" id="nRespuesta" placeholder="Respuesta" required>
									</div>
								</div>
							</div>
							<div class="form-group text-center">
								<button type="button" class="btn btn-info btn-lg">
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