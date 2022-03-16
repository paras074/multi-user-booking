
<?php 
global $wpdb;
$user = get_userdatabylogin($_GET['u']);
//$user = get_user_by('user_login', $_GET['u']);


$username=$user->user_login;
//wp_user_booking_setting

$users_data = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . "user_booking_setting Where user_id=".$user->ID . "");

	$selected_timezone=$users_data->selected_timezone;

$disabledays=unserialize($users_data->set_gen_booking_unavailable_day);
$string_input="";
$days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
foreach ($days as $key=>$day) {
		if (in_array($day, $disabledays))
  {
	  if($string_input==""){
		  $string_input .="day != ".$key;
	  }else{
		 $string_input .=" && day != ".$key; 
	  }
 
  }

}



$OptionsArray = timezone_identifiers_list();
$selected=$selected_timezone;
        $select= '<select onchange="select_timezone(this.value)" id="Selecttimezone_id" name="Selecttimezone">';
          
        while (list ($key, $row) = each ($OptionsArray) ){
            $select .='<option value="'.$row.'"';
            $select .= ($row == $selected ? : 'checked="checked"');
            $select .= '>'.$row.'</option>';
        } 
          
        $select .='</select>';



?>

<!--User Profile Starts Here-->

<div class="row">
    <div id="user-profile-wrapper" class="col-md-12">
	    <div class="user_profile">
	    	<h1><?php echo $username  ?></h1>
	    </div>
    </div>
</div>

<!--User Profile Ends Here-->


<!--Calendar Starts Here-->

<div class="row">
<div id="calendar-wrapper" class="col-md-12">
<div id='calendar'></div>
</div>





<!--Calendar Ends Here-->


<!--Calendar Form Starts Here-->


<div id="calendar-form-wrapper" class="col-md-6">
<div id="calander_form" style="display:none">
    <form class="calander_form_booking" role="form">
        	<h2><span>Available Booking on </span><strong id="selected_date">April 15, 2021</strong><span></span></h2>
	<div class="booked-appt-list">
	<div class="booked-appointments"><strong>Select Time: </strong>
	<select onchange="select_slot(this.value)" id="selecttime_id" name="selecttime">
	 <option value="15">15 Minute</option>
	 <option value="30">30 Minute</option>
	 <option value="60">60 Minute</option>
	</select></div>
		<div class="booked-appointments"><strong>Select TimeZone: </strong>
	<?php   echo $select; ?></div>
	
	
	
		<div class="booked-appointments"><strong>Amount: <span id="amount_display"><?php echo $users_data->appt_amount_15; ?></span></strong></div>
		<div class="booked-appointments">
				<div class="booked-appointment-details" data-appt-key="0">
				<div id="time_slot_create">
				<?php
				//print_r(unserialize($users_data->appt_timesloat)); ?>
				<?php /* foreach(unserialize($users_data->appt_timesloat) as $key=>$timesloat){ ?>
					<input type="checkbox" value="<?php echo $key;  ?>" name="select_timeslot"> <p class="appointment-info"><i class="booked-icon booked-icon-calendar"></i>&nbsp;&nbsp;&nbsp;<?php echo $timesloat['start_time']  ?> – <?php echo $timesloat['end_time']  ?></p>
					<input type="hidden" name="user_calendar_start_time[<?php echo $key; ?>][start_time]" value="<?php echo $timesloat['start_time']  ?>">
	<input type="hidden" name="user_calendar_end_time[<?php echo $key; ?>][end_time]" value="<?php echo $timesloat['end_time']  ?>">
				<?php } */ ?>
				</div>
				
	<input type="hidden" id="user_calendar_id" name="user_calendar_id" value="<?php echo $users_data->id;  ?>">
	<input type="hidden" id="selected_date_input" name="selected_date" value="">


</div>
			</div>
<div class="field">
	<label class="field-label">Your Information:<i class="required-asterisk booked-icon booked-icon-required"></i></label>
	<p class="field-small-p">Please enter your name , email address and phone number:</p>
</div>

	<div class="field">
					<input value="" placeholder="Name..." type="text" class="textfield" name="guest_name">
			<input value="" placeholder="Email Address..." type="email" class="textfield" name="guest_email">
			<input  type="text" placeholder="Phone Number..." name="guest_phone_number" value="" class="textfield">
			</div>

<div class="booked-calendar-fields">
				<div class="cf-block"><div class="field">
						<label class="field-label">Message</label>
						<textarea data-calendar-id="0" name="msg"></textarea>
					</div>
	
	</div>
</div>			</div>
<input type="hidden" name="action" value="user_booking_submit">
		

		<div class="field">
							<input type="submit" id="submit-request-appointment" class="button button-primary" value="Request Appointment">
				
					</div>
	</form>
