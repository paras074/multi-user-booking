<?php 
global $wpdb;
$current_user = wp_get_current_user();
	
	$siteurl=site_url();
 $username=$current_user->user_login;
 
 $users_data = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . "user_booking_setting Where user_id=".$current_user->ID . "");
 $ip = $_SERVER['REMOTE_ADDR'];
$ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
$ipInfo = json_decode($ipInfo);

 $OptionsArray = timezone_identifiers_list();

        $select= '<select class="check_valid"  id="Selecttimezone_id" name="Selecttimezone">
		<option value="">Select Timezone</option>';
          
        while (list ($key, $row) = each ($OptionsArray) ){
            $select .='<option value="'.$row.'"';
            $select .= ($row == $selected ? : '');
            $select .= '>'.$row.'</option>';
        } 
          
        $select .='</select>';
     ?><div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <p><small>Welcome</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><small>Schedule</small></p>
            </div>
            <div class="stepwizard-step col-xs-3"> 
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small>Schedule Amount</small></p>
            </div>
           
        </div>
    </div>
    
    <form class="profile-complete-ajax-form" role="form">
        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading">
                 <h3 class="panel-title">Welcome</h3>
            </div>
            <div class="panel-body">
                <div class="col-12 px-0 px-lg-4 d-flex flex-column align-items-center">
                    <h1 class="text-center">Congrats! We’ve reserved the following URL for you</h1>
                <div class="card bg-white final-card mt-0 mt-sm-4">
                    <div class="card-body py-4">
                        <div class="text-center mt-3">
                            <h1 ><span class="hightlight"><?php echo $siteurl.'/booking_appointment?u='.$username ; ?></span></h1>
							<input type="hidden" name="user_booking_share_url"  value="<?php echo $siteurl.'/booking_appointment?u='.$username ; ?>" />
                            <hr>
                            <p class="text-muted">Now it’s time to set up your booking portal! The booking portal is where your clients will be able to book appointments with you.</p>
                           
                        </div>
                       
                   
                    </div>
                </div>
 </div>
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-2">
		
            <div class="panel-heading">
                 <h3 class="panel-title">Schedule</h3>
            </div>
            <div class="panel-body">
			
              <div class="ur-form-row">
			<div id="unavailable_days" class="ur-form-grid ur-grid-1" style="width:60%">
				<div class="ur-field-item">
					<div class="form-row validate-required user-registration-validated" id="">
						<label for="user_login" class="ur-label">Unavailable week days <abbr class="required" title="required">*</abbr></label>
						<fieldset>                    <legend class="screen-reader-text"><span></span></legend>                    
                    <label class="wpbc-form-checkbox" for="set_gen_booking_unavailable_day0">
                        <input type="checkbox" data-slectedday="0" id="set_gen_booking_unavailable_day0" name="set_gen_booking_unavailable_day0"  class="custom_checkbox" style="" checked="checked" autocomplete="off"> Sunday</label>&nbsp; &nbsp; &nbsp;                                                <legend class="screen-reader-text"><span></span></legend>                    
                    <label class="wpbc-form-checkbox" for="set_gen_booking_unavailable_day1">
                        <input type="checkbox" data-slectedday="1" id="set_gen_booking_unavailable_day1" name="set_gen_booking_unavailable_day1"  class="custom_checkbox" style="" autocomplete="off"> Monday</label>&nbsp; &nbsp; &nbsp;                                                <legend class="screen-reader-text"><span></span></legend>                    
                    <label class="wpbc-form-checkbox" for="set_gen_booking_unavailable_day2">
                        <input type="checkbox" data-slectedday="2" id="set_gen_booking_unavailable_day2" name="set_gen_booking_unavailable_day2"  class="custom_checkbox" style="" autocomplete="off"> Tuesday</label>&nbsp; &nbsp; &nbsp;                                                <legend class="screen-reader-text"><span></span></legend>                    
                    <label class="wpbc-form-checkbox" for="set_gen_booking_unavailable_day3">
                        <input type="checkbox" data-slectedday="3" id="set_gen_booking_unavailable_day3" name="set_gen_booking_unavailable_day3"  class="custom_checkbox" style="" autocomplete="off"> Wednesday</label>&nbsp; &nbsp; &nbsp;                                                <legend class="screen-reader-text"><span></span></legend>                    
                    <label class="wpbc-form-checkbox"  for="set_gen_booking_unavailable_day4">
                        <input type="checkbox" data-slectedday="4" id="set_gen_booking_unavailable_day4" name="set_gen_booking_unavailable_day4"  class="custom_checkbox" style="" autocomplete="off"> Thursday</label>&nbsp; &nbsp; &nbsp;                                                <legend class="screen-reader-text"><span></span></legend>                    
                    <label class="wpbc-form-checkbox" for="set_gen_booking_unavailable_day5">
                        <input type="checkbox" data-slectedday="5" id="set_gen_booking_unavailable_day5" name="set_gen_booking_unavailable_day5"  class="custom_checkbox" style="" autocomplete="off"> Friday</label>&nbsp; &nbsp; &nbsp;                                                <legend class="screen-reader-text"><span></span></legend>                    
                    <label class="wpbc-form-checkbox" for="set_gen_booking_unavailable_day6">
                        <input type="checkbox" data-slectedday="6" id="set_gen_booking_unavailable_day6" name="set_gen_booking_unavailable_day6" class="custom_checkbox" style="" checked="checked" autocomplete="off"> Saturday</label>&nbsp; &nbsp; &nbsp;                                </fieldset></div>
				</div>
				
			</div>
			
			<div id="timeslot_selected_id" class="ur-form-grid ur-grid-2" style="width:60%">
			<div class="ur-field-item">
				
				<label>Select TimeZone</label>
				<div class="input_fields_wrap">
				<div class="">				
					<?php echo $select;  ?> </div>
				
				
				</div>
				
				</div>
				<div class="ur-field-item">
				<div id="days_div0" class="sunday_div">
				<label>Sunday</label>
				<div class="input_fields_wrap timeslotSunday">
				<div class="input_custom_field">
												
						<input type="time" class="check_valid" id="appt_timesloat" name="start_appt_timesloat[Sunday][]">
						- 
						<input type="time" class="check_valid" id="appt_timesloat" name="end_appt_timesloat[Sunday][]">
						
						<button class="add_field_button">Add More</button>						
					 </div>
				
				
				</div>
				
				
				</div>
				<div id="days_div1" class="sunday_div">
				<label>Monday</label>
				<div class="input_fields_wrap timeslotSunday">
				<div class="input_custom_field_mon">
												
						<input type="time" class="check_valid"  id="appt_timesloat" name="start_appt_timesloat[Monday][]">
						- 
						<input type="time" class="check_valid" id="appt_timesloat" name="end_appt_timesloat[Monday][]">
						
						<button class="add_field_button_mon">Add More</button>						
					 </div>
				
				
				</div>
				
				
				</div>
				<div id="days_div2" class="sunday_div">
				<label>Tuesday</label>
				<div class="input_fields_wrap timeslotSunday">
				<div class="input_custom_field_tue">
												
						<input type="time" class="check_valid" id="appt_timesloat" name="start_appt_timesloat[Tuesday][]">
						- 
						<input type="time" class="check_valid" id="appt_timesloat" name="end_appt_timesloat[Tuesday][]">
						
						<button class="add_field_button_tue">Add More</button>						
					 </div>
				
				
				</div>
				
				
				</div>
				
				<div id="days_div3" class="sunday_div">
				<label>Wednesday</label>
				<div class="input_fields_wrap timeslotSunday">
				<div class="input_custom_field_wed">
												
						<input type="time" class="check_valid" id="appt_timesloat" name="start_appt_timesloat[Wednesday][]">
						- 
						<input type="time" class="check_valid" id="appt_timesloat" name="end_appt_timesloat[Wednesday][]">
						
						<button class="add_field_button_wed">Add More</button>						
					 </div>
				
				
				</div>
				
				
				</div> 
				
				<div id="days_div4" class="sunday_div">
				<label>Thursday</label>
				<div class="input_fields_wrap timeslotSunday">
				<div class="input_custom_field_thurs">
												
						<input type="time" class="check_valid" id="appt_timesloat" name="start_appt_timesloat[Thursday][]">
						- 
						<input type="time" class="check_valid" id="appt_timesloat" name="end_appt_timesloat[Thursday][]">
						
						<button class="add_field_button_thurs">Add More</button>						
					 </div>
				
				
				</div>
				
				
				</div>
				
				<div id="days_div5" class="sunday_div">
				<label>Friday</label>
				<div class="input_fields_wrap timeslotSunday">
				<div class="input_custom_field_fri">
												
						<input type="time" class="check_valid" id="appt_timesloat" name="start_appt_timesloat[Friday][]">
						- 
						<input type="time" class="check_valid" id="appt_timesloat" name="end_appt_timesloat[Friday][]">
						
						<button class="add_field_button_fri">Add More</button>						
					 </div>
				
				
				</div>
				
				
				</div>
				
				
				<div id="days_div6" class="sunday_div">
				<label>Saturday</label>
				<div class="input_fields_wrap timeslotSunday">
				<div class="input_custom_field_sat">
												
						<input type="time" class="check_valid" id="appt_timesloat" name="start_appt_timesloat[Saturday][]">
						- 
						<input type="time" class="check_valid" id="appt_timesloat" name="end_appt_timesloat[Saturday][]">
						
						<button class="add_field_button_sat">Add More</button>						
					 </div>
				
				
				</div>
				
				
				</div>
				
					<div class=" form-row validate-required user-registration-validated" id="">
					 
					</div>
				</div>
				
			</div>
		</div>
			<div class="error_panel"></div>
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-heading">
                 <h3 class="panel-title">Schedule Amount</h3>
            </div>
            <div class="panel-body">
                <div class="ur-field-item">
					<div class="form-row validate-required user-registration-validated" id="">
						<label for="user_login" class="ur-label">Please enter a amount for booking 15 Minutes <abbr class="required" title="required">*</abbr></label>
						<input type="text" id="appt_amount_15" name="appt_amount_15"> </div>
				</div>
				 <div class="ur-field-item">
					<div class="form-row validate-required user-registration-validated" id="">
						<label for="user_login" class="ur-label">Please enter a amount for booking 30 Minutes <abbr class="required" title="required">*</abbr></label>
						<input type="text" id="appt_amount_30" name="appt_amount_30"> </div>
				</div>
				 <div class="ur-field-item">
					<div class="form-row validate-required user-registration-validated" id="">
						<label for="user_login" class="ur-label">Please enter a amount for booking a hour  <abbr class="required" title="required">*</abbr></label>
						<input type="text" id="appt_amount_60" name="appt_amount_60"> </div>
				</div>
				<div class="error_panel" id="error_panel_id"></div>
				<span id="message" style="display:none">Your Profile is complete Please share url to Anyone.</span>
				<input type="hidden" name="action" value="user_profile_complete_submit">
                <button class="btn btn-success pull-right" type="submit">Finish!</button>
            </div>
        </div>
        
        
    </form>
