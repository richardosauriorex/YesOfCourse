<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- include styles bootstrap v4 -->
<link rel="stylesheet" href="<?php echo base_url()."vendor/bootstrap/dist/css/bootstrap.min.css";?>">
<!-- include font-awesome icons -->
<link rel="stylesheet" href="<?php echo base_url()."vendor/font-awesome/css/font-awesome.min.css";?>">
<!-- begin menu -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	
	<a class="navbar-brand" href="#">YesOfCourse</a>
	<!-- add collapsable menu -->
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<!-- begin content menu -->
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Inicio</a>
			</li>
			<!-- begin dropdown categories -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Usuario
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="<?php echo site_url().'/main/login';?>">Iniciar sesión</a>
					<a class="dropdown-item" href="<?php echo site_url().'/main/register';?>">Registrarse</a>
				</div>
			</li>
			<!-- end dropdown categories -->
			<!-- begin dropdown categories -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Categorias
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="#">Informatica</a>
					<a class="dropdown-item" href="#">Veterinaria</a>
					<a class="dropdown-item" href="#">Contabilidad</a>
				</div>
			</li>
			<!-- end dropdown categories -->
		</ul>
		<!-- begin form search -->
		<form class="form-inline my-2 my-lg-0">
			<input class="form-control" type="text" placeholder="Buscar...">
			<button class="btn btn-dark my-2 my-sm-0" type="submit" ><i class="fa fa-search"></i> Buscar</button>
		</form>
		<!-- end form search -->
	</div>
	<!-- end content menu -->
</nav>
<!-- end menu -->