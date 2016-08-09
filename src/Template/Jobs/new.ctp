<section class="new-job">
	<div class="container">
		<div class="row">
			<br><br>
			<div class="col-md-12 text-center">
				<span class="title"><p><i class="pe-7s-plus pe-3x pe-va"></i> Add New Job</p></span>
			</div>
			<div class="col-md-12">
				<?php
          echo $this->AlaxosForm->create($job, ['class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate']);
          echo '<div class="form-group">';
          echo $this->AlaxosForm->label('dealership_id', __('Select a location'), ['class' => 'col-sm-2 control-label']);
          echo '<div class="col-sm-5">';
          echo $this->AlaxosForm->input('dealership_id', ['options' => $dealerships, 'label' => false, 'class' => 'form-control']);
          echo '</div>';
          echo '</div>';
          
          echo '<div class="form-group">';
          echo $this->AlaxosForm->label('service_id', __('Select a service'), ['class' => 'col-sm-2 control-label']);
          echo '<div class="col-sm-5">';
          echo $this->AlaxosForm->input('service_id', ['options' => $services, 'label' => false, 'class' => 'form-control']);
          echo '</div>';
          echo '</div>';
          
          echo '<p><i class="pe-7s-car pe-3x pe-va"></i>  Car Info</p>';
          
          echo '<div class="form-group">';
          echo '<div class="col-sm-5">';
          echo $this->AlaxosForm->input('vin', ['label' => false, 'class' => 'form-control', 'placeholder'=>'Type VIN']);
          echo '</div>';
          echo '</div>';
          
          echo '<div class="form-group">';
          echo '<div class="col-xs-6">';
          echo $this->AlaxosForm->input('images.0.id');
          echo $this->AlaxosForm->input('images.0.photo',['type'=>'file','class'=>'photoUpload form-control-file']);
          echo $this->AlaxosForm->hidden('images.0.tiempo',['value'=>'before']);
          echo '</div>';
          echo '</div>';
          
          echo '<div class="form-group">';
          echo '<div class="col-xs-6">';
          echo $this->AlaxosForm->input('images.1.id');
          echo $this->AlaxosForm->input('images.1.photo',['type'=>'file','class'=>'photoUpload form-control-file']);
          echo $this->AlaxosForm->hidden('images.1.tiempo',['value'=>'before']);
          echo '</div>';
          echo '</div>';
          
          echo '<div class="form-group">';
          echo '<div class="col-xs-6">';
          echo $this->AlaxosForm->input('images.2.id');
          echo $this->AlaxosForm->input('images.2.photo',['type'=>'file','class'=>'photoUpload form-control-file']);
          echo $this->AlaxosForm->hidden('images.2.tiempo',['value'=>'before']);
          echo '</div>';
          echo '</div>';
          
          echo '<div class="form-group">';
          echo '<div class="col-xs-6">';
          echo $this->AlaxosForm->input('images.3.id');
          echo $this->AlaxosForm->input('images.3.photo',['type'=>'file','class'=>'photoUpload form-control-file']);
          echo $this->AlaxosForm->hidden('images.3.tiempo',['value'=>'before']);
          echo '</div>';
          echo '</div>';
          
          
          
          echo $this->AlaxosForm->hidden('create_by', ['value' => $current_user['username'], 'class' => 'form-control']);
          
          echo '<div class="form-group">';
          echo '<div class="col-sm-offset-2 col-sm-5">';
          echo $this->AlaxosForm->button(___('submit'), ['class' => 'btn btn-default']);
          echo '</div>';
          echo '</div>';
                    
          echo $this->AlaxosForm->end(); 
        ?>
			</div>
		</div>
	</div>
</section>