</div>


<style>
.error_input {
    border: 1px solid red !important;
}
.error_panel{
	display: none;
	width: 30%;
    border: 1px solid red;
    margin: 19px 0 0 0;
    padding: 5px;
}
#message {
    border: 1px solid green;
    padding: 9px;
}
</style>
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

jQuery(document).ready(function($) {
	
	$('.profile-complete-ajax-form').on('submit', function(e) {
		e.preventDefault();
 
/* if(){
	
} */
var isValid;
isValid=true;
var appt_amount_15= $("#appt_amount_15").val(); 

	if(appt_amount_15==""){
		$("#appt_amount_15").addClass("error_input");
		isValid = false; 
	}else{
	    	$("#appt_amount_15").removeClass("error_input");
		isValid = true; 
	}
	var appt_amount_30= $("#appt_amount_30").val(); 

   if(appt_amount_30==""){
		$("#appt_amount_30").addClass("error_input");
		isValid = false; 
	}else{
	    	$("#appt_amount_30").removeClass("error_input");
		isValid = true; 
	}
var appt_amount_60= $("#appt_amount_60").val(); 

   if(appt_amount_60==""){
		$("#appt_amount_60").addClass("error_input");
		isValid = false; 
	}else{
	    	$("#appt_amount_60").removeClass("error_input");
		isValid = true; 
	}

if(isValid==false){
	$("#error_panel_id").html('Please fill in all the required fields.'); 
	$("#error_panel_id").show(); 
	
	}else{
	$("#error_panel_id").html(''); 
	$("#error_panel_id").hide(); 	
	} 
if(isValid==true){
		var $form = $(this);
		$.post(my_ajax_object.ajax_url, $form.serialize(), function(data) {
			$("#message").show();
			// var base = //Set your base address
        window.location.href = "<?php echo site_url();  ?>/my-account/"; 
		}, 'json');
		
}	
	});

});
var $=jQuery;
$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;


