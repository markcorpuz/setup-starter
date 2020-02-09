<?php

/* ############################################
 * # REGISTER CUSTOM BLOCK CATEGORY
 * ######################################### */
function setup_starter_block_categories( $categories ) {
    return array_merge(
        array(
            array(
                'slug' => 'setup_starter',
                'title' => __( 'Setup Starter', 'mydomain' ),
                //'icon'  => 'wordpress',
            ),
        ),
        $categories
    );
}
add_filter( 'block_categories', 'setup_starter_block_categories', 10, 2 );


/* ############################################
 * # REGISTER CUSTOM BLOCKS
 * ######################################### */
function ss_block_acf_init() {

    $blocks = array(
        
        'logs' => array(
    		'name'			    => 'log',
    		'title'			    => __('Log'),
    		'render_template'	=> 'partials/blocks/block-log-setup-starter.php',
    		'category'		    => 'setup_starter',
    		'icon'			    => 'list-view',
    		'mode'			    => 'edit',
    		'keywords'		    => array( 'update', 'log' ),
        ),
      
        'feature' => array(
            'name'              => 'feature_display',
            'title'             => __('Feature'),
            'render_template'   => 'partials/blocks/block-feature-setup-starter.php',
            'category'          => 'setup_starter',
            'icon'              => 'list-view',
            'mode'              => 'edit',
            'keywords'          => array( 'feature', 'highlight' ),
        ),
        
    );

    // Bail out if function doesn’t exist or no blocks available to register.
    if ( !function_exists( 'acf_register_block_type' ) && !$blocks ) {
        return;
    }
    
    // this loop is broken, how do we register multiple blocks in one go?
    // Register all available blocks.
    foreach ($blocks as $block) {
        acf_register_block_type( $block );
    }
  
}

// Initiates Advanced Custom Fields.
add_action( 'acf/init', 'ss_block_acf_init' );