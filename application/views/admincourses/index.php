<!DOCTYPE html>
<html>
	<head>
		<title>YesOfCourse</title>
	</head>
	<body>
		<div class="container mt-5 mb-5">
			<div class="card mt-5">
				<div class="card-header bg-dark text-white">
					<div class="row">
						<div class="col-sm-8 col-md-8 col-lg-8 col-xl-8">
							<h4>Cursos</h4>
						</div>
						<div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 text-right">
							<a type="button" class="btn fa fa-plus text-white bg-primary" href="<?php echo site_url().'/admincourses/create' ?>" title="Nuevo curso"></a>
						</div>
					</div>
				</div>
				<div class="card-body col-xs-12 col-md-12 col-lg-12 col-xl-12">
					<?php foreach ($courses as $value): ?>
					<ul class="list-group">
						<li class="list-group-item">
							<div class="row">
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
									<h4 class="text-truncate">
										<?php echo $value->course_name ?>
									</h4>
								</div>
								<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-right">
									<a type="button" class="btn btn-success mt-1" href="<?php echo site_url().'/adminlessons/index/'.$value->course_id ?>">Ver curso</a>
									<a type="button" class="btn btn-warning mt-1" href="<?php echo site_url().'/admincourses/edit/'.$value->course_id ?>">Modificar</a>
									<a type="button" class="btn btn-danger mt-1 text-white">Eliminar</a>
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