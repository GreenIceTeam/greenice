<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cercle */

$this->title = Yii::t('app', 'Create Cercle');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cercles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cercle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
