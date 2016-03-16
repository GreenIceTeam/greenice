<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RecevoirMess */

$this->title = Yii::t('app', 'Create Recevoir Mess');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recevoir Messes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recevoir-mess-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
