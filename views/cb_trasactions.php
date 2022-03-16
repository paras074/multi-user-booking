<style type="text/css">
@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css);
@import url('https://fonts.googleapis.com/css?family=Exo:300,400,500,600,700&display=swap');
body
{
padding: 0; margin:0;font-family: 'Exo', sans-serif !important;}
.verttopbar {background: #008dd5; float: left; width: 100%; height: 60px; box-shadow: 0px 1px 20px 0px rgba(46, 61, 73, 0.2);     transition: .3s;}
.verttopbar a.navbar-brands {color: #fff; font-size: 25px; }
ul{padding:0; margin:0; list-style: none}
.right_section li {float: left; line-height: 60px; border-right: 1px solid rgba(255,255,255,0.4); text-align: center; }
.right_section a {color: #fff; font-size: 16px; text-align: center; padding: 0 20px; transition: .2s }
.display-flex {display: flex; align-items: center; justify-content: space-between; }
a:hover{text-decoration: none}
.right_section li:hover {background: rgba(255,255,255,0.2);transition: .2s }
.custom-dashboard {float: left; width: 100%; padding: 50px 0 70px; background: #f5f7fb; }
.custom-dashboard h3 {margin-top: 0; text-transform: uppercase; font-weight: 600; letter-spacing: 0.125rem; text-align: center; }
.custab {border: none; padding: 5px; margin: 5% 0; box-shadow: none; transition: 0.5s; background: transparent; }
.spacer {height: 20px; }
.custab td { padding: 20px 12px !important;}
.custab:hover{box-shadow: 3px 3px 0px transparent; transition: 0.5s; }
a.btn-cusnt {background: #008dd5; color: #fff; padding: 8px 21px; text-transform: uppercase; font-weight: 700; font-size: 12px; box-shadow: 0px 1px 20px 0px rgba(46, 61, 73, 0.4); transition: .3s; }
a.btn-cusnt:hover {box-shadow: 0px 1px 20px 0px rgba(46, 61, 73, 0.2); }
.imgslae img {  width: 100%; background: #000; max-width: 75px; height: 55px; object-fit: cover; }
.imgslae {    float: left; margin-right: 0px; width: 40%; text-align: center;}
.tagname {margin-top: 16px; font-size: 18px; color: #000; font-weight: 600;text-decoration:none; text-align:left;}
.custab td {vertical-align: middle !important; } 
.custab th {padding: 16px 12px !important; }
.ui-widget-header {background: green; border: 1px solid #DDDDDD; height: 60px !important; }
.ui-progressbar {height: 1em; }
.cutmbox a.btn-cusnt.btn-xs {font-size: 11px; padding: 3px 9px; }
.cutmbox {background: #fff; padding: 30px 15px; box-shadow: 0px 12px 18px -12px rgba(0,0,0,0.3); border-top: 5px solid #008dd5; border-radius: 3px; }
.cutmbox .custab {box-shadow: none;}
.table>thead>tr>th{border-bottom: none}
.custab td {border: none !important;     color: #000; padding: 10px 12px !important;}
.edit-form h3 {text-align: center; margin: 28px 0px 23px 0px; font-size: 20px; }
.edit-form input, .edit-form select {border: 1px solid #ddd; box-shadow: none; border-radius: 0; height: 41px; padding: 6px 12px; width:100%; }
.edit-form input[type="submit"] {color:#fff;width:auto;background: linear-gradient(to left, #0073fe 0%,#02bfff 100%); border: none; padding: 10px 15px 9px; height: auto; text-transform: uppercase; font-weight: 700; border-radius: 3px; line-height: normal; margin-top: 10px; }
.edit-form img {max-width: 20px; }
.edit-form button.close {position: absolute; right: 10px; top: 10px; opacity: 1;z-index: 99 }
.edit-form .modal-dialog {top: 8%; margin: 0 auto; max-width: 500px; }
.edit-form label {float: left;width: 100%;}
.edit-form li { margin-bottom: 14px; }
.cutmbox a, .tagname a {color: #000; font-weight: 700; text-transform: uppercase; }
.custab thead {background: #fff; border: 1px solid #e4e8f3; }
.custab th {color: #008dd5; text-transform: capitalize; }
.cutmbox td { border-right: 1px solid #ddd;}
.right_section li:last-child {border-right: none;}
.sep { background: #008dd5; height: 4px;margin-top: 4px;width: 63px; margin: 0 auto;}
.custab tbody {background: #fff; position: relative; }
.total {background: #f73c02; color: #fff; border-radius: 3px; width: auto; text-align: center; padding: 3px 5px; line-height: normal; margin-bottom: 10px; font-size: 12px; font-weight: 700; display: inline-block; }
.progress-bar {background-color: #46c0ff !important; }
.custab tbody tr {border-bottom: 1px solid #e4e8f3; border-left: 1px solid #e4e8f3; border-right: 1px solid #e4e8f3; border-top: 1px solid #e4e8f3; }
.table-striped>tbody>tr:nth-of-type(odd) {background-color: transparent; }
.custab tbody::before {background: #f5f7fb; display: inline-block; content: ""; width: 100%; height: 15px; float: left; }
.cutmbox .custab tbody::before{display: none}
.cutmbox table {margin-bottom: 0; }
.cutmbox h3 {font-size: 18px; }
a.woocommerce-button.button.view, .viewbutton {background: #008dd5; color: #fff; padding: 6px 12px; border-radius: 3px; font-size: 11px !important; font-weight: 700 !important; box-shadow: 0px 1px 20px 0px rgba(46, 61, 73, 0.4); transition: .3s; }
a.woocommerce-button.button.view:hover, .viewbutton:hover {box-shadow: 2px 1px 20px 0px rgba(46, 61, 73, 0.2); }
.cutmbox td {padding: 13px 1px  !important; border-left: 1px solid #e4e8f3 !important; }
.cutmbox th {border-left: 1px solid #e4e8f3 !important; }
a.viewbutton { color: #fff;}
.progress-bar span {padding: 0 10px; }
.new-logo a.navbar-brands:hover {text-decoration: none;}

/*#wppb_form_success_message {display:none !important;}*/
#order_details .modal-content {box-shadow: none; border-radius: 0; }
div#order_details.in {background: rgba(0,0,0,0.5); }
#order_details .modal-dialog {top: 20%; }
table.woocommerce-table.woocommerce-table--order-details.shop_table.order_details {width: 100%;  margin-bottom: 20px;}
#order_details thead , #order_details tbody {border: 1px solid #e4e8f3; }
#order_details tr th , #order_details tr td {padding: 8px 12px; }
#order_details tfoot {border:1px solid #e4e8f3; }
#order_details  tr {border-bottom: 1px solid #e4e8f3; }
#order_details .modal-header {border-bottom: none; }
#order_details button.close {font-size: 22px; font-family: sans-serif; background: #00bdff; opacity: 1; color: #fff; border-radius: 50px; height: 33px; width: 33px; position: absolute; right: -11px; top: -11px; }
#order_details h4.modal-title {text-align: center; margin-top: 30px; font-size: 24px; }
.right_section img {width: 30px; height: 30px; border-radius: 50px; border: 2px solid #fff; }
.footer {background: #282828; padding: 30px 0 20px; text-align: center;    float: left; width: 100%; }
.footer p {color: #fff; margin-bottom: 0; }
p#wpua-upload-messages-existing {display: none;}
#wpua-images-existing {display: none;}
.button-primary {display: none;}
.verttopbar .container-fluid {padding: 0px 0px 0px 13px; }
.verttopbar.fixeheader {position: fixed; left: 0; right: 0; z-index: 99; top: 0; }
.customewidth td:first-child {width: 30%; }
.customewidth td:nth-child(2) {width: 10%; font-size: 18px; }
.customewidth td:nth-child(3) {width: 45%; text-align: left !important;}
.customewidth td:last-child {width: 25%; }
#tbl_synhold th, #tbl_synhold td , #tbl_transcatin th, #tbl_transcatin           td { text-align: center;}
#tbl_transcatin td:first-child {width: 25%; }
#tbl_transcatin td:nth-child(3) {width: 25%; }
#tblshare th ,#tblshare td {text-align: center; }
.soldout {position: absolute; left: 0; right: 0; top: 0; display: flex; align-items: center; justify-content: center; bottom: 0; }
.soldout img {max-width: 127px; }
.customewidth td:last-child {position: relative; }


@media (min-width: 705px) and (max-width:980px){

.imgslae { width: 45%; }
.imgslae img {max-width: 50px; }
.tagname {margin-top: 2px; font-size: 14px; }
.soldout img {max-width: 100%;}
}

@media (min-width: 1000px) and (max-width:1100px){

.tagname {margin-top: 18px; font-size: 14px; }


}



@media (min-width: 200px) and (max-width:700px)
{
.table-responsive {border:none !important;}
.soldout img {max-width: 50px;}
.imgslae img {max-width: 55px;height: 38px;}
.right_section a {padding: 0 12px; }
.verttopbar a.navbar-brands {font-size: 17px; padding-left: 9px; font-weight: 600; }
.table-responsive {border: none; }
.imgslae {margin-right: 0; width: 100%; float: none; text-align: left; }
.cutmbox {margin-bottom: 20px; }
.verttopbar .container {padding: 0; }
.right_section li:first-child a {overflow: hidden; text-overflow: ellipsis; white-space: nowrap; width: 84px; display: block; font-size: 14px; }
#tblshare th ,.table-responsive #tblshare td {white-space: inherit; vertical-align: middle;}

.tagname {margin-top: 5px; text-align: left; line-height: 12px; }
.tagname a {font-size: 12px; text-align: center; }
a.btn-cusnt {padding: 6px 10px; font-size: 11px; }
#tbl_synhold th, #tbl_synhold td {white-space: inherit; vertical-align: middle; }
.tagname { width: 80px;}
#order_details .modal-dialog {
top: 10%;
}
.verttopbar .container-fluid { padding: 0px 13px 0px 13px;}
.customewidth td:first-child ,.customewidth td:nth-child(2) , .customewidth td:nth-child(3) ,.customewidth td:last-child {width: 100%; }
.total {font-size: 9px; }

}




.progress 
{
overflow: hidden;
height: 20px;
background-color: #ccc;
border-radius: 4px;
-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
margin-bottom: 20px;
}
.progress-bar 
{
width: 0;
height: 100%;
color: #fff;
text-align: center;
background-color: #46c0ff !important;
}
.progress-striped .progress-bar 
{
background-image: -webkit-linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
background-image: linear-gradient(45deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent);
background-size: 40px 40px;
}
.progress.active .progress-bar 
{
-webkit-animation: progress-bar-stripes 2s linear infinite;
animation: progress-bar-stripes 2s linear infinite;
-moz-animation: progress-bar-stripes 2s linear infinite;
}
#loader 
{
position: fixed;
top: 0;
right: 0;
bottom: 0;
left: 0;
background: rgba(0,0,0,0.6);
display:none;
z-index: 9;
}
.dot 
{
position: absolute;
top: 50%;
left: 50%;
-webkit-transform: translate(-50%, -50%);
transform: translate(-50%, -50%);
background: #008dd5;
border-radius: 100%;
animation-duration: 1s;
animation-name: loader_dot;
animation-iteration-count: infinite;
animation-direction: alternate;
}
@keyframes loader_dot {
0% {
width: 0px;
height: 0px;
}

to {
width: 50px;
height: 50px;
}
}


.loader {
text-align: center;    
}
.loader span {
display: inline-block;
vertical-align: middle;
width: 10px;
height: 10px;
margin: 50px auto;
background: #fff3db;
border-radius: 50px;
-webkit-animation: loader 0.9s infinite alternate;
-moz-animation: loader 0.9s infinite alternate;
}
.loader span:nth-of-type(2) {
-webkit-animation-delay: 0.3s;
-moz-animation-delay: 0.3s;
}
.loader span:nth-of-type(3) {
-webkit-animation-delay: 0.6s;
-moz-animation-delay: 0.6s;
}

.loader {
position: relative;
top: 40%;
}


@-webkit-keyframes loader {
0% {
width: 10px;
height: 10px;
opacity: 0.9;
-webkit-transform: translateY(0);
}
100% {
width: 24px;
height: 24px;
opacity: 0.1;
-webkit-transform: translateY(-21px);
}
}
@-moz-keyframes loader {
0% {
width: 10px;
height: 10px;
opacity: 0.9;
-moz-transform: translateY(0);
}
100% {
width: 24px;
height: 24px;
opacity: 0.1;
-moz-transform: translateY(-21px);
}
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> 
<div id="loader" style="display:none;" >
<div class="loader">
<span></span>
<span></span>
<span></span>
</div>
</div>
<?php

 $user_id=$_GET['user_id'];
$customer = wp_get_current_user();
// Get all customer orders
$customer_orders = get_posts( array(
'numberposts' => -1,
'meta_key'    => '_customer_user',
'meta_value'  => $user_id,
'post_type'   => wc_get_order_types(),
'post_status' => array_keys( wc_get_order_statuses() ),  //'post_status' => array('wc-completed', 'wc-processing'),
));



?>

<div class="custom-dashboard">
<div class="container">
<div class="row">

<div class="col-sm-12">
<div class="cutmbox">
<h3>Transactions </h3>
<div class="sep"></div>
<div class="table-responsive">
<?php
if(count( $customer_orders ) > 0)
{
?>
<table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table table table-striped custab table-hover" id="tbl_transcatin">
<thead>
<tr>
<th>Artist</th>
<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : 
if($column_id != "order-actions" && $column_id != "order-status")
{
	?>
	<th class="woocommerce-orders-table__header woocommerce-orders-table__header-<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo $column_name == "Total" ? "Transaction" : esc_html( $column_name ); ?></span></th>
	<?php 
} 
endforeach; 
?>
<th>Certificate</th>
<th>Agreement</th>
</tr>
</thead>
<tbody>
<?php 

  $product_id=[];
  foreach ( $customer_orders as $customer_order ) {
  $order_id=$customer_order->ID;
   $order = new WC_Order( $order_id );
$items = $order->get_items();
foreach ( $items as $item ) {
        $product_id[] = $item['product_id'];
     
}
  }
 
//print_r($product_id);
  
    
$allarray = array();
foreach ( $customer_orders as $customer_order ) :
$order = wc_get_order( $customer_order );


$item_count = $order->get_item_count();
$order = wc_get_order( $customer_order->ID );
$items = $order->get_items();
$g = explode(" ", wc_format_datetime( $order->get_date_created()));
$f = explode(",",$g[1]);
$space = "      ";
$product_sum = array();
$product_total_sum = array();
$key_1_value = get_post_meta( $customer_order->ID, '_wfacp_post_id', true );
if($key_1_value == "886")
{
$share_price = get_user_meta( $user_id, "user_priceHara", true );
$syndicate_share = "5,00,000";
$syndicate_share_p = "500000";
$internal_eval = $syndicate_share_p * $share_price;
$internal_evaluation = "£".number_format($internal_eval);
$product_nam = "The Hara Syndicate Certificates";
$artist = "THE HARA";
}
else if($key_1_value == "5712") //($key_1_value == "5712")
{
$share_price = get_user_meta( $user_id, "user_priceYBT", true ); 
$syndicate_share = "5,00,000";
$syndicate_share_p = "500000";
$internal_eval = $syndicate_share_p * $share_price;
$internal_evaluation = "£".number_format($internal_eval);
$product_nam = "Dare You Not To Syndicate Certificates";
$artist = "DARE YOU NOT TO";
}
else if($key_1_value == "5719")
{
$share_price = get_user_meta( $user_id, "user_priceSH", true ); 
$syndicate_share = "5,00,000";
$syndicate_share_p = "500000";
$internal_eval = $syndicate_share_p * $share_price;
$internal_evaluation = "£".number_format($internal_eval);
$product_nam = "Edens Back Syndicate Certificates";
$artist = "EDENS BACK";
}

foreach ( $items as $item ) 
{
$product_name = $item->get_name();
$item_total = $item->get_total();
$product_id = $item->get_product_id();
$quantity = $item['quantity'];
if($item_count > 1)
{
	switch($product_name)
	{
		// PRODUCTS FOR THE HARA 
		
		case "5000 Hara Syndicate Certificates":
			$amount = $item_total;
			array_push($product_sum,$amount);
			array_push($product_total_sum,$item_total);
		break;
		
	
		// PRODUCTS FOR DARE YOU NOT TO
		
		case "5000 DYNT Syndicate Certificates":
			$amount = $item_total;
			array_push($product_sum,$amount);
			array_push($product_total_sum,$item_total);
		break;
		
	
		
		// PRODUCTS FOR EDENS BACK
		
		case "5000 EdensBack Syndicate Certificates":
			$amount = $item_total;
			array_push($product_sum,$amount);
			array_push($product_total_sum,$item_total);
		break;
		
		
		
	}
	
	$too = array_sum($product_sum) - round($order->get_total());
	$to = $too == "0" ? "" :   " + ". $too;
	$quant = round($order->get_total()) .' '.$to;
	$allarray[$customer_order->ID] = array('internal_evaluation' => $internal_evaluation,'syndicate_share'=> $syndicate_share,'share_price' => $share_price,'order_total' => "£".array_sum($product_total_sum), 'quantity' => $quant, 'day' => $g[0], 'month' => $f[0], 'year' => $g[2], 'id'=>$customer_order->ID,'totalagree'=>array_sum($product_sum),'total'=>$space.' '.array_sum($product_sum),'product_name' => $product_nam,'date'=>  wc_format_datetime( $order->get_date_created()), 'name'=>  $current_user->display_name, 'email' => $current_user->user_email,'item_count' => $item_count );
}
else if($item_count == 1)
{
	switch($product_name)
	{
		// PRODUCTS FOR THE HARA 
		
		case "5000 Hara Syndicate Certificates":
			$amount = $item_total;
			array_push($product_total_sum,$item_total);
		break;
		
	
		// PRODUCTS FOR DARE YOU NOT TO 
		
		case "5000 DYNT Syndicate Certificates":
			$amount = $item_total;
			array_push($product_total_sum,$item_total);
		break;
		
		
		// PRODUCTS FOR EDENS BACK
		
		case "5000 EdensBack Syndicate Certificates":
			$amount = $item_total;
			array_push($product_total_sum,$item_total);
		break;
		
		
	}
	$qua = $quantity .' x';
	$allarray[$customer_order->ID] = array('internal_evaluation' => $internal_evaluation,'syndicate_share'=> $syndicate_share,'share_price' => $share_price,'order_total' => "£".array_sum($product_total_sum), 'quantity' => $qua, 'day' => $g[0], 'month' => $f[0], 'year' => $g[2], 'id'=>$customer_order->ID,'totalagree'=>$amount,'total'=>$space.' '.$amount,'product_name' => $product_name = $item->get_name(),'date'=>  wc_format_datetime( $order->get_date_created()), 'name'=>  $current_user->display_name, 'email' => $current_user->user_email,'item_count' => $item_count );
}
}


?>
<?php 
 $bacs = get_post_meta( $order->get_order_number(), '_payment_method', true );
//if($bacs == "bacs")
//{
  if(esc_attr( $order->get_status()) == "processing" || esc_attr( $order->get_status()) == "completed")
  {
	  ?>
	<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order">
		<td><?php echo $artist;?></td>
		<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : 
		if($column_id != "order-actions" && $column_id != "order-status")
		{
			?>
			<td class="text-center woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
				<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
				<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>
				<?php elseif ( 'order-number' === $column_id ) : ?>
				<?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); ?>
				<?php elseif ( 'order-date' === $column_id ) : ?>
				<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created(),'M d,Y' ) ); ?></time>
				<?php elseif ( 'order-status' === $column_id ) : ?>
				<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
				<?php elseif ( 'order-total' === $column_id ) : ?>
				<?php
					/* translators: 1: formatted order total 2: total order items */
					//	printf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count );
				?>
				<a href="javascript:void(0)" class="viewbutton"  onclick="transaction_view('<?php echo $order->get_order_number();?>')" >View</a>
				<?php endif; ?>
			</td>
			<?php 
	   } 
	   endforeach;
	   ?>
		<td class="text-center">
			<?php
				$actions = wc_get_account_orders_actions( $order );
				if ( ! empty( $actions ) ) 
				{
					foreach ( $actions as $key => $action ) 
					{
						$key_1_value = get_post_meta( $customer_order->ID, '_wfacp_post_id', true );
						if($key_1_value == "886")
						{
							echo '<a target="_blank" style="line-height: 16px  !important;"  href="' . plugins_url(). '/woocommerce/templates/myaccount/certificate.php?order='.$customer_order->ID.'" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">View</a>';
						}
						else if($key_1_value == "5712") //($key_1_value == "5712")
						{
							echo '<a target="_blank" style="line-height: 16px  !important;" href="' . plugins_url(). '/woocommerce/templates/myaccount/certificate_do_not_try_to.php?order='.$customer_order->ID.'" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">View</a>';
						}
						else if($key_1_value == "5719")
						{
							echo '<a target="_blank" style="line-height: 16px  !important;"  href="' . plugins_url(). '/woocommerce/templates/myaccount/certificate_edens_back.php?order='.$customer_order->ID.'" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">View</a>';
						}
					}
				}
			?>
		</td>
		<td class="text-center">
			<?php
				$actions = wc_get_account_orders_actions( $order );
				if (! empty($actions )) 
				{
					foreach ( $actions as $key => $action ) 
					{
						 $key_1_value = get_post_meta( $customer_order->ID, '_wfacp_post_id', true );
						if($key_1_value == "886")
						{
							echo '<a target="_blank" style="line-height: 16px  !important;" href="' . plugins_url(). '/woocommerce/templates/myaccount/deed.php?order='.$customer_order->ID.'" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">View</a>';
						}
						else if($key_1_value == "5712")
						{
							echo '<a target="_blank" style="line-height: 16px  !important;" href="' . plugins_url(). '/woocommerce/templates/myaccount/deed_do_not_try_to.php?order='.$customer_order->ID.'" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">View</a>';
						}
						else if($key_1_value == "5719")
						{
							echo '<a target="_blank" style="line-height: 16px  !important;" href="' . plugins_url(). '/woocommerce/templates/myaccount/deed_edens_back.php?order='.$customer_order->ID.'" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">View</a>';
						}
					}
				}
				?>
		</td>
	</tr>
	
	<?php
	  
  }

//}
//else{
?>
<!--<tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order">
<td><?php echo $artist;?></td>
<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : 
if($column_id != "order-actions" && $column_id != "order-status")
{
	?>
	<td class="text-center woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">
		<?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>
		<?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>
		<?php elseif ( 'order-number' === $column_id ) : ?>
		<?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); ?>
		<?php elseif ( 'order-date' === $column_id ) : ?>
		<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created(),'M d,Y' ) ); ?></time>
		<?php elseif ( 'order-status' === $column_id ) : ?>
		<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
		<?php elseif ( 'order-total' === $column_id ) : ?>
		<?php
			/* translators: 1: formatted order total 2: total order items */
			//	printf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count );
		?>
		<a href="javascript:void(0)" class="viewbutton"  onclick="transaction_view('<?php echo $order->get_order_number();?>')" >View</a>
		<?php endif; ?>
	</td>
	<?php 
} 
endforeach;
?>
<td class="text-center">
	<?php
		$actions = wc_get_account_orders_actions( $order );
		if ( ! empty( $actions ) ) 
		{
			foreach ( $actions as $key => $action ) 
			{
				  $key_1_value = get_post_meta( $customer_order->ID, '_wfacp_post_id', true );
				if($key_1_value == "886")
				{
					echo '<a target="_blank" style="margin-bottom: 6px; width: 100%; text-align: center; font-size: 14px;" href="' . plugins_url(). '/woocommerce/templates/myaccount/certificate.php?order='.$customer_order->ID.'" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">View</a>';
				}
				else if($key_1_value == "5712") //($key_1_value == "5712")
				{
					echo '<a target="_blank" style="margin-bottom: 6px; width: 100%; text-align: center; font-size: 14px;" href="' . plugins_url(). '/woocommerce/templates/myaccount/certificate_do_not_try_to.php?order='.$customer_order->ID.'" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">View</a>';
				}
				else if($key_1_value == "5719")
				{
					echo '<a target="_blank" style="margin-bottom: 6px; width: 100%; text-align: center; font-size: 14px;" href="' . plugins_url(). '/woocommerce/templates/myaccount/certificate_edens_back.php?order='.$customer_order->ID.'" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">View</a>';
				}
			}
		}
	?>
</td>
<td class="text-center">
	<?php
		$actions = wc_get_account_orders_actions( $order );
		if (! empty($actions )) 
		{
			foreach ( $actions as $key => $action ) 
			{
				$key_1_value = get_post_meta( $customer_order->ID, '_wfacp_post_id', true );
				if($key_1_value == "886")
				{
					echo '<a target="_blank" style="margin-bottom: 6px; width: 100%; text-align: center; font-size: 14px;" href="' . plugins_url(). '/woocommerce/templates/myaccount/deed.php?order='.$customer_order->ID.'" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">View</a>';
				}
				else if($key_1_value == "5712")
				{
					echo '<a target="_blank" style="margin-bottom: 6px; width: 100%; text-align: center; font-size: 14px;" href="' . plugins_url(). '/woocommerce/templates/myaccount/deed_do_not_try_to.php?order='.$customer_order->ID.'" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">View</a>';
				}
				else if($key_1_value == "5719")
				{
					echo '<a target="_blank" style="margin-bottom: 6px; width: 100%; text-align: center; font-size: 14px;" href="' . plugins_url(). '/woocommerce/templates/myaccount/deed_edens_back.php?order='.$customer_order->ID.'" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">View</a>';
				}
			}
		}
		?>
</td>
</tr>
--->
<?php
//}
endforeach; 
// print_r($allarray['1595']);
session_unset(); 
// if(!isset($_SESSION['allarray'])){
session_start();
$_SESSION['allarray'] = $allarray;
// }
// $_SESSION['allarray']['1595']['datetime'];
//$str = $_SESSION['allarray']['1595']['date'];
//print_r($_SESSION['allarray']);
?>
</tbody>
</table>

<?php
}
?>
</div>
</div>
</div>
</div>
</div>
</div>
<style>
.woocommerce-button.button.pay,.woocommerce-button.button.cancel {

    display: none;

}
.viewbutton:hover{
    
        color: #fff !important; 
    text-decoration: none !important;
}
p.order-again {
    display: none;
}
</style>

<div id="order_details" class="modal fade" role="dialog" style="display:none;">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Order Details</h4>
</div>
<div class="modal-body" id="div_order_details"></div>
</div>
</div>
</div>


<script type="text/javascript">
function transaction_view(id)
{
jQuery('#loader').show();
var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
jQuery.post(ajaxurl,
{
order_id: id,
action: "orderdetails"
},
function (data)
{
jQuery("#div_order_details").html(data);
jQuery("#order_details").show();
jQuery("#order_details").addClass("in");
jQuery('#loader').hide();
});
}
jQuery(".close").click(function()
{
jQuery("#order_details").hide();
jQuery("#order_details").removeClass("in");
}); 

jQuery(document).ready(function()
{
if(jQuery("#wppb_form_success_message").hasClass("alert"))
{
jQuery("#myModal2").show();
jQuery("#myModal2").addClass("in");
jQuery("#wppb_form_success_message").attr("style","color:green");
}
});
function close_pop()
{
jQuery("#myModal2").hide();
jQuery("#myModal2").removeClass("in");
jQuery("#wppb_form_success_message").removeClass("alert");
}
</script>

