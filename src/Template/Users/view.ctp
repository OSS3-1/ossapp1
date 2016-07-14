
<div class="users view">
	<h2><?php echo ___('user'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['buttons_group' => 'view', 'model_id' => $user->id]);
		?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
			
				<dt><?php echo __('Dealership'); ?></dt>
				<dd>
					<?php echo $user->has('dealership') ? $this->Html->link($user->dealership->name, ['controller' => 'Dealerships', 'action' => 'view', $user->dealership->id]) : '' ?>
				</dd>
					
				<dt><?= ___('username'); ?></dt>
				<dd>
					<?php 
					echo h($user->username);
					?>
				</dd>
				
				<dt><?= ___('photo'); ?></dt>
				<dd>
					<?php 
					echo h($user->photo);
					?>
				</dd>
				
				<dt><?= ___('photo_dir'); ?></dt>
				<dd>
					<?php 
					echo h($user->photo_dir);
					?>
				</dd>
				
				<dt><?= ___('full_name'); ?></dt>
				<dd>
					<?php 
					echo h($user->full_name);
					?>
				</dd>
				
				<dt><?= ___('address'); ?></dt>
				<dd>
					<?php 
					echo h($user->address);
					?>
				</dd>
				
				<dt><?= ___('phone'); ?></dt>
				<dd>
					<?php 
					echo h($user->phone);
					?>
				</dd>
				
				<dt><?= ___('email'); ?></dt>
				<dd>
					<?php 
					echo h($user->email);
					?>
				</dd>
				
				<dt><?= ___('role'); ?></dt>
				<dd>
					<?php 
					echo h($user->role);
					?>
				</dd>
				
			</dl>
			<?php 
			echo $this->element('Alaxos.create_update_infos', ['entity' => $user], ['plugin' => 'Alaxos']);
			?>
			<div>
			</div>
		</div>
	</div>
</div>
	
