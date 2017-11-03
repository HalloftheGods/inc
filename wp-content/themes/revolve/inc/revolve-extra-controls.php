<?php
    if( class_exists( 'WP_Customize_Control' ) ) :
    	
        class Revolve_WP_Customize_Submenu_Control extends WP_Customize_Control{
            public function render_content() {
                $ppages = $this->revolve_get_pages_with_childpages();
				?>
				<label>
                    <?php if ( ! empty( $this->label ) ) : ?>
    				    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <?php endif; ?>
                </label>
                <?php if(!empty($ppages)) : ?>
                    <ul class="ppar-page-containers">
                    <?php foreach($ppages as $page) : ?>
                        <?php
                            $sargs = array(
                                'parent' => $page->ID,
                            	'post_type' => 'page',
                            	'post_status' => 'publish'
                            );
                        
                            $spages = get_pages($sargs);
                        ?>
                        <li class="par-page-titler">
                            <span class="par-page-title"><?php echo $page->post_title; ?></span>
                            <?php if(!empty($spages)) : ?>
                                <ul class="ssub-page-container">
                                    <?php foreach($spages as $spage) : ?>
                                        <li class="sub-page-titler">
                                            <table>
                                                <tr>
                                                    <th>Page</th>
                                                    <td><?php echo $spage->post_title; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>ID</th>
                                                    <td><input type="text" /></td>
                                                </tr>
                                            </table>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                <?php endif; ?>                    
				<?php
            }
            
            public function revolve_get_pages_with_childpages() {
                $fargs = array(
                	'parent' => 0,
                	'post_type' => 'page',
                	'post_status' => 'publish'
                );
                
                $ppages = get_pages($fargs);
                return $ppages;
            }
        }

        /**
     * Pro customizer section.
     *
     * @since  1.0.0
     * @access public
     */
    class Revolve_Customize_Section_Pro extends WP_Customize_Section {

        /**
         * The type of customize section being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'revolve-pro';

        /**
         * Custom button text to output.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_text = '';
        public $pro_text1 = '';
        public $title1 = '';

        /**
         * Custom pro button URL.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_url = '';
        public $pro_url1 = '';

        /**
         * Add custom parameters to pass to the JS via JSON.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function json() {
            $json = parent::json();
            $json['pro_text'] = $this->pro_text;
            $json['pro_url']  = esc_url( $this->pro_url );
            return $json;
        }

        /**
         * Outputs the Underscore.js template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        protected function render_template() { ?>

            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
                <h3 class="accordion-section-title">
                    {{ data.title }}
                    <# if ( data.pro_text && data.pro_url ) { #>
                        <a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
            </li>
        <?php }
    }
        
    endif;