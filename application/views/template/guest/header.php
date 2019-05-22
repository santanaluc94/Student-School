<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta content="IE=edge" http-equiv="X-UA-Compatible" />
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />

	<!-- Bootstrap CSS -->
	<link href="public/css/login.css" rel="stylesheet" type="text/css" />
	<link href="public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="public/css/header.css" rel="stylesheet" type="text/css" />
	<link href="public/css/footer.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<!-- Custom styles for this template -->
	<link href="css/owl.carousel.css" rel="stylesheet">
	<link href="css/owl.theme.default.min.css"  rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">


	<title>Student School</title>
</head>

<body>
	
	<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
	    <div class="container">
	        <a class="navbar-brand" href="?page=index">Student School</a>
	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="navbar-toggler-icon"></span>
	        </button>

	        <div class="collapse navbar-collapse" id="navbarSupportedContent">
	            <ul class="navbar-nav ml-auto">
	                <li class="nav-item">
	                    <a class="nav-link" href="<?= base_url('guest/login'); ?>">Login</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="?page=register">Register</a>
	                </li>
	            </ul>
	        </div>
	    </div>
	</nav>


<!------ Include the above in your HEAD tag ---------->

	<nav class="navbar navbar-expand navbar-dark bg-dark">
		<a href="index.html" class="navbar-brand">Home</a>
		<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<a href="#" class="nav-item active nav-link">Quem somos</a>
				<a href="#" class="nav-item active nav-link">Nossa história</a>
				<a href="#" class="nav item active nav-link">Localidades</a>

				<li class="nav-item dropdown">
					<a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown" role="button"  aria-haspopup="true" aria-expanded="false">
						Nossos serviços
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li><a href="#" class="dropdown-item">Divisão Militar</a></li>
						<li><a href="#" class="dropdown-item">Divisão Corporativa</a></li>
						<li><a href="#" class="dropdown-item">Aplicações para a área de saúde</a><li>
					</ul>
				</li>
			</ul>
	</nav>