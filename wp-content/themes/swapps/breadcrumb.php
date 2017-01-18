<?php  
function insert_separator($separator='>'){
    return '<li class="breadcrumb__divider">'. $separator .'</li>';
}
function the_breadcrumb() {
    global $post;
    $separator = insert_separator();
    echo '<section class="breadcrumb">';
    echo '<div class="container"><div class="row"><div class="col-xs-12">';
    print_r($post);
    echo '<ul class="breadcrumbs">';
    if (!is_home()) {
        echo '<li class="breadcrumb__item"><a href="'. get_option('home') .'">Home</a></li>';
        echo insert_separator();
        if (is_category() || is_single()) {
            echo '<li class="breadcrumb__item">';
            the_category(' </li> '. $separator .' <li class="breadcrumb__item"> ');
            if (is_single()) {
                echo '</li> '. $separator .' <li class="breadcrumb__item">';
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                foreach ( $anc as $ancestor ) {
                    $output = ' <li class="breadcrumb__item"><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li class="separator">/</li>';
                }
                echo $output;
                echo '<li class="breadcrumb__item breadcrumb__item--active" title="'.$title.'"> '.$title.'</li>';
            } else {
                echo '<li class="breadcrumb__item breadcrumb__item--active" title="'.get_the_title().'"> '.get_the_title().'</li>';
            }
        }
    }

    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo'<li class="breadcrumb__item">Archive for '; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo'<li class="breadcrumb__item">Archive for '; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo'<li class="breadcrumb__item">Archive for '; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo'<li class="breadcrumb__item">Author Archive'; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo '<li class="breadcrumb__item">Blog Archives'; echo'</li>';}
    elseif (is_search()) {echo'<li class="breadcrumb__item">Search Results'; echo'</li>';}
    echo '</ul>';
    echo '</div></div></div>';
    echo '</section>';
}

// Breadcrumbs
function custom_breadcrumbs() {
       
    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Inicio';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    //$custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';

        if ( is_home() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . esc_html( get_the_title( get_option( 'page_for_posts' ) ) ) . '</strong></li>';
            print_r($post);
              
        }

        if (is_author()) {
            echo "Lalalalala2";
        }
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false). 'lalalala' . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               
            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            // global $author;
            // $userdata = get_userdata( $author );
               
            // // Display author name
            // echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
            echo "What";
            echo '<span class="item-current item-author"><span class="bread-current bread-author">' . get_queried_object()->display_name . '</span></span>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}

