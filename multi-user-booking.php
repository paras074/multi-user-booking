<?php
/*
 * Plugin Name: Multi User Booking
 * Plugin URI: 
 * Description: This Plugin is used to update Manual data
 * Autor: Perfect Web Service(Hardeep Kaur)
 * Autor URI:
 * Version: 1.0
 * */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( "CUSTOM_BOOKING_DIR_PATH" ) ) {
    define( "CUSTOM_BOOKING_DIR_PATH", plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'CUSTOM_BOOKING_DIR_URL' ) ) {
    define( 'CUSTOM_BOOKING_DIR_URL', plugin_dir_url( __FILE__ ) );
}



function plugin_activate_custom_entry() {
    require_once  ABSPATH."wp-admin/includes/upgrade.php"; 
    global $wpdb;
	$getoption = get_option("booked_insert_data");
	if($getoption == "")
	{
            $sql = 'CREATE TABLE IF NOT EXISTS '.$wpdb->prefix . 'user_booking_setting
			(
							`id` int(10) NOT NULL AUTO_INCREMENT,
							`user_id` int(10) NOT NULL,
							`user_booking_share_url` varchar(500) NOT NULL,
							`set_gen_booking_unavailable_day` varchar(500) NOT NULL,
							`appt_timesloat` varchar(500) NOT NULL,
							`selected_timezone` varchar(500) NOT NULL,
							`appt_amount_15` varchar(500) NOT NULL,
							`appt_amount_30` varchar(500) NOT NULL,
							`appt_amount_60` varchar(500) NOT NULL,
							`profile_status` varchar(500) NOT NULL,
							PRIMARY KEY (`id`)
			)
	        ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1';
		    dbDelta($sql);
		    update_option("booked_insert_data","1");
			 $sql1 = 'CREATE TABLE IF NOT EXISTS '.$wpdb->prefix . 'user_booking
			(
							`id` int(10) NOT NULL AUTO_INCREMENT,
							`user_id` int(10) NOT NULL,
							`user_booking_clander_id` varchar(500) NOT NULL,
							`booking_date` varchar(500) NOT NULL,
							`booking_times` varchar(500) NOT NULL,
							`name` varchar(500) NOT NULL,							
							`email` varchar(500) NOT NULL,
							`phone_number` varchar(500) NOT NULL,
							`transaction_id` varchar(500) NOT NULL,
							`status` varchar(500) NOT NULL,
							PRIMARY KEY (`id`)
			)
	        ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1';
		    dbDelta($sql1);
			$sql2 = 'CREATE TABLE IF NOT EXISTS '.$wpdb->prefix . 'user_booking_transation
			(
							`id` int(10) NOT NULL AUTO_INCREMENT,
							`transaction` int(10) NOT NULL,
							`amount` varchar(500) NOT NULL,
							`dateandtime` datetime NOT NULL default 0000-00-00 00:00:00,
							`status` varchar(500) NOT NULL,
							PRIMARY KEY (`id`)
			)
	        ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1';
		    dbDelta($sql2);
	}
	
	$current_user = wp_get_current_user();
    
    // create post object
    $page = array(
      'post_title'  => __( 'User Dashboard' ),
      'post_status' => 'publish',
      'post_author' => $current_user->ID,
      'post_type'   => 'page',
    );
    
    // insert the post into the database
    wp_insert_post( $page );
	
}

function cb_create_admin_menu(){
    add_menu_page( "User Booking Calander", "User Booking Calander", 'read', 'cb_booking_calander', '', plugins_url( 'images/icons.png',  __FILE__ ) );
	add_submenu_page( 'cb_booking_calander', "User Booking Calander", "User Booking Calander", 'read', 'cb_booking_calander', 'cb_booking_calander');
	add_submenu_page( 'cb_booking_calander', "User Booking List", "User Booking List", 'read', 'user_booking_list', 'user_booking_list');
	add_submenu_page( 'cb_booking_calander', "User Booking Trasaction", "User Booking Trasaction", 'read', 'cb_trasactions', 'cb_trasactions');
	


}

