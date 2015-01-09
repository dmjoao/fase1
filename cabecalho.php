<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title><?php echo $pageTitle; ?></title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
	</head>
	
	<!-- Inicio do menu -->
	<div class="navbar navbar-default navbar-static-top">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php">Meu primeiro Projeto</a>
	    </div>
	    <div class="collapse navbar-collapse">
	      <ul class="nav navbar-nav">
			<li <?php if ($pageTitle == "Home") {echo 'class="active"';} ?>>
				<a href="index.php">Home</a>
			<li <?php if ($pageTitle == "Empresa") {echo 'class="active"';} ?>>
				<a href="empresa.php">Empresa</a>
			</li>
			<li <?php if ($pageTitle == "Produtos") {echo 'class="active"';} ?>>
				<a href="produtos.php">Produtos</a>
			<li <?php if ($pageTitle == "Serviços") {echo 'class="active"';} ?>>
				<a href="servicos.php">Serviços</a>
			<li <?php if ($pageTitle == "Contato") {echo 'class="active"';} ?>>
				<a href="contato.php">Contato</a>
	      </ul>
	    </div><!--/.nav-collapse -->
	  </div>
	</div>
