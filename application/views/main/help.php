<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ayuda al usuario</title>
</head>
<body>
	<div class="container">
		<div class="jumbotron bg-dark text-white">
			<h1 class="text-center">Ayuda al usuario</h1>
			<?= form_open('help/helpMe', ['class' => 'container was-validated', 'id' => 'help']); ?>
			<div class="form-group">
				<label>Correo electrónico:</label>
				<input type="email" class="form-control" placeholder="Ingrese su correo electronico" id="email">
			</div>
			<div class="form-group">
				<label>Elija una acción</label>
				<select class="form-control" name="option" id="option">
					<option disabled selected>Elija una ocpión</option>
					<option value="code_auth">Reenviar codigo autorización</option>
					<option value="rest_pass">Restaurar contraseña</option>
				</select>
			</div>
			<div class="text-center">
				<button class="btn btn-success" type="submit">Enviar</button>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			$('#help').on('submit', function(event) {
				event.preventDefault();
				var email = $('#email').val();
				var opt = $('#option option:selected').val();
				var url = $('#help').attr('action');
				var data = {
					email:email,
					opt: opt
				};
				request_ajax(url, data, function(response){
					if(response.success != ''){
						alertSuccess(response.success);
					}else{
						alertDanger(response.danger);
					}
				});
			});
		});
	</script>
</body>
</html>