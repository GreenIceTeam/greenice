<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\RecevoirPubl */

$this->title = Yii::t('app', 'Create Recevoir Publ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recevoir Publs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recevoir-publ-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
