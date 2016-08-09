<div id="loader">
	<i class="fa fa-refresh fa-spin fa-3x fa-fw"></i>
	<span class="sr-only">Loading...</span>
</div>
<div class="jobs form">
  
    <div class="container">
        
        <?php echo $this->AlaxosForm->create($job, ['type'=>'file', 'role' => 'form']);?>

        <div class="row">
					<div class="col-md-12">
							<legend style="font-size: 12px;">Please fill the follow info, before start <span class="pull-right">Job ID:<?= $job->id ?></span></legend>
	        		<?php
		           	echo '<div class="form-group">';
		            echo $this->AlaxosForm->input('start_notes',['class'=>'form-control']);
		            echo '</div>';
		          ?>
					</div>
				</div>

				
				<div class="row">
					<div class="col-md-12 text-center">
								<?php
					        echo '<div class="form-group">';
					        echo $this->AlaxosForm->button(___('Take this job now'), ['id'=>'send','class' => 'btn btn-primary btn-sm']);
					        echo '</div>';
					        echo $this->AlaxosForm->end(); 
				        ?>
					</div>
        </div>
    </div>
    
</div>
