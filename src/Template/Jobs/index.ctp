<?php
	$date_a = new DateTime('2016-07-14 14:17:39');
	$date_b = new DateTime(date('Y-m-d H:i:s'));
	
	$interval = date_diff($date_a,$date_b);
	
	echo $interval->format('%h:%i');
?>

<div class="jobs index">
	
	<h2><?= ___('jobs'); ?></h2>
	
	<div class="panel panel-default">
		<div class="panel-heading">
		<?php
		echo $this->Navbars->actionButtons(['paginate_infos' => true, 'select_pagination_limit' => true]);
		?>
		</div>
		<div class="panel-body">
			
			<div class="table-responsive">
			
			<table cellpadding="0" cellspacing="0" class="table table-striped table-hover table-condensed">
			<thead>
			<tr class="sortHeader">
				<th></th>
				<th><?php echo $this->Paginator->sort('status_id', ___('status_id')); ?></th>
				<th><?php echo $this->Paginator->sort('dealership_id', ___('dealership_id')); ?></th>
				<th><?php echo $this->Paginator->sort('service_id', ___('service_id')); ?></th>
				<th><?php echo $this->Paginator->sort('create_by', ___('create_by')); ?></th>
				<th><?php echo $this->Paginator->sort('approved_by', ___('approved_by')); ?></th>
				<th><?php echo $this->Paginator->sort('employee_assigned', ___('employee_assigned')); ?></th>
				<th><?php echo $this->Paginator->sort('start', ___('start')); ?></th>
				<th><?php echo $this->Paginator->sort('end', ___('end')); ?></th>
				<th><?php echo $this->Paginator->sort('time', ___('time')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('created', ___('created')); ?></th>
				<th style="width:160px;"><?php echo $this->Paginator->sort('modified', ___('modified')); ?></th>
				<th class="actions"></th>
			</tr>
			<tr class="filterHeader">
				<td>
				<?php
				echo $this->AlaxosForm->checkbox('_Tech.selectAll', ['id' => 'TechSelectAll']);
				
				echo $this->AlaxosForm->create($search_entity, array('url' => [], 'class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate'));
				?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('status_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('dealership_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('service_id');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('create_by');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('approved_by');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('employee_assigned');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('start');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('end');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterField('time');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterDate('created');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->filterDate('modified');
					?>
				</td>
				<td>
					<?php
					echo $this->AlaxosForm->button(___('filter'), ['class' => 'btn btn-default']);
					echo $this->AlaxosForm->end();
					?>
				</td>
			</tr>
			</thead>
			
			<tbody>
			<?php foreach ($jobs as $i => $job): ?>
				<tr>
					<td>
						<?php
						echo $this->AlaxosForm->checkBox('Job.' . $i . '.id', array('value' => $job->id, 'class' => 'model_id'));
						?>
					</td>
					<td>
						<?php echo $job->has('status') ? $this->Html->link($job->status->name, ['controller' => 'Statuses', 'action' => 'view', $job->status->id]) : ''; ?>
					</td>
					<td>
						<?php echo $job->has('dealership') ? $this->Html->link($job->dealership->name, ['controller' => 'Dealerships', 'action' => 'view', $job->dealership->id]) : ''; ?>
					</td>
					<td>
						<?php echo $job->has('service') ? $this->Html->link($job->service->name, ['controller' => 'Services', 'action' => 'view', $job->service->id]) : ''; ?>
					</td>
					<td>
						<?php echo h($job->create_by) ?>
					</td>
					<td>
						<?php echo h($job->approved_by) ?>
					</td>
					<td>
						<?php echo h($job->employee_assigned) ?>
					</td>
					<td>
						<?php echo h($job->start) ?>
					</td>
					<td>
						<?php echo h($job->end) ?>
					</td>
					<td>
						<?php echo h($job->time) ?>
					</td>
					<td>
						<?php echo h($job->to_display_timezone('created')); ?>
					</td>
					<td>
						<?php echo h($job->to_display_timezone('modified')); ?>
					</td>
					<td class="actions">
						<?php 
// 						echo $this->Navbars->actionButtons(['buttons_group' => 'list_item', 'buttons_list_item' => [['view', 'edit', 'delete']], 'model_id' => $job->id]);
						?>
						
						<?php 
// 						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span> ' . __d('alaxos', 'view'), ['action' => 'view', $job->id], ['class' => 'to_view', 'escape' => false]);
// 						echo ' ';
// 						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span> ' . __d('alaxos', 'edit'), ['action' => 'edit', $job->id], ['escape' => false]);
// 						echo ' ';
// 						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span> ' . __d('alaxos', 'delete'), ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id), 'escape' => false]);
						?>
						
						<?php 
						echo $this->Html->link('<span class="glyphicon glyphicon-search"></span>', ['action' => 'view', $job->id], ['class' => 'to_view', 'escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Html->link('<span class="glyphicon glyphicon-pencil"></span>', ['action' => 'edit', $job->id], ['escape' => false]);
						echo '&nbsp;&nbsp;';
						echo $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span>', ['action' => 'delete', $job->id], ['confirm' => __('Are you sure you want to delete # {0}?', $job->id), 'escape' => false]);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
			
			</table>
			
			</div>
			
			<?php
			if(isset($jobs) && $jobs->count() > 0)
			{
				echo '<div class="row">';
				echo '<div class="col-md-1">';
				echo $this->AlaxosForm->postActionAllButton(__d('alaxos', 'delete all'), ['action' => 'delete_all'], ['confirm' => __d('alaxos', 'do you really want to delete the selected items ?')]);
				echo '</div>';
				echo '</div>';
			}
			?>
			
			<div class="paging text-center">
				<ul class="pagination pagination-sm">
				<?php
				$this->Paginator->templates(['ellipsis' => '<li class="ellipsis"><span>...</span></li>']);
				echo $this->Paginator->prev('< ' . __('previous'));
				echo $this->Paginator->numbers(['first' => 2, 'last' => 2]);
				echo $this->Paginator->next(__('next') . ' >');
				?>
				</ul>
			</div>
			
		</div>
	</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function(){
	Alaxos.start();
});
</script>