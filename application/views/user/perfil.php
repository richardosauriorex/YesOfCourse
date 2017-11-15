<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Perfil</title>
	</head>
	<body>
		<div class="row container-fluid mt-5 ml-5">
			<div class="col-sm-12 col-md-3 col-lg-2">
				<div class="list-group" id="list-tab" role="tablist">
					<a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Datos del usuario</a>
					<a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Cambiar contraseña</a>
				</div>
			</div>
			<div class="col-sm-12 col-md-9 col-lg-10">
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
						<?php $this->load->view('user/data_user.php');?>
					</div>
					<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
						<?php $this->load->view('user/password.php');?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>