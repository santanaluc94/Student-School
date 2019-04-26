<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <meta content="IE=edge" http-equiv="X-UA-Compatible"/ >
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/ >
	
    <link href="_css/login.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="_css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<title>Register</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
	    <div class="container">
	        <a class="navbar-brand" href="#">Jober</a>
	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	            <span class="navbar-toggler-icon"></span>
	        </button>

	        <div class="collapse navbar-collapse" id="navbarSupportedContent">
	            <ul class="navbar-nav ml-auto">
	                <li class="nav-item">
	                    <a class="nav-link" href="index.php">Login</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="form.php">Register</a>
	                </li>

	            </ul>
	        </div>
	    </div>
	</nav>

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form name="my-form" onsubmit="return validform()" action="success.php" method="">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Full Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="text" id="email" class="form-control" name="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone Number</label>
                                <div class="col-md-6">
                                    <input type="text" id="phone" class="form-control" name="phone">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthday" class="col-md-4 col-form-label text-md-right">Birthday</label>
                                <div class="col-md-6">
                                    <input type="date" id="birthday" class="form-control" name="birthday">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                                <div class="col-md-6">
                                    <select type="custom-select" id="gender" class="form-control" name="gender">
									    <option value="1">Male</option>
									    <option value="2">Female</option>
									    <option value="3">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                    	</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php

// $name = $_POST["name"];
// $date = $_POST["date"];
// $email = $_POST["email"];
// $phone = $_POST["phone"];

?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="_js/bootstrap.min.js"></script>
    <script src="_js/register.js"></script>
</body>
</html>