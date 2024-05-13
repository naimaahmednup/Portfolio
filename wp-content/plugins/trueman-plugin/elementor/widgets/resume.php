<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Trueman Resume Widget.
 *
 * @since 1.0
 */
class Trueman_Resume_Widget extends Widget_Base {

	public function get_name() {
		return 'trueman-resume';
	}

	public function get_title() {
		return esc_html__( 'Resume', 'trueman-plugin' );
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'name', [
				'label'       => esc_html__( 'Title', 'trueman-plugin' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter title', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Enter title', 'trueman-plugin' ),
			]
		);

		$repeater->add_control(
			'date', [
				'label'       => esc_html__( 'Date', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter date', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Enter date', 'trueman-plugin' ),
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
				'default'	=> esc_html__( 'Button', 'trueman-plugin' ),
			]
		);

		$repeater->add_control(
			'button_type', [
				'label'       => esc_html__( 'Button (Type)', 'trueman-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'link',
				'options' => [
					'link'  => __( 'Link', 'trueman-plugin' ),
					'image' => __( 'Image', 'trueman-plugin' ),
				],
			]
		);

		$repeater->add_control(
			'link', [
				'label'       => esc_html__( 'Button (Link)', 'trueman-plugin' ),
				'type' => Controls_Manager::URL,
				'show_external' => true,
				'condition' => [
					'button_type' => 'link'
				]
			]
		);

		$repeater->add_control(
			'image', [
				'label'       => esc_html__( 'Image', 'trueman-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'button_type' => 'image'
				]
			]
		);

		$this->add_control(
			'items',
			[
				'label' => esc_html__( 'Items', 'trueman-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ name }}}',
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

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'name', [
				'label'       => esc_html__( 'Title', 'trueman-plugin' ),
				'label_block' => true,
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter title', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Enter title', 'trueman-plugin' ),
			]
		);

		$repeater->add_control(
			'date', [
				'label'       => esc_html__( 'Date', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Enter date', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Enter date', 'trueman-plugin' ),
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
				'default'	=> esc_html__( 'Button', 'trueman-plugin' ),
			]
		);

		$repeater->add_control(
			'button_type', [
				'label'       => esc_html__( 'Button (Type)', 'trueman-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'link',
				'options' => [
					'link'  => __( 'Link', 'trueman-plugin' ),
					'image' => __( 'Image', 'trueman-plugin' ),
				],
			]
		);

		$repeater->add_control(
			'link', [
				'label'       => esc_html__( 'Button (Link)', 'trueman-plugin' ),
				'type' => Controls_Manager::URL,
				'show_external' => true,
				'condition' => [
					'button_type' => 'link'
				]
			]
		);

		$repeater->add_control(
			'image', [
				'label'       => esc_html__( 'Image', 'trueman-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'button_type' => 'image'
				]
			]
		);

		$this->add_control(
			'c2_items',
			[
				'label' => esc_html__( 'Items', 'trueman-plugin' ),
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
				'label'     => esc_html__( 'Title Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-timeline .trm-timeline-content .trm-card-header h6' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_name_typography',
				'label'     => esc_html__( 'Title Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-timeline .trm-timeline-content .trm-card-header h6',
			]
		);

		$this->add_control(
			'item_date_color',
			[
				'label'     => esc_html__( 'Date Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-timeline .trm-timeline-content .trm-card-header .trm-accent-color' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_date_typography',
				'label'     => esc_html__( 'Date Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-timeline .trm-timeline-content .trm-card-header .trm-accent-color',
			]
		);

		$this->add_control(
			'item_desc_color',
			[
				'label'     => esc_html__( 'Description Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-timeline .trm-timeline-content .trm-mb-20' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_desc_typography',
				'label'     => esc_html__( 'Description Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-timeline .trm-timeline-content .trm-mb-20',
			]
		);

		$this->add_control(
			'item_button_color',
			[
				'label'     => esc_html__( 'Button Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-timeline .trm-timeline-content .trm-label-color' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_button_typography',
				'label'     => esc_html__( 'Button Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-timeline .trm-timeline-content .trm-label-color',
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

		<!-- history -->
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
            <!-- timeline -->
            <div class="trm-timeline">
              <?php foreach ( $settings['items'] as $index => $item ) : $i = rand();
			  	$item_name = $this->get_repeater_setting_key( 'name', 'items', $index );
			  	$this->add_inline_editing_attributes( $item_name, 'none' );

			  	$item_date = $this->get_repeater_setting_key( 'date', 'items', $index );
			  	$this->add_inline_editing_attributes( $item_date, 'none' );

			  	$item_desc = $this->get_repeater_setting_key( 'desc', 'items', $index );
			  	$this->add_inline_editing_attributes( $item_desc, 'advanced' );

			  	$item_button = $this->get_repeater_setting_key( 'button_label', 'items', $index );
			  	$this->add_inline_editing_attributes( $item_button, 'none' );
			  ?>
              <div class="trm-timeline-item trm-scroll-animation" data-scroll data-scroll-offset="40">
                <div class="trm-timeline-mark-light"></div>
                <div class="trm-timeline-mark"></div>
                <div class="trm-a trm-timeline-content">
                  <div class="trm-card-header">
                    <div class="trm-left-side">
                      <?php if ( $item['name'] ) : ?>
                      <h6 class="trm-mb-15">
                      	<span <?php echo $this->get_render_attribute_string( $item_name ); ?>>
			        		<?php echo esc_html( $item['name'] ); ?>
			        	</span>
                      </h6>
                      <?php endif; ?>
                      <?php if ( $item['date'] ) : ?>
                      <div class="trm-text-sm trm-accent-color trm-mb-15">
                      	<i>
                      		<span <?php echo $this->get_render_attribute_string( $item_date ); ?>>
				        		<?php echo esc_html( $item['date'] ); ?>
				        	</span>
                      	</i>
                      </div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <?php if ( $item['desc'] ) : ?>
                  <div class="trm-mb-20">
                  	<div <?php echo $this->get_render_attribute_string( $item_desc ); ?>>
		        		<?php echo wp_kses_post( $item['desc'] ); ?>
		        	</div>
                  </div>
                  <?php endif; ?>
                  <?php if ( $item['button_label'] ) : ?>
	              <?php if ( $item['button_type'] == 'image' ) : ?>
	              <a data-elementor-lightbox-slideshow="reviews" data-no-swup href="<?php echo esc_url( $item['image']['url'] ); ?>" class="trm-label trm-label-color">
	              <?php endif; ?>
	              <?php if ( $item['button_type'] == 'link' ) : ?>
	              <a<?php if ( $item['link'] ) : if ( $item['link']['is_external'] ) : ?> target="_blank"<?php endif; ?><?php if ( $item['link']['nofollow'] ) : ?> rel="nofollow"<?php endif; ?> href="<?php echo esc_url( $item['link']['url'] ); ?>"<?php endif; ?> class="trm-label trm-label-color">
	              <?php endif; ?>
	              	<span <?php echo $this->get_render_attribute_string( $item_button ); ?>>
		        		<?php echo esc_html( $item['button_label'] ); ?>
		        	</span>
		        	<i class="fas fa-arrow-right"></i>
	              </a>
	              <?php endif; ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <!-- timeline end -->
            <?php endif; ?>
          </div>
          <?php if ( $settings['layout_count'] == '2' ) : ?>
          <div class="col-12<?php if ( $settings['layout_col'] == '2' ) : ?> col-lg-6<?php endif; ?>">
            <?php if ( $settings['c2_items'] ) : ?>
            <div class="trm-timeline">
              <?php foreach ( $settings['c2_items'] as $index => $item ) :

			    $item_name = $this->get_repeater_setting_key( 'name', 'c2_items', $index );
			  	$this->add_inline_editing_attributes( $item_name, 'none' );

			  	$item_date = $this->get_repeater_setting_key( 'date', 'c2_items', $index );
			  	$this->add_inline_editing_attributes( $item_date, 'none' );

			  	$item_desc = $this->get_repeater_setting_key( 'desc', 'c2_items', $index );
			  	$this->add_inline_editing_attributes( $item_desc, 'advanced' );

			  	$item_button = $this->get_repeater_setting_key( 'button_label', 'c2_items', $index );
			  	$this->add_inline_editing_attributes( $item_button, 'none' );

			  ?>
              <div class="trm-timeline-item trm-scroll-animation" data-scroll data-scroll-offset="40">
                <div class="trm-timeline-mark-light"></div>
                <div class="trm-timeline-mark"></div>
                <div class="trm-a trm-timeline-content">
                  <div class="trm-card-header">
                    <div class="trm-left-side">
                      <?php if ( $item['name'] ) : ?>
                      <h6 class="trm-mb-15">
                      	<span <?php echo $this->get_render_attribute_string( $item_name ); ?>>
			        		<?php echo esc_html( $item['name'] ); ?>
			        	</span>
                      </h6>
                      <?php endif; ?>
                      <?php if ( $item['date'] ) : ?>
                      <div class="trm-text-sm trm-accent-color trm-mb-15">
                      	<i>
                      		<span <?php echo $this->get_render_attribute_string( $item_date ); ?>>
				        		<?php echo esc_html( $item['date'] ); ?>
				        	</span>
                      	</i>
                      </div>
                      <?php endif; ?>
                    </div>
                  </div>
                  <?php if ( $item['desc'] ) : ?>
                  <div class="trm-mb-20">
                  	<div <?php echo $this->get_render_attribute_string( $item_desc ); ?>>
		        		<?php echo wp_kses_post( $item['desc'] ); ?>
		        	</div>
                  </div>
                  <?php endif; ?>
                  <?php if ( $item['button_label'] ) : ?>
	              <?php if ( $item['button_type'] == 'image' ) : ?>
	              <a data-elementor-lightbox-slideshow="reviews" data-no-swup href="<?php echo esc_url( $item['image']['url'] ); ?>" class="trm-label trm-label-color">
	              <?php endif; ?>
	              <?php if ( $item['button_type'] == 'link' ) : ?>
	              <a<?php if ( $item['link'] ) : if ( $item['link']['is_external'] ) : ?> target="_blank"<?php endif; ?><?php if ( $item['link']['nofollow'] ) : ?> rel="nofollow"<?php endif; ?> href="<?php echo esc_url( $item['link']['url'] ); ?>"<?php endif; ?> class="trm-label trm-label-color">
	              <?php endif; ?>
	              	<span <?php echo $this->get_render_attribute_string( $item_button ); ?>>
		        		<?php echo esc_html( $item['button_label'] ); ?>
		        	</span>
		        	<i class="fas fa-arrow-right"></i>
	              </a>
	              <?php endif; ?>
                </div>
              </div>
              <?php endforeach; ?>

            </div>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>
        <!-- history end -->

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

		<!-- history -->
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
            <!-- timeline -->
            <div class="trm-timeline">
			  <# _.each( settings.items, function( item, index ) {

		    	var item_name = view.getRepeaterSettingKey( 'name', 'items', index );
		    	view.addInlineEditingAttributes( item_name, 'none' );

		    	var item_date = view.getRepeaterSettingKey( 'date', 'items', index );
		    	view.addInlineEditingAttributes( item_date, 'none' );

		    	var item_desc = view.getRepeaterSettingKey( 'desc', 'items', index );
		    	view.addInlineEditingAttributes( item_desc, 'advanced' );

		    	var item_button = view.getRepeaterSettingKey( 'button', 'items', index );
		    	view.addInlineEditingAttributes( item_button, 'advanced' );

		      #>
              <div class="trm-timeline-item trm-scroll-animation" data-scroll data-scroll-offset="40">
                <div class="trm-timeline-mark-light"></div>
                <div class="trm-timeline-mark"></div>
                <div class="trm-a trm-timeline-content">
                  <div class="trm-card-header">
                    <div class="trm-left-side">
                      <# if ( item.name ) { #>
                      <h6 class="trm-mb-15">
                      	<span {{{ view.getRenderAttributeString( item_name ) }}}>
							{{{ item.name }}}
						</span>
                      </h6>
                      <# } #>
                      <# if ( item.date ) { #>
                      <div class="trm-text-sm trm-accent-color trm-mb-15">
                      	<i>
                      		<span {{{ view.getRenderAttributeString( item_date ) }}}>
								{{{ item.date }}}
							</span>
                      	</i>
                      </div>
                      <# } #>
                    </div>
                  </div>
                  <# if ( item.desc ) { #>
                  <div class="trm-mb-20">
                  	<div {{{ view.getRenderAttributeString( item_desc ) }}}>
						{{{ item.desc }}}
					</div>
                  </div>
                  <# } #>
                  <# if ( item.button_label ) { #>
	              <# if ( item.button_type == 'image' ) { #>
	              <a data-elementor-lightbox-slideshow="reviews" data-no-swup href="{{{ item.image.url }}}" class="trm-label trm-label-color">
	              <# } #>
	              <# if ( item.button_type == 'link' ) { #>
	              <a<# if ( item.link ) { if ( item.link.is_external ) { #> target="_blank"<# } #><# if ( item.link.nofollow ) { #> rel="nofollow"<# } #> href="{{{ item.link.url }}}"<# } #> class="trm-label trm-label-color">
	              <# } #>
	              	<span {{{ view.getRenderAttributeString( item_button ) }}}>
						{{{ item.button_label }}}
					</span>
		        	<i class="fas fa-arrow-right"></i>
	              </a>
	              <# } #>
                </div>
              </div>
              <# }); #>
            </div>
            <!-- timeline end -->
            <# } #>
          </div>
          <# if ( settings.layout_count == '2' ) { #>
          <div class="col-12<# if ( settings.layout_col == '2' ) { #> col-lg-6<# } #>">
            <# if ( settings.c2_items ) { #>
            <div class="trm-timeline">
			  <# _.each( settings.c2_items, function( item, index ) {

		    	var item_name = view.getRepeaterSettingKey( 'name', 'c2_items', index );
		    	view.addInlineEditingAttributes( item_name, 'none' );

		    	var item_date = view.getRepeaterSettingKey( 'date', 'c2_items', index );
		    	view.addInlineEditingAttributes( item_date, 'none' );

		    	var item_desc = view.getRepeaterSettingKey( 'desc', 'c2_items', index );
		    	view.addInlineEditingAttributes( item_desc, 'advanced' );

		    	var item_button = view.getRepeaterSettingKey( 'button', 'c2_items', index );
		    	view.addInlineEditingAttributes( item_button, 'advanced' );

		      #>
              <div class="trm-timeline-item trm-scroll-animation" data-scroll data-scroll-offset="40">
                <div class="trm-timeline-mark-light"></div>
                <div class="trm-timeline-mark"></div>
                <div class="trm-a trm-timeline-content">
                  <div class="trm-card-header">
                    <div class="trm-left-side">
                      <# if ( item.name ) { #>
                      <h6 class="trm-mb-15">
                      	<span {{{ view.getRenderAttributeString( item_name ) }}}>
							{{{ item.name }}}
						</span>
                      </h6>
                      <# } #>
                      <# if ( item.date ) { #>
                      <div class="trm-text-sm trm-accent-color trm-mb-15">
                      	<i>
                      		<span {{{ view.getRenderAttributeString( item_date ) }}}>
								{{{ item.date }}}
							</span>
                      	</i>
                      </div>
                      <# } #>
                    </div>
                  </div>
                  <# if ( item.desc ) { #>
                  <div class="trm-mb-20">
                  	<div {{{ view.getRenderAttributeString( item_desc ) }}}>
						{{{ item.desc }}}
					</div>
                  </div>
                  <# } #>
                  <# if ( item.button_label ) { #>
	              <# if ( item.button_type == 'image' ) { #>
	              <a data-elementor-lightbox-slideshow="reviews" data-no-swup href="{{{ item.image.url }}}" class="trm-label trm-label-color">
	              <# } #>
	              <# if ( item.button_type == 'link' ) { #>
	              <a<# if ( item.link ) { if ( item.link.is_external ) { #> target="_blank"<# } #><# if ( item.link.nofollow ) { #> rel="nofollow"<# } #> href="{{{ item.link.url }}}"<# } #> class="trm-label trm-label-color">
	              <# } #>
	              	<span {{{ view.getRenderAttributeString( item_button ) }}}>
						{{{ item.button_label }}}
					</span>
		        	<i class="fas fa-arrow-right"></i>
	              </a>
	              <# } #>
                </div>
              </div>
              <# }); #>

            </div>
            <# } #>
          </div>
          <# } #>
        </div>
        <!-- history end -->

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Trueman_Resume_Widget() );
