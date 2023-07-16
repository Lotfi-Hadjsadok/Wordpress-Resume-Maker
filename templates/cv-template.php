<?php 
/**
 * Template Name : CV Template
 */

session_start();


if(!isset($_SESSION['cv_data'])){
    wp_redirect( '/');
}

$cv = json_decode(str_replace('\\','',$_SESSION['cv_data']),true);

require_once (plugin_dir_path(__DIR__).'dompdf/autoload.inc.php');
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);

$dompdf = new Dompdf($options);

ob_start();
?>

<div class="resume">
    <div class="resume_left">
        <div class="resume_content">
            <div class="resume_item resume_info">
                <div class="title">
                    <p class="bold"><?php echo $cv['name'] ?></p>
                    <p class="regular" style="margin-bottom: 15px;"><?php echo  $cv['job'] ?></p>
                </div>
                <ul>
                    <li>
                        <div class="icon">
                            <img src="<?php echo plugin_dir_url(__DIR__).'assets/icons/location.png' ?>" alt="address">
                        </div>
                        <div class="data" contenteditable="true">
                            <?php echo $cv['city'] . ' - '.$cv['state']?>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="<?php echo plugin_dir_url(__DIR__).'assets/icons/call.png' ?>" alt="phone">
                        </div>
                        <div class="data" contenteditable="true">
                            <?php echo $cv['phone'] ?>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <img src="<?php echo plugin_dir_url(__DIR__).'assets/icons/email.png' ?>" alt="email">
                        </div>
                        <div class="data" contenteditable="true">
                            <?php echo $cv['email'] ?>

                        </div>
                    </li>
                    <?php if(!empty($cv['portfolio'])): ?>
                    <li>
                        <div class="icon">
                            <img src="<?php echo plugin_dir_url(__DIR__).'assets/icons/domain.png' ?>"
                                alt="profolio-url">
                        </div>
                        <div class="data" contenteditable="true">
                            <?php echo $cv['portfolio'] ?>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="resume_item resume_skills">
                <div class="title">
                    <p class="bold">skills</p>
                </div>
                <ul>
                    <div style="width:100%;display:flex;flex-wrap: wrap">
                        <?php foreach(explode(',',$cv['skills']) as $skill): ?>
                        <span contenteditable="true" class="tag"><?php echo $skill ?></span>
                        <?php endforeach; ?>
                    </div>
                </ul>
            </div>
            <div class="resume_item resume_social">
                <div class="title">
                    <p class="bold">Tools Used</p>
                </div>
                <ul>
                    <div style="width:100%;display:flex;flex-wrap: wrap">
                        <?php foreach(explode(',',$cv['tools']) as $tool): ?>
                        <span contenteditable="true" class="tag"><?php echo $tool ?></span>
                        <?php endforeach; ?>
                    </div>
                </ul>
            </div>
        </div>
    </div>
    <div class="resume_right">
        <div class="resume_item resume_about">
            <div class="title">
                <p class="bold">About me</p>
            </div>
            <p contenteditable="true" style="font-size: 14px;text-align:justify"><?php echo $cv['summary'] ?></p>
        </div>
        <div class="resume_item resume_work">
            <div class="title">
                <p class="bold">Work Experience</p>
            </div>
            <ul>
                <?php foreach($cv['workedin'] as $index=>$workedin): ?>
                <li>
                    <div class="date"><?php echo $cv['workedin_start'][$index] ?> -
                        <?php echo $cv['workedin_end'][$index]?:'Present' ?></div>
                    <div class="info">
                        <p class="semi-bold"><?php echo  $workedin ?>.</p>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="resume_item resume_education">
            <div class="title">
                <p class="bold">Education</p>
            </div>
            <ul>
                <?php foreach($cv['education'] as $index=>$education): ?>
                <li>
                    <div class="date"><?php echo $cv['education_start'][$index] ?> -
                        <?php echo $cv['education_end'][$index]?:'Present' ?></div>
                    <div class="info">
                        <p class="semi-bold"><?php echo  $education ?>.</p>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<style>
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    list-style: none;
    font-family: 'Montserrat', sans-serif !important;
}

body {
    background: #585c68;
    font-size: 12px;
    line-height: 18px;
    color: #555555;
}

.bold {
    font-weight: 700;
    font-size: 14px;
    text-transform: uppercase;
}

.semi-bold {
    font-weight: 700;
    font-size: 14px;
}

.resume {
    width: 800px;
    height: 100vh;
    display: flex;
    margin: auto;
}

.resume .resume_left {
    width: 280px;
    height: 100%;
    background: <?php echo $cv['main_color'] ?>;
}

