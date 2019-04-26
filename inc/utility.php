<?php

/**
 * 
 * Convert Object into an Array
 * 
 * @since 1.3.0
 * 
 * Usage:
 *  $myArray = object_to_array( $myObject );
 */  
if ( !function_exists( 'object_to_array' ) ) :
function object_to_array( $obj ) 
{
    if( is_object( $obj ) ) $obj = ( array ) $obj;

    if( is_array( $obj ) ) 
    {
        $new = array();
        
        foreach( $obj as $key => $val ) 
        {
            $new[$key] = object_to_array( $val );
        }
    }
    else $new = $obj;
    return $new;       
}
endif;

/**
 * Adds custom classes to the array of body classes.
 *
 * @since 1.3.0
 */
function sc_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	return $classes;
}
add_filter( 'body_class', 'sc_body_classes' );