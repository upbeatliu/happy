<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<h5>
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		wp_kses( __( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ), $allowed_html ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url() )
	);
	?>
</h5>
<br/>
<div id="dashboard-alert" class="alert alert-warning" role="alert">
The screen width of the dashboard page is less than 1200, sorry for the inconvenience caused.</div>
<br/>
<?php
	//Services Management for user profile, services management and Business Info 
	$user = wp_get_current_user();
	$project_name = get_field('project_name', 'user_'.$user->ID);
	$start = get_field('start_time', 'user_'.$user->ID);
	$run1_check = get_field('run1_checking', 'user_'.$user->ID);
	$run1_check_time = get_field('run1_checking_time', 'user_'.$user->ID);
	$run2_check = get_field('run2_checking', 'user_'.$user->ID);
	$run2_check_time = get_field('run2_checking_time', 'user_'.$user->ID);	
?>
<div class="dashboard-wrap acf-project-review">
	<h3>Project review times</h3>
	
	<h5>Project Name: <?php echo $project_name;?> <span class="start">started at 
	<?php if($start) { echo $start; } else { echo "dd/mm/yyyy hh:ss pm"; } ?></span></h5>
	<br/>	
	<div class="row review-wrap">
<!--run 1 -->
		<div class="run-wrap run1-wrap">
			<h5>Review 1</h5>
			<div class="row row1">				
				<div class="col-head col-half col01">Review</div>
				<div class="col-head col-half col02">Start Time</div>
				<div class="col-head col-half col03">Review Complete</div>
				<div class="col-head col-half col04">Finish Time</div>					
			</div>
			<?php 
				$options_review1 = array(  
					'fields' => [						
						'field_6008c263b87cb',
						'field_6008d97c6a21a',
					],	
					'form_attributes' => array(
						'method' => 'POST',
						'action' => admin_url("admin-post.php"),
					),
					'id' => 'acf-run1-review',	
					'field_el' => 'td',
					'html_before_fields' => sprintf(
						'<input type="hidden" name="action" value="adaptiveweb_save_profile_form">
						<input type="hidden" name="user_id" value="user_%s">',
						$user->ID
					),
					'post_id' => "user_{$user->ID}",
					'form' => true,
					'html_submit_button' => '<button type="submit" class="acf-button button button-primary button-large" value="Update">Update Status</button>',
				);
			?>
			<div class="row row2">
				<div class="admin-col col01">
					<?php if ($run1_check) { echo "<div style='color: #ff5824;'>Ready</div>";		
					} else {
						echo "Not Ready";
					}?>
				</div>
				<div class="admin-col col02">
					<?php if($run1_check_time) { echo $run1_check_time; } else { echo "dd/mm/yyyy hh:ss pm"; }?>
				</div>
				<?php acf_form($options_review1);	?>			
				<?php //acf_enqueue_uploader();?>
			</div>
			
		</div> <!-- end of run 1 run-wrap -->
<!-- run 2 -->
		<div class="run-wrap run2-wrap">
			<h5>Review 2</h5>
			<div class="row row1">				
				<div class="col-head col-half col01">Review</div>
				<div class="col-head col-half col02">Start Time</div>
				<div class="col-head col-half col03">Review Complete</div>
				<div class="col-head col-half col04">Finish Time</div>					
			</div>
			<?php 
				$options_review2 = array(  
					'fields' => [						
						'field_60091589f891f',
						'field_6009159df8920',
					],	
					'form_attributes' => array(
						'method' => 'POST',
						'action' => admin_url("admin-post.php"),
					),
					'id' => 'acf-run2-review',	
					'field_el' => 'td',
					'html_before_fields' => sprintf(
						'<input type="hidden" name="action" value="adaptiveweb_save_profile_form">
						<input type="hidden" name="user_id" value="user_%s">',
						$user->ID
					),
					'post_id' => "user_{$user->ID}",
					'form' => true,
					'html_submit_button' => '<button type="submit" class="acf-button button button-primary button-large" value="Update">Update Status</button>',
				);
			?>
			<div class="row row2">
				<div class="admin-col col01">
					<?php if ($run2_check) { echo "<div style='color: #ff5824;'>Ready</div>";		
					} else {
						echo "Not Ready";
					}?>
				</div>
				<div class="admin-col col02">
					<?php if($run2_check_time) { echo $run2_check_time; } else { echo "dd/mm/yyyy hh:ss pm"; }?>
				</div>
				<?php acf_form($options_review2);	?>			
				<?php  //acf_enqueue_uploader();?>
			</div>
		</div> <!-- end of run 2 run-wrap -->

		<div class="buy-more">
			If you will need extra more modification or new requirements after confirmation have done, you can <a href="/plan/development-server-setting/">buy more development hour</a> at any time.
		</div>
	</div>	
