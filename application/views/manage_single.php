<div class="page-header">
    <h1><?php echo $hiwi->last_name; ?>, <?php echo $hiwi->first_name; ?></h1>
</div>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th><i class="icon-calendar"></i> Date</th>
			<th><i class="icon-info-sign"></i> Description</th>			
			<th><i class="icon-time"></i> Duration</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($work as $w): ?>
		<tr>
			<td><?php echo $w->date; ?></td>
			<td><?php echo ( $w->description ? $w->description : '-'); ?></td>
			<td><?php echo $w->duration; ?> min</td>			
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>


<?php echo form_open('manage/hiwi/'.$hiwi->id, 'class="well form-inline"'); ?>
	<label for="input01" class="control-label">From/To:</label>
    <input type="text" value="<?php echo date('Y').'-'.date('m').'-01'; ?>" class="input-small datepicker" name="from" autocomplete="off">
    <label for="input01" class="control-label"></label>
    <input type="text" value="<?php echo date('Y').'-'.date('m').'-31'; ?>" class="input-small datepicker" name="to" autocomplete="off">
    <button class="btn btn-inverse" type="submit">Filter</button>
<?php echo form_close(); ?>