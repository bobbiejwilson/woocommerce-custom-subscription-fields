 <?php
   /*
   Plugin Name: Woocommerce Custom Subscription Fields
   Plugin URI: http://www.bobbiejwilson.com/woocommerce-custom-subscription-fields
   Description: A plugin to add 10 name and address fields
   Version: 1.0
   Author: Bobbie Wilson
   Author URI: http://www.bobbiejwilson.com
   License: GPL8
   */
class WC_Custom_Sub {

	/**
	 * Hook us in :)
	 *
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		// Display on the front end
		add_action( 'woocommerce_after_add_to_cart_button', array( $this, 'facility_name_html' ), 10 );
		// Filters for cart actions
		add_filter( 'woocommerce_add_cart_item_data', array( $this, 'add_cart_item_data' ), 10, 8 );
		add_filter( 'woocommerce_get_cart_item_from_session', array( $this, 'get_cart_item_from_session' ), 10, 8 );
		add_filter( 'woocommerce_get_item_data', array( $this, 'get_item_data' ), 10, 8 );
		add_action( 'woocommerce_add_order_item_meta', array( $this, 'add_order_item_meta' ), 10, 8 );

		// Write Panels
		add_action( 'woocommerce_product_options_pricing', array( $this, 'write_panel' ) );
		add_action( 'woocommerce_process_product_meta', array( $this, 'write_panel_save' ) );

	}
	/**
	 * Show the Family hidden on the frontend
	 *
	 * @access public
	 * @return void
	 */
	public function facility_name_html() {
		global $post; ?>
		<script>
			jQuery(document).ready(function($){
				if ($('input[name="quantity"]').val() == 1) {
					$('#facility_1').nextAll().hide();
				}
				$('input[name="quantity"]').change(function(){
					var item_count = $('input[name="quantity"]').val();
						$('#facility_'+item_count).prevAll().show();
						$('#facility_'+item_count).show();
						$('#facility_'+item_count).nextAll().hide();
				});
				$('fieldset input').click(function(){
					$(this).attr('placeholder',"");
				})
			});
		</script>
		<div style="clear: both;"></div>
		<?php
		for ($i = 1; $i <= 10; $i++) { ?>
		
		<fieldset id="facility_<?php echo $i; ?>" style="margin-top: 10px;clear: both;">
			
			<input type="text" name="facility_name_<?php echo $i; ?>" id="facility_name_<?php echo $i; ?>" value="" placeholder="Facility Name"/>
			<input type="text" name="facility_addr_<?php echo $i; ?>" id="facility_addr_<?php echo $i; ?>" value="" placeholder="Facility Address"/>
			<input type="text" name="facility_city_<?php echo $i; ?>" id="facility_city_<?php echo $i; ?>" value="" placeholder="City" />
			<input type="text" name="facility_state_<?php echo $i; ?>" id="facility_state_<?php echo $i; ?>" value="" size="3" placeholder="State"/>
			<input type="text" name="facility_zip_<?php echo $i; ?>" id="facility_zip_<?php echo $i; ?>" value="" placeholder="Zip Code"/>
		</fieldset>

	<?php }
}


	/**
	 * When added to cart, save any data
	 *
	 * @access public
	 * @param mixed $cart_item_meta
	 * @param mixed $product_id
	 * @return void
	 */
	public function add_cart_item_data( $cart_item_meta, $product_id ) {
		for ($i = 1; $i <= 10; $i++) {
			if ( ! empty( $_POST['facility_name_'.$i] )) {
			$cart_item_meta['facility_name_'.$i] = $_POST['facility_name_'.$i];
			$cart_item_meta['facility_addr_'.$i] = $_POST['facility_addr_'.$i];
			$cart_item_meta['facility_city_'.$i] = $_POST['facility_city_'.$i];
			$cart_item_meta['facility_state_'.$i] = $_POST['facility_state_'.$i];
			$cart_item_meta['facility_zip_'.$i] = $_POST['facility_zip_'.$i];
			}
		}

		return $cart_item_meta;
	}

