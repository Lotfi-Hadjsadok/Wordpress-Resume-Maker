<?php 
/**
 * Plugin Name: Resume Maker
 * Author: Lotfi Hadjsadok
 * Description: Resume Powered BY IA
 */

 if(!defined('ABSPATH'))die;


 


function enqueue_scirpts(){
    wp_register_script( 'selectize', 'https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js', array( 'jquery' ), '0.13.3', true );
    wp_enqueue_script( 'resume-cv-js', plugin_dir_url(__FILE__).'assets/index.js' ,array('jquery','selectize'),'1.0',true);

    wp_enqueue_style( 'selectize-css', 'https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.default.min.css' );

    // Enqueue your own stylesheet
    wp_enqueue_style( 'my-style', plugin_dir_url(__FILE__) . 'src/css/style.css' );
    wp_enqueue_style( 'material_icons', 'https://fonts.googleapis.com/icon?family=Material+Icons');
    

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
    ?>
<style>
:root {
    --primary-color: <?php echo $primary_color ?>;
}
</style>
<form class="resume_form" method="POST">
    <label for="">
        <p>Full Name *</p>
        <input type="text" name="name" required value="Lotfi Hadjsadok" placeholder="Lotfi Hadjsadok">
    </label>
    <label for="">
        <p>Your Title *</p>
        <input type="text" name="job" required value="Wordpress Developer" placeholder="Wordpress Developer">
    </label>
    <label for="">
        <p>Email *</p>
        <input type="email" name="email" required value="lotfihadjsadok@gmail.com"
            placeholder="lotfihadjsadok@gmail.com">
    </label>
    <label for="">
        <p>Phone Number *</p>
        <input type="text" required name="phone" value="+213 553397543" placeholder="+213 553397543">
    </label>
    <label for="">
        <p>Address *</p>
        <div class="address_input_container">
            <input type="text" required name="state" value="Alger" placeholder="Alger">
            <input type="text" required name="city" value="Bab Ezzouar" placeholder="Bab Ezzouar">
        </div>
    </label>
    <label for="">
        <p>Portfolio Link</p>
        <input type="url" name="portfolio" value="https://your-link.com" placeholder="https://your-link.com">
    </label>
    <label for="">
        <p>Your Skills *</p>
        <input id="skills-tags" required value="php,javascript" name="skills" type="text"
            placeholder="php,javascript..">
    </label>
    <label for="">
        <p>Tools Used *</p>
        <input id="tools-tags" required value="Github,Gitlab,Slack" name="tools" type="text"
            placeholder="Github,Gitlab,Slack...">
    </label>

    <label class="workedin_container" for="">
        <div class="field_label">
            <p>Work Experience *</p>
            <i class="material-icons add_workedin">add</i>
        </div>
        <div class="workedin">
            <input type="text" name="workedin[]" value="Curalinc Enterprise as a Wordpress Developer"
                placeholder="Curalinc Enterprise as a wordpress developer">
            <div>
                <input type="number" required name="workedin_start[]" min="1900" max="2099" step="1"
                    placeholder="Start Year" />
                <input type="number" name="workedin_end[]" min="1900" max="2099" step="1" placeholder="End Year" />
            </div>
        </div>
        <!-- Worked In repeater here -->
    </label>

    <label class="education_container" for="">
        <div class="field_label">
            <p>Education *</p>
            <i class="material-icons add_education">add</i>
        </div>
        <div class="education">
            <input type="text" name="education[]" value="Licence Degree at Boumerdes University"
                placeholder="Licence Degree at Boumerdes University">
            <div>
                <input type="number" required name="education_start[]" min="1900" max="2099" step="1"
                    placeholder="Start Year" />
                <input type="number" name="education_end[]" min="1900" max="2099" step="1" placeholder="End Year" />
            </div>
        </div>
        <!-- Education Repeater here -->
    </label>

    <label for="">
        <p>Years of experience in this field *</p>
        <input type="text" required name="yearsexp" value="4 years" placeholder="4 years">
    </label>

    <label for="">
        <p>Colors *</p>
        <div class="colors_fields">
            <p>Primary</p>
            <input type="color" name="main_color" value="<?php echo $primary_color ?>" required>

            <p>Secondary</p>
            <input type="color" name="secondary_color" value="#ffffff" required>
        </div>
    </label>
    <label class="summary" for="">
        <p>Summary</p>
        <textarea rows="5" name="summary"></textarea>
    </label>
    <button class="summary_generate">Generate Summary using IA <br /><br />( according to your infos )</button>
    <input class="resume_generate" type="submit" name="generate_cv" value="Create My Resume">
</form>

<div class="resume_data" style="display:none"></div>
<?php
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