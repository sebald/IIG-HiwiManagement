<div class="row">
	<div class="span8 offset2">
		<div class="page-header">
			<h1>Add new Work</h1>
		</div>
		<?php echo form_open('work/add', 'class="form-horizontal"'); ?>
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
			    <label for="date" class="control-label">Date</label>
			    <div class="controls">
			      <input type="text" id="current_date" class="input-large datepicker" name="date" autocomplete="off">
			    </div>            
			  </div>
			  <div class="control-group">
			    <label for="duration" class="control-label">Duration</label>
			    <div class="controls">
			      <input type="text" id="duration" class="input-large" name="duration">
			      <span class="help-inline">min</span>
			    </div>   
			  </div>
			  <div class="control-group">
		        <label for="description" class="control-label">Description</label>
		        <div class="controls">
		          <textarea rows="4" id="description" class="input-xlarge" name="description"></textarea>
		        </div>
		  	  </div>			   
			  <div class="control-group warning">
			    <label for="confirm" class="control-label">Confirm</label>
			    <div class="controls">
			      <input type="password" id="confirm" class="input-large" name="confirm">
			      <span class="help-inline">Enter your password to confirm your identity.</span>
			    </div>   
			  </div> 
			  <div class="form-actions">
			    <button class="btn btn-large btn-primary" type="submit">Add Work</button>
			  </div>
			</fieldset>
		<?php echo form_close(); ?>
	</div>
</div>