<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- include jquery -->
<script src="<?= base_url()."vendor/jquery/dist/jquery.min.js";?>" ></script>
<!-- include styles bootstrap v4 -->
<link rel="stylesheet" href="<?= base_url()."vendor/bootstrap/dist/css/bootstrap.min.css";?>">
<!-- include font-awesome icons -->
<link rel="stylesheet" href="<?= base_url()."vendor/font-awesome/css/font-awesome.min.css";?>">
<link rel="stylesheet" href="<?= base_url()."vendor/quill/dist/quill.snow.css"; ?>">
<link rel="stylesheet" href="<?= base_url().'assets/css/custom.css';?>">
<!-- begin menu -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="#">YesOfCourse</a>
	<!-- add collapsable menu -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<!-- begin content menu -->
	<div class="collapse navbar-collapse " id="navbarSupportedContent">
		<ul class="navbar-nav ml-auto">
			<?php if (!$this->session->has_userdata('user')): ?>
			<li class="nav-item">
				<a class="btn btn-primary btn-block" href="<?php echo site_url().'/login/';?>">Iniciar sesión</a>
			</li>
			<li class="nav-item">
				<a class="btn btn-success btn-block" href="<?php echo site_url().'/register/';?>">Registrarse</a>
			</li>
			<li class="nav-item">
				<a class="btn btn-warning btn-block" href="<?php echo site_url().'/help/';?>">Ayuda</a>
			</li>
			<?php endif ?>
			<?php if ($this->session->has_userdata('user')): ?>
			<li class="nav-item">
				<a class="btn btn-primary btn-block" href="<?= site_url().'/user/' ?>">Perfil</a>
			</li>
			<li class="nav-item">
				<a class="btn btn-success btn-block" href="<?= site_url().'/admincourses/' ?>">Administrar cursos</a>
			</li>
			<li class="nav-item">
				<a class="btn btn-warning btn-block" href="<?= site_url().'/inscription/' ?>">Inscripciones</a>
			</li>
			<li class="nav-item">
				<?= form_open('user/close_session',['id' => 'formClose']); ?>
				<button class="btn btn-warning btn-block">Cerrar Sesión</button>
				<?= form_close(); ?>
			</li>
			<?php endif ?>
			<li class="nav-item">
				<a class="btn btn-danger btn-block" href="<?= site_url().'/main/search';?>"><i class="fa fa-search"></i> Buscar</a>
			</li>
		</ul>
	</div>
	<!-- end content menu -->
</nav>
<!-- end menu -->
<script>
	$(document).ready(function() {
		var closer = $('#formClose');
		closer.on('submit', function(event) {
			event.preventDefault();
			/* Act on the event */
			var data = {};
			var url = closer.attr('action');
			alertWarning(function(w){
			if(w == true){
			request_ajax(url,data,function(response){
				alertSuccess(response.success);
				setInterval(function(){ window.location = response.url; }, 3000);
			});
			}else{
				alertDanger('La operación se cancelo.');
			}
			});
		});
	});
</script>