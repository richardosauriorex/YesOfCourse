<div class="container mt-5">
	<div class="card">
		<div class="card-body bg-dark text-white">
			<h1 class="text-center">Cambiar contraseña</h1>
			<?= form_open('help/proChangePass',['id' => 'formReset', 'class' => 'container was-validated']); ?>
			<div class="form-group">
				<label>Numero de registro:</label>
				<input type="text" class="form-control" readonly="" value="<?= $user_id ?>" id="id" required>
			</div>
			<div class="form-group">
				<label>Ingrese nueva contraseña:</label>
				<input type="password" class="form-control" minlength="8" maxlength="30" placeholder="Ingrese nueva contraseña" id="newpass" required>
			</div>
			<div class="form-group">
				<label>Confirme contraseña:</label>
				<input type="password" class="form-control" minlength="8" maxlength="30" placeholder="Confirme nueva contraseña" id="confpass" required>
			</div>
			<div class="text-center">
				<button type="submit" class="btn btn-success disabled" id="btn">CambiarContraseña</button>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		var id = $('#id');
		var pass = $('#newpass');
		var conf = $('#confpass');
		var btn = $('#btn');
		conf.on('focusout', function(event) {
			event.preventDefault();
			if(pass.val() != conf.val()){
				btn.addClass('disabled');
				alertDanger('Las contraseñas no son iguales, verifiquelas.');
			}else{
				btn.removeClass('disabled');
			}
		});
		$('#formReset').on('submit', function(event) {
			event.preventDefault();
			var url = $('#formReset').attr('action');
			var data = {
				user_id:id.val(),
				password:pass.val()
			};
			request_ajax(url, data);
			

		});
	});
	function obtainData(data){
			var response = data;
			if(typeof response != null && typeof response != undefined){
				if(response.success != ''){
					alertSuccess(response.success);
				}else{
					alertDanger(response.danger);
				}
			}else{
				alertDanger('No se pudo cambiar su contraseña. Intentelo nuevamente.');
			}
		}
</script>