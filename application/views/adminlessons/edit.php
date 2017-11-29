<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Editor Lección</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="card">
				<div class="card-body bg-dark text-white">
					<h1 class="text-center">Editar lección</h1>
					<?= form_open('adminlessons/proEdit',['id' => 'formCreate', 'class' => 'container was-validated']); ?>
					<input type="hidden" id='course_id' value="<?= $lesson->course_id?>">
					<input type="hidden" id='lesson_id' value="<?= $lesson->lesson_id?>">
					<div class="form-group">
						<label>Titulo de la lección:</label>
						<input type="text" class="form-control" id="lesson_title" required value="<?= $lesson->lesson_title ?>">
					</div>
					<div class="bg-white text-dark">
						<div id="editor">
							
						</div>
					</div>
					<div class="text-center mt-1">
						<button type="submit" class="btn btn-success">Editar lección</button>
					</div>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				/*assign description in quill editor*/
		quill.setContents(<?= $lesson->lesson_description ?>);
		var form = $('#formCreate');
		form.on('submit', function(event) {
		event.preventDefault();
		/* Act on the event */
		var url = form.attr('action');
		var data = {
		course_id: $('#course_id').val(),
		lesson_id: $('#lesson_id').val(),
		lesson_title: $('#lesson_title').val(),
		lesson_description: obtainEditor(quill)
		};
		request_ajax(url, data, function(response){
		if(response.info){
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