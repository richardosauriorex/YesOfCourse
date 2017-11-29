<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Crear curso</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-body bg-light border">
					<h1 class="text-center">Editar curso</h1>
					<?= form_open('admincourses/proEdit',['id' => 'formCreate', 'class' => 'container was-validated']); ?>
					<input type="hidden" id="course_id" value="<?= $course->course_id ?>">
					<div class="form-group">
						<label>Nombre del curso:</label>
						<input type="text" class="form-control" id="course_name" required value="<?= $course->course_name ?>">
					</div>
					<div class="form-group">
						<label>Breve introducción:</label>
						<textarea rows="5" class="form-control" id="description" required><?= $course->description ?></textarea>
					</div>
					<div class="form-group">
						<label>Categoria:</label>
						<select name="" id="category_id" class="form-control" required>
							<option disabled>Elija una opción</option>
							<?php foreach ($categories as $value):?>
							<?php if ($course->category_id == $value->category_id): ?>
								<option value="<?= $value->category_id ?>" selected><?= $value->category_description ?></option>
							<?php else: ?>
								<option value="<?= $value->category_id ?>"><?= $value->category_description ?></option>
							<?php endif ?>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group">
						<label>Estado:</label>
						<select id="status_id" class="form-control" required>
							<option disabled selected>Elija una opción</option>
							<?php foreach ($status as $value):?>
								<?php if ($course->status_id == $value->status_id): ?>
									<option value="<?= $value->status_id ?>" selected><?= $value->status_description ?></option>
								<?php else: ?>
									<option value="<?= $value->status_id ?>"><?= $value->status_description ?></option>
								<?php endif ?>
							<?php endforeach ?>
						</select>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-info">Guardar Cambios</button>
					</div>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				var form = $('#formCreate');
				form.on('submit', function(event) {
					event.preventDefault();
					/* Act on the event */
					var url = form.attr('action');
					var data = {
						course_id: $('#course_id').val(),
						course_name: $('#course_name').val(),
						description: $('#description').val(),
						category_id: $('#category_id option:selected').val(),
						status_id: $('#status_id option:selected').val()
					};
					request_ajax(url, data, function(response){
						if(response.success){
							alertInfo(response.info);
							setInterval(function(){ window.location = response.url; }, 3000);
						}else{
							alertDanger(response.danger);
						}
					});

				});
			});
		</script>
	</body>
</html>