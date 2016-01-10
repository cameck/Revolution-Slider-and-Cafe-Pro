# Revolution-Slider-and-Cafe-Pro
How to Replace the Main Background Image with Revolution Slider in the Cafe Pro Theme by Genesis
I noticed a lot of people asking about this, so here's the solution!

<ol>
<li>1. <a href="http://codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/2751380?s_phrase=slider+Revolution&s_rank=2&ref=cameck" target="_blank">Download Slider Revolution from Code Canyon</a> and install it per Code Canyon's instructions.</li>

<li>Navigate to this folder: /public_html/wp-content/themes/cafe-pro via FTP</li>
<li>Open the front-page.php file</li>

<li>Right before the closing:
genesis();

Add this code:
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
}</li>

<li>Save the file. This adds the Revolution Slider to our Home Page template.</li>

<aside>Next some CSS needs to be modified.</aside>

<li>Open up the Cafe Pro theme’s style.css (/public_html/wp-content/themes/cafe-pro/style.css) file and add this code:

<code>/*Slider Fix*/
.cafe-pro-home .site-header .wrap {
	padding: 0;
}</code> </li>

<aside>If you look at the site now, you will see it isn’t quite there yet.

We need to comment out some JavaScript that is conflicting with our CSS.</aside>

<li>Next open up the home.js file (/public_html/wp-content/themes/cafe-pro/js/home.js and comment out both instances of this code:

$('.front-page-header') .css({'height': newHeight +'px'});</li>

</ol>
You did it! 
