<div class="container">
<div class="card bg-dark text-white">
	<div class="card-body">
		<h1 class="text-center">Cambiar contraseña</h1>
		<?= form_open('user/proPass',['id' => 'formEditPass', 'class' => 'container was-validated']); ?>
		<div class="form-group">
			<label >Nueva contraseña:</label>
			<input type="password" class="form-control" readonly id="npass">
		</div>
		<div class="form-group">
			<label>Confirmar contraseña:</label>
			<input type="password" class="form-control" readonly id="cpass">
		</div>
		<div class="text-center">
			<button type="submit" id="editPass" class="btn btn-info disabled">Cambiar</button>
			<button id="cancelPass" class="btn btn-danger disabled">Cancelar</button>
		</div>
		<?= form_close(); ?>
	</div>
</div>
</div>
<script>
	$(document).ready(function() {
		var inputs= $('#formEditPass input');
		var btnpass = $('#editPass');
		var cancelPass = $('#cancelPass');
		var form = $('#formEditPass');
		/*input new password*/
		var npass = $('#npass');
		/*input confirm new password*/
		var cpass = $('#cpass');
		inputs.on('dblclick', function(event) {
			event.preventDefault();
			inputs.removeAttr('readonly');
			cancelPass.removeClass('disabled');
		});
		cancelPass.on('click', function(event) {
			event.preventDefault();
			/* Act on the event */
			inputs.attr('readonly', '');
			btnpass.addClass('disabled');
			cancelPass.addClass('disabled');
		});
		cpass.on('focusout', function(event) {
			event.preventDefault();
			/* Act on the event */
			if(npass.val() != cpass.val()){
				alertDanger('Las contraseñas no coinciden, verifiquelas.');
			}else{
				btnpass.removeClass('disabled');
			}
		});
		form.on('submit', function(event) {
			event.preventDefault();
			/* Act on the event */
			var data = {
				password: $('#npass').val()
			};
			var url = form.attr('action');
			request_ajax(url,data,function(response){
				if(response.info != ''){
					alertInfo(response.info);
				}else{
					alertDanger(response.danger);
				}
			});
		});
	});
</script>