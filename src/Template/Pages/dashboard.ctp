<?php 
	$this->layout = 'default'; 
	$this->assign('title', '');
	$cell = $this->cell('ActualJob'); 
?>
<section class="dashboard">
	<div class="container">
	<?php if(!is_null($this->request->session()->read('Auth.User.id'))): ?>
		<?php if ($current_user['role'] == 'admin'): ?>
		<div class="row">
			<div class="col-md-12 text-center">
				<h3 class="wow zoomIn">Welcome <?= ucwords($current_user['username']) ?></h3>
			</div>
		</div>
		<div class="row">
			
			<div class="col-md-12">
				<div class="panel panel-default">
				  <div class="panel-body">
				    <div class="row items">
							<div class="col-xs-6 col-md-6 text-center wow zoomIn" data-wow-delay="500ms">
								<a href="/jobs/new" class="new">
								<i class="pe-7s-plus pe-5x"></i>
								<p>Add Job</p>
								</a>
							</div>
							<div class="col-xs-6 col-md-6 text-center wow zoomIn" data-wow-delay="1s">
									<a href="/getjob" class="list">
									<i class="pe-7s-note2 pe-5x"></i>
									<p>View Available Jobs</p>
									</a>
							</div>
						</div>
				  </div>
				</div>
				
				<div class="panel panel-default">
				  <div class="panel-body">
				    <div class="row items">
							<div class="col-xs-6 col-md-6 text-center wow zoomIn" data-wow-delay="500ms">
								<a href="/users/add" class="new">
								<i class="pe-7s-plus pe-5x"></i>
								<p>Add Users</p>
								</a>
							</div>
							<div class="col-xs-6 col-md-6 text-center wow zoomIn" data-wow-delay="1s">
									<a href="/users" class="list">
									<i class="pe-7s-users pe-5x"></i>
									<p>View Users</p>
									</a>
							</div>
						</div>
				  </div>
				</div>
				
				<div class="panel panel-default">
				  <div class="panel-body">
				    <div class="row items">
							<div class="col-xs-6 col-md-6 text-center wow zoomIn" data-wow-delay="500ms">
								<a href="/groups/add" class="new">
								<i class="pe-7s-plus pe-5x"></i>
								<p>Add Work Group</p>
								</a>
							</div>
							<div class="col-xs-6 col-md-6 text-center wow zoomIn" data-wow-delay="1s">
									<a href="/groups" class="list">
									<i class="pe-7s-network pe-5x"></i>
									<p>View Groups</p>
									</a>
							</div>
						</div>
				  </div>
				</div>
				
				<div class="panel panel-default">
				  <div class="panel-body">
				    <div class="row items">
							<div class="col-xs-6 col-md-6 text-center wow zoomIn" data-wow-delay="500ms">
								<a href="/groups/add" class="new">
								<i class="pe-7s-plus pe-5x"></i>
								<p>Add Dealership</p>
								</a>
							</div>
							<div class="col-xs-6 col-md-6 text-center wow zoomIn" data-wow-delay="1s">
									<a href="/groups" class="list">
									<i class="pe-7s-car pe-5x"></i>
									<p>View Dealerships</p>
									</a>
							</div>
						</div>
				  </div>
				</div>
				
			</div>
			
		</div>
		<?php elseif ($current_user['role'] == 'employee'): ?>
		<div class="row">
			<div class="col-md-12 text-center">
				<h3 class="wow zoomIn">Welcome <?= ucwords($current_user['username']) ?></h3>
			</div>
		</div>
		<div class="row">
			
			<div class="col-md-12">
				<div class="panel panel-default">
				  <div class="panel-body">
				    <div class="row items">
							<div class="col-xs-6 col-md-6 text-center wow zoomIn" data-wow-delay="500ms">
								<a href="/jobs/new" class="new">
								<i class="pe-7s-plus pe-5x"></i>
								<p>Add Job</p>
								</a>
							</div>
							<div class="col-xs-6 col-md-6 text-center wow zoomIn" data-wow-delay="1s">
									<a href="/getjob" class="list">
									<i class="pe-7s-note2 pe-5x"></i>
									<p>View Available Jobs</p>
									</a>
							</div>
						</div>
				  </div>
				</div>
	
			</div>
			
		</div>
		<?php endif; ?>
	<?php endif; ?>
	</div>
</section>
