
<div class="jobs index">

	
	<div class="panel panel-default">
		<div class="panel-heading">
				<h2><?= ___('Job Orders'); ?></h2>
		</div>
		<div class="panel-body">
			
			<div class="table-responsive">
        <table class="table table-striped">
        <thead>
            <tr>
                <th ><?= $this->Paginator->sort('status_id','Status') ?></th>
                <th><?= $this->Paginator->sort('dealership_id','Dealership') ?></th>
                <th><?= $this->Paginator->sort('service_id','Service Requiered') ?></th>
                <th><?= $this->Paginator->sort('create_by','Order by') ?></th>
                <th><?= $this->Paginator->sort('created','Date created') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($jobs as $job): ?>
            <tr>
	            <?php 
								switch ($job->status->id) {
									    case 1:
									        echo '<td><i class="fa fa-info-circle" aria-hidden="true"></i> '.$job->status->name.'</td>';
									        break;
									    case 2:
									        echo '<td class="warning"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '.$job->status->name.'</td>';
									        break;
									    case 3:
									        echo '<td class="info"><i class="fa fa-cog fa-spin fa-fw"></i> '.$job->status->name.'</td>';
									        break;
									    case 4:
									        echo '<td class="danger"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> '.$job->status->name.'</td>';
									        break;
									    case 5:
									        echo '<td class="success"><i class="fa fa-check-circle-o" aria-hidden="true"></i> '.$job->status->name.'</td>';
									        break;
									}
	            ?>
               <td><?= $job->has('dealership') ? $job->dealership->name : '';?></td>
               <td><?= $job->has('service') ? $job->service->name : '';?></td>
               <td><?= $job->create_by; ?></td>
	             <td><?= h($job->to_display_timezone('created'));?></td>
	             <td><a href="/jobs/detail/<?=$job->id?>" class="btn btn-default btn-xs">View Details & Set Status</a></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
        </table>
    </div>
			
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