<?php 
global $wpdb;
$current_user = wp_get_current_user();
	
	$siteurl=site_url();
 $username=$current_user->user_login;
 
 $users_data = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . "user_booking_setting Where user_id=".$current_user->ID . "");
 
$disabledays=unserialize($users_data->set_gen_booking_unavailable_day);
//print_r($disabledays);
 $OptionsArray = timezone_identifiers_list();
 $selected=$users_data->selected_timezone;

        $select= '<select class="check_valid"  id="Selecttimezone_id" name="Selecttimezone">
		<option value="">Select Timezone</option>';
          
        while (list ($key, $row) = each ($OptionsArray) ){
            $select .='<option value="'.$row.'"';
            $select .= ($row != $selected ? : 'selected="selected"');
            $select .= '>'.$row.'</option>';
        } 
          
        $select .='</select>';
     ?> <div class="panel panel-primary setup-content" >
            <div class="panel-heading1">
                 <p class="text-muted">Share Url</p>
            </div>
            <div class="panel-body">
                <div class="col-12 px-0 px-lg-4 d-flex flex-column align-items-center">
                    <h1 class="text-center"> We’ve reserved the following URL for you</h1>
                <div class="card bg-white final-card mt-0 mt-sm-4">
                    <div class="card-body py-4">
                        <div class="text-center mt-3">
                            <h1 ><span class="hightlight"><?php echo $siteurl.'/booking_appointment?u='.$username ; ?></span></h1>
                            <a id="heading_third" href="javascript:void(0)">Copy To Clipboard</a>
							<input id="copytoClipboard" type="hidden" name="user_booking_share_url"  value="<?php echo $siteurl.'/booking_appointment?u='.$username ; ?>" />
                            <hr>
                         </div>
                       
                   
                    </div>
                </div>
                </div>
              
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" >
		
            <div class="panel-heading1">
                  <p class="text-muted">Schedule</p>
				
            <div class="action_edit">
				<span class="label wk_action" id="edit_link_schedule">
				<img width="25" onclick="showField('schedule')" src="https://cdn4.iconfinder.com/data/icons/miu/22/editor_pencil_pen_edit_write_-128.png"/>
			</span>  

		
			<button id="update_button_schedule" class="button wk_mp_btn1" onclick="updateField('schedule','schedule_timeslot');" style="display:none" >
				<span><span style="font-size:12px;">Update</span></span>
			</button>

			<button id="reset_button_schedule" type="reset" class="cancel" onclick="hideReset('schedule');" style="display:none">
				<span><span>Cancel</span></span>
			</button>
			</div>
            </div>
			<div id="view_schedule" class="panel-body">
			
              <div class="ur-form-row">
			<div id="unavailable_days" >
				
						<label for="user_login" class="ur-label">Unavailable week days :
						
						<?php 	echo implode(", ", $disabledays); ?></label>  
	             
			</div>
			
			<div id="timeslot_selected_id" >
			    <div   class="ur-field-item">
				
				<label>Selected TimeZone : <?php echo  $users_data->selected_timezone;?></label>
				
				
				</div>
				<div class="ur-field-item">
				<label> Time Slot : 
				<?php 
$appt_timesloat=unserialize($users_data->appt_timesloat);
foreach($appt_timesloat as $key=>$slot){
	if (!in_array($key, $disabledays))
  {
 ?>
				<div >
				<label><?php echo  $key; ?>:</label>
				     <?php if(!empty($slot)){ foreach($slot as $slots){
						 echo $slots["start_time"].' - '.$slots["end_time"]."</br>";
					 }
					 }else{
						echo '9:00 - 18:00'; 
					 }  ?>
				</div>
  <?php } } ?>
  </label>
		</div>
				
			</div>
		</div>
			 </div>
            <div id="edit_schedule" style="display:none;" class="panel-body">
			<form id="schedule_timeslot">
              <div class="ur-form-row">
			<div id="unavailable_days" >
				<div class="ur-field-item">
					<div class="form-row validate-required user-registration-validated" id="">
						<label for="user_login" class="ur-label">Unavailable week days <abbr class="required" title="required">*</abbr></label>
						<fieldset>                    <legend class="screen-reader-text"><span></span></legend>
						
						<?php $days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
