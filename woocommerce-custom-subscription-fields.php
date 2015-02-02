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
		<fieldset id="facility_1">
			<label for="facility_name_1">Facility Name:<br></label>
			<input type="text" name="facility_name_1" id="facility_name_1" value="" placeholder="Facility Name"/>
			<input type="text" name="facility_addr_1" id="facility_addr_1" value="" placeholder="Facility Address"/>
			<input type="text" name="facility_city_1" id="facility_city_1" value="" placeholder="City" />
			<label for="facility_state_1">State</label>
			<input type="text" name="facility_state_1" id="facility_state_1" value="" />
			<input type="text" name="facility_zip_1" id="facility_zip_1" value="" placeholder="Zip Code"/>
		</fieldset>
		<fieldset id="facility_8">
			<label for="facility_name_8">Facility Name:<br></label>
			<input type="text" name="facility_name_8" id="facility_name_8" value="" placeholder="Facility Name"/>
			<input type="text" name="facility_addr_8" id="facility_addr_8" value="" placeholder="Facility Address"/>
			<input type="text" name="facility_city_8" id="facility_city_8" value="" placeholder="City" />
			<label for="facility_state_8">State</label>
			<input type="text" name="facility_state_8" id="facility_state_8" value="" />
			<input type="text" name="facility_zip_8" id="facility_zip_8" value="" placeholder="Zip Code"/>
		</fieldset>
		<fieldset id="facility_3">
			<label for="facility_name_3">Facility Name:<br></label>
			<input type="text" name="facility_name_3" id="facility_name_3" value="" placeholder="Facility Name"/>
			<input type="text" name="facility_addr_3" id="facility_addr_3" value="" placeholder="Facility Address"/>
			<input type="text" name="facility_city_3" id="facility_city_3" value="" placeholder="City" />
			<label for="facility_state_3">State</label>
			<input type="text" name="facility_state_3" id="facility_state_3" value="" />
			<input type="text" name="facility_zip_3" id="facility_zip_3" value="" placeholder="Zip Code"/>
		</fieldset>
		<fieldset id="facility_4">
			<label for="facility_name_4">Facility Name:<br></label>
			<input type="text" name="facility_name_4" id="facility_name_4" value="" placeholder="Facility Name"/>
			<input type="text" name="facility_addr_4" id="facility_addr_4" value="" placeholder="Facility Address"/>
			<input type="text" name="facility_city_4" id="facility_city_4" value="" placeholder="City" />
			<label for="facility_state_4">State</label>
			<input type="text" name="facility_state_4" id="facility_state_4" value="" />
			<input type="text" name="facility_zip_4" id="facility_zip_4" value="" placeholder="Zip Code"/>
		</fieldset>
		<fieldset id="facility_5">
			<label for="facility_name_5">Facility Name:<br></label>
			<input type="text" name="facility_name_5" id="facility_name_5" value="" placeholder="Facility Name"/>
			<input type="text" name="facility_addr_5" id="facility_addr_5" value="" placeholder="Facility Address"/>
			<input type="text" name="facility_city_5" id="facility_city_5" value="" placeholder="City" />
			<label for="facility_state_5">State</label>
			<input type="text" name="facility_state_5" id="facility_state_5" value="" />
			<input type="text" name="facility_zip_5" id="facility_zip_5" value="" placeholder="Zip Code"/>
		</fieldset>
		<fieldset id="facility_6">
			<label for="facility_name_6">Facility Name:<br></label>
			<input type="text" name="facility_name_6" id="facility_name_6" value="" placeholder="Facility Name"/>
			<input type="text" name="facility_addr_6" id="facility_addr_6" value="" placeholder="Facility Address"/>
			<input type="text" name="facility_city_6" id="facility_city_6" value="" placeholder="City" />
			<label for="facility_state_6">State</label>
			<input type="text" name="facility_state_6" id="facility_state_6" value="" />
			<input type="text" name="facility_zip_6" id="facility_zip_6" value="" placeholder="Zip Code"/>
		</fieldset>
		<fieldset id="facility_7">
			<label for="facility_name_7">Facility Name:<br></label>
			<input type="text" name="facility_name_7" id="facility_name_7" value="" placeholder="Facility Name"/>
			<input type="text" name="facility_addr_7" id="facility_addr_7" value="" placeholder="Facility Address"/>
			<input type="text" name="facility_city_7" id="facility_city_7" value="" placeholder="City" />
			<label for="facility_state_7">State</label>
			<input type="text" name="facility_state_7" id="facility_state_7" value="" />
			<input type="text" name="facility_zip_7" id="facility_zip_7" value="" placeholder="Zip Code"/>
		</fieldset>
		<fieldset id="facility_8">
			<label for="facility_name_8">Facility Name:<br></label>
			<input type="text" name="facility_name_8" id="facility_name_8" value="" placeholder="Facility Name"/>
			<input type="text" name="facility_addr_8" id="facility_addr_8" value="" placeholder="Facility Address"/>
			<input type="text" name="facility_city_8" id="facility_city_8" value="" placeholder="City" />
			<label for="facility_state_8">State</label>
			<input type="text" name="facility_state_8" id="facility_state_8" value="" />
			<input type="text" name="facility_zip_8" id="facility_zip_8" value="" placeholder="Zip Code"/>
		</fieldset>
		<fieldset id="facility_9">
			<label for="facility_name_9">Facility Name:<br></label>
			<input type="text" name="facility_name_9" id="facility_name_9" value="" placeholder="Facility Name"/>
			<input type="text" name="facility_addr_9" id="facility_addr_9" value="" placeholder="Facility Address"/>
			<input type="text" name="facility_city_9" id="facility_city_9" value="" placeholder="City" />
			<label for="facility_state_9">State</label>
			<input type="text" name="facility_state_9" id="facility_state_9" value="" />
			<input type="text" name="facility_zip_9" id="facility_zip_9" value="" placeholder="Zip Code"/>
		</fieldset>
		<fieldset id="facility_10">
			<label for="facility_name_10">Facility Name:<br></label>
			<input type="text" name="facility_name_10" id="facility_name_10" value="" placeholder="Facility Name"/>
			<input type="text" name="facility_addr_10" id="facility_addr_10" value="" placeholder="Facility Address"/>
			<input type="text" name="facility_city_10" id="facility_city_10" value="" placeholder="City" />
			<label for="facility_state_10">State</label>
			<input type="text" name="facility_state_10" id="facility_state_10" value="" />
			<input type="text" name="facility_zip_10" id="facility_zip_10" value="" placeholder="Zip Code"/>
		</fieldset>
		<?php
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
		
		if ( ! empty( $_POST['facility_name_1'] )) {
			$cart_item_meta['facility_name_1'] = $_POST['facility_name_1'];
			$cart_item_meta['facility_addr_1'] = $_POST['facility_addr_1'];
			$cart_item_meta['facility_city_1'] = $_POST['facility_city_1'];
			$cart_item_meta['facility_state_1'] = $_POST['facility_state_1'];
			$cart_item_meta['facility_zip_1'] = $_POST['facility_zip_1'];
		}
		if ( ! empty( $_POST['facility_name_2'] )) {
			$cart_item_meta['facility_name_2'] = $_POST['facility_name_2'];
			$cart_item_meta['facility_addr_2'] = $_POST['facility_addr_2'];
			$cart_item_meta['facility_city_2'] = $_POST['facility_city_2'];
			$cart_item_meta['facility_state_2'] = $_POST['facility_state_2'];
			$cart_item_meta['facility_zip_2'] = $_POST['facility_zip_2'];
		}
		if ( ! empty( $_POST['facility_name_3'] )) {
			$cart_item_meta['facility_name_3'] = $_POST['facility_name_3'];
			$cart_item_meta['facility_addr_3'] = $_POST['facility_addr_3'];
			$cart_item_meta['facility_city_3'] = $_POST['facility_city_3'];
			$cart_item_meta['facility_state_3'] = $_POST['facility_state_3'];
			$cart_item_meta['facility_zip_3'] = $_POST['facility_zip_3'];		}
		if ( ! empty( $_POST['facility_name_4'] )) {
			$cart_item_meta['facility_name_4'] = $_POST['facility_name_4'];
			$cart_item_meta['facility_addr_4'] = $_POST['facility_addr_4'];
			$cart_item_meta['facility_city_4'] = $_POST['facility_city_4'];
			$cart_item_meta['facility_state_4'] = $_POST['facility_state_4'];
			$cart_item_meta['facility_zip_4'] = $_POST['facility_zip_4'];
		}
		if ( ! empty( $_POST['facility_name_5'] )) {
			$cart_item_meta['facility_name_5'] = $_POST['facility_name_5'];
			$cart_item_meta['facility_addr_5'] = $_POST['facility_addr_5'];
			$cart_item_meta['facility_city_5'] = $_POST['facility_city_5'];
			$cart_item_meta['facility_state_5'] = $_POST['facility_state_5'];
			$cart_item_meta['facility_zip_5'] = $_POST['facility_zip_5'];		}
		if ( ! empty( $_POST['facility_name_6'] )) {
			$cart_item_meta['facility_name_6'] = $_POST['facility_name_6'];
			$cart_item_meta['facility_addr_6'] = $_POST['facility_addr_6'];
			$cart_item_meta['facility_city_6'] = $_POST['facility_city_6'];
			$cart_item_meta['facility_state_6'] = $_POST['facility_state_6'];
			$cart_item_meta['facility_zip_6'] = $_POST['facility_zip_6'];		}
		if ( ! empty( $_POST['facility_name_7'] )) {
			$cart_item_meta['facility_name_7'] = $_POST['facility_name_7'];
			$cart_item_meta['facility_addr_7'] = $_POST['facility_addr_7'];
			$cart_item_meta['facility_city_7'] = $_POST['facility_city_7'];
			$cart_item_meta['facility_state_7'] = $_POST['facility_state_7'];
			$cart_item_meta['facility_zip_7'] = $_POST['facility_zip_7'];		}
		if ( ! empty( $_POST['facility_name_8'] )) {
			$cart_item_meta['facility_name_8'] = $_POST['facility_name_8'];
			$cart_item_meta['facility_addr_8'] = $_POST['facility_addr_8'];
			$cart_item_meta['facility_city_8'] = $_POST['facility_city_8'];
			$cart_item_meta['facility_state_8'] = $_POST['facility_state_8'];
			$cart_item_meta['facility_zip_8'] = $_POST['facility_zip_8'];		}
		if ( ! empty( $_POST['facility_name_9'] )) {
			$cart_item_meta['facility_name_9'] = $_POST['facility_name_9'];
			$cart_item_meta['facility_addr_9'] = $_POST['facility_addr_9'];
			$cart_item_meta['facility_city_9'] = $_POST['facility_city_9'];
			$cart_item_meta['facility_state_9'] = $_POST['facility_state_9'];
			$cart_item_meta['facility_zip_9'] = $_POST['facility_zip_9'];		}
		if ( ! empty( $_POST['facility_name_10'] )) {
			$cart_item_meta['facility_name_10'] = $_POST['facility_name_10'];
			$cart_item_meta['facility_addr_10'] = $_POST['facility_addr_10'];
			$cart_item_meta['facility_city_10'] = $_POST['facility_city_10'];
			$cart_item_meta['facility_state_10'] = $_POST['facility_state_10'];
			$cart_item_meta['facility_zip_10'] = $_POST['facility_zip_10'];		}

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

		if ( ! empty( $values['facility_name_1'] ) ) {
			$cart_item_meta['facility_name_1'] = $values['facility_name_1'];
			$cart_item_meta['facility_addr_1'] = $values['facility_addr_1'];
			$cart_item_meta['facility_city_1'] = $values['facility_city_1'];
			$cart_item_meta['facility_state_1'] = $values['facility_state_1'];
			$cart_item_meta['facility_zip_1'] = $values['facility_zip_1'];
		}
		if ( ! empty( $values['facility_name_2'] ) ) {
			$cart_item_meta['facility_name_2'] = $values['facility_name_2'];
			$cart_item_meta['facility_addr_2'] = $values['facility_addr_2'];
			$cart_item_meta['facility_city_2'] = $values['facility_city_2'];
			$cart_item_meta['facility_state_2'] = $values['facility_state_2'];
			$cart_item_meta['facility_zip_2'] = $values['facility_zip_2'];
		}
		if ( ! empty( $values['facility_name_3'] ) ) {
			$cart_item_meta['facility_name_3'] = $values['facility_name_3'];
			$cart_item_meta['facility_addr_3'] = $values['facility_addr_3'];
			$cart_item_meta['facility_city_3'] = $values['facility_city_3'];
			$cart_item_meta['facility_state_3'] = $values['facility_state_3'];
			$cart_item_meta['facility_zip_3'] = $values['facility_zip_3'];
		}
		if ( ! empty( $values['facility_name_4'] ) ) {
			$cart_item_meta['facility_name_4'] = $values['facility_name_4'];
			$cart_item_meta['facility_addr_4'] = $values['facility_addr_4'];
			$cart_item_meta['facility_city_4'] = $values['facility_city_4'];
			$cart_item_meta['facility_state_4'] = $values['facility_state_4'];
			$cart_item_meta['facility_zip_4'] = $values['facility_zip_4'];
		}
		if ( ! empty( $values['facility_name_5'] ) ) {
			$cart_item_meta['facility_name_5'] = $values['facility_name_5'];
			$cart_item_meta['facility_addr_5'] = $values['facility_addr_5'];
			$cart_item_meta['facility_city_5'] = $values['facility_city_5'];
			$cart_item_meta['facility_state_5'] = $values['facility_state_5'];
			$cart_item_meta['facility_zip_5'] = $values['facility_zip_5'];
		}
		if ( ! empty( $values['facility_name_6'] ) ) {
			$cart_item_meta['facility_name_6'] = $values['facility_name_6'];
			$cart_item_meta['facility_addr_6'] = $values['facility_addr_6'];
			$cart_item_meta['facility_city_6'] = $values['facility_city_6'];
			$cart_item_meta['facility_state_6'] = $values['facility_state_6'];
			$cart_item_meta['facility_zip_6'] = $values['facility_zip_6'];
		}
		if ( ! empty( $values['facility_name_7'] ) ) {
			$cart_item_meta['facility_name_7'] = $values['facility_name_7'];
			$cart_item_meta['facility_addr_7'] = $values['facility_addr_7'];
			$cart_item_meta['facility_city_7'] = $values['facility_city_7'];
			$cart_item_meta['facility_state_7'] = $values['facility_state_7'];
			$cart_item_meta['facility_zip_7'] = $values['facility_zip_7'];
		}
		if ( ! empty( $values['facility_name_8'] ) ) {
			$cart_item_meta['facility_name_8'] = $values['facility_name_8'];
			$cart_item_meta['facility_addr_8'] = $values['facility_addr_8'];
			$cart_item_meta['facility_city_8'] = $values['facility_city_8'];
			$cart_item_meta['facility_state_8'] = $values['facility_state_8'];
			$cart_item_meta['facility_zip_8'] = $values['facility_zip_8'];
		}
		if ( ! empty( $values['facility_name_9'] ) ) {
			$cart_item_meta['facility_name_9'] = $values['facility_name_9'];
			$cart_item_meta['facility_addr_9'] = $values['facility_addr_9'];
			$cart_item_meta['facility_city_9'] = $values['facility_city_9'];
			$cart_item_meta['facility_state_9'] = $values['facility_state_9'];
			$cart_item_meta['facility_zip_9'] = $values['facility_zip_9'];
		}
		if ( ! empty( $values['facility_name_10'] ) ) {
			$cart_item_meta['facility_name_10'] = $values['facility_name_10'];
			$cart_item_meta['facility_addr_10'] = $values['facility_addr_10'];
			$cart_item_meta['facility_city_10'] = $values['facility_city_10'];
			$cart_item_meta['facility_state_10'] = $values['facility_state_10'];
			$cart_item_meta['facility_zip_10'] = $values['facility_zip_10'];
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
		if ( ! empty( $cart_item['facility_name_1'] ) ) {
			$facility1 = $cart_item['facility_name_1'];
			$item_data[] = array(
				'name'    => __( 'Facility Name 1', 'woocommerce-custom-subscription-fields' ),
				'value'   => __( $facility1, 'woocommerce-custom-subscription-fields' ),
				'display' => __( $facility1, 'woocommerce-custom-subscription-fields' )
			);
		}
		if ( ! empty( $cart_item['facility_name_8'] ) ) {
			$facility8 = $cart_item['facility_name_8'];
			$item_data[] = array(
				'name'    => __( 'Facility Name 8', 'woocommerce-custom-subscription-fields' ),
				'value'   => __( $facility8, 'woocommerce-custom-subscription-fields' ),
				'display' => __( $facility8, 'woocommerce-custom-subscription-fields' )
			);
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
		if ( ! empty( $cart_item['facility_name_1'] ) ) {
			woocommerce_add_order_item_meta( $item_id, __( 'Facility Name 1', 'woocommerce-custom-subscription-fields' ), __( $family, 'woocommerce-product-family' ) );
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

		

		woocommerce_wp_hidden_input( 
			array(
				'id'          => 'facility_name_1',
				'label'       => __( 'Facility Name 1 ', 'woocommerce-custom-subscription-fields' ),
				'placeholder' => __( 'Facility Name 1', 'woocommerce-custom-subscription-fields' ),
				'desc_tip'    => true,
				'description' => __( 'Facility Name 1', 'woocommerce-custom-subscription-fields' ),
			),
			array(
				'id'          => 'facility_name_2',
				'label'       => __( 'Facility Name 2 ', 'woocommerce-custom-subscription-fields' ),
				'placeholder' => __( 'Facility Name 2', 'woocommerce-custom-subscription-fields' ),
				'desc_tip'    => true,
				'description' => __( 'Facility Name 2', 'woocommerce-custom-subscription-fields' ),
			)
			
		);

		
	}

	/**
	 * write_panel_save function.
	 *
	 * @access public
	 * @param mixed $post_id
	 * @return void
	 */
	public function write_panel_save( $post_id ) {
		$facility_name_1 = ! empty( $_POST['facility_name_1'] );

		update_post_meta( $post_id, 'facility_name_1', $product_family );
	}

	
}

new WC_Custom_Sub();
?>