function cb_booking_calander(){
    
    global $wpdb;
    if ( file_exists( CUSTOM_BOOKING_DIR_PATH . 'views/dashboard.php' ) ) {
        include CUSTOM_BOOKING_DIR_PATH . 'views/dashboard.php';
    }
}
function user_booking_list(){
   
    global $wpdb;
    if ( file_exists( CUSTOM_BOOKING_DIR_PATH . 'views/user_booking_list.php' ) ) {
        include CUSTOM_BOOKING_DIR_PATH . 'views/user_booking_list.php';
    }
}
function cb_trasactions(){
   
    global $wpdb;
    if ( file_exists( CUSTOM_BOOKING_DIR_PATH . 'views/cb_trasactions.php' ) ) {
        include CUSTOM_BOOKING_DIR_PATH . 'views/cb_trasactions.php';
    }
}

function cb_backend(){
    
    wp_enqueue_script("jquery");
    wp_enqueue_script( 'jquery.datatables.js', CUSTOM_BOOKING_DIR_URL . 'js/datatables/media/js/jquery.datatables.js' );
	wp_enqueue_script( 'preloader.js', CUSTOM_BOOKING_DIR_URL . 'js/preloader.js' );
    wp_enqueue_script( 'jquery.fngetfilterednodes.js', CUSTOM_BOOKING_DIR_URL . 'js/datatables/media/js/fngetfilterednodes.js' );
	wp_enqueue_script( 'toastr.js', CUSTOM_BOOKING_DIR_URL . 'js/toastr.js' );
    wp_enqueue_style( 'foundation.css', CUSTOM_BOOKING_DIR_URL . 'js/datatables/media/css/datatables.foundation.css' );
    wp_enqueue_style( 'toastr.css', CUSTOM_BOOKING_DIR_URL . 'css/toastr.css' );
    wp_enqueue_style( 'cb-custom.css', CUSTOM_BOOKING_DIR_URL . 'css/cb-custom.css' );
	wp_enqueue_style( 'toastr.css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap.min.css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js' );
    wp_enqueue_style( 'style.css', CUSTOM_BOOKING_DIR_URL . 'css/style.css' );
	

}

function user_update_data_forms(){
    global $wpdb;
    if ( file_exists( CUSTOM_BOOKING_DIR_PATH . 'actions/user-approved.php' ) ) {
        include CUSTOM_BOOKING_DIR_PATH . 'actions/user-approved.php';
    }
}
add_action("wp_ajax_user_update_data_forms", "user_update_data_forms");
register_activation_hook( __FILE__, 'plugin_activate_custom_entry' );
add_action("admin_menu","cb_create_admin_menu");
add_action("admin_init","cb_backend");

// Shortcode start//

add_shortcode('user_booking_clander', 'user_booking_clander_function');
function user_booking_clander_function() {
	include CUSTOM_BOOKING_DIR_PATH . 'views/frontend/user_booking_clander.php';
}
add_shortcode('calendly_user_dashboard', 'calendly_user_dashboard_function');
function calendly_user_dashboard_function() {
	include CUSTOM_BOOKING_DIR_PATH . 'views/frontend/calendly_user_dashboard.php';
}
	add_shortcode('user_booking_list', 'user_booking_list_function');
function user_booking_list_function() {
	include CUSTOM_BOOKING_DIR_PATH . 'views/frontend/user_booking_list.php';
}
add_shortcode('profile_complete_form', 'profile_complete_form_function');
function profile_complete_form_function() {
	include CUSTOM_BOOKING_DIR_PATH . 'views/frontend/profile_complete.php';
	
}
add_shortcode('profile_complete_view', 'profile_complete_view_function');
function profile_complete_view_function() {
	include CUSTOM_BOOKING_DIR_PATH . 'views/frontend/profile_complete_view.php';
	
}

