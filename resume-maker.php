<?php 
/**
 * Plugin Name: Resume Maker
 * Author: Lotfi Hadjsadok
 * Description: Resume Powered BY IA
 */

 if(!defined('ABSPATH'))die;

 require_once plugin_dir_path(__FILE__).'classes/class-algeria-cities.php'; 


 


function enqueue_scirpts(){
    wp_register_script( 'selectize', 'https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js', array( 'jquery' ), '0.13.3', true );
    wp_enqueue_script( 'resume-cv-js', plugin_dir_url(__FILE__).'assets/index.js' ,array('jquery','selectize'),'1.0',true);

    wp_enqueue_style( 'selectize-css', 'https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.default.min.css' );

    // Enqueue your own stylesheet
    wp_enqueue_style( 'my-style', plugin_dir_url(__FILE__) . 'src/css/style.css' );
    wp_enqueue_style( 'material_icons', 'https://fonts.googleapis.com/icon?family=Material+Icons');

    wp_add_inline_script('resume-cv-js','const states_cities = '.json_encode(Algeria_Cities::get_states()), 'footer');
    

}
add_action('wp_enqueue_scripts', 'enqueue_scirpts');



add_action('wp',function(){
    if(isset($_POST['generate_cv'])){
        session_start();
        $_SESSION['cv_data'] = json_encode($_POST);
        wp_redirect( home_url('cv'));
        exit;
    }

});



function resume_maker(){
$primary_color = '#52ad9c';
ob_start();
require_once plugin_dir_path(__FILE__).'templates/resume-maker.php';
return ob_get_clean();
}
add_shortcode('resume_maker', 'resume_maker');




add_filter('template_include', 'your_custom_page_template');

function your_custom_page_template($template) {
  // Check if the current page is the one you want to modify
  if (is_page('cv')) {
    // Set the path to your custom page template file
    $custom_template = plugin_dir_path(__FILE__) . 'templates/cv-template.php';

    // Return the path to your custom template file
    return $custom_template;
  }

  // Return the original template
  return $template;
}