<!-- JS -->
<?= $this->prepend('scripts', $this->Html->script([
	'/bower_components/jquery/dist/jquery.min',
	'vendor/bootstrap.min',
	'dzsparallaxer',
	'scroller',
	'/bower_components/slick-carousel/slick/slick.min',
	'main'
	]));
?>
<!-- CSS -->
<?= $this->prepend('styles', $this->Html->css([
	'bootstrap.min',
	'/bower_components/animate.css/animate.min',
	'scroller',
	'dzsparallaxer',
	'/bower_components/slick-carousel/slick/slick',
	'/bower_components/slick-carousel/slick/slick-theme',
	'main'
	]));
?>

<!DOCTYPE html>
<html lang="es">
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>Sierra Mazati - <?= $this->fetch('title') ?></title>
		<meta name="description" content="" />
	  <meta name="keywords" content="" />
		<meta name="robots" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="apple-touch-icon" href="apple-touch-icon.png">
	  <?= $this->fetch('styles'); ?>
	  <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
	</head>
	<body class="skroll">
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	
		<?= $this->element('menu') ?>
		
		<?= $this->fetch('content') ?>
		
		<?= $this->element('footer') ?>
		
		<?= $this->fetch('scripts'); ?>
		
	</body>
</html>