// Shortcode end//
function my_enqueue() {
      wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/js/my-ajax-script.js', array('jquery') );
      wp_localize_script( 'ajax-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
 }
 add_action( 'wp_enqueue_scripts', 'my_enqueue' );	
    
add_action( 'wp_ajax_user_booking_submit', 'function_user_booking_submit' );
add_action( 'wp_ajax_nopriv_user_booking_submit', 'function_user_booking_submit' );
function function_user_booking_submit() {
	global $wpdb;
	$user_cal_id= $_POST['user_calendar_id'];
	$users_data = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . "user_booking_setting Where id=".$user_cal_id . "");
	$user_id_id=$users_data->user_id;
	
	$user = get_userdata($user_id_id);
//print_r($user);
 	$useremail=$user->user_email;
//die;
	$current_user = wp_get_current_user();
	$user_id=$current_user->ID;
	$select_timeslot=$_POST['select_timeslot'];
	 /* $total_sloat=count($_POST['start_appt_timesloat']);
		$timesloat[$select_timeslot]['start_time']=$_POST['user_calendar_start_time'][$select_timeslot]['start_time'];
		$timesloat[$select_timeslot]['end_time']=$_POST['user_calendar_end_time'][$select_timeslot]['end_time'];
	 */
	
$res=	$wpdb->insert('wp_user_booking', array(
    'user_id' => $user_id,
    'user_booking_clander_id' => $_POST['user_calendar_id'],
    'booking_date' => $_POST['selected_date'],
    'booking_times' => $select_timeslot, 
    'name' => $_POST['guest_name'], 
    'email' => $_POST['guest_email'], 
    'phone_number' => $_POST['guest_phone_number'], 
    //'message' => $_POST['msg'], 
    'status' => 'pending', 
));
if($res==1){
    
    //$user = new WP_User($user_id);

    //$user_login = stripslashes($user->user_login);
   // $user_email = stripslashes($user->user_email);

    $email_subject = "Welcome to MyAwesomeSite ".$_POST['guest_name']."!";

    ob_start();

    include("email_header.php");

    ?>

    <p>A very special welcome to you, <?php echo $_POST['guest_name'] ?>. Thank you for joining MyAwesomeSite.com!</p>
  
    <p>
   Your Appoitment time is : <?php echo $_POST['selected_date'];  ?>  <?php echo $select_timeslot;  ?>    
    </p>

    <p>
        We hope you enjoy your stay at MyAwesomeSite.com. If you have any problems, questions, opinions, praise,
        comments, suggestions, please feel free to contact us at any time
    </p>

    <?php
    include("email_footer.php");

    $message = ob_get_contents();
    ob_end_clean();

    wp_mail($_POST['guest_email'], $email_subject, $message);
    
    $email_subject1 = "Appointment booking for   ".$_POST['guest_name']."!";

    ob_start();

    include("email_header.php");

    ?>

    <p> <?php echo $_POST['guest_name'] ?> booking a apponitment </p>
  
    <p>
    Appoitment time is : <?php echo $_POST['selected_date'];  ?>  <?php echo $select_timeslot;  ?>    
    </p>
    <p>
   Message : <?php echo $_POST['msg'];  ?>  
    </p>
    

    <?php
    include("email_footer.php");

    $message1 = ob_get_contents();
    ob_end_clean();

    wp_mail($useremail, $email_subject1, $message1);
    
    
    
    
    
    
    $response['error'] = false;
    	$response['message'] = 'Booking is save ';
		exit(json_encode($response));
}else{
	$response['error'] = true;
    	$response['message'] = 'Data not submit.Please try agagin';
 
    	// Exit here, for not processing further because of the error
    	exit(json_encode($response));
	
}
    
    
    	
    }
	
	


/* end create  custom shortcode of  profile complete form    */