if ( ! function_exists( 'swapps_breadcrumbs' ) ) {
    function swapps_breadcrumbs( $args = array() ) {

        if ( is_front_page() ) {
            return;
        }

        global $post;
        $defaults  = array(
            'separator_icon'      => '&gt;',
            'breadcrumbs_id'      => 'breadcrumbs',
            'breadcrumbs_classes' => 'breadcrumb-trail breadcrumbs',
            'home_title'          => esc_html__( 'Home' )
        );
        $args      = wp_parse_args( $args, $defaults );
        $separator = '<li class="separator"> ' . esc_html( $args['separator_icon'] ) . ' </li>';

        /***** Begin Markup *****/

        // Open the breadcrumbs
        $html = '<ul id="' . esc_attr( $args['breadcrumbs_id'] ) . '" class="' . esc_attr( $args['breadcrumbs_classes'] ) . '">';

        // Add Homepage link & separator (always present)
        $html .= '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . esc_attr( $args['home_title'] ) . '">' . esc_html( $args['home_title'] ) . '</a></li>';
        $html .= $separator;

        // Post
        if ( is_singular( 'post' ) ) {

            $category = get_the_category();
            $category_values = array_values( $category );
            $last_category = end( $category_values );
            $cat_parents = rtrim( get_category_parents( $last_category->term_id, true, ',' ), ',' );
            $cat_parents = explode( ',', $cat_parents );

            foreach ( $cat_parents as $parent ) {
                $html .= '<li class="item-cat">' . wp_kses( $parent, wp_kses_allowed_html( 'a' ) ) . '</li>';
                $html .= $separator;
            }
            $html .= '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . esc_attr( get_the_title() ) . '">' . esc_html( get_the_title() ) . '</span></li>';
        } elseif ( is_singular( 'page' ) ) {

            if ( $post->post_parent ) {
                $parents = get_post_ancestors( $post->ID );
                $parents = array_reverse( $parents );

                foreach ( $parents as $parent ) {
                    $html .= '<li class="item-parent item-parent-' . esc_attr( $parent ) . '"><a class="bread-parent bread-parent-' . esc_attr( $parent ) . '" href="' . esc_url( get_permalink( $parent ) ) . '" title="' . esc_attr( get_the_title( $parent ) ) . '">' . esc_html( get_the_title( $parent ) ) . '</a></li>';
                    $html .= $separator;
                }
            }
            $html .= '<li class="item-current item-' . $post->ID . '"><span title="' . esc_attr( get_the_title() ) . '"> ' . esc_html( get_the_title() ) . '</span></li>';
        } elseif ( is_singular( 'attachment' ) ) {

            $parent_id        = $post->post_parent;
            $parent_title     = get_the_title( $parent_id );
            $parent_permalink = esc_url( get_permalink( $parent_id ) );

            $html .= '<li class="item-parent"><a class="bread-parent" href="' . esc_url( $parent_permalink ) . '" title="' . esc_attr( $parent_title ) . '">' . esc_html( $parent_title ) . '</a></li>';
            $html .= $separator;
            $html .= '<li class="item-current item-' . $post->ID . '"><span title="' . esc_attr( get_the_title() ) . '"> ' . esc_html( get_the_title() ) . '</span></li>';
        } elseif ( is_singular() ) {

            $post_type         = get_post_type();
            $post_type_object  = get_post_type_object( $post_type );
            $post_type_archive = get_post_type_archive_link( $post_type );

            $html .= '<li class="item-cat item-custom-post-type-' . esc_attr( $post_type ) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr( $post_type ) . '" href="' . esc_url( $post_type_archive ) . '" title="' . esc_attr( $post_type_object->labels->name ) . '">' . esc_html( $post_type_object->labels->name ) . '</a></li>';
            $html .= $separator;
            $html .= '<li class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . $post->post_title . '">' . $post->post_title . '</span></li>';
        } elseif ( is_category() ) {

            $parent = get_queried_object()->category_parent;

            if ( $parent !== 0 ) {

                $parent_category = get_category( $parent );
                $category_link   = get_category_link( $parent );

                $html .= '<li class="item-parent item-parent-' . esc_attr( $parent_category->slug ) . '"><a class="bread-parent bread-parent-' . esc_attr( $parent_category->slug ) . '" href="' . esc_url( $category_link ) . '" title="' . esc_attr( $parent_category->name ) . '">' . esc_html( $parent_category->name ) . '</a></li>';
                $html .= $separator;
            }
            $html .= '<li class="item-current item-cat"><span class="bread-current bread-cat" title="' . $post->ID . '">' . single_cat_title( '', false ) . '</span></li>';
        } elseif ( is_tag() ) {
            $html .= '<li class="item-current item-tag"><span class="bread-current bread-tag">' . single_tag_title( '', false ) . '</span></li>';
        } elseif ( is_author() ) {
            $html .= '<li class="item-current item-author"><span class="bread-current bread-author">' . get_queried_object()->display_name . '</span></li>';
        } elseif ( is_day() ) {
            $html .= '<li class="item-current item-day"><span class="bread-current bread-day">' . get_the_date() . '</span></li>';
        } elseif ( is_month() ) {
            $html .= '<li class="item-current item-month"><span class="bread-current bread-month">' . get_the_date( 'F Y' ) . '</span></li>';
        } elseif ( is_year() ) {
            $html .= '<li class="item-current item-year"><span class="bread-current bread-year">' . get_the_date( 'Y' ) . '</span></li>';
        } elseif ( is_archive() ) {
            $custom_tax_name = get_queried_object()->name;
            $html .= '<li class="item-current item-archive"><span class="bread-current bread-archive">' . esc_html( $custom_tax_name ) . '</span></li>';
        } elseif ( is_search() ) {
            $html .= '<li class="item-current item-search"><span class="bread-current bread-search">Search results for: ' . get_search_query() . '</span></li>';
        } elseif ( is_404() ) {
            $html .= '<li>' . __( 'Error 404' ) . '</li>';
        } elseif ( is_home() ) {
            $html .= '<li>' . esc_html( get_the_title( get_option( 'page_for_posts' ) ) ) . '</li>';
        }

        $html .= '</ul>';

        echo wp_kses_post( $html );
    }
}
?>