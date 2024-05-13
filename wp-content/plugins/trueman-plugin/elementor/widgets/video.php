<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Trueman Video Widget.
 *
 * @since 1.0
 */
class Trueman_Video_Widget extends Widget_Base {

	public function get_name() {
		return 'trueman-video';
	}

	public function get_title() {
		return esc_html__( 'Video', 'trueman-plugin' );
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
				'label' => esc_html__( 'Image', 'trueman-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'video',
			[
				'label'       => esc_html__( 'Video Link or YT Embed', 'trueman-plugin' ),
				'label_block' => true,
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter link to video file or youtube', 'trueman-plugin' ),
				'default'     => esc_html__( 'https://www.youtube.com/embed/S4L8T2kFFck', 'trueman-plugin' ),
			]
		);

		$this->add_control(
			'video_image',
			[
				'label'       => esc_html__( 'Video Image', 'trueman-plugin' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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
			'play_btn_bgcolor',
			[
				'label'     => esc_html__( 'Play Button BG Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-video .trm-play-button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'play_btn_color',
			[
				'label'     => esc_html__( 'Play Button Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-video .trm-play-button' => 'color: {{VALUE}};',
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

		<!-- video resume -->
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
          <?php if ( $settings['video'] ) : ?>
          <div class="col-lg-12">
            <!-- video -->
            <div class="trm-video trm-scroll-animation" data-scroll data-scroll-offset="40">
              <div class="trm-video-content trm-overlay">
                <?php if ( $settings['video_image'] ) : $image = wp_get_attachment_image_url( $settings['video_image']['id'], 'trueman_1920xAuto' ); ?>
                <img src="<?php echo esc_url( $image ); ?>" alt="video-cover">
                <?php endif; ?>
                <div class="trm-button-puls"></div>
                <a data-magnific-video href="<?php echo esc_url( $settings['video'] ); ?>" class="trm-play-button">
                	<i class="fas fa-play"></i>
                </a>
              </div>
            </div>
            <!-- video end -->
          </div>
          <?php endif; ?>
        </div>
        <!-- video resume end -->

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

		<!-- video resume -->
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
          <# if ( settings.video ) { #>
          <div class="col-lg-12">
            <!-- video -->
            <div class="trm-video trm-scroll-animation" data-scroll data-scroll-offset="40">
              <div class="trm-video-content trm-overlay">
                <# if ( settings.video_image ) { #>
                <img src="{{{ settings.video_image.url }}}" alt="video-cover">
                <# } #>
                <div class="trm-button-puls"></div>
                <a data-magnific-video href="{{{ settings.video }}}" class="trm-play-button">
                	<i class="fas fa-play"></i>
                </a>
              </div>
            </div>
            <!-- video end -->
          </div>
          <# } #>
        </div>
        <!-- video resume end -->

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Trueman_Video_Widget() );
