<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Trueman Contact Information Widget.
 *
 * @since 1.0
 */
class Trueman_Contact_Info_Widget extends Widget_Base {

	public function get_name() {
		return 'trueman-contact-info';
	}

	public function get_title() {
		return esc_html__( 'Contact Information', 'trueman-plugin' );
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
			'type', [
				'label'       => esc_html__( 'Description Type', 'trueman-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'text',
				'options' => [
					'text'  => __( 'Text', 'trueman-plugin' ),
					'list' => __( 'List', 'trueman-plugin' ),
				],
			]
		);

		$repeater->add_control(
			'list1', [
				'label'       => esc_html__( 'List #1', 'trueman-plugin' ),
				'type'        => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'trueman-plugin' ),
				'label_off' => __( 'Hide', 'trueman-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'type' => 'list',
				],
			]
		);

		$repeater->add_control(
			'list1_label', [
				'label'       => esc_html__( 'Label', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter label', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Label', 'trueman-plugin' ),
				'condition' => [
					'list1' => 'yes',
					'type' => 'list',
				],
			]
		);

		$repeater->add_control(
			'list1_value', [
				'label'       => esc_html__( 'Value', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter value', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Value', 'trueman-plugin' ),
				'condition' => [
					'list1' => 'yes',
					'type' => 'list',
				],
			]
		);

		$repeater->add_control(
			'list1_link', [
				'label'       => esc_html__( 'Link (URL)', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter URL', 'trueman-plugin' ),
				'default'	=> '',
				'condition' => [
					'list1' => 'yes',
					'type' => 'list',
				],
			]
		);

		$repeater->add_control(
			'list2', [
				'label'       => esc_html__( 'List #1', 'trueman-plugin' ),
				'type'        => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'trueman-plugin' ),
				'label_off' => __( 'Hide', 'trueman-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'type' => 'list',
				],
			]
		);

		$repeater->add_control(
			'list2_label', [
				'label'       => esc_html__( 'Label', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter label', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Label', 'trueman-plugin' ),
				'condition' => [
					'list2' => 'yes',
					'type' => 'list',
				],
			]
		);

		$repeater->add_control(
			'list2_value', [
				'label'       => esc_html__( 'Value', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter value', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Value', 'trueman-plugin' ),
				'condition' => [
					'list2' => 'yes',
					'type' => 'list',
				],
			]
		);

		$repeater->add_control(
			'list2_link', [
				'label'       => esc_html__( 'Link (URL)', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter URL', 'trueman-plugin' ),
				'default'	=> '',
				'condition' => [
					'list2' => 'yes',
					'type' => 'list',
				],
			]
		);

		$repeater->add_control(
			'list3', [
				'label'       => esc_html__( 'List #1', 'trueman-plugin' ),
				'type'        => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'trueman-plugin' ),
				'label_off' => __( 'Hide', 'trueman-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'type' => 'list',
				],
			]
		);

		$repeater->add_control(
			'list3_label', [
				'label'       => esc_html__( 'Label', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter label', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Label', 'trueman-plugin' ),
				'condition' => [
					'list3' => 'yes',
					'type' => 'list',
				],
			]
		);

		$repeater->add_control(
			'list3_value', [
				'label'       => esc_html__( 'Value', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter value', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Value', 'trueman-plugin' ),
				'condition' => [
					'list3' => 'yes',
					'type' => 'list',
				],
			]
		);

		$repeater->add_control(
			'list3_link', [
				'label'       => esc_html__( 'Link (URL)', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter URL', 'trueman-plugin' ),
				'default'	=> '',
				'condition' => [
					'list3' => 'yes',
					'type' => 'list',
				],
			]
		);

		$repeater->add_control(
			'list4', [
				'label'       => esc_html__( 'List #1', 'trueman-plugin' ),
				'type'        => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'trueman-plugin' ),
				'label_off' => __( 'Hide', 'trueman-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					'type' => 'list',
				],
			]
		);

		$repeater->add_control(
			'list4_label', [
				'label'       => esc_html__( 'Label', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter label', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Label', 'trueman-plugin' ),
				'condition' => [
					'list4' => 'yes',
					'type' => 'list',
				],
			]
		);

