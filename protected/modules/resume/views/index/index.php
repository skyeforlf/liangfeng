<!-- header section -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <img src="<?php echo $user_facepic; ?>" class="img-responsive img-circle tm-border" alt="templatemo easy profile">
                <hr>
                <h1 class="tm-title bold shadow">你好!我叫<?php echo $name; ?></h1>
            </div>
        </div>
    </div>
</header>

<!-- about and skills section -->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="about">
                <h3 class="accent">自我介绍</h3>
                <h2>姓名:<?php echo $name; ?></h2>
                <p><?php echo $user_introduce; ?></p>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="skills">
                <h2 class="white">最熟练技能</h2>
                <?php foreach($skill as $item){ ?>
                    <strong><?php echo $item['user_skill']; ?></strong>
                    <span class="pull-right"><?php echo $item['user_percent']; ?></span>
                    <div class="progress">
                        <div class="progress-bar progress-bar-primary" role="progressbar"
                             aria-valuenow="<?php echo $item['user_percent']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $item['user_percent']; ?>%;"></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- education and languages -->
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <div class="education">
                <h2 class="white">教育经历</h2>
                <div class="education-content">
                    <h4 class="education-title accent"><?php echo $schoolInfo['school_name']; ?></h4>
                    <div class="education-school">
                        <h5>地点:<?php echo $schoolInfo['school_address']; ?></h5><span></span>
                        <h5><?php echo substr($schoolInfo['user_start_school_date'],0,4); ?>年--<?php echo substr($schoolInfo['user_graduate_date'],0,4); ?>年</h5><span></span>
                        <h5>专业:<?php echo $schoolInfo['user_professional']; ?></h5>
                    </div>
                    <p class="education-description">学校简介:<?php echo $schoolInfo['school_introduce']; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12">
            <div class="languages">
                <h2>语言掌握</h2>
                <ul>
                    <?php foreach($language as $item){
                        echo '<li>'.$item['user_language'].' / '.$item['user_degree'].'</li>';
                    } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- contact and experience -->
<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div class="contact">
                <h2>联系方式</h2>
                <p><i class="fa fa-map-marker"></i> <?php echo $contact['address'];?></p>
                <p><i class="fa fa-phone"></i> <?php echo $contact['tel'];?></p>
                <p><i class="fa fa-envelope"></i> <?php echo $contact['email'];?></p>
                <p><i class="fa fa-globe"></i> <?php echo $contact['qq'];?></p>
            </div>
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="experience">
                <h2 class="white">主要经历</h2>
                <div class="experience-content">
                    <h4 class="experience-title accent"><?php echo $experience[0]['exp_title'];?></h4>
                    <h5><?php echo $experience[0]['exp_place'];?></h5><span></span>
                    <h5><?php echo $experience[0]['exp_time'];?></h5>
                    <p class="education-description"><?php echo $experience[0]['exp_content'];?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contact and experience -->
<?php
    foreach($experience as $expItem){
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="all-experience-green">
                <div class="experience-content">
                    <h4 class="experience-title accent"><?php echo $expItem['exp_title'];?></h4>
                    <h5><?php echo $expItem['exp_place'];?></h5><span></span>
                    <h5><?php echo $expItem['exp_time'];?></h5>
                    <p class="education-description"><?php echo $expItem['exp_content'];?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