	/**
	 * Get the data from the session on page load
	 *
	 * @access public
	 * @param mixed $cart_item
	 * @param mixed $values
	 * @return void
	 */
	public function get_cart_item_from_session( $cart_item, $values ) {
		for ($i = 1; $i <= 10; $i++) {
			if ( ! empty( $values['facility_name_'.$i] ) ) {
				$cart_item['facility_name_'.$i] = $values['facility_name_'.$i];
				$cart_item['facility_addr_'.$i] = $values['facility_addr_'.$i];
				$cart_item['facility_city_'.$i] = $values['facility_city_'.$i];
				$cart_item['facility_state_'.$i] = $values['facility_state_'.$i];
				$cart_item['facility_zip_'.$i] = $values['facility_zip_'.$i];
			}
		}
		
		return $cart_item;
	}

	/**
	 * Display data if present in the cart
	 *
	 * @access public
	 * @param mixed $other_data
	 * @param mixed $cart_item
	 * @return void
	 */
	public function get_item_data( $item_data, $cart_item ) {
		for ($i = 1; $i <= 10; $i++) {
			if ( ! empty( $cart_item['facility_name_'.$i] ) ) {
				$facilityname = $cart_item['facility_name_'.$i];
				$item_data[] = array(
					'name'    => __( 'Facility Name '.$i, 'woocommerce-custom-subscription-fields' ),
					'value'   => __( $facilityname, 'woocommerce-custom-subscription-fields' ),
					'display' => __( $facilityname, 'woocommerce-custom-subscription-fields' )
				);
			}
			if ( ! empty( $cart_item['facility_addr_'.$i] ) ) {
				$facilityaddr = $cart_item['facility_addr_'.$i];
					$item_data[] = array(
					'name'    => __( 'Facility Address '.$i, 'woocommerce-custom-subscription-fields' ),
					'value'   => __( $facilityaddr, 'woocommerce-custom-subscription-fields' ),
					'display' => __( $facilityaddr, 'woocommerce-custom-subscription-fields' )
				);
			}
			if ( ! empty( $cart_item['facility_city_'.$i] ) ) {
				$facilitycity = $cart_item['facility_city_'.$i];
					$item_data[] = array(
					'name'    => __( 'Facility City '.$i, 'woocommerce-custom-subscription-fields' ),
					'value'   => __( $facilitycity, 'woocommerce-custom-subscription-fields' ),
					'display' => __( $facilitycity, 'woocommerce-custom-subscription-fields' )
				);
			}
			if ( ! empty( $cart_item['facility_state_'.$i] ) ) {
				$facilitystate = $cart_item['facility_state_'.$i];
					$item_data[] = array(
					'name'    => __( 'Facility State '.$i, 'woocommerce-custom-subscription-fields' ),
					'value'   => __( $facilitystate, 'woocommerce-custom-subscription-fields' ),
					'display' => __( $facilitystate, 'woocommerce-custom-subscription-fields' )
				);
			}
			if ( ! empty( $cart_item['facility_zip_'.$i] ) ) {
				$facilityzip = $cart_item['facility_zip_'.$i];
						$item_data[] = array(
					'name'    => __( 'Facility Zip '.$i, 'woocommerce-custom-subscription-fields' ),
					'value'   => __( $facilityzip, 'woocommerce-custom-subscription-fields' ),
					'display' => __( $facilityzip, 'woocommerce-custom-subscription-fields' )
				);
			}
			
		}
		
		return $item_data;
		
	}

	

	/**
	 * After ordering, add the data to the order line items.
	 *
	 * @access public
	 * @param mixed $item_id
	 * @param mixed $values
	 * @return void
	 */
	public function add_order_item_meta( $item_id, $cart_item ) {
		for ($i = 1; $i <= 10; $i++) {
			if ( ! empty( $cart_item['facility_name_'.$i] ) ) {
				woocommerce_add_order_item_meta( $item_id, __( 'Facility Name '.$i, 'woocommerce-custom-subscription-fields' ), __( $cart_item['facility_name_'.$i], 'woocommerce-custom-subscription-fields' ) );
				woocommerce_add_order_item_meta( $item_id, __( 'Facility Address '.$i, 'woocommerce-custom-subscription-fields' ), __( $cart_item['facility_addr_'.$i], 'woocommerce-custom-subscription-fields' ) );
				woocommerce_add_order_item_meta( $item_id, __( 'Facility City '.$i, 'woocommerce-custom-subscription-fields' ), __( $cart_item['facility_city_'.$i], 'woocommerce-custom-subscription-fields' ) );
				woocommerce_add_order_item_meta( $item_id, __( 'Facility State '.$i, 'woocommerce-custom-subscription-fields' ), __( $cart_item['facility_state_'.$i], 'woocommerce-custom-subscription-fields' ) );
				woocommerce_add_order_item_meta( $item_id, __( 'Facility Zip Code '.$i, 'woocommerce-custom-subscription-fields' ), __( $cart_item['facility_zip_'.$i], 'woocommerce-custom-subscription-fields' ) );
			}
		}
	}

