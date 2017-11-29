<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Curso</title>
	</head>
	<body>
		<div class="container mt-5">
			<!-- information course -->
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6">
							<h3><?= $course->course_name ?></h3>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 text-right">
							<a href="<?= site_url().'/inscription' ?>" class="btn btn-success btn-lg"><i class="fa fa-undo"></i></a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="card-text">
						<p>
							<?= $course->description ?>
						</p>
					</div>
				</div>
			</div>
			<!-- lessons to course -->
			<div class="card mt-5 ">
				<div class="card-header">
					<h3 class="text-center bg-light">Lecciones</h3>
				</div>
				<div class="card-body">
					<?php foreach ($lessons as $value): ?>
					<!-- obtain result to lesson -->
					<?php $result = ($this->results->get(['inscription_id' => $inscription_id, 'lesson_id' => $value->lesson_id, 'qualification >=' => ' 8'])) ?>
					<li class="list-group-item d-flex justify-content-between align-items-center">
						<?= $value->lesson_title ?>
						<div class="text-right">
							<?php if (!empty($result)): ?>
							<span class="btn btn-success" disabled>Aprobada</span>
							<?php else: ?>
							<span class="btn btn-danger">Reprobada</span>
							<?php endif ?>
							<a href="<?= site_url().'/inscription/lesson/'.$inscription_id.'/'.$course->course_id.'/'.$value->lesson_id ?>" class="btn btn-success">Ver lección</a>
						</div>
					</li>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</body>
</html>