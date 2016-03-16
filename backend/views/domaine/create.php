<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Domaine */

$this->title = Yii::t('app', 'Create Domaine');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Domaines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="domaine-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
