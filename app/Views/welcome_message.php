<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/welcom.css">


	<title>Welcome</title>

	<!------------------------------------HEADER----------------------------------------------->
</head>
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">
				<h3 style="color: black">Soluciones IM</h3>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" id="nosotros" href="#">Nosotros</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="contacto" href="#">Contacto</a>
						<i class="fab fa-wpexplorer"></i>
					</li>
					<!-- <li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Iniciar Sesión
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" id="Iniciar_sesion" href="#">Entrar</a>

						</div>
					</li> -->
				</ul>

				<!-- <form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
					<i class="fab fa-wpexplorer"></i>
				</form> -->
				<ul class="form-inline my-2 my-lg-0">
				<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Iniciar Sesión
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" id="Iniciar_sesion" href="<?= base_url('login') ?>">Entrar</a>

						</div>
					</li>
				</ul>

			</div>
		</div>
	</nav>
</header>

<!--------------------------------------------------------BODY----------------------------------------->

<body>
	
		<section id="centro">
			<div class="container">
				<h1 class="text-center">Ecommerce</h1>
				<p>Agencia de Marketing Digital especializada en la generación de leads a través de Facebook y Google. Manejo de redes sociales, Publicidad pagada en Buscadores y Construcción de Sitios web</p>
			</div>
		</section>
	
	<!--------------------------------------------------------FOOTER----------------------------------------->
	<footer class="page-footer font-small indigo">

		<!-- Copyright -->
		<div class="footer-copyright text-center py-3">© 2020 Ecommerce:
			<a href="solucionesim.com.net"> soluciones.com.net</a>
		</div>
		<!-- Copyright -->
	</footer>
	<script src="assets/js/fontawesome.min.js"> </script>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="bootstrap.min.js"></script>
</body>



</html>