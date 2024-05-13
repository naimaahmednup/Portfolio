<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Trueman Pricing Widget.
 *
 * @since 1.0
 */
class Trueman_Pricing_Widget extends Widget_Base {

	public function get_name() {
		return 'trueman-pricing';
	}

	public function get_title() {
		return esc_html__( 'Pricing', 'trueman-plugin' );
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
			'items_tab',
			[
				'label' => esc_html__( 'Items', 'trueman-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'name', [
				'label'       => esc_html__( 'Title', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter title', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Enter title', 'trueman-plugin' ),
			]
		);

		$repeater->add_control(
			'price', [
				'label'       => esc_html__( 'Price', 'trueman-plugin' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'placeholder' => 100,
				'default'	=> 100,
			]
		);

		$repeater->add_control(
			'price_before', [
				'label'       => esc_html__( 'Price (before)', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( '$', 'trueman-plugin' ),
				'default'	=> esc_html__( '$', 'trueman-plugin' ),
			]
		);

		$repeater->add_control(
			'price_after', [
				'label'       => esc_html__( 'Price (after)', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'hour', 'trueman-plugin' ),
				'default'	=> esc_html__( 'hour', 'trueman-plugin' ),
			]
		);

		$repeater->add_control(
			'list', [
				'label'       => esc_html__( 'List', 'trueman-plugin' ),
				'type' => Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'List', 'trueman-plugin' ),
				'default'	=> '',
			]
		);

		$repeater->add_control(
			'button', [
				'label'       => esc_html__( 'Button (title)', 'trueman-plugin' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Button Label', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Order Now', 'trueman-plugin' ),
			]
		);

		$repeater->add_control(
			'link', [
				'label'       => esc_html__( 'Button (link)', 'trueman-plugin' ),
				'type' => Controls_Manager::URL,
				'show_external' => true,
			]
		);

		$repeater->add_control(
			'badge', [
				'label'       => esc_html__( 'Popular Badge', 'trueman-plugin' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'trueman-plugin' ),
				'label_off' => __( 'Hide', 'trueman-plugin' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'items',
			[
				'label' => esc_html__( 'Pricing Items', 'trueman-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ name }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_styling',
			[
				'label'     => esc_html__( 'Title Styling', 'trueman-plugin' ),
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
				'label'     => esc_html__( 'Items Styling', 'trueman-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'item_name_color',
			[
				'label'     => esc_html__( 'Title Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-price .trm-price-header h6' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'label'     => esc_html__( 'Title Typography', 'trueman-plugin' ),
				'name'     => 'item_name_typography',
				'selector' => '{{WRAPPER}} .trm-price .trm-price-header h6',
			]
		);

		$this->add_control(
			'item_price_color',
			[

				'label'     => esc_html__( 'Price Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-price .trm-price-number' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_price_typography',
				'label'     => esc_html__( 'Price Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-price .trm-price-number',
			]
		);

		$this->add_control(
			'item_price2_color',
			[

				'label'     => esc_html__( 'Price Secondary Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-price .trm-price-number sup' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_price2_typography',
				'label'     => esc_html__( 'Price Secondary Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-price .trm-price-number sup',
			]
		);

		$this->add_control(
			'item_list_color',
			[

				'label'     => esc_html__( 'List Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-price .trm-price-list li' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_list_typography',
				'label'     => esc_html__( 'List Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-price .trm-price-list li',
			]
		);

		$this->add_control(
			'item_button_color',
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
			'item_button_bgcolor',
			[

				'label'     => esc_html__( 'Button BG Color', 'trueman-plugin' ),
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
				'name'     => 'item_button_typography',
				'label'     => esc_html__( 'Button Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-btn',
			]
		);

		$this->add_control(
			'item_badge_color',
			[

				'label'     => esc_html__( 'Popular Badge Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-price.trm-popular:after' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'item_badge_bg_color',
			[

				'label'     => esc_html__( 'Popular Badge Background', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-price.trm-popular:after' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_badge_typography',
				'label'     => esc_html__( 'Popular Badge Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-price.trm-popular:after',
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

		<!-- price plans -->
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

          <?php if ( $settings['items'] ) : ?>
          <?php foreach ( $settings['items'] as $index => $item ) :
		  $item_name = $this->get_repeater_setting_key( 'name', 'items', $index );
		  $this->add_inline_editing_attributes( $item_name, 'basic' );

		  $item_price = $this->get_repeater_setting_key( 'price', 'items', $index );
		  $this->add_inline_editing_attributes( $item_price, 'none' );

		  $item_price_before = $this->get_repeater_setting_key( 'price_before', 'items', $index );
		  $this->add_inline_editing_attributes( $item_price_before, 'none' );

		  $item_price_after = $this->get_repeater_setting_key( 'price_after', 'items', $index );
	 	  $this->add_inline_editing_attributes( $item_price_after, 'none' );

	 	  $item_list = $this->get_repeater_setting_key( 'list', 'items', $index );
		  $this->add_inline_editing_attributes( $item_list, 'advanced' );

		  $item_button = $this->get_repeater_setting_key( 'button', 'items', $index );
		  $this->add_inline_editing_attributes( $item_button, 'none' );
		  ?>
          <div class="col-lg-6">

            <!-- price table -->
            <div class="trm-price<?php if ( $item['badge'] == 'yes' ) : ?> trm-popular<?php endif; ?> trm-scroll-animation" data-scroll data-scroll-offset="40">
              <?php if ( $item['name'] ) : ?>
              <!-- card header -->
              <div class="trm-price-header">
                <h6>
                	<span <?php echo $this->get_render_attribute_string( $item_name ); ?>>
						<?php echo wp_kses_post( $item['name'] ); ?>
					</span>
                </h6>
              </div>
              <!-- card header end -->
              <?php endif; ?>
              <?php if ( $item['price'] ) : ?>
              <!-- price -->
              <div class="trm-price-number">
              	<?php if ( $item['price_before'] ) : ?>
              	<sup>
              		<span <?php echo $this->get_render_attribute_string( $item_price_before ); ?>>
						<?php echo esc_html( $item['price_before'] ); ?>
					</span>
              	</sup>
              	<?php endif; ?>

              	<span <?php echo $this->get_render_attribute_string( $item_price ); ?>>
					<?php echo esc_html( $item['price'] ); ?>
				</span>

              	<?php if ( $item['price_after'] ) : ?>
              	<sup>
              		<span <?php echo $this->get_render_attribute_string( $item_price_after ); ?>>
						<?php echo esc_html( $item['price_after'] ); ?>
					</span>
              	</sup>
              	<?php endif; ?>
              </div>
              <!-- price end -->
              <?php endif; ?>
              <div class="trm-divider trm-mb-40 trm-mt-40"></div>
              <?php if ( $item['list'] ) : ?>
              <div <?php echo $this->get_render_attribute_string( $item_list ); ?>>
				<?php echo wp_kses_post( $item['list'] ); ?>
			  </div>
              <?php endif; ?>
              <?php if ( $item['button'] ) : ?>
              <a<?php if ( $item['link'] ) : if ( $item['link']['is_external'] ) : ?> target="_blank"<?php endif; ?><?php if ( $item['link']['nofollow'] ) : ?> rel="nofollow"<?php endif; ?> href="<?php echo esc_url( $item['link']['url'] ); ?>"<?php endif; ?> class="trm-btn">
              	<span <?php echo $this->get_render_attribute_string( $item_button ); ?>>
					<?php echo esc_html( $item['button'] ); ?>
				</span>
              	<i class="fas fa-arrow-right"></i>
              </a>
              <?php endif; ?>
            </div>
            <!-- price table -->

          </div>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <!-- price plans end -->

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

		<!-- price plans -->
        <div class="row">
          <# if ( settings.title ) { #>
          <div class="col-lg-12">
            <{{{ settings.title_tag }}} class="trm-mb-40 trm-title--h trm-title-with-divider">
            	<span {{{ view.getRenderAttributeString( 'title' ) }}}>
		          	{{{ settings.title }}}
		        </span>
            	<span data-number="{{{ settings.num }}}"></span>
            </{{{ settings.title_tag }}}>
          </div>
          <# } #>

          <# if ( settings.items ) { #>
          <# _.each( settings.items, function( item, index ) {

		    var item_name = view.getRepeaterSettingKey( 'name', 'items', index );
		    view.addInlineEditingAttributes( item_name, 'basic' );

		    var item_price = view.getRepeaterSettingKey( 'price', 'items', index );
		    view.addInlineEditingAttributes( item_price, 'none' );

		    var item_price_before = view.getRepeaterSettingKey( 'price_before', 'items', index );
		    view.addInlineEditingAttributes( item_price_before, 'none' );

		    var item_price_after = view.getRepeaterSettingKey( 'price_after', 'items', index );
		    view.addInlineEditingAttributes( item_price_after, 'none' );

		    var item_list = view.getRepeaterSettingKey( 'list', 'items', index );
		    view.addInlineEditingAttributes( item_list, 'advanced' );

		    var item_button = view.getRepeaterSettingKey( 'button', 'items', index );
		    view.addInlineEditingAttributes( item_button, 'none' );

		  #>
          <div class="col-lg-6">

            <!-- price table -->
            <div class="trm-price trm-popular trm-scroll-animation" data-scroll data-scroll-offset="40">
              <# if ( item.name ) { #>
              <!-- card header -->
              <div class="trm-price-header">
                <h6>
                	<span {{{ view.getRenderAttributeString( item_name ) }}}>
						{{{ item.name }}}
					</span>
                </h6>
              </div>
              <!-- card header end -->
              <# } #>
              <# if ( item.price ) { #>
              <!-- price -->
              <div class="trm-price-number">
              	<# if ( item.price_before ) { #>
              	<sup>
              		<span {{{ view.getRenderAttributeString( item_price_before ) }}}>
						{{{ item.price_before }}}
					</span>
              	</sup>
              	<# } #>

              	<span {{{ view.getRenderAttributeString( item_price ) }}}>
					{{{ item.price }}}
				</span>

              	<# if ( item.price_after ) { #>
              	<sup>
              		<span {{{ view.getRenderAttributeString( item_price_after ) }}}>
						{{{ item.price_after }}}
					</span>
              	</sup>
              	<# } #>
              </div>
              <!-- price end -->
              <# } #>
              <div class="trm-divider trm-mb-40 trm-mt-40"></div>
              <# if ( item.list ) { #>
              <div {{{ view.getRenderAttributeString( item_list ) }}}>
				{{{ item.list }}}
			  </div>
              <# } #>
              <# if ( item.button ) { #>
              <a<# if ( item.link ) { #><# if ( item.link.is_external ) { #> target="_blank"<# } #><# if ( item.link.nofollow ) { #> rel="nofollow"<# } #> href="{{{ item.link.url }}}"<# } #> class="trm-btn">
              	<span {{{ view.getRenderAttributeString( item_button ) }}}>
					{{{ item.button }}}
				</span>
              	<i class="fas fa-arrow-right"></i>
              </a>
              <# } #>
            </div>
            <!-- price table -->

          </div>
          <# }); #>
          <# } #>
        </div>
        <!-- price plans end -->

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Trueman_Pricing_Widget() );
