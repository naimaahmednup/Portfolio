<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Trueman Numbers Widget.
 *
 * @since 1.0
 */
class Trueman_Numbers_Widget extends Widget_Base {

	public function get_name() {
		return 'trueman-numbers';
	}

	public function get_title() {
		return esc_html__( 'Numbers', 'trueman-plugin' );
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
			'items_tab',
			[
				'label' => esc_html__( 'Items', 'trueman-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'value', [
				'label'       => esc_html__( 'Number Value', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter number value', 'trueman-plugin' ),
				'default'	=> 99,
			]
		);

		$repeater->add_control(
			'after', [
				'label'       => esc_html__( 'After Text', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter after text', 'trueman-plugin' ),
			]
		);

		$repeater->add_control(
			'label', [
				'label'       => esc_html__( 'Label', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter label', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Label', 'trueman-plugin' ),
			]
		);

		$this->add_control(
			'items',
			[
				'label' => esc_html__( 'Numbers Items', 'trueman-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ label }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'items_styling',
			[
				'label'     => esc_html__( 'Items Styling', 'trueman-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'item_value_color',
			[
				'label'     => esc_html__( 'Number Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-counter-up .trm-counter-number' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_value_typography',
				'label'     => esc_html__( 'Number Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-counter-up .trm-counter-number',
			]
		);

		$this->add_control(
			'item_value_symbol_color',
			[
				'label'     => esc_html__( 'Number After Symbol Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-counter-up .trm-counter-number .trm-counter-symbol' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_value_symbol_typography',
				'label'     => esc_html__( 'Number After Symbol Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-counter-up .trm-counter-number .trm-counter-symbol',
			]
		);

		$this->add_control(
			'item_label_color',
			[
				'label'     => esc_html__( 'Label Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-counter-up .trm-label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_label_typography',
				'label'     => esc_html__( 'Label Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-counter-up .trm-label',
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
		?>

		<?php if ( $settings['items'] ) : ?>
		<!-- stats -->
        <div class="row">
          <?php foreach ( $settings['items'] as $index => $item ) :
		  	$item_value = $this->get_repeater_setting_key( 'value', 'items', $index );
		  	$this->add_inline_editing_attributes( $item_value, 'none' );

		  	$item_label = $this->get_repeater_setting_key( 'label', 'items', $index );
		  	$this->add_inline_editing_attributes( $item_label, 'basic' );
		  ?>
          <div class="col-lg-4">

            <!-- counter -->
            <div class="trm-counter-up trm-scroll-animation" data-scroll data-scroll-offset="40">
              <div class="trm-counter-number">
              	<span class="trm-counter">
              		<span <?php echo $this->get_render_attribute_string( $item_value ); ?>>
		        		<?php echo esc_html( $item['value'] ); ?>
		        	</span>
              	</span>
              	<?php if ( $item['after'] ) : ?>
              	<span class="trm-counter-symbol"><?php echo esc_html( $item['after'] ); ?></span>
              	<?php endif; ?>
              </div>
              <div class="trm-divider trm-mb-20 trm-mt-20"></div>
              <div class="trm-label">
              	<span <?php echo $this->get_render_attribute_string( $item_label ); ?>>
	        		<?php echo wp_kses_post( $item['label'] ); ?>
	        	</span>
              </div>
            </div>
            <!-- counter end -->

          </div>
          <?php endforeach; ?>
        </div>
        <!-- stats end -->
        <?php endif; ?>

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

		<# if ( settings.items ) { #>
		<!-- stats -->
        <div class="row">
          <# _.each( settings.items, function( item, index ) {

		    var item_value = view.getRepeaterSettingKey( 'value', 'items', index );
		    view.addInlineEditingAttributes( item_value, 'none' );

		    var item_label = view.getRepeaterSettingKey( 'label', 'items', index );
		    view.addInlineEditingAttributes( item_label, 'basic' );

		  #>
          <div class="col-lg-4">

            <!-- counter -->
            <div class="trm-counter-up trm-scroll-animation" data-scroll data-scroll-offset="40">
              <div class="trm-counter-number">
              	<span class="trm-counter">
              		<span {{{ view.getRenderAttributeString( item_value ) }}}>
		        		{{{ item.value }}}
		        	</span>
              	</span>
              	<# if ( item.after ) { #>
              	<span class="trm-counter-symbol">{{{ item.after }}}</span>
              	<# } #>
              </div>
              <div class="trm-divider trm-mb-20 trm-mt-20"></div>
              <div class="trm-label">
              	<span {{{ view.getRenderAttributeString( item_label ) }}}>
	        		{{{ item.label }}}
	        	</span>
              </div>
            </div>
            <!-- counter end -->

          </div>
          <# }); #>
        </div>
        <!-- stats end -->
        <# } #>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Trueman_Numbers_Widget() );
