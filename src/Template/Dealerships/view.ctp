
<div class="dealerships view">
	<h2><?php echo ___('dealership'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $dealership->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Group'); ?></dt>
				<dd>
					<?php echo $dealership->has('group') ? $this->Html->link($dealership->group->name, ['controller' => 'Groups', 'action' => 'view', $dealership->group->id]) : '' ?>
				</dd>
					
				<dt><?= ___('name'); ?></dt>
				<dd>
					<?php 
					echo h($dealership->name);
					?>
				</dd>
				
				<dt><?= ___('address'); ?></dt>
				<dd>
					<?php 
					echo h($dealership->address);
					?>
				</dd>
				
				<dt><?= ___('phone'); ?></dt>
				<dd>
					<?php 
					echo h($dealership->phone);
					?>
				</dd>
				
				<dt><?= ___('logo'); ?></dt>
				<dd>
					<?php 
					echo h($dealership->logo);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $dealership], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
