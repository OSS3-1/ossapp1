<section class="welcome-employee">
	<div class="container">
		<div class="row">		
			<div class="col-md-8 col-md-offset-2 text-center">
				<h1>Jobs available on <?= h($group->name);?></h1>
				<?php foreach ($group->dealerships as $dealership): ?>
					<div class="panel panel-primary">
					  <div class="panel-heading"><?= h($dealership->name);?></div>
					  <div class="panel-body">
						  <div class="row">
							  <?php foreach ($dealership->jobs as $job): ?>
								  <?php if($job->status_id == 2): //show only the queue jobs ?>
								  
								  	<div class="col-xs-6">
									  	<div class="job-info">
										    <p>
												  <strong>Service:</strong> <?= $job->service->name ?><br>
												  <strong>Stock#:</strong> <?= $job->id ?><br>
												  <strong>VIN:</strong>
										    </p>
												<?php echo $this->Html->link('Start',
													    ['controller' => 'Jobs', 'action' => 'take', $job->id],
													    ['class' => 'btn-negro']
													); 
												?>
												</div>
								  	</div>
									<?php endif; ?>
							  <?php endforeach; ?>
						  </div>
					  </div>
					</div>
				<?php endforeach; ?>
				</pre>
			</div>
		</div>
	</div>
</section>

