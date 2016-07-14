
<div class="groups view">
	<h2><?php echo ___('group'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $group->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?= ___('name'); ?></dt>
				<dd>
					<?php 
					echo h($group->name);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $group], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
