<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AppartenirComm */

$this->title = Yii::t('app', 'Create Appartenir Comm');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Appartenir Comms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="appartenir-comm-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
