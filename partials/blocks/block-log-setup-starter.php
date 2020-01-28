<?php
/**
 * BLOCK-LOG
 *
 * @package      SETUP
 * @author       Mark Corpuz
 * @since        1.0.0
 * @license      GPL-2.0+
**/

$log_code = get_field( 'log_code' );
$log_date = get_field( 'log_date' );
$log_time = get_field( 'log_time' );
$log_title = get_field( 'log_title' );
//$log_icon = get_field( 'log_icon' );
$log_pic = get_field( 'log_pic' );
$log_link = get_field( 'log_link' );
$log_detail = get_field( 'log_detail' );


/* ---------------------------------------- 
 * GROUP SPEC (LEFT SIDE)
 * ------------------------------------- */
if( $log_code || $log_date || $log_time || $log_pic ) {

    $group_sec = '<div class="group spec">'; // DIV CONTAINER - OPEN
        
        if( $log_code ) {
            $group_sec .= '<div class="item code">'.$log_code.'</div>';
        }
        
        $grouped = TRUE;
        if( $grouped ) {
            // # GROUPED
            if( $log_date ) {
                $logger_date = '<span class="item date">'.$log_date.'</span>';
            }
                
            if( $log_time ) {
                $logger_time = '<span class="item time">'.$log_time.'</span>';
            }
            
            if( $log_date || $log_time ) {
                $group_sec .= '<div class="group datetime">'.$logger_date.$logger_time.'</div>';
            }
        } else {
            // # INDIVIDUAL
            if( $log_date ) {
                $group_sec .= '<div class="item date">'.$log_date.'</div>';
            }

            if( $log_time ) {
                $group_sec .= '<div class="item time">'.$log_time.'</div>';
            } 
        }
        
        if( $log_pic ) {
            $group_sec .= '<div class="item pic">'.wp_get_attachment_image( $log_pic, 'thumbnail' ).'</div>';
        }

    $group_sec .= '</div>'; // DIV CONTAINER - CLOSE

}


/* ---------------------------------------- 
 * GROUP INFO (RIGHT SIDE)
 * ------------------------------------- */
if( $log_title || $log_detail || $log_link ) {

    $group_info = '<div class="group info">'; // DIV CONTAINER - OPEN

        if( $log_title ) {
            $group_info .= '<div class="item title">'.$log_title.'</div>';
        }

        if( $log_detail ) {
            $group_info .= '<div class="item detail">'.$log_detail.'</div>';
        }

        if( $log_link ) {
            $group_info .= '<div class="item url">'.$log_link.'</div>';
        }

    $group_info .= '</div>'; // DIV CONTAINER - CLOSE

}


/* ---------------------------------------- 
 * SORT DISPLAY
 * ------------------------------------- */
if( $group_sec || $group_info ) {

    // Default CSS selector | Add to array
    $classes[] = 'module log';

    // Set CSS selectors depending on available contents
    if( $group_sec && !$group_info ) {
        $classes[] = 'groupspec';
    } elseif ( !$group_sec && $group_info ) {
        $classes[] = 'groupinfo';
    } else {
        // both have contents
        $classes[] = 'groupboth';
    }
    
    // Include CSS selectors manually entered thru wp-admin
    if( $block[ 'className' ] ) {
        $classes = array_merge( $classes, explode( ' ', $block[ 'className' ] ) );
    }

    echo '<div class="'.join( ' ', $classes ).'">'.$group_sec.$group_info.'</div>'; // DIV CONTAINER
}