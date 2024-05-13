<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Trueman Divider Widget.
 *
 * @since 1.0
 */
class Trueman_Divider_Widget extends Widget_Base {

	public function get_name() {
		return 'trueman-divider';
	}

	public function get_title() {
		return esc_html__( 'Divider', 'trueman-plugin' );
	}

	public function get_icon() {
		return 'eicon-parallax';
	}

	public function get_categories() {
		return [ 'trueman-category' ];
	}

	/**
	 * Register widget controls.
	 *
	 * @since 1.0
	 */
	protected function register_controls() {

	}


	/**
	 * Render widget output on the frontend.
	 *
	 * @since 1.0
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		?>

		<div class="trm-divider trm-mb-40 trm-mt-40"></div>

		<?php
	}

	/**
	 * Render widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function content_template() {
		?>

		<div class="trm-divider trm-mb-40 trm-mt-40"></div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Trueman_Divider_Widget() );