add_action( 'wp_ajax_user_profile_complete_update', 'function_user_profile_complete_update' );
add_action( 'wp_ajax_nopriv_user_profile_complete_update', 'function_user_profile_complete_update' );
function function_user_profile_complete_update() {
global $wpdb;
	
	$current_user = wp_get_current_user();
	$user_id=$current_user->ID;
	
	
	if($_POST['form']=="shedule_form"){
	$days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
	foreach ($days as $key=>$day) {
		$total_sloat=count($_POST['start_appt_timesloat'][$day]);
	for($x=0; $x<$total_sloat; $x++){
		if(!empty($_POST['start_appt_timesloat'][$day][$x]) && !empty($_POST['end_appt_timesloat'][$day][$x])){
		$timesloat[$day][$x]['start_time']=$_POST['start_appt_timesloat'][$day][$x];
		$timesloat[$day][$x]['end_time']=$_POST['end_appt_timesloat'][$day][$x];
		}else{
			$timesloat[$day]="";
		}
	}
		if(isset($_POST['set_gen_booking_unavailable_day'.$key])){
		$days1[]=$day;
		}
	}	
		
		
    $res=	$wpdb->update('wp_user_booking_setting', array('set_gen_booking_unavailable_day' => serialize($days1),  'appt_timesloat' => serialize($timesloat), 'selected_timezone' => $_POST['Selecttimezone'] ),array('id'=>$_POST['clander_id']));
if($res==1){
    $response['error'] = false;
    	$response['message'] = 'Your Profile is Update Please share url to Anyone. ';
		exit(json_encode($response));
}else{
	$response['error'] = true;
    	$response['message'] = 'Data not submit.Please try agagin';
 
    	// Exit here, for not processing further because of the error
    	exit(json_encode($response));
	
}
}
if($_POST['form']=="shedule_amount_form"){
    $res=	$wpdb->update('wp_user_booking_setting', array( 'appt_amount_15' => $_POST['appt_amount_15'], 'appt_amount_30' => $_POST['appt_amount_30'],   'appt_amount_60' => $_POST['appt_amount_60']),array('id'=>$_POST['clander_id']));
if($res==1){
    $response['error'] = false;
    	$response['message'] = 'Update ';
		exit(json_encode($response));
}else{
	$response['error'] = true;
    	$response['message'] = 'Data not submit.Please try agagin';
 
    	// Exit here, for not processing further because of the error
    	exit(json_encode($response));
	
}
}

	
}
add_action( 'wp_ajax_user_profile_complete_submit', 'function_user_profile_complete_submit' );
add_action( 'wp_ajax_nopriv_user_profile_complete_submit', 'function_user_profile_complete_submit' );
function function_user_profile_complete_submit() {
	global $wpdb;
	
	$current_user = wp_get_current_user();
	$user_id=$current_user->ID;
	$days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
	foreach ($days as $key=>$day) {
		$total_sloat=count($_POST['start_appt_timesloat'][$day]);
	for($x=0; $x<$total_sloat; $x++){
		if(!empty($_POST['start_appt_timesloat'][$day][$x]) && !empty($_POST['end_appt_timesloat'][$day][$x])){
		$timesloat[$day][$x]['start_time']=$_POST['start_appt_timesloat'][$day][$x];
		$timesloat[$day][$x]['end_time']=$_POST['end_appt_timesloat'][$day][$x];
		}else{
			$timesloat[$day]="";
		}
	}
		if(isset($_POST['set_gen_booking_unavailable_day'.$key])){
		$days1[]=$day;
		}
	}
	
if(isset($_POST['clander_id'])){
    $res=	$wpdb->update('wp_user_booking_setting', array(
    'user_id' => $user_id,
    'user_booking_share_url' => $_POST['user_booking_share_url'],
    'set_gen_booking_unavailable_day' => serialize($days1), 
    'appt_timesloat' => serialize($timesloat), // ... and so on
    'appt_amount_15' => $_POST['appt_amount_15'], // ... and so on
    'appt_amount_30' => $_POST['appt_amount_30'], // ... and so on
    'appt_amount_60' => $_POST['appt_amount_60'], // ... and so on
    'selected_timezone' => $_POST['Selecttimezone'], // ... and so on
    'profile_status' => 'Complete', // ... and so on
),array('id'=>$_POST['clander_id']));
if($res==1){
    $response['error'] = false;
    	$response['message'] = 'Your Profile is complete Please share url to Anyone. ';
		exit(json_encode($response));
}else{
	$response['error'] = true;
    	$response['message'] = 'Data not submit.Please try agagin';
 
    	// Exit here, for not processing further because of the error
    	exit(json_encode($response));
	
}
}else{
  $res=	$wpdb->insert('wp_user_booking_setting', array(
    'user_id' => $user_id,
    'user_booking_share_url' => $_POST['user_booking_share_url'],
    'set_gen_booking_unavailable_day' => serialize($days1), 
    'appt_timesloat' => serialize($timesloat), // ... and so on
    'appt_amount_15' => $_POST['appt_amount_15'], // ... and so on
    'appt_amount_30' => $_POST['appt_amount_30'], // ... and so on
    'appt_amount_60' => $_POST['appt_amount_60'], // ... and so on
    'selected_timezone' => $_POST['Selecttimezone'], // ... and so on
    'profile_status' => 'Complete', // ... and so on
));
if($res==1){
    $response['error'] = false;
    	$response['message'] = 'Your Profile is complete Please share url to Anyone. ';
		exit(json_encode($response));
}else{
	$response['error'] = true;
    	$response['message'] = 'Data not submit.Please try agagin';
 
    	// Exit here, for not processing further because of the error
    	exit(json_encode($response));
	
}  
    
}

    
    
    	
    }
