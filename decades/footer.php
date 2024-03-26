<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package decades
 */
?>
    <?php if(decades_get_option('w_footer')) { ?>
    <div class="top-footer">

        <div class="container">
            <div class="row">

                <div id="zypp_footer_address" class="wpb_column vc_column_container vc_col-sm-6">
                    <?php dynamic_sidebar( 'footer-area-1' ); ?>
                </div>

                <div class="wpb_column vc_column_container vc_col-sm-6">

                    <!--=== start section-title ===-->
                    <div class="section-title">
                        <?php 
                            $title   = decades_get_option('f_title') ? decades_get_option('f_title') : esc_html__('Follow Us', 'decades');
                            $stitle  = decades_get_option('t_stitle') ? decades_get_option('t_stitle') : esc_html__('get connect with us', 'decades');
                        ?>
                        <h2><?php echo esc_html( $title ); ?></h2>
                        <h6 class="font-alt"><?php echo esc_html( $stitle ); ?></h6>
                    </div>
                    <!--=== end section-title ===-->
                    
                    <div class="container">
                        <div class="row">
                            <?php $fsocials = decades_get_option( 'f_socials', array() ); ?>
                            <?php if($fsocials) { ?>
                                <div class="social-icons">
                                    <?php foreach ( $fsocials as $fsocial ) { ?>
                                        <a href="<?php echo esc_url($fsocial['link']); ?>"><i class="fa <?php echo esc_attr($fsocial['icon']); ?>" aria-hidden="true"></i></a>                                                    
                                    <?php } ?>
                                </div>
                            <?php } ?>                
                        </div>            
                    </div>

                </div> <!-- end column -->
            </div> <!-- end row -->
        </div><!-- end container -->

    </div> <!-- end top-footer -->

    <?php }if(decades_get_option('copy_right')) { ?>
    <!-- footer begin -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                
                    <!--=== start copyright ===-->
                    <div class="copyright">
                        <?php echo wp_kses( decades_get_option('copy_right'), wp_kses_allowed_html('post') ); ?>   
                    </div>
                    <!--=== end copyright ===-->
                    
                </div>
                <!--=== end col ===-->
                
            </div>
            <!--=== end row ===-->
            
        </div>
        <!--=== end container ===-->
        
    </footer>
    <!-- footer close -->
    <?php } ?>

    <a href="#" id="back-to-top"></a>

</div>

<?php wp_footer(); ?>


</body>
</html>
