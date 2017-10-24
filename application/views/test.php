<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Test</title>
</head>
<body>

	<?= form_open('test/ajax_alert',['id' => 'login', 'class' => 'container was-validated']); ?>
	<h1 class="text-center">Inicio de sesión</h1>
	<div class="form-group">
		<label>Email:</label>
		<input type="email" class="form-control" placeholder="Ingrese un correo electronico" id="email" required>
	</div>
	<div class="form-group">
		<label>Contraseña:</label>
		<input type="password" class="form-control" placeholder="Ingrese contraseña" id="password" required>
	</div>
	<div class="form-group text-center">
		<button type="submit" class="btn btn-info btn-lg">Enviar</button>
	</div>
	<?= form_close();?>
	<div class="container">
		<table class="table">
			
		</table>
	</div>
	<script>
		$(function() {
			console.log();
			$('#login').on('submit', function(event) {
				event.preventDefault();
				var url = $('#login').attr('action');
				var email = $('#email').val();
				var password = $('#password').val();
				data = {};
				data.email = email;
				data.password = password;
				request_ajax(url, data);
			});
		});
	</script>
</body>
</html>