<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Test</title>
	</head>
	<body id="body">
		<div class="container" id="panel">
			<div class="card">
				
			</div>
		</div>
		<!-- modal -->
		<!-- Button trigger modal -->
		<div class="text-center">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
			Launch demo modal
			</button>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content bg-dark text-white">
					<div class="modal-body">
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
						<button type="button" class="btn btn-danger text-white" data-dismiss="modal"><i class="fa fa-close"></i></button>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div id="editor">
				
			</div>
		</div>
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#images">
		Launch demo modal
		</button>
		<!-- Modal -->
		<div class="modal fade" id="images" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Imagenes</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
					</div>
				</div>
			</div>
		</div>
		<script>
		$(function() {
		$('#login').on('submit', function(event) {
		event.preventDefault();
		var url = $('#login').attr('action');
		var email = $('#email').val();
		var password = $('#password').val();
		data = {};
		data.email = email;
		data.password = password;
		request_ajax(url, data);
		$('#exampleModal').modal('toggle');
		});
		function panel() {
		var data = {};
		data.idElement = 'panel';
		var url = "<?= site_url().'/test/ajax_panel';?>"
		request_ajax(url, data);
		}
		panel();
		});
		function panelMostrar(a) {
		$('#exampleModal').modal('toggle');
		}
		</script>
	</body>
</html>