<!DOCTYPE html>
<html>
	<head>
		<title>YesOfCourse</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header text-right bg-info">
					<a href="<?php echo site_url().'/adminlessons/index' ?>" class="btn fa fa-chevron-left text-danger bg-light" data-toggle="tooltip" title="Regresar"></a>
				</div>
				<div class="card-body col-xs-12 col-md-12 col-lg-12 col-xl-12">
					<h4 class="card-title">Nombre de la lección</h4>
					<p>
						Descripción de la lección
					</p>
				</div>
			</div>
			<div class="card mt-5">
				<div class="card-header text-right bg-dark">
					<a href="" class="btn fa fa-plus text-white bg-primary" data-toggle="modal" data-target="#evaluationCreate" title="Agregar pregunta"></a>
				</div>
				<div class="card-body col-xs-12 col-md-12 col-lg-12 col-xl-12">
					<ul class="list-group">
						<li class="list-group-item">
							<div class="row">
								<div class="col-lg-6 col-md-5 col-xs-12">
									<h5 class="text-truncate">Preguntaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</h5>
								</div>
								<div class="col-lg-6 col-md-7 col-xs-12 text-right mb-2">
									<a href="" class="btn btn-success mt-1" data-toggle="modal" data-target="#answerCreate">Nueva respuesta</a>
									<a href="" class="btn btn-warning mt-1" data-toggle="modal" data-target="#evaluationModify">Modificar</a>
									<a href="" class="btn btn-danger mt-1">Eliminar</a>
								</div>
							</div>
							<div class="container">
								<div class="row">
									<ul class="list-group col-lg-12 col-md-12 col-xs-12">
										<li class="list-group-item">
											<div class="row">
												<div class="col-lg-8 col-md-7 col-xs-12">
													<h6>Respuesta</h6>
												</div>
												<div class="col-lg-4 col-md-5 col-xs-12 text-right">
													<a href="" class="btn btn-warning mt-1" data-toggle="modal" data-target="#answerModify">Modificar</a>
													<a href="" class="btn btn-danger mt-1">Eliminar</a>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</li>
					</ul>
					
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<!-- <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#evaluationCreate">
					Nueva evaluación
					</button>
				</div> -->
				<div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#answerCreate">
					Nueva respuesta
					</button>
				</div>
				<div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#evaluationModify">
					Modificar pregunta
					</button>
				</div>
				<div class="col-sm-6 col-md-3 col-lg-2 col-xl-2">
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#answerModify">
					Modificar respuesta
					</button>
				</div>
			</div>
		</div>
	</body>
</html>