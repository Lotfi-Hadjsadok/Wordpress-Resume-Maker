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
    wp_enqueue_style( 'my-style', get_template_directory_uri() . '/css/style.css' );

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
    ob_start();
    ?>
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
        <input type="text" required name="address" value="Bab Ezzouar,Algeria" placeholder="Bab Ezzouar,Algeria">
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

    <label for="">
        <p>Work Experience *</p>
        <div class="workedin">
            <input type="text" name="workedin[]" value="Curalinc Enterprise as a Wordpress Developer"
                placeholder="Curalinc Enterprise as a wordpress developer">
            <div style="display: flex;gap:5px;margin-top:5px;margin-bottom:20px">
                <input type="number" required name="workedin_start[]" style="width:50%" min="1900" max="2099" step="1"
                    placeholder="Start Year" />
                <input type="number" name="workedin_end[]" style="width:50%" min="1900" max="2099" step="1"
                    placeholder="End Year" />
            </div>
        </div>
        <div class="workedin">
            <input type="text" name="workedin[]" value="Curalinc Enterprise as a Wordpress Developer"
                placeholder="Curalinc Enterprise as a wordpress developer">
            <div style="display: flex;gap:5px;margin-top:5px;margin-bottom:20px">
                <input type="number" required name="workedin_start[]" style="width:50%" min="1900" max="2099" step="1"
                    placeholder="Start Year" />
                <input type="number" name="workedin_end[]" style="width:50%" min="1900" max="2099" step="1"
                    placeholder="End Year" />
            </div>
        </div>
        <div class="workedin">
            <input type="text" name="workedin[]" value="Curalinc Enterprise as a Wordpress Developer"
                placeholder="Curalinc Enterprise as a wordpress developer">
            <div style="display: flex;gap:5px;margin-top:5px;margin-bottom:20px">
                <input type="number" required name="workedin_start[]" style="width:50%" min="1900" max="2099" step="1"
                    placeholder="Start Year" />
                <input type="number" name="workedin_end[]" style="width:50%" min="1900" max="2099" step="1"
                    placeholder="End Year" />
            </div>
        </div>



    </label>

    <label for="">
        <p>Education *</p>
        <div class="education">
            <input type="text" name="education[]" value="Licence Degree at Boumerdes University"
                placeholder="Licence Degree at Boumerdes University">
            <div style="display: flex;gap:5px;margin-top:5px;margin-bottom:20px">
                <input type="number" required name="education_start[]" style="width:50%" min="1900" max="2099" step="1"
                    placeholder="Start Year" />
                <input type="number" name="education_end[]" style="width:50%" min="1900" max="2099" step="1"
                    placeholder="End Year" />
            </div>
        </div>
        <div class="education">
            <input type="text" name="education[]" value="Licence Degree at Boumerdes University"
                placeholder="Licence Degree at Boumerdes University">
            <div style="display: flex;gap:5px;margin-top:5px;margin-bottom:20px">
                <input type="number" required name="education_start[]" style="width:50%" min="1900" max="2099" step="1"
                    placeholder="Start Year" />
                <input type="number" name="education_end[]" style="width:50%" min="1900" max="2099" step="1"
                    placeholder="End Year" />
            </div>
        </div>
        <div class="education">
            <input type="text" name="education[]" value="Licence Degree at Boumerdes University"
                placeholder="Licence Degree at Boumerdes University">
            <div style="display: flex;gap:5px;margin-top:5px;margin-bottom:20px">
                <input type="number" required name="education_start[]" style="width:50%" min="1900" max="2099" step="1"
                    placeholder="Start Year" />
                <input type="number" name="education_end[]" style="width:50%" min="1900" max="2099" step="1"
                    placeholder="End Year" />
            </div>
        </div>
    </label>

    <label for="">
        <p>Years of experience in this field *</p>
        <input type="text" required name="yearsexp" value="4 years" placeholder="4 years">
    </label>

    <label for="">
        <p>Colors *</p>
        <div style="display: flex;gap:10px;margin:10px 0">
            <p>Primary</p>
            <input type="color" name="main_color" value="#000040" style="width: 50%;" required value="4 years">

            <p>Secondary</p>
            <input type="color" name="secondary_color" value="#ffffff" style="width: 50%;" required value="4 years">
        </div>
    </label>

    <input class="resume_generate" type="submit" name="generate_cv" value="Generate">
</form>

<div class="resume_data" style="display:none"></div>
<style>
.selectize-input>input[placeholder] {
    font-size: 1rem;
}

.selectize-control.multi .selectize-input.has-items {
    padding: 0.7em !important;
}

.selectize-input {
    padding: 1em;
    font-size: 1rem;
}

.resume_data {
    background-color: white;
    margin-top: 10px;
    padding: 20px;
    box-shadow: 0px 0px 0px gray;
}

.resume_form {
    display: grid;
    gap: 20px;
    grid-template-columns: 1fr 1fr;
}

@media screen and (max-width:750px) {
    .resume_form {
        grid-template-columns: 1fr !important;
    }
}




.resume_form label {
    width: 100%;
}

.resume_form label p {
    margin: 0;
    font-weight: bold;
}

.resume_form label :is(input, select) {
    width: 100%;
}

.resume_form .resume_generate,
.resume_form .resume_generate:is(:hover, :focus) {
    grid-column: 1 / span 2;
    border: none;
    box-shadow: 0 0 0 gray;
    background-color: #52ad9c;
    color: whitesmoke;
}



@media screen and (max-width:750px) {

    .resume_form .resume_generate,
    .resume_form .resume_generate:is(:hover, :focus) {
        grid-column: 1;
        border: none;
        box-shadow: 0 0 0 gray;
        background-color: #52ad9c;
        color: whitesmoke;
    }
}
</style>
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