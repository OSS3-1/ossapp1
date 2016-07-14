
<div class="services view">
	<h2><?php echo ___('service'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $service->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('name'); ?></dt>
				<dd>
					<?php 
					echo h($service->name);
					?>
				</dd>
				
				<dt><?= ___('time'); ?></dt>
				<dd>
					<?php 
					echo h($service->time);
					?>
				</dd>
				
				<dt><?= ___('price'); ?></dt>
				<dd>
					<?php 
					echo h($service->price);
					?>
				</dd>
				
				<dt><?= ___('description'); ?></dt>
				<dd>
					<?php 
					echo h($service->description);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $service], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
