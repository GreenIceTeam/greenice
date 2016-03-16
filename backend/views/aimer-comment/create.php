<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\AimerComment */

$this->title = Yii::t('app', 'Create Aimer Comment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Aimer Comments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aimer-comment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
