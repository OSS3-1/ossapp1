<section class="profile">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2><i class="pe-7s-user pe-4x pe-va"></i><?=  h($user->full_name); ?></h2>
			</div>
			<div class="col-md-12 text-center">
				<p>
					Username: <strong><?= h($user->username);?></strong><br>
					Address: <strong><?= h($user->address);?></strong><br>
					Phone: <strong><?= h($user->phone);?></strong><br>
					Email: <strong><?= h($user->email);?></strong><br>
				</p>
			</div>
			
			<div class="col-md-12">
				<div class="panel panel-info">
			  <div class="panel-heading"style="background-color: black">
			    <h3 class="panel-title">Jobs</h3>
			  </div>
			  <div class="panel-body">
				  <table class="table table-striped table-hover ">
					  <thead>
					    <tr>
					      <th>ID</th>
					      <th>Start Date/Time</th>
					      <th>End Date/Time</th>
					      <th>Details</th>
					    </tr>
					  </thead>
					  <tbody>
						  <?php foreach($user->jobs as $job):?>
						  <tr>
					      <td><?= $job->id ?></td>
					      <td><?= $job->start ?></td>
					      <td><?= $job->end ?></td>
					      <td><?php echo $this->Html->link('Details',
										    ['controller' => 'Jobs', 'action' => 'view', $job->id],
										    ['class' => 'btn btn-default']
										); 
								?></td>
					    </tr>
							<?php endforeach; ?>
					  </tbody>
					</table> 

			  </div>
			</div>
			</div>

		</div>
	</div>
</section>

