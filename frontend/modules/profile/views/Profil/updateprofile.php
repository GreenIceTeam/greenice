<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use  yii\helpers\ArrayHelper;
use common\models\Domaine;
use common\models\SousDomaine;
/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */


$this->registerCss('.field-profileform-domaineetude{display: none}');
$this->registerCss('.field-profileform-domaineactivite{display: none}');
$this->registerCss('.field-profileform-sousdomaine{display: none}');

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = Yii::t('app', 'Update {modelClass} ', [
    'modelClass' => 'Profile',
]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>
<div class="user-form">

    <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'nom')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'prenom')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'photo')->fileInput() ?>
    
    <?= $form->field($model, 'ville')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'date_naiss')->label('date de naissance') ?>

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
 

<?php 
$this->registerJsFile('js/jquery.min.js');

$this->registerJsFile('js/memberSignup.js'
                //            , ['depends'=>'frontend\assets\AppAsset']
        );


 



