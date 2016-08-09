
<div class="images view">
	<h2><?php echo ___('image'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $image->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Job'); ?></dt>
				<dd>
					<?php echo $image->has('job') ? $this->Html->link($image->job->id, ['controller' => 'Jobs', 'action' => 'view', $image->job->id]) : '' ?>
				</dd>
					
				<dt><?= ___('photo'); ?></dt>
				<dd>
					<?php 
					echo h($image->photo);
					?>
				</dd>
				
				<dt><?= ___('photo_dir'); ?></dt>
				<dd>
					<?php 
					echo h($image->photo_dir);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $image], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
