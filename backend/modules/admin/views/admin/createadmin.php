  <?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//use kartik\date\DatePicker;
//use yii\jui\DatePicker;

$this->title = 'Create Admin ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>veuillez remplir les champs suivant pour enregistrement:</p>

    <div class="row">
        <div class="col-lg-5">
    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            
        <?= $form->field($model, 'username')->textInput()->label('pseudo')?>
            
        <?= $form->field($model, 'name')->textInput()->label('non')?>

        <?= $form->field($model, 'password')->passwordInput()->label('mot de passe') ?>

        <?= $form->field($model, 'pwd_re')->passwordInput()->label('Retapez votre mot de passe') ?>

        <?= $form->field($model, 'email')->textInput() ?>
    
        <?= $form->field($model, 'sexe')->dropDownList(
					['H'=>'Homme', 'F'=>'Femme'])?>
            
        <?= $form->field($model, 'role')->dropDownList(
					['member'=>'Member','admin'=>'Admin'])?>
    
    
        <?= Html::submitButton('Create',['class'=> 'btn btn-success','name'=> 'signup-button']) ?>

    <?php ActiveForm::end(); ?>
          
    </div>
</div>