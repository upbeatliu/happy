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

<p>
	<?php
	printf(
		/* translators: 1: user display name 2: logout url */
		wp_kses( __( 'Hello %1$s (not %1$s? <a href="%2$s">Log out</a>)', 'woocommerce' ), $allowed_html ),
		'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
		esc_url( wc_logout_url() )
	);
	?>
</p>

<p>
	<?php
	/* translators: 1: Orders URL 2: Address URL 3: Account URL. */
	$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">billing address</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
	if ( wc_shipping_enabled() ) {
		/* translators: 1: Orders URL 2: Addresses URL 3: Account URL. */
		$dashboard_desc = __( 'From your account dashboard you can view your <a href="%1$s">recent orders</a>, manage your <a href="%2$s">shipping and billing addresses</a>, and <a href="%3$s">edit your password and account details</a>.', 'woocommerce' );
	}	
	?>
</p>

	<?php
	//Services Management
	$user = wp_get_current_user();

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
			<div class="col col01">Domain Name</div>
			<div class="col col02">Hosting Server</div>
			<div class="col col03">Status</div>
			<div class="col col04">Admin Details</div>
			<div class="col col05">Plan(s)</div>
			<div class="col col06">Exra Order(s)</div>		
		</div>

		<div class="row row2">
			<?php
				acf_form($options);	
			?>
		</div>
</div> <!-- dashborad-wrap -->

<?php
	//Business Info
	$user = wp_get_current_user();

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
			<div class="col col01">Gmail Account</div>
			<div class="col col02">Google Drive link</div>
			<div class="col col03">Site Title -- Tagline</div>
			<div class="col col04">Business Location</div>
			<div class="col col05">Business Description</div>
			<div class="col col06">Social Media Links</div>				
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
