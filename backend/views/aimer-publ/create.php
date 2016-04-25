<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AimerPubl */

$this->title = Yii::t('app', 'Create Aimer Publ');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aimer Publs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aimer-publ-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
