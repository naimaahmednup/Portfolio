<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Trueman Quote Widget.
 *
 * @since 1.0
 */
class Trueman_Quote_Widget extends Widget_Base {

	public function get_name() {
		return 'trueman-quote';
	}

	public function get_title() {
		return esc_html__( 'Quote', 'trueman-plugin' );
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
			'title_tab',
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
			'content_tab',
			[
				'label' => esc_html__( 'Content', 'trueman-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'description',
			[
				'label'       => esc_html__( 'Description', 'trueman-plugin' ),
				'type'        => Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Enter your description', 'trueman-plugin' ),
				'default'     => esc_html__( 'Type your description here', 'trueman-plugin' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_styling',
			[
				'label'     => esc_html__( 'Content Styling', 'trueman-plugin' ),
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

		$this->add_control(
			'description_color',
			[
				'label'     => esc_html__( 'Description Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-text--t' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'     => esc_html__( 'Description Typography', 'trueman-plugin' ),
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .trm-text--t',
			]
		);

		$this->add_control(
			'quote_symbol_color',
			[
				'label'     => esc_html__( 'Quote Symbol Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .blockquote:before' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}


	/**
	 * Render widget output on the frontend.
	 *
	 * @since 1.0
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$this->add_inline_editing_attributes( 'title', 'basic' );
		$this->add_inline_editing_attributes( 'num', 'none' );
		$this->add_inline_editing_attributes( 'description', 'advanced' );

		?>

		<!-- text -->
        <div class="row">
          <div class="col-lg-12">
          	<?php if ( $settings['title'] ) : ?>
            <!-- title -->
            <<?php echo esc_attr( $settings['title_tag'] ); ?> class="trm-mb-40 trm-title--h trm-title-with-divider">
            	<span <?php echo $this->get_render_attribute_string( 'title' ); ?>>
		          	<?php echo wp_kses_post( $settings['title'] ); ?>
		        </span>
            	<span data-number="<?php echo esc_attr( $settings['num'] ); ?>"></span>
            </<?php echo esc_attr( $settings['title_tag'] ); ?>>
            <?php endif; ?>

            <?php if ( $settings['description'] ) : ?>
            <!-- quote -->
            <blockquote class="trm-text--t trm-scroll-animation" data-scroll data-scroll-offset="40">
            	<div <?php echo $this->get_render_attribute_string( 'description' ); ?>>
		          	<?php echo wp_kses_post( $settings['description'] ); ?>
		        	</div>
            </blockquote>
            <!-- quote end -->
            <?php endif; ?>

          </div>
        </div>
        <!-- text end -->

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

		<#
		view.addInlineEditingAttributes( 'title', 'basic' );
		view.addInlineEditingAttributes( 'num', 'none' );
		view.addInlineEditingAttributes( 'description', 'advanced' );
		#>

		<!-- text -->
        <div class="row">
          <div class="col-lg-12">
          	<# if ( settings.title ) { #>
            <!-- title -->
			<{{{ settings.title_tag }}} class="trm-mb-40 trm-title--h trm-title-with-divider">
				<span {{{ view.getRenderAttributeString( 'title' ) }}}>
					{{{ settings.title }}}
				</span>
				<span data-number="{{{ settings.num }}}"></span>
            </{{{ settings.title_tag }}}>
            <# } #>

			<# if ( settings.description ) { #>
			<!-- quote -->
			<blockquote class="trm-text--t trm-scroll-animation" data-scroll data-scroll-offset="40">
				<div {{{ view.getRenderAttributeString( 'description' ) }}}>
					{{{ settings.description }}}
				</div>
			</blockquote>
			<!-- quote end -->
			<# } #>

          </div>
        </div>
        <!-- text end -->

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Trueman_Quote_Widget() );
