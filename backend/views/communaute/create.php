<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Communaute */

$this->title = Yii::t('app', 'Create Communaute');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Communautes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="communaute-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
