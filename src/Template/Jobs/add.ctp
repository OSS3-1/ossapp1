
<div class="jobs form">
    
    <fieldset>
        <legend><?= ___('add job') ?></legend>
        
        <div class="panel panel-default">
            <div class="panel-heading">
            <?php
            echo $this->Navbars->actionButtons(['buttons_group' => 'add']);
            ?>
            </div>
            <div class="panel-body">
            
            <?php
            echo $this->AlaxosForm->create($job, ['class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate']);
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('status_id', __('status_id'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('status_id', ['options' => $statuses, 'label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('dealership_id', __('dealership_id'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('dealership_id', ['options' => $dealerships, 'label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('service_id', __('service_id'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('service_id', ['options' => $services, 'label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('create_by', __('create_by'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('create_by', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('approved_by', __('approved_by'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('approved_by', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('employee_assigned', __('employee_assigned'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('employee_assigned', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('start', __('start'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('start', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('end', __('end'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('end', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('time', __('time'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('time', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo '<div class="col-sm-offset-2 col-sm-5">';
            echo $this->AlaxosForm->button(___('submit'), ['class' => 'btn btn-default']);
            echo '</div>';
            echo '</div>';
            
            echo $this->AlaxosForm->end(); 
            ?>
            </div>
        </div>
        
    </fieldset>
    
</div>
