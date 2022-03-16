<?php 
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
if (isset($_REQUEST["param"])) {
		if($_REQUEST["param"] == "user_update_data_form"){
		global $wpdb;
		$user_id = intval($_REQUEST["user_id"]);
	
		    
    		//update_user_meta( $user_id, 'user_priceHara', $_REQUEST["FormControlPriceHara"] );
		    //update_user_meta( $user_id, 'user_progressHara', $_REQUEST["FormControlProgressHara"]);
    		update_user_meta( $user_id, 'user_syndicateHara', $_REQUEST["FormControlSyndicatesHara"] );
    		update_user_meta( $user_id, 'user_gbpHara', $_REQUEST["FormControlGBPHara"] );
    		
			
			update_user_meta( $user_id, 'user_syndicateSTAGE1', $_REQUEST["FormControlSyndicatesSTAGE1"] );
    		update_user_meta( $user_id, 'user_gbpSTAGE1', $_REQUEST["FormControlGBPSTAGE1"] );
    		//update_user_meta( $user_id, 'user_priceYBT', $_REQUEST["FormControlPriceYBT"] );
		    //update_user_meta( $user_id, 'user_progressYBT', $_REQUEST["FormControlProgressYBT"]);
    	 	update_user_meta( $user_id, 'user_syndicateYBT', $_REQUEST["FormControlSyndicatesYBT"] );
    		update_user_meta( $user_id, 'user_gbpYBT', $_REQUEST["FormControlGBPYBT"] );
    		
    		//update_user_meta( $user_id, 'user_priceSH', $_REQUEST["FormControlPriceSH"] );
		   // update_user_meta( $user_id, 'user_progressSH', $_REQUEST["FormControlProgressSH"]);
    		update_user_meta( $user_id, 'user_syndicateSH', $_REQUEST["FormControlSyndicatesSH"] );
    		update_user_meta( $user_id, 'user_gbpSH', $_REQUEST["FormControlGBPSH"] );
	
		echo "1";
		die();
	}
	if($_REQUEST["param"] == "all_users_update_data_form"){
		global $wpdb;
		//$user_id = intval($_REQUEST["user_id"]);
		$users_data = $wpdb->get_results
		(
			"SELECT * FROM ".$wpdb->prefix . "users"
		);
		foreach($users_data as $user)
		{
		    $user_id = $user->ID;
    		update_user_meta( $user_id, 'user_priceHara', $_REQUEST["FormControlPriceHara"] );
		   // update_user_meta( $user_id, 'user_progressHara', $_REQUEST["FormControlProgressHara"]);
    		update_user_meta( $user_id, 'user_syndicateHara', $_REQUEST["FormControlSyndicatesHara"] );
    		update_user_meta( $user_id, 'user_gbpHara', $_REQUEST["FormControlGBPHara"] );
    		
			
			update_user_meta( $user_id, 'user_syndicateSTAGE1', $_REQUEST["FormControlSyndicatesSTAGE1"] );
    		update_user_meta( $user_id, 'user_gbpSTAGE1', $_REQUEST["FormControlGBPSTAGE1"] );
			
			
    		update_user_meta( $user_id, 'user_priceYBT', $_REQUEST["FormControlPriceYBT"] );
		    //update_user_meta( $user_id, 'user_progressYBT', $_REQUEST["FormControlProgressYBT"]);
    		update_user_meta( $user_id, 'user_syndicateYBT', $_REQUEST["FormControlSyndicatesYBT"] );
    		update_user_meta( $user_id, 'user_gbpYBT', $_REQUEST["FormControlGBPYBT"] );
    		
    		update_user_meta( $user_id, 'user_priceSH', $_REQUEST["FormControlPriceSH"] );
		  //  update_user_meta( $user_id, 'user_progressSH', $_REQUEST["FormControlProgressSH"]);
    		update_user_meta( $user_id, 'user_syndicateSH', $_REQUEST["FormControlSyndicatesSH"] );
    		update_user_meta( $user_id, 'user_gbpSH', $_REQUEST["FormControlGBPSH"]);
		}
		update_option("harashareprice", $_REQUEST["FormControlPriceHara"]);
		//update_option("FormControlProgressHara", $_REQUEST["FormControlProgressHara"]);
		update_option("FormControlSyndicatesHara", $_REQUEST["FormControlSyndicatesHara"]);
		update_option("FormControlGBPHara", $_REQUEST["FormControlGBPHara"]);
		
		update_option("FormControlSyndicatesSTAGE1", $_REQUEST["FormControlSyndicatesSTAGE1"]);
		update_option("FormControlGBPSTAGE1", $_REQUEST["FormControlGBPSTAGE1"]);
		
		update_option("YBTshareprice", $_REQUEST["FormControlPriceYBT"]);
	//	update_option("FormControlProgressYBT", $_REQUEST["FormControlProgressYBT"]);
		update_option("FormControlSyndicatesYBT", $_REQUEST["FormControlSyndicatesYBT"]);
		update_option("FormControlGBPYBT", $_REQUEST["FormControlGBPYBT"]);
		
		update_option("SHshareprice", $_REQUEST["FormControlPriceSH"]);
	//	update_option("FormControlProgressSH", $_REQUEST["FormControlProgressSH"]);
		update_option("FormControlSyndicatesSH", $_REQUEST["FormControlSyndicatesSH"]);
		update_option("FormControlGBPSH", $_REQUEST["FormControlGBPSH"]);
		echo "1";
		die();
	}
	if($_REQUEST["param"] == "user_data")
	{
		global $wpdb;
		$user_id = intval($_REQUEST["user_id"]);
		?>
		<label for="FormControlPrice" style="color:red;">THE HARA</label>
			<!--div class="form-group">
				<label for="FormControlPrice">Price</label>
				<input type="text" class="form-control" id="FormControlPriceHara" name="FormControlPriceHara" value="<?php echo get_user_meta( $user_id, "user_priceHara", true ); ?>">
			</div-->
			<!--div class="form-group">
				<label for="FormControlProgress">Progress</label>
				<input type="text" class="form-control" id="FormControlProgressHara" name="FormControlProgressHara" value="<?php echo get_user_meta( $user_id, "user_progressHara", true ); ?>">
			</div-->
			<div class="form-group">
				<label for="FormControlProgress">No. Of Syndicates</label>
				<input type="text" class="form-control" id="FormControlSyndicatesHara" name="FormControlSyndicatesHara" value="<?php echo  get_user_meta( $user_id, "user_syndicateHara", true ); ?>">
			</div>
			<div class="form-group">
				<label for="FormControlProgress">Value GBP</label>
				<input type="text" class="form-control" id="FormControlGBPHara" name="FormControlGBPHara" value="<?php echo  get_user_meta( $user_id, "user_gbpHara", true ); ?>">
			</div>
			
			<label for="FormControlPrice" style="color:red;">STAGE 1 DARE YOU NOT TO</label>
			
			<div class="form-group">
				<label for="FormControlProgress">No. Of Syndicates</label>
				<input type="text" class="form-control" id="FormControlSyndicatesSTAGE1" name="FormControlSyndicatesSTAGE1" value="<?php echo  get_user_meta( $user_id, "user_syndicateSTAGE1", true ); ?>">
			</div>
			<div class="form-group">
				<label for="FormControlProgress">Value GBP</label>
				<input type="text" class="form-control" id="FormControlGBPSTAGE1" name="FormControlGBPSTAGE1" value="<?php echo  get_user_meta( $user_id, "user_gbpSTAGE1", true ); ?>">
			</div>
			
			
			
			<label for="FormControlPrice" style="color:red;">DARE YOU NOT TO</label>
			<!--div class="form-group">
				<label for="FormControlPrice">Price</label>
				<input type="text" class="form-control" id="FormControlPriceYBT" name="FormControlPriceYBT" value="<?php echo get_user_meta( $user_id, "user_priceYBT", true ); ?>">
			</div-->
			<!--div class="form-group">
				<label for="FormControlProgress">Progress</label>
				<input type="text" class="form-control" id="FormControlProgressYBT" name="FormControlProgressYBT" value="<?php echo get_user_meta( $user_id, "user_progressYBT", true ); ?>">
			</div-->
			<div class="form-group">
				<label for="FormControlProgress">No. Of Syndicates</label>
				<input type="text" class="form-control" id="FormControlSyndicatesYBT" name="FormControlSyndicatesYBT" value="<?php echo  get_user_meta( $user_id, "user_syndicateYBT", true ); ?>">
			</div>
			<div class="form-group">
				<label for="FormControlProgress">Value GBP</label>
				<input type="text" class="form-control" id="FormControlGBPYBT" name="FormControlGBPYBT" value="<?php echo  get_user_meta( $user_id, "user_gbpYBT", true ); ?>">
			</div>
		
			
			<label for="FormControlPrice" style="color:red;">EDENS BACK</label>
			<!--div class="form-group">
				<label for="FormControlPrice">Price</label>
				<input type="text" class="form-control" id="FormControlPriceSH" name="FormControlPriceSH" value="<?php echo get_user_meta( $user_id, "user_priceSH", true ); ?>">
			</div--->
			<!--div class="form-group">
				<label for="FormControlProgress">Progress</label>
				<input type="text" class="form-control" id="FormControlProgressSH" name="FormControlProgressSH" value="<?php echo get_user_meta( $user_id, "user_progressSH", true ); ?>">
			</div-->
			<div class="form-group">
				<label for="FormControlProgress">No. Of Syndicates</label>
				<input type="text" class="form-control" id="FormControlSyndicatesSH" name="FormControlSyndicatesSH" value="<?php echo  get_user_meta( $user_id, "user_syndicateSH", true ); ?>">
			</div>
			<div class="form-group">
				<label for="FormControlProgress">Value GBP</label>
				<input type="text" class="form-control" id="FormControlGBPSH" name="FormControlGBPSH" value="<?php echo  get_user_meta( $user_id, "user_gbpSH", true ); ?>">
			</div>
			
		
		<?php
		die();
	}
	
	
}