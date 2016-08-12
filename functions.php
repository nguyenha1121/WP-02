<?php
/**
 * Wp_02 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wp_02
 */

if ( ! function_exists( 'wp_02_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_02_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Wp_02, use a find and replace
	 * to change 'wp_02' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp_02', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'wp_02' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/**
	Post format
	*/
	add_post_type_support( 'slide', 'post-formats' );
	add_theme_support('post-formats',array(
		'image',
		'video',
		'gallery',
		'quote',
		'link',
		'audio',
		'slide',
		'status',
		'aside'
		));
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wp_02_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'wp_02_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_02_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_02_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_02_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_02_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wp_02' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'wp_02' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'wp_02_widgets_init' );

define( 'THEME_URL',get_stylesheet_directory() );
define("CORE", THEME_URL."/core");
/**
@Nhung file /core/init.php
**/
require_once( CORE . "/init.php" );


/**
 * Enqueue scripts and styles.
 */



function wp_02_scripts() {
	wp_enqueue_style( 'wp_02-style', get_stylesheet_uri() );

	wp_enqueue_style( 'owl', get_template_directory_uri().'/OwlCarousel-master/owl-carousel/owl.theme.css' );

	//wp_enqueue_style( 'materialize', get_template_directory_uri().'/materialize/css/materialize.css' );

	wp_enqueue_style( 'owl-theme', get_template_directory_uri().'/OwlCarousel-master/owl-carousel/owl.carousel.css' );

	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/font-awesome-4.6.3/css/font-awesome.min.css' );

	wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/OwlCarousel-master/owl-carousel/owl.carousel.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'wp_02-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'wp_02-customizer', get_template_directory_uri() . '/js/customizer.js', array());

	wp_enqueue_script( 'materializer', get_template_directory_uri() . '/materialize/js/materialize.js', array());

	wp_enqueue_script( 'wp_02-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wp_02_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// chep code


function page_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	// if ( get_previous_posts_link() )
	// 	printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	// if ( get_next_posts_link() )
	// 	printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

	function wp_02_menus(){ ?>
		<div class="menu-and-search">
			<nav id="site-navigation " class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="l1"></span><span class="l2"></span><span class="short"></span></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</nav><!-- #site-navigation -->
			<div class="search-header">
				<?php get_search_form(true); ?>
			</div>
		</div>
		<?php
	}

if(!function_exists('wp_02_thumbnail')){
	function wp_02_thumbnail($size){
		if(! is_single() &&  has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image' )) : ?>
			<figure class = "post-thumbnail">
				<?php the_post_thumbnail($size); ?>		
			</figure>
			<?php endif ;
	}
}

// set branding
if(!function_exists('wp_02_branding')){
	function wp_02_branding(){
		global $wp_02_options;
		if ($wp_02_options['logo-on']==0) :
		?>
		<div class="site-branding ">
			<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		</div>
		<?php else : ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="navbar-brand">
            <img class=" img-logo" src="<?php echo $wp_02_options['logo-image']['url']; ?>" alt="logo">
        </a>
        <?php endif;

	}
}
if(!function_exists('wp_02_copyright')){
	function wp_02_copyright(){
		global $wp_02_options;
		if ($wp_02_options['text-1-on']!=0) :
	?>
			<hr>
	 		<p class="description-footer"><?php echo $wp_02_options['txt-1']; ?></p>
	 		<hr>
	 		<p class="copyright"><span>&copy;&nbsp;</span><span><?php echo $wp_02_options['txt-2']; ?></span></p>
	<?php endif; ?>
	<?php
// list social icons
}
}
function my_customizer_social_media_array() {

	/* store social site names in array */
	$social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram', 'email');

	return $social_sites;
}

/* add settings to create various social media text areas. */
add_action('customize_register', 'my_add_social_sites_customizer');
 
function my_add_social_sites_customizer($wp_customize) {
 
	$wp_customize->add_section( 'my_social_settings', array(
			'title'    => __('Social Media Icons', 'text-domain'),
			'priority' => 35,
	) );
 
	$social_sites = my_customizer_social_media_array();
	$priority = 5;
 
	foreach($social_sites as $social_site) {
 
		$wp_customize->add_setting( "$social_site", array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
		) );
 
		$wp_customize->add_control( $social_site, array(
				'label'    => __( "$social_site url:", 'text-domain' ),
				'section'  => 'my_social_settings',
				'type'     => 'text',
				'priority' => $priority,
		) );
 
		$priority = $priority + 5;
	}
}
/* takes user input from the customizer and outputs linked social media icons */
function my_social_media_icons() {
 
    $social_sites = my_customizer_social_media_array();
 
    /* any inputs that aren't empty are stored in $active_sites array */
    foreach($social_sites as $social_site) {
        if( strlen( get_theme_mod( $social_site ) ) > 0 ) {
            $active_sites[] = $social_site;
        }
    }
 
    /* for each active social site, add it as a list item */
        if ( ! empty( $active_sites ) ) {
 
            echo "<ul class='social-media-icons'>";
 
            foreach ( $active_sites as $active_site ) {
 
	            /* setup the class */
		        $class = 'fa fa-' . $active_site;
 
                if ( $active_site == 'email' ) {
                    ?>
                    <li>
                        <a class="email" target="_blank" href="mailto:<?php echo antispambot( is_email( get_theme_mod( $active_site ) ) ); ?>">
                            <i class="fa fa-envelope" title="<?php _e('email icon', 'text-domain'); ?>"></i>
                        </a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $active_site) ); ?>">
                            <i class="<?php echo esc_attr( $class ); ?>" title="<?php printf( __('%s icon', 'text-domain'), $active_site ); ?>"></i>
                        </a>
                    </li>
                <?php
                }
            }
            echo "</ul>";
        }
}
if(!function_exists('wp_02_monthly')){
	function wp_02_monthly(){
			$time_start = microtime(true);

		/** Set up a date interval object for 6 monts ago (you can change as required) */
		$interval = new DateInterval('P6M');
		$interval->invert = 1;

		/** Grab the date as it was 6 months ago */
		$date = new DateTime(date('Y-m-d'));
		$date->add($interval);

		/** Query the database for all posts newer than the the given date interval */
		$args = array(
		    'nopaging'          => true,
		    'posts_per_page'    => -1,
		    'post_type'         => 'post',
		    'post_status'       => 'publish',
		    'order_by'          => 'date',
		    'date_query'        => array(
		        'after' => $date->format('Y-m-d')
		    )
		);
		$month_query = new WP_Query($args);

		/** Check to ensure that there are articles for this month... */
		if($month_query->have_posts()) :

		    $month_titles = array();
		    $close_ul = false;


		    //echo '<ul style="padding-left: 250px;" id="monthly-posts">';

		    /** Set the attributes for displaying the title as an attribute */
		    $title_attribute_args = array(
		        'before'    => 'Visit article \'',
		        'after'     => '\' ',
		        'echo'      => false
		    );      

		    /** Loop through each post for this month... */
		    while($month_query->have_posts()) : $month_query->the_post();

		        /** Check the month/year of the current post */
		        $month_title = date('F Y', strtotime(get_the_date('Y-m-d H:i:s')));

		        /** Maybe output a human friendly date, if it's not already been output */
		        if(!in_array($month_title, $month_titles)) :

		            if($close_ul) echo '</ul>';                                                             // Check if the unordered list of posts should be closed (it shouldn't for the first '$monthe_title')
		            echo '<p  id="monthly-title">' . $month_title . '</p>';   // Output the '$month_title'
		            echo '<ul class="monthly"  id="monthly-posts">';                            // Open an unordered lists for the posts that are to come
		            $month_titles[] = $month_title;                                                         // Add this `$month_title' to the array of `$month_titles` so that it is not repeated
		            $close_ul = true;                                                                       // Indicate that the unordered list should be closed at the next oppurtunity

		        endif;

		        /** Output each article for this month */
		        printf(
		            '<li id="monthly-post-%1$s"> <a href="%3$s" title="%4$s">%2$s</a></li>',
		            get_the_ID(),                               /** %1$s - The ID of the post */
		            get_the_title(),                            /** %2$s - The article title */
		            get_permalink(get_the_ID()),                /** %3$s - The article link */
		            the_title_attribute($title_attribute_args)  /** %4$s - The title for use as an attribute */
		        );

		    endwhile;

		    if($close_ul) echo '</ul>'; // Close the last unordered list of posts (if there are any shown)

		endif;

		/** Reset the query so that WP doesn't do funky stuff */
		wp_reset_query();
	}
}