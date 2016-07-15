<section class="welcome-employee">
	<div class="container">
		<div class="row">		
			<div class="col-md-8 col-md-offset-2 text-center">
				<h1>Jobs available on <?= h($group->name);?></h1>
				<?php foreach ($group->dealerships as $dealership): ?>
					<div class="panel panel-default">
					  <div class="panel-heading"><?= h($dealership->name);?></div>
					  <div class="panel-body">
						  <div class="row">
							  <?php foreach ($dealership->jobs as $job): ?>
								  <?php if($job->status_id == 2): //show only the queue jobs ?>
								  	<div class="col-xs-6 col-md-4">
								  		<div class="well">
									    	<h3>Job Info</h3>
										    <p>
												  <strong>Service:</strong> <?= $job->service->name ?><br>
											    <strong>Create by:</strong> <?= $job->create_by ?><br>
											    <strong>Approved by:</strong> <?= $job->approved_by ?>
										    </p>
								    		<?= $this->Form->create(); ?>
								    			<?= $this->Form->input('job'); ?>
								    			<?= $this->Form->input('job2'); ?>
								    			<?= $this->Form->button(__('Take this job'), ['class' => 'btn btn-primary btn-sm']) ?>
												<?= $this->Form->end() ?>
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

