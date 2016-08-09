<?php $this->assign('title', 'Login'); ?>
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 text-center">
	            	<div class="text-center">
	            		<i class="fa fa-user fa-5x"></i>
	            		<p>Type your user name and password</p>
	            	</div>
                <?= $this->Form->create() ?>
                <fieldset>
	                <div class="form-group">
	                <?= $this->Form->input('username',['class'=>'form-control','placeholder'=>'Username','label'=>false]) ?>
	                </div>
	                <div class="form-group">
									<?= $this->Form->input('password',['class'=>'form-control','type'=>'password','placeholder'=>'Password','label'=>false]) ?>
									</div>
									<?= $this->Form->button(__('Sign in'),['class'=>'btn btn-lg btn-danger btn-block']); ?>
									<?= $this->Form->end() ?>	
								</fieldset><br>
								<div class="text-center">
	            		<?= $this->Flash->render(); ?>
	            	</div>

        </div>
       <br><br><br><br>
    </div>
</div>


