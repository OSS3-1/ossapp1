
<section class="actual_job">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<div class="panel panel-primary">
				  <div class="panel-heading">
				    <h3 class="panel-title"><?= ucwords($current_user['username'])?>, now currently working on this job order <i class="fa fa-cog fa-spin" aria-hidden="true"></i></h3>
				  </div>
				  <div class="panel-body">
				    <p> Dealership: <strong><?php echo $job->has('dealership') ? $job->dealership->name : '' ?></strong></p>
				    <p> Service: <strong><?=$job->service->name?></strong></p>
				    <p> Work time:</p>
				    <a href="#" class="btn btn-success disabled" style="font-size: 30px"><div id="timer"></div></a><br><br>
				    <?= $this->Form->create(); ?>
		    			<?= $this->Form->input('job',['value'=>$job->id, 'type'=>'hidden']); ?>
		    			<?= $this->Form->button(__('End this job'), ['class' => 'btn btn-danger btn-lg']) ?>
						<?= $this->Form->end() ?>
						
						<?php 
							$start_date = new \DateTime($job->start); // get start date/time from db
							$end_date  = new \DateTime(date('Y-m-d H:i:s')); // get actual date/time 
							$interval = date_diff($start_date,$end_date); //get the time of the task
							$total_time = $interval->format('%H:%I:%S'); //format time in Hours:Min:Sec
							
							function timeToSeconds($time) {
							        $t = explode(':', $time);
							        return $t[0] * 3600 + $t[1] * 60 + $t[2];
							}
							
							$seconds =  timeToSeconds($total_time);
							$this->prepend('time', $seconds);// send variable to layout
					?>
				  </div>
				</div>

			</div>
		</div>
	</div>
</section>

