<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if(! is_user_logged_in()){
    return;
}
else {
		$user_role_permission = array(
			'manage_options'
		);
		$access_granted = false;
		foreach ( $user_role_permission as $permission ) {
		if ( current_user_can( $permission ) ) {
			$access_granted = true;
			break;
			}
		}
		if ( ! $access_granted ) 
		{
			?>
				<section class="box-border">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h1 class="heading-style">You don't have Permmisions to Access this Page.</h1>
						</div>
					</div>
				</section>
			<?php
		}
		else
		{
			if(isset($_REQUEST['cal_id'])){
				$users_data = $wpdb->get_results
			(
				"SELECT * FROM ".$wpdb->prefix . "user_booking Where user_booking_clander_id=".$_REQUEST['cal_id']
			);
			}else{
				$users_data = $wpdb->get_results
			(
				"SELECT * FROM ".$wpdb->prefix . "user_booking"
			);
			}
			
		
		?>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<style>
		#wpbody-content button.btn.btn-info.btn-lg { margin-left: 15px;margin-top: 20px;}
		    
		    
		</style>
		<!--button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editallUser">Update all Users Data</button-->
		<div class="col-lg-12">
			<table class="table table-striped table-bordered table-hover table-margin-top" id="cb_bookings_data">
				<thead>
					<tr>
						<th>Booking Date</th>
						<th>Booking Time</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone Number</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
				global $wpdb;
				
					foreach($users_data as $users):
					//$user = get_userdata($users->user_id);
$bookTime=unserialize($users->booking_times);

					?>
					<tr>
					<td><?php echo $users->booking_date;?></td>
					<td><?php //echo $bookTime[1]['start_time'] .' To '.$bookTime[1]['end_time'] ;?><?php echo $users->booking_times;  ?></td>
						<td><?php echo $users->name;?></td>
						<td><?php echo $users->email;?></td>
						<td><?php echo $users->phone_number;?></td>
						<td><?php echo $users->status; ?></td>
						<td><a href="?page=cb_trasactions&user_id=<?php echo $users->user_id;?>"  class="btn btn-info btn-lg"  data-target="#editUser">Trasactions</a></td>
					</tr>
					<?php
					endforeach;
					?>
				</tbody>
			</table>
		</div>
		
		
		<style>
		a.btn.btn-info.btn-lg {
    margin: 20px 0px 0px 7px;
}
		</style>
	<script>
	var oTable = jQuery("#cb_bookings_data").dataTable({
		"pagingType": "full_numbers",
		"language": {
			"emptyTable": "No data available in table",
			"info": "Showing _START_ to _END_ of _TOTAL_ entries",
			"infoEmpty": "No entries found",
			"infoFiltered": "(filtered1 from _MAX_ total entries)",
			"lengthMenu": "Show _MENU_ entries",
			"search": "Search:",
			"zeroRecords": "No matching records found"
		},
		"bSort": true,
		"pageLength": 10,
		"iDisplayLength": -1,
		"aaSorting": [[ 0, "asc" ]]
	});
	</script>
    <?php
	}
}
?>