<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Inscripciones</title>
	</head>
	<body>
		<div class="container mt-5">
			<h1>Inscripciones</h1>
			<?php foreach ($inscriptions as $value): ?>
			<!-- obtain information course -->
			<?php $info_course = $this->courses->get(['course_id' => $value->course_id, 'status_id' => 'crs00'], 1); ?>
			<!-- valid the course is actived -->
			<?php if (!empty($info_course)): ?>
			<!-- obtain the number of lessons actually -->
			<?php $count_lessons = $this->lessons->count(['course_id' => $value->course_id]); ?>
			<!-- lessons aprobed -->
			<?php $aprobed_lessons = $this->results->get(['inscription_id' => $value->inscription_id]); ?>
			<!-- progress lessons aprobed -->
			<?php $total = (count($aprobed_lessons) / $count_lessons) * 100 ?>
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<?= $info_course->course_name ?>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="text-right">
								<a href="<?= site_url().'/inscription/course/'.$value->inscription_id.'/'.$value->course_id ?>" class="btn btn-success">Ver Curso</a>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="card-text">
						<?= $info_course->description ?>
					</div>
					<h6>Progreso:</h6>
					<div class="progress">
						<div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar" aria-valuenow="<?= $value->aprobed_lessons ?>" aria-valuemin="0" aria-valuemax="<?= $count_lessons ?>" style="width:<?= $total.'%' ?> "><?= $total.'%'?></div>
					</div>
					<h6>Fecha de inscripción: <?= $value->create_at ?></h6>
				</div>
			</div>
			<?php endif ?>
			<?php endforeach ?>
		</div>
	</body>
</html>