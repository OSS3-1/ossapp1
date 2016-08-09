
<div class="jobs view">
	<h2><?php echo ___('job'); ?></h2>
	
	<div class="row">
		<div class="col-md-6">
				<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $job->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Status'); ?></dt>
				<dd>
					<?php echo $job->has('status') ? $this->Html->link($job->status->name, ['controller' => 'Statuses', 'action' => 'view', $job->status->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Dealership'); ?></dt>
				<dd>
					<?php echo $job->has('dealership') ? $this->Html->link($job->dealership->name, ['controller' => 'Dealerships', 'action' => 'view', $job->dealership->id]) : '' ?>
				</dd>
					
				<dt><?php echo __('Service'); ?></dt>
				<dd>
					<?php echo $job->has('service') ? $this->Html->link($job->service->name, ['controller' => 'Services', 'action' => 'view', $job->service->id]) : '' ?>
				</dd>
					
				<dt><?= ___('create_by'); ?></dt>
				<dd>
					<?php 
					echo h($job->create_by);
					?>
				</dd>
				
				<dt><?= ___('approved_by'); ?></dt>
				<dd>
					<?php 
					echo h($job->approved_by);
					?>
				</dd>
				
				<dt><?= ___('employee_assigned'); ?></dt>
				<dd>
					<?php 
					echo h($job->employee_assigned);
					?>
				</dd>
				
				<dt><?= ___('start'); ?></dt>
				<dd>
					<?php 
					echo h($job->start);
					?>
				</dd>
				
				<dt><?= ___('end'); ?></dt>
				<dd>
					<?php 
					echo h($job->end);
					?>
				</dd>
				
				<dt><?= ___('time'); ?></dt>
				<dd>
					<?php 
					echo h($job->time);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $job], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Images</strong></div>
				<div class="panel-body">
					<?php if (!empty($job->images)): ?>
						<div class="row">
						<?php foreach ($job->images as $image): ?>
							<div class="col-xs-4 col-md-4">
								<?= $this->Html->image("/files/images/photo/".$image->photo_dir."/thumb_".$image->photo, [
										    "class" => "img-responsive",
										    'url' => ['controller' => 'Images', 'action' => 'view', $image->id]
										]);
								?>
								<p><?= $image->tiempo ?></p>	
							</div>				
						<?php endforeach; ?>
						</div>		
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	
</div>
	