if(curStepBtn=="step-2"){
	
	var Selecttimezone_id= $("#Selecttimezone_id").val(); 

	if(Selecttimezone_id==""){
		$("#Selecttimezone_id").addClass("error_input");
		isValid = false; 
	}else{
	    $("#Selecttimezone_id").removeClass("error_input");
		isValid = true; 
	}
	var timesloat_start_sun= $("input[name='start_appt_timesloat[Sunday][]']").val();  
	var timesloat_end_sun= $("input[name='end_appt_timesloat[Sunday][]']").val();  
	var timesloat_start_mon= $("input[name='start_appt_timesloat[Monday][]']").val();  
	var timesloat_end_mon= $("input[name='end_appt_timesloat[Monday][]']").val();  
	var timesloat_start_tue= $("input[name='start_appt_timesloat[Tuesday][]']").val();  
	var timesloat_end_tue= $("input[name='end_appt_timesloat[Tuesday][]']").val();  
    var timesloat_start_wed= $("input[name='start_appt_timesloat[Wednesday][]']").val();  
	var timesloat_end_wed= $("input[name='end_appt_timesloat[Wednesday][]']").val();  
    var timesloat_start_thurs= $("input[name='start_appt_timesloat[Thursday][]']").val();  
	var timesloat_end_thurs= $("input[name='end_appt_timesloat[Thursday][]']").val();  
    var timesloat_start_fri= $("input[name='start_appt_timesloat[Friday][]']").val();  
	var timesloat_end_fri= $("input[name='end_appt_timesloat[Friday][]']").val();  
    var timesloat_start_sat= $("input[name='start_appt_timesloat[Saturday][]']").val();  
	var timesloat_end_sat= $("input[name='end_appt_timesloat[Saturday][]']").val();  

 if(timesloat_start_sun=="" && timesloat_end_sun==""){
	 var sun= $("#set_gen_booking_unavailable_day0").val();
	 if(sun!='on'){     
	$("input[name='start_appt_timesloat[Sunday][]']").addClass("error_input");
	$("input[name='end_appt_timesloat[Sunday][]']").addClass("error_input");
	isValid = false; 
	
	
	 }
	 
 }else{
		$("input[name='start_appt_timesloat[Sunday][]']").removeClass("error_input");
	$("input[name='end_appt_timesloat[Sunday][]']").removeClass("error_input");
	  
	 
 } if(timesloat_start_mon=="" && timesloat_end_mon==""){
	 var mon= $("#set_gen_booking_unavailable_day1").val();
	 if(mon!='on'){
	$("input[name='start_appt_timesloat[Monday][]']").addClass("error_input");
	$("input[name='end_appt_timesloat[Monday][]']").addClass("error_input");
	isValid = false; 
		
	 }
 }else{
	$("input[name='start_appt_timesloat[Monday][]']").removeClass("error_input");
	$("input[name='end_appt_timesloat[Monday][]']").removeClass("error_input");
	 
 } 
 
 if(timesloat_start_tue=="" && timesloat_end_tue==""){
	 var tue= $("#set_gen_booking_unavailable_day2").val();
	 if(tue!='on'){
	$("input[name='start_appt_timesloat[Tuesday][]']").addClass("error_input");
	$("input[name='end_appt_timesloat[Tuesday][]']").addClass("error_input");
	isValid = false; 
	 }
	 
 }else{
	$("input[name='start_appt_timesloat[Tuesday][]']").removeClass("error_input");
	$("input[name='end_appt_timesloat[Tuesday][]']").removeClass("error_input");
	
	 
 } 
 if(timesloat_start_wed=="" && timesloat_end_wed==""){
	  var wed= $("#set_gen_booking_unavailable_day3").val();
	 if(wed!='on'){
	$("input[name='start_appt_timesloat[Wednesday][]']").addClass("error_input");
	$("input[name='end_appt_timesloat[Wednesday][]']").addClass("error_input");
	isValid = false; 
	 }
	 
 }else{
	 $("input[name='start_appt_timesloat[Wednesday][]']").removeClass("error_input");
	$("input[name='end_appt_timesloat[Wednesday][]']").removeClass("error_input");
	
 }


 if(timesloat_start_thurs=="" && timesloat_end_thurs==""){
	 var thurs= $("#set_gen_booking_unavailable_day4").val();
	
	 if(thurs!='on'){
	$("input[name='start_appt_timesloat[Thursday][]']").addClass("error_input"); 
	$("input[name='end_appt_timesloat[Thursday][]']").addClass("error_input"); 
	isValid = false; 
	 } 
	 
 }else{
	$("input[name='start_appt_timesloat[Thursday][]']").removeClass("error_input"); 
	$("input[name='end_appt_timesloat[Thursday][]']").removeClass("error_input"); 
	
	 
 }	
 if(timesloat_start_fri=="" && timesloat_end_fri==""){
	 var fri= $("#set_gen_booking_unavailable_day5").val();
	 if(fri!='on'){
	$("input[name='start_appt_timesloat[Friday][]']").addClass("error_input");
	$("input[name='end_appt_timesloat[Friday][]']").addClass("error_input");
	isValid = false;
	 }	 
 }else{
	$("input[name='start_appt_timesloat[Friday][]']").removeClass("error_input");
	$("input[name='end_appt_timesloat[Friday][]']").removeClass("error_input");
	
 }
 if(timesloat_start_sat=="" && timesloat_end_sat==""){
	 var sat= $("#set_gen_booking_unavailable_day6").val();
	 if(sat!='on'){
		$("input[name='start_appt_timesloat[Saturday][]']").addClass("error_input");
	$("input[name='end_appt_timesloat[Saturday][]']").addClass("error_input");
	isValid = false; 
	 }
 }else{
	 $("input[name='start_appt_timesloat[Saturday][]']").removeClass("error_input");
	$("input[name='end_appt_timesloat[Saturday][]']").removeClass("error_input");
	
 }
 
if(isValid==false){
	$(".error_panel").html('Please fill in all the required fields.'); 
	$(".error_panel").show(); 
	
	}else{
	$(".error_panel").html(''); 
	$(".error_panel").hide(); 	
	} 
	
}


        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-success').trigger('click');

});
</script>