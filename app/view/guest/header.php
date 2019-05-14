<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
    <meta content="IE=edge" http-equiv="X-UA-Compatible"/ >
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"/ >
	
    <!-- Bootstrap CSS -->
    <link href="../public/css/login.css" rel="stylesheet" type="text/css" />
    <link href="../public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="../public/css/footer.css" rel="stylesheet" type="text/css" />

	<!-- Boostrap JS -->
	<script type="text/javascript" src="../public/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../public/js/jquery.mask.min.js"></script>
    <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>  

    <!-- JS -->
	<script type="text/javascript">
	    $(document).ready(
	    	function() {
	        	$('#cpf').mask('000.000.000-00');
	        	$('#phone').mask('(00) 0000-0000');
	        	$('#birthday').mask('00/00/0000');
	        }
	    )
	</script>  

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
	                    <a class="nav-link" href="?page=login">Login</a>
	                </li>
	                <li class="nav-item">
	                    <a class="nav-link" href="?page=register">Register</a>
	                </li>
	            </ul>
	        </div>
	    </div>
	</nav>
