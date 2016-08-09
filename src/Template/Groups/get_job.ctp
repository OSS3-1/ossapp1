<section class="welcome-employee">
	<div class="container">
		<div class="row">		
			<div class="col-md-6 col-md-offset-3 text-center">
				<br><br><br>
						<p><i class="pe-7s-map-marker pe-5x pe-va"></i><p>
				    <h1>Where are you work today?</h1>
						<form>
							<fieldset class="form-group">
						    <select class="form-control dynamic_select">
						      <option selected="selected" disabled="">Select a location</option>
						      <?php foreach ($groups as $group): ?>
								      <option value="/employee/joblist/<?=$group->id?>"><?= h($group->name) ?></option>
						      <?php endforeach; ?>
						    </select>
						  </fieldset>
						</form>
			</div>
		</div>
	</div>
</section>

