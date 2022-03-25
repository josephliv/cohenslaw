<?php
namespace Frontend_WP;

use Elementor\Core\Base\Module;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class FEA_ACF_Settings{
		/**
	* Redirect non-admin users to home page
	*
	* This function is attached to the ‘admin_init’ action hook.
	*/


	public function get_settings_fields( $field_keys ){
		$value = get_option( 'fea_acf_admin_page' ) ? get_option( 'fea_acf_admin_page' ) : 0;

		$local_fields = array(
			'fea_acf_admin_page' => array(
				'label' => __( 'Show ACF Admin Page', FEA_NS ),
				'type' => 'true_false',
				'instructions' => '',
				'required' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
                'value' => $value,
				'message' => '',
				'ui' => 1,
				'ui_on_text' => '',
				'ui_off_text' => '',
			),
		);

		return $local_fields;
	} 
	public function acf_admin_page() {	
        $value = get_option( 'fea_acf_admin_page' ) ? get_option( 'fea_acf_admin_page' ) : 0;
        if( ! $value ){
            add_filter('acf/settings/show_admin', function(){
                return false;
            } );
        }
       
    }

	public function __construct() {
        add_filter( FEA_PREFIX.'/acf_fields', [ $this, 'get_settings_fields'] );
        
        add_action( 'acf/init', [ $this, 'acf_admin_page'] );
	}
	
}

new FEA_ACF_Settings( $this );