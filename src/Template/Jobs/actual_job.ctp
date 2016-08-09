<section class="actual_job">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<i class="pe-7s-config pe-4x pe-va pe-spin"></i>
				<p><?= ucwords($current_user['username'])?>, now currently working on:</p>
				<h2> Service: <strong><?=$job->service->name?></strong></h2>
				<h2> Stock#: <strong><?=$job->id?></strong></h2>
				<h2> VIN: <strong><?=$job->vin?></strong></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-6 col-md-6 text-center">
				<h2 class="green"><i class="pe-7s-stopwatch pe-lg"></i><div id="timer"></div></h2>
			</div>
			<div class="col-xs-6 col-md-6 text-center">
				<h2 class="red"><i class="pe-7s-timer pe-lg"></i> <?=$job->est_time?></h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<?= $this->Html->link(
				    'COMPLETE',
				    ['controller' => 'jobs', 'action' => 'finalize', $job->id],
				    ['class' => 'btn btn-success btn-lg']
				);?>
			</div>
		</div>
	</div>
</section>

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

