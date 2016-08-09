<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>OSS Service - <?= $this->fetch('title') ?></title>
	<meta name="description" content="" />
  <meta name="keywords" content="" />
	<meta name="robots" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  
  <?php 
	  echo $this->AlaxosHtml->includeAlaxosCSS(['block' => false]);
		echo $this->AlaxosHtml->includeBootstrapCSS(['block' => false]);
	?>
	<?= $this->Html->css('pe-icon-7-stroke') ?>
	<?= $this->Html->css('helper') ?>
	<?= $this->Html->css('/bower_components/animate.css/animate.min') ?>
	<?= $this->Html->css('main') ?>
	
	<?= $this->AlaxosHtml->includeAlaxosJQuery(['block' => false]) ?>
	<?= $this->AlaxosHtml->includeAlaxosBootstrapJS(['block' => false]) ?>
	<?= $this->Html->script('datepicker/bootstrap-datepicker.min') ?>
	<?= $this->Html->script('alaxos/alaxos.js') ?>
	<?= $this->Html->script('timer.jquery.min') ?>
	<?= $this->Html->script('jquery.canvasResize') ?>
	<?= $this->Html->script('canvasResize') ?>
	<?= $this->Html->script('/bower_components/wow/dist/wow.min') ?>
	<script src="https://use.fontawesome.com/bd947468f1.js"></script>
</head>
<body>
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<?= $this->element('menu_top');?>
	<?= $this->element('menu_footer');?>
	<?= $this->Flash->render() ?>
	<?= $this->Flash->render('auth') ?>
	
	<section class="main">
		<div class="container">
			<div class="row">
				<?= $this->fetch('content') ?>
			</div>
		</div>
	</section>
	
<script>
	
	new WOW().init();
	
  $(function(){
    // bind change event to select
    $('.dynamic_select').on('change', function () {
        var url = $(this).val(); // get selected value
        if (url) { // require a URL
            window.location = url; // redirect
        }
        return false;
    });
  });
  
  $('#timer').timer({
    seconds: 0<?=$this->fetch('time');?>, //Specify start time in seconds
    format: '%H:%M:%S'
	});
	
	$(document).ready(function() {
		    $('#loader').hide();
		
		    $('#send').submit(function() 
		    {
		        $('#loader').show();
		    })
		    		    
		    $('.photoUpload').change(function(e) {
			    var file = e.target.files[0];
			    alert(file);
			    console.log(file);
		    });
		});
		
</script>



</body>
</html>