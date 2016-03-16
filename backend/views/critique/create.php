<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Critique */

$this->title = Yii::t('app', 'Create Critique');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Critiques'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="critique-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
