<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SousDomaine */

$this->title = Yii::t('app', 'Create Sous Domaine');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sous Domaines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sous-domaine-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