.resume .resume_left .resume_profile {
    width: 100%;
    height: 280px;
}

.resume .resume_left .resume_profile img {
    width: 100%;
    height: 100%;
}

.resume .resume_left .resume_content {
    padding: 0 15px;
}

.resume .title {
    margin-bottom: 5px;
}

.resume .resume_left .bold {
    color: #fff;
}

.resume .resume_left .regular {
    color: <?php echo $cv['secondary_color'] ?>;
}

.resume .resume_item {
    padding: 25px 0;
    border-bottom: 2px solid <?php echo $cv['secondary_color'] ?>;
}

.resume .resume_left .resume_item:last-child,
.resume .resume_right .resume_item:last-child {
    border-bottom: 0px;
}

.resume .resume_left ul li {
    margin-bottom: 10px;
    align-items: center;
}

.resume .resume_left ul li:last-child {
    margin-bottom: 0;
}

.resume .resume_left ul li .icon {
    width: 35px;
    height: 35px;
    background: #fff;
    color: <?php echo $cv['main_color'] ?>;
    border-radius: 50%;
    margin-right: 15px;
    position: relative;
    display: inline-block;
    font-size: 16px;
    vertical-align: middle;
}



.resume .icon img,
.resume .resume_right .resume_hobby ul li img {
    width: 18px;
    height: 18px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.resume .resume_left ul li .data {
    color: <?php echo $cv['secondary_color'] ?>;
    display: inline-block;
    vertical-align: middle;
    width: calc(100% - 40px);
}


.resume .resume_left .resume_skills ul li {
    display: flex;
    margin-bottom: 10px;
    color: <?php echo $cv['secondary_color'] ?>;
    justify-content: space-between;
    align-items: center;
}

.resume .resume_left .resume_skills ul li .skill_name {
    width: 25%;
}

.resume .resume_left .resume_skills ul li .skill_progress {
    width: 60%;
    margin: 0 5px;
    height: 5px;
    background: #009fd9;
    position: relative;
}

.resume .resume_left .resume_skills ul li .skill_per {
    width: 15%;
}

.resume .resume_left .resume_skills ul li .skill_progress span {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    background: #fff;
}

.resume .resume_left .resume_social .semi-bold {
    color: #fff;
    margin-bottom: 3px;
}

.resume .resume_right {
    width: 520px;
    position: absolute;
    right: 0;
    top: 0;
    height: 100%;
    background: #fff;
    padding: 15px;
}

.resume .resume_right .bold {
    color: <?php echo $cv['main_color'] ?>;
}

.resume .resume_right .resume_work ul,
.resume .resume_right .resume_education ul {
    padding-left: 25px;
    overflow: hidden;
}

.resume .resume_right ul li {
    position: relative;
}

.resume .resume_right ul li .date {
    font-size: 14px;
    font-weight: 400;
    margin-bottom: 5px;
}

.resume .resume_right ul li .info {
    margin-bottom: 15px;
}

.resume .resume_right ul li:last-child .info {
    margin-bottom: 0;
}

.resume .resume_right .resume_work ul li:before,
.resume .resume_right .resume_education ul li:before {
    content: "";
    position: absolute;
    top: 5px;
    left: -25px;
    width: 6px;
    height: 6px;
    border-radius: 50%;
    border: 2px solid <?php echo $cv['main_color'] ?>;
}

.resume .resume_right .resume_work ul li:after,
.resume .resume_right .resume_education ul li:after {
    content: "";
    position: absolute;
    top: 14px;
    left: -21px;
    width: 2px;
    height: 115px;
    background: <?php echo $cv['main_color'] ?>;
}

.resume .resume_right .resume_hobby ul {
    display: flex;
    justify-content: space-between;
}

.resume .resume_right .resume_hobby ul li {
    width: 80px;
    height: 80px;
    border: 2px solid <?php echo $cv['main_color'] ?>;
    border-radius: 50%;
    position: relative;
    color: <?php echo $cv['main_color'] ?>;
}

.resume .resume_right .resume_hobby ul li i {
    font-size: 30px;
}

.resume .resume_right .resume_hobby ul li:before {
    content: "";
    position: absolute;
    top: 40px;
    right: -52px;
    width: 50px;
    height: 2px;
    background: <?php echo $cv['main_color'] ?>;
}

.resume .resume_right .resume_hobby ul li:last-child:before {
    display: none;
}


.tags {
    display: flex;
    flex-wrap: wrap;
}

.tag {
    background-color: <?php echo $cv['secondary_color'] ?>;
    border-radius: 4px;
    padding: 4px 8px;
    margin: 4px;
}
</style>
<?php 
$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream('output.pdf', ['Attachment' => false]);