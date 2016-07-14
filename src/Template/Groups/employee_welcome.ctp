<section class="welcome-employee">
	<div class="container">
		<div class="row">		
			<div class="col-md-6 col-md-offset-3 text-center">
				<div class="panel panel-default">
				  <div class="panel-body">
					  <i class="fa fa-user fa-5x" aria-hidden="true"></i>
				    <h1>Welcome <?= ucwords($current_user['username']) ?>  where you work today?</h1>
						<form>
							<fieldset class="form-group">
						    <select class="form-control dynamic_select">
						      <option selected="selected" disabled="">Select Group</option>
						      <?php foreach ($groups as $group): ?>
								      <option value="/employee/joblist/<?=$group->id?>"><?= h($group->name) ?></option>
						      <?php endforeach; ?>
						    </select>
						  </fieldset>
						</form>
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>

