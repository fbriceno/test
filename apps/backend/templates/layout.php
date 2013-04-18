<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">

<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
	

    <link href="<?php echo url_for('@homepage'); ?>../admin/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo url_for('@homepage'); ?>../admin/css/estilos.css" rel="stylesheet" type="text/css" />
	
	<!--<link href="/sf/web/sfPropelPlugin/css/default.css" media="screen" type="text/css" rel="stylesheet">-->
	<link href="<?php echo url_for('@homepage'); ?>../css/main.css" media="screen" type="text/css" rel="stylesheet">

    <?php include_javascripts() ?>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />
    <meta name="description" content="Administrador De Concursos Facebook" />
    <script type="text/javascript">
	function abrirventana(url,width,height) {
                window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width="+ width +", height="+height);
    }
	</script>
	<!--<link media="screen" type="text/css" href="/extras/slimbox/slimbox2.css" rel="stylesheet">-->
	<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>-->
	<!--<script type="text/javascript" src="/js/slimbox2.js"></script>-->
	<script type="text/javascript" src="/js/jquery-1.6.1.js"></script>
	
	<title>Dashboard </title>
    
    
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />

	<!--[if IE 6]>
		<script type="text/javascript">
			window.location="/ie6/"
		</script>
	<![endif]-->
</head>
<?php if (1){ ?>
<body>

<div id="topBar">
	<ul>
		<li>Identificado como: <b><?php //echo $sf_user->getGuardUser()->getUsername(); ?></b></li>
		<li><a href="<?php echo url_for('@homepage'); ?>/logout" title="Salir">Salir</a></li>
	</ul>
</div><!--/topBar-->

<!--Header-->
<div id="headerWrap">
	<div id="header">
		<h1>Administrador </h1>
	</div>
</div><!--/headerWrap-->

<div id="contenedor">

    <!--Main-->
    <div id="main">
	 <?php  echo $sf_content ?>
	</div><!--/main-->

	<!--Sidebar-->
	<div id="aside">
	
		<h3>Dashboard</h3>
		<ul class="nav">
			
		</ul>
	
		<h3>Registros</h3>
		<ul class="nav">
			

			<li><a href="<?php echo url_for('users'); ?>" title="">Usuarios</a></li>
			<li><a href="<?php echo url_for('puntajes'); ?>" title="">Puntajes</a></li>
					
		</ul>		
		<h3>Datos Usuarios</h3>
		<ul class="nav">
			<li><a href="<?php echo url_for('friends'); ?>" title="">Amigos</a></li>
			<li><a href="<?php echo url_for('groups'); ?>" title="">Grupos</a></li>
			<li><a href="<?php echo url_for('likes'); ?>" title="">Me Gusta</a></li>
			<li><a href="<?php echo url_for('checkins'); ?>" title="">Checkins</a></li>
			<li><a href="<?php echo url_for('interest'); ?>" title="">Interest</a></li>
			<li><a href="<?php echo url_for('pages'); ?>" title="">Paginas</a></li>
			<li><a href="<?php echo url_for('statuses'); ?>" title="">Status</a></li>
		</ul>
		
		<h3>Informes</h3>
		<ul class="nav">
			<li><a href="<?php echo url_for('likes'); ?>" title="">Informe1</a></li>
			<li><a href="<?php echo url_for('likes'); ?>" title="">Informe2</a></li>
			
		</ul>
		
		
		<h3>Administrar</h3>
		<ul class="nav">
			<li <?php if(strstr($sf_request->getUri(),'sf_guard_user')){?> class="current" <?php }?> ><?php //echo link_to('Usuarios', 'sf_guard_user') ?></li> 
			<li><a href="<?php echo url_for('puntajes'); ?>" title="">Puntajes</a></li>
			<li><a href="<?php echo url_for('concurso'); ?>" title="">Concursos</a></li>
		</ul>
		
		
		
		
	</div><!--/aside-->
    

</div><!--/contenedor-->
</body>
<?php } else {  ?>

<body id="s_login">
<!--Top bar-->
<div id="topBar">
</div><!--/topBar-->
<!--Header-->
<div id="headerWrap">
	<div id="header">
		<h1>Administrador </h1>
	</div>
</div><!--/headerWrap-->

<div id="contenedor">

<?php  echo $sf_content ?>

</div><!--/contenedor-->
</body>
<?php } ?>
</html>