add_action( 'wp_ajax_user_booking_slot', 'function_user_booking_slot' );
add_action( 'wp_ajax_nopriv_user_booking_slot', 'function_user_booking_slot' );
function function_user_booking_slot() {
	global $wpdb;
	$slected_date=$_POST['start_date'];
	if(isset($_POST['timeperoid'])){
	$timeperoid=$_POST['timeperoid'];
	}else{
		$timeperoid="15";
	}
	$dayOfWeek = date("l", strtotime($slected_date));
	$user_cal_id=$_POST['user_cal_id'];
	$users_data = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . "user_booking_setting Where id=".$user_cal_id . "");
	$weektimeslot=unserialize($users_data->appt_timesloat);
	$selected_timezone=$users_data->selected_timezone;
$users_data1 = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix . "user_booking WHERE booking_date >= CURDATE() ORDER BY booking_date");

$booked=array();
foreach($users_data1 as $book_date_list ){
	$seleced_time=explode('–',$book_date_list->booking_times);
	$st=$seleced_time[0];
	$et=$seleced_time[1];
	$booked[]=$book_date_list->booking_date.'  '.$st;
	$booked[]=$book_date_list->booking_date.'  '.$et;
}

$system_timezone = date_default_timezone_get();
    $local_timezone = $selected_timezone;
    date_default_timezone_set($local_timezone);
    $local = date("Y-m-d h:i:s A");
 
    date_default_timezone_set("GMT");
    $gmt = date("Y-m-d h:i:s A");
 
    $require_timezone = $_POST['select_timezone'];
    date_default_timezone_set($require_timezone);
    $required = date("Y-m-d h:i:s A");
 
    date_default_timezone_set($system_timezone);

    $diff1 = (strtotime($gmt) - strtotime($local));
    $diff2 = (strtotime($required) - strtotime($gmt));

    






$currentTime1 = DateTime::createFromFormat('Y-m-d H:i',$currentTime);
	
