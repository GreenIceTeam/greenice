<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Update Photo';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Veuillez remplir le champ suivant:</p>



    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'options'=>['enctype'=>'multipart/form-data']]); ?>

                <?= $form->field($model, 'photo')->fileInput() ?>

                <div class="form-group">
                    
                    <?= Html::submitButton('change', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                    
                    <a class="btn btn-success" href="/greenice/frontend/web/index.php?r=profile/profil/view">Annuler</a>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
