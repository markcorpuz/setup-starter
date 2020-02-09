<?php
/**
 * BLOCK-FEATURE
 *
 * @package      SETUP-STARTER
 * @author       Jake Almeda
 * @since        1.0.0
 * @license      GPL-2.0+
**/

$post_entry = get_field( 'post_entry' );
$pull_template = get_field( 'pull_template' );
$show_fields = get_field( 'select_fields_to_show' );

$pid = $post_entry->ID;

// DEFINE WHERE INFORMATION IS TAKEN
/*if( current_user_can('editor') || current_user_can('administrator') ) {
    $echo = '<p><strong>Data source:</strong> <a href="'.get_the_permalink( $pid ).'">'.get_post_field( 'post_name', $pid ).'</a></p>';
    $loggedin = TRUE;
} else {
    if( $loggedin ) {
        $loggedin = FALSE;
    }
}*/

//echo $pid.' | '.$pull_template[ 'value' ];
$setup_dir = get_stylesheet_directory().'/partials/blocks/block_feature_setup_starter/'.$pull_template[ 'value' ];

// USE TEMPLATES
//echo setup_get_file_contents( $setup_dir );
ob_start();
include $setup_dir;
echo ob_get_clean();


/* ---------------------------------------- 
 * SORT DISPLAY
 * ------------------------------------- */
if( $out ) {

    // Default CSS selector | Add to array
    $classes[] = 'module feature';

    // Set CSS selectors depending on available contents
    /*if( $group_sec && !$group_info ) {
        $classes[] = 'groupspec';
    } elseif ( !$group_sec && $group_info ) {
        $classes[] = 'groupinfo';
    } else {
        // both have contents
        $classes[] = 'groupboth';
    }*/
    
    // Include CSS selectors manually entered thru wp-admin
    if( $block[ 'className' ] ) {
        $classes = array_merge( $classes, explode( ' ', $block[ 'className' ] ) );
    }

    echo '<div class="'.join( ' ', $classes ).'">'.$out.'</div>'; // DIV CONTAINER
}