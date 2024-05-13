<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Trueman Contacts Widget.
 *
 * @since 1.0
 */

class Trueman_Contact_Form_Widget extends Widget_Base {

	public function get_name() {
		return 'trueman-contact-form';
	}

	public function get_title() {
		return esc_html__( 'Contact Form', 'trueman-plugin' );
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

		$this->add_control(
			'title_tag',
			[
				'label'       => esc_html__( 'Title Tag', 'trueman-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'h5',
				'options' => [
					'h1'  => __( 'H1', 'trueman-plugin' ),
					'h2' => __( 'H2', 'trueman-plugin' ),
					'h3' => __( 'H3', 'trueman-plugin' ),
					'h4' => __( 'H4', 'trueman-plugin' ),
					'h5' => __( 'H5', 'trueman-plugin' ),
					'div' => __( 'DIV', 'trueman-plugin' ),
				],
			]
		);

		$this->add_control(
			'num',
			[
				'label'       => esc_html__( 'Num', 'trueman-plugin' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter num', 'trueman-plugin' ),
				'default'     => esc_html__( '01', 'trueman-plugin' ),
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
					'{{WRAPPER}} .trm-title--h' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'     => esc_html__( 'Title Typography', 'trueman-plugin' ),
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .trm-title--h',
			]
		);

		$this->add_control(
			'num_color',
			[
				'label'     => esc_html__( 'Num Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-title-with-divider span:after' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'     => esc_html__( 'Num Typography', 'trueman-plugin' ),
				'name'     => 'num_typography',
				'selector' => '{{WRAPPER}} .trm-title-with-divider span:after',
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

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'label'     => esc_html__( 'Button Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-btn',
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

		?>

		<!-- contact form -->
        <div class="row">
          <?php if ( $settings['title'] ) : ?>
          <div class="col-lg-12">
            <<?php echo esc_attr( $settings['title_tag'] ); ?> class="trm-mb-40 trm-title--h trm-title-with-divider">
            	<span <?php echo $this->get_render_attribute_string( 'title' ); ?>>
		          	<?php echo wp_kses_post( $settings['title'] ); ?>
		        </span>
            	<span data-number="<?php echo esc_attr( $settings['num'] ); ?>"></span>
            </<?php echo esc_attr( $settings['title_tag'] ); ?>>
          </div>
          <?php endif; ?>
          <?php if ( $settings['contact_form'] ) : ?>
          <div class="col-lg-12">
						<div class="trm-contact-card">
          		<?php echo do_shortcode( '[contact-form-7 id="'. $settings['contact_form'] .'"]' ); ?>
						</div>
          </div>
          <?php endif; ?>
        </div>
        <!-- contact form end -->

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Trueman_Contact_Form_Widget() );
