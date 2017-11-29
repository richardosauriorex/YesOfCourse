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
						<div class="col-xs-6 col-md-6 col-lg-6 col-xs-6">
							<h5>Curso</h5>
						</div>
						<div class="col-xs-6 col-md-6 col-lg-6 col-xl-6 text-right">
							<a href="<?php echo site_url().'/admincourses/index' ?>" class="btn btn-success text-white" data-toggle="tooltip" title="Regresar"><i class="fa fa-chevron-left"></i></a>
						</div>
					</div>
				</div>
				<div class="card-body col-xs-12 col-md-12 col-lg-12 col-xl-12">
					<h4 class="card-title">
					<?php echo $course->course_name ?>
					</h4>
					<p>
						<?php echo $course->description ?>
					</p>
				</div>
			</div>
			<div class="card mt-5 mb-5">
				<div class="card-header bg-light border">
					<div class="row">
						<div class="col-xs-6 col-md-6 col-lg-6 col-xs-6">
							<h5>Lecciones</h5>
						</div>
						<div class="col-xs-6 col-md-6 col-lg-6 col-xl-6 text-right">
							<a href="<?php echo site_url().'/adminlessons/create/'.$course->course_id ?>" class="btn text-white btn-success" data-toggle="tooltip" title="Agregar lección"><i class="fa fa-plus"></i></a>
						</div>
					</div>
					
				</div>
				<div class="card-body col-xs-12 col-md-12 col-lg-12 col-xl-12">
					<?php foreach ($lessons as $value): ?>
					<ul class="list-group">
						<li class="list-group-item">
							<div class="row">
								<div class="col-lg-8 col-md-8 col-xs-12">
									<h4>
									<?php echo $value->lesson_title ?>
									</h4>
								</div>
								<div class="col-lg-4 col-md-4 col-xs-12 text-right">
									<a href="<?php echo site_url().'/adminevaluations/index/'.$value->course_id.'/'.$value->lesson_id ?>" class="btn btn-success">Evaluación</a>
									<a href="<?php echo site_url().'/adminlessons/edit/'.$value->course_id.'/'.$value->lesson_id ?>" class="btn btn-warning">Modificar</a>
									<a href="" class="btn btn-danger">Eliminar</a>
								</div>
							</div>
						</li>
					</ul>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</body>
</html>