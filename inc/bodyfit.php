<?php
// RETURN IF CALLED DIRECTLY BY PATH
if (!defined('WPINC')) {
    die;
}

function bodyfit_timetable_enqueue() {
    wp_enqueue_style( 'custom-timetable-bodyfit', plugin_dir_url(__FILE__) . 'css/custom.css' );

    //Uncomment following if you receive jquery error on console. mostly due to jquery version mismatch
    
    wp_deregister_script('jquery');
    wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.6.0.min.js');
    wp_enqueue_script( 'custom-time-table', plugin_dir_url(__FILE__) . 'js/custom.js', array( 'jquery' ), true );

}
add_action( 'wp_enqueue_scripts', 'bodyfit_timetable_enqueue' );

/**
 * Require file for custom post types
 */

/** 
 * Gets the repeater field values assigned by ACF to custom post type
 */
function get_timetable_fields($day, $repeater_field_name , $post_id){
    if( have_rows($repeater_field_name, $post_id)){
        echo '<div class="class class_table class_table_'.$day.'">';
        $counter = 1;
        while (have_rows($repeater_field_name, $post_id)){
            the_row();
            $class = get_sub_field('class');
            $from  = get_sub_field('from');
            $to     = get_sub_field('to');

            // print_r($class);
            $className = $class->post_title;
            $classID = str_replace(' ', '-', $className);
            if ($counter == 1){
                echo '<div class="day day_table '.$day.'_col"><p>'.$day.'</p></div>';
            } ?>
            <div data-title='<?php _e($class->post_title,'')?>' data-desc="<?php echo strip_tags($class->post_content)?>" data-time="<?php echo $from?> - <?php echo $to?>" class="single_class sinlge_class_<?php echo $classID?>">
            <?php
            echo '<span class="class_name"><p>'.$className.'</p></span>';
            echo '<div class="time">';
            echo '<span class="class_from"><p>'.$from.' - '.$to.'</p></span>';
            echo '</div>';
            echo '</div>';
            $counter++;
        }
        echo '</div>';
    }
}
add_shortcode('timetable' ,'get_timetable');

/**
 * callback function for timetable shortcode
 */
function get_timetable($atts){
    extract(
        shortcode_atts(
            array( 
                'location' => 'miranda'), 
            $atts)
    );
    $postObj = get_posts([
        'name'      => $location,
        'post_type' => 'weekly-schedule'
    ]);
    $post_id = $postObj[0]->ID;
    $classes = [
        'MON' => 'mon_classes',
        'TUE' => 'tue_classes',
        'WED' => 'wed_classes',
        'THU' => 'thur_classes',
        'FRI' => 'fri_classes',
        'SAT' => 'sat_classes',
        'SUN' => 'sun_classes'
    ];
    ob_start();
    ?>
    <div class="schedule">
        <div data-location="<?php echo $location?>" class="classess days classes_table classes_table_<?php echo $location?>">

        <?php foreach($classes as $day=>$class){
            get_timetable_fields($day, $class, $post_id);
        } ?>

        </div>
    </div>
    <?php return ob_get_clean();
}