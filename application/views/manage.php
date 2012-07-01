<div class="row">
	<div class="span5 offset1">
		<div class="page-header">
			<h1>Add new Hiwi</h1>
		</div>
		<?php echo form_open('manage/add_hiwi', 'class="form-horizontal"'); ?>
			<fieldset>
			  <div class="control-group">
			    <label for="last_name" class="control-label">Last Name</label>
			    <div class="controls">
			      <input type="text" id="last_name" class="input-large" name="last_name">
			    </div>            
			  </div>
			  <div class="control-group">
			    <label for="first_name" class="control-label">First Name</label>
			    <div class="controls">
			      <input type="text" id="first_name" class="input-large" name="first_name">
			    </div>   
			  </div>
			  <div class="control-group">
			    <label for="pwd" class="control-label">Password</label>
			    <div class="controls">
			      <input type="text" id="pwd" class="input-medium" name="pwd">
			    </div>   
			  </div>
			  <div class="control-group">
			    <label for="responsibilities" class="control-label">Responsibilities</label>
			    <div class="controls">
			      <input type="text" id="responsibilities" class="input-xlarge" name="responsibilities">
			    </div>   
			  </div>           	  			   
			  <div class="control-group warning">
			    <label for="confirm" class="control-label">Confirm</label>
			    <div class="controls">
			      <input type="password" id="confirm" class="input-medium" name="confirm">
			    </div>   
			  </div> 
			  <div class="form-actions">
			    <button class="btn btn-large btn-primary" type="submit">Add Hiwi</button>
			  </div>
			</fieldset>
		<?php echo form_close(); ?>		
	</div>
	<div class="span5">
		<div class="page-header">
			<h1>Add new Contract</h1>
		</div>
		<?php echo form_open('manage/add_contract', 'class="form-horizontal"'); ?>
			<fieldset>
			<div class="control-group">
	            <label for="select_hiwi" class="control-label">For</label>
	            <div class="controls">
	              <select id="select_hiwi" name="id">
	              	<?php foreach($hiwis as $hiwi): ?>
	                <option value="<?php echo $hiwi->id; ?>"><?php echo $hiwi->last_name.", ".$hiwi->first_name; ?></option>
					<?php endforeach; ?>
	              </select>
	            </div>
			  </div>
			  <div class="control-group">
			    <label for="start_date" class="control-label">Start Date</label>
			    <div class="controls">
			      <input type="text" id="start_date" class="input-medium datepicker" name="start_date" autocomplete="off">
			    </div>   
			  </div> 	
			  <div class="control-group">
			    <label for="end_date" class="control-label">End Date</label>
			    <div class="controls">
			      <input type="text" id="end_date" class="input-medium datepicker" name="end_date" autocomplete="off">
			    </div>   
			  </div>
			  <div class="control-group">
			    <label for="hours" class="control-label">Monthly Hours</label>
			    <div class="controls">
			      <input type="text" id="hours" class="input-medium" name="hours">
			    </div>   
			  </div>
			  <div class="control-group warning">
			    <label for="confirm" class="control-label">Confirm</label>
			    <div class="controls">
			      <input type="password" id="confirm" class="input-medium" name="confirm">
			    </div>   
			  </div> 			  			  			  		          
			  <div class="form-actions">
			    <button class="btn btn-large btn-primary" type="submit">Add Contract</button>
			  </div>
			</fieldset>
		<?php echo form_close(); ?>			
	</div>
</div>