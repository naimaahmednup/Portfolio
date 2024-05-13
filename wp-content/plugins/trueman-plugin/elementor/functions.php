<?php
/**
 *  Trueman Elementor Layout Builder
 *
 * @package Trueman
 * @since 1.0
 */

// We check if the Elementor plugin has been installed / activated.

if( !in_array( 'elementor/elementor.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) return;

class Trueman_Elementor_Widget {

	private static $instance = null;

	/**
	 * @since 1.0
	 */
	public static function get_instance() {
	    if ( ! self::$instance )
	       self::$instance = new self;
	    return self::$instance;
	}

	/**
	 * @since 1.0
	 */
	public function init(){
		add_action( 'elementor/widgets/register', array( $this, 'trueman_elementor_register_widgets' ) );

		add_action('elementor/frontend/after_register_styles', array($this, 'trueman_elementor_frontend_styles'), 10);

		add_action('elementor/frontend/after_register_scripts', array($this, 'trueman_elementor_frontend_scripts'), 10);

		add_action( 'elementor/elements/categories_registered', array( $this, 'trueman_elementor_widgets_category' ) );
	}

	/**
	 * @since 1.0
	 */
	public function trueman_elementor_register_widgets() {
		//Require all PHP files in the /elementor/widgets directory
		foreach( glob( plugin_dir_path( __FILE__ ) . "widgets/*.php" ) as $file ) {
		    require $file;
		}
	}

	/**
	 * @since 1.0
	 */
	public function trueman_elementor_frontend_scripts() {
		wp_enqueue_script( 'trueman-plugin-frontend-widget-scripts',  plugin_dir_url( __FILE__ ) . 'assets/js/front-end-widget.js', array('jquery'), false, true);
	}

	/**
	 * @since 1.0
	 */
	public function trueman_elementor_frontend_styles() {
		wp_enqueue_style( 'trueman-plugin-frontend-widget-style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css', null, 1.0 );
	}

	/**
	 * @since 1.0
	 */
	public function trueman_elementor_widgets_category( $elements_manager ) {
		$elements_manager->add_category(
			'trueman-category',
			[
				'title' => esc_html__( 'Trueman Theme', 'trueman-plugin' ),
				'icon' => 'fa fa-plug',
			]
		);
	}
}

Trueman_Elementor_Widget::get_instance()->init();