</div>
</div>
</div>

<!--Calendar Form Ends Here-->


<script src="<?php echo CUSTOM_BOOKING_DIR_URL;  ?>lib/main.js"></script>

<!--https://www.plus2net.com/jquery/msg-demo/date-picker-themes.php?type=16---->
<link href="https://code.jquery.com/ui/1.12.1/themes/redmond/jquery-ui.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/redmond/jquery-ui.css" rel="stylesheet" />
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

<script>

 
jQuery(document).ready(function() {

jQuery( "#calendar" ).datepicker({
dateFormat: 'yy-mm-dd',
minDate: 0,
maxDate:"+2m",
beforeShowDay: function(date) {
	
        var day = date.getDay();
        return [(<?php echo $string_input;  ?>)];
    },
onSelect: function(dateText) {
    
      var user_cal_id=jQuery("#user_calendar_id").val();
      var select_timezone=jQuery("#Selecttimezone_id").val();
      	var timeperoid=jQuery("#selecttime_id").val();
		jQuery.ajax({
         type : "post",
         url : my_ajax_object.ajax_url,
         data : {action: "user_booking_slot", start_date : dateText,user_cal_id:user_cal_id,timeperoid:timeperoid,select_timezone:select_timezone},
         success: function(response) {
			 //alert(response);
               jQuery("#time_slot_create").html(response);
            jQuery("#selected_date").html(dateText);
		
		jQuery("#selected_date_input").val(dateText);
		
		
		jQuery("#calendar-wrapper").removeClass("col-md-12");
		jQuery("#calendar-wrapper").addClass("col-md-6");
		jQuery("#calander_form").show();
         }
      }) 
    }
})

})

</script>
<style>
.ui-datepicker {
width: 24em; /*what ever width you want*/
}
  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 400px;
    margin: 0 auto;
  }
.user_profile{
	       margin-bottom: 34px;
    padding: 34px;
    text-align: center;
    
    background-color: #ddd;
}
.booked-icon-clock:before {
    content: '\f00a';
}
.ui-widget {
    font-family: Arial,sans-serif;
    font-size: 1.3em;
}
</style>
<script>

jQuery(document).ready(function(){
    
});
jQuery('input[name="select_timeslot"]').click(function() {
        jQuery('input[name="select_timeslot"]').not(this).prop('checked', false);
    });
</script>
<script>
 function select_slot(timeperoid){
	var user_cal_id=jQuery("#user_calendar_id").val();
	var startStr=jQuery("#selected_date_input").val();
	var select_timezone=jQuery("#Selecttimezone_id").val();
	if(timeperoid=="30"){
	jQuery("#amount_display").html('<?php echo $users_data->appt_amount_30; ?>');
	}else if(timeperoid=="60"){
	    	jQuery("#amount_display").html('<?php echo $users_data->appt_amount_60; ?>');
	}else{
	    jQuery("#amount_display").html('<?php echo $users_data->appt_amount_15; ?>');
	}
		jQuery.ajax({
         type : "post",
         url : my_ajax_object.ajax_url,
         data : {action: "user_booking_slot", start_date : startStr , user_cal_id:user_cal_id,timeperoid:timeperoid,select_timezone:select_timezone},
         success: function(response) {
		
               jQuery("#time_slot_create").html(response);
           
		 }
      }) 
}
function select_timezone(select_timezone){
	var user_cal_id=jQuery("#user_calendar_id").val();
	var startStr=jQuery("#selected_date_input").val();
	var timeperoid=jQuery("#selecttime_id").val();
		jQuery.ajax({
         type : "post",
         url : my_ajax_object.ajax_url,
         data : {action: "user_booking_slot", start_date : startStr , user_cal_id:user_cal_id,timeperoid:timeperoid,select_timezone:select_timezone},
         success: function(response) {
		
               jQuery("#time_slot_create").html(response);
           
		 }
      }) 
}
jQuery(document).ready(function($) {


	 /* jQuery('.appointment-info').click(function() {
		  alert("hh");
        jQuery(this).siblings('input:checkbox').prop('checked', false);
    });
	jQuery('.appointment-info').on('change', function() {
		 alert("hh");
        jQuery('.appointment-info').not(this).prop('checked', false);  
    }); */
	//jQuery( "#datepicker" ).datepicker();
	$('.calander_form_booking').on('submit', function(e) {
		e.preventDefault();

		var $form = $(this);
			

		$.post(my_ajax_object.ajax_url, $form.serialize(), function(data) {
			//alert('Appoitment  save successfully ');
			
			window.location.href = "<?php echo site_url();  ?>/thank-you/"; 
			
		
		}, 'json');
	});

});
</script>