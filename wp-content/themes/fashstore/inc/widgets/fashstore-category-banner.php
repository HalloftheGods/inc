<?php
/**
 * Function to change layout of parent widget
 * 
 * Changed Product slider widget
 * 
 * @package FashStore
 */

class accesspress_store_product2 extends WP_Widget {
	 /**
     * Register Widget with Wordpress
     * 
     */
    public function __construct() {
        parent::__construct(
            'accesspress_store_product2', __( 'AP: WooCommerce Product Category Banner', 'fashstore' ), array(
            'description' => __( 'This widgets show the Category Image its Description and Product of that Category for FashStore.', 'fashstore' )
            )
        );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $fashstore_prod_type = array(
                            'right_align' => __( 'Right Align With Category Image', 'fashstore' ),
                            'left_align' => __( 'Left Align With Category Image', 'fashstore' ),
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
  		foreach ( $fashstore_woocommerce_categories_obj as $category) {
  			$fashstore_woocommerce_categories[$category->term_id] = $category->name;
  		}
        
        $fields = array(
            'product_type' => array(
                'accesspress_store_widgets_name' => 'product_alignment',
                'accesspress_store_widgets_title' => __( 'Select the Display Style (Image Alignment)', 'fashstore' ),
                'accesspress_store_widgets_field_type' => 'select',
                'accesspress_store_widgets_field_options' => $fashstore_prod_type
                
            ),
            'product_category' => array(
                'accesspress_store_widgets_name' => 'product_category',
                'accesspress_store_widgets_title' => __( 'Select Product Category', 'fashstore' ),
                'accesspress_store_widgets_field_type' => 'select',
                'accesspress_store_widgets_field_options' => $fashstore_woocommerce_categories
                
            ),      
        );
        return $fields;
    }

    public function widget( $args, $instance ){
        extract($args);
        $fashstore_product_alignment  =   $instance['product_alignment'];
        $fashstore_product_category   =   $instance['product_category'];    
  ?>
        <section class="category_product">
            <div class="ak-container">
                <?php echo $before_widget; ?>
                <div class="feature-cat-product-wrap">
                    <div class="feature-cat-image <?php echo esc_attr( $fashstore_product_alignment );?>">
                    <?php 
                        $fashstore_thumbnail_id = get_woocommerce_term_meta( $fashstore_product_category, 'thumbnail_id', true );
                        if ( !empty( $fashstore_thumbnail_id ) ) {
                            $fashstore_image_path = wp_get_attachment_image_src( $fashstore_thumbnail_id, 'fashstore-banner-big', true );
                            $fashstore_image_alt = get_post_meta( $fashstore_thumbnail_id, '_wp_attachement_image_alt', true );
                    ?>
                    		<img src="<?php echo esc_url( $fashstore_image_path[0] ); ?>" alt="<?php echo esc_attr( $fashstore_image_alt );?>" />
                    <?php
                        }
                    ?>
                        <div class="product-cat-desc">
                        <?php                             
                            $taxonomy = 'product_cat';
                            $terms = term_description( $fashstore_product_category, $taxonomy );
                            $terms_name = get_term( $fashstore_product_category, $taxonomy );
                        ?>
                            <h3><?php echo $terms_name->name ?></h3>
                            <div class="cat_desc">  
                         		<?php echo $terms; ?>   
                            </div>  
                        </div><!-- .product-cat-desc -->
                    </div><!-- .feature-cat-image -->
                    <div class="feature-cat-product <?php echo esc_attr( $fashstore_product_alignment );?>">
                        <?php 
                            $prod_args = array(
                                                'post_type' => 'product',
                                                'tax_query' => array(array('taxonomy'  => 'product_cat',
                                                                           'field'     => 'id', 
                                                                           'terms'     => $fashstore_product_category                                                                 
                                                                )),
                                                'posts_per_page' => '6'
                                                );
                            $product_query = new WP_Query($prod_args);
                            if($product_query->have_posts()):
                              $count = 1;
                                while($product_query->have_posts()):$product_query->the_post();                                    
                        ?>
                                        <div class="feature-prod-wrap wow flipInY" data-wow-delay="<?php echo $count ?>s">
                                            <?php woocommerce_get_template_part( 'content', 'feat-product' ); ?>
                                        </div>
                                    <?php
                                    $count+=0.5;
                                endwhile;
                            endif;
                            wp_reset_postdata();
                        ?>
                    </div><!-- .feature-cat-product -->                    
                </div><!-- .feature-cat-product-wrap -->
                
                <?php
                echo $after_widget;
                ?>
            </div><!-- .ak-container -->
        </section><!-- .category_product -->
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