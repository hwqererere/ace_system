<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\ActiveForm; 
use yii\captcha\Captcha;
use yii\captcha\CaptchaAction;
use yii\base\widget;

$input_css=array(
        'bootstrap.min.css',        
        'font-awesome.min.css',
        'ace.min.css',
        'ace-rtl.min.css'
    );
$input_js=array(        
    );

?>
<?= \Yii::$app->view->renderFile('@app/views/layouts/head.php',['input_css'=>$input_css,'input_js'=>$input_js]);?>
<body>

    <div class="login-layout">
        <div class="main-container">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="login-container">
                            <div class="center">
                                <h1>
                                    <i class="icon-leaf green"></i>
                                    <span class="red"><?=Yii::t('app','Rooter')?></span>
                                    <span class="green"><?=Yii::t('app','Login')?></span>
                                </h1>
                                <h4 class="blue">&copy; Nikola <?= date('Y')?>  <?= Yii::powered() ?></h4>
                            </div>

                            <div class="space-6"></div>

                            <div class="position-relative">
                                <div id="login-box" class="login-box visible widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header blue lighter bigger">
                                                <i class="icon-coffee green"></i>
                                                <?=Yii::t('app','Please Enter Your Information')?>
                                            </h4>

                                            <div class="space-6"></div>
                                            <?php $form = ActiveForm::begin([
                                                'id' => 'login-form',
                                                'fieldConfig' => [  
                                                    'template' =>'{input}']
                                            ]); ?>
                                           
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <?= $form->field($model, 'username')->textInput(['class' => 'form-control','style'=>'width:100%;','placeholder'=>Yii::t('app','Username')]) ?>
                                                            <i class="icon-user" style="line-height:40px;"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <?= $form->field($model, 'password')->passwordInput(['class'=>'form-control','style'=>'width:100%;','placeholder'=>Yii::t('app','Password')]) ?>
                                                            <i class="icon-lock"  style="line-height:40px;"></i>
                                                        </span>
                                                    </label>

                                                    <div class="space"><?=$msg;?></div>

                                                    <div class="clearfix">
                                                        <label class="inline">
                                                            
                                                            <input type="checkbox" class="ace"/>
                                                            <span class="lbl"><?=Yii::t('app','Remember Me')?> </span>
                                                        </label>
                                                        <?= Html::submitButton('<i class="icon-key"></i>'.Yii::t('app','Login'), ['class' => 'width-35 pull-right btn btn-sm btn-primary', 'name' => 'login-button']) ?>
                                                       
                                                            
                                                            
                                                        </button>
                                                        
                                                    </div>

                                                    <div class="space-4"></div>
                                                </fieldset>
                                           <?php ActiveForm::end(); ?>
                                
                                        </div><!-- /widget-main -->

                                        <div class="toolbar clearfix">
                                            <div>
                                                <a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link">
                                                    <i class="icon-arrow-left"></i>
                                                    I forgot my password
                                                </a>
                                            </div>

                                            <div>
                                                <a href="#" onclick="show_box('signup-box'); return false;" class="user-signup-link">
                                                    I want to register
                                                    <i class="icon-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /widget-body -->
                                </div><!-- /login-box -->

                                <div id="forgot-box" class="forgot-box widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header red lighter bigger">
                                                <i class="icon-key"></i>
                                                Retrieve Password
                                            </h4>

                                            <div class="space-6"></div>
                                            <p>
                                                Enter your email and to receive instructions
                                            </p>

                                            <form>
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="email" class="form-control" placeholder="Email" />
                                                            <i class="icon-envelope"></i>
                                                        </span>
                                                    </label>

                                                    <div class="clearfix">
                                                        <button type="button" class="width-35 pull-right btn btn-sm btn-danger">
                                                            <i class="icon-lightbulb"></i>
                                                            Send Me!
                                                        </button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div><!-- /widget-main -->

                                        <div class="toolbar center">
                                            <a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
                                                Back to login
                                                <i class="icon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div><!-- /widget-body -->
                                </div><!-- /forgot-box -->

                                <div id="signup-box" class="signup-box widget-box no-border">
                                    <div class="widget-body">
                                        <div class="widget-main">
                                            <h4 class="header green lighter bigger">
                                                <i class="icon-group blue"></i>
                                                New User Registration
                                            </h4>

                                            <div class="space-6"></div>
                                            <p> Enter your details to begin: </p>

                                            <form>
                                                <fieldset>
                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="email" class="form-control" placeholder="Email" />
                                                            <i class="icon-envelope"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="text" class="form-control" placeholder="Username" />
                                                            <i class="icon-user"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control" placeholder="Password" />
                                                            <i class="icon-lock"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="password" class="form-control" placeholder="Repeat password" />
                                                            <i class="icon-retweet"></i>
                                                        </span>
                                                    </label>

                                                    <label class="block">
                                                        <input type="checkbox" class="ace" />
                                                        <span class="lbl">
                                                            I accept the
                                                            <a href="#">User Agreement</a>
                                                        </span>
                                                    </label>

                                                    <div class="space-24"></div>

                                                    <div class="clearfix">
                                                        <button type="reset" class="width-30 pull-left btn btn-sm">
                                                            <i class="icon-refresh"></i>
                                                            Reset
                                                        </button>

                                                        <button type="button" class="width-65 pull-right btn btn-sm btn-success">
                                                            Register
                                                            <i class="icon-arrow-right icon-on-right"></i>
                                                        </button>
                                                    </div>
                                                </fieldset>
                                            </form>
                                        </div>

                                        <div class="toolbar center">
                                            <a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
                                                <i class="icon-arrow-left"></i>
                                                Back to login
                                            </a>
                                        </div>
                                    </div><!-- /widget-body -->
                                </div><!-- /signup-box -->
                            </div><!-- /position-relative -->
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div><!-- /.main-container -->

        <!-- basic scripts -->
<?php 
$foot_js=array(
        'html5shiv.js',        
        'respond.min.js',
        'jquery-2.0.3.min.js',
);
?>
<?= \Yii::$app->view->renderFile('@app/views/layouts/footer.php',['foot_js'=>$foot_js]);?>
       
    <script type="text/javascript">
            function show_box(id) {
             jQuery('.widget-box.visible').removeClass('visible');
             jQuery('#'+id).addClass('visible');
            }
        </script>
</div>
</body>

