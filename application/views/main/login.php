<!DOCTYPE html>
<html>
	<head>
		<title>Iniciar sesión</title>
	</head>
	<body>
		<div class="container">
			<div class="jumbotron bg-dark text-white">
				<h1 class=" text-center">Iniciar sesión</h1>
				<!-- begin form -->
				<?php echo form_open('url', ['class' => 'was-validated', 'id' => 'formVal', 'novalidate']); ?>
				<!-- begin input email -->
				<div class="form-group">
					<label>Correo electrónico:</label>
					<input type="email" class="form-control" id="email" required>
					<div class="text-muted">
						Ingrese un correo electronico valido
					</div>
				</div>
				<!-- end input email -->
				<!-- begin input password -->
				<div class="form-group">
					<label>Correo electrónico:</label>
					<input type="password" class="form-control" id='password' required>
					<div class="text-muted">
						Ingrese un contraseña de acceso
					</div>
				</div>
				<!-- end input password -->
				<div class="text-center">
					<button class="btn btn-success btn-lg" >Iniciar sesión</button>
				</div>
				<?php echo form_close();?>
				<!-- end form -->
				<div class="prueba">
					
				</div>
			</div>
		</div>
		<script>
		$(function() {
			/*add event to element with id email*/
			$("#email").on('focusout', function(e) {
				/*create var to send in ajax request*/
				var email = $("#email").val();
				var url = "<?php echo site_url().'/main/test';?>";
				var data = {email: email};
				/*execute function ajax_code*/
				ajax_cod(url, data);
			});
		});
		</script>
	</body>
</html>