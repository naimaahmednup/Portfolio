<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Trueman Testimonials Widget.
 *
 * @since 1.0
 */
class Trueman_Testimonials_Widget extends Widget_Base {

	public function get_name() {
		return 'trueman-testimonials';
	}

	public function get_title() {
		return esc_html__( 'Testimonials', 'trueman-plugin' );
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
			'image', [
				'label' => esc_html__( 'Image', 'trueman-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'name', [
				'label'       => esc_html__( 'Name', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter name', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Enter name', 'trueman-plugin' ),
			]
		);

		$repeater->add_control(
			'subname', [
				'label'       => esc_html__( 'Subname', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter subname', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Enter subname', 'trueman-plugin' ),
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

		$this->add_control(
			'items',
			[
				'label' => esc_html__( 'Testimonials Items', 'trueman-plugin' ),
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
			'item_name_color',
			[
				'label'     => esc_html__( 'Name Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-testimonial-card h6' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_name_typography',
				'label'     => esc_html__( 'Name Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-testimonial-card h6',
			]
		);

		$this->add_control(
			'item_subname_color',
			[
				'label'     => esc_html__( 'Subname Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-testimonial-card .trm-accent-color' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_subname_typography',
				'label'     => esc_html__( 'Subname Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-testimonial-card .trm-accent-color',
			]
		);

		$this->add_control(
			'item_desc_color',
			[
				'label'     => esc_html__( 'Description Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-testimonial-card .trm-testimonial-text' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_desc_typography',
				'label'     => esc_html__( 'Description Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-testimonial-card .trm-testimonial-text',
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

		<!-- testimonials -->
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

          <div class="col-lg-12">
          	<?php if ( $settings['items'] ) : ?>
            <!-- testimonials slider -->
            <div class="swiper-container trm-testimonials-slider trm-scroll-animation" data-scroll data-scroll-offset="40">
              <div class="swiper-wrapper">
                <?php foreach ( $settings['items'] as $index => $item ) :
			    $item_name = $this->get_repeater_setting_key( 'name', 'items', $index );
			    $this->add_inline_editing_attributes( $item_name, 'none' );

			    $item_subname = $this->get_repeater_setting_key( 'subname', 'items', $index );
			    $this->add_inline_editing_attributes( $item_subname, 'none' );

			    $item_desc = $this->get_repeater_setting_key( 'desc', 'items', $index );
			    $this->add_inline_editing_attributes( $item_desc, 'advanced' );
			    ?>
                <div class="swiper-slide">

                  <div class="trm-testimonial-card" data-swiper-parallax data-swiper-parallax-scale=".8" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="800">
                    <div class="trm-testimonial-author">
                      <?php if ( $item['image'] ) : $image = wp_get_attachment_image_url( $item['image']['id'], 'trueman_140x140' ); ?>
                      <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>" />
                      <?php endif; ?>
                      <?php if ( $item['name'] ) : ?>
                      <h6 class="trm-mb-15">
                      	<span <?php echo $this->get_render_attribute_string( $item_name ); ?>>
							<?php echo wp_kses_post( $item['name'] ); ?>
						</span>
                      </h6>
                      <?php endif; ?>
                      <?php if ( $item['subname'] ) : ?>
                      <div class="trm-text-sm trm-accent-color">
                      	<i>
                      		<span <?php echo $this->get_render_attribute_string( $item_subname ); ?>>
								<?php echo wp_kses_post( $item['subname'] ); ?>
							</span>
                      	</i>
                      </div>
                      <?php endif; ?>
                    </div>
                    <?php if ( $item['desc'] ) : ?>
                    <div class="trm-testimonial-text">
                      <div <?php echo $this->get_render_attribute_string( $item_desc ); ?>>
						<?php echo wp_kses_post( $item['desc'] ); ?>
					  </div>
                    </div>
                    <?php endif; ?>
                  </div>

                </div>
                <?php endforeach; ?>
              </div>

              <div class="trm-slider-navigation">
                <div class="trm-testimonials-slider-prev trm-btn trm-btn-circle"><i class="fas fa-arrow-left"></i></div>
                <div class="trm-testimonials-slider-next trm-btn trm-btn-circle"><i class="fas fa-arrow-right"></i></div>
              </div>

            </div>
            <!-- testimonials slider end -->
            <?php endif; ?>
          </div>
        </div>

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

		<!-- testimonials -->
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

          <div class="col-lg-12">
          	<# if ( settings.items ) { #>
            <!-- testimonials slider -->
            <div class="swiper-container trm-testimonials-slider trm-scroll-animation" data-scroll data-scroll-offset="40">
              <div class="swiper-wrapper">
                <# _.each( settings.items, function( item, index ) {

			    var item_name = view.getRepeaterSettingKey( 'name', 'items', index );
			    view.addInlineEditingAttributes( item_name, 'none' );

			    var item_subname = view.getRepeaterSettingKey( 'subname', 'items', index );
			    view.addInlineEditingAttributes( item_subname, 'none' );

			    var item_desc = view.getRepeaterSettingKey( 'desc', 'items', index );
			    view.addInlineEditingAttributes( item_desc, 'advanced' );

			    #>
                <div class="swiper-slide">

                  <div class="trm-testimonial-card" data-swiper-parallax data-swiper-parallax-scale=".8" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="800">
                    <div class="trm-testimonial-author">
                      <# if ( item.image ) { #>
                      <img src="{{{ item.image.url }}}" alt="{{{ item.name }}}" />
                      <# } #>
                      <# if ( item.name ) { #>
                      <h6 class="trm-mb-15">
                      	<span {{{ view.getRenderAttributeString( item_name ) }}}>
							{{{ item.name }}}
						</span>
                      </h6>
                      <# } #>
                      <# if ( item.subname ) { #>
                      <div class="trm-text-sm trm-accent-color">
                      	<i>
                      		<span {{{ view.getRenderAttributeString( item_subname ) }}}>
								{{{ item.subname }}}
							</span>
                      	</i>
                      </div>
                      <# } #>
                    </div>
                    <# if ( item.desc ) { #>
                    <div class="trm-testimonial-text">
                      <div {{{ view.getRenderAttributeString( item_desc ) }}}>
						{{{ item.desc }}}
					  </div>
                    </div>
                    <# } #>
                  </div>

                </div>
                <# }); #>
              </div>

              <div class="trm-slider-navigation">
                <div class="trm-testimonials-slider-prev trm-btn trm-btn-circle"><i class="fas fa-arrow-left"></i></div>
                <div class="trm-testimonials-slider-next trm-btn trm-btn-circle"><i class="fas fa-arrow-right"></i></div>
              </div>

            </div>
            <!-- testimonials slider end -->
            <# } #>
          </div>
        </div>

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Trueman_Testimonials_Widget() );
