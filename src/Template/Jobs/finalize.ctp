
<div class="jobs form">
    
    <div class="container">
        
        <?php echo $this->AlaxosForm->create($job, ['type'=>'file', 'role' => 'form']);?>

        <div class="row">
					<div class="col-md-12">
							<legend>Please fill the follow info, before end this job <span class="pull-right">Job ID:<?= $job->id ?></span></legend>
	        		<?php
		           	echo '<div class="form-group">';
		            echo $this->AlaxosForm->input('end_notes',['class'=>'form-control']);
		            echo '</div>';
		          ?>
					</div>
				</div>
        
				<div class="row">
					<div class="col-md-4">
						<div class="row">
           	<div class="col-xs-4 col-md-6">
					 		<img src="/img/car-1.jpg" class="img-responsive">
					 	</div>
					 	<div class="col-xs-7 col-md-6">
						 	<br><br>
					 		<?php
			           	echo '<div class="form-group">';
			            echo $this->AlaxosForm->input('images.0.id');
			            echo $this->AlaxosForm->input('images.0.photo',['type'=>'file']);
			            echo $this->AlaxosForm->hidden('images.0.tiempo',['value'=>'after']);
			            echo '</div>';
			          ?>
					 	</div>
				 	</div>
					</div>
					<div class="col-md-4">
						<div class="row">
           	<div class="col-xs-4 col-md-6">
					 		<img src="/img/car-2.jpg" class="img-responsive">
					 	</div>
					 	<div class="col-xs-7 col-md-6">
						 	<br><br>
					 		<?php
		           	echo '<div class="form-group">';
		            echo $this->AlaxosForm->input('images.1.id');
		            echo $this->AlaxosForm->input('images.1.photo',['type'=>'file']);
		            echo $this->AlaxosForm->hidden('images.1.tiempo',['value'=>'after']);
		            echo '</div>';
		          ?>
					 	</div>
				 	</div>
					</div>
					<div class="col-md-4">
						<div class="row">
	           	<div class="col-xs-4 col-md-6">
						 		<img src="/img/car-3.jpg" class="img-responsive">
						 	</div>
						 	<div class="col-xs-7 col-md-6">
							 	<br><br>
						 		<?php
			           	echo '<div class="form-group">';
			            echo $this->AlaxosForm->input('images.2.id');
			            echo $this->AlaxosForm->input('images.2.photo',['type'=>'file']);
			            echo $this->AlaxosForm->hidden('images.2.tiempo',['value'=>'after']);
			            echo '</div>';
			          ?>
						 	</div>
					 	</div>
					</div>
					<div class="col-md-4">
						<div class="row">
	           	<div class="col-xs-4 col-md-6">
						 		<img src="/img/car-4.jpg" class="img-responsive">
						 	</div>
						 	<div class="col-xs-7 col-md-6">
							 	<br><br>
						 		<?php
			           	echo '<div class="form-group">';
			            echo $this->AlaxosForm->input('images.3.id');
			            echo $this->AlaxosForm->input('images.3.photo',['type'=>'file']);
			            echo $this->AlaxosForm->hidden('images.3.tiempo',['value'=>'after']);
			            echo '</div>';
			          ?>
						 	</div>
					 	</div>
					</div>
					<div class="col-md-4">
						<div class="row">
	           	<div class="col-xs-4 col-md-6">
						 		<img src="/img/car-5.jpg" class="img-responsive">
						 	</div>
						 	<div class="col-xs-7 col-md-6">
							 	<br><br>
						 		<?php
			           	echo '<div class="form-group">';
			            echo $this->AlaxosForm->input('images.4.id');
			            echo $this->AlaxosForm->input('images.4.photo',['type'=>'file']);
			            echo $this->AlaxosForm->hidden('images.4.tiempo',['value'=>'after']);
			            echo '</div>';
			          ?>
						 	</div>
					 	</div>
					</div>
					
				</div>
				
      <?php
        echo '<div class="form-group text-center">';
        echo $this->AlaxosForm->button(___('End this job now'), ['class' => 'btn btn-primary btn-sm']);
        echo '</div>';
        
        echo $this->AlaxosForm->end(); 
        ?>
        
    </div>
    
</div>
