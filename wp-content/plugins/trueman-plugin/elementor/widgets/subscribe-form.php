<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Trueman Subscribe Widget.
 *
 * @since 1.0
 */

class Trueman_Subscribe_Form_Widget extends Widget_Base {

	public function get_name() {
		return 'trueman-subscribe-form';
	}

	public function get_title() {
		return esc_html__( 'Subscribe Form', 'trueman-plugin' );
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

		$this->start_controls_section(
			'heading_tab',
			[
				'label' => esc_html__( 'Title', 'trueman-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter title', 'trueman-plugin' ),
				'default'     => esc_html__( 'Title', 'trueman-plugin' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'form_tab',
			[
				'label' => esc_html__( 'Form', 'trueman-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'contact_form',
			[
				'label' => esc_html__( 'Select CF7 Form', 'trueman-plugin' ),
				'type' => Controls_Manager::SELECT,
				'default' => 1,
				'options' => $this->contact_form_list(),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_styling',
			[
				'label'     => esc_html__( 'Title', 'trueman-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-subscribe-card h5' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'     => esc_html__( 'Title Typography', 'trueman-plugin' ),
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .trm-subscribe-card h5',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'form_styling',
			[
				'label'     => esc_html__( 'Form', 'trueman-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_color',
			[
				'label'     => esc_html__( 'Button Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-btn' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_bg_color',
			[
				'label'     => esc_html__( 'Button Background Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render Contact Form List.
	 *
	 * @since 1.0
	 */
	protected function contact_form_list() {
		$cf7_posts = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

		$cf7_forms = array();

		if ( $cf7_posts ) {
			foreach ( $cf7_posts as $cf7_form ) {
				$cf7_forms[ $cf7_form->ID ] = $cf7_form->post_title;
			}
		} else {
			$cf7_forms[ esc_html__( 'No contact forms found', 'trueman-plugin' ) ] = 0;
		}

		return $cf7_forms;
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * @since 1.0
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$this->add_inline_editing_attributes( 'title', 'basic' );

    $hide_vcard_panel = get_field( 'hide_vcard_panel' );

		?>

		<div class="trm-divider trm-mb-40"></div>

        <!-- subscribe -->
        <div class="trm-subscribe-card trm-scroll-animation" data-scroll data-scroll-offset="40">
          <div class="row">
            <?php if ( $settings['title'] ) : ?>
            <div class="<?php if ( $hide_vcard_panel ) : ?>col-lg-6<?php else : ?>col-lg-4<?php endif; ?> align-self-center">
              <h5>
              	<span <?php echo $this->get_render_attribute_string( 'title' ); ?>>
    		          	<?php echo wp_kses_post( $settings['title'] ); ?>
    		        </span>
              </h5>
            </div>
            <?php endif; ?>
            <?php if ( $settings['contact_form'] ) : ?>
            <div class="<?php if ( $hide_vcard_panel ) : ?>col-lg-6<?php else : ?>col-lg-8<?php endif; ?>">
              <?php echo do_shortcode( '[contact-form-7 id="'. $settings['contact_form'] .'"]' ); ?>
            </div>
            <?php endif; ?>
          </div>
        </div>
        <!-- subscribe end -->

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Trueman_Subscribe_Form_Widget() );
