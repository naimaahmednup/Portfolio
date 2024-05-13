<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Trueman Services Widget.
 *
 * @since 1.0
 */
class Trueman_Services_Widget extends Widget_Base {

	public function get_name() {
		return 'trueman-services';
	}

	public function get_title() {
		return esc_html__( 'Services', 'trueman-plugin' );
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
			'icon', [
				'label'       => esc_html__( 'Icon (Light)', 'trueman-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'icon2', [
				'label'       => esc_html__( 'Icon (Dark)', 'trueman-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'name', [
				'label'       => esc_html__( 'Title', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter title', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Enter title', 'trueman-plugin' ),
			]
		);

		$repeater->add_control(
			'desc', [
				'label'       => esc_html__( 'Description', 'trueman-plugin' ),
				'type'        => Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Enter description', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Enter description', 'trueman-plugin' ),
			]
		);

		$repeater->add_control(
			'button_label', [
				'label'       => esc_html__( 'Button (Label)', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Button Label', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Order now', 'trueman-plugin' ),
			]
		);

		$repeater->add_control(
			'link', [
				'label'       => esc_html__( 'Button (Link)', 'trueman-plugin' ),
				'type' => Controls_Manager::URL,
				'show_external' => true,
			]
		);

		$this->add_control(
			'items',
			[
				'label' => esc_html__( 'Services Items', 'trueman-plugin' ),
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
			'item_title_color',
			[
				'label'     => esc_html__( 'Title Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-service-icon-box h6' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_title_typography',
				'label'     => esc_html__( 'Title Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-service-icon-box h6',
			]
		);

		$this->add_control(
			'item_desc_color',
			[
				'label'     => esc_html__( 'Description Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-service-icon-box div.trm-mb-20' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_desc_typography',
				'label'     => esc_html__( 'Description Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-service-icon-box div.trm-mb-20',
			]
		);

		$this->add_control(
			'item_button_color',
			[
				'label'     => esc_html__( 'Button Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-service-icon-box .trm-label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_button_typography',
				'label'     => esc_html__( 'Button Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-service-icon-box .trm-label',
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

		<!-- services -->
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

		  $item_desc = $this->get_repeater_setting_key( 'desc', 'items', $index );
		  $this->add_inline_editing_attributes( $item_desc, 'advanced' );

		  $item_button = $this->get_repeater_setting_key( 'button_label', 'items', $index );
		  $this->add_inline_editing_attributes( $item_button, 'none' );
		  ?>
          <div class="col-lg-6">

            <!-- service -->
            <div class="trm-service-icon-box trm-scroll-animation" data-scroll data-scroll-offset="40">
              <div class="trm-service-content">
                <?php if ( $item['icon'] || $item['icon2'] ) :  ?>
                <div class="trm-icon">
                  <?php if ( $item['icon'] ) : $image1 = wp_get_attachment_image_url( $item['icon']['id'], 'trueman_256x256' ); ?>
                  <img src="<?php echo esc_url( $image1 ); ?>" alt="icon" class="trm-black-icon">
                  <?php endif; ?>
                  <?php if ( $item['icon2'] ) : $image2 = wp_get_attachment_image_url( $item['icon2']['id'], 'trueman_256x256' ); ?>
                  <img src="<?php echo esc_url( $image2 ); ?>" alt="icon" class="trm-white-icon">
                  <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php if ( $item['name'] ) : ?>
                <h6 class="trm-mb-20">
                	<span <?php echo $this->get_render_attribute_string( $item_name ); ?>>
		        		<?php echo wp_kses_post( $item['name'] ); ?>
		        	</span>
                </h6>
                <?php endif; ?>
                <?php if ( $item['desc'] ) : ?>
                <div class="trm-mb-20">
                	<div <?php echo $this->get_render_attribute_string( $item_desc ); ?>>
		        		<?php echo wp_kses_post( $item['desc'] ); ?>
		        	</div>
                </div>
                <?php endif; ?>
                <?php if ( $item['button_label'] ) : ?>
                <a<?php if ( $item['link'] ) : if ( $item['link']['is_external'] ) : ?> target="_blank"<?php endif; ?><?php if ( $item['link']['nofollow'] ) : ?> rel="nofollow"<?php endif; ?> href="<?php echo esc_url( $item['link']['url'] ); ?>"<?php endif; ?> class="trm-label trm-label-color">
                	<span <?php echo $this->get_render_attribute_string( $item_button ); ?>>
		        		<?php echo wp_kses_post( $item['button_label'] ); ?>
		        	</span>
                	<i class="fas fa-arrow-right"></i>
                </a>
                <?php endif; ?>
              </div>
            </div>
            <!-- service end -->

          </div>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <!-- services end -->

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

		<!-- services -->
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

			var item_desc = view.getRepeaterSettingKey( 'desc', 'items', index );
			view.addInlineEditingAttributes( item_desc, 'advanced' );

			var item_button = view.getRepeaterSettingKey( 'button_label', 'items', index );
			view.addInlineEditingAttributes( item_button, 'none' );

	      #>
          <div class="col-lg-6">

            <!-- service -->
            <div class="trm-service-icon-box trm-scroll-animation" data-scroll data-scroll-offset="40">
              <div class="trm-service-content">
                <# if ( item.icon || item.icon2 ) { #>
                <div class="trm-icon">
                  <# if ( item.icon ) { #>
                  <img src="{{{ item.icon.url }}}" alt="icon" class="trm-black-icon">
                  <# } #>
                  <# if ( item.icon2 ) { #>
                  <img src="{{{ item.icon2.url }}}" alt="icon" class="trm-white-icon">
                  <# } #>
                </div>
                <# } #>
                <# if ( item.name ) { #>
                <h6 class="trm-mb-20">
                	<span {{{ view.getRenderAttributeString( item_name ) }}}>
						{{{ item.name }}}
					</span>
                </h6>
                <# } #>
                <# if ( item.desc ) { #>
                <div class="trm-mb-20">
                	<div {{{ view.getRenderAttributeString( item_desc ) }}}>
						{{{ item.desc }}}
					</div>
                </div>
                <# } #>
                <# if ( item.button_label ) { #>
                <a<# if ( item.link ) { if ( item.link.is_external ) { #> target="_blank"<# } #><# if ( item.link.nofollow ) { #> rel="nofollow"<# } #> href="{{{ item.link.url }}}"<# } #> class="trm-label trm-label-color">
                	<span {{{ view.getRenderAttributeString( item_button ) }}}>
						{{{ item.button_label }}}
					</span>
                	<i class="fas fa-arrow-right"></i>
                </a>
                <# } #>
              </div>
            </div>
            <!-- service end -->

          </div>
          <# }); #>
          <# } #>
        </div>
        <!-- services end -->

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Trueman_Services_Widget() );
