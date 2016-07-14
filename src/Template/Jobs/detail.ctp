
<div class="jobs detail container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
		<div class="panel-heading">
			<h2><?php echo 'Job Order' ?></h2>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				
				<dt><?php echo __('Order ID:'); ?></dt>
				<dd><?= $job->id ?></dd>
				
				<dt><?php echo __('Order Date:'); ?></dt>
				<dd><?= $job->created ?></dd>
			
				<dt><?php echo __('Status'); ?></dt>
				<?php 
					switch ($job->status->id) {
						    case 1:
						        echo '<dd><i class="fa fa-info-circle" aria-hidden="true"></i> '.$job->status->name.'</dd>';
						        break;
						    case 2:
						        echo '<dd><span class="label label-warning"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '.$job->status->name.'</dd>';
						        break;
						    case 3:
						        echo '<dd><span class="label label-info"><i class="fa fa-cog fa-spin fa-fw"></i> '.$job->status->name.'<span></dd>';
						        break;
						    case 4:
						        echo '<dd><span class="label label-danger"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> '.$job->status->name.'</span></dd>';
						        break;
						    case 5:
						        echo '<dd class="success"><i class="fa fa-check-circle-o" aria-hidden="true"></i> '.$job->status->name.'</dd>';
						        break;
						}
        ?>
				<dt><?php echo __('Dealership'); ?></dt>
				<dd>
					<?php echo $job->has('dealership') ? $job->dealership->name : '' ?>
				</dd>
					
				<dt><?php echo __('Service'); ?></dt>
				<dd>
					<?php echo $job->has('service') ? $job->service->name : '' ?>
				</dd>
				
				<dt><?php echo __('Service Price'); ?></dt>
				<dd>
					<?php echo $job->has('service') ? $job->service->price : '' ?>
				</dd>
					
				<dt><?= ___('Create by'); ?></dt>
				<dd>
					<?php 
					echo h($job->create_by);
					?>
				</dd>
				
				<dt><?= ___('Approved By'); ?></dt>
				<dd>
					<?php 
					echo h($job->approved_by);
					?>
				</dd>
				
				<dt><?= ___('Employee Assigned'); ?></dt>
				<dd>
					<?php 
					echo h($job->employee_assigned);
					?>
				</dd>
				
				<dt><?= ___('Start Time'); ?></dt>
				<dd>
					<?php 
					echo h($job->start);
					?>
				</dd>
				
				<dt><?= ___('End Time'); ?></dt>
				<dd>
					<?php 
					echo h($job->end);
					?>
				</dd>
				
				<dt><?= ___('Total time'); ?></dt>
				<dd>
					<?php 
					echo h($job->time);
					?>
				</dd>
				
			</dl>

			<div>
			</div>
		</div>
	</div>
		</div>
	</div>
</div>
	
