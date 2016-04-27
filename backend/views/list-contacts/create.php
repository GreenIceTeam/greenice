<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ListContacts */

$this->title = Yii::t('app', 'Create List Contacts');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'List Contacts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="list-contacts-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
