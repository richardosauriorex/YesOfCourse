<div class="container">
	<div class="card bg-dark text-white">
		<div class="card-body">
			<h1 class="text-center">Datos del usuario</h1>
			<?= form_open('user/proEdit',['id' => 'formEditUser', 'class' => 'container was-validated']); ?>
			<div class="form-group">
				<label >Nombre(s):</label>
				<input type="text" class="form-control" readonly value="<?= $user->first_name ?>" id="f_n">
			</div>
			<div class="form-group">
				<label>Apellido Paterno:</label>
				<input type="text" class="form-control" readonly value="<?= $user->last_name ?>" id="f_l">
			</div>
			<div class="form-group">
				<label>Apellido Materno:</label>
				<input type="text" class="form-control" readonly value="<?= $user->last_mother_name ?>" id="f_m">
			</div>
			<div class="form-group">
				<label>Correo Electronico:</label>
				<input type="text" class="form-control" disabled value="<?= $user->user_email ?>" id="u_e">
			</div>
			<div class="text-center">
				<button type="submit" id="editUser" class="btn btn-info disabled" disabled>Guardar</button>
				<button id="cancelEdit" class="btn btn-danger disabled" disabled>Cancelar</button>
			</div>
			<?= form_close(); ?>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		var inputs= $('#formEditUser input');
		var save = $('#editUser');
		var cancelBtn = $('#cancelEdit');
		var form = $('#formEditUser');
		inputs.on('dblclick', function(event) {
			event.preventDefault();
			inputs.removeAttr('readonly');
			save.removeClass('disabled');
			cancelBtn.removeClass('disabled');
			save.removeAttr('disabled');
			cancelBtn.removeAttr('disabled');
		});
		cancelBtn.on('click', function(event) {
			event.preventDefault();
			/* Act on the event */
			inputs.attr('readonly', '');
			save.addClass('disabled');
			cancelBtn.addClass('disabled');
			save.attr('disabled','');
			cancelBtn.attr('disabled','');
		});
		form.on('submit', function(event) {
			event.preventDefault();
			/* Act on the event */
			var data = {
				first_name: $('#f_n').val(),
				last_name: $('#f_l').val(),
				last_mother_name: $('#f_m').val()
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