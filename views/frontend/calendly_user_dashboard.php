<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>

<?php 
global $wpdb;
$current_user = wp_get_current_user();
	
	$siteurl=site_url();
 $username=$current_user->user_login;
 
 $users_data = $wpdb->get_row("SELECT * FROM ".$wpdb->prefix . "user_booking_setting Where user_id=".$current_user->ID . "");
if(empty($users_data)){	
	$tabdisable="disabled";
	
	  }else{
		$tabdisable="";  
	  } ?>
    <div class="container">
       
  
        <ul class="nav nav-tabs">
            <li class="<?php  if(!empty($users_data)){ echo "active";	} ?>  <?php  echo $tabdisable; ?>">
              <a <?php if(!empty($users_data)){ ?> data-toggle="tab" <?php }  ?> href="#home">User Detail</a>
          </li>
           
            <li class="<?php  if(empty($users_data)){ echo "active";	} ?>">
              <a data-toggle="tab"  href="#menu1">
                Calander Profile
              </a>
          </li>
            <li class="<?php  echo $tabdisable; ?>">
              <a <?php if(!empty($users_data)){ ?> data-toggle="tab" <?php }  ?> href="#menu2">
                User Booking List
              </a>
          </li>
        </ul>
  
        <div class="tab-content">
            <div id="home" 
                 class="tab-pane fade <?php  if(!empty($users_data)){ echo "in active";	} ?>">
                <h3>User Detail</h3>
                <p>Here you can find all sorts of Agorithms
                  with explanation and problems based on them!
              </p>
            </div>
            <div id="menu1" class="tab-pane fade <?php  if(empty($users_data)){ echo "in active";	} ?>">
			<?php if(empty($users_data)){ ?>
			<h3> Please Complete Your Profile First</h3>
		<?php	// Use shortcodes in form like Landing Page Template.
echo do_shortcode( '[profile_complete_form]' ); ?>
		<?php	}else{  ?>
		<?php	// Use shortcodes in form like Landing Page Template.
echo do_shortcode( '[profile_complete_view]' ); ?>
		
		<?php  }  ?>
               
            </div>
            <div id="menu2" class="tab-pane fade">
                <h3></h3>
                <p><?php echo do_shortcode('[user_booking_list]');  ?>
              </p>
            </div>
            
        </div>
    </div>
 

<script>
 jQuery(document).on("click", "#heading_third" , function(e){
        //e.preventDefault();
         //jQuery("#//").attr('href','javascript:void(0)');
 copyToClipboard(document.getElementById("copytoClipboard"));
 
 
  
    });

function copyToClipboard(elem) {
	  // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);
    
    // copy the selection
    var succeed;
    try {
    	  succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }
    
    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}
    </script>





