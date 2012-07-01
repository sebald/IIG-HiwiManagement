<?php $this->load->model('hiwi'); ?>

<div class="page-header">
	<h1>Overview</h1>
</div>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th><i class="icon-user"></i> Name</th>
			<th><i class="icon-list"></i> Responsibilities</th>
			<th><i class="icon-calendar"></i> This Month</th>
			<th><i class="icon-time"></i> Overall</th>
			<th><i class="icon-eye-open"></i> Details</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($hiwis as $h): ?>
		<tr>
			<td><?php echo $h->last_name; ?>, <?php echo $h->first_name; ?></td>
			<td><?php echo $h->responsibilities; ?></td>
			<?php
				$data = $this->hiwi->get_hours($h->id, 'current');
				$p = ( $data['minutes_this_month'] == 0 ? 0 : ($data['minutes_this_month']/$data['monthly_minutes'])*100);
				$p = number_format($p, 2, '.', '');
			?>
			<td>
				<div class="progress progress-striped" rel="tooltip" data-original-title="<?php echo $data['minutes_this_month']; ?> of <?php echo $data['monthly_minutes']; ?> minutes (<?php echo $p; ?>%)">
			    	<div class="bar" style="width: <?php echo ceil($p); ?>%;"></div>
			    </div>
			</td>
			<?php
				$data = $this->hiwi->get_hours($h->id);
				$overall = number_format(($data['worked_overall']-$data['sum_hours'])/60, 2, '.', '');
				
				$indicator = ' class="bad"';
				if( $this->hiwi->get_current_contract($h->id)->hours >= $overall*(-1) )
					$indicator = '';
				if( $overall > 0 )
					$indicator = ' class="overtime"';
			?>
			<td><span<?php echo $indicator;?>><?php echo $overall; ?> h</span></td>
			<td><?php echo anchor('manage/hiwi/'.$h->id, 'View Details'); ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>