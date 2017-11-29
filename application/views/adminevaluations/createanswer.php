<!DOCTYPE html>
<html>
	<head>
		<title>YesOfCourse</title>
	</head>
	<body>
		<!-- Modal Crear Pregunta -->
		<div class="modal fade" id="answerCreate" role="dialog">
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
							<h2 class="text-center">Nueva respuesta</h2>
							<?= form_open('adminevaluations/createanswer', ['id' => 'createA', 'class' => 'container was-validated']); ?>
							<div class="form-group">
								<div class="row">
									<div class="col">
										<i class="fa fa-comment" aria-hidden="true"></i>
										<label for="nRespuesta">Respuesta</label>
										<input type="text" class="form-control" id="nRespuesta" placeholder="Respuesta" required>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="form-group">
											<i class="fa fa-check" aria-hidden="true"></i>
											<label for="nTipoRespuesta" class="">Tipo de respuesta</label>
											<select class="custom-select col-lg-12 col-xl-12" id="nTipoRespuesta" required>
												<option selected disabled>Elige una opción</option>
												<option value="Correcto">Correcto</option>
												<option value="Incorrecto">Incorrecto</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<?= form_close(); ?>
						</div>
					</div>
					<div class="form-group text-center">
						<button type="button" class="btn btn-info btn-lg">
						Guardar
						</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Termina modal -->
	</body>
</html>
<script >
	$(document).ready(function(){

		$('#addAns').on('click',function(event){
			event.preventDefault();
			console.log('entro');
			$('#answerCreate').modal('show');
		});

		$('#createA').on('submit',function(event){
			event.preventDefault();
			$('#answerCreate').modal('hide');
			var url = $(this).attr('action');
			var data = {
				'answer': $('#nRespuesta').val(),
				'status_id': $('#nTipoRespuesta').val(),
				'evaluation_id': '<?php echo $evaluations->evaluation_id ?>'
			};
			$('#nRespuesta').val('');
			$('#nTipoRespuesta').val('');
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
		});
	});
</script>