</div> <!-- dashborad-wrap -->

<!---------Services Management ------------------>
<?php
//Services Management
// $user = wp_get_current_user();

	$options = array(  
		'fields' => [
			'field_5ffbeee89d6cf', 
			'field_5ffcf61436dd4', 
			'field_5ffcf62636dd5',
			'field_5ffcf6f036dd6',
			'field_5ffcf73f36dd7',
			'field_5ffcf87e36dd8'
		],	
		'form_attributes' => array(
			'method' => 'POST',
			'action' => admin_url("admin-post.php"),
		),
		'id' => 'acf-my-account',	
		'field_el' => 'td',
		'html_before_fields' => sprintf(
			'<input type="hidden" name="action" value="adaptiveweb_save_profile_form">
			<input type="hidden" name="user_id" value="user_%s">',
			$user->ID
		),
		'post_id' => "user_{$user->ID}",
		'form' => true,
		'html_submit_button' => '<button type="submit" class="acf-button button button-primary button-large" value="Update">Update Services</button>',
	);
	?>
<div class="dashboard-wrap acf-my-account">
	<h3>Services Management</h3>

		<div class="row row1">
			<div class="col-head col01">Domain Name</div>
			<div class="col-head col02">Hosting Server</div>
			<div class="col-head col03">Process Steps</div>
			<div class="col-head col04">Admin Details</div>
			<div class="col-head col05">Plan(s)</div>
			<div class="col-head col06">Extra Order(s)</div>		
		</div>

		<div class="row row2">
			<?php
				acf_form($options);	
			?>
		</div>
</div> <!-- dashborad-wrap -->

<!-------------Business Info ------------------------>
<?php
	//Business Info
	// $user = wp_get_current_user();

	$options_info = array(  
		'fields' => [
			'field_60013ec6cddab', 
			'field_6004ce7bec851',
			'field_6004cdfdec84e',
			'field_6004ce1fec84f',
			'field_6004c490ff7b2',
			'field_6004ce40ec850',					
		],	
		'form_attributes' => array(
			'method' => 'POST',
			'action' => admin_url("admin-post.php"),
		),
		'id' => 'acf-my-business',	
		'field_el' => 'td',
		'html_before_fields' => sprintf(
			'<input type="hidden" name="action" value="adaptiveweb_save_profile_form">
			<input type="hidden" name="user_id" value="user_%s">',
			$user->ID
		),
		'post_id' => "user_{$user->ID}",
		'form' => true,
		'html_submit_button' => '<button type="submit" class="acf-button button button-primary button-large" value="Update">Update Info</button>',
	);
?>
<div class="dashboard-wrap acf-my-business">
	<h3>Business Info</h3>

		<div class="row row1">
			<div class="col-head col01">Gmail Account</div>
			<div class="col-head col02">Google Drive link</div>
			<div class="col-head col03">Site Title -- Tagline</div>
			<div class="col-head col04">Business Location</div>
			<div class="col-head col05">Business Description</div>
			<div class="col-head col06">Social Media Links</div>				
		</div>

		<div class="row row2">
			<?php
				acf_form($options_info);	
			?>
		</div>
</div> <!-- dashborad-wrap -->

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
