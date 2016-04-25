<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AppartenirCercle */

$this->title = Yii::t('app', 'Create Appartenir Cercle');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appartenir Cercles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appartenir-cercle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
