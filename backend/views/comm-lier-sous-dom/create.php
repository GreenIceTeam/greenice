<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CommLierSousDom */

$this->title = Yii::t('app', 'Create Comm Lier Sous Dom');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Comm Lier Sous Doms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comm-lier-sous-dom-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
