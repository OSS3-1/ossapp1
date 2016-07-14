<?php $this->assign('title', 'Login'); ?>
<br><br><br>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4 text-center">
	        	<img src="/img/logo.png" width="200">
            <h1 class="text-center login-title"><?= $this->Flash->render('auth') ?></h1>
            <div class="account-wall well">
	            	<div class="text-center">
	            		<i class="fa fa-user fa-5x"></i>
	            	</div>
                <?= $this->Form->create() ?>
                <fieldset>
	                <?= $this->Form->input('username',['class'=>'form-control','placeholder'=>'username','label'=>false]) ?>
									<?= $this->Form->input('password',['class'=>'form-control','type'=>'password','placeholder'=>'Password','label'=>false]) ?>
									<?= $this->Form->button(__('Sign in'),['class'=>'btn btn-lg btn-primary btn-block']); ?>
									<?= $this->Form->end() ?>	
								</fieldset><br>
								<div class="text-center">
	            		<?= $this->Flash->render(); ?>
	            	</div>
            </div>
        </div>
       <br><br><br><br>
    </div>
</div>


