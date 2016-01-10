// Replace header hook to include slider
remove_action( 'genesis_header', 'genesis_do_header' ); 
add_action( 'genesis_header', 'genesis_do_new_header' ); 

function genesis_do_new_header() { 
//add your custom slider shortcode here:
echo  do_shortcode('[rev_slider alias="main"][/rev_slider]');  
    if ( is_active_sidebar( 'header-right' ) || has_action( 'genesis_header_right' ) ) { 
        echo '<div class="widget-area">'; 
        do_action( 'genesis_header_right' ); 
        dynamic_sidebar( 'header-right' ); 
        echo '</div><!-- end .widget-area -->'; 
    } 
}