foreach ($days as $key=>$day) {
		if (in_array($day, $disabledays))
  {
$selected="checked='checked'";	  

  }else{
	  $selected="";
  }	  ?>
	  
	 <label class="wpbc-form-checkbox" for="set_gen_booking_unavailable_day<?php echo $key;   ?>">
                        <input type="checkbox" data-slectedday="<?php echo $key;   ?>" id="set_gen_booking_unavailable_day<?php echo $key;   ?>" name="set_gen_booking_unavailable_day<?php echo $key;   ?>"  class="custom_checkbox" style="" <?php echo $selected ; ?> autocomplete="off"> <?php echo $day;  ?></label>  
	 <?php
 
  }  ?>  </fieldset></div>
				</div>
				
			</div>
			
			<div id="timeslot_selected_id" >
			<div   class="ur-field-item">
				
				<label>Select TimeZone</label>
				<div class="input_fields_wrap">
				<div class="">				
					<?php echo $select;  ?> </div>
				
				
				</div>
				
				</div>
				<div class="ur-field-item">
				
				<?php $appt_timesloat=unserialize($users_data->appt_timesloat);
//print_r($appt_timesloat);

				?>
				<div id="days_div0" class="sunday_div">
				<label>Sunday</label>
				<div class="input_fields_wrap timeslotSunday">
				<div class="input_custom_field">
						<?php if(!empty($appt_timesloat['Sunday'])){ foreach($appt_timesloat['Sunday'] as $sun){  ?>						
						<input type="time" class="check_valid" value="<?php echo $sun['start_time'];  ?>" id="appt_timesloat"  name="start_appt_timesloat[Sunday][]">
						- 
						<input type="time" class="check_valid" value="<?php echo $sun['end_time'];  ?>" id="appt_timesloat" name="end_appt_timesloat[Sunday][]"></br>
						<?php  } }else{ ?>

            <input type="time" class="check_valid"  id="appt_timesloat"  name="start_appt_timesloat[Sunday][]">
						- 
						<input type="time" class="check_valid" id="appt_timesloat" name="end_appt_timesloat[Sunday][]">

						<?php  } ?>
						<button class="add_field_button">Add More</button>						
					 </div>
				
				
				</div>
				
				
				</div>
				
				
				
				<div id="days_div1" class="sunday_div">
				<label>Monday</label>
				<div class="input_fields_wrap timeslotSunday">
				<div class="input_custom_field_mon">