		$repeater->add_control(
			'list4_value', [
				'label'       => esc_html__( 'Value', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter value', 'trueman-plugin' ),
				'default'	=> esc_html__( 'Value', 'trueman-plugin' ),
				'condition' => [
					'list4' => 'yes',
					'type' => 'list',
				],
			]
		);

		$repeater->add_control(
			'list4_link', [
				'label'       => esc_html__( 'Link (URL)', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter URL', 'trueman-plugin' ),
				'default'	=> '',
				'condition' => [
					'list4' => 'yes',
					'type' => 'list',
				],
			]
		);

		$repeater->add_control(
			'text', [
				'label'       => esc_html__( 'Text', 'trueman-plugin' ),
				'type'        => Controls_Manager::WYSIWYG,
				'placeholder' => esc_html__( 'Enter text', 'trueman-plugin' ),
				'default'	=> '',
				'condition' => [
					'type' => 'text'
				],
			]
		);

		$this->add_control(
			'items',
			[
				'label' => esc_html__( 'Items', 'trueman-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => $repeater->get_controls(),
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
			'item_list_label_color',
			[
				'label'     => esc_html__( 'List Label Color', 'trueman-plugin' ),
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
				'name'     => 'item_list_label_typography',
				'label'     => esc_html__( 'List Label Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-service-icon-box .trm-label',
			]
		);

		$this->add_control(
			'item_list_value_color',
			[
				'label'     => esc_html__( 'List Value Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-service-icon-box .trm-text-sm' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_list_value_typography',
				'label'     => esc_html__( 'List Value Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-service-icon-box .trm-text-sm',
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

		<!-- contact -->
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

		  $item_text = $this->get_repeater_setting_key( 'text', 'items', $index );
		  $this->add_inline_editing_attributes( $item_text, 'advanced' );

		  $item_list1_label = $this->get_repeater_setting_key( 'list1_label', 'items', $index );
		  $this->add_inline_editing_attributes( $item_list1_label, 'none' );

		  $item_list1_value = $this->get_repeater_setting_key( 'list1_value', 'items', $index );
		  $this->add_inline_editing_attributes( $item_list1_value, 'none' );

		  $item_list2_label = $this->get_repeater_setting_key( 'list2_label', 'items', $index );
		  $this->add_inline_editing_attributes( $item_list2_label, 'none' );

		  $item_list2_value = $this->get_repeater_setting_key( 'list2_value', 'items', $index );
		  $this->add_inline_editing_attributes( $item_list2_value, 'none' );

		  $item_list3_label = $this->get_repeater_setting_key( 'list3_label', 'items', $index );
		  $this->add_inline_editing_attributes( $item_list3_label, 'none' );

		  $item_list3_value = $this->get_repeater_setting_key( 'list3_value', 'items', $index );
		  $this->add_inline_editing_attributes( $item_list3_value, 'none' );

		  $item_list4_label = $this->get_repeater_setting_key( 'list4_label', 'items', $index );
		  $this->add_inline_editing_attributes( $item_list4_label, 'none' );

		  $item_list4_value = $this->get_repeater_setting_key( 'list3_value', 'items', $index );
		  $this->add_inline_editing_attributes( $item_list4_value, 'none' );

		  ?>
          <div class="col-lg-6">

            <!-- contact card -->
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
                <?php if ( $item['type'] == 'list' ) : ?>
                <?php if ( $item['list1'] == 'yes' ) : ?>
                <div class="trm-mb-15">
                	<?php if ( $item['list1_label'] ) : ?>
                	<span class="trm-label">
                		<span <?php echo $this->get_render_attribute_string( $item_list1_label ); ?>>
			        		<?php echo wp_kses_post( $item['list1_label'] ); ?>
			        	</span>
                	</span>
                	<?php endif; ?>
                	<?php if ( $item['list1_value'] ) : ?>
                	<span class="trm-text-sm">
                		<?php if ( $item['list1_link'] ) : ?><a href="<?php echo esc_attr( $item['list1_link'] ); ?>" target="_blank"><?php endif; ?>
                		<span <?php echo $this->get_render_attribute_string( $item_list1_value ); ?>>
			        		<?php echo wp_kses_post( $item['list1_value'] ); ?>
			        	</span>
			        	<?php if ( $item['list1_link'] ) : ?></a><?php endif; ?>
                	</span>
                	<?php endif; ?>
                </div>
            	<?php endif; ?>
            	<?php if ( $item['list2'] == 'yes' ) : ?>
                <div class="trm-mb-15">
                	<?php if ( $item['list2_label'] ) : ?>
                	<span class="trm-label">
                		<span <?php echo $this->get_render_attribute_string( $item_list2_label ); ?>>
			        		<?php echo wp_kses_post( $item['list2_label'] ); ?>
			        	</span>
                	</span>
                	<?php endif; ?>
                	<?php if ( $item['list2_value'] ) : ?>
                	<span class="trm-text-sm">
                		<?php if ( $item['list2_link'] ) : ?><a href="<?php echo esc_attr( $item['list2_link'] ); ?>" target="_blank"><?php endif; ?>
                		<span <?php echo $this->get_render_attribute_string( $item_list2_value ); ?>>
			        		<?php echo wp_kses_post( $item['list2_value'] ); ?>
			        	</span>
			        	<?php if ( $item['list2_link'] ) : ?></a><?php endif; ?>
                	</span>
                	<?php endif; ?>
                </div>
            	<?php endif; ?>
            	<?php if ( $item['list3'] == 'yes' ) : ?>
                <div class="trm-mb-15">
                	<?php if ( $item['list3_label'] ) : ?>
                	<span class="trm-label">
                		<span <?php echo $this->get_render_attribute_string( $item_list3_label ); ?>>
			        		<?php echo wp_kses_post( $item['list3_label'] ); ?>
			        	</span>
                	</span>
                	<?php endif; ?>
                	<?php if ( $item['list3_value'] ) : ?>
                	<span class="trm-text-sm">
                		<?php if ( $item['list3_link'] ) : ?><a href="<?php echo esc_attr( $item['list3_link'] ); ?>" target="_blank"><?php endif; ?>
                		<span <?php echo $this->get_render_attribute_string( $item_list3_value ); ?>>
			        		<?php echo wp_kses_post( $item['list3_value'] ); ?>
			        	</span>
			        	<?php if ( $item['list3_link'] ) : ?></a><?php endif; ?>
                	</span>
                	<?php endif; ?>
                </div>
            	<?php endif; ?>
            	<?php if ( $item['list4'] == 'yes' ) : ?>
                <div class="trm-mb-15">
                	<?php if ( $item['list4_label'] ) : ?>
                	<span class="trm-label">
                		<span <?php echo $this->get_render_attribute_string( $item_list4_label ); ?>>
			        		<?php echo wp_kses_post( $item['list4_label'] ); ?>
			        	</span>
                	</span>
                	<?php endif; ?>
                	<?php if ( $item['list4_value'] ) : ?>
                	<span class="trm-text-sm">
                		<?php if ( $item['list4_link'] ) : ?><a href="<?php echo esc_attr( $item['list4_link'] ); ?>" target="_blank"><?php endif; ?>
                		<span <?php echo $this->get_render_attribute_string( $item_list4_value ); ?>>
			        		<?php echo wp_kses_post( $item['list4_value'] ); ?>
			        	</span>
			        	<?php if ( $item['list4_link'] ) : ?></a><?php endif; ?>
                	</span>
                	<?php endif; ?>
                </div>
            	<?php endif; ?>

                <?php endif; ?>
                <?php if ( $item['type'] == 'text' && $item['text'] ) : ?>
                <div class="trm-mb-20">
                	<div <?php echo $this->get_render_attribute_string( $item_text ); ?>>
		        		<?php echo wp_kses_post( $item['text'] ); ?>
		        	</div>
                </div>
                <?php endif; ?>
              </div>
            </div>
            <!-- contact card end -->

          </div>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <!-- contact end -->

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

		<!-- contact -->
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

		  var item_text = view.getRepeaterSettingKey( 'text', 'items', index );
		  view.addInlineEditingAttributes( item_text, 'advanced' );

		  var item_list1_label = view.getRepeaterSettingKey( 'list1_label', 'items', index );
		  view.addInlineEditingAttributes( item_list1_label, 'none' );

		  var item_list1_value = view.getRepeaterSettingKey( 'list1_value', 'items', index );
		  view.addInlineEditingAttributes( item_list1_value, 'none' );

		  var item_list2_label = view.getRepeaterSettingKey( 'list2_label', 'items', index );
		  view.addInlineEditingAttributes( item_list2_label, 'none' );

		  var item_list2_value = view.getRepeaterSettingKey( 'list2_value', 'items', index );
		  view.addInlineEditingAttributes( item_list2_value, 'none' );

		  var item_list3_label = view.getRepeaterSettingKey( 'list3_label', 'items', index );
		  view.addInlineEditingAttributes( item_list3_label, 'none' );

		  var item_list3_value = view.getRepeaterSettingKey( 'list3_value', 'items', index );
		  view.addInlineEditingAttributes( item_list3_value, 'none' );

		  var item_list4_label = view.getRepeaterSettingKey( 'list4_label', 'items', index );
		  view.addInlineEditingAttributes( item_list4_label, 'none' );

		  var item_list4_value = view.getRepeaterSettingKey( 'list4_value', 'items', index );
		  view.addInlineEditingAttributes( item_list4_value, 'none' );

		  #>
          <div class="col-lg-6">

            <!-- contact card -->
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
                <# if ( item.type == 'list' ) { #>
                <# if ( item.list1 == 'yes' ) { #>
                <div class="trm-mb-15">
                	<# if ( item.list1_label ) { #>
                	<span class="trm-label">
			        	<span {{{ view.getRenderAttributeString( item_list1_label ) }}}>
							{{{ item.list1_label }}}
						</span>
                	</span>
                	<# } #>
                	<# if ( item.list1_value ) { #>
                	<span class="trm-text-sm">
                		<# if ( item.list1_link ) { #><a href="{{{ item.list1_link }}}" target="_blank"><# } #>
			        	<span {{{ view.getRenderAttributeString( item_list1_value ) }}}>
							{{{ item.list1_value }}}
						</span>
			        	<# if ( item.list1_link ) { #></a><# } #>
                	</span>
                	<# } #>
                </div>
            	<# } #>
            	<# if ( item.list2 == 'yes' ) { #>
                <div class="trm-mb-15">
                	<# if ( item.list2_label ) { #>
                	<span class="trm-label">
			        	<span {{{ view.getRenderAttributeString( item_list2_label ) }}}>
							{{{ item.list2_label }}}
						</span>
                	</span>
                	<# } #>
                	<# if ( item.list2_value ) { #>
                	<span class="trm-text-sm">
                		<# if ( item.list2_link ) { #><a href="{{{ item.list2_link }}}" target="_blank"><# } #>
                		<span {{{ view.getRenderAttributeString( item_list2_value ) }}}>
							{{{ item.list2_value }}}
						</span>
			        	<# if ( item.list2_link ) { #></a><# } #>
                	</span>
                	<# } #>
                </div>
            	<# } #>
            	<# if ( item.list3 == 'yes' ) { #>
                <div class="trm-mb-15">
                	<# if ( item.list3_label ) { #>
                	<span class="trm-label">
                		<span {{{ view.getRenderAttributeString( item_list3_label ) }}}>
							{{{ item.list3_label }}}
						</span>
                	</span>
                	<# } #>
                	<# if ( item.list3_value ) { #>
                	<span class="trm-text-sm">
                		<# if ( item.list3_link ) { #><a href="{{{ item.list3_link }}}" target="_blank"><# } #>
                		<span {{{ view.getRenderAttributeString( item_list3_value ) }}}>
							{{{ item.list3_value }}}
						</span>
			        	<# if ( item.list3_link ) { #></a><# } #>
                	</span>
                	<# } #>
                </div>
            	<# } #>
            	<# if ( item.list4 == 'yes' ) { #>
                <div class="trm-mb-15">
                	<# if ( item.list4_label ) { #>
                	<span class="trm-label">
                		<span {{{ view.getRenderAttributeString( item_list4_label ) }}}>
							{{{ item.list4_label }}}
						</span>
                	</span>
                	<# } #>
                	<# if ( item.list4_value ) { #>
                	<span class="trm-text-sm">
                		<# if ( item.list4_link ) { #><a href="{{{ item.list4_link }}}" target="_blank"><# } #>
                		<span {{{ view.getRenderAttributeString( item_list4_value ) }}}>
							{{{ item.list4_value }}}
						</span>
			        	<# if ( item.list4_link ) { #></a><# } #>
                	</span>
                	<# } #>
                </div>
            	<# } #>

                <# } #>
                <# if ( item.type == 'text' && item.text ) { #>
                <div class="trm-mb-20">
		        	<div {{{ view.getRenderAttributeString( item_text ) }}}>
						{{{ item.text }}}
					</div>
                </div>
                <# } #>
              </div>
            </div>
            <!-- contact card end -->

          </div>
          <# }); #>
          <# } #>
        </div>
        <!-- contact end -->

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Trueman_Contact_Info_Widget() );
