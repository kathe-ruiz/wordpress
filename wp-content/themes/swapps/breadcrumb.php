<?php

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
		$html .= '<li class="breadcrumb__item item-home"><a class="breadcrumb__bread bread-link bread-home" href="' . get_home_url() . '" title="' . esc_attr( $args['home_title'] ) . '">' . esc_html( $args['home_title'] ) . '</a></li>';
		$html .= $separator;

		// Post
		if ( is_singular( 'post' ) ) {

			$category = get_the_category();
			$category_values = array_values( $category );
			$last_category = end( $category_values );
			$cat_parents = rtrim( get_category_parents( $last_category->term_id, true, ',' ), ',' );
			$cat_parents = explode( ',', $cat_parents );

			foreach ( $cat_parents as $parent ) {
				$html .= '<li class="breadcrumb__item item-cat">' . wp_kses( $parent, wp_kses_allowed_html( 'a' ) ) . '</li>';
				$html .= $separator;
			}
			$html .= '<li class="breadcrumb__item item-current item-' . $post->ID . '"><span class="breadcrumb__bread bread-current bread-' . $post->ID . '" title="' . esc_attr( get_the_title() ) . '">' . esc_html( get_the_title() ) . '</span></li>';
		} elseif ( is_singular( 'page' ) ) {

			if ( $post->post_parent ) {
				$parents = get_post_ancestors( $post->ID );
				$parents = array_reverse( $parents );

				foreach ( $parents as $parent ) {
					$html .= '<li class="breadcrumb__item item-parent item-parent-' . esc_attr( $parent ) . '"><a class="breadcrumb__bread bread-parent bread-parent-' . esc_attr( $parent ) . '" href="' . esc_url( get_permalink( $parent ) ) . '" title="' . esc_attr( get_the_title( $parent ) ) . '">' . esc_html( get_the_title( $parent ) ) . '</a></li>';
					$html .= $separator;
				}
			}
			$html .= '<li class="breadcrumb__item item-current item-' . $post->ID . '"><span class="breadcrumb__bread bread-current" title="' . esc_attr( get_the_title() ) . '"> ' . esc_html( get_the_title() ) . '</span></li>';
		} elseif ( is_singular( 'attachment' ) ) {

			$parent_id        = $post->post_parent;
			$parent_title     = get_the_title( $parent_id );
			$parent_permalink = esc_url( get_permalink( $parent_id ) );

			$html .= '<li class="breadcrumb__item item-parent"><a class="breadcrumb__bread bread-parent" href="' . esc_url( $parent_permalink ) . '" title="' . esc_attr( $parent_title ) . '">' . esc_html( $parent_title ) . '</a></li>';
			$html .= $separator;
			$html .= '<li class="breadcrumb__item item-current item-' . $post->ID . '"><span class="breadcrumb__bread bread-current" title="' . esc_attr( get_the_title() ) . '"> ' . esc_html( get_the_title() ) . '</span></li>';
		} elseif ( is_singular() ) {

			$post_type         = get_post_type();
			$post_type_object  = get_post_type_object( $post_type );
			$post_type_archive = get_post_type_archive_link( $post_type );

			$html .= '<li class="breadcrumb__item item-cat item-custom-post-type-' . esc_attr( $post_type ) . '"><a class="breadcrumb__bread bread-cat bread-custom-post-type-' . esc_attr( $post_type ) . '" href="' . esc_url( $post_type_archive ) . '" title="' . esc_attr( $post_type_object->labels->name ) . '">' . esc_html( $post_type_object->labels->name ) . '</a></li>';
			$html .= $separator;
			$html .= '<li class="breadcrumb__item item-current item-' . $post->ID . '"><span class="breadcrumb__bread bread-current bread-' . $post->ID . '" title="' . $post->post_title . '">' . $post->post_title . '</span></li>';
		} elseif ( is_category() ) {

			$parent = get_queried_object()->category_parent;

			if ( $parent !== 0 ) {

				$parent_category = get_category( $parent );
				$category_link   = get_category_link( $parent );

				$html .= '<li class="breadcrumb__item item-parent item-parent-' . esc_attr( $parent_category->slug ) . '"><a class="breadcrumb__bread bread-parent bread-parent-' . esc_attr( $parent_category->slug ) . '" href="' . esc_url( $category_link ) . '" title="' . esc_attr( $parent_category->name ) . '">' . esc_html( $parent_category->name ) . '</a></li>';
				$html .= $separator;
			}
			$html .= '<li class="breadcrumb__item item-current item-cat"><span class="breadcrumb__bread bread-current bread-cat" title="' . $post->ID . '">' . single_cat_title( '', false ) . '</span></li>';
		} elseif ( is_tag() ) {
			$html .= '<li class="breadcrumb__item item-current item-tag"><span class="breadcrumb__bread bread-current bread-tag">' . single_tag_title( '', false ) . '</span></li>';
		} elseif ( is_author() ) {
			$html .= '<li class="breadcrumb__item item-current item-author"><span class="breadcrumb__bread bread-current bread-author">' . get_queried_object()->display_name . '</span></li>';
		} elseif ( is_day() ) {
			$html .= '<li class="breadcrumb__item item-current item-day"><span class="breadcrumb__bread bread-current bread-day">' . get_the_date() . '</span></li>';
		} elseif ( is_month() ) {
			$html .= '<li class="breadcrumb__item item-current item-month"><span class="breadcrumb__bread bread-current bread-month">' . get_the_date( 'F Y' ) . '</span></li>';
		} elseif ( is_year() ) {
			$html .= '<li class="breadcrumb__item item-current item-year"><span class="breadcrumb__bread bread-current bread-year">' . get_the_date( 'Y' ) . '</span></li>';
		} elseif ( is_archive() ) {
			$custom_tax_name = get_queried_object()->name;
			$html .= '<li class="breadcrumb__item item-current item-archive"><span class="breadcrumb__bread bread-current bread-archive">' . esc_html( $custom_tax_name ) . '</span></li>';
		} elseif ( is_search() ) {
			$html .= '<li class="breadcrumb__item item-current item-search"><span class="breadcrumb__bread bread-current bread-search">Search results for: ' . get_search_query() . '</span></li>';
		} elseif ( is_404() ) {
			$html .= '<li class="breadcrumb__item item-current item-error"><span class="breadcrumb__bread bread-current">' . __( 'Error 404' ) . '</span></li>';
		} elseif ( is_home() ) {
			$html .= '<li class="breadcrumb__item item-current item-posts"><span class="breadcrumb__bread bread-current">' . esc_html( get_the_title( get_option( 'page_for_posts' ) ) ) . '</span></li>';
		}

		$html .= '</ul>';

		echo wp_kses_post( $html );
	}
}
?>
