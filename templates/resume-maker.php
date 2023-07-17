<?php 
/**
 * Resume Maker template
 */

?>
<style>
:root {
    --primary-color: <?php echo $primary_color ?>;
}
</style>
<form class="resume_form" method="POST">
    <label for="">
        <p>Full Name *</p>
        <input type="text" name="name" required placeholder="Lotfi Hadjsadok">
    </label>
    <label for="">
        <p>Your Title *</p>
        <input type="text" name="job" required placeholder="Wordpress Developer">
    </label>
    <label for="">
        <p>Email *</p>
        <input type="email" name="email" required placeholder="lotfihadjsadok@gmail.com">
    </label>
    <label for="">
        <p>Phone Number *</p>
        <input type="text" required name="phone" placeholder="+213 553397543">
    </label>
    <label for="">
        <p>Address *</p>
        <div class="address_input_container">
            <select name="state" required id=""></select>
            <select name="city" required id=""></select>
        </div>
    </label>
    <label for="">
        <p>Portfolio Link</p>
        <input type="url" name="portfolio" placeholder="https://your-link.com">
    </label>
    <label for="">
        <p>Your Coding Languages *</p>
        <input id="languages-tags" required name="languages" type="text">
    </label>
    <label for="">
        <p>Tools Used *</p>
        <input id="tools-tags" required name="tools" type="text" placeholder="Github,Gitlab,Slack">
    </label>

    <label class="workedin_container" for="">
        <div class="field_label">
            <p>Work Experience *</p>
            <i class="material-icons add_workedin">add</i>
        </div>
        <div class="workedin">
            <input type="text" name="workedin[]" placeholder="Curalinc Enterprise as a wordpress developer">
            <div>
                <input type="number" inputmode="numeric" required name="workedin_start[]" min="1900" max="2099" step="1"
                    placeholder="Start Year" />
                <input type="number" inputmode="numeric" name="workedin_end[]" min="1900" max="2099" step="1"
                    placeholder="End Year" />
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
            <input type="text" name="education[]" placeholder="Licence Degree at Boumerdes University">
            <div>
                <input type="number" inputmode="numeric" required name="education_start[]" min="1900" max="2099"
                    step="1" placeholder="Start Year" />
                <input type="number" inputmode="numeric" name="education_end[]" min="1900" max="2099" step="1"
                    placeholder="End Year" />
            </div>
        </div>
        <!-- Education Repeater here -->
    </label>

    <label for="">
        <p>Years of experience in this field *</p>
        <input type="number" inputmode="numeric" min="0" required name="yearsexp" placeholder="4 years">
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