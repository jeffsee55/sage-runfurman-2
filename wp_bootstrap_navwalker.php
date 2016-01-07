<?php
class wp_bootstrap_navwalker extends Walker_Nav_Menu {

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
    $output .= "\n$indent<div id=\"sublist\" class=\" sublist collapse\">\n<button type='button' class='close' aria-label='Close'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button><div class=\"container\"><ul> ";
	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $class_names = $value = '';
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'nav-item';
    $classes[] = 'menu-item-' . $item->ID;
    if ( $depth === 1 ) {
      $classes[] = 'col-sm-4';
    };
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    if ( $args->has_children )
    if ( in_array( 'current-menu-item', $classes ) )
      $class_names .= ' active';
    $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
    $output .= $indent . '<li' . $id . $value . $class_names .'>';
    $atts = array();
    $atts['title']  = ! empty( $item->title )	? $item->title	: '';
    $atts['target'] = ! empty( $item->target )	? $item->target	: '';
    $atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
    $atts['class']  = 'nav-link';
    // If item has_children add atts to a.
    if ( $args->has_children && $depth === 0 ) {
      $atts['href']   		= '#';
      $atts['data-target']	= '#sublist';
      $atts['data-toggle']	= 'collapse';
      $atts['class']			= 'has-more';
      $atts['aria-espanded']	= 'false';
      $atts['aria-controls']	= 'sublist';
    } else {
      $atts['href'] = ! empty( $item->url ) ? $item->url : '';
    }
    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
    $attributes = '';
    foreach ( $atts as $attr => $value ) {
      if ( ! empty( $value ) ) {
        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }
    if( $item->title == 'Contact' || $item->title == "Get in Touch" ) { 
      $attributes .=  "data-toggle='modal' data-target='.contact-modal'";
    }
    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= ( $args->has_children && 0 === $depth ) ? ' <i class="material-icons"></i></a>' : '</a>';
    $item_output .= $args->after;
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;
        $id_field = $this->db_fields['id'];
        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
}

