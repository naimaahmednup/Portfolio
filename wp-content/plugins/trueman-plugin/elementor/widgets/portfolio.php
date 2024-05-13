<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Trueman Portfolio Widget.
 *
 * @since 1.0
 */
class Trueman_Portfolio_Widget extends Widget_Base {

	public function get_name() {
		return 'trueman-portfolio';
	}

	public function get_title() {
		return esc_html__( 'Portfolio', 'trueman-plugin' );
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
			'filters_tab',
			[
				'label' => esc_html__( 'Filters', 'trueman-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'filters_note',
			[
				'type' => \Elementor\Controls_Manager::RAW_HTML,
				'raw' => esc_html__( 'Filters show only with pagination "Button" or "No"', 'trueman-plugin' ),
				'content_classes' => 'elementor-descriptor',
			]
		);

		$this->add_control(
			'filters',
			[
				'label' => esc_html__( 'Show Filters', 'trueman-plugin' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'trueman-plugin' ),
				'label_off' => __( 'Hide', 'trueman-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
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

		$this->add_control(
			'source',
			[
				'label'       => esc_html__( 'Source', 'trueman-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'all',
				'options' => [
					'all'  => __( 'All', 'trueman-plugin' ),
					'categories' => __( 'Categories', 'trueman-plugin' ),
				],
			]
		);

		$this->add_control(
			'source_categories',
			[
				'label'       => esc_html__( 'Source', 'trueman-plugin' ),
				'type'        => Controls_Manager::SELECT2,
				'label_block' => true,
				'multiple' => true,
				'options' => $this->get_portfolio_categories(),
				'condition' => [
		            'source' => 'categories'
		        ],
			]
		);

		$this->add_control(
			'limit',
			[
				'label'       => esc_html__( 'Number of Items', 'trueman-plugin' ),
				'type'        => Controls_Manager::NUMBER,
				'placeholder' => 8,
				'default'     => 8,
			]
		);

		$this->add_control(
			'sort',
			[
				'label'       => esc_html__( 'Sorting By', 'trueman-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'menu_order',
				'options' => [
					'date'  => __( 'Date', 'trueman-plugin' ),
					'title' => __( 'Title', 'trueman-plugin' ),
					'rand' => __( 'Random', 'trueman-plugin' ),
					'menu_order' => __( 'Order', 'trueman-plugin' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label'       => esc_html__( 'Order', 'trueman-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'asc',
				'options' => [
					'asc'  => __( 'ASC', 'trueman-plugin' ),
					'desc' => __( 'DESC', 'trueman-plugin' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'pagination_tab',
			[
				'label' => esc_html__( 'Pagination', 'trueman-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'pagination',
			[
				'label'       => esc_html__( 'Pagination', 'trueman-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'no',
				'options' => [
					'no'  => __( 'No', 'trueman-plugin' ),
					'pages' => __( 'Pages', 'trueman-plugin' ),
					'button' => __( 'Button', 'trueman-plugin' ),
				],
			]
		);

		$this->add_control(
			'more_btn_txt',
			[
				'label'       => esc_html__( 'Button (title)', 'trueman-plugin' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter button', 'trueman-plugin' ),
				'default'     => esc_html__( 'All Posts', 'trueman-plugin' ),
				'condition' => [
            'pagination' => 'button'
        ],
			]
		);

		$this->add_control(
			'more_btn_link',
			[
				'label'       => esc_html__( 'Button (link)', 'trueman-plugin' ),
				'type'        => Controls_Manager::URL,
				'show_external' => true,
				'condition' => [
            'pagination' => 'button'
        ],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'settings_tab',
			[
				'label' => esc_html__( 'Settings', 'trueman-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'layout',
			[
				'label'       => esc_html__( 'Columns', 'trueman-plugin' ),
				'type'        => Controls_Manager::SELECT,
				'default' => 'column-2',
				'options' => [
          'column-1'  => __( '1 Columns', 'trueman-plugin' ),
          'column-2'  => __( '2 Columns', 'trueman-plugin' ),
					'column-3' => __( '3 Columns', 'trueman-plugin' ),
				],
			]
		);

		$this->add_control(
			'masonry',
			[
				'label' => esc_html__( 'Masonry Grid', 'trueman-plugin' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Enable', 'trueman-plugin' ),
				'label_off' => __( 'Disable', 'trueman-plugin' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'show_item_details',
			[
				'label' => esc_html__( 'Show Item Details?', 'trueman-plugin' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'trueman-plugin' ),
				'label_off' => __( 'Hide', 'trueman-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_item_link',
			[
				'label' => esc_html__( 'Show Item Link?', 'trueman-plugin' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'trueman-plugin' ),
				'label_off' => __( 'Hide', 'trueman-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'masonry_sizes_tab',
			[
				'label' => esc_html__( 'Masonry Sizes', 'trueman-plugin' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'index', [
				'label' => esc_html__( 'Index', 'trueman-plugin' ),
				'type'  => Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'sizes',
			[
				'label' => esc_html__( 'Large Item Index', 'trueman-plugin' ),
				'type' => Controls_Manager::REPEATER,
				'prevent_empty' => false,
				'fields' => $repeater->get_controls(),
				'title_field' => '{{{ index }}}',
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
			'filters_styling',
			[
				'label'     => esc_html__( 'Filters', 'trueman-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'filters_color',
			[
				'label'     => esc_html__( 'Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-filter a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'filters_hover_color',
			[
				'label'     => esc_html__( 'Hover Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-filter a.trm-current, {{WRAPPER}} .trm-filter a:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'filters_typography',
				'selector' => '{{WRAPPER}} .trm-filter a',
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
					'{{WRAPPER}} .trm-portfolio-item .trm-item-description h6' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'item_title_typography',
				'label'     => esc_html__( 'Title Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-portfolio-item .trm-item-description h6',
			]
		);

		$this->add_control(
			'item_btn_color',
			[
				'label'     => esc_html__( 'Button Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-portfolio-item .trm-item-description .trm-zoom-icon' => 'color: {{VALUE}};',
				],
			]
		);

    $this->add_control(
			'item_btn_bgcolor',
			[
				'label'     => esc_html__( 'Button BG Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-portfolio-item .trm-item-description .trm-zoom-icon' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'pagination_styling',
			[
				'label'     => esc_html__( 'Pagination & More Button', 'trueman-plugin' ),
				'tab'       => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'pagination_color',
			[
				'label'     => esc_html__( 'Pagination Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-pagination a, {{WRAPPER}} .trm-pagination span' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'pagination_typography',
        'label'     => esc_html__( 'Pagination Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-pagination',
			]
		);

    $this->add_control(
			'more_color',
			[
				'label'     => esc_html__( 'More Button Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-bts .trm-btn' => 'color: {{VALUE}};',
				],
			]
		);

    $this->add_control(
			'more_bgcolor',
			[
				'label'     => esc_html__( 'More Button BG Color', 'trueman-plugin' ),
				'type'      => Controls_Manager::COLOR,
				'default'	=> '',
				'selectors' => [
					'{{WRAPPER}} .trm-bts .trm-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

    $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'more_typography',
        'label'     => esc_html__( 'More Button Typography', 'trueman-plugin' ),
				'selector' => '{{WRAPPER}} .trm-bts .trm-btn',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render Categories List.
	 *
	 * @since 1.0
	 */
	protected function get_portfolio_categories() {
		$categories = [];

		$args = array(
			'type'			=> 'post',
			'child_of'		=> 0,
			'parent'		=> '',
			'orderby'		=> 'name',
			'order'			=> 'DESC',
			'hide_empty'	=> 1,
			'hierarchical'	=> 1,
			'taxonomy'		=> 'portfolio_categories',
			'pad_counts'	=> false
		);

		$portfolio_categories = get_categories( $args );

		foreach ( $portfolio_categories as $category ) {
			$categories[$category->term_id] = $category->name;
		}

		return $categories;
	}

	/**
	 * Render widget output on the frontend.
	 *
	 * @since 1.0
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$this->add_inline_editing_attributes( 'title', 'basic' );

		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
		$page_id = get_the_ID();

		if ( $settings['source'] == 'all' ) {
			$cat_ids = '';
		} else {
			$cat_ids = $settings['source_categories'];
		}

		$cat_args = array(
			'type'			=> 'post',
			'child_of'		=> 0,
			'parent'		=> '',
			'orderby'		=> 'name',
			'order'			=> 'DESC',
			'hide_empty'	=> 1,
			'hierarchical'	=> 1,
			'taxonomy'		=> 'portfolio_categories',
			'pad_counts'	=> false,
			'include'		=> $cat_ids
		);

		$pf_categories = get_categories( $cat_args );

		$args = array(
			'post_type'			=> 'portfolio',
			'post_status'		=> 'publish',
			'orderby'			=> $settings['sort'],
			'order'				=> $settings['order'],
			'posts_per_page'	=> $settings['limit'],
			'paged' 			=> $paged
		);

		if( $settings['source'] == 'categories' ) {
			$tax_array = array(
				array(
					'taxonomy' => 'portfolio_categories',
					'field'    => 'id',
					'terms'    => $cat_ids
				)
			);

			$args += array('tax_query' => $tax_array);
		}

		$q = new \WP_Query( $args );

		?>

		<!-- portfolio -->
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

			<?php if ( $settings['filters'] && $pf_categories && $settings['pagination'] != 'pages' ) : ?>
			<!-- filter -->
		  <div class="col-lg-12">
		    <div class="trm-filter mb-30">
		      <!-- filter link -->
		      <a href="#" data-filter="*" class="trm-link trm-current"><?php echo esc_html__( 'All', 'trueman-plugin' ); ?></a>
		      <?php foreach ( $pf_categories as $category ) : ?>
		      <!-- filter link -->
		      <a href="#" data-filter=".category-<?php echo esc_attr( $category->slug ); ?>" class="trm-link"><?php echo esc_html( $category->name ); ?></a>
		      <?php endforeach; ?>
		    </div>
		  </div>
		  <!-- filter end -->
		  <?php endif; ?>
		</div>

		<?php
		$rowClass = 'row';

		if ( $settings['masonry'] == 'yes' ) {
			$rowClass .= ' trm-grid-masonry';
		}
		?>

		<div class="<?php echo esc_attr( $rowClass ); ?>">
      <?php if ( $q->have_posts() ) : $i = 0; ?>
      <?php while ( $q->have_posts() ) : $q->the_post(); $i++;

			$current_categories = get_the_terms( get_the_ID(), 'portfolio_categories' );
			$categories_slugs_string = '';
			if ( $current_categories && ! is_wp_error( $current_categories ) ) {
				foreach ( $current_categories as $key => $value ) {
					$categories_slugs_string .= ' category-' . $value->slug;
				}
			}

			$size = get_field( 'size' );

      $itemClass = 'col-12 trm-grid-item';
			$itemClass .= $categories_slugs_string;

      if ( $settings['layout'] == 'column-1' ) {
      } elseif ( $settings['layout'] == 'column-2' ) {
        $itemClass .= ' col-lg-6';

				if ( $settings['sizes'] ) {
					foreach ( $settings['sizes'] as $size ) {
						if ( $size['index'] == $i ) {
							$itemClass .= ' col-lg-12';
						}
					}
				}
      } elseif ( $settings['layout'] == 'column-3' ) {
        $itemClass .= ' col-lg-4';

				if ( $settings['sizes'] ) {
					foreach ( $settings['sizes'] as $size ) {
						if ( $size['index'] == $i ) {
							$itemClass .= ' col-lg-6';
						}
					}
				}
      } else {}

			if ( $settings['show_item_details'] != 'yes' ) {
				$itemClass .= ' trm-grid-hide-details';
			}
			if ( $settings['show_item_link'] != 'yes' ) {
				$itemClass .= ' trm-grid-hide-link';
			}

      ?>
      <div class="<?php echo esc_attr( $itemClass ); ?>">

        <?php
				set_query_var( 'link', $settings['show_item_link'] );
				get_template_part( 'template-parts/content', 'portfolio' ); ?>
      </div>
      <?php endwhile; ?>
      <?php else : ?>
      <div class="col-lg-12">
         <?php get_template_part( 'template-parts/content', 'none' ); ?>
      </div>
      <?php endif; ?>

      <?php if ( $q->have_posts() ) : ?>
      <?php if ( $settings['pagination'] == 'pages' ) : ?>
      <div class="col-lg-12">
  		  	<div class="trm-divider trm-mb-40"></div>
  			  <!-- pagination -->
  			  <div class="trm-pagination">
          <?php
          $big = 999999999; // need an unlikely integer

          echo paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $q->max_num_pages,
            'prev_text' => esc_html__( 'Prev', 'trueman-plugin' ),
            'next_text' => esc_html__( 'Next', 'trueman-plugin' ),
          ) ); ?>
          </div>
      </div>
      <?php endif; ?>
      <?php if ( $settings['pagination'] == 'button' && $settings['more_btn_link'] ) : ?>
      <div class="col-lg-12">
		  	<div class="trm-divider trm-mb-40"></div>
  			<div class="trm-bts text-center">
  				<a class="trm-btn trm-btn-md" href="<?php echo esc_url( $settings['more_btn_link']['url'] ); ?>"<?php if ( $settings['more_btn_link']['is_external'] ) : ?> target="_blank"<?php endif; ?><?php if ( $settings['more_btn_link']['nofollow'] ) : ?> rel="nofollow"<?php endif; ?>>
            <span><?php echo esc_html( $settings['more_btn_txt'] ); ?></span>
            <i class="fas fa-arrow-right"></i>
          </a>
  			</div>
		  </div>
      <?php endif; ?>
      <?php endif; wp_reset_postdata(); ?>
    </div>
    <!-- portfolio end -->

		<?php
	}
}

Plugin::instance()->widgets_manager->register( new Trueman_Portfolio_Widget() );
