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
				<div class="card-body col-xs-12 col-md-12 col-lg-12 col-xl-12">
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
									<a class="btn btn-success mt-1 text-white " id="addAns">Nueva respuesta</a>
									<a class="btn btn-warning mt-1" id="editEval" ">Modificar</a>
									<a class="btn btn-danger mt-1 text-white">Eliminar</a>
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
												<a class="btn btn-warning mt-1" id="editAns">Modificar</a>
												<a class="btn btn-danger mt-1 text-white">Eliminar</a>
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