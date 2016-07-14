
<div class="services form">
    
    <fieldset>
        <legend><?= ___('add service') ?></legend>
        
        <div class="panel panel-default">
            <div class="panel-heading">
            <?php
            echo $this->Navbars->actionButtons(['buttons_group' => 'add']);
            ?>
            </div>
            <div class="panel-body">
            
            <?php
            echo $this->AlaxosForm->create($service, ['class' => 'form-horizontal', 'role' => 'form', 'novalidate' => 'novalidate']);
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('name', __('name'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('name', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('time', __('time'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('time', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('price', __('price'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('price', ['label' => false, 'class' => 'form-control']);
            echo '</div>';
            echo '</div>';
            
            echo '<div class="form-group">';
            echo $this->AlaxosForm->label('description', __('description'), ['class' => 'col-sm-2 control-label']);
            echo '<div class="col-sm-5">';
            echo $this->AlaxosForm->input('description', ['label' => false, 'class' => 'form-control']);
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
