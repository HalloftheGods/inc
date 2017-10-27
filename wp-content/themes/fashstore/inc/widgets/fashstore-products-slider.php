<?php
/**
 * Function to change layout of parent widget
 * 
 * Changed Product slider widget
 * 
 * @package FashStore
 */

class accesspress_store_product extends WP_Widget {
    /**
     * Register Widget with Wordpress
     * 
     */
    public function __construct() {
      parent::__construct(
        'accesspress_store_product', __( 'AP: WooCommerce Product Slider', 'fashstore' ), array(
          'description' => __( 'The Product Slide Choose your type for FashStore.', 'fashstore' )
          )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {

      $fashstore_prod_type = array(
        'category' => __( 'Category', 'fashstore' ),
        'latest_product' => __( 'Latest Product', 'fashstore' ),
        'upsell_product' => __( 'UpSell Product', 'fashstore' ),
        'feature_product' => __( 'Feature Product', 'fashstore' ),
        'on_sale' => __( 'On Sale Product', 'fashstore' ),
        );
      $taxonomy     = 'product_cat';
      $empty        = 1;
      $orderby      = 'name';  
          $show_count   = 0;      // 1 for yes, 0 for no
          $pad_counts   = 0;      // 1 for yes, 0 for no
          $hierarchical = 1;      // 1 for yes, 0 for no  
          $title        = '';  
          $empty        = 0;
          $args = array(
            'taxonomy'     => $taxonomy,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty

            );
          $fashstore_woocommerce_categories = array();
          $fashstore_woocommerce_categories_obj = get_categories($args);
          $fashstore_woocommerce_categories[''] = __( 'Select Product Category:', 'fashstore' );
          foreach ($fashstore_woocommerce_categories_obj as $category) {
            $fashstore_woocommerce_categories[$category->term_id] = $category->name;
          }

          $fields = array(
            'product_title' => array(
              'accesspress_store_widgets_name' => 'product_title',
              'accesspress_store_widgets_title' => __( 'Title', 'fashstore' ),
              'accesspress_store_widgets_field_type' => 'text',

              ),
            'product_type' => array(
              'accesspress_store_widgets_name' => 'product_type',
              'accesspress_store_widgets_title' => __( 'Select Product Type', 'fashstore' ),
              'accesspress_store_widgets_field_type' => 'select',
              'accesspress_store_widgets_field_options' => $fashstore_prod_type

              ),
            'product_category' => array(
              'accesspress_store_widgets_name' => 'product_category',
              'accesspress_store_widgets_title' => __( 'Select Product Category', 'fashstore' ),
              'accesspress_store_widgets_field_type' => 'select',
              'accesspress_store_widgets_field_options' => $fashstore_woocommerce_categories

              ),
            
            'product_number' => array(
              'accesspress_store_widgets_name' => 'number_of_prod',
              'accesspress_store_widgets_title' => __( 'Select the number of Product to show', 'fashstore' ),
              'accesspress_store_widgets_field_type' => 'number',
              ),
            

            );
return $fields;
}

public function widget($args, $instance){
  extract($args);
  $fashstore_product_title      =   $instance['product_title'];
  $fashstore_product_type       =   $instance['product_type'];
  $fashstore_product_category   =   $instance['product_category'];
  $fashstore_product_number     =   $instance['number_of_prod'];
  $fashstore_product_label_custom = '';
  $fashstore_product_args       =   '';
  if( $fashstore_product_type == 'category' ) {
    $fashstore_product_args = array(
      'post_type' => 'product',
      'tax_query' => array(array('taxonomy'  => 'product_cat',
       'field'     => 'term_id', 
       'terms'     => $fashstore_product_category                                                                 
       )),
      'posts_per_page' => $fashstore_product_number
      );
  }

  elseif( $fashstore_product_type == 'latest_product' ){
    $fashstore_product_label_custom = __( 'New!', 'fashstore' );
    $fashstore_product_args = array(
      'post_type' => 'product',
      'posts_per_page' => $fashstore_product_number
      );
  }

  elseif( $fashstore_product_type == 'upsell_product' ){
    $fashstore_product_args = array(
      'post_type'         => 'product',
      'posts_per_page'    => 10,
      'meta_key'          => 'total_sales',
      'orderby'           => 'meta_value_num',
      'posts_per_page'    => $fashstore_product_number
      );
  }

  elseif( $fashstore_product_type == 'feature_product' ){
    $fashstore_product_args = array(
     'post_type'        => 'product',
     'tax_query' => array(
          array(
              'taxonomy' => 'product_visibility',
              'field'    => 'name',
              'terms'    => 'featured',
              'operator' => 'IN'
          )
      ), 
     /*'meta_key'         => '_featured',  
     'meta_value'       => 'yes', */ 
     'posts_per_page'   => $fashstore_product_number   
     );
  }

  elseif( $fashstore_product_type == 'on_sale' ){
    $fashstore_product_args = array(
      'post_type'      => 'product',
      'meta_query'     => array(
        'relation' => 'OR',
          array( // Simple products type
            'key'           => '_sale_price',
            'value'         => 0,
            'compare'       => '>',
            'type'          => 'numeric'
            ),
          array( // Variable products type
            'key'           => '_min_variation_sale_price',
            'value'         => 0,
            'compare'       => '>',
            'type'          => 'numeric'
            )
          )
      );
  }

  ?>
  <section title="product-slider">
    <div class="ak-container">
      <?php echo $before_widget; ?>
      <?php echo $before_title.esc_attr( $fashstore_product_title ).$after_title; ?>
      <ul class="new-prod-slide">
      <?php
        $count = 0;
        $fashstore_product_loop = new WP_Query( $fashstore_product_args );
        while ( $fashstore_product_loop->have_posts() ) : $fashstore_product_loop->the_post(); 
        global $product; 
        $count+=0.5;
      ?>
        <li class="span3 wow flipInY" data-wow-delay="<?php echo $count ?>s">
          <div class="item-img">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">  
            <?php
              if ( $fashstore_product_label_custom != '' ){
                echo '<span class="label-new">'.$fashstore_product_label_custom.'</span>';
              }
            ?>
            <?php
              /**
               * woocommerce_before_shop_loop_item_title hook
               *
               * @hooked woocommerce_show_product_loop_sale_flash - 10
               * @hooked woocommerce_template_loop_product_thumbnail - 10
               */
              do_action( 'woocommerce_before_shop_loop_item_title' );
            ?>
            </a>
            <div class="cart-wish-wrapper">
            <?php
            do_action( 'woocommerce_after_shop_loop_item' );
                //woocommerce_template_loop_add_to_cart( $fashstore_product_loop->post, $product );
            ?>
            <?php
              if( function_exists( 'YITH_WCWL' ) ){
                $url = add_query_arg( 'add_to_wishlist', $product->get_id() );
            ?>
                <a class="item-wishlist" href="<?php echo esc_url( $url ); ?>"><i class="fa fa-heart-o"></i><span class="wish-caption"><?php _e( 'Add to Wishlist', 'fashstore' );?></span></a>
            <?php
              }
            ?>
            </div><!--.cart-wish-wrapper-->
          </div><!-- .item-img -->
          <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">  
            <h3><?php the_title(); ?></h3>
            <p class="short_desc"><?php $home_exc = strip_shortcodes(substr(strip_tags(get_the_content()),0,32)); echo $home_exc.'...'; ?></p>
            <span class="price"><?php echo $product->get_price_html(); ?></span>
          </a>
        </li>
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>
    </ul>
    <?php 
    echo $after_widget;
    ?>
  </div><!--.ak-container-->
</section><!-- .product-slider -->
<?php
}

/**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @uses  accesspress_store_widgets_updated_field_value()   defined in widget-fields.php
     *
     * @return  array Updated safe values to be saved.
     */
public function update($new_instance, $old_instance) {
  $instance = $old_instance;

  $widget_fields = $this->widget_fields();

        // Loop through fields
  foreach ($widget_fields as $widget_field) {

    extract($widget_field);

            // Use helper function to get updated field values
    $instance[$accesspress_store_widgets_name] = accesspress_store_widgets_updated_field_value($widget_field, $new_instance[$accesspress_store_widgets_name]);
  }

  return $instance;
}

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     *
     * @uses  accesspress_store_widgets_show_widget_field()   defined in widget-fields.php
     */
    public function form($instance) {
      $widget_fields = $this->widget_fields();

        // Loop through fields
      foreach ($widget_fields as $widget_field) {

            // Make array elements available as variables
        extract($widget_field);
        $accesspress_store_widgets_field_value = !empty($instance[$accesspress_store_widgets_name]) ? esc_attr($instance[$accesspress_store_widgets_name]) : '';
        accesspress_store_widgets_show_widget_field($this, $widget_field, $accesspress_store_widgets_field_value);
      }
    }
  }