<?php if(!empty($appt_timesloat['Monday'])){ foreach($appt_timesloat['Monday'] as $mon){  ?>
<input type="time" class="check_valid" value="<?php echo $mon['start_time'];  ?>" id="appt_timesloat" name="start_appt_timesloat[Monday][]">
						- 
						<input type="time" value="<?php echo $mon['end_time'];  ?>" class="check_valid" id="appt_timesloat" name="end_appt_timesloat[Monday][]"></br>
<?php  } }else{ ?>
<input type="time" class="check_valid"   id="appt_timesloat" name="start_appt_timesloat[Monday][]">
						- 
						<input type="time" class="check_valid" id="appt_timesloat" name="end_appt_timesloat[Monday][]">

<?php } ?>						
						
						
						<button class="add_field_button_mon">Add More</button>						
					 </div>
				
				
				</div>
				
				
				</div>
				<div id="days_div2" class="sunday_div">
				<label>Tuesday</label>
				<div class="input_fields_wrap timeslotSunday">
				<div class="input_custom_field_tue">
					<?php if(!empty($appt_timesloat['Tuesday'])){ foreach($appt_timesloat['Tuesday'] as $tue){  ?>
       <input type="time" class="check_valid" value="<?php echo $tue['start_time'];  ?>" id="appt_timesloat" name="start_appt_timesloat[Tuesday][]">
						- 
						<input type="time" value="<?php echo $tue['end_time'];  ?>" class="check_valid" id="appt_timesloat" name="end_appt_timesloat[Tuesday][]"></br>
						
<?php  } }else{ ?>

<input type="time" class="check_valid" id="appt_timesloat" name="start_appt_timesloat[Tuesday][]">
						- 
						<input type="time" class="check_valid" id="appt_timesloat" name="end_appt_timesloat[Tuesday][]">
						
<?php } ?>							
						
						<button class="add_field_button_tue">Add More</button>						
					 </div>
				
				
				</div>
				
				
				</div>
				
				<div id="days_div3" class="sunday_div">
				<label>Wednesday</label>
				<div class="input_fields_wrap timeslotSunday">
				<div class="input_custom_field_wed">
					<?php if(!empty($appt_timesloat['Wednesday'])){ foreach($appt_timesloat['Wednesday'] as $wed){  ?>
      <input type="time" class="check_valid" id="appt_timesloat" value="<?php echo $wed['start_time'];  ?>" name="start_appt_timesloat[Wednesday][]">
						- 
						<input type="time" class="check_valid" value="<?php echo $wed['end_time'];  ?>" id="appt_timesloat" name="end_appt_timesloat[Wednesday][]"></br>
						
						
<?php  } }else{ ?>

<input type="time" class="check_valid" id="appt_timesloat" name="start_appt_timesloat[Wednesday][]">
						- 
						<input type="time" class="check_valid" id="appt_timesloat" name="end_appt_timesloat[Wednesday][]">
						
<?php } ?>									
						
						<button class="add_field_button_wed">Add More</button>						
					 </div>
				
				
				</div>
				
				
				</div> 
				
				<div id="days_div4" class="sunday_div">
				<label>Thursday</label>
				<div class="input_fields_wrap timeslotSunday">
				<div class="input_custom_field_thurs">
					<?php if(!empty($appt_timesloat['Thursday'])){ foreach($appt_timesloat['Thursday'] as $thu){  ?>
    <input type="time" class="check_valid" id="appt_timesloat" value="<?php echo $thu['start_time'];  ?>" name="start_appt_timesloat[Thursday][]">
						- 
						<input type="time" class="check_valid" value="<?php echo $thu['end_time'];  ?>" id="appt_timesloat" name="end_appt_timesloat[Thursday][]"></br>
						
						
<?php  } }else{ ?>

<input type="time" class="check_valid" id="appt_timesloat" name="start_appt_timesloat[Thursday][]">
						- 
						<input type="time" class="check_valid" id="appt_timesloat" name="end_appt_timesloat[Thursday][]">
											
<?php } ?>									
						
						<button class="add_field_button_thurs">Add More</button>						
					 </div>
				
				
				</div>
				
				
				</div>
				
				<div id="days_div5" class="sunday_div">
				<label>Friday</label>
				<div class="input_fields_wrap timeslotSunday">
				<div class="input_custom_field_fri">
								<?php if(!empty($appt_timesloat['Friday'])){ foreach($appt_timesloat['Friday'] as $fri){  ?>
   <input type="time" class="check_valid" id="appt_timesloat" value="<?php echo $fri['start_time'];  ?>" name="start_appt_timesloat[Friday][]">
						- 
						<input type="time" class="check_valid" value="<?php echo $fri['end_time'];  ?>" id="appt_timesloat" name="end_appt_timesloat[Friday][]"></br>
						
				
						
						
<?php  } }else{ ?>

<input type="time" class="check_valid" id="appt_timesloat" name="start_appt_timesloat[Friday][]">
						- 
						<input type="time" class="check_valid" id="appt_timesloat" name="end_appt_timesloat[Friday][]">
						
															
<?php } ?>							
								<button class="add_field_button_fri">Add More</button>						
					 </div>
				
				
				</div>
				
				
				</div>
				
				
				<div id="days_div6" class="sunday_div">
				<label>Saturday</label>
				<div class="input_fields_wrap timeslotSunday">
				<div class="input_custom_field_sat">
					<?php if(!empty($appt_timesloat['Saturday'])){ foreach($appt_timesloat['Saturday'] as $sat){  ?>
   <input type="time" class="check_valid" id="appt_timesloat" value="<?php echo $sat['start_time'];  ?>" name="start_appt_timesloat[Saturday][]">
						- 
						<input type="time" class="check_valid" value="<?php echo $sat['end_time'];  ?>" id="appt_timesloat" name="end_appt_timesloat[Saturday][]"></br>
						
				
						
						
<?php  } }else{ ?>

<input type="time" class="check_valid" id="appt_timesloat" name="start_appt_timesloat[Saturday][]">
						- 
						<input type="time" class="check_valid" id="appt_timesloat" name="end_appt_timesloat[Saturday][]">
																			
<?php } ?>									
						
						<button class="add_field_button_sat">Add More</button>						
					 </div>
				
				
				</div>
				
				
				</div>
				
				<input type="hidden" name="action" value="user_profile_complete_update">
				<input type="hidden" name="form" value="shedule_form">
				<input type="hidden" name="clander_id" value="<?php echo $users_data->id;  ?>">
					
				</div>
				
			</div>
		</div>
		</form>
			 </div>
        </div>
        
        <div class="panel panel-primary setup-content" >
            <div class="panel-heading1">
                 <p class="text-muted">Schedule Amount</p>
				  <div class="action_edit">
				<span class="label wk_action" id="edit_link_schedule_amount">
				<img width="25" onclick="showField('schedule_amount')" src="https://cdn4.iconfinder.com/data/icons/miu/22/editor_pencil_pen_edit_write_-128.png"/>
			</span>  

		
			<button id="update_button_schedule_amount" class="button wk_mp_btn1" onclick="updateField('schedule_amount','schedule_amount_form');" style="display:none" >
				<span><span style="font-size:12px;">Update</span></span>
			</button>

			<button id="reset_button_schedule_amount" type="reset" class="cancel" onclick="hideReset('schedule_amount');" style="display:none">
				<span><span>Cancel</span></span>
			</button>
			</div>
            </div>
            <div id="view_schedule_amount" class="panel-body">
                <div class="ur-field-item">
					<label for="user_login" class="ur-label"> Amount for booking 15 Minutes : <?php echo $users_data->appt_amount_15;  ?></label>
				</div>
				 <div class="ur-field-item">
					<label for="user_login" class="ur-label"> Amount for booking 30 Minutes : <?php echo $users_data->appt_amount_30;  ?></label>
					</div>
				 <div class="ur-field-item">
					<label for="user_login" class="ur-label"> Amount for booking a hour : <?php echo $users_data->appt_amount_60;  ?></label>
						
				</div>
				<input type="hidden" name="action" value="user_profile_complete_submit">
				<input type="hidden" name="clander_id" value="<?php echo $users_data->id;  ?>">
                
            </div>
			<div id="edit_schedule_amount" style="display:none" class="panel-body">
			<form id="schedule_amount_form">
                <div class="ur-field-item">
					<div class="form-row validate-required user-registration-validated" id="">
						<label for="user_login" class="ur-label">Please enter a amount for booking 15 Minutes <abbr class="required" title="required">*</abbr></label>
						<input type="text" id="appt_amount_15" value="<?php echo $users_data->appt_amount_15;  ?>" name="appt_amount_15"> </div>
				</div>
				 <div class="ur-field-item">
					<div class="form-row validate-required user-registration-validated" id="">
						<label for="user_login" class="ur-label">Please enter a amount for booking 30 Minutes <abbr class="required" title="required">*</abbr></label>
						<input type="text" id="appt_amount_30" value="<?php echo $users_data->appt_amount_30;  ?>" name="appt_amount_30"> </div>
				</div>
				 <div class="ur-field-item">
					<div class="form-row validate-required user-registration-validated" id="">
						<label for="user_login" class="ur-label">Please enter a amount for booking a hour  <abbr class="required" title="required">*</abbr></label>
						<input type="text" id="appt_amount_60" value="<?php echo $users_data->appt_amount_60;  ?>" name="appt_amount_60"> </div>
				</div>
				<input type="hidden" name="action" value="user_profile_complete_update">
				<input type="hidden" name="form" value="shedule_amount_form">
				<input type="hidden" name="clander_id" value="<?php echo $users_data->id;  ?>">
              </form>  
            </div>
        </div>
        
        
   

	<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script>
	var $=jQuery;

