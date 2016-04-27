<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->registerCssFile('css/login.css');
//$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>Please fill out the following fields to login:</p>-->
    <div class="container">
        <div class="row">
            <div id="debutF" class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <legend id="leg4"><center>Login</center></legend>
                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    If you forgot your password you can <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                    <div id="btn" class="form-group">
                        <?= Html::submitButton('Login', ['class' => 'btn btn-success pull-right', 'name' => 'login-button']) ?>
                    </div>
                </div>



                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<?php
$this->registerJsFile('js/jquery.min.js');
$this->registerJsFile('js/formulaires.js');

