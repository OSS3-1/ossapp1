
<?php if(!is_null($this->request->session()->read('Auth.User.id'))): ?>
	<?php if ($current_user['role'] == 'admin'): ?>
	<section class="menu-footer wow slideInUp">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-6 col-md-6 text-center">
					<a href="/pages/dashboard"><p><i class="pe-7s-keypad pe-2x pe-va"></i></p></a>
				</div>
				<div class="col-xs-6 col-md-6 text-center">
					<a href="/users/profile/<?=$current_user['id']?>"><p><i class="pe-7s-user pe-2x pe-va"></i></p></a>
				</div>
			</div>
		</div>
	</section>
	<?php elseif ($current_user['role'] == 'employee'): ?>
	<section class="menu-footer wow slideInUp">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-6 col-md-6 text-center">
					<a href="/pages/dashboard"><p><i class="pe-7s-keypad pe-2x pe-va"></i></p></a>
				</div>
				<div class="col-xs-6 col-md-6 text-center">
					<a href="/users/profile/<?=$current_user['id']?>"><p><i class="pe-7s-user pe-2x pe-va"></i></p></a>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
<?php endif; ?>