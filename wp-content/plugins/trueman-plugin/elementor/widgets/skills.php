<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Trueman Skills Widget.
 *
 * @since 1.0
 */
class Trueman_Skills_Widget extends Widget_Base {

	public function get_name() {
		return 'trueman-skills';
	}

	public function get_title() {
		return esc_html__( 'Skills', 'trueman-plugin' );
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
			'layout_tab',
			[
				'label' => esc_html__( 'Layout', 'trueman-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout_count',
			[
				'label'       => esc_html__( 'Count of Col', 'trueman-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'1'  => __( '1', 'trueman-plugin' ),
					'2' => __( '2', 'trueman-plugin' ),
				],
			]
		);

		$this->add_control(
			'layout_col',
			[
				'label'       => esc_html__( 'Layout', 'trueman-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'1'  => __( '1 Column', 'trueman-plugin' ),
					'2' => __( '2 Column', 'trueman-plugin' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_col1_tab',
			[
				'label' => esc_html__( 'Content Column #1', 'trueman-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'items',
			[
				'label' => esc_html__( 'Skills Items', 'trueman-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => [
					[
						'name' => 'label',
						'label_block' => true,
						'label'       => esc_html__( 'Progress Label', 'trueman-plugin' ),
						'type'        => Controls_Manager::TEXT,
						'placeholder' => esc_html__( '90%', 'trueman-plugin' ),
						'default'	=> esc_html__( '90%', 'trueman-plugin' ),
					],
					[
						'name' => 'value',
						'label_block' => true,
						'label'       => esc_html__( 'Progress Value (%)', 'trueman-plugin' ),
						'type'        => Controls_Manager::TEXT,
						'placeholder' => esc_html__( '90', 'trueman-plugin' ),
						'default'	=> esc_html__( '90', 'trueman-plugin' ),
					],
				],
				'title_field' => '{{{ label }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_col2_tab',
			[
				'label' => esc_html__( 'Content Column #2', 'trueman-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
				'condition' => [
		            'layout_count' => '2'
		        ],
			]
		);

		$this->add_control(
			'c2_items',
			[
				'label' => esc_html__( 'Skills Items', 'trueman-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => [
					[
						'name' => 'label',
						'label_block' => true,
						'label'       => esc_html__( 'Progress Label', 'trueman-plugin' ),
						'type'        => Controls_Manager::TEXT,
						'placeholder' => esc_html__( 'Label', 'trueman-plugin' ),
						'default'	=> esc_html__( 'Label', 'trueman-plugin' ),
					],
					[
						'name' => 'value',
						'label_block' => true,
						'label'       => esc_html__( 'Progress Value (%)', 'trueman-plugin' ),
						'type'        => Controls_Manager::TEXT,
						'placeholder' => esc_html__( '90', 'trueman-plugin' ),
						'default'	=> esc_html__( '90', 'trueman-plugin' ),
					],
				],
				'title_field' => '{{{ label }}}',
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
			'items_styling',
			[
				'label'     => esc_html__( 'Items', 'trueman-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'item_progress_label_color',
			[
				'label'     => esc_html__( 'Progress Label Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-skill-card .trm-skill-header h6' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_progress_label_typography',
				'label'     => esc_html__( 'Progress Label Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-skill-card .trm-skill-header h6',
			]
		);

		$this->add_control(
			'item_progress_value_color',
			[
				'label'     => esc_html__( 'Progress Value Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-skill-card .trm-skill-header .trm-label.trm-label-light' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_progress_value_typography',
				'label'     => esc_html__( 'Progress Value Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-skill-card .trm-skill-header .trm-label.trm-label-light',
			]
		);

		$this->add_control(
			'item_progress_line_color',
			[
				'label'     => esc_html__( 'Progress Line Background', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-skill-card .trm-progressbar-frame .trm-progressbar' => 'background: {{VALUE}};',
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

		?>

		<!-- skills -->
        <div class="row">
        	<?php if ( $settings['title'] ) : ?>
        	<div class="col-lg-12">
                <!-- title -->
                <<?php echo esc_attr( $settings['title_tag'] ); ?> class="trm-mb-40 trm-title--h trm-title-with-divider">
                	<span <?php echo $this->get_render_attribute_string( 'title' ); ?>>
	            		<?php echo wp_kses_post( $settings['title'] ); ?>
	            	</span>
	            	<span data-number="<?php echo esc_attr( $settings['num'] ); ?>"></span>
	            </<?php echo esc_attr( $settings['title_tag'] ); ?>>
            </div>
            <?php endif; ?>
        	<div class="col-12<?php if ( $settings['layout_col'] == '2' ) : ?> col-lg-6<?php endif; ?>">
        		<?php if ( $settings['items'] ) : ?>
                <div class="trm-skill-card trm-scroll-animation" data-scroll data-scroll-offset="40">
                  <?php foreach ( $settings['items'] as $index => $item ) :

				    $item_label = $this->get_repeater_setting_key( 'label', 'items', $index );
				    $this->add_inline_editing_attributes( $item_label, 'none' );

				    $item_value = $this->get_repeater_setting_key( 'value', 'items', $index );
				    $this->add_inline_editing_attributes( $item_value, 'none' );

				  ?>
                  <div class="trm-mb-40">
                    <div class="trm-skill-header">
                      <h6 class="trm-mb-15">
                      	<span <?php echo $this->get_render_attribute_string( $item_label ); ?>>
							<?php echo wp_kses_post( $item['label'] ); ?>
						</span>
                      </h6>
                      <span class="trm-label trm-label-light">
                      	<span <?php echo $this->get_render_attribute_string( $item_value ); ?>>
							<?php echo wp_kses_post( $item['value'] ); ?><?php echo esc_html( '%', 'trueman-plugin' ); ?>
						</span>
                      </span>
                    </div>
                    <div class="trm-progressbar-frame">
                      <div class="trm-progressbar p<?php echo esc_attr( $item['value'] ); ?>"></div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>
                <?php endif; ?>
              </div>

              <?php if ( $settings['layout_count'] == '2' ) : ?>
              <div class="col-12<?php if ( $settings['layout_col'] == '2' ) : ?> col-lg-6<?php endif; ?>">
              	<?php if ( $settings['c2_items'] ) : ?>
                <div class="trm-skill-card trm-scroll-animation" data-scroll data-scroll-offset="40">
                  <?php foreach ( $settings['c2_items'] as $index => $item ) :

				    $item_label = $this->get_repeater_setting_key( 'label', 'c2_items', $index );
				    $this->add_inline_editing_attributes( $item_label, 'none' );

				    $item_value = $this->get_repeater_setting_key( 'value', 'c2_items', $index );
				    $this->add_inline_editing_attributes( $item_value, 'none' );

				  ?>
                  <div class="trm-mb-40">
                    <div class="trm-skill-header">
                      <h6 class="trm-mb-15">
                      	<span <?php echo $this->get_render_attribute_string( $item_label ); ?>>
							<?php echo wp_kses_post( $item['label'] ); ?>
						</span>
                      </h6>
                      <span class="trm-label trm-label-light">
                      	<span <?php echo $this->get_render_attribute_string( $item_value ); ?>>
							<?php echo wp_kses_post( $item['value'] ); ?><?php echo esc_html( '%', 'trueman-plugin' ); ?>
						</span>
                      </span>
                    </div>
                    <div class="trm-progressbar-frame">
                      <div class="trm-progressbar p<?php echo esc_attr( $item['value'] ); ?>"></div>
                    </div>
                  </div>
                  <?php endforeach; ?>
                </div>
                <?php endif; ?>
              </div>
            <?php endif; ?>
        </div>
        <!-- skills end -->

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
		#>

		<!-- skills -->
        <div class="row">
        	<# if ( settings.title ) { #>
        	<div class="col-lg-12">
                <!-- title -->
                <{{{ settings.title_tag }}} class="trm-mb-40 trm-title--h trm-title-with-divider">
                	<span {{{ view.getRenderAttributeString( 'title' ) }}}>
						{{{ settings.title }}}
					</span>
	            	<span data-number="{{{ settings.num }}}"></span>
	            </{{{ settings.title_tag }}}>
            </div>
            <# } #>
        	<div class="col-12<# if ( settings.layout_col == '2' ) { #> col-lg-6<# } #>">
        		<# if ( settings.items ) { #>
                <div class="trm-skill-card trm-scroll-animation" data-scroll data-scroll-offset="40">
                  <# _.each( settings.items, function( item, index ) {

			    	var item_label = view.getRepeaterSettingKey( 'label', 'items', index );
			    	view.addInlineEditingAttributes( item_label, 'none' );

			    	var item_value = view.getRepeaterSettingKey( 'value', 'items', index );
			    	view.addInlineEditingAttributes( item_value, 'none' );

			      #>
                  <div class="trm-mb-40">
                    <div class="trm-skill-header">
                      <h6 class="trm-mb-15">
                      	<span {{{ view.getRenderAttributeString( item_label ) }}}>
							{{{ item.label }}}
						</span>
                      </h6>
                      <span class="trm-label trm-label-light">
                      	<span {{{ view.getRenderAttributeString( item_value ) }}}>
							{{{ item.value }}}%
						</span>
                      </span>
                    </div>
                    <div class="trm-progressbar-frame">
                      <div class="trm-progressbar p{{{ item.value }}}"></div>
                    </div>
                  </div>
                  <# }); #>
                </div>
                <# } #>
              </div>

              <# if ( settings.layout_count == '2' ) { #>
              <div class="col-12<# if ( settings.layout_col == '2' ) { #> col-lg-6<# } #>">
              	<# if ( settings.c2_items ) { #>
                <div class="trm-skill-card trm-scroll-animation" data-scroll data-scroll-offset="40">
                  <# _.each( settings.c2_items, function( item, index ) {

				  var item_label = view.getRepeaterSettingKey( 'label', 'c2_items', index );
				  view.addInlineEditingAttributes( item_label, 'none' );

				  var item_value = view.getRepeaterSettingKey( 'value', 'c2_items', index );
				  view.addInlineEditingAttributes( item_value, 'none' );

				  #>
                  <div class="trm-mb-40">
                    <div class="trm-skill-header">
                      <h6 class="trm-mb-15">
                      	<span {{{ view.getRenderAttributeString( item_label ) }}}>
							{{{ item.label }}}
						</span>
                      </h6>
                      <span class="trm-label trm-label-light">
                      	<span {{{ view.getRenderAttributeString( item_value ) }}}>
							{{{ item.value }}}%
						</span>
                      </span>
                    </div>
                    <div class="trm-progressbar-frame">
                      <div class="trm-progressbar p{{{ item.value }}}"></div>
                    </div>
                  </div>
                  <# }); #>
                </div>
                <# } #>
              </div>
              <# } #>
        </div>
        <!-- skills end -->

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Trueman_Skills_Widget() );
