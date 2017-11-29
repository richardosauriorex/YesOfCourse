<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Lección</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-6">
							<h3><?= $lesson->lesson_title ?></h3>
						</div>
						<div class="col-6 text-right">
							<a href="<?= site_url().'/inscription/course/'.$inscription_id.'/'.$course_id ?>" class="btn btn-success text-white"><i class="fa fa-undo fa-2x"></i></a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div id="quillRead" class="mt-3"></div>
					<div class="text-center mt-2">
						<a href="<?= site_url().'/inscription/evaluation/'.$inscription_id.'/'.$course_id.'/'.$lesson_id ?>" class="btn btn-success btn-lg">Evaluación</a>
					</div>
				</div>
			</div>
			
		</div>
	</body>
</html>
<script>
	$(document).ready(function() {
quillread(<?= $lesson->lesson_description ?>);
});
</script>