$c1 = date_timestamp_get($currentTime1);
if(empty($weektimeslot[$dayOfWeek])){
	
$start_time = $slected_date.' 09:00';  //start time as string
$end_time = $slected_date.' 18:00';  

$date = new DateTime($start_time);
    $date->modify("+$diff1 seconds");
    $date->modify("+$diff2 seconds");
    $start_time = $date->format("Y-m-d H:i");

$date1 = new DateTime($end_time);
    $date1->modify("+$diff1 seconds");
    $date1->modify("+$diff2 seconds");
  $end_time = $date1->format("Y-m-d H:i");

$start = DateTime::createFromFormat('Y-m-d H:i',$start_time);  //create date time objects

$end = DateTime::createFromFormat('Y-m-d H:i',$end_time);  //create date time objects

$time1 = $start;
$count = 0;  //number of slots
$out = array();   //array of slots 
/* echo $start_time."<br>";
echo $currentTime; */

 //if(strtotime($start_time) > strtotime($currentTime)){
for($i = $start; $i<$end;)  //for loop 
{
$avoid = false; 
$t1 = date_timestamp_get($i);
$t2 = $t1+(20*$timeperoid);

    for($k=0;$k<sizeof($booked);$k+=2)  //if booked hour
    {
    $st = DateTime::createFromFormat('Y-m-d H:i',$booked[$k]);
    $en = DateTime::createFromFormat('Y-m-d H:i',$booked[$k+1]);

    if( $t1 >= date_timestamp_get($st) && $t2 <= date_timestamp_get($en)  )
    $avoid = true;   //yes. booked
   
    }
    if( $t1 < $c1 ){
    $avoid = true;   //yes. booked
   }
$slots =[ $i->format('H:i'),$i->modify("+".$timeperoid." minutes")->format('H:i')];
if(!$avoid && $i<$end)  //if not booked and less than end time
{
$count++;  
array_push($out,$slots);  //add slot to array
}

}
$html="";

 foreach($out as $key=>$timesloat){
//if($timesloat[0])>strtotime(date("h:i"))){

	
	$html.='<p class="appointment-info" ><input type="checkbox" value="'.$timesloat[0].'–'.$timesloat[1].'" name="select_timeslot"> <i class="booked-icon booked-icon-calendar"></i>&nbsp;&nbsp;&nbsp;'.$timesloat[0].'–'.$timesloat[1].'</p>';
			
//}
} 
echo $html;
die;
//echo $count ." of slots available";
}else{
	
foreach($weektimeslot[$dayOfWeek] as $selectedweekslot){	
$start_time = $slected_date.' '.$selectedweekslot['start_time'];  //start time as string
$end_time = $slected_date.' '.$selectedweekslot['end_time'];    //end time as string
 

$date = new DateTime($start_time);
    $date->modify("+$diff1 seconds");
    $date->modify("+$diff2 seconds");
    $start_time = $date->format("Y-m-d H:i");

$date1 = new DateTime($end_time);
    $date1->modify("+$diff1 seconds");
    $date1->modify("+$diff2 seconds");
  $end_time = $date1->format("Y-m-d H:i");

$userTimezone = new DateTimeZone($_POST['select_timezone']);
$gmtTimezone = new DateTimeZone('GMT');
//start_time
$myDateTime = new DateTime($start_time, $gmtTimezone);
$offset = $userTimezone->getOffset($myDateTime);
$myInterval=DateInterval::createFromDateString((string)$offset . 'seconds');
$myDateTime->add($myInterval);
$start_time = $myDateTime->format('Y-m-d H:i');

//end_time
$myDateTime1 = new DateTime($end_time, $gmtTimezone);
$offset1 = $userTimezone->getOffset($myDateTime1);
$myInterval1=DateInterval::createFromDateString((string)$offset1 . 'seconds');
$myDateTime1->add($myInterval1);
$end_time = $myDateTime1->format('Y-m-d H:i');

$start = DateTime::createFromFormat('Y-m-d H:i',$start_time);  //create date time objects
//$start->setTimeZone(new DateTimeZone($timezone));

$end = DateTime::createFromFormat('Y-m-d H:i',$end_time);  //create date time objects
//$end->setTimeZone(new DateTimeZone($timezone));
//print_r($start);
$time1 = $start;
$count = 0;  //number of slots
$out = array();   //array of slots 
 
for($i = $start; $i<$end;)  //for loop 
{
	
$avoid = false; 
$t1 = date_timestamp_get($i);

$t2 = $t1+(20*$timeperoid);

    for($k=0;$k<sizeof($booked);$k+=2)  //if booked hour
    {
    $st = DateTime::createFromFormat('Y-m-d H:i',$booked[$k]);
    $en = DateTime::createFromFormat('Y-m-d H:i',$booked[$k+1]);

    if( $t1 >= date_timestamp_get($st) && $t2 <= date_timestamp_get($en)   )
    $avoid = true;   //yes. booked
   }
    if( $t1 < $c1 ){
    $avoid = true;   //yes. booked
   }
   
$slots =[ $i->format('H:i'),$i->modify("+".$timeperoid." minutes")->format('H:i')];
if(!$avoid && $i<$end )  //if not booked and less than end time
{
$count++;  
array_push($out,$slots);  //add slot to array
}
}


 }
$html="";

 foreach($out as $key=>$timesloat){
//if($timesloat[0])>strtotime(date("h:i"))){

	
	$html.='<p class="appointment-info"><input type="checkbox" value="'.$timesloat[0].'–'.$timesloat[1].'" name="select_timeslot"> <i class="booked-icon booked-icon-calendar"></i>&nbsp;&nbsp;&nbsp;'.$timesloat[0].'–'.$timesloat[1].'</p>';
			
//}
} 
echo $html;
die;
//echo $count ." of slots available";

}   	
}
	add_filter( 'user_registration_account_menu_items', 'ur_custom_menu_items', 10, 1 );
function ur_custom_menu_items( $items ) {
	
    $items['user-dashboard'] = __( 'Calendar Profile', 'user-registration' );
    return $items;
}

/*  add_action( 'init', 'user_registration_add_new_my_account_endpoint' );
function user_registration_add_new_my_account_endpoint() {
    add_rewrite_endpoint( 'booking_list', EP_PAGES );
} */

function user_registration_new_item_endpoint_content() {
   ur_get_template( 'myaccount/new-item.php');
}
add_action( 'user_registration_account_new_item_endpoint', 'user_registration_new_item_endpoint_content' );

 add_filter( 'wp_mail_content_type', 'set_content_type' );
 
function set_content_type( $content_type ) {
    return 'text/html';
}
	
?>