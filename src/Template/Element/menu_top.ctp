<?php 
 if ($current_user['role'] == 'admin'){

 } elseif ($current_user['role'] == 'employee') {

 } elseif ($current_user['role'] == 'requester') {

 }
?>
<section class="menu-top wow slideInDown">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-3 col-md-3 text-center">

			</div>
			<div class="col-xs-6 col-md-6 text-center">
				<img width="90" src="/img/logo.svg" class="logo">
			</div>
			<div class="col-xs-3 col-md-3 text-right">
				<?php if(!empty($current_user)): ?>
					<a href="/logout"><p><i class="fa fa-sign-out fa-lg" aria-hidden="true"></i></p></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>