jQuery(document).ready(function() {
	(function() {
  $('input[class="custom_checkbox"]:checked').each(function() {
    var inputValue = $(this).attr("data-slectedday");
    $("#days_div"+inputValue).hide();
  });
})();
		$('input[class="custom_checkbox"]').click(function() {
		var inputValue = $(this).attr("data-slectedday");
		$("#days_div" + inputValue).toggle();
	});
          
	var max_fields      = 100; //maximum input boxes allowed
	var wrapper   		= jQuery(".input_custom_field"); //Fields wrapper
	var wrapper_mon   		= jQuery(".input_custom_field_mon"); //Fields wrapper
	var wrapper_tue   		= jQuery(".input_custom_field_tue"); //Fields wrapper
	var wrapper_wed   		= jQuery(".input_custom_field_wed"); //Fields wrapper
	var wrapper_thurs   		= jQuery(".input_custom_field_thurs"); //Fields wrapper
	var wrapper_fri   		= jQuery(".input_custom_field_fri"); //Fields wrapper
	var wrapper_sat   		= jQuery(".input_custom_field_sat"); //Fields wrapper
	var add_button      = jQuery(".add_field_button"); //Add button ID
	var add_button_mon      = jQuery(".add_field_button_mon"); //Add button ID
	var add_button_tue      = jQuery(".add_field_button_tue"); //Add button ID
	var add_button_wed      = jQuery(".add_field_button_wed"); //Add button ID
	var add_button_thurs      = jQuery(".add_field_button_thurs"); //Add button ID
	var add_button_fri      = jQuery(".add_field_button_fri"); //Add button ID
	var add_button_sat      = jQuery(".add_field_button_sat"); //Add button ID
	

	var x = 1; //initlal text box count
	jQuery(add_button).click(function(e){ //on add input button click
		e.preventDefault();
		if(x < max_fields){ //max input box allowed
			x++; //text box increment
			jQuery(wrapper).append('<div class="input_custom_field"><input type="time" id="appt_timesloat" name="start_appt_timesloat[Sunday][]"> - <input type="time" id="appt_timesloat" name="end_appt_timesloat[Sunday][]"><a href="#" class="remove_field">Remove</a></div>'); //add input box
	
		}
	});
	var y = 1; //initlal text box count
	jQuery(add_button_mon).click(function(e){ //on add input button click
		e.preventDefault();
		if(y < max_fields){ //max input box allowed
			y++; //text box increment
			jQuery(wrapper_mon).append('<div class="input_custom_field_mon"><input type="time" id="appt_timesloat" name="start_appt_timesloat[Monday][]"> - <input type="time" id="appt_timesloat" name="end_appt_timesloat[Monday][]"><a href="#" class="remove_field_mon">Remove</a></div>'); //add input box
	
		}
	});
	var z = 1; //initlal text box count
	jQuery(add_button_tue).click(function(e){ //on add input button click
		e.preventDefault();
		if(z < max_fields){ //max input box allowed
			z++; //text box increment
			jQuery(wrapper_tue).append('<div class="input_custom_field_tue"><input type="time" id="appt_timesloat" name="start_appt_timesloat[Tuesday][]"> - <input type="time" id="appt_timesloat" name="end_appt_timesloat[Tuesday][]"><a href="#" class="remove_field_tue">Remove</a></div>'); //add input box
	
		}
	});
	var t = 1; //initlal text box count
	jQuery(add_button_wed).click(function(e){ //on add input button click
		e.preventDefault();
		if(t < max_fields){ //max input box allowed
			t++; //text box increment
			jQuery(wrapper_wed).append('<div class="input_custom_field_wed"><input type="time" id="appt_timesloat" name="start_appt_timesloat[Wednesday][]"> - <input type="time" id="appt_timesloat" name="end_appt_timesloat[Wednesday][]"><a href="#" class="remove_field_wed">Remove</a></div>'); //add input box
	
		}
	});
	var t = 1; //initlal text box count
	jQuery(add_button_thurs).click(function(e){ //on add input button click
		e.preventDefault();
		if(t < max_fields){ //max input box allowed
			t++; //text box increment
			jQuery(wrapper_thurs).append('<div class="input_custom_field_thurs"><input type="time" id="appt_timesloat" name="start_appt_timesloat[Thursday][]"> - <input type="time" id="appt_timesloat" name="end_appt_timesloat[Thursday][]"><a href="#" class="remove_field_thurs">Remove</a></div>'); //add input box
	
		}
	});
	var t = 1; //initlal text box count
	jQuery(add_button_fri).click(function(e){ //on add input button click
		e.preventDefault();
		if(t < max_fields){ //max input box allowed
			t++; //text box increment
			jQuery(wrapper_fri).append('<div class="input_custom_field_fri"><input type="time" id="appt_timesloat" name="start_appt_timesloat[Friday][]"> - <input type="time" id="appt_timesloat" name="end_appt_timesloat[Friday][]"><a href="#" class="remove_field_fri">Remove</a></div>'); //add input box
	
		}
	});
	var t = 1; //initlal text box count
	jQuery(add_button_sat).click(function(e){ //on add input button click
		e.preventDefault();
		if(t < max_fields){ //max input box allowed
			t++; //text box increment
			jQuery(wrapper_sat).append('<div class="input_custom_field_sat"><input type="time" id="appt_timesloat" name="start_appt_timesloat[Saturday][]"> - <input type="time" id="appt_timesloat" name="end_appt_timesloat[Saturday][]"><a href="#" class="remove_field_sat">Remove</a></div>'); //add input box
	
		}
	});
	
	jQuery(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); jQuery(this).parent('div').remove(); x--;
	});
	jQuery(wrapper_mon).on("click",".remove_field_mon", function(e){ //user click on remove text
		e.preventDefault(); jQuery(this).parent('div').remove(); x--;
	});
	jQuery(wrapper_tue).on("click",".remove_field_tue", function(e){ //user click on remove text
		e.preventDefault(); jQuery(this).parent('div').remove(); x--;
	});
	jQuery(wrapper_wed).on("click",".remove_field_wed", function(e){ //user click on remove text
		e.preventDefault(); jQuery(this).parent('div').remove(); x--;
	});
	jQuery(wrapper_thurs).on("click",".remove_field_thurs", function(e){ //user click on remove text
		e.preventDefault(); jQuery(this).parent('div').remove(); x--;
	});
	jQuery(wrapper_fri).on("click",".remove_field_fri", function(e){ //user click on remove text
		e.preventDefault(); jQuery(this).parent('div').remove(); x--;
	});
	jQuery(wrapper_sat).on("click",".remove_field_sat", function(e){ //user click on remove text
		e.preventDefault(); jQuery(this).parent('div').remove(); x--;
	});
});
		
		var $wk_jq=jQuery.noConflict();

			function hideReset(section_div) {
                var edit_section='#edit_'+ section_div;
                var view_section='#view_'+ section_div;

                var editLink="#edit_link_"+ section_div;
                var updateButton="#update_button_"+ section_div;
                var resetButton="#reset_button_"+ section_div;

                $wk_jq(edit_section).hide();
                $wk_jq(view_section).show();
                $wk_jq(editLink).show();
                $wk_jq(updateButton).hide();
                $wk_jq(resetButton).hide();
            }
			
            function showField(section_div)
            {
                var edit_section='#edit_'+ section_div;
                var view_section='#view_'+ section_div;

                var editLink="#edit_link_"+ section_div;
                var updateButton="#update_button_"+ section_div;
                var resetButton="#reset_button_"+ section_div;

                $wk_jq(edit_section).show();
                $wk_jq(view_section).hide();

                $wk_jq(editLink).hide();
                $wk_jq(updateButton).show();
                $wk_jq(updateButton).prop('disabled', false);//just in case
                $wk_jq(resetButton).show();
				 }
			
            function updateField(section_div,form_id)
            {
				var $form = $wk_jq("#"+form_id);
		$wk_jq.post(my_ajax_object.ajax_url, $form.serialize(), function(data) {
			//$("#message").show();
			// var base = //Set your base address
       window.location.href = "<?php echo site_url();  ?>/user-dashboard/"; 
		}, 'json');
              /*   var qtyId='#qty_'+ section_div;
				
                var qty = $wk_jq(qtyId).val();
				
				var $updateButton = $wk_jq("#update_button_"+ section_div);
				

				//disable it after start
				$updateButton.prop('disabled', true);
				
				//simulate 1 second ajax request
				setTimeout(function() {
					$wk_jq('#dummy').text(qty);
					//do you really want to reset this after? decide
					hideReset(section_div);
					
					//enable it after complete whether success or failure
					$updateButton.prop('disabled', false);
				}, 1000); */

            }
			
			</script>	