	/**
	 * write_panel function.
	 *
	 * @access public
	 * @return void
	 */
	public function write_panel() {
		global $post;
		for ($i = 1; $i <= 10; $i++) {
		

		woocommerce_wp_hidden_input( 
			
				array(
					'id'          => 'facility_name_'.$i,
					'label'       => __( 'Facility Name '.$i, 'woocommerce-custom-subscription-fields' ),
					'placeholder' => __( 'Facility Name '.$i, 'woocommerce-custom-subscription-fields' ),
					'desc_tip'    => true,
					'description' => __( 'Facility Name '.$i, 'woocommerce-custom-subscription-fields' ),
				)
		);
		woocommerce_wp_hidden_input(
				array(
					'id'          => 'facility_addr_'.$i,
					'label'       => __( 'Facility Address '.$i, 'woocommerce-custom-subscription-fields' ),
					'placeholder' => __( 'Facility Address '.$i, 'woocommerce-custom-subscription-fields' ),
					'desc_tip'    => true,
					'description' => __( 'Facility Address '.$i, 'woocommerce-custom-subscription-fields' ),
				)
		);
		woocommerce_wp_hidden_input(
				array(
					'id'          => 'facility_city_'.$i,
					'label'       => __( 'Facility City '.$i, 'woocommerce-custom-subscription-fields' ),
					'placeholder' => __( 'Facility City '.$i, 'woocommerce-custom-subscription-fields' ),
					'desc_tip'    => true,
					'description' => __( 'Facility City '.$i, 'woocommerce-custom-subscription-fields' ),
				)
		);
		woocommerce_wp_hidden_input(
				array(
					'id'          => 'facility_state_'.$i,
					'label'       => __( 'Facility State '.$i, 'woocommerce-custom-subscription-fields' ),
					'placeholder' => __( 'Facility State '.$i, 'woocommerce-custom-subscription-fields' ),
					'desc_tip'    => true,
					'description' => __( 'Facility State '.$i, 'woocommerce-custom-subscription-fields' ),
				)
		);
		woocommerce_wp_hidden_input(
				array(
					'id'          => 'facility_zip_'.$i,
					'label'       => __( 'Facility Zip Code '.$i, 'woocommerce-custom-subscription-fields' ),
					'placeholder' => __( 'Facility Zip Code '.$i, 'woocommerce-custom-subscription-fields' ),
					'desc_tip'    => true,
					'description' => __( 'Facility Zip Code '.$i, 'woocommerce-custom-subscription-fields' ),
				)
			
		);
	 	
		}
	}

	/**
	 * write_panel_save function.
	 *
	 * @access public
	 * @param mixed $post_id
	 * @return void
	 */
	public function write_panel_save( $post_id ) {
		for ($i = 1; $i <= 10; $i++) {
			$facility_name = ! empty( $_POST['facility_name'.$i] );
			update_post_meta( $post_id, 'facility_name_'.$i, $facility_name );

			$facility_addr = ! empty( $_POST['facility_addr'.$i] );
			update_post_meta( $post_id, 'facility_addr_'.$i, $facility_addr );

			$facility_city = ! empty( $_POST['facility_city'.$i] );
			update_post_meta( $post_id, 'facility_city_'.$i, $facility_city );

			$facility_state = ! empty( $_POST['facility_state'.$i] );
			update_post_meta( $post_id, 'facility_state_'.$i, $facility_state );

			$facility_zip = ! empty( $_POST['facility_zip'.$i] );
			update_post_meta( $post_id, 'facility_zip_'.$i, $facility_zip );
		}
}

	
}

new WC_Custom_Sub();
?>