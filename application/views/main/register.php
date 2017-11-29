<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
</head>
<body>
	<div class="container mt-5">
		<div class="jumbotron bg-light border">
			<div class="container">
				<h2 class="text-center">Registrar</h2>
				<?= form_open('register/regUser', ['id' => 'register', 'class' => 'container was-validated']); ?>
				<div class="form-group">
					<label>Nombre(s):</label>
					<input type="text" class="form-control" id="nFirstName" required>
				</div>
				<div class="form-group">
					<label>Apellido Paterno:</label>
					<input type="text" class="form-control" id="nLastName" required>
				</div>
				<div class="form-group">
					<label>Apellido Materno:</label>
					<input type="text" class="form-control" id="nLastMotherName" required>
				</div>
				<div class="form-group">
					<label>Correo electrónico:</label>
					<input type="email" class="form-control" id="nUserEmail" required>
				</div>
				<div class="form-group">
					<label>Password:</label>
					<input type="password" class="form-control" id="nPassword" required>
				</div>
				<div class="text-center">
					<button type="reset" class="btn bg-danger text-white">Borrar</button>
					<button type="submit" class="btn bg-success text-white">Enviar</button>
				</div>
				<?= form_close(); ?>
			</div>
		</div>
	</div>
	
	<script>
		$(function() {
			$('#register').on('submit', function(event) {
				event.preventDefault();
				var data = {
					firstName : $('#nFirstName').val(),
					lastName : $('#nLastName').val(),
					lastMotherName : $('#nLastMotherName').val(),
					userEmail : $('#nUserEmail').val(),
					password : $('#nPassword').val()
				};
				var url = $('#register').attr('action');
				request_ajax(url, data, function(response){
					if(data.success){
						alertSuccess(data.success);
					}else{
						alertDanger(data.danger);
					}
				});
			});
		});
	</script>
</body>
</html>