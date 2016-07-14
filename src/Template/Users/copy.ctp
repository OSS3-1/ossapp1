
<div class="users form">
    
    <fieldset>
        <legend><?= ___('copy user') ?></legend>
        
        <div class="panel panel-default">
            <div class="panel-heading">
            <?php
            echo $this->Navbars->actionButtons(['buttons_group' => 'edit', 'model_id' => $user->id]);
            ?>
            </div>
            <div class="panel-body">
            
            <?php
            echo $this->AlaxosForm->create($user, ['class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate']);
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('dealership_id', __('dealership_id'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('dealership_id', ['options' => $dealerships, 'label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('username', __('username'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('username', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('photo', __('photo'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('photo', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('photo_dir', __('photo_dir'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('photo_dir', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('full_name', __('full_name'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('full_name', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('address', __('address'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('address', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('phone', __('phone'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('phone', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('email', __('email'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('email', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('role', __('role'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('role', ['label' => false, 'class' => 'form-control']);
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
