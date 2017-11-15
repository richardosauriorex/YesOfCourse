<!DOCTYPE html>
<html>
	<head>
		<title>Iniciar sesión</title>
	</head>
	<body>
		<div class="container mt-5">
			<div class="jumbotron bg-dark text-white">
				<h1 class=" text-center">Iniciar sesión</h1>
				<!-- begin form -->
				<?php echo form_open('login/proLogin', ['class' => 'was-validated', 'id' => 'formLogin', 'novalidate']); ?>
				<!-- begin input email -->
				<div class="form-group">
					<label>Correo electrónico:</label>
					<input type="email" class="form-control" id="email" required>
				</div>
				<!-- end input email -->
				<!-- begin input password -->
				<div class="form-group">
					<label>Contraseña:</label>
					<input type="password" minlength="8" maxlength="30" class="form-control" id='password' required>
				</div>
				<!-- end input password -->
				<div class="text-center">
					<button class="btn btn-success btn-lg">Iniciar sesión</button>
				</div>
				<?php echo form_close();?>
				<!-- end form -->
			</div>
		</div>
		<script>
		$(function() {
			$('#formLogin').on('submit', function(event) {
				event.preventDefault();
				/* Act on the event */
				var url = $('#formLogin').attr('action');
				var data = {
					user_email: $('#email').val(),
					password: $('#password').val()
				};
				request_ajax(url, data, function(result){
					if(result.success){
					alertSuccess(result.success);
					setInterval(function(){ window.location = result.url; }, 3000);
					}else{
					alertDanger(result.danger);
					}
				});
			});
		});
		</script>

	</